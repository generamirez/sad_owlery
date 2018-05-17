<?php

require 'connect.php';

if (isset($_POST['login_btn'])){
    // username and password sent from form
    $myusername=mysqli_real_escape_string($dbcon,$_POST['username']);
    $mypassword=mysqli_real_escape_string($dbcon,$_POST['password']);
    
    $sql="SELECT * FROM users where username='$myusername' and password='$mypassword'";
    
    $result = mysqli_query($dbcon,$sql);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($dbcon));
        exit();
    }
    
    $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    //If result matched $myusername and $mypassword, table row must be 1 row
    if($row['username']==$myusername && $row['password']==$mypassword){
      
        $_SESSION['user'] = $row['username'];
        $_SESSION['level'] = $row['level'];

        if($row['level']=="admin"){
            header("location:employees_view.php");
        }
        else{
            header("location:sessions_view.php");
        }
    
    }
    else {
    echo "Wrong Username or Password";
    
    }
    }
    
if (isset($_POST['add_btn'])){
   $name =mysqli_real_escape_string($dbcon,$_POST['customer_name']) ;

$space= mysqli_real_escape_string($dbcon,$_POST['space']);
$num= mysqli_real_escape_string($dbcon,$_POST['custom_num']);
$package= mysqli_real_escape_string($dbcon,$_POST['package']);
$new = mysqli_real_escape_string($dbcon,$_POST["new"]);
$voucher = mysqli_real_escape_string($dbcon, $_POST['voucher']);
$disc = mysqli_real_escape_string($dbcon, $_POST["disc"]);

    if (isset ($_POST['partner'])){
        $partner = 1;
    }
    else{
        $partner=0;
    }
    if (isset ($_POST['new'])){
        $new = 1;
    }
    else{
        $new=0;
    }
$sql="INSERT INTO sessions(customer_name, space, number_of_people, package_type, date_start,voucher_code, discount_amt,
new_package, partnership, session_status) 
VALUES( '$name', '$space', '$num', '$package',NOW(), '$voucher', '$disc', '$new', '$partner', 1  )";


