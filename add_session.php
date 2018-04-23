<?php require 'connect.php'?>
<?php require 'login_check.php' ?>
<?php require 'functions.php'?>
<?php require 'header.php'?>

 
    <form method="post" action="add_session.php">
	<table>
		<tr><td>Customer Name</td> <tr>
		<tr><td> <input type="text" name="customer_name" class="textinput" required>
		</tr>
		<tr><td>Space</td> 
		<td> <select name="space"required>
                <option value="Shared Space"> Shared Space </option>
                <option value="Meeting Room A"> Meeting Room A </option>
                <option value="Meeting Room B"> Meeting Room B </option>
            </select>
		</tr>
    <tr>
   
      <td>   Number of people <input type="number" name="custom_num" min='1' required>

      </td>
    </tr>

    <tr>
   
   <td>   Package Type <select name="package"required>
        <option value="Weekly"> Weekly </option>
        <option value="Monthly"> Monthly </option>
        <option value="Daily"> Daily </option>
        </select>
   </td>
 </tr>
 <tr>
   
   <td>   <input type="checkbox" name="new">New
        
   </td>
 </tr>

  <tr>
   
   <td>   Cash voucher <input type="text" name="voucher" min='1' required>

   </td>
 </tr>

  <tr>
   
   <td>  Discout Amount <input type="number" name="disc" min='0' >

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



  <script>
    function openSlideMenu(){
      document.getElementById('side-menu').style.width = '20%';
      document.getElementById('main').style.marginLeft = '20%';
      document.getElementById('nav').style.marginLeft = '22%';
    }
    

    function closeSlideMenu(){
      document.getElementById('side-menu').style.width = '0';
      document.getElementById('main').style.marginLeft = '0';
      document.getElementById('nav').style.marginLeft = '0';
    }

    
  </script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>
