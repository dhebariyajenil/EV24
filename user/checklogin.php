<?php
include "connection.php";
session_start();

if (isset ($_POST['formsubmit'])) {
  $log = strtolower($_POST['email']);
  $pass = $_POST['pass'];
  $q1 = "SELECT * FROM login_table WHERE (email_id='$log' AND password='$pass') OR (phone_no='$log' AND password='$pass')";
  $res1 = mysqli_query($con, $q1);
  $row1 = mysqli_fetch_array($res1);
  $lid = $row1['l_id'];
  $email = $row1['email_id'];
  $pwd = $row1['password'];
  $role = $row1['role'];
  $phone = $row1['phone_no'];
  $as = $row1['status'];
  $q2 = "SELECT * FROM detail_table WHERE l_id='$lid'";
  $res2 = mysqli_query($con, $q2);
  $row2 = mysqli_fetch_array($res2);
  $name = $row2['name'];

  if ($as == 0) {
    if ($email == $log || $phone == $log) {
      if ($pwd == $pass) {
        header("location:loginregister.php?flag=0");
      }
    } else {
      header("location:loginregister.php?flag=1");
    }
  } else {
    if ($email == $log or $phone == $log) {
      if ($pwd == $pass) {
        if ($role == 2) {
          $_SESSION['uemail'] = $email;
          $_SESSION['uphone'] = $phone;
          echo ("<script LANGUAGE='JavaScript'>
                window.alert('Welcome $name.');
               window.location.href='index.php';
              </script>");
        }
      }
    } else {
      header("location:loginregister.php?flag=1");
    }
  }
}
?>