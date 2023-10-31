
<?php

    require_once "checking.php";
    require_once "savings.php";

    if (isset($_POST['checkingBalance'])){
        $checkingBalance = filter_input(INPUT_POST, 'checkingBalance');
        $savingsBalance = filter_input(INPUT_POST, 'savingBalance');
    }
    else{
        $checkingBalance = 0;
        $savingsBalance = 0;
    }

    $checking = new CheckingAccount('C123', $checkingBalance, '12-20-2019');
    $savings = new SavingsAccount ('S123', $savingsBalance, '03-20-2020');

    $confirmation = "";
    
    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        if (isset ($_POST['withdrawChecking'])) 
        {
            $withdrawAmount = (float)$_POST['checkingWithdrawAmount'];
            if ($checking->withdrawal($withdrawAmount)){
                $confirmation = "Withdrawal Success";
            }
            else{
                $confirmation = "Withdrawal Failed";
            }
        } 
        else if (isset ($_POST['depositChecking'])) 
        {
            $depositAmount = (float)$_POST['checkingDepositAmount'];
            if ($checking->deposit($depositAmount)){
                $confirmation = "Deposit Success";
            }
            else{
                $confirmation = "Deposit Failed";
            }
        } 
        else if (isset ($_POST['withdrawSavings'])) 
        {
            $withdrawAmount = (float)$_POST['savingsWithdrawAmount'];
            if ($savings->withdrawal($withdrawAmount)){
                $confirmation = "Withdrawal Success";
            }
            else{
                $confirmation = "Withdrawal Failed";
            }
        } 
        else if (isset ($_POST['depositSavings'])) 
        {
            $depositAmount = (float)$_POST['savingsDepositAmount'];
            if ($savings->deposit($depositAmount)){
                $confirmation = "Deposit Success";
            }
            else{
                $confirmation = "Deposit Failed";
            }
        } 
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
              
                    <?php
                    echo '<h2>Checking Account</h2>';
                    echo 'Account ID: ' . $checking->getAccountId() . '<br>';
                    echo 'Balance: ' . $checking->getBalance() . '<br>';
                    echo 'Start Date: ' . $checking->getStartDate() . '<br>';
                    ?>
                    <div class="accountInner">
                        <input type="hidden" name="checkingBalance" value="<?= $checking -> getBalance();?>"/>
                        <input type="text" name="checkingWithdrawAmount" value="" />
                        <input type="submit" name="withdrawChecking" value="Withdraw" />
                    </div>
                    <div class="accountInner">
                        
                        <input type="text" name="checkingDepositAmount" value="" />
                        <input type="submit" name="depositChecking" value="Deposit" /><br />
                    </div>
            
            </div>

            <div class="account">
               
                    <?php
                    echo '<h2>Savings Account</h2>';
                    echo 'Account ID: ' . $savings->getAccountId() . '<br>';
                    echo 'Balance: ' . $savings->getBalance() . '<br>';
                    echo 'Start Date: ' . $savings->getStartDate() . '<br>';
                    ?>
                    <div class="accountInner">
                        <input type="hidden" name="savingBalance" value="<?= $savings -> getBalance();?>"/>
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
    <div class="message">
        <?php
        if(!empty($confirmation)){
            echo '<div class="confirmation">' . $confirmation . '</div>';
        }
    ?>
</body>
</html>
