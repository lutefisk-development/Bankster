<?php

// Starta upp appen (ladda in alla nödvändiga klasser och evenuellt skapa anslutningar)
require("core/bootstrap.php");

// Inkludera en gemensam header-template (som alla sidor i denna appen inkluderar)
require("templates/header.php");

use \Includes\Models\Account;
use \Includes\Models\Transaction;
/**
 * Hämta ut konto, baserat på vilken konto användaren klickar på.
 * Hämta ut värdet som användaren skriver in i formulärat.
 * Kolla om det finns tillrakäligt med pengar på konto, och antingen ta ut, sätta in eller bli nektad att ta ut pengar.
 * Skriva ut et meddelandet till användaren.
 */


 $account = Account::find($_REQUEST['user_id']);
$money = (int)$_POST['transaction'];
if($money < 0) {
  $money2 = abs($money);
}
?>

<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
      <?php
        
        if($money < 0 && $money2 > $account->balance) {
          ?><h1 style="color: red;">Medges ej</h1><?php
        
        } else {
          $transaction = new Transaction();
          $transaction->account_id = $account->id;
          $transaction->value = $money;

          if($money < 0) {
            $account->balance += $money;
            $account->save();
            $transaction->save();
            ?><h1 style="color: green;">Tack för din transaktion</h1><?php
          
          } else if($money > 0) {
            $account->balance += $money;
            $account->save();
            $transaction->save();
            ?><h1 style="color: green;">Tack för din transaktion</h1><?php
          }
        }
        ?>
        <div class="col">
        <a href="account.php?user_id=<?php echo $account->user_id; ?>" class="btn btn-light btn-block">⬅︎ Tillbaka</a>
      </div>
    </div>
  </div>
</div>

<?php
// Inkludera en gemensam footer-template (som alla sidor i denna appen inkluderar)
require("templates/footer.php");