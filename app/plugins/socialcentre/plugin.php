<?php

/**
 * @package SocialCentre
 *
 * Plugin for getting
 * SocialCentre posts
 */

$sc = array(
    'host'      => str_replace('http://', '', SITE_DOMAIN)
);

if ( $posts = file_get_contents(SITE_DOMAIN .'/admin/api.php?host='. $sc['host']) ) {
    $variables->addVar('posts', json_decode($posts, TRUE));
}

print_r($variables->posts);
