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
        function gencode($s) {
            /*$ln = explode(' ', $s)[1];
            $c = $s[0];
            $c = $c . $ln[0];
            $c = $c . $ln[strlen($ln) - 1];
            $c = $c . strlen(str_replace(' ', '', $s));*/
            return strtolower($s);
        }

        if ($errors == 0) {
            mysql_connect("localhost", "user", "pass");
            mysql_select_db("ssdb");
        }

        $USER = $_POST["pname"];
        $QUERY = "SELECT * FROM PEOPLE WHERE PERSON = \"$USER\";";
        $EXQUERYRES = mysql_query($QUERY);
        $HASMATCHQUERY = mysql_fetch_array(mysql_query($QUERY));
        if (mysql_num_rows($EXQUERYRES) != 1 && $HASMATCHQUERY[2] == null) {
            echo "<p>You don't exist in the database (redirecting, please wait).</p>";
            echo "<script type=\"text/javascript\">";
            echo "window.location = '/reg.php';";
            echo "</script>";
        } else if ($HASMATCHQUERY[2] == null) {
            $QUERY = "SELECT * FROM PEOPLE WHERE NOT PERSON = \"$USER\" AND CHOSEN = 0 ORDER BY PERSON;";
            $QUERYRES = mysql_query($QUERY);
            $people = array();
            while (($row = mysql_fetch_array($QUERYRES))) {
                $people[] = $row;
            }
            $choice = rand(0, count($people)-1);
            $choice = $people[$choice];
            echo "<h1>Your match is $choice[1]!</h1>";
            echo "<p>Send your gift to the following address...</p>";
            echo "<ul class=\"ssloc\"><li class=\"location\">$choice[3]</li><li class=\"location\">$choice[4], $choice[5] $choice[6]</li></ul>";
            $ASSIGNCHOSEN = "UPDATE PEOPLE SET CHOSEN=1 WHERE PERSON=\"$choice[1]\";";
            $CHOSENQUERY = mysql_query($ASSIGNCHOSEN);
            if ($CHOSENQUERY === FALSE) {
                echo "<p>Could not assign your match to 'chosen'.</p>";
                echo "<p>Please tell Jared in the group chat or text him.</p>";
            }
            $ASSIGNMATCH = "UPDATE PEOPLE SET MATCHED=\"$choice[1]\" WHERE PERSON=\"$USER\";";
            $MATCHQUERY = mysql_query($ASSIGNMATCH);
            if ($MATCHQUERY === FALSE) {
                echo "<p>Could not assign a match to you!</p>";
                echo "<p>Please tell Jared in the group chat or text him.</p>";
            }
        } else if ($HASMATCHQUERY[2] != null && strtolower($_POST['mcode']) == gencode($HASMATCHQUERY[2])) {
            $MATCHEDQUERY = "SELECT * FROM PEOPLE WHERE PERSON = \"$HASMATCHQUERY[2]\";";
            $MATCHEDINFO = mysql_fetch_array(mysql_query($MATCHEDQUERY));
            echo "<h1>Your match is $HASMATCHQUERY[2]!</h1>";
            echo "<p>Send your gift to the following address...</p>";
            echo "<ul class=\"ssloc\"><li class=\"location\">$MATCHEDINFO[3]</li><li class=\"location\">$MATCHEDINFO[4], $MATCHEDINFO[5] $MATCHEDINFO[6]</li></ul>";
            echo "<form action=\"addch.php\" method=\"POST\">";
            echo "<input type=\"hidden\" name=\"foruser\" value=\"$HASMATCHQUERY[1]\">";
            echo "<input class=\"nusub\" type=\"submit\" value=\"Set address\">";
            echo "</form>";
        } else if ($HASMATCHQUERY[2] != null && strtolower($_POST['mcode']) != gencode($HASMATCHQUERY[2])) {
            echo "Your match code was incorrect (or you didn't type one)...";
            echo "I hope you remember your match.";
        }
    ?>
</div>
</body>
</html>
