<!DOCTYPE html>
<html lang="en">
    <?php
session_start();
if (!isset($_SESSION['user_id'])) {
  // User is not logged in, redirect to login page
  header("Location: login.html");
  exit(); // Stop further execution
}
?>
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->



    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>FOODZ©</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- owl css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style4.css">
    <!-- responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- awesome fontfamily -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"  />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->


      <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>





<style>
 
p
{
    color:grey;
    margin-top:5px;

}
.card
{
    background-color:#C7C7C7;
    border-radius:25px;
}

.sid ul li a
{
    color:black;
}

.logooo
{
    width:20px;
}
.full h1
{
    color:black;
    width:30px;
    font-size:30px;
    font-weight:5px;
    font-family:poppins;
}
.right_header_info .dinone a
{
color:black;
}
.done
{
    background-color:blue;
    width:50%;
    height:30px;
}
.dd{
  height:90px;

}

.order
{
    margin-left:80px;
    color:grey;
}

.orders
{
    margin-bottom:100px;
    margin-left:450px;
    color:grey;
}
.username
{
    font-weight:bold;
    color:black;
}
.total_price
{
    color:green;
}
</style>

</head>
<!-- body -->

<body class="main-layout about_page">
   

    <div class="wrapper">
    <!-- end loader -->

     <div class="sidebar  ">
            <!-- Sidebar  -->
            <nav id="sidebar">

                <div id="dismiss">
                    <i class="fa fa-arrow-left"></i>
                </div>

                <ul class="list-unstyled components">

                    <li  class="ll">
                        <a href="home.html">Home</a>
                    </li>
                    <li class = "active" class="ll">
                        
                        <a href="orders.php">Orders </a>
                    </li>
                    
                    <li >
                        <a href="menuMaker.php">Menu Maker</a>
                    </li>
                    <li>
                        <a href="settings.php">Settings</a>
                    </li>
                </ul>

            </nav>
        </div>

    <div id="content">
    <!-- header -->
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="full">
                        <a class="logooo" href="#"><h1 > FOODZ.</h1></a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="full">
                        <div class="right_header_info">
                            <ul>
                                <li class="dinone">Contact Us : <i class="fa-solid fa-phone"></i><a href="#">0558810071<a></li>

                                    <li class="dinone"><i class="fa-solid fa-envelope"></i>  <a href="#">FOODZ@gmail.com</a></li>
    
                                    <li class="dinone"> <i class="fa-solid fa-location-dot"></i> <a href="#">dar el beida zone industrielle, Algiers</a></li>
                                    <li class="dinone">
                                      <div class="dropdown">
                                         <a href="about.html"><img src="images/log.png" width="30" 
                                          height="30"/></a> 
                                        <div class="dropdown-content">
                                            <a href="settings.php">Settings</a>
                                          <a href="">Sign Out</a>
                                          
                                          
                                        </div>
                                      </div>  </li>
                                   
                                    
                                    <li>
                                        <button type="button" id="sidebarCollapse">
                                            <i class="fa-solid fa-bars"></i>
                                        </button>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->
    
    <div class="yellow_bg">
   <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                     <h2  >See who ordered from you today</h2>
                     <h3 class="order">
                        NEW orders 
                     </h3>
                  </div>
               </div>
            </div>
          </div>
</div>
<!-- about -->





<div class="about">
    <div class="container">
      <div class="row">
         <div class="col-md-12">
             
                <div class="row">
                <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Perform the query and fetch the results
$conn = mysqli_connect("localhost", "root", "", "fooDZ");
$currentDate = date('Y-m-d'); // Get the current date
$query = "SELECT users.user_full_name, orders.order_id, orders.placed_on, orders.total_price , users.tlf_num
FROM orders
JOIN users ON orders.user_id = users.user_id
WHERE orders.orders_status = 'waiting' AND orders.placed_on = '$currentDate'
GROUP BY orders.order_id";
$result = mysqli_query($conn, $query);

