<?php
/*
  Plugin Name: Woo Commerce Floating Shopping Cart
  Description: Enable the floating shopping cart (Specifically to Woo Commerce plugin)
  Version: 1.0
  Author: Michael Hsia
  Author URI: http://na.com
  License: GPLv2
*/

// 有很多种方法可以在前端加载js和css，但是通过下面的方法才是唯一正确的
/*
 * add_action( 'wp_enqueue_scripts', 'wp_enqueue_scripts_example' );
 *
 * function wp_enqueue_scripts_example() {
 *     // you can enqueue scripts...
 *     wp_enqueue_script( 'my-script', get_stylesheet_directory_uri() . '/scripts/my-script.js' );
 *    // ...and styles, too!
 *     wp_enqueue_style( 'my-style', get_stylesheet_directory_uri() . '/styles/my-style.css' );
 * }
 *
 * OR
 *
 * add_action( 'get_footer', 'get_footer_example' );
 *
 * function get_footer_example( $name ) {
 *     if ( 'new' == $name ) { ?>
 *         <script>
 *             (function( $ ) {
 *                 //put all your jQuery goodness in here.
 *             })( jQuery );
 *         </script>
 *         <?php
 *     }
 * }
*/


require_once (dirname(__FILE__).'/include/adminUI.php');

function load_floating_shopping_cart_action_assets ()
{
    //注册 ID 为 themes_js 的 JS 脚本
    wp_register_script('load_floating_shopping_cart_action_js', plugin_dir_url(__FILE__) . 'js/woocommerce-widget-floating-shopping-cart-action.js', array(), false, false);
    //挂载脚本
    wp_enqueue_script('load_floating_shopping_cart_action_js');
    wp_register_style( 'load_floating_shopping_cart_css',  plugin_dir_url(__FILE__) . 'css/woocommerce-widget-floating-shopping-cart.css' );
    wp_enqueue_style( 'load_floating_shopping_cart_css' );
}

add_action( 'wp_enqueue_scripts', 'load_floating_shopping_cart_action_assets' );

class woocommerce_widget_floating_shopping_cart extends WP_Widget {

    // 它会构造一个函数。在这个函数里面你可以做出一些定义，比如WordPress小工具的ID、标题和说明。
    function __construct() {
        parent::__construct(
            // Widget ID
            'woocommerce_widget_floating_shopping_cart',
            // Widget Name
            __('Floating Shopping Cart', 'MH' ),
            // Widget Option
            array (
                'description' => __( 'Enable Woo Commerce floating shopping cart', 'MH' )
            )
        );

    }

    // 小工具界面创建表单，让用户来定制或者激活它。
    function form( $instance ) {
    }

    // 能及时更新用户在WordPress小工具界面输入的任何设置。
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['position_for_floating_shopping_cart'] = strip_tags($new_instance['position_for_floating_shopping_cart']);
        return $instance;
    }

    // 定义了在网站前端通过WordPress小工具输出的内容。
    // https://www.wpdaxue.com/the_widget.html
    function widget( $args, $instance ) {
        // Only shows at 'SHOP' page
        if (is_page(25)) {
        ?>


        <div id="<?php echo get_option('floating_shopping_cart_position'); ?>" onclick="test()">
            <table class="floating_shopping_cart_table">
                <thead>
                <tr>
                    <th class="product-name" colspan="2"><?php _e( 'Shopping Cart', 'woocommerce' ); ?></th>
                </tr>
                <tr>
                    <th class="product-name"><?php _e( 'Product', 'woocommerce' ); ?></th>
                    <th class="product-total"><?php _e( 'Total', 'woocommerce' ); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                do_action( 'woocommerce_review_order_before_cart_contents' );

                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                    $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                        ?>
                        <tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
                            <td class="product-name">
                                <?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;'; ?>
                                <?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times; %s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key ); ?>
                                <?php echo WC()->cart->get_item_data( $cart_item ); ?>
                            </td>
                            <td class="product-total">
                                <?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
                            </td>
                        </tr>
                        <?php
                    }
                }

                do_action( 'woocommerce_review_order_after_cart_contents' );
                ?>
                </tbody>
                <tfoot>

                <tr class="cart-subtotal">
                    <th><?php _e( 'Subtotal', 'woocommerce' ); ?></th>
                    <td><strong><?php wc_cart_totals_subtotal_html(); ?></strong></td>
                </tr>
                </tfoot>
            </table>
        </div>
            <script>
                // jQuery javascript is not defined yet
               $(".product-name").click(function(){
                    $(".product-name").fadeOut();
               });
            </script>
        <?php
        }
    }

}

function woocommerce_floating_shopping_cart() {
    // register_widget()函数是一个WordPress函数，它唯一的参数就是你刚刚创建的类的命名
    register_widget( 'woocommerce_widget_floating_shopping_cart' );

}


// add_action('admin_footer','head_str');  // This is a hook. That bind action to layout

// 将你创建的函数挂入 widgets_init 钩子，确保它可以被WordPress拾起。
add_action( 'widgets_init', 'woocommerce_floating_shopping_cart' );
//add_action('footer','');
?>