# Annotation-tool #
This is the annotation tool I use in order to annotate the data for my thesis

# Usage #
The database used has two tables a table called `tweet` and a table called `annotated`
the `tweet` tables has the following fields: id, text. And the `annotated` table has the fields:
id, tweet_id, sentiment.

The tool should work if you change the function `pdo()` in the function.php file. To whatever database
you are using.
