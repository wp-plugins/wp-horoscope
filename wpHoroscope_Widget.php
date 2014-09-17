<?php

/**
 * Project : wp-weather
 * User: thuytien
 * Date: 9/2/2014
 * Time: 2:57 PM
 */
class wpHoroscope_Widget extends scbWidget
{

    function __construct()
    {
        parent::__construct('wp-horoscope-widget', 'Horoscope widget', array(
            'description' => 'Hiển thị thông tin cung hoàng đạo lên sidebar.'
        ));
    }

function form($instance)
{
    echo html('p', $this->input(array(
        'type' => 'text',
        'name' => 'title',
        'desc' => 'Title:'
    ), $instance));
    echo html('p', $this->input(array(
        'type' => 'text',
        'name' => 'zodiac',
        'value' => 'random',
        'desc' => 'Tên cung ( viết thường, không dấu, không khoảng cách ):'
    ), $instance));
    echo html('p', $this->input(array(
        'type' => 'text',
        'name' => 'width',
        'value' =>'100%',
        'desc' => 'Chiều rộng ( Kèm đơn vị ):'
    ), $instance));
    echo html('p', $this->input(array(
        'type' => 'text',
        'name' => 'height',
        'value' =>'auto',
        'desc' => 'Chiều cao ( Kèm đơn vị ):'
    ), $instance));
}

function content($instance)
{
    include_once dirname( __FILE__ ) . '/functions.php';
    if($instance['zodiac'] == '')
    {
        echo "bạn phải nhập tên cung hoàng đạo : viết tường, không dấu, không khoảng cách.";
    }
    $result = getZodiacInfo($instance['zodiac']);
    if($result->error)
    {
        echo $result->error;
    }
    $zodiac = $result->zodiac[0];
    $html = sprintf('<div class="zodiac-widget" style="width:%4$s;height:%5$s"><img class="zodiac-image" src="%3$s"><span class="zodiac-name">%1$s</span><p class="zodiac-content">%2$s</p></div>', $zodiac->label, $zodiac->content, plugins_url("/images/".$zodiac->image, __FILE__), $instance['width'], $instance['height']);
    echo $html;
}
} 