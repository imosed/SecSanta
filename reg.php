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
        echo "<h1>You don't exist in the database</h1>";
        echo "<p>Please use proper capitalization</p>";
        echo "<form action=\"/newpart.php\" method=\"POST\">";
        echo "<div>Input your name <input name=\"pn\" class=\"part-info\" type=\"text\" placeholder=\"First and last\" /></div>";
        echo "<div>Input your street address <input name=\"psa\" class=\"part-info\" type=\"text\" placeholder=\"Don't use abbreviations\" /></div>";
        echo "<div>Input your city <input name=\"pc\" class=\"part-info\" type=\"text\" placeholder=\"Don't include your state\" /></div>";
        echo "<div>Input your state abbreviation <input name=\"ps\" class=\"part-info\" type=\"text\" placeholder=\"Only two letters!\" /></div>";
        echo "<div>Input your zip code <input name=\"pzc\" class=\"part-info\" type=\"text\" placeholder=\"This is self explanatory\" /></div>";
        echo "<div><input class=\"nusub\" type=\"submit\" value=\"Submit\" /></div>";
        echo "</form>";
    ?>
</div>
</body>
</html>