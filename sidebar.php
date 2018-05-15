


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
    <a href=''employees_view.php' class='element'>Employees</a>
    <a href='#' class='element'>Equipment</a>
    <a href='products_view.php' class='element'>Products</a>
    <a href='expenses_view.php' class='element'>Expenses</a>
    <a href='generate_report.php' class='element'>Reports</a>
    <a href='#' class='element'>Options</a>
    <a href='logout.php' class='element'>Logout</a>
    ";
  }
  else
  {
    echo "
    <a href='sessions_view.php' class='element'>Sessions</a>
    <a href='orders_view.php' class='element'>Orders</a>
    <a href='expenses_view.php' class='element'>Expenses</a>
    <a href='logout.php' class='element'>Log Out</a>
  
    ";
    }


?>
    
  </div>
  