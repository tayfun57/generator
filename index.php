<?php
include_once('./session.php');
include_once('./header.php');
?>

<div class="container">
    <div class="jumbotron">
    <h1 class="display-4">Hallo, <?= $_SESSION['vorName']?>!</h1>
    <p class="lead">Hier könnten in Zukunft wichtige Informationen stehen wie anstehende Termine, Klausuren etc.</p>
    
    </div>
</div>