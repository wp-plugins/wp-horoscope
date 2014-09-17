<?php
/*
Plugin Name: WP Horoscope
Version: 1.0.0
Description: WP Horoscope giúp hiển thị thông tin trong ngày của các cung hoàng đạo.
Author: Vô Minh
Plugin URI: http://laptrinh.senviet.org
*/

include_once dirname(__FILE__) . '/scb/load.php';
function _wphoroscope_init()
{
    include_once dirname(__FILE__) . '/shortcode.php';
    include_once dirname(__FILE__) . '/wpHoroscope_Widget.php';
    scbWidget::init('wpHoroscope_Widget');
    if(is_active_widget(false, false, "wp-horoscope-widget"))
    {
        wp_enqueue_style("wphoroscope-style", plugins_url("/css/wp-horoscope.css", __FILE__));
    }
}
$GLOBALS['_scb_data'] = array( 60, __FILE__, array(
    'scbUtil', 'scbOptions', 'scbForms', 'scbWidget'
) );
scb_init('_wphoroscope_init');
