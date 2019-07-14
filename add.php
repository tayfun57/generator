<?php
require_once("./session.php");
require_once("./header.php"); //Navbar hinzufügen

$jahr = date("Y");
$kalendarWoche = date("W");

if(!empty($_POST['kw'])){
    require('./verarbeiteThemen.php');
}


?>

<title>XXXs</title>


    <div class="container-fluid">
            <form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
                    
                    <div class="row">
                            
                        <div class="col-sm-4">
                        <h3 >KW</h3>
                            <div class="form-group">
                                <input type="text" class="form-control" id="kw"  placeholder=" <?=$kalendarWoche ?>" name="kw" >
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                        <h3 >Jahr</h3>
                            <div class="form-group">
                                <input type="text" class="form-control"  id="jahr"  placeholder=" <?=$jahr ?>" name="jahr" >
                            </div>
                        </div>
                        
                    </div>

                <h3 >Montag</h3>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" id="headingMontag"  placeholder="Überschrift" name="headingMontag" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control"  id="montag2"  placeholder="Themen" name="montag1" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control"  id="montag3"  placeholder="Thema 2" name="montag2">
                        </div>
                    </div>
                </div>

                <h3 class="mt-2">Dienstag</h3>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" id="headingDienstag"  placeholder="Überschrift" name="headingDienstag" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control"  id="dienstag2"  placeholder="Thema 1" name="dienstag1" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control"  id="dienstag3"  placeholder="Thema 2" name="dienstag2">
                        </div>
                    </div>
                </div>

                <h3 class="mt-2">Mittwoch</h3>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" id="headingMittwoch"  placeholder="Überschrift" name="headingMittwoch" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control"  id="mittwoch1"  placeholder="Thema 1" name="mittwoch1" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control"  id="mittwoch2"  placeholder="Thema 2" name="mittwoch2">
                        </div>
                    </div>
                </div>

                <h3 class="mt-2">Donnerstag</h3>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="text" class="form-control" id="headingDonnerstag"  placeholder="Überschrift" name="headingDonnerstag" >
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="text" class="form-control"  id="donnerstag1"  placeholder="Thema 1" name="donnerstag1" >
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="text" class="form-control"  id="donnerstag2"  placeholder="Thema 2" name="donnerstag2">
                        </div>
                    </div>
                    <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control"  id="donnerstag3"  placeholder="Thema 3" name="donnerstag3">
                            </div>
                    </div>
                </div>

                <h3 class="mt-2">Freitag</h3>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" id="headingFreitag"  placeholder="Überschrift" name="headingFreitag" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control"  id="freitag1"  placeholder="Thema 1" name="freitag1" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control"  id="freitag2"  placeholder="Thema 2" name="freitag2">
                        </div>
                    </div>
                </div>
                 
                    <button type="submit" class="btn btn-primary btn-block">Absenden</button>
                    </form>
                </div>
            </form>
        </div>

</body>
</html>