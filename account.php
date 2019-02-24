<?php

// Starta upp appen (ladda in alla nödvändiga klasser och evenuellt skapa anslutningar)
require("core/bootstrap.php");

// Inkludera en gemensam header-template (som alla sidor i denna appen inkluderar)
require("templates/header.php");

use \Includes\Models\User;
use \Includes\Models\Account;
use \Includes\Models\Transaction;
/**
 * Hämta ut just en spesifik users alla konto och loopa över dom.
 * För varje konto, skriv ut dens namn, nummer och saldo.
 * (Länk för att göra en transaktion och kolla alla transactioner).
 */


// Hämtar ut en spesifik användare från db, med id från förra sidan.
$user = User::find($_REQUEST['user_id']);

// Hämtar ut alla konto som matchar just denna användares id.
$accounts = Account::where('user_id', $_REQUEST['user_id'])->get();
?>

<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
      <h1><?php echo $user->name; ?>s Konto:</h1><br>
      <ul>
      <?php foreach($accounts as $account) : ?>
        <li>
          Namn: <a href="transaction.php?account_id=<?php echo $account->id; ?>">
          <?php echo $account->name; ?></a><br>
          Kontonummer: <?php echo $account->account_nr; ?><br>
          Saldo: <?php echo $account->balance; ?><br>
          <form action="message.php?user_id=<?php echo $account->user_id; ?>" method="POST">
            <div class="form-group">
              <label for="transaction">Transaktion: </label>
              <input type="number" class="form-control form-control-lg" name="transaction" placeholder="Hur mycket vill du ta ut/sätta in ?">
            </div>
            <div class="row">
              <div class="col">
                <input type="submit" value="Genomföra Transaktion" class="btn btn-success btn-block">
              </div>
            </div>
          </form>
          <br><br>
        </li>
        <?php endforeach; ?>
      </ul>
      <div class="col">
        <a href="index.php" class="btn btn-light btn-block">⬅︎ Tillbaka</a>
      </div>
    </div>
  </div>
</div>

<?php
// Inkludera en gemensam footer-template (som alla sidor i denna appen inkluderar)
require("templates/footer.php");