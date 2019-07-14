<?php
include_once('./session.php');
include_once('./header.php');
?>

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
            <a onclick="getWitz()" class="btn btn-primary">Noch einer</a>
        </div>
    </div>
  
   
    <img src="https://belikebill.ga/billgen-API.php?default=1" />
   


<script>
window.onload = function () {
    getWitz()
}

function getWitz(){
fetch('http://api.icndb.com/jokes/random?')
  .then(response => response.json())
  .then(json => document.getElementById('witz').innerHTML = json.value.joke)
}




</script>