

<?php

    include 'checking.php';
    include 'savings.php'; 

    $errcheck = '';
    $errsav = '';

    $checkingBalance = isset($_POST['checkingBalance']) ? $_POST['checkingBalance'] : 1000.00;
    $savingsBalance = isset($_POST['savingsBalance']) ? $_POST['savingsBalance'] : 5000.00;

    // Create CheckingAccount and SavingsAccount objects with the retrieved balances
    $checking = new CheckingAccount('C123', $checkingBalance, '12-20-2019');
    $savings = new SavingsAccount('S123', $savingsBalance, '03-20-2020');

    
    if (isset ($_POST['withdrawChecking'])) 
    {
        $res = $checking->withdrawal($_POST['checkingWithdrawAmount']);
        if ($res !== true) {
            $errcheck = $res;
        } else {
            $checkingBalance = $checking->getBalance();
        }

    } 
    else if (isset ($_POST['depositChecking'])) 
    {
        $checking->deposit($_POST['checkingDepositAmount']);
    } 
    else if (isset ($_POST['withdrawSavings'])) 
    {
        $res = $savings->withdrawal(filter_input(INPUT_POST, 'savingsWithdrawAmount'));
        if ($res !== true) {
            $errsav = $res;
        } else {
            $savingsBalance = $savings->getBalance();
        }
    } 
    else if (isset ($_POST['depositSavings'])) 
    {
        $savings->deposit($_POST['savingsDepositAmount']);
    } 
    
    //update hidden
    $checkingBalance = $checking->getBalance();
    $savingsBalance = $savings->getBalance();
     
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM</title>
    <style type="text/css">
        body {
            margin-left: 120px;
            margin-top: 50px;
        }
       .wrapper {
            display: grid;
            grid-template-columns: 300px 300px;
        }
        .account {
            border: 1px solid black;
            padding: 10px;
        }
        .label {
            text-align: right;
            padding-right: 10px;
            margin-bottom: 5px;
        }
        label {
           font-weight: bold;
        }
        input[type=text] {width: 80px;}
        .error {color: red;}
        .accountInner {
            margin-left:10px;margin-top:10px;
        }
    </style>
</head>
<body>

    <form method="post">
               
    <h1>ATM</h1>
    <div class="wrapper">
        <div class="account">
            <h2>Checking Account</h2>
            <ul>
                <li>Account ID: C123 </li>
                <li>Balance: $<?= htmlspecialchars(number_format($checking->getBalance(), 2)); ?></li>
                <li>Account Opened: 12-20-2019 </li>
            </ul>
            <input type="hidden" name="checkingAccount" value="C123" />
            <input type="hidden" name="checkingBalance" value="<?= htmlspecialchars($checking->getBalance(), 2); ?>" />
            <input type="hidden" name="checkingOpened" value="12-20-2019" />
            <div class="accountInner">
                <input type="text" name="checkingWithdrawAmount" value="" />
                <input type="submit" name="withdrawChecking" value="Withdraw" />
            </div>
            <div class="accountInner">
                <input type="text" name="checkingDepositAmount" value="" />
                <input type="submit" name="depositChecking" value="Deposit" /><br />
            </div>
            <?php if ($errcheck): ?>
                <div class="error"><?= htmlspecialchars($errcheck); ?></div>
            <?php endif; ?>
        </div>

        <div class="account">
            <h2>Savings Account</h2>
            <ul>
                <li>Account ID: S123</li>
                <li>Balance: $<?= htmlspecialchars(number_format($savings->getBalance(), 2)); ?></li>
                <li>Account Opened: 03-20-2020</li>
            </ul>
            <input type="hidden" name="savingsAccount" value="S123" />
            <input type="hidden" name="savingsBalance" value="<?= htmlspecialchars($savings->getBalance()); ?>" />
            <input type="hidden" name="savingsOpened" value="03-20-2020" />
            <div class="accountInner">
                <input type="text" name="savingsWithdrawAmount" value="" />
                <input type="submit" name="withdrawSavings" value="Withdraw" />
            </div>
            <div class="accountInner">
                <input type="text" name="savingsDepositAmount" value="" />
                <input type="submit" name="depositSavings" value="Deposit" /><br />
            </div>
            <?php if ($errsav): ?>
            <div class="error"><?= htmlspecialchars($errsav); ?></div>
            <?php endif; ?>
        </div>
    </div>
    <?php 
    include "includes/footer.php";
    ?>
    </form>
</body>
</html>
