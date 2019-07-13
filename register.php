<?php
require_once('./header.php');
require_once('./dbconfig.php');

$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
 
if(!empty($_POST)) {
    $error = false;
    $email = $_POST['email-address'];
    $passwort = $_POST['passwort'];
    $passwort2 = $_POST['passwort2'];
    $vorName = $_POST['vorName'];
    $nachName = $_POST['nachName'];
    $fachrichtung = $_POST['fachrichtung'];
    $punkte = 20;

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
        $error = true;
    }     
    if(strlen($passwort) == 0) {
        echo 'Bitte ein Passwort angeben<br>';
        $error = true;
    }
    if($passwort != $passwort2) {
        echo 'Die Passwörter müssen übereinstimmen<br>';
        $error = true;
    }
    
    //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
    if(!$error) { 
        $statement = $conn->prepare("SELECT * FROM user WHERE email = :email");
        $result = $statement->execute(array('email' => $email));
        $user = $statement->fetch();
        
        if($user !== false) {
            echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
            $error = true;
        }    
    }
    
    //Keine Fehler, wir können den Nutzer registrieren
    if(!$error) {    
        $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
        
        $statement = $conn->prepare("INSERT INTO user (vorName,nachName,email,passwort,fachrichtung,punkte) VALUES (:vorName,:nachName,:email, :passwort, :fachrichtung, :punkte)");
        $result = $statement->execute(array('vorName' => $vorName, 'nachName' => $nachName, 'email' => $email, 'passwort' => $passwort_hash, 'fachrichtung' => $fachrichtung, 'punkte' => $punkte));
        
        if($result) {        
            echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
            $showFormular = false;
        } else {
            echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
        }
    } 
}
 
if($showFormular) {
?>
   
        <div class="cotainer">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">Register</div>
                                <div class="card-body">
                                    <form name="my-form" action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                                        <div class="form-group row">
                                            <label for="vorName" class="col-md-4 col-form-label text-md-right">Vorname</label>
                                            <div class="col-md-6">
                                                <input type="text" id="vorName" class="form-control" name="vorName">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="nachName" class="col-md-4 col-form-label text-md-right">Nachname</label>
                                            <div class="col-md-6">
                                                <input type="text" id="nachName" class="form-control" name="nachName">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                            <div class="col-md-6">
                                                <input type="text" id="email_address" class="form-control" name="email-address">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="passwort" class="col-md-4 col-form-label text-md-right">Passwort</label>
                                            <div class="col-md-6">
                                                <input type="password" id="passwort" class="form-control" name="passwort">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="passwort" class="col-md-4 col-form-label text-md-right">Passwort wiederholen</label>
                                            <div class="col-md-6">
                                                <input type="password" id="passwort2" class="form-control" name="passwort2">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="fachrichtung" class="col-md-4 col-form-label text-md-right">Beruf</label>
                                            <div class="col-md-6">
                                                <input type="text" id="fachrichtung" class="form-control" name="fachrichtung">
                                            </div>
                                        </div>

                                    

                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                Register
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

 
<?php
} //Ende von if($showFormular)
?>


