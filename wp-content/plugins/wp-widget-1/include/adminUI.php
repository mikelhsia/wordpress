<?php
	register_activation_hook( __FILE__, 'set_widget_1_option' );

	add_action('admin_menu','create_admin_page');

	function create_admin_page () {
		$page_title = 'wp-widget-1';
		$menu_title = 'wp-widget-1 Config';
		$capability = 'manage_options';
		$menu_slug = 'wp-widget-1';
		$function = 'wp_widget_1_create_page';
		add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function );
	}

	// 常用Option: add, update, delete, get
	function wp_widget_1_create_page() {
?>
<div>
	<h3>wp-color setting</h3>
	<?php widget_1_update_option(); ?>
	<form method="post">
		<input type="text" name="wp-widget-1-color" value="<?php echo get_option('wp-widget-1-color'); ?>"/>
		<input type="submit" name="Submit" value="Submit"/>		
	</form>
</div>
<img src='<?php echo home_url(); ?>/wp-includes/images/media/Template_Hierarchy.png' style='width:80%;margin-top:20px; box-shadow: 1px 2px 3px lightgrey;'>
<?php

	}

	function widget_1_update_option () {

		if ($_POST['Submit']) {
			$update = false;	
			if ($_POST['wp-widget-1-color']) {
				update_option( 'wp-widget-1-color', $_POST['wp-widget-1-color'] );

				$update = true;
			}

			if ($update) {
				echo "update success!";
			} else {
				echo "update failed!";
			}
		}
	}

	function set_widget_1_option () {
		add_option('wp-widget-1-color', 'red');
		echo "Hello! Setting up!";
	}

	function unset_widget_1_option () {
		update_option('wp-widget-1-color', 'red');
		delete_option('wp-widget-1-color');	
	}

	register_deactivation_hook( __FILE__, 'unset_widget_1_option' );
?>