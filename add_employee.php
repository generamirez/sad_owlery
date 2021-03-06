<?php require 'connect.php'?>
<?php require 'functions.php'?>
<?php require 'scripts.php'?>
<title>Employees</title>
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
      <div class="nav-elements"><h2> Add Employee </h2> </div>
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
    <form method="post" action="add_employee.php">
	<table>
		<tr><td>First Name</td><td>Middle Name</td> <tr>
		<tr>
			<td> <input type="text" name="first_name" class="textinput" required> </td>
			<td><input type="text" name="middle_name" class="textinput" required></td>
		</tr>
		<tr><td>Last Name</td><td>Birthday</td></tr>
		<tr>
			<td><input type="text" name="last_name" class="textinput" required></td>
			<td><input id="birthday" type="date" required></td>
		</tr>
    <tr>
    </tr>
    <tr><td><br><br></td></tr>
	<tr><td> Contact Number</td></tr>
	<tr>
		<td>+639<input type="tel" name="contact_number" class="textinput" required>
		</td>
	</tr>
 <tr>
 </tr>

  <tr><td> Position </td><td>Contract Start</td></tr>

  <tr><td><input type="text" name="position" required></td><td><input id="contract" type="date" required></td></tr>
		<tr>
		<td> <input type="submit" name="submit_btn" value="Submit">
		</tr>

	</table>
</form>


</div>
</body>
</html>