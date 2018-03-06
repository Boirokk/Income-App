<?php

if (!isset($_SESSION['email'])) {
  echo "you are logged in";
} else {
  echo "you are not logged int";
}

 ?>

<body>
    <?php
      $_SESSION['email'] = $email;
     ?>
   <br>
   this is the ledger.

   <a href="view/page.php">page</a>
</body>
