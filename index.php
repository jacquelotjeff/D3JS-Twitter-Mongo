<?php

require 'config.php';

$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

require "oauth.php";

include('database/hashtags.php');
include('database/tweets-by-country.php');
include('database/tweets-on-time.php');
include('database/count-tweets.php');

$tweetsByCountries = getTweetsByCountries($manager);
$tweetsOnTime      = getTweetsOnTime($manager);
$hashtags          = getHashtags($manager);
$countTweets          = getCountTweets($manager);

var_dump($countTweets);

?>

<?php
    include 'common/header.php';
?>
        <h1>Big data</h1>
        <h2>Sujets entourant <?php echo $params['subject'] ?></h2>
        <div style="margin-left: 100px;width:500px; height:500px">
            <canvas id="tagCloud" width="400" height="400"></canvas>
        </div>
        <h2>Répartition par langue des tweets concernants <?php echo $params['subject'] ?></h2>
        <div style="margin-left: 100px;width:500px; height:500px">
            <canvas id="byCountry" width="40" height="40"></canvas>
        </div>
        <h2>Le plus retweeté</h2>
        <div style="margin-left: 100px;width:500px; height:500px">
            <canvas id="mostRetweeted" width="40" height="40"></canvas>
        </div>
        <h2>Popularité de <?php echo $params['subject'] ?> dans le temps</h2>
        <div style="width: 700px; height: 700px; position: absolute;">
            <canvas id="tweetsOnTime"></canvas>
        </div>

<?php
include 'common/footer.php';
?>