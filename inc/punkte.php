<?php
//Punkte abziehen
function setPunkte($conn, $sessionData,$punkte){
    $boolResult;
    try {
      $stmt = $conn->prepare("UPDATE user SET punkte = punkte + :punkte WHERE id = :id");
      $stmt->bindParam('punkte', $punkte);
      $stmt->bindParam('id', $sessionData['userid']);
      $stmt->execute();
  } catch(PDOException $e)
  {
  echo "Fehler, bitte an Admin mit der genauen Fehlerbeschreibung wenden: " . $e->getMessage();
  $boolResult = false;
  }
  $conn = null;
  $boolResult = true;
  return $boolResult;
  }
?>