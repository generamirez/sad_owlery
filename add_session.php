<?php require 'connect.php'?>
<?php require 'functions.php'?>
<?php require 'sidebar.php'?>

<title>Sessions</title>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>
  

    <div class="navbar-nav1" id="nav">
      <div class="nav-elements"><h2> Add Session </h2> </div>
    </div>
    

  </nav>

 
 <div id="main">
    <form method="post" action="add_session.php">
	<table>
		<tr><td>Customer Name</td> <tr>
		<tr><td> <input type="text" name="customer_name" class="textinput" required>
		</tr>
		<tr><td>Space</td> 
    <td> <select name="space" class="space" id="space" required> 
                <option value="Shared Space" id="optA"> Shared Space </option>
                <option value="Meeting Room A" id="optB"> Meeting Room A </option>
                <option value="Meeting Room B"id="optC"> Meeting Room B </option>
            </select>
		</tr>
    <tr>
   
      <td>   Number of people <input type="number" name="custom_num" min='1' required>

      </td>
    </tr>

    <tr>
   
   <td>   Package Type <select name="package" id="package" disabled>
        <option value="None"> None </option>
        <option value="Weekly" id="packA"> Weekly </option>
        <option value="Monthly" id="packB"> Monthly </option>
        <option value="Daily" id="packC"> Daily </option>
        </select>
   </td>
 </tr>
 <tr>
   
   <td>   <input type="checkbox" name="new" class="new" id="new">New
        
   </td>
 </tr>

  <tr>
   
   <td>   Cash voucher <input type="text" name="voucher" min='1' id="voucher" required>

   </td>
 </tr>

  <tr>
   
   <td>  Discout Amount <input type="number" name="disc" min='0' max='100' >

   </td>
 </tr>
 <tr>
   
   <td>   <input type="checkbox" name="partner">Partnership
        
   </td>
 </tr>
		<tr>
		<td> <input type="submit" name="add_btn" value="add">
		</tr>

	</table>
</form>


</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script type="text/javascript">
  $(function (){
    $("#new").change(function (){
      var checked = this.checked;
        if(checked){
          $("#package").prop("disabled", false);
          $("#voucher").prop("disabled", false);
        }
        else{
          $("#package").prop("disabled", true);
          $("#voucher").val("0");
          $("#voucher").prop("disabled", true);
          

        }
    });

  });

    

</script>

<script type="text/javascript">
  $(function (){
    $("#space").change(function (){
      var space = this.value;
        if(space == "Meeting Room A" || space == "Meeting Room B"){
          $("#packA").prop("disabled", true);
          $("#packB").prop("disabled", true);
          $("#packC").prop("disabled", true);
          $("#package").val("None").change(); 
        }
        else{
          $("#packA").prop("disabled", false);
          $("#packB").prop("disabled", false);
          $("#packC").prop("disabled", false);
         
          

        }
    });

  });

    

</script>

</body>
</html>
