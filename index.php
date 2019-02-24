<?php

// Starta upp appen (ladda in alla nödvändiga klasser och evenuellt skapa anslutningar)
require("core/bootstrap.php");

// Inkludera en gemensam header-template (som alla sidor i denna appen inkluderar)
require("templates/header.php");

use \Includes\Models\User;
/**
 * Hämta ut alla users och loopa över dom.
 * För varje user, skriv ut deras namn och personnr, och ha en länk till varje enskild users konto.
 * (Länk för att skapa en user).
 */


// Hämtar ut all info i tabellen user i db.
$users = User::all();
?>

<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
      <h1>Användare: </h1><br>
      <ul>
      <?php foreach($users as $user) : ?>
        <li>
          Namn: <a href="account.php?user_id=<?php echo $user->id; ?>">
          <?php echo $user->name; ?></a><br>
          Personnummer: <?php echo $user->social_security_nr; ?><br><br>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>

<?php
// Inkludera en gemensam footer-template (som alla sidor i denna appen inkluderar)
require("templates/footer.php");