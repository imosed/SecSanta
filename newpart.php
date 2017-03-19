<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secret Santa Chooser</title>
    <link rel="stylesheet" href="/static/style.css" />
</head>
<body>
<div class="main">
    <?php
        if ($errors == 0) {
            mysql_connect("localhost", "user", "pass");
            mysql_select_db("ssdb");
        }
        $QUERY = "INSERT INTO PEOPLE (PERSON, MATCHED, ADDRESS, CITY, STATE, ZIP) VALUES (\"$_POST[pn]\", null, \"$_POST[psa]\", \"$_POST[pc]\", \"$_POST[ps]\", \"$_POST[pzc]\");";
        $INSQUERY = mysql_query($QUERY);
        if ($INSQUERY === FALSE) {
            echo "Could not insert records!";
        }
        else {
            echo "Success (redirecting, please wait)!";
            echo "<script type=\"text/javascript\">";
            echo "window.location = '/';";
            echo "</script>";
        }
    ?>
</div>
</body>
</html>
