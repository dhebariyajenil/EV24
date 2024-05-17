<?php
  session_start();
  include"connection.php";
  if(isset($_POST['formsubmit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];
    $phone=(double)$_POST['phone'];
    $add = $_POST['add'];
    $dob = $_POST['dob'];
    $dpfname=addslashes($_FILES['dp']['name']);
    $dptmpname=addslashes($_FILES['dp']['tmp_name']);
    $role=2;
    $status=1;
    $q="SELECT * FROM login_table WHERE email_id='$email'";
    $res=mysqli_query($con,$q);
    $row=mysqli_fetch_array($res);
    $emailcheck=$row['email_id'];
    if ($email!=$emailcheck) {
          $q1= "INSERT INTO login_table(email_id, phone_no, password, dp, role, status) VALUES ('$email', 
              '$phone', '$pass', '$dpfname', '$role', '$status')";
          $res1= mysqli_query($con,$q1);
  
          $q3="SELECT * FROM login_table WHERE email_id='$email'";
          $res3=mysqli_query($con,$q3);
          $row3=mysqli_fetch_array($res3);
          $lid=$row3['l_id'];
          
          $q2= "INSERT INTO detail_table(l_id, name, dob, address) VALUES ('$lid','$name','$dob', '$add')";
          $res2= mysqli_query($con,$q2);
  
          move_uploaded_file($_FILES["dp"]["tmp_name"],"userphotos/".$_FILES["dp"]["name"]);
  
          if($res1 && $res2){
                  echo ("<script LANGUAGE='JavaScript'>
                window.alert('User registered successfully.');
               window.location.href='loginregister.php';
              </script>");
          }
      
    }
    else{
      echo ("<script LANGUAGE='JavaScript'>
                window.alert('User Already Exist');
               window.location.href='loginregister.php';
              </script>");
    }
  } 
?>