<?php
//formatting date

function formatDate($date) {
    return date('F j, g:i, a', strtotime($date));
    
}

//shorten text for main posts page

function shortenText($text, $chars = 100) {
    $text = $text.'';
    $text = substr($text, 0, $chars);
    $text = substr($text, 0, strrpos($text,' '));
    $text = $text.'...';
    return $text;
    
}







?>