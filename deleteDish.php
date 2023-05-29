<?php 
include 'connect.php';

if(isset ($_GET['deleteid'])){

    $id=$_GET['deleteid'];

    $sql="delete from `products` where dish_id=$id";
    $result=mysqli_query($conn, $sql);
    if ($result){
      
        header ('location:menuMaker.php');
    }
    else{
        die (mysqli_error($conn) );
    }
}
?>