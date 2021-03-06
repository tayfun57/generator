<?php
require("./session.php");
require('./header.php');

$jahr = date("Y");
$kalendarWoche = date("W");

if(!empty($_POST)){
    require("./verarbeiteGen.php");
}



?>
<title>Dokument generieren</title>


    <div class="container">
            <form method="POST" action="./verarbeiteGen.php">         
                    <div class="row">    
                        <div class="col-sm-12">
                        <h3 >KW</h3>
                            <div class="form-group">
                                <input type="text" class="form-control" id="kw"  value="<?=$kalendarWoche ?>" name="kw" required >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <h3 >Jahr</h3>
                                <div class="form-group">
                                    <input type="text" class="form-control"  id="jahr"  value="<?=$jahr ?>" name="jahr" required>
                                </div>
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <label class="checkbox-inline"><input name="abNachweis" type="checkbox" value="JA"> Ausbildungsnachweis</label>
                            <label class="checkbox-inline"><input name="avNachweis" type="checkbox" value="JA"> Aktivitätsnachweis</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary btn-block">Generieren</button>
                        <p class="text-secondary">Für jedes generierte Dokument wird ein Punkt abgezogen</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                        
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="krankMo">
                                <label class="form-check-label" for="inlineCheckbox1">Mo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="krankDi">
                                <label class="form-check-label" for="inlineCheckbox2">Di</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="krankMi">
                                <label class="form-check-label" for="inlineCheckbox3">Mi</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="krankDo">
                                <label class="form-check-label" for="inlineCheckbox3">Do</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="krankFr">
                                <label class="form-check-label" for="inlineCheckbox3">Fr</label>
                            </div>
                        </div>
                    </div>

                   

                   
            </form>
          
    </div>