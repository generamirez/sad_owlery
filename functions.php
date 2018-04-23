<?php
if (isset($_POST['login_btn'])){
    $_SESSION['logged_in']=false;
    // username and password sent from form
    $myusername=$_POST['username'];
    $mypassword=$_POST['password'];
    
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
        $_SESSION['logged_in']=true;
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

$name= $_POST['customer_name'];
$space= $_POST['space'];
$num= $_POST['custom_num'];
$package= $_POST['package'];

$voucher = $_POST['voucher'];
$disc = $_POST["disc"];
$partner= $_POST["partner"];
$new= $_POST["new"];

$sql="INSERT INTO sessions(customer_name, space, number_of_people, package_type, date_start,voucher_code, discount_amt,
new_package, partnership, session_status) 
VALUES( '$name', '$space', '$num', '$package',NOW(), '$voucher', '$disc', '$package', '$partner', 1  )";


$result = mysqli_query($dbcon,$sql);
if (!$result) {
  printf("Error: %s\n", mysqli_error($dbcon));
  exit();
}
else{
header("location:sessions_view.php");
}

}



