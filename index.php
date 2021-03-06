<?php
include_once('./session.php');
include_once('./header.php');
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    

    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Hallo, <?= $_SESSION['vorName']?>!</h1>
            <p class="lead">Hier könnten in Zukunft wichtige Informationen stehen wie anstehende Termine, Klausuren etc.</p>
        </div>

        <div class="card mb-3">
            <div class="card-header">
            Random Chuck Norris Witz
            </div>
            <div class="card-body">
                <p id="witz" class="card-text"></p>
                <a onclick="getWitz()" class="btn btn-primary">Noch einer</a><br><br>
                Witze bereitgestellt von <a href="http://www.icndb.com/">www.icndb.com<a>
            </div>
        </div>
    </div>

<script>
window.onload = function () {
    getWitz()
}

function getWitz(){
fetch('https://api.icndb.com/jokes/random?')
  .then(response => response.json())
  .then(json => document.getElementById('witz').innerHTML = json.value.joke)
}
</script>
</body>
</html>

