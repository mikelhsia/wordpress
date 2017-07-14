<?php
/**
 * Created by PhpStorm.
 * User: puppylpy
 * Date: 01/05/2017
 * Time: 2:32 PM
 */

register_activation_hook( __FILE__, 'set_default_floating_shopping_cart_option' );

add_action('admin_menu','create_admin_page');

function create_admin_page () {
    $page_title = 'Floating Shopping Cart';
    $menu_title = 'Floating Shopping Cart Configuration';
    $capability = 'manage_options';
    $menu_slug = 'floating_shopping_cart_config';
    $function = 'floating_shopping_cart_create_page';
    $icon_url = '';
    $position = 20;
    // Add to setting submenu
    // add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function );
    /**
     * Add a top-level menu page.
     *
     * This function takes a capability which will be used to determine whether
     * or not a page is included in the menu.
     *
     * The function which is hooked in to handle the output of the page must check
     * that the user has the required capability as well.
     *
     * @global array $menu
     * @global array $admin_page_hooks
     * @global array $_registered_pages
     * @global array $_parent_pages
     *
     * @param string   $page_title The text to be displayed in the title tags of the page when the menu is selected.
     * @param string   $menu_title The text to be used for the menu.
     * @param string   $capability The capability required for this menu to be displayed to the user.
     * @param string   $menu_slug  The slug name to refer to this menu by (should be unique for this menu).
     * @param callable $function   The function to be called to output the content for this page.
     * @param string   $icon_url   The URL to the icon to be used for this menu.
     *                             * Pass a base64-encoded SVG using a data URI, which will be colored to match
     *                               the color scheme. This should begin with 'data:image/svg+xml;base64,'.
     *                             * Pass the name of a Dashicons helper class to use a font icon,
     *                               e.g. 'dashicons-chart-pie'.
     *                             * Pass 'none' to leave div.wp-menu-image empty so an icon can be added via CSS.
     * @param int      $position   The position in the menu order this one should appear.
     * @return string The resulting page's hook_suffix.
     */
    add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position);
}

// 常用Option: add, update, delete, get
function floating_shopping_cart_create_page() {
    $floating_position = array(
        "Right"=>"floating-shopping-cart-window-right",
        "Left"=>"floating-shopping-cart-window-left",
        "Bottom"=>"floating-shopping-cart-window-bottom",
    );
    ?>
    <div>
        <h1>Floating Shopping Cart Configuration</h1>
        <?php widget_1_update_option(); ?>
        <form method="post">
            <table class="form-table">
                <tr>
                    <th scope="row">
                        Floating shopping cart position
                    </th>
                    <td>
                        <select name="position_for_floating_shopping_cart" id="position_for_shopping_cart">
                        <?php
                            foreach ($floating_position as $position_name => $position_class) :?>
                            <option <?php selected(get_option('floating_shopping_cart_position'), $position_class); ?> value="<?php echo $position_class; ?>"><?php echo $position_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        Show subtotal
                    </th>
                    <td>
                        <input type="text" name="widget_color" value="<?php echo get_option('widget_color'); ?>"/>
                    </td>
                </tr>
                <tr>
                    <th>Checked Boxes</th>
                    <td>
                        <input type="checkbox" name="rage_mode" <?php checked( $rage_mode, 'on' ); ?>/> Rage Mode<br />
                        <input type="checkbox" name="ninja_mode" <?php checked( $ninja_mode, 'on' ); ?> /> Ninja Mode<br />
                    </td>
                </tr>
            </table>
            <div>
                <input type="submit" class="button button-primary" name="submit" id="submit" value="Save Changes"/>
            </div>
        </form>
    </div>
    <?php

}

function widget_1_update_option () {
	if ($_POST['submit']) {
		$update = false;
		if ($_POST['position_for_floating_shopping_cart']) {
			update_option( 'floating_shopping_cart_position', $_POST['position_for_floating_shopping_cart'] );

			$update = true;
		}

		if ($_POST['widget_color']) {
		    update_option('widget_color', $_POST['widget_color']);

		    $update = true;
        }
		if ($update) {
//            echo "Update successful!";
		} else {
//            echo "Update failed!";
		}
	}
}

function set_default_floating_shopping_cart_option () {
	add_option('floating_shopping_cart_position', 'floating-shopping-cart-window-right');
	add_option("widget_color",'red');
}

function unset_default_floating_shopping_cart_option () {
    update_option('floating_shopping_cart_position', 'floating-shopping-cart-window-right');
    delete_option('floating_shopping_cart_position');
    add_option("widget_color",'red');
    add_option("widget_color");
}

register_deactivation_hook( __FILE__, 'unset_default_floating_shopping_cart_option' );

?>