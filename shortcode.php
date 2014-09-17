<?php
include_once dirname(__FILE__) . '/functions.php';
add_shortcode('horoscope', 'horoscrope_shortcode');
function horoscrope_shortcode($atts)
{
    extract(shortcode_atts(
            array(
                'zodiac' => 'random',
                'wrapper' => 'p',
                'wrapper_class' => 'zodiac',
                'style' => 'inline',
                'width' => '100%',
                'height' => 'auto'
            ), $atts)
    );
    $result = getZodiacInfo($zodiac);
    if ($result->error) {
        return $result->error->message;
    }
    $zodiac = $result->zodiac[0];
    if ($style == 'widget') {
        $html = sprintf('<div class="zodiac-widget" style="width:%4$s;height:%5$s"><img class="zodiac-image" src="%3$s"><span class="zodiac-name">%1$s</span><p class="zodiac-content">%2$s</p></div>', $zodiac->label, $zodiac->content, plugins_url("/images/" . $zodiac->image, __FILE__), $width, $height);
    } else if ($style == 'inline') {
        $html = sprintf('<%1$s class="%2$s"><span class="zodiac-name">%3$s</span> : <span class="zodiac-content">%4$s</span></%1$s>', $wrapper, $wrapper_class, $zodiac->label, $zodiac->content);
    } else {
        $html = "Sai tham số style trong shortcode";
    }
    return $html;
}