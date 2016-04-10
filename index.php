<?php require "functions.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Annotatie</title>
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
            <header>
                <p>
                    Deze website is gemaakt om het annoteren van de data voor mijn
                    scriptie te vereenvoudigen.
                </p>
                <p>
                    De bedoeling is dat de tweets die op deze pagina staan
                    worden ingedeeld in één van de volgende drie categorieën:
                    <strong class="u">positief</strong>,
                    <strong class="u">negatief</strong> of
                    <strong class="u">neutraal</strong>
                </p>
                <p>
                    Probeer objectief de tekst te beoordelen. Bijvoorbeeld als er staat:
                    <q>Yes, Ajax heeft gewonnen</q> beoordeel dit dan als <strong class="u">positief</strong>
                    ook al ben je voor Feyenoord.
                </p>
                <p>
                    De website is te gebruiken door op de knoppen te klikken of met behulp van de
                    volgende toetsen op het toetsenbord:
                    <span class="button"><strong>&larr; links</strong></span> (<strong>positief</strong>),
                    <span class="button"><strong>&rarr; rechts</strong></span> (<strong>negatief</strong>),
                    <span class="button"><strong>&uarr; omhoog</strong></span> (<strong>neutraal</strong>)
                    <span class="button"><strong>&darr; omlaag</strong></span> (<strong>geen idee</strong>)
                </p>
            </header>
            <hr>
            <?php if (!$tweet): ?>
                <p class="tweet">
                    Alles is geannoteerd! Thanks!
                </p>
            <?php else: ?>
                <p class="tweet">
                    <?php echo $tweet->text ?>
                </p>

                <form id="annotate" class="annotate" action="annotate.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $tweet->id; ?>">
                    <input type="submit" name="sentiment" value="positief" id="positive">
                    <input type="submit" name="sentiment" value="neutraal" id="neutral">
                    <input type="submit" name="sentiment" value="negatief" id="negative">
                    <input type="submit" name="sentiment" value="geen idee" id="noidea">
                </form>
            <?php endif; ?>
            <footer>
                Copyright (c) 2016 Robbert Stevens All Rights Reserved.
            </footer>
        </section>
        <script>
            function handler(e) {
                var keys = [37, 38, 39, 40];

                if ( keys.indexOf(e.keyCode) == -1 )
                    return;

                if ( e.keyCode == 37 ) // Left
                    document.getElementById("positive").click();

                if ( e.keyCode == 38 ) // Up
                    document.getElementById("neutral").click();

                if ( e.keyCode == 39 ) // Right
                    document.getElementById("negative").click();

                if ( e.keyCode == 40 ) // Down
                    document.getElementById("noidea").click();

                document.removeEventListener("keyup", handler, false);
            }
            document.addEventListener("keyup", handler, false);
        </script>
    </body>
</html>
