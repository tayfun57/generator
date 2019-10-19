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

  //punktwert erhalten
  function getPunkte($conn,$sessionData){
    $result = 0;
    $data = 0;
    try {
      $stmt = $conn->prepare("SELECT * FROM user WHERE id = :id");
      $stmt->bindParam('id', $sessionData['userid']);
      $stmt->execute();
      $data = $stmt->fetch();
      $result = $data['punkte'];
  } catch(PDOException $e)
  {
    echo "Fehler, bitte an Admin mit der genauen Fehlerbeschreibung wenden: " . $e->getMessage();
  }
  $conn = null;
  return $result;
  }
?>