
<?php
require 'functions.php';
require 'scripts.php';
require_once 'connect.php';

$id = $_GET['id'];

$command= "SELECT *
FROM `expenses`
WHERE `expense_id` = $id";


$sql= mysqli_query($dbcon, $command);
$row= mysqli_fetch_array($sql);
$src_id= $row['source_id'];
$exp_type= $row['exptype_id'];

$getSQuery="SELECT src_name from expense_sources where src_id=$src_id";
$sql1= mysqli_query($dbcon, $getSQuery);
$source= mysqli_fetch_array($sql1);

$src=$source['src_name'];



$getTQuery="SELECT exptype_name from expense_types where exptype_id=$exp_type";
$sql2= mysqli_query($dbcon, $getTQuery);
$typeArray= mysqli_fetch_array($sql2);
$type= $typeArray['exptype_name'];

if (isset($_POST['save_exp'])){

    $type= $_POST['type'];
    $amount= $_POST['amount'];
    $voucher= $_POST['voucher'];
    $source= $_POST['source'];

    
    $sql="UPDATE expenses SET exptype_id=$type, amount=$amount, voucher_code=$voucher, source_id=$source where expense_id=$id";
    
    
    $result = mysqli_query($dbcon,$sql);
    if (!$result) {
      printf("Error: %s\n", mysqli_error($dbcon));
      exit();
    }
    else{
    header("location:expenses_view.php");
    }
    
    }



?>


<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar1">
    <span class="open-slide">
      <a href="#" onclick="openSlideMenu()">
        <svg width="30" height="30">
            <path d="M0,5 30,5" stroke="#fff" stroke-width="5"/>
            <path d="M0,14 30,14" stroke="#fff" stroke-width="5"/>
            <path d="M0,23 30,23" stroke="#fff" stroke-width="5"/>
        </svg>
      </a>
    </span>

    <div class="navbar-nav1" id="nav">
      <div class="nav-elements"><h2> Edit Expense </h2> </div>
    </div>
    

  </nav>

  <div id="side-menu" class="side-nav1">
    <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
    <a  href="login_admin2.php"><img src="imgs/logo.png" class="logo" href="login_admin2.php"></a>

    <h2 align="center">

    <?php echo strtoupper($_SESSION['user']); ?>

</h2>
<h2 align="center">

</h2>

<?php 
  if (strtoupper($_SESSION['level'])=='ADMIN'){
    echo"
    <a href=''#' class='element'>Employees</a>
    <a href='#' class='element'>Equipment</a>
    <a href='#' class='element'>Products</a>
    <a href='#' class='element'>Expenses</a>
    <a href='#' class='element'>Reports</a>
    <a href='#' class='element'>Options</a>
    <a href='logout.php' class='element'>Logout</a>
    ";
  }
  else
  {
    echo "
    <a href='sessions_view.php' class='element'>Sessions</a>
    <a href='#' class='element'>Orders</a>
    <a href='#' class='element'>Expenses</a>
    <a href='logout.php' class='element'>Log Out</a>
  
    ";
    }


?>
    
  </div>
<div id="main" class="container">
    <form method="post" action="edit_expense.php?id=<?php echo $row['expense_id'];?>">
        <div class="row">
            <div class="col-md-6">
            Expense Type
            </div>

            <div class="col-md-6">
            Amount
            </div>

        </div>

        <div class="row">
            <div class="col-md-6">
                <select name="type" required>
                    <?php
                        $com="SELECT * from expense_types";
                        $get= mysqli_query($dbcon, $com);
                        while($exptypes= mysqli_fetch_array($get, MYSQLI_NUM)){
                    ?>
                            <option value="<?php echo $exptypes[0]?>" <?php if ($exptypes[0]==$exp_type){ echo "selected=selected";} ?> > <?php echo $exptypes[1] ?> </option>

                    <?php
                        }

                    ?>

                </select>
            </div>

            <div class="col-md-6">
            <input name="amount" type="number" value=<?php echo $row['amount']; ?>>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6">
            Source
            </div>

            <div class="col-md-6">
            Cash Voucher
            </div>

        </div>

        <div class="row">
            <div class="col-md-6">
                <select name="source" required>
                    <?php
                        $com="SELECT * from expense_sources";
                        $get= mysqli_query($dbcon, $com);
                        while($expsources= mysqli_fetch_array($get, MYSQLI_NUM)){
                    ?>
                            <option value="<?php echo $expsources[0]?>" <?php if ($expsources[0]==$src_id){ echo "selected=selected";} ?> > <?php echo $expsources[1] ?> </option>

                    <?php
                        }

                    ?>

                </select>
            </div>

            <div class="col-md-6">
            <input name="voucher" type="textbox" value=<?php echo $row['voucher_code']; ?>>
            </div>
            <input type="submit" name="save_exp" value="Confirm" onClick="return confirm('This will overwrite the selected entry. Continue?');">
        </div>
    </form>
</div>
 </body>
</html>
