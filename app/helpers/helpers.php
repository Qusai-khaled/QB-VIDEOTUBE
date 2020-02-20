<?php

// add active to side bar
function is_active(string $routeName)
{
    return null !== request()->segment(2) && request()->segment(2) == $routeName ? 'active' : '';
}

// get Youtube Id
function getYoutubeId($url)
{
    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
    return isset($match[1]) ? $match[1] : null;
}
