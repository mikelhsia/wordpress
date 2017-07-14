<?php
/*Plugin Name: List Subpages
Description: This plugin checks if the current page has parent or child pages and if so, outputs a list of the highest ancestor page and its descendants. It creates a function called tutsplus_list_subpages() which you insert into your theme or activate via a hook to work.
Version: 1.0
Author: Michael Hsia
Author URI: http://na.com
License: GPLv2
 */
?>

<?php
/*
 * 通过建立一个函数，添加到侧边栏文件中，或添加到你模板文件原有的内容之上
 * 1.确定当前页面在网站结构中的位置
 * 2.输出页面列表
*/
?>

<?php
/* 为了找到当前页面在网站层次结构中的位置，你需要完成以下4件事情：
 *
 * 检查当前是否真的是一个页面
 * 检查当前页面是否有母页面
 * 如果没有，那么你便可以确认当前所在位置是网站层次中的顶级初始页面部分
 * 如果有，你需要用get_post_ancestors()来确认顶级初始页面
*/
?>

<?php
/*
 * Name: wp_widget_check_for_page_tree
 * Return: Post's ancestors ID
 */
function wp_widget_check_for_page_tree () {
    // Start by checking if we're on a page
    if (is_page()) {
        global $post;

        // Next we check if the page has parents
        if ($post->post_parent) {
            // Fetch the list of ancestors
            $parents = array_reverse(get_post_ancestors($post->ID));

            // Get the top level ancestor
            return $parents[0];
        }

        // Return post id if this is the top post
        $post->ID;
    }
}

/*
 * Name:
 * Return:
 */
function wp_widget_list_subpages () {
    // Don't run on the main blog page
    if (is_page()) {
        // Run the check_for_page_tree function to fetch top level page
        $ancestor = wp_widget_check_for_page_tree();

        // Set the arguments for children of the ancestor page
        $args = array(
            // 确认哪些是$ancestor页面的子页面
            'child_of' => $ancestor,
            // 描述函数运用于网站层次结构中的层次数目。如果你只是想展示一个或两个层次的话你可以改变其赋值
            'depth' => '-1',
            // 确保所输出的不会被包裹在任何HTML标签内
            'title_li' => ''
        );

        $list_pages = get_pages($args);

        if ($list_pages) {
            ?>
            <ul class="page-tree">
                <!-- list ancestor page -->
                <li class="ancestor">
                    <a href="<?php echo get_permalink($ancestor); ?>"><?php echo get_the_title($ancestor); ?></a>
                </li>
                <?php
                    // Use wp_list_pages to list subpages of ancestor or current page
                    wp_list_pages($args);
                    // Close the page-tree list
                ?>
            </ul>
            <?php
        }
    }
}
/*
 * 你可以采取下面两种方式中任意一种来激活tutsplus_list_subpages()函数：
   在你的一个主题模板文件中调用tutsplus_list_subpages()，比如sidebar.php文件。
   把它附加到你主题中的一个钩子上。
   例如，如果你的主题在sidebar.php文件中有一个tutsplus_sidebar钩子，你可以将以下代码添加到你的 functions.php文件中：
   <?php add_action( 'tutsplus_sidebar', 'tutsplus_list_subpages' ); ?>
 */
?>
