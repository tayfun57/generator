<?php
require_once('./session.php');
require_once('./header.php');




if(session_destroy()){
    echo '<div class="alert alert-success mt-2" role="alert">
    Logout war erfolgreich
  </div><br>';
}