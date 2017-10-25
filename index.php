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
</body>
</html>
