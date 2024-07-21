<?php

include('db.php');

//legal input values
 $phone     = legal_input($_POST['phone']);
   
if(!empty($phone)){
    //  Sql Query to insert user data into database table
    Insert_data($phone);
}else{
 echo "<span class='text-danger '>Email required</span>";
}
 
// convert illegal input value to ligal value formate
function legal_input($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}

// // function to insert user data into database table
 function insert_data($phone){
 
     global $db;

      $query="INSERT INTO callreq(phone) VALUES('$phone')";

     $execute=mysqli_query($db,$query);
     if($execute==true)
     {
       echo "<span class='text-success '> Your Request Sent Successfully! Thank You </span>";
     }
     else{
      echo  "Error: " .''. "<br>" . mysqli_error($db);
     }
 }

?>