
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/bootstrap.min.css" >
    <link rel="stylesheet" href="./css/bootstrap.css" >
    <link rel="stylesheet" href="./css/style.css">
</head>
</body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
        <a class="navbar-brand" href="#">Generator</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="./index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./add.php">Add</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./gen.php">Genrate</a>
            </li>
          </ul>
        </div>
        <?php
        if(!empty($_SESSION['vorName'])){
          echo ('<div class="form-inline my-2 my-lg-1 ">');
          echo  ('<p class="text-secondary pt-2"><strong>Willkommen, ' .  $_SESSION['vorName'] . ' <a href="./logout.php">Logout</a> </strong></p>)');

          echo ('</div>');
        }


        ?>
      </nav>
