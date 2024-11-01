<?php
/*
Plugin Name: StableHits - Website Traffic Redirector
Description: Redirect traffic from StableHits to a random post on your website.
Author: StableHits
Tags: stablehits, website traffic, redirect
Author URI: https://stablehits.com/
Version: 1.0.0
*/

function stablehits_redirect() {
    if (  '/stablehits' == $_SERVER['REQUEST_URI'] || '/stablehits/' == $_SERVER['REQUEST_URI'] ) {
        foreach ( get_posts ( array( 'numberposts' => 1, 'orderby' => 'rand' ) ) as $post ) {
            wp_redirect ( get_permalink ( $post->ID ) , 302 );
            exit;
        }
    }
}
add_action( 'template_redirect', 'stablehits_redirect' );
