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
            header("location:sessions_view.php");
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
