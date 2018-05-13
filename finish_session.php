<?php require_once 'connect.php'?>

<?php require 'functions.php'?>


<?php



$id = $_GET['id'];
$command= "SELECT *
FROM `sessions`
WHERE `session_id` =" .$id;



$sql = mysqli_query($dbcon, $command);
while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
    $name= $row['customer_name'];
    $space= $row['space'];
    $num= $row['number_of_people'];
    $package= $row['new_package'];
    $voucher = $row['voucher_code'];
    $disc = $row["discount_amt"];
    $partner= $row["partnership"];
    $new= $row["new_package"];
    $type= $row["package_type"];
    $currDue = $row["amt_due"];
    $s = strtotime($row['date_start']);
    $due = 0;
  $date = date('m/d/Y', $s);
  $time = date('H:i A', $s);


  $date2 = date('m/d/Y');
  $time2 = date('H:i A');

   $HrInterval = date('H') -date('H', $s);
   $minInterval =  date('i') - date ('i', $s);
//For meeting room A
        if (strtoupper($space) == "MEETING ROOM A" and $new == 1){
            if($num > 12){
                $excess = $num-12;
                $due+= $excess * 50;
            }
           
            if ($HrInterval >= 14){
                $due+= 9000;
            }
            elseif ($HrInterval == 13){
                $due+=8400;
                if ($minInterval >= 30){
                    $due+=600;
                }
            }
            elseif ($HrInterval == 12){
                $due+=7800;
                if ($minInterval >= 30){
                    $due+=600;
                }
            }
            elseif ($HrInterval == 11){
                $due+=7200;
                if ($minInterval >= 30){
                    $due+=600;
                }
            }
            elseif ($HrInterval == 10){
                $due+=6600;
                if ($minInterval >= 30){
                    $due+=600;
                }
            }
            elseif ($HrInterval == 9){
                $due+=6000;
                if ($minInterval >= 30){
                    $due+=600;
                }
            }
            
            elseif ($HrInterval == 8){
                $due+=5400;
                if ($minInterval >= 30){
                    $due+=600;
                }
            }
            
            elseif ($HrInterval == 7){
                $due+=4800;
                if ($minInterval >= 30){
                    $due+=600;
                }
            }
            
            elseif ($HrInterval == 6){
                $due+=4200;
                if ($minInterval >= 30){
                    $due+=600;
                }
            }
            
            elseif ($HrInterval == 5){
                $due+=3600;
                if ($minInterval >= 30){
                    $due+=600;
                }
            }
            
            elseif ($HrInterval == 4){
                $due+=3000;
                if ($minInterval >= 30){
                    $due+=600;
                }
            }
            
            elseif ($HrInterval == 3){
                $due+=2400;
                if ($minInterval >= 30){
                    $due+=600;
                }
            }
            
            elseif ($HrInterval == 2){
                $due+=1800;
                if ($minInterval >= 30){
                    $due+=600;
                }
            }
            else{
                $due +=1200;
            }
        }

