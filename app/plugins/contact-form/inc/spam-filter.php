<?php

function is_spam( $content ) {

    /**
     * List of words considered
     * to be spammy.
     *
     * If the message contains
     * a spam word, reject it.
     *
     * Spam list is hosted on
     * searchitlocal.co.uk domain.
     */
    $spam_words = file_get_contents('http://www.searchitlocal.co.uk/spam.txt');
    $spam_words = str_replace("\n", '|', $spam_words);

    $words = explode('|', $spam_words);

    /*
     * Loop through each word
     * and check to see if it
     * appears in the message.
     */
    $i = 0;
    while ($i < count($words)) {

        if (strpos(strtolower(' ' . $content), $words[$i])) {
            $spam = 1;
        }

        $i++;

    }

    /**
     * If $spam is set to 1 by
     * the loop, return false so
     * the input becomes invalid
     * and will the script will
     * not continue.
     */
    if (!empty($spam) && $spam == 1) {
        return true;
    } else {
        return false;
    }

}
