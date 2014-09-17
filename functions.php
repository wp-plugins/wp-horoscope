<?php
require_once dirname( __FILE__ ) . '/libs/Curl.class.php';
function getZodiacInfo($zodiac = "")
{
    if( ($zodiac == "random") || ($zodiac == "")) {
        $zodiac = getRandomZodiac();
    }
    $curl = curlClass::getInstance();
    $content = $curl->fetchURL("http://senviethoroscop.appspot.com/zodiac.json?zodiac=".$zodiac);
    return json_decode($content);
}

function getRandomZodiac()
{
    $zodiacArray = array(
        'bachduong',
        'kimnguu',
        'songtu',
        'cugiai',
        'sutu',
        'xunu',
        'thienbinh',
        'hocap',
        'nhanma',
        'maket',
        'baobinh',
        'songngu'
    );
    return $zodiacArray[array_rand($zodiacArray)];
}