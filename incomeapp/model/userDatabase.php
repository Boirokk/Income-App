 <?php
function confirmPassword($password, $confirmPassword) {
  if ($password === $confirmPassword) {
    return TRUE;
  } else {
    return FALSE;
  }
}

function checkUsers($email) {
  global $db;
  $query = "SELECT * FROM login WHERE email = :email";
  $statement = $db->prepare($query);
  $statement->bindValue(':email', $email);
  $statement->execute();
  $user = $statement->fetch();
  $statement->closeCursor();
  return $user;
}

function addUser($email, $password) {
  global $db;
  $hash = password_hash($password, PASSWORD_BCRYPT);

  $query = "INSERT INTO login (email, password)
            VALUES (:email, :password)";
  $statement = $db->prepare($query);
  $statement->bindValue(':email', $email);
  $statement->bindValue(':password', $hash);
  $statement->execute();
  $statement->closeCursor();
}

function userVerify($email, $password) {
  global $db;
  $query = "SELECT * FROM login WHERE email = :email";
  $statement = $db->prepare($query);
  $statement->bindValue(':email', $email);
  $statement->execute();
  $user = $statement->fetch();
  $statement->closeCursor();
  $hashed_password = $user['password'];
  $valid_password = password_verify($password, $hashed_password);
  return $valid_password;
}


 ?>
