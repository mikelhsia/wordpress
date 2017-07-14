<?php
/*Plugin Name: Plus List Subpages Widget
  Description: Enable the subpages of the section
  Version: 1.0
  Author: Michael Hsia
  Author URI: http://na.com
  License: GPLv2
*/



class WordPress_Widget_Plus_List_subpages extends WP_Widget {

    // 它会构造一个函数。在这个函数里面你可以做出一些定义，比如WordPress小工具的ID、标题和说明。
    function __construct() {
        parent::__construct(

            // Widget ID
            'wp_widget_plus_list_subpages',

            // Widget Name
            __('Customized Plus List Subpages', 'MH' ),

            // Widget Option
            array (
                'description' => __( 'Enable plus list subpages of this section', 'MH' )
            )
        );
    }

    // 小工具界面创建表单，让用户来定制或者激活它。
    function form( $instance ) {
        $defaults = array(
            'depth' => '-1'
        );

        $depth = $instance['depth'];

        // Markup for the form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('depth');?>">Depth of list:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id('depth');?>" name="<?php echo $this->get_field_name('depth'); ?>" value="<?php echo esc_attr($depth); ?>">
        </p>
        <?php
    }

    // 能及时更新用户在WordPress小工具界面输入的任何设置。
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['depth'] = strip_tags($new_instance['depth']);
        return $instance;
    }

    // 定义了在网站前端通过WordPress小工具输出的内容。
    // https://www.wpdaxue.com/the_widget.html
    function widget( $args, $instance ) {

        // Kick things off
        extract( $args );
        echo $before_widget;
        echo $before_title . 'In this section:' . $after_title;

        // Run a query if on a page
        if (is_page()) {
            // Run the check_for_page_tree to fetch top level page
            $ancestor = check_for_page_tree();

            // Set the args for children of the ancestor page
            $args = array(
//                'child_of' => $ancestor,
                // 0 不限制子页面
                'child_of' => 0,
                'depth' => $instance['depth'],
                // 确保所输出的不会被包裹在任何HTML标签内
                'title_li' => ''
            );

            // Set a value for get_pages to check if it's empty
            $list_pages = get_pages($args);

            // Check if $list_pages has value
            if ($list_pages) {
                // Open a list with the ancestor page at the top
                ?>
                <ul class="page-tree">
                <li class="ancestor">
                    <a href="<?php echo get_permalink( $ancestor ); ?>"><?php echo get_the_title( $ancestor ); ?></a>
                </li>
                <?php
                    // Use wp_list_pages to list subpages of ancestor or current page
                    wp_list_pages( $args );
                    // Close the page-tree list
                ?>
                </ul>
                <?php
            }
        }
    }

}

function wp_plus_list_subpages_widget() {
    // register_widget()函数是一个WordPress函数，它唯一的参数就是你刚刚创建的类的命名
    register_widget( 'WordPress_Widget_Plus_List_subpages' );

}

/*
 * 通过建立一个函数，添加到侧边栏文件中，或添加到你模板文件原有的内容之上
 * 1.确定当前页面在网站结构中的位置
 * 2.输出页面列表
*/

/* 为了找到当前页面在网站层次结构中的位置，你需要完成以下4件事情：
 *
 * 检查当前是否真的是一个页面
 * 检查当前页面是否有母页面
 * 如果没有，那么你便可以确认当前所在位置是网站层次中的顶级初始页面部分
 * 如果有，你需要用get_post_ancestors()来确认顶级初始页面
*/

/*
 * Name: check_for_page_tree
 * Return: Post's ancestors ID
 */
function check_for_page_tree() {
    //首先检测当前访问的是否是一个页面
    if( is_page() ) {
        global $post;


        // 接着检测该页面是否有父级页面
        if ( $post->post_parent ){
            // 获取父级页面名单
            $parents = array_reverse( get_post_ancestors( $post->ID ) );
            // 获取最顶级页面
            return $parents[0];
        }
        // 返回ID  - 如果存在父级页面，就返回最顶级的页面ID，否则返回当前页面ID, or the current page if not
        return $post->ID;
    }
}

// 将你创建的函数挂入 widgets_init 钩子，确保它可以被WordPress拾起。
add_action( 'widgets_init', 'wp_plus_list_subpages_widget' );

?>