//meeting room B
if (strtoupper($space) == "MEETING ROOM B" and $new == 1){
    if($num > 6){
        $excess = $num-6;
        $due+= $excess * 50;
    }
   
    if ($HrInterval >= 14){
        $due+= 4500;
    }
    elseif ($HrInterval == 13){
        $due+=4200;
        if ($minInterval >= 20){
            $due+=300;
        }
    }
    elseif ($HrInterval == 12){
        $due+=3900;
        if ($minInterval >= 20){
            $due+=300;
        }
    }
    elseif ($HrInterval == 11){
        $due+=3600;
        if ($minInterval >= 20){
            $due+=300;
        }
    }
    elseif ($HrInterval == 10){
        $due+=3300;
        if ($minInterval >= 20){
            $due+=300;
        }
    }
    elseif ($HrInterval == 9){
        $due+=3000;
        if ($minInterval >= 20){
            $due+=300;
        }
    }
    
    elseif ($HrInterval == 8){
        $due+=2700;
        if ($minInterval >= 20){
            $due+=300;
        }
    }
    
    elseif ($HrInterval == 7){
        $due+=2400;
        if ($minInterval >= 20){
            $due+=300;
        }
    }
    
    elseif ($HrInterval == 6){
        $due+=2100;
        if ($minInterval >= 20){
            $due+=300;
        }
    }
    
    elseif ($HrInterval == 5){
        $due+=1800;
        if ($minInterval >= 20){
            $due+=300;
        }
    }
    
    elseif ($HrInterval == 4){
        $due+=1500;
        if ($minInterval >= 20){
            $due+=300;
        }
    }
    
    elseif ($HrInterval == 3){
        $due+=1200;
        if ($minInterval >= 20){
            $due+=300;
        }
    }
    
    elseif ($HrInterval == 2){
        $due+=900;
        if ($minInterval >= 20){
            $due+=300;
        }
    }
    else{
        $due +=600;
    }
}
//shared space
        if (strtoupper($space) == "SHARED SPACE" and $new == 1){
            if ($minInterval < 0){
                $minInterval = $minInterval + 60;
                $HrInterval = $HrInterval - 1;
            }
         if (strtoupper($type)=="NONE"){
            if ($HrInterval >= 11){
                $due = 500;
                if ($HrInterval == 11 and $minInterval <= 10){
                    $due = $due - 50;
                }
            }
         
            elseif ($HrInterval == 10){
             $due = 450;
              if ($HrInterval ==10 and $minInterval <= 10){
                  $due = $due - 50;
              }
             }
         
             elseif ($HrInterval == 9){
                 $due = 400;
                  if ($HrInterval ==9 and $minInterval <= 10){
                      $due = $due - 50;
                  }
                 }
            
             elseif ($HrInterval == 8){
                 $due = 350;
                  if ($HrInterval ==8 and $minInterval <= 10){
                      $due = $due - 50;
                  }
                 }
         
            elseif ($HrInterval <= 7 and $HrInterval== 4){
                 $due = 300;
                  if ($HrInterval ==4 and $minInterval <= 10){
                      $due = $due - 50;
                  }
                 }
             elseif ($HrInterval == 3){
                 $due = 250;
                  if ($HrInterval ==3 and $minInterval <= 10){
                      $due = $due - 50;
                  }
                 }
             elseif ($HrInterval == 2){
                 $due = 200;
                  if ($HrInterval ==2 and $minInterval <= 10){
                      $due = $due - 50;
                  }
                 }
             elseif ($HrInterval == 1){
                 $due = 150;
                  if ($HrInterval ==1 and $minInterval <= 10){
                      $due = $due - 50;
                  }
                 }
             else{
                 $due = 100;
             }
         }
        
         if (strtoupper($type)=="DAILY"){
            $due = 300;
         }
         if (strtoupper($type)=="WEEKLY"){
            $due = 1200;
         }
         if (strtoupper($type)=="MONTHLY"){
            $due= 3000;
         }
         
            
          
         
             if ($partner==1){
                 $due = $due*.8;
             }
             else{
                 $partner=0;
             }
             $due =  ($due - $disc) * $num;
        }
   

}



?>

<html>
<?php require 'sidebar.php'?>
<div id="main" class="container">
<h4> Customer Name </h4>

<h1> <?php echo $name; ?> </h1>
<hr>
<div class="row">
    <div class="col-md-6"> Time <?php echo $num; ?> </div>
    <div class="col-md-6"> Space </div>
</div>

<div class="row">
    <div class="col-md-6"><h4><?php echo $time." - ".$time2; ?> </h4></div>
    <div class="col-md-6"><h4> <?php echo $space;?> </h4> </div>
</div>
<br>
<div class="row">
    <div class="col-md-6"> Cash Voucher </div>
    <div class="col-md-6"> People </div>
</div>

<div class="row">
    <div class="col-md-6"><h4><?php echo $voucher; ?> </h4></div>
    <div class="col-md-6"><h4> <?php echo $num;?> </h4> </div>
</div>
<hr>

<div class="row">
    <div class="col-md-6"> Package Type </div>
    <div class="col-md-6"> Discount </div>
</div>

<div class="row">
    <div class="col-md-6"><h4><?php echo $type; ?> </h4></div>
    <div class="col-md-6"><h4> <?php echo $disc;?> </h4> </div>
</div>

<div class="row">
    <div class="col-md-6"> VATable Sales </div>
    <div class="col-md-4" style="margin-left:80px;"> Php <?php echo number_format((float)$due/1.12, 2, '.', ''); ?> </div>
</div>

<div class="row">
    <div class="col-md-6" >VAT</div>
    <div class="col-md-4" style="margin-left:80px;"> Php<?php echo number_format((float)$due*.12, 2, '.', '');;?> </div>
</div>

<div class="row">
    <div class="col-md-6"><h4>TOTAL</h4></div>
    <div class="col-md-4"style="margin-left:50px;"><h3>Php<?php echo $due;?> </h3> </div>
 

</div>
<form method= "post" action ="session_terminate.php?id=<?php echo $id; ?>&due=<?php echo $due + $currDue; ?>">
    <input type= "submit" value="End" name="terminate" onClick="return confirm('Are you sure you want to end this session?');">
</form>

</div>


</html>
