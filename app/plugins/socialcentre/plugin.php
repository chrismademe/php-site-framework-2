<?php

### IMPORTANT: Remove the _ from the
### plugin filename to activate.

/**
 * @package SocialCentre
 * @version 0.1.0
 *
 * Plugin for getting
 * SocialCentre posts
 *
 *
 * Posts
 * ====================
 * Posts are available in
 * your templates by accessing
 * the 'posts' variable which
 * contains an array of post
 * objects.
 *
 *
 * Single post
 * ====================
 * A single post will be
 * loaded in to the 'post'
 * variable on the blog
 * page set in the config.php.
 *
 *
 * Templates
 * ====================
 * See the templates/
 * folder for example
 * templates.
 */

use SocialCentre\SocialCentre;

/**
 * Get Config
 */
require_once __DIR__ .'/config.php';

/**
 * Include SocialCentre class
 */
require_once __DIR__ .'/SocialCentre/SocialCentre.php';

/**
 * Connect to SocialCentre
 */
$SC = new SocialCentre( SITE_DOMAIN );

/**
 * Get Posts
 */
if ( $posts = $SC->getPosts() ) {
    $variables->addVar('posts', $posts);
}

/**
 * Get Single Post
 */
if ( is_index( $SocialCentre['page'] ) && isset( $index[1] ) && $post = $SC->getPost( $index[1] ) ) {
    $variables->addVar('post', $post);
}
