<?php

namespace SocialCentre;

class SocialCentre {

    private $debug;
    private $host;

    public function __construct( $host, $debug = false ) {

        // Set Debug status
        $this->debug = $debug;

        // Set Host
        $this->host = str_replace('http://', '', rtrim($host, '/'));

        // Check Compatibility
        if ( !$this->isCompatible() && $debug === true ) {
            exit('<strong>Incompatible SocialCentre:</strong> The version of SocialCentre installed on '. $this->host .' is not compatible with SC_API');
        }

    }

    /**
     * Check Compatibility
     */
    private function isCompatible() {

        // Get Version
        $version = file_get_contents('http://'. $this->host .'/admin/current-version.txt');

        // Make sure we have version number
        if ( !$version || !is_numeric($version) ) {
            return false;
        }

        // Check Compatibility
        if ( $version <= 2.06 ) {
            return true;
        }

        return true;

    }

    /**
     * Get Posts
     */
    public function getPosts() {

        // Debug - remove session
        if ( $this->debug && isset( $_SESSION['posts'] ) ) {
            session_destroy();
        }

        // Get Posts
        if ( !isset( $_SESSION['posts'] ) ) {
            $posts = file_get_contents('http://'. $this->host .'/admin/api.php?host='. $this->host);
        } else {
            return $_SESSION['posts']->content;
        }

        // Make sure we have data
        if ( !$posts ) {
            return false;
        }

        // Decode data
        $posts = json_decode($posts);

        // Make sure we have an array
        if ( !is_object($posts) ) {
            return false;
        }

        // Count posts
        $post_count = count($posts->content);

        // Fix array keys
        foreach( $posts->content as $post ) {
            $the_posts[$post->ID] = $post;
        }

        // Replace old array
        $posts->content = $the_posts;

        // Store posts
        $_SESSION['posts'] = $posts;

        // Return posts
        return $posts->content;

    }

    /**
     * Get Post
     */
    public function getPost( $ID ) {

        $posts = $this->getPosts();

        if ( !array_key_exists( $ID, $posts ) ) {
            return false;
        }

        return $posts[$ID];

    }

}
