<?php require 'connect.php'?>
<?php require 'functions.php'?>

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
      <div class="nav-elements"><h2> Add Session </h2> </div>
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
<div id="main">
<div class="container">
  <title>Add Expense</title>
    <form method="post" action="edit_expense.php?id=<?php echo $row['expense_id'];?>">
	<div class="row">
             <h5 class="col-md-6"> Expense Type </h5>
             <h5 class="col-md-6"> Amount </h5>
    </div>


    <div class="row">
            <select class="col-md-5" name="type" required>
            <?php 
                $command= "SELECT * from expense_types";
                $result = mysqli_query($dbcon, $command);
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $id=$row['exptype_id'];
                    $name=$row['exptype_name'];

            ?>
                <option value ="<?php echo $name; ?>"> <?php echo $name; ?> </option>
                <?php } ?>
                </select>
            <div class="col-md-1"> </div>
            <input type="number" class="col-md-4" required> </input>
    </div>

    <div class="row">
            <h5 class="col-md-6"> Source </h5>
            <h5 class="col-md-6"> Cash Voucher </h5>
    </div>


    <div class="row">
            <select class="col-md-5" required>
            <?php 
                $command= "SELECT * from expense_sources";
                $result = mysqli_query($dbcon, $command);
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $id=$row['exptype_id'];
                    $name=$row['src_name'];

            ?>
                <option value ="<?php echo $name; ?>"> <?php echo $name; ?> </option>
                <?php } ?>
                </select>
            <div class="col-md-1"> </div>
            <input type="number" class="col-md-4" required> </input>
    </div>

    <div class="row">
            <input type="submit" name="add_expense" value="Confirm" class="col-md-6">
              
            <input class="col-md-6" type="submit" value="Cancel"> </input>
    </div>
</div>
</form>

</div>
</div>
 </body>
</html>