// Loop through the results and generate table rows
while ($row = mysqli_fetch_assoc($result)) {
    $userFullName = $row['user_full_name'];
    $orderId = $row['order_id'];
    $orderDate = $row['placed_on'];
    $totalPrice = $row['total_price'];
    $tlf_num =  $row['tlf_num'];

    echo "<div class='column'>";
    echo "<div class='card'>";
    echo "<p class='username'> name: $userFullName</p>";
    echo "<p ><u>  Orders :</u></p>";


    // Retrieve order items for the current order ID
    $queryItems = "SELECT products.dish_name, order_items.item_quantity
                 FROM order_items
                 JOIN products ON order_items.dish_id = products.dish_id
                 WHERE order_items.order_id = $orderId";
    $resultItems = mysqli_query($conn, $queryItems);

    // Loop through the order items and display them
    while ($item = mysqli_fetch_assoc($resultItems)) {
        $dishName = $item['dish_name'];
        $itemQuantity = $item['item_quantity'];

        echo "<p class='item'>$itemQuantity $dishName<br></p>";
    }
    echo "<p>phone : 0$tlf_num </p>";
    echo "<h1 class='total_price'> $totalPrice dzd</h1>";
    echo "<div class='buttons'>";
    echo "<button class='accept' data-order-id='$orderId' data-toggle='modal' data-target='#confirmAcceptModal'>ACCEPT</button>";
    echo "<button class='reject' data-order-id='$orderId' data-toggle='modal' data-target='#confirmDeleteModal'>Delete</button>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
?>

<!-- Bootstrap Modals -->
<!-- Accept Modal -->
<div class="modal fade" id="confirmAcceptModal" tabindex="-1" role="dialog" aria-labelledby="confirmAcceptModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmAcceptModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to accept this order?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="confirmAcceptBtn">Accept</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this order?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Store the selected order ID
    var selectedOrderId;

   // Triggered when the Accept button is clicked
$('.accept').click(function() {
    // Get the order ID from the data attribute
    selectedOrderId = $(this).data('order-id');
});

// Triggered when the Confirm Accept button is clicked
$('#confirmAcceptBtn').click(function() {
    // Perform the acceptance by redirecting to a PHP file that handles the acceptance
    window.location.href = "accept_order.php?orderId=" + selectedOrderId;
});


    // Triggered when the Delete button is clicked
$('.reject').click(function() {
    // Get the order ID from the data attribute
    selectedOrderId = $(this).data('order-id');
});

// Triggered when the Confirm Delete button is clicked
$('#confirmDeleteBtn').click(function() {
    // Perform the deletion by redirecting to a PHP file that handles the deletion
    window.location.href = "delete_order.php?orderId=" + selectedOrderId;
});

</script>







             
       </div> 
    </div>
</div>
<!-- end about -->


    <!-- footer -->
    <fooetr>
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                  <div class=" col-md-12">
                    <h3 class="orders"> ACCEPTED ORDERS </32>
                  </div>
                    
                      
                  <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Perform the query and fetch the results
$conn = mysqli_connect("localhost", "root", "", "fooDZ");
$currentDate = date('Y-m-d'); // Get the current date
$query = "SELECT users.user_full_name, orders.order_id, orders.placed_on, orders.total_price, users.tlf_num
FROM orders
JOIN users ON orders.user_id = users.user_id
WHERE orders.orders_status = 'accepted' AND orders.placed_on = '$currentDate'
GROUP BY orders.order_id";
$result = mysqli_query($conn, $query);

// Loop through the results and generate table rows
while ($row = mysqli_fetch_assoc($result)) {
    $userFullName = $row['user_full_name'];
    $orderId = $row['order_id'];
    $orderDate = $row['placed_on'];
    $totalPrice = $row['total_price'];
    $tlf_num = $row['tlf_num'];

    echo "<div class='column'>";
    echo "<div class='card'>";
    echo "<figure><img src='images/woman.png' width='30' height='30' style='float:left' /><p>$userFullName</p></figure>";

    // Retrieve order items for the current order ID
    $queryItems = "SELECT products.dish_name, order_items.item_quantity
                 FROM order_items
                 JOIN products ON order_items.dish_id = products.dish_id
                 WHERE order_items.order_id = $orderId";
    $resultItems = mysqli_query($conn, $queryItems);

    // Loop through the order items and display them
    while ($item = mysqli_fetch_assoc($resultItems)) {
        $dishName = $item['dish_name'];
        $itemQuantity = $item['item_quantity'];

        echo "<p>$itemQuantity $dishName</p>";
    }
    echo "<p>phone: 0$tlf_num</p>";
    echo "<h1>$totalPrice dzd</h1>";
    echo "<div class='buttons'>";
    echo "<button class='accept done' onclick='showConfirmation($orderId)'>done</button>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
?>

<!-- Bootstrap Modal -->
<div class="modal fade" id="confirmDoneModal" tabindex="-1" role="dialog" aria-labelledby="confirmDoneModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDoneModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you have done with this order?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmDoneBtn">Confirm</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Store the selected order ID
    var selectedOrderId;

    // Show the confirmation modal
    function showConfirmation(orderId) {
        selectedOrderId = orderId;
        $('#confirmDoneModal').modal('show');
    }

    // Triggered when the Confirm button in the modal is clicked
    $('#confirmDoneBtn').click(function() {
        // Perform the update by redirecting to a PHP file that handles the update
        window.location.href = "order_done.php?orderId=" + selectedOrderId + "&status=returned";
    });
</script>





              
                    
               
            </div>
            <div class="copyright">
                <div class="footer_logo">
                
                </div>
                  <div class="container">
                      <p><a href="index.html"><img src="images/FOODZ-2.png" width="100" 
                        height="100" alt="#"/></a>FOODZ© 2023 All Rights Reserved.</p>
                  </div>
            </div>
        </div>
    </fooetr>
    <!-- end footer -->

    </div>
    </div>
    <div class="overlay"></div>
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
     <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    
     <script src="js/jquery-3.0.0.min.js"></script>
   <script type="text/javascript">
        $(document).ready(function() {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function() {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>

</body>

</html>
