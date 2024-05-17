<?php
  include "connection.php";
  session_start();
 
  if(isset($_POST['formsubmit'])){
  $log = strtolower($_POST['uemail']);
  $pass=$_POST['upass'];
  $qry = "SELECT * FROM login_table WHERE (email_id='$log' AND password='$pass' AND role=1) OR (phone_no='$log' AND password='$pass' AND role=1)";
  $result = mysqli_query($con,$qry);
  $row=mysqli_fetch_array($result);
  $lid=$row['l_id'];
  $email=$row['email_id'];
  $pwd=$row['password'];
  $role=$row['role'];
  $phone=$row['phone_no'];
  $as=$row['status'];

    if($email==$log OR $phone==$log){
      if($pwd==$pass){
        $_SESSION['pass']=$pwd;
        if($role==1)
        {
            $_SESSION['aemail']=$email;
            $_SESSION['logid']=$lid;
            $_SESSION['aphone']=$phone;
            // $_SESSION['semail']=$email;
            // $_SESSION['slogid']=$lid;
            // $_SESSION['sphone']=$phone;
            header("location:dashboard.php");
        }
      }  
    }
    else
    {
      header("location:index.php?flag=0");
    }
}
?>