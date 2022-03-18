<?php
/*
Plugin Name:  Hide Image for Guest
Plugin URI:   https://aya.sanusi.id
Description:  Hide image for guets user
Version:      20220318
Author:       Yuriko Aya
Author URI:   https://aya.sanusi.id
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
*/

add_action('the_content', 'hide_image');
function hide_image($content) {
    global $post;
    if (!is_user_logged_in()) {
        $dom_document = new domDocuemnt;
        $dom_document->loadHTML($content);
        $images = $dom_document->getElementByTagName(img);
        foreach ($image as $image) {
            $info = $dom_document->createElement('i', 'Login to see the image');
            $image->parentNode->replaceChild($info, $image);
        }
        return $dom_document->saveHTML();
    } else {
        return $content;
    }
}