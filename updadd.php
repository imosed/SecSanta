<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secret Santa Chooser</title>
    <link rel="stylesheet" href="/static/style.css" />
</head>
<body>
<div class="main">
    <h1>Changing address</h1>
    <?php
        if ($errors == 0) {
            mysql_connect("localhost", "user", "pass");
            mysql_select_db("ssdb");
        }
        $UPDFOR = $_POST["pn"];
        $ADDR = $_POST["psa"];
        $CITY = $_POST["pc"];
        $STAT = $_POST["ps"];
        $ZIPC = $_POST["pzc"];
        $QUERY = "UPDATE PEOPLE SET ADDRESS=\"$ADDR\", CITY=\"$CITY\", STATE=\"$STAT\", ZIP=\"$ZIPC\" WHERE PERSON = \"$UPDFOR\";";
        $ADDRQ = mysql_query($QUERY);
        if ($ADDRQ === FALSE)
            echo "Failed to update.";
        else
            echo "Success!";
    ?>
    <script type="text/javascript">window.location = '/';</script>
</div>
</body>
</html>
