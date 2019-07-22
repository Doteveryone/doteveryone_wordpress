<?php

/**
 * @package One CPT
 * @version 0.2
 */
/*
Plugin Name: DotEveryone Helper Plugin
Plugin URI:
Description: Assorted DE functionality
Author: Felix Cohen
Version: 0.2
Author URI: http://felixcohen.co.uk/
*/

function de_one_third( $atts, $content = null ) {
   return '<div class="content_row"><div class="one">' . do_shortcode($content) . '</div>';
}

add_shortcode('one_third', 'de_one_third');


function de_two_third( $atts, $content = null ) {
   return '<div class="two">' . do_shortcode($content) . '</div></div>';
}

add_shortcode('two_third', 'de_two_third');


function de_one_half( $atts, $content = null ) {
   return '<div class="content_row"><div class="half">' . do_shortcode($content) . '</div>';
}

add_shortcode('one_half', 'de_one_half');


function de_two_half( $atts, $content = null ) {
   return '<div class="half">' . do_shortcode($content) . '</div></div>';
}

add_shortcode('two_half', 'de_two_half');