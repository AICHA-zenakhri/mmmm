<?php
//Database configuration
$conn = new mysqli("localhost", "root", "","fooDZ");


if(isset($_POST['add'])){
    // Set the variables
    $name = $_POST['Name'];
    $price = $_POST['Price'];
    $description = $_POST['Desc'];
    $category = $_POST['Categ'];
    $fileName = $_FILES['Image']['name'];
    $fileTmpName = $_FILES['Image']['tmp_name'];
    $filesize = $_FILES['Image']['size'];
    $fileError = $_FILES['Image']['error'];
    $fileType = $_FILES['Image']['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg','jpeg','png','pdf');
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($filesize < 1000000) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'uploads/' . $fileNameNew;
                $image = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
            } else {
                echo "Your file is too big!";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }
   
    $select_products = $conn->prepare("SELECT * FROM `products` WHERE dish_name = ?");
    $select_products->bind_param("s", $name);
    $select_products->execute();

    if($select_products->fetch()){
        echo 'Product name already exists!';
    
    } else{
        // Prepare and bind the statement
        $insert_product = $conn->prepare("INSERT INTO `products`(`dish_name`, `dish_desc`, `dish_price`, `dish_img`, `dish_categ`) VALUES (?, ?, ?, ?, ?)");
        $insert_product->bind_param("ssdss", $name, $description, $price, $image, $category);
            
        if ($insert_product->execute()) {
            echo "New product added!";
            header("Location: menuMaker.php");
        } else {
            echo "Error: " . $insert_product->error;
        }
        $insert_product->close();
    }
}


// Close the connection
$conn->close();
?>
