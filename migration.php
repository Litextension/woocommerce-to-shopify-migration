<?php

/*
Plugin Name: osCommerce to Woocommerce Migration
Plugin URI: http://litextension.com/woocommerce-migration-tool/osCommerce-to-woocommerce.html
Description: Allows migration products, customers, orders, passwords and other data from osCommerce to WooCommerce automatically
Version: 1.0.0
Author: LitExtension
Author URI: http://litextension.com/
License: GPLv2
*/

/*
Copyright (C) 2017 LitExtension

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
*/

function cswm_menu()
{
    add_menu_page('LitExtension: osCommerce to Woocommerce Migration', 'osCommerce to Woocommerce Migration', 'activate_plugins', 'cswm_page', 'cswm_page');
}
add_action('admin_menu', 'cswm_menu');

function cswm_page(){
    $source_cart = 'osCommerce';
    $product_link = 'http://litextension.com/woocommerce-migration-tool/osCommerce-to-woocommerce.html';
    $img_url = cswm_url('img/logo.jpg');
    include 'views/index.php';
}

function cswm_css_js(){
    wp_enqueue_style('cswm-style', plugins_url('css/style.css', __FILE__));
}
add_action('admin_enqueue_scripts', 'cswm_css_js');

function cswm_url($path){
    return plugins_url($path, __FILE__);
}
