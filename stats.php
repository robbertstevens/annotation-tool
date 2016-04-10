<?php require "functions.php"; $stats = stats(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Annotatie - Stats</title>
        <style media="screen">
            body {
                font-size: 25px;
                font-family: serif;
            }
            strong {
                font-variant: small-caps;
            }
            section {
                width: 720px;
                margin: 0 auto
            }
            footer {
                margin-top: 20px;
                font-size: 0.5em;
                text-align: center;
                color: #aaa;
            }
            p {
                font-size: 1em;
            }
            p.tweet {
                font-size: 1.5em;
                background: #efefef;
                padding: 10px;
                border: 1px solid #000;
            }
            form.annotate {
                text-align: center;
            }
            input[type="submit"] {
                cursor: pointer;
                font-variant: small-caps;
                font-size: 1.5em;
                padding: 5px 15px;
                background: #eee;
                border: 1px solid #999;
                font-weight: bold;
            }
            input[type="submit"]:hover {
                background: #aaa;
            }
            hr {
                border: 2px solid;
            }
            span.button {
                font-size: 0.7em;
                background: #eee;
                border: 1px solid #999;
                display: inline-block;
                padding: 3px 5px;
            }
            .u {
                text-decoration: underline;;
            }
        </style>
    </head>
    <body>

        <section>
            <h1>Stats</h1>
            <p>
                Er zijn <?php echo $stats->positive; ?> <strong class="u">positief</strong> geannoteerde tweets
            </p>

            <p>
                Er zijn <?php echo $stats->negative; ?> <strong class="u">negatief</strong> geannoteerde tweets
            </p>

            <p>
                Er zijn <?php echo $stats->neutral; ?> <strong class="u">neutral</strong> geannoteerde tweets
            </p>
            <p>
                Het totale aantal tweets in de database is <?php echo $stats->total_tweets; ?> en het totale aantal
                annotaties is <?php echo $stats->total_annotations; ?>
            </p>
            <footer>
                Copyright (c) 2016 Robbert Stevens All Rights Reserved.
            </footer>
        </section>

    </body>
</html>
