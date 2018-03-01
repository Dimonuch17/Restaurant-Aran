<?php
/*
 * Uninstaller
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) { exit; }

$options = array('snow','snowadvanced');

foreach ( $options as $option ) {
	if ( get_option( $option ) ) {
		delete_option( $option );
	}
}