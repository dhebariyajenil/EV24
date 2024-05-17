<?php 
include 'connection.php';
session_start();

if(isset($_POST['formsubmit'])){
    $rate=$_POST['rating'];
    $comment=$_POST['comment'];
    $ulid = $_SESSION['ulid'];
    
    $q1="INSERT INTO feedback(l_id, ratings, comment)
        VALUES('$ulid','$rate','$comment')";
    $res1=mysqli_query($con,$q1);
    if($res1){
        echo ("<script LANGUAGE='JavaScript'>
               window.alert('Thank You for sharing your valuable feedback.');
               window.location.href='feedback.php';
               </script>");
    }
}

?>