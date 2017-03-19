<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secret Santa Chooser</title>
    <link rel="stylesheet" href="/static/style.css" />
</head>
<body>
<div class="main">
    <h1>Secret Santa Savagery</h1>
    <span style="font-size: 9px;">Note: you may have to register first, but once you're finished, just retype your name into this box</span>
    <form action="./match.php" method="POST">
        <input type="text" class="part-name large" placeholder="Your name (first and last)" name="pname">
        <button type="submit" class="sname"></button>
        <input type="text" class="part-name small match-code" placeholder="Match (optional)" name="mcode">
        <input type="button" class="hfe" id="hlpb"></input>
    </form>
    <!--<div id="mcinst" style="display: none;">
        <p>Your match code consists of the following:</p>
        <ul>
            <li>First letter of match's first name</li>
            <li>First letter of match's last name</li>
            <li>Last letter of match's last name</li>
            <li>Number of non-space characters in match's full name</li>
        </ul>
        <p>This string is case insensitive.</p>
        <p>So, for example, if your match's name is Gary Johnson, your match code would be &quot;GJN11&quot;.</p>
    </div>-->
</div>
<!--<script type="text/javascript">
    document.getElementById('hlpb').addEventListener('mouseup', function() { document.getElementById('mcinst').style.display = 'block'; }, false);
    document.getElementById('hlpb').addEventListener('touchend', function() { document.getElementById('mcinst').style.display = 'block'; }, false);
</script>-->
</body>
</html>