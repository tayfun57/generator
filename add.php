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
                                <input type="text" class="form-control" required id="kw"  placeholder=" <?=$kalendarWoche ?>" name="kw" >
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                        <h3 >Jahr</h3>
                            <div class="form-group">
                                <input type="text" class="form-control" required  id="jahr"  placeholder=" <?=$jahr ?>" name="jahr" >
                            </div>
                        </div>
                        
                    </div>

                <h3 >Montag</h3>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" required id="hMontag"  placeholder="Überschrift" name="hMontag" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" required  id="tMontag"  placeholder="Thema1,Thema2" name="tMontag" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" required  id="dMontag"  placeholder="Dozent1,Dozent2" name="dMontag">
                        </div>
                    </div>
                </div>

                <h3 class="mt-2">Dienstag</h3>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" required id="hDienstag"  placeholder="Überschrift" name="hDienstag" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" required  id="tDienstag"  placeholder="Thema1,Thema2" name="tDienstag" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" required  id="dDienstag"  placeholder="Dozent1,Dozent2" name="dDienstag">
                        </div>
                    </div>
                </div>

                <h3 class="mt-2">Mittwoch</h3>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" required id="hMittwoch"  placeholder="Überschrift" name="hMittwoch" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" required  id="tMittwoch"  placeholder="Thema 1,Thema2" name="tMittwoch" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" required  id="dMittwoch"  placeholder="Dozent1,Dozent2" name="dMittwoch">
                        </div>
                    </div>
                </div>

                <h3 class="mt-2">Donnerstag</h3>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" required id="hDonnerstag"  placeholder="Überschrift" name="hDonnerstag" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" required  id="tDonnerstag"  placeholder="Thema1,Thema2" name="tDonnerstag" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" required  id="dDonnerstag"  placeholder="Dozent1,Dozent2" name="dDonnerstag">
                        </div>
                    </div>
                </div>

                <h3 class="mt-2">Freitag</h3>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" required id="hFreitag"  placeholder="Überschrift" name="hFreitag" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" required  id="tFreitag"  placeholder="Thema 1,Thema2" name="tFreitag" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" required  id="dFreitag"  placeholder="Dozent1,Dozent2" name="dFreitag">
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