<?php
    require 'connect.php';
    require 'sidebar.php';
?>
<title>Sessions</title>
<html lang="en">
<head>
<body>
  <nav class="navbar1">
   
    <div class="navbar-nav1" id="nav">
      <div class="nav-elements"><h2> Reports    </h2> </div>
    </div>
    

  </nav>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>

<div id="main" class="container">
<form method="post" action="report.php">

<div class="row">
    
    <input type="date" name ="start" class="col-md-3" required >
    <div class="col-md-1"> </div>
    <input type="date" name="end"class="col-md-3" required>
</div>
<br>
<div class="row">

<select name="type" class="col-md-4" required>
    <option value="Revenue"> Revenue </option>
    <option value="Expenses"> Expenses </option>
</select>
</div>
<input type="submit" value ="Generate">
</form>

</div>
</body>

</html>