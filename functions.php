<?php
function pdo()
{
    $dsn = "sqlite:annotation.sqlite3";
    $pdo = new PDO($dsn);

    return $pdo;
}
function tweet()
{
    $pdo = pdo();

    $query = "SELECT id, `text` FROM tweet WHERE (
        SELECT count(*) FROM annotated WHERE tweet_id = tweet.id
    ) < 3 ORDER BY RANDOM() LIMIT 1";

    $stmt = $pdo->prepare($query);

    if ( !$stmt->execute() )
        return false;

    $tweet = $stmt->fetchObject();

    if ( !$tweet )
        return false;

    return $tweet;
}

function add_sentiment($id, $sentiment)
{
    $pdo = pdo();

    $query = "INSERT INTO annotated(tweet_id, sentiment) VALUES(:id, :sentiment)";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":sentiment", $sentiment);
    return $stmt->execute();
}

function stats()
{
    $pdo = pdo();

    $query = "SELECT
    	(SELECT count(*) FROM annotated WHERE sentiment = 'negatief') AS negative,
    	(SELECT count(*) FROM annotated WHERE sentiment = 'positief') AS positive,
    	(SELECT count(*) FROM annotated WHERE sentiment = 'neutraal') AS neutral,
        (SELECT count(*) FROM tweet) as total_tweets,
        (SELECT count(*) FROM annotated) as total_annotations";

    $stmt = $pdo->prepare($query);

    if ( !$stmt->execute() )
        return false;

    $stats = $stmt->fetchObject();

    if ( !$stats )
        return false;

    return $stats;
}
$tweet = tweet();
