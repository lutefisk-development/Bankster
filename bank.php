<?php


/**
 * 
 *      DENNA FIL ANVÄNDS INTE!!!!
 * 
 */



require_once("includes/Account.php");
require_once("includes/Transaction.php");

$accounts = [];

$account = new Account("1337", "Johan", 4242);
$account->deposit(100, "2019-01-01", "CSN");
$account->withdraw(995);
$account->withdraw(25, "2019-01-02", "Delicato-boll");
$account->withdraw(149, "2019-01-04", "Hemköp");
$account->withdraw(65, "2019-02-03", "Lunch");
$account->deposit(250, "2019-02-11", "Swish");
array_push($accounts, $account);
var_dump($account);
// die();

/*
$account = new Account("123456789", "Peter");
$account->deposit(0.5);
$account->withdraw(65);
$account->withdraw(300);
$account->withdraw(550);
$account->deposit(250);
array_push($accounts, $account);

$account = new Account("567891234", "Lisa", 25000);
$account->deposit(500);
$account->deposit(500);
$account->deposit(500);
$account->deposit(500);
$account->deposit(500);
$account->withdraw(65);
array_push($accounts, $account);
*/

foreach ($accounts as $account) {
	echo "<h1>{$account->getOwner()}s konto</h1>";
	echo "<pre>Saldo: {$account->getCurrentBalance()} kr</pre>";
	echo "<h2>Transaktioner</h2>";

	$transactions = $account->getTransactions();
	foreach ($transactions as $transaction) {
		echo $transaction->getDetails();
	}

	echo "<hr>";
}
