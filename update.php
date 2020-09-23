<?php

$con = mysqli_connect("localhost", "root", "", "user_credit");
error_reporting(0);
if(!$con)
{
    echo 'sorry the connection is not established';
}
$id = $_GET['idp'];
$nm =$_GET['nm'];
$cr = $_GET['cr'];

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Transfer</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <!--jQuery library--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!--Latest compiled and minified JavaScript--> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <title>Transfer</title>
         <link href="style.css" rel="stylesheet">
         <style>
             body {
          background-image: url('6.jpg');
          
        }
         </style>
    </head>
    <body>
        <nav class="navbar navbar-inverse"> 
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Credit Management</a>
                </div>
            </div>
        </nav>
        <div class="content">
          <div class="container">
            <div class="row">
                <div class="col-md-6">
        <form action="" method="GET" >
                        <h2>From</h2>
                            <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text"  value="<?php echo $nm ?>"class="form-control" id="fromname" name="name">
                            </div>
                            <div class="form-group">
                            <label for="fromid">ID</label>
                            <input type="text"  value="<?php echo $id ?>" class="form-control" id="fromid" name="from_id">
                            </div>
                            <div class="form-group">
                            <label for="fromid">Credit</label>
                            <input type="text"  value="<?php echo $cr ?>" class="form-control" id="fromcredit" name="from_credit">
                        <h2>To</h2>
                        </div>
                            <div class="form-group">
                            <label for="toid">Enter the id of person</label>
                            <input type="text" name="toid" class="form-control"  >
                            </div>
                            
                            <div class="form-group">
                            <label for="value">Enter the credit to transfer </label>
                            <input type="text"  name="credits" class="form-control"  >
                            </div>
                             <div class="form-group">
                            <input type="submit"  name = "submit" value="Transfer Credits" >
                             </div>
                        
                        

                    </form>
                </div>
                    </div>
                </div>
          </div>
       
                
    </body>
</html>
<?php
                                $id=$_GET['from_id'];
                                $credit = $_GET['credits'];
                                $toid = $_GET['toid'];
                                $tname = $_GET['toname'];
                                $q = $_GET['from_credit'];
                                if($_GET[submit])
                                {
                                        //echo "credit= ".$credit."cr = ".$q;
                                        if($credit>$q)
                                        {
                                            echo "<h3 'style=color:white;'>Insufficient Credit<h3>.<button><a href='index.php'>Again enter the credit</a></button>";

                                        }
                                        else{
                                        $query="update users set current_credit = current_credit+'$credit' where id='$toid'";
                                        $query1="update users set current_credit = current_credit-'$credit' where id='$id'";
                                        //$query="update users set name='$tname',current_credit = '$credit' where id='$toid'";
                                        $data = mysqli_query($con,$query);
                                        $data1 = mysqli_query($con,$query1);
                                        //echo 'asdfghj kl';
                                        if($data&&$data1)
                                        {
                                             echo "<h3>Transaction Sucessful<h3>.<a href='index.php'>Transer Again</a>";
                                        }
                                        else
                                        {
                                            echo "failed to update";
                                        }
                                        }
                                    }
                                    else
                                    {
                                        echo "error";
                                    } 
                                
                       