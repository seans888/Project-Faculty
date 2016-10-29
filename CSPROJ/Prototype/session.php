<?php
   include('db.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"SELECT * FROM employee WHERE username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $empID = $row['empid'];
   $emptype = $row['emp_type'];
   
   $ses_sql = mysqli_query($db,"SELECT * FROM user WHERE username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['username'];
   $user_firstname = $row['firstname'];
   $user_lastname = $row['lastname'];
   $usertype = $row['type'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>