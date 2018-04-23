
<?php
require 'functions.php';
require_once 'connect.php';
require 'header.php';
$id = $_GET['id'];
$command= "SELECT *
FROM `sessions`
WHERE `session_id` =" .$id;

$sql = mysqli_query($dbcon, $command);
$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
if(isset($_POST['save_btn'])){

    $name= $_POST['customer_name'];
    $space= $_POST['space'];
    $num= $_POST['custom_num'];
    $package= $_POST['package'];
    $voucher = $_POST['voucher'];
    $disc = $_POST["disc"];
    $partner= $_POST["partner"];
    $new= $_POST["new"];

    if ($new==true){
        $new=1;
    }
    else{
        $new=0;
    }

    if ($partner==true){
        $partner=1;
    }
    else{
        $partner=0;
    }
    
    $sql="UPDATE sessions SET customer_name='$name', space='$space', number_of_people='$num', package_type='$package',voucher_code='$voucher',
     discount_amt='$disc', new_package='$new', partnership='$partner' where session_id ='$id'
    ";
    
    
    $result = mysqli_query($dbcon,$sql);
    if (!$result) {
      printf("Error: %s\n", mysqli_error($dbcon));
      exit();
    }
    else{
    header("location:sessions_view.php");
    }

}

?>

  <title>Edit Sessions</title>
<h1> Edit Session </h1>
    <form method="post" action="edit_session.php?id=<?php echo $row['session_id'];?>">
	<table>
		<tr><td>Customer Name</td> <tr>
		<tr><td> <input type="text" name="customer_name" class="textinput" value="<?php echo $row['customer_name']; ?>" required>
		</tr>
		<tr><td>Space</td> 
		<td> <select name="space" required>
        <?php if ($row['space']=="Shared Space"){
               echo" <option value='Shared Space' selected='selected'> Shared Space </option>
                <option value='Meeting Room A'> Meeting Room A </option>
                <option value='Meeting Room B'> Meeting Room B </option>";
        }

        elseif ($row['space']=="Meeting Room B"){
            echo" <option value='Shared Space'> Shared Space </option>
             <option value='Meeting Room A'> Meeting Room A </option>
             <option value='Meeting Room B'  selected='selected'> Meeting Room B </option>";
         }
     elseif ($row['space']=="Meeting Room A"){
        echo" <option value='Shared Space'> Shared Space </option>
         <option value='Meeting Room A'   selected='selected'> Meeting Room A </option>
         <option value='Meeting Room B'> Meeting Room B </option>";
         }
                ?>
            </select>
		</tr>
    <tr>
   
      <td>   Number of people <input type="number" name="custom_num" min='1' value="<?php echo $row['number_of_people']; ?>" required>

      </td>
    </tr>

    <tr>
   
   <td>   Package Type <select name="package" required>
       <?php if ($row['package_type']=="Weekly"){
           echo "<option value='Weekly' selected='selected'> Weekly </option>
           <option value='Monthly'> Monthly </option>
           <option value='Daily'> Daily </option>
           ";
       }
       elseif ($row['package_type']=="Monthly"){
        echo "<option value='Weekly'> Weekly </option>
        <option value='Monthly' selected='selected'> Monthly </option>
        <option value='Daily'> Daily </option>
        ";
        }
        elseif ($row['package_type']=="Daily"){
            echo "<option value='Weekly'> Weekly </option>
            <option value='Monthly'> Monthly </option>
            <option value='Daily' selected='selected'> Daily </option>
            ";
    }

       ?>
        </select>
   </td>
 </tr>
 <tr>
   
   <td>   <input type="checkbox" name="new" <?php if ($row['new_package']==1){ echo "checked"; } ?>>New
        
   </td>
 </tr>

  <tr>
   
   <td>   Cash voucher <input type="text" name="voucher" min='1' required value="<?php echo $row['voucher_code']; ?>">

   </td>
 </tr>

  <tr>
   
   <td>  Discout Amount <input type="number" name="disc" min='0'value="<?php echo $row['discount_amt']; ?>" >

   </td>
 </tr>
 <tr>
   
   <td>   <input type="checkbox" name="partner"  <?php if ($row['partnership']==1){ echo "checked"; } ?>>Partnership
        
   </td>
 </tr>
		<tr>
		<td> <input type="submit" name="save_btn" value="Save">
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
