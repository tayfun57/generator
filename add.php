<?php
require_once("./session.php");
require_once("./header.php"); //Navbar hinzufügen

$jahr = date("Y");
$kalendarWoche = date("W");

if(!empty($_POST['kw'])){
    require('./verarbeiteThemen.php');
}


?>
<html>
<head>
    <title>Eintrag hinzufügen</title>
</head>
<body>

    <div class="container-fluid">
            <form method="POST" action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>">
                    
                    <div class="row">
                            
                        <div class="col-sm-4">
                        <h3 >KW</h3>
                            <div class="form-group">
                                <input type="text" class="form-control"  id="kw"  value=" <?=$kalendarWoche ?>" name="kw" >
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                        <h3 >Jahr</h3>
                            <div class="form-group">
                                <input type="text" class="form-control"   id="jahr"  value=" <?=$jahr ?>" name="jahr" >
                            </div>
                        </div>
                        
                    </div>

                <h3 >Montag</h3>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="text" class="form-control"  id="hMontag"  placeholder="Überschrift" name="hMontag" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control"   id="tMontag"  placeholder="Thema1,Thema2" name="tMontag" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control"   id="dMontag"  placeholder="Dozent1,Dozent2" name="dMontag">
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <input type="text" class="form-control"   id="sMontag"  value="10" name="sMontag">
                        </div>
                    </div>
                </div>

                <h3 class="mt-2">Dienstag</h3>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="text" class="form-control"  id="hDienstag"  placeholder="Überschrift" name="hDienstag" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control"   id="tDienstag"  placeholder="Thema1,Thema2" name="tDienstag" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control"   id="dDienstag"  placeholder="Dozent1,Dozent2" name="dDienstag">
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <input type="text" class="form-control"   id="sDienstag"  value="10" name="sDienstag">
                        </div>
                    </div>
                </div>

                <h3 class="mt-2">Mittwoch</h3>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="text" class="form-control"  id="hMittwoch"  placeholder="Überschrift" name="hMittwoch" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control"   id="tMittwoch"  placeholder="Thema 1,Thema2" name="tMittwoch" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control"   id="dMittwoch"  placeholder="Dozent1,Dozent2" name="dMittwoch">
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <input type="text" class="form-control"   id="sMittwoch"  value="10" name="sMittwoch">
                        </div>
                    </div>
                </div>

                <h3 class="mt-2">Donnerstag</h3>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="text" class="form-control"  id="hDonnerstag"  placeholder="Überschrift" name="hDonnerstag" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control"   id="tDonnerstag"  placeholder="Thema1,Thema2" name="tDonnerstag" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control"   id="dDonnerstag"  placeholder="Dozent1,Dozent2" name="dDonnerstag">
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <input type="text" class="form-control"   id="sDonnerstag"  value="10" name="sDonnerstag">
                        </div>
                    </div>
                </div>

                <h3 class="mt-2">Freitag</h3>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="text" class="form-control"  id="hFreitag"  placeholder="Überschrift" name="hFreitag" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control"   id="tFreitag"  placeholder="Thema 1,Thema2" name="tFreitag" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control"   id="dFreitag"  placeholder="Dozent1,Dozent2" name="dFreitag">
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <input type="text" class="form-control"   id="sFreitag"  value="10" name="sFreitag">
                        </div>
                    </div>
                </div>
                 
                    <button type="submit" class="btn btn-primary btn-block">Absenden</button>
                    </form>
                </div>
            </form>
        </div>
    <script type="text/javascript" src="./js/addValidation.js"></script>
 
</body>
</html>