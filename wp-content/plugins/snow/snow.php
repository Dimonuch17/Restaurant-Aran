<?php
/*
 * Plugin Name: Snow
 * Plugin URI: https://wordpress.org/plugins/snow/
 * Description: Let it snow on your WordPress website with lots of fun options!
 * Version: 1.0.2
 * Author: Mitch
 * Author URI: https://profiles.wordpress.org/lowest
 * License: GPL-2.0+
 * Text Domain: snow
 * Domain Path:
 * Network:
 * License: GPL-2.0+
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! defined( 'SNW_FILE' ) ) { define( 'SNW_FILE', __FILE__ ); }

if ( ! defined( 'SNW_VERSION' ) ) { define( 'SNW_VERSION', '1.0.2' ); }

$snow = get_option('snow');
$snowadvanced = get_option('snowadvanced');

add_action( 'admin_menu', function() {
	add_submenu_page(
		'options-general.php',
		'Snow',
		'Snow',
		'manage_options',
		'snow',
		'snow_page' );
});

function setdefault( $item, $default ) {
	global $snow;
	global $snowadvanced;
	
	if(empty($snow[$item])) {
		$snow[$item] = $default;
	}
}

function snow_page() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	} else {
		global $snow;
		global $snowadvanced;
		
		add_thickbox();
		
		setdefault( 'round', 'false' );
		setdefault( 'shadow', 'false' );
		setdefault( 'scrollwithscreen', 'absolute' );
		setdefault( 'collection', 'false' );
		setdefault( 'deviceorientation', 'false' );
		?>
<div class="wrap">
	<h1>Snow <span class="version_ribbon">v<?php echo SNW_VERSION; ?></span></h1>
	<h2 class="nav-tab-wrapper">
		<a class="nav-tab<?php if(empty($_GET['tab'])) { echo ' nav-tab-active'; } ?>" href="<?php echo admin_url( 'options-general.php?page=snow' ); ?>"><?php _e('General'); ?></a>
		<a class="nav-tab<?php if(isset($_GET['tab']) && $_GET['tab'] == 'custom') { echo ' nav-tab-active'; } ?>" href="<?php echo admin_url( 'options-general.php?page=snow&tab=custom' ); ?>"><?php _e('Advanced'); ?></a>
		<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=2VYPRGME8QELC" target="_blank" rel="noopener noreferrer" class="nav-tab-donate"><?php _e('Donate'); ?></a>
	</h2>
	<?php
	if(isset($_GET['tab']) && $_GET['tab'] == 'custom') {
	?>
	<form method="post" action="options.php">
		<?php settings_fields( 'snowadvanced_group' ); ?>
		<table class="form-table">
			<tr>
				<th scope="row"><label for="snowadvanced[file]"><?php _e( 'Use Minified File' ); ?></label></th>
				<td><input id="snowadvanced[file]" name="snowadvanced[file]" type="checkbox" value="1" <?php checked( true, isset( $snowadvanced['file'] ) ); ?> /></td>
			</tr>
			<tr>
				<th scope="row"><label for="snowadvanced[script]"><?php _e( 'Use Minified Script' ); ?></label></th>
				<td><input id="snowadvanced[script]" name="snowadvanced[script]" type="checkbox" value="1" <?php checked( true, isset( $snowadvanced['script'] ) ); ?> /></td>
			</tr>
			<tr>
				<th scope="row"><label for="snowadvanced[flakeindex]"><?php _e( 'Flake Index' ); ?></label></th>
				<td><input id="snowadvanced[flakeindex]" name="snowadvanced[flakeindex]" type="number" value="<?php if(empty($snowadvanced['flakeindex'])) { echo '999999'; } else { echo $snowadvanced['flakeindex']; } ?>" min="1" max="999999" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="snowadvanced[opacity]"><?php _e( 'Opacity' ); ?></label></th>
				<td><input id="snowadvanced[opacity]" name="snowadvanced[opacity]" type="text" value="<?php if(empty($snowadvanced['opacity'])) { echo '1'; } else { echo $snowadvanced['opacity']; } ?>" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="snowadvanced[deviceorientation]"><?php _e( 'Device Orientation' ); ?></label></th>
				<td><select id="snowadvanced[deviceorientation]" name="snowadvanced[deviceorientation]"><option value="true"<?php if($snowadvanced['deviceorientation'] == 'true') { echo ' selected'; } ?>><?php _e('Enabled'); ?></option><option value="false"<?php if($snowadvanced['deviceorientation'] == 'false') { echo ' selected'; } ?>><?php _e('Disabled'); ?></option></select></td>
			</tr>
		</table>
		<?php submit_button(); ?>
	</form>
	<?php
	} else {
	?>
	<form method="post" action="options.php">
		<?php settings_fields( 'snow_group' ); ?>
		<table class="form-table">
			<tr>
				<th scope="row"><label for="snow[flakecount]"><?php _e( 'Flake Count' ); ?></label></th>
				<td><input id="snow[flakecount]" name="snow[flakecount]" type="number" value="<?php if(empty($snow['flakecount'])) { echo '35'; } else { echo $snow['flakecount']; } ?>" min="1" max="300" /> <?php _e('flakes'); ?></td>
			</tr>
			<tr>
				<th scope="row"><label for="snow[image]"><?php _e( 'Flake Image' ); ?></label></th>
				<td><input id="image-url" name="snow[image]" type="text" placeholder="http://" value="<?php if(!empty($snow['image'])) { echo $snow['image']; } ?>" /> <?php if(!empty($snow['image'])) { ?><input type="button" class="button" id="clear" value="Remove" style="display:none" /> <?php } ?><input id="upload-button" type="button" class="button" value="Upload Image" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="snow[flakecolor]"><?php _e( 'Flake Color' ); ?></label></th>
				<td><input id="snow[flakecolor]" name="snow[flakecolor]" class="color-field" type="text" value="<?php if(empty($snow['flakecolor'])) { echo '#ffffff'; } else { echo $snow['flakecolor']; } ?>" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="snow[scrollwithscreen]"><?php _e( 'Snow Scroll with Screen' ); ?></label></th>
				<td><select id="snow[scrollwithscreen]" name="snow[scrollwithscreen]"><option value="fixed"<?php if($snow['scrollwithscreen'] == 'fixed') { echo ' selected'; } ?>><?php _e('Enabled'); ?></option><option value="absolute"<?php if($snow['scrollwithscreen'] == 'absolute') { echo ' selected'; } ?>><?php _e('Disabled'); ?></option></select></td>
			</tr>
			<tr>
				<th scope="row"><label for="snow[minsize]"><?php _e( 'Minimum Size' ); ?></label></th>
				<td><input id="snow[minsize]" name="snow[minsize]" type="number" value="<?php if(empty($snow['minsize'])) { echo '1'; } else { echo $snow['minsize']; } ?>" min="1" max="20" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="snow[maxsize]"><?php _e( 'Maximum Size' ); ?></label></th>
				<td><input id="snow[maxsize]" name="snow[maxsize]" type="number" value="<?php if(empty($snow['maxsize'])) { echo '2'; } else { echo $snow['maxsize']; } ?>" min="1" max="20" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="snow[minspeed]"><?php _e( 'Minimum Speed' ); ?></label></th>
				<td><input id="snow[minspeed]" name="snow[minspeed]" type="number" value="<?php if(empty($snow['minspeed'])) { echo '1'; } else { echo $snow['minspeed']; } ?>" min="1" max="50" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="snow[maxspeed]"><?php _e( 'Maximum Speed' ); ?></label></th>
				<td><input id="snow[maxspeed]" name="snow[maxspeed]" type="number" value="<?php if(empty($snow['maxspeed'])) { echo '5'; } else { echo $snow['maxspeed']; } ?>" min="1" max="50" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="snow[round]"><?php _e( 'Round' ); ?></label></th>
				<td><select id="snow[round]" name="snow[round]"><option value="true"<?php if($snow['round'] == 'true') { echo ' selected'; } ?>><?php _e('Enabled'); ?></option><option value="false"<?php if($snow['round'] == 'false') { echo ' selected'; } ?>><?php _e('Disabled'); ?></option></select></td>
			</tr>
			<tr>
				<th scope="row"><label for="snow[shadow]"><?php _e( 'Shadow' ); ?></label></th>
				<td><select id="snow[shadow]" name="snow[shadow]"><option value="true"<?php if($snow['shadow'] == 'true') { echo ' selected'; } ?>><?php _e('Enabled'); ?></option><option value="false"<?php if($snow['shadow'] == 'false') { echo ' selected'; } ?>><?php _e('Disabled'); ?></option></select></td>
			</tr>
		</table>
		<?php submit_button(); ?>
	</form>
	<?php
	}
	?>
</div>
<div id="img" style="display:none;">
	<p><?php _e('The image has been set.'); ?></p>
	<p><?php _e('You can change the size of your snow flake image by adjusting the'); ?> <code><?php _e('Maximum Size'); ?></code> <?php _e('option'); ?>.</p>
	<p><?php _e('To remove the snow flake image and revert back to the default snow flakes, remove the URL from the'); ?> <code><?php _e('Flake Image'); ?></code> <?php _e('option'); ?>.</p>
	<p><?php _e('Don\'t forget to save the settings.'); ?></p>
	<input type="button" class="button" id="close-img" value="<?php _e('OK, got it!'); ?>">
</div>
		<?php
	}
}

add_action( 'admin_init', function() {
	register_setting( 'snow_group', 'snow' );
	register_setting( 'snowadvanced_group', 'snowadvanced' );
});

add_action( 'admin_enqueue_scripts', function($hook) {
    if( is_admin() ) {
		if(isset($_GET['page']) && $_GET['page'] == 'snow') {
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'thickbox' );
			wp_enqueue_script( 'snow-admin-js', plugins_url( 'assets/admin.js', SNW_FILE ), array( 'wp-color-picker' ), false, true );
			wp_enqueue_style( 'snow-admin-css', plugins_url( 'assets/admin.css', SNW_FILE ), false, '1.0.0' );
			wp_enqueue_media();
			wp_enqueue_script( 'media-lib-uploader-snow', plugins_url( 'assets/media-lib-uploader.js' , SNW_FILE ), array('jquery') );
		}
    }
});

function snow_image() {
	global $snow;
	
	if(!empty($snow['image'])) {
		return '
		image: "' . $snow['image'] . '"';
	}
}

function snow_item( $default, $item, $arg, $cat, $comma ) {
	global $snow;
	global $snowadvanced;
	
	if(!empty($cat) && $cat == 'snow') {
		if(!empty($snow[$item]) && $snow[$item] !== $default) {
			if($comma === true) {
				return '
		' . $arg . ': "' . $snow[$item] . '",';
			} else {
				return '
		' . $arg . ': ' . $snow[$item] . ',';
			}
		}
	} elseif(!empty($cat) && $cat == 'snowadvanced') {
		if(!empty($snowadvanced[$item]) && $snowadvanced[$item] !== $default) {
			if($comma === true) {
				return '
		' . $arg . ': "' . $snowadvanced[$item] . '",';
			} else {
				return '
		' . $arg . ': ' . $snowadvanced[$item] . ',';
			}
		}
	}
}

add_action('wp_head', function() {
	global $snow;
	global $snowadvanced;

	$snow_return = '
jQuery(document).ready(function(){
	jQuery(document).snowfall({' . snow_item( '35', 'flakecount', 'flakeCount', 'snow', false ) . snow_item( '#ffffff', 'flakecolor', 'flakeColor', 'snow', true ) . snow_item( '999999', 'flakeindex', 'flakeIndex', 'snowadvanced', false ) . snow_item( 'absolute', 'scrollwithscreen', 'flakePosition', 'snow', true ) . snow_item( '1', 'minsize', 'minSize', 'snow', false ) . snow_item( '2', 'maxsize', 'maxSize', 'snow', false ) . snow_item( '1', 'minspeed', 'minSpeed', 'snow', false ) . snow_item( '5', 'maxspeed', 'maxSpeed', 'snow', false ) . snow_item( '1', 'opacity', 'opacity', 'snowadvanced', false ) . snow_item( 'false', 'round', 'round', 'snow', false ) . snow_item( 'false', 'shadow', 'shadow', 'snow', false ) . snow_item( 'false', 'deviceorientation', 'deviceorientation', 'snowadvanced', false ) . snow_image() . '
	});
});
';

	if(isset($snowadvanced['script']) && $snowadvanced['script'] == '1') {
		$snow_return = str_replace(' ', '', $snow_return);
		$snow_return = preg_replace('/\s+/', '', $snow_return);
		
		echo '<script type="text/javascript">';
		echo $snow_return;
		echo '</script>
';
	} else {
		echo '<script type="text/javascript">';
		echo $snow_return;
		echo '</script>
';
	}
});

add_action('wp_enqueue_scripts', function() {
	global $snowadvanced;

	wp_enqueue_script( 'jquery' );
	
	if(isset($snowadvanced['file']) && $snowadvanced['file'] == '1') {
		wp_register_script( 'snow', plugins_url( 'assets/snow.min.js', SNW_FILE ), array('jquery'), '1.0.0', false );
		wp_enqueue_script( 'snow' );
	} else {
		wp_register_script( 'snow', plugins_url( 'assets/snow.js', SNW_FILE ), array('jquery'), '1.0.0', false );
		wp_enqueue_script( 'snow' );
	}
});

add_filter( 'body_class', function( $classes ) {
    return array_merge( $classes, array( 'snow' ) );
} );

add_filter( 'plugin_action_links_' . plugin_basename( SNW_FILE ), function($link) {
	return array_merge( $link, array('<a href="' . admin_url( 'options-general.php?page=snow' ) . '">Settings</a>','<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=2VYPRGME8QELC" target="_blank" rel="noopener noreferrer">Donate</a>') );
} );