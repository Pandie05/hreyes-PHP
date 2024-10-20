

<?php

    include 'checking.php';
    include 'savings.php'; 

    $checkingBalance = 1000;
    $savingsBalance = 5000;

    $checking = new CheckingAccount ('C123', $checkingBalance, '12-20-2019');
    $savings = new SavingsAccount('S123', $savingsBalance, '03-20-2020');
    
    if (isset ($_POST['withdrawChecking'])) 
    {
        $checkingBalance = $checking->withdrawal(filter_input(INPUT_POST, 'checkingWithdrawAmount'));
    } 
    else if (isset ($_POST['depositChecking'])) 
    {
        $checkingBalance = $checking->deposit(filter_input(INPUT_POST, 'checkingDepositAmount'));
    } 
    else if (isset ($_POST['withdrawSavings'])) 
    {
        $savingsBalance = $savings->withdrawal(filter_input(INPUT_POST, 'savingsWithdrawAmount'));
    } 
    else if (isset ($_POST['depositSavings'])) 
    {
        $savingsBalance = $savings->deposit(filter_input(INPUT_POST, 'savingsDepositAmount'));
    } 
    else{
        $checkingBalance = $checking->getBalance();
        $savingsBalance = $savings->getBalance();
    }
     
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
                    
                <div class="accountInner">
                    <h2> <?php echo $checking->getAccountDetails(); ?> </h2>
                    <input type="hidden" name="CheckingID" value=<?=$checking->getAccountID() ?> />
                    <input type="hidden" name="CheckingBalance" value=<?=$checkingBalance ?> />
                    <input type="hidden" name="CheckingStartDate" value=<?=$checking->getStartDate() ?> />
                    <input type="text" name="checkingWithdrawAmount" value="" />
                    <input type="submit" name="withdrawChecking" value="Withdraw" />
                </div>
                <div class="accountInner">
                    <input type="text" name="checkingDepositAmount" value="" />
                    <input type="submit" name="depositChecking" value="Deposit" /><br />
                </div>
            
            </div>

            <div class="account">
               
                <div class="accountInner">
                    <h2> <?php echo $savings->getAccountDetails(); ?> </h2>
                    <input type="hidden" name="SavingsID" value=<?=$savings->getAccountID() ?> />
                    <input type="hidden" name="SavingsBalance" value=<?=$savingsBalance ?> />
                    <input type="hidden" name="SavingsStartDate" value=<?=$savings->getStartDate() ?> />
                    <input type="text" name="savingsWithdrawAmount" value="" />
                    <input type="submit" name="withdrawSavings" value="Withdraw" />
                </div>
                <div class="accountInner">
                    <input type="text" name="savingsDepositAmount" value="" />
                    <input type="submit" name="depositSavings" value="Deposit" /><br />
                </div>
            
            </div>
            
        </div>
    </form>
</body>
</html>