$result = mysqli_query($dbcon,$sql);
if (!$result) {
  printf("Error: %s\n", mysqli_error($dbcon));
  exit();
}
else{
header("location:sessions_view.php");

}

}




    if (isset($_POST['add_exp'])){

        $type= mysqli_real_escape_string($dbcon,$_POST['type']);
        $amount= mysqli_real_escape_string($dbcon,$_POST['amount']);
        $voucher= mysqli_real_escape_string($dbcon,$_POST['voucher']);
        $source= mysqli_real_escape_string($dbcon,$_POST['source']);
       
        $sql="INSERT INTO expenses(exptype_id, amount, voucher_code, source_id) 
        VALUES( '$type', '$amount', '$voucher', '$source')";
        
        
        $result = mysqli_query($dbcon,$sql);
        if (!$result) {
          printf("Error: %s\n", mysqli_error($dbcon));
          exit();
        }
        else{
        header("location:sessions_view.php");
        }
        
        }

    if (isset($_POST['add_exp'])){

        $type= mysqli_real_escape_string($dbcon,$_POST['type']);
        $amount= mysqli_real_escape_string($dbcon,$_POST['amount']);
        $voucher= mysqli_real_escape_string($dbcon,$_POST['voucher']);
        $source= mysqli_real_escape_string($dbcon,$_POST['source']);
       
        $sql="INSERT INTO expenses(exptype_id, amount, voucher_code, source_id) 
        VALUES( '$type', '$amount', '$voucher', '$source')";
        
        
        $result = mysqli_query($dbcon,$sql);
        if (!$result) {
          printf("Error: %s\n", mysqli_error($dbcon));
          exit();
        }
        else{
        header("location:sessions_view.php");
        }
        
        }
		
		if (isset($_POST['add_order'])){
			
		
			
        $voucher= mysqli_real_escape_string($dbcon,$_POST['cash_voucher']);
        $product= mysqli_real_escape_string($dbcon,$_POST['product']);
        $quantity= mysqli_real_escape_string($dbcon,$_POST['product_quantity']);
		$temp= "SELECT price FROM products WHERE product_name=$product";
       
        $sql="INSERT INTO orders(datetime_ordered, voucher_code, total_order_amount) 
        VALUES( NOW(), '$voucher', '$temp')";
        
        
        $result = mysqli_query($dbcon,$sql);
        if (!$result) {
          printf("Error: %s\n", mysqli_error($dbcon));
          exit();
        }
        else{
        header("location:orders_view.php");
        }
        
        }
		if (isset($_POST['add_product'])){
			
		
			
        $product= mysqli_real_escape_string($dbcon,$_POST['product']);
        $price= mysqli_real_escape_string($dbcon,$_POST['price']);
       
        $sql="INSERT INTO products(product_name, price) 
        VALUES('$product', '$price')";
        
        
        $result = mysqli_query($dbcon,$sql);
        if (!$result) {
          printf("Error: %s\n", mysqli_error($dbcon));
          exit();
        }
        else{
        header("location:products_view.php");
        }
        
        }
		
		
		if (isset($_POST['add_employee'])){
		
		
        $fname= mysqli_real_escape_string($dbcon,$_POST['first_name']);
        $mname= mysqli_real_escape_string($dbcon,$_POST['middle_name']);
        $lname= mysqli_real_escape_string($dbcon,$_POST['last_name']);
        $bday= mysqli_real_escape_string($dbcon,$_POST['birthday']);
        $cnum= mysqli_real_escape_string($dbcon,$_POST['contact_number']);
        $position= mysqli_real_escape_string($dbcon,$_POST['position']);
        $contract= mysqli_real_escape_string($dbcon,$_POST['contract']);
		
       
        $sql="INSERT INTO employees(first_name, middle_name, last_name, birthday, contact_number, position, contract_start) 
        VALUES('$fname', '$mname', '$lname', '$bday', '$cnum', '$position', '$contract')";
        
        $result = mysqli_query($dbcon,$sql);
        if (!$result) {
          printf("Error: %s\n", mysqli_error($dbcon));
          exit();
        }
        else{
			$sql2="UPDATE employees SET employee_id=esource_id WHERE employee_id=0";
        
        $result2 = mysqli_query($dbcon,$sql2);
		if (!$result) {
          printf("Error: %s\n", mysqli_error($dbcon));
          exit();
        }
        else{
        header("location:employees_view.php");
        }
        
        }
		
		if (isset($_POST['save_emp'])){
			
        $fname= mysqli_real_escape_string($dbcon,$_POST['first_name']);
        $mname= mysqli_real_escape_string($dbcon,$_POST['middle_name']);
        $lname= mysqli_real_escape_string($dbcon,$_POST['last_name']);
        $bday= mysqli_real_escape_string($dbcon,$_POST['birthday']);
        $cnum= mysqli_real_escape_string($dbcon,$_POST['contact_number']);
        $position= mysqli_real_escape_string($dbcon,$_POST['position']);
        $contract= mysqli_real_escape_string($dbcon,$_POST['contract_start']);
       
        $sql="UPDATE employees SET first_name='$fname', middle_name='$mname', last_name='$lname', birthday='$bday', contact_number='$cnum', position='$position', contract_start='$contract', employee_id=employee_id";
        
        
        $result = mysqli_query($dbcon,$sql);
        if (!$result) {
          printf("Error: %s\n", mysqli_error($dbcon));
          exit();
        }
        else{
        header("location:employees_view.php");
        }
        
        }

        if (isset($_POST['terminate'])){
            $id = $_GET['id'];
            $due = $_GET['due'];
        
           
            $sql="UPDATE sessions SET session_status = 0, date_end = NOW(), amt_due=$due where session_id ='$id'
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
		}
