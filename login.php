<?php
session_start();
require_once('./header.php');
require_once('./dbconfig.php');

if(!empty($_POST['passwort']) || !empty($_POST['email-address'])) {
    $email = $_POST['email-address'];
    $passwort = $_POST['passwort'];
    
    $statement = $conn->prepare("SELECT * FROM user WHERE email = :email");
    $result = $statement->execute(array('email' => $email));
    $user = $statement->fetch();
        
    //Überprüfung des Passworts und setzen der SESSION Variablen
    if ($user !== false && password_verify($passwort, $user['passwort'])) {
        $_SESSION['userid'] = $user['id'];
        $_SESSION['vorName'] = $user['vorName'];
        $_SESSION['nachName'] = $user['nachName'];
        $_SESSION['fachrichtung'] = $user['fachrichtung'];
        $_SESSION['punkte'] = $user['punkte'];
        header("Location: ./index.php");
        exit; 
    } else {
        $errorMessage = '<div class="alert alert-danger mt-2" role="alert">
        E-Mail oder Passwort war fehlerhaft
      </div><br>';
     
    }
}

if(!empty($_POST['Submit'])){
    if(empty($passwort) && empty($email)){
    $errorMessage = '<div class="alert alert-danger mt-2" role="alert">
    Du hast nichts eingegeben du Vollidiot
    </div><br>
    <center><img src="./img/idiot.jpg"></center>
    ';
    }
}
?>
   <link rel="stylesheet" href="./css/particle.css">
        <div class="cotainer">
        <div id="particles-js"></div>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">Login</div>
                                <div class="card-body">
                                    <form name="my-form" action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                                      

                                        <div class="form-group row">
                                            <label for="email_address" class="col-md-4 col-form-label text-md-right" >E-Mail Address</label>
                                            <div class="col-md-6">
                                                <input type="text" id="email_address" class="form-control" name="email-address" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="passwort" class="col-md-4 col-form-label text-md-right">Passwort</label>
                                            <div class="col-md-6">
                                                <input type="password" id="passwort" class="form-control" name="passwort" required>
                                            </div>
                                        </div>

                                    

                                    
                                      
                                            <div class="col-md-3 offset-sm-4">
                                                <button type="submit" class="btn btn-primary">
                                                Login
                                                </button>
                                                
                                            </div>

                                            <?php 
                                                if(isset($errorMessage)) {
                                                    echo $errorMessage;
                                                }
                                            ?>
                                        
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>


