<?php
/*
Plugin Name: External Link Warning
Plugin URI: https://github.com/richardhu714/Yourls-Plugin-ExternalLinkWarning
Description: Warn visitors that they are about to visit an external link
Version: 1.0
Author: Richard Hu
Author URI: https://github.com/richardhu714
*/

// No direct call
if (!defined('YOURLS_ABSPATH')) die();
// Hook our custom function into the 'pre_redirect' event
yourls_add_action('pre_redirect', 'link_warning');

// Our custom function that will be triggered when the event occurs
function warn_pages($url)
{
    $htm = '<!DOCTYPE html><html>
    <head>
        <title>Warning!</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <style>
    
            * {
                box-sizing: border-box;
            }
    
            body {
                background: #F4696A;
                margin: 0;
            }
    
            body div {
                position: absolute;
                top: calc(50% - 207px);
                width: 100%;
            }
    
            body div i {
                font-style: normal;
                width: 200px;
                height: 200px;
                line-height: 200px;
                border-radius: 100%;
                display: block;
                margin: 0 auto;
                background: #fff;
                text-align: center;
                color: #F4696A;
                font-size: 6em;
                font-family: "Microsoft YaHei";
            }
    
            body div p,
            body div h2 {
                color: #fff;
                text-align: center;
                margin: 0;
                margin-top: 20px;
            }
    
            body div blockquote {
                background: #fff;
                text-align: center;
                max-width: 352px;
                margin: 0 auto;
                margin-top: 20px;
                border-radius: 6px;
                padding: 10px;
                overflow-y: auto;
                color: #5a5f69;
            }
    
            body div blockquote::-webkit-scrollbar {
                width: 6px;
                height: 6px;
            }
    
            body div blockquote::-webkit-scrollbar-thumb {
                border-radius: 10px;
                background-color: #888;
            }
    
            body div a,
            body div a:hover,
            body div a:focus {
                transition: all .35s;
                width: 100px;
                display: block;
                color: #fff;
                margin: 0 auto;
                margin-top: 20px;
                text-decoration: none;
                outline: none;
                border: 1px solid #fff;
                border-radius: 6px;
                text-align: center;
                line-height: 33px;
            }
    
            body div a:hover {
                background: rgba(255, 255, 255, .2);
            }
        </style>
    </head>
    
    <body>
        <div>
            <i>!</i>
            <h2>Warning</h2>
            <p>You are about to visit a external link</p>
            <blockquote>' . $url . '</blockquote>
            <a href="' . $url . '">Go!</a>
        </div>
    </body>
    
    </html>';
    echo $htm;
}
function link_warning($args)
{

//////////////////////////////////////////////////////////////////
$your_site='mywebsite.com'; //type your website address in front//
//////////////////////////////////////////////////////////////////
    
    $url = $args[0];
    $code = $args[1];
    if (strpos($url, $your_site)==false) {
        warn_pages($url);
        die();
    }
}
