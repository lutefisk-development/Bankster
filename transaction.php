<?php

// Starta upp appen (ladda in alla nödvändiga klasser och evenuellt skapa anslutningar)
require("core/bootstrap.php");

// Inkludera en gemensam header-template (som alla sidor i denna appen inkluderar)
require("templates/header.php");

use \Includes\Models\Account;
use \Includes\Models\Transaction;
/**
 * Hämta ut information om konto, baserat på vad användaren klickar på.
 * Skriva ut varje transaktion som finns lagrat i DB för just det konto.
 */


$account = Account::find($_REQUEST['account_id']);
$transactions = Transaction::where('account_id', $_REQUEST['account_id'])->get();
echo $account->id;
?>

<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
      <h1>Konto: <?php echo $account->account_nr; ?> Transaktioner</h1>
      <ul>
      <?php foreach($transactions as $transaction) : ?>
        <li>
          <?php echo $transaction->value; ?>
        </li>
      <?php endforeach; ?>
      </ul>
      <div class="col">
        <a href="account.php?user_id=<?php echo $account->user_id; ?>" class="btn btn-light btn-block">⬅︎ Tillbaka</a>
      </div>
    </div>
  </div>
</div>

<?php
// Inkludera en gemensam footer-template (som alla sidor i denna appen inkluderar)
require("templates/footer.php");