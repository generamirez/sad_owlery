<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sessions</title>
  <link rel="stylesheet" href="css/bootstrap.css">
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
      <div class="nav-elements"><h2> Sessions </h2> </div>
      <div class="nav-elements"> <input type="text" name="search"></div>
      <div class="nav-elements"> <a href="add_session.php"><h4> Add Session </a><h4> </div>
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
    <a href='#' class='element'>Sessions</a>
    <a href='#' class='element'>Orders</a>
    <a href='#' class='element'>Expenses</a>
    <a href='#' class='element'>Log Out</a>
  
    ";
    }


?>
    
  </div>

  

     </html>