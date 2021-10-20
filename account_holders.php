<?php
    include 'config.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Account Holders</title>
</head>
<body>
    <div class="container">
        <h3 class="blue-text">
            Account Holder's<br>
            <a href="index.html" style="position: fixed;left:80%;top:90%;" class="btn-floating  waves-effect waves-light blue right"><i class="material-icons">arrow_back</i></a>
        </h3>
        
        <table class="table stripped">
            <tr class="blue-text">
                <th>Account Number</th>
                <th>Account Holder Name</th>
                <th>Account Balance</th>
            </tr>
            <?php
                include 'config.php';
                $qry = "select * from account_holders;";
                $q = mysqli_query($conn, $qry);
                while($res = mysqli_fetch_array($q)){
            ?>
            <tr>
                <td><?php echo $res['account_number']; ?></td>
                <td><?php echo $res['account_holder']; ?></td>
                <td><?php echo $res['acc_balance'];echo "$"; ?></td>
            </tr>
            <?php
                }
            ?>
        </table>
        <br><br><br><br>
    </div>
</body>
</html>