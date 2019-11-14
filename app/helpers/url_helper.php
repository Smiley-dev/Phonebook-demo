<?php

function redirect($url){
    $url = URLROOT . $url;
    header('Location: ' . $url);
}