<?php require 'functions.php';

/* The sentiments that are valid */
$sentiments = ["positief", "negatief", "neutraal"];

/* The sentiment that has been chosen */
$sentiment = $_POST["sentiment"];

if ( in_array($_POST["sentiment"], $sentiments) )
{
    /*  If the sentiment that's chosen is in the sentiment list
        continue
     */
    $tweet_id = $_POST["id"];

    if ( !is_numeric($tweet_id) )
        /*  Someone tempered with the input field just redirect to
            the main page Like nothing happened
         */
        header("Location: ./");

    if ( !add_sentiment($tweet_id, $sentiment) )
        die("something went wrong");

}

header("Location: ./");
