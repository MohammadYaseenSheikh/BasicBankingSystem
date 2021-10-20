<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <!-- CSS only -->

        <title>Fund Transfer</title>
    </head>
    <body>
        <div class="container">
            <h3 class="blue-text">
                Transfer Fund<br>
                <a href="index.html" style="position: fixed;left:80%;top:90%;" class="btn-floating waves-effect waves-light blue right"><i class="material-icons" >arrow_back</i></a>
            </h3>
            <div class="row">
                <form class="container" action="" method="POST">
                    <label for="Sender">Sender</label>
                    <input class="input-field blue-text" placeholder="Account Number" name="sndr" type="text" required><br>
                    <label for="Receiver">Receiver</label>
                    <input class="input-field blue-text" placeholder="Account Number" name="rcvr" type="text" required><br>
                    <label for="Receiver">Amount to be Transfered</label>
                    <input class="input-field blue-text" placeholder="Account in Rupees" name="amnt" type="number" required>
                    <br><br>
                    <button class="btn waves-effect waves-light blue" name="transfer"><i class="material-icons right">arrow_forward</i>Transfer Fund</botton>
                </form>
            </div>
                <?php
                    include ("config.php");
                    if (isset($_POST['transfer'])){
                        $s = $_POST['sndr'];
                        $r = $_POST['rcvr'];
                        $a = $_POST['amnt'];
                        if(($r != $s) & $a > 0){
                            $q = "select * from account_holders";
                            $result = mysqli_query($conn, $q);
                            $x = FALSE;
                            $y = FALSE;
                            while($res = mysqli_fetch_array($result)){
                                if ($r == $res['account_number']){
                                    $x = TRUE;
                                    $rec = $res['account_holder'];
                                }
                                if ($s == $res['account_number']){
                                    $y = TRUE;
                                    $sen = $res['account_holder'];
                                }
                            }
                            if($x & $y){
                                $q = "update account_holders set acc_balance = acc_balance - $a where account_number = '$s'";
                                mysqli_query($conn, $q);
                                $q = "update account_holders set acc_balance = acc_balance + $a where account_number = '$r'";
                                mysqli_query($conn, $q);
                                echo "<p class='green white-text' style='padding: 10px;font-weight:bold;font-size: 15px;border-radius:50px;'><i class='material-icons white-text left'>check_circle</i>Successful Fund Transfer.</p>";
                                $q = "insert into acc_trans (sender,receiver,amount) values ('$sen','$rec',$a)";
                                mysqli_query($conn, $q);
                            }else{
                                echo "<p class='red white-text' style='padding: 10px;font-weight:bold;font-size: 15px;border-radius:50px;'><i class='material-icons white-text left'>error</i>No Such Account Available.</p>";
                            }
                        }
                        else{
                            echo "<p class='red white-text' style='padding: 10px;font-weight:bold;font-size: 15px;border-radius:50px;'><i class='material-icons white-text left'>error</i>Invalid Amount or Account.</p>";
                        }
                    }
                ?>          
        </div>
        
    </body>
</html>