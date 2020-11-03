<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Kntnt Remove User Profile Avatar
 * Plugin URI:        https://www.kntnt.com/
 * Description:       Removes the standard profile image from user edit screen.
 * Version:           1.0.0
 * Author:            Thomas Barregren
 * Author URI:        https://www.kntnt.com/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 */


namespace Kntnt\Remove_User_Profile_Avatar;

defined( 'ABSPATH' ) && new Plugin;

class Plugin {

    private $dont_show = false;

    public function __construct() {
        add_action( 'personal_options', [ $this, 'personal_options' ] );
        add_filter( 'pre_option_show_avatars', [ $this, 'pre_option_show_avatars' ] );
    }

    public function personal_options() {
        $this->dont_show = true;
    }

    public function pre_option_show_avatars( $pre ) {
        if ( $this->dont_show ) {
            $pre = null; // Must be equivalent but *not* identical to false
        }
        return $pre;
    }

}