<?php
function addLocation($email, $location) {
  global $db;
  $query =  "INSERT INTO locations (email, location)
              VALUES(:email, :location)";
  $statement = $db->prepare($query);
  $statement->bindValue(':email', $email);
  $statement->bindValue(':location', $location);
  $statement->execute();
  $statement->closeCursor();
}

function getLocations($email) {
  global $db;
  $query = "SELECT * FROM locations WHERE email = :email";
  $statement = $db->prepare($query);
  $statement->bindValue(':email', $email);
  $statement->execute();
  $locations = $statement->fetchAll();
  $statement->closeCursor();
  return $locations;
}

function addEntry($email, $location, $miles, $standardPay, $tips, $hiredLabor, $laborFactor, $expenses, $notes) {
  global $db;
  $query = "INSERT INTO user_data (email, location, miles, standardPay, tips, hiredLabor, laborFactor, expenses, notes)
              VALUES (:email, :location, :miles, :standardPay, :tips, :hiredLabor, :laborFactor, :expenses, :notes)";
 
  $statement = $db->prepare($query);
  $statement->bindValue(':email', $email);
  $statement->bindValue(':location', $location);
  $statement->bindValue(':miles', $miles);
  $statement->bindValue(':standardPay', $standardPay);
  $statement->bindValue(':tips', $tips);
  $statement->bindValue(':hiredLabor', $hiredLabor);
  $statement->bindValue(':laborFactor', $laborFactor);
  $statement->bindValue(':expenses', $expenses);
  $statement->bindValue(':notes', $notes);
  $statement->execute();
  $statement->closeCursor();
}
 ?>
