<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secret Santa Chooser</title>
    <link rel="stylesheet" href="/static/style.css" />
</head>
<body>
<div class="main">
    <h1>Change address information</h1>
    <?php
        if ($errors == 0) {
            mysql_connect("localhost", "user", "pass");
            mysql_select_db("ssdb");
        }
        $UPDFOR = $_POST["foruser"];
        $QUERY = "SELECT * FROM PEOPLE WHERE PERSON = \"$UPDFOR\";";
        $ADDRQ = mysql_fetch_array(mysql_query($QUERY));
        echo "<form action=\"/updadd.php\" method=\"POST\">";
        echo "<div>Input your name <input name=\"pn\" class=\"part-info\" type=\"text\" disabled=\"true\" value=\"$ADDRQ[1]\" /></div>";
        echo "<div>Input your street address <input name=\"psa\" class=\"part-info\" type=\"text\" value=\"$ADDRQ[3]\" /></div>";
        echo "<div>Input your city <input name=\"pc\" class=\"part-info\" type=\"text\" value=\"$ADDRQ[4]\" /></div>";
        echo "<div>Input your state abbreviation <input name=\"ps\" id=\"ps\" maxlength=\"2\" class=\"part-info\" type=\"text\" value=\"$ADDRQ[5]\" /></div>";
        echo "<div>Input your zip code <input name=\"pzc\" class=\"part-info\" type=\"text\" value=\"$ADDRQ[6]\" /></div>";
        echo "<div><input class=\"nusub\" type=\"submit\" value=\"Submit\" /></div>";
        echo "</form>";
    ?>
</div>
<script type="text/javascript">
    document.getElementById('ps').addEventListener('blur', function() { this.value = this.value.toUpperCase(); }, false);
</script>
</body>
</html>
