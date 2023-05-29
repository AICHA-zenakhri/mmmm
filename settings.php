<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ensure the user_id is set in the session
if (!isset($_SESSION['user_id'])) {
    // Redirect the user to a login page or display an error message
    // Example: header('Location: login.php');
    exit("User ID not found in the session.");
}

$userId = $_SESSION['user_id'];
include 'connect.php';






// Use prepared statements to avoid SQL injection
$stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ?");

$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

$row = $result->fetch_assoc();
$stmt->close();
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="css/style5.css">
    <!-- responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- awesome fontfamily -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"  />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout Contact_page">
    <!-- loader  -->
    
        <!-- end loader -->
        <div class="sidebar">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div id="dismiss">
                    <i class="fa fa-arrow-left"></i>
                </div>

                <ul class="list-unstyled components">
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="orders.php">Orders & Reservations</a>
                    </li>
                    <li>
                        <a href="menuMaker.php">Menu Maker</a>
                    </li>
                    <li class="active">
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
                                <a class="logo" href="index.html"><h1> FOODZ.</h1></a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="full">
                                <div class="right_header_info">
                                    <ul>
                                        <li class="dinone">Contact Us : <i class="fa-solid fa-phone"></i><a href="#">0558810071</a></li>
                                        <li class="dinone"><i class="fa-solid fa-envelope"></i> <a href="#">FOODZ@gmail.com</a></li>
                                        <li class="dinone"> <i class="fa-solid fa-location-dot"></i> <a href="#">dar el beida zone industrielle, Algiers</a></li>
                                        <li class="dinone">
                                            <div class="dropdown">
                                                <a><img src="images/log.png" width="30" height="30"/></a>
                                                <div class="dropdown-content">
                                                    <a href="settings.php">Settings</a>
                                                    <a href="logout.php">Sign Out</a>
                                                </div>
                                            </div>
                                        </li>
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
            <!-- footer -->
            <footer>
                <div class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <h2>Your personal information</h2>
                            <form class="main_form" action="edit_personal_info.php" method="post">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div class="img-box"></div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <label for="">Name</label>
                                        <input class="form-control" placeholder="<?php echo $row["user_full_name"]; ?>" type="text" name="Name">
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <label for="">Email</label>
                                        <input class="form-control" placeholder="<?php echo $row["email"]; ?>" type="text" name="Email">
                                    </div>
                                    
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <label for="">phone</label>
                                        <input class="form-control" placeholder="<?php echo $row["tlf_num"]; ?>" type="text" name="Phone">
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <label for="">password</label>
                                        <input class="form-control" placeholder="enter new password " type="text" name="password">
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <button class="send" type="submit">Save Changes</button>
                                    </div>
                                </div>
                            </form>

                            <?php
                            
                            
                    
                            
                           
                     $conn2 = new mysqli("localhost", "root", "", "fooDZ");
                             if ($conn2->connect_error) {
                    die("Connection failed: " . $conn2->connect_error);
                      }

                $email = $row['email'];
                            $result2 = $conn2->query("SELECT * FROM restaurant WHERE email = '{$email}'");
                                      if (!$result2) {
    die("Query failed: " . mysqli_error($conn2));
}
?>
<!-- Rest of the HTML code -->



<!-- Rest of the HTML code -->

<h2>Your store information</h2>

<?php 
while ($row2 = $result2->fetch_assoc()) { ?>
    <form class="main_form" action="edit_store_info.php" method="post">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="img-box">
                    <figure><img src="images/store.png" alt="img" width="100" height="100"/></figure>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <label for="">store name</label>
                <input class="form-control" value="<?php echo $row2["store_name"]; ?>" type="text" name="Name">
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <label for="">Address</label>
                <input class="form-control" value="<?php echo $row2["store_address"]; ?>" type="text" name="Address">
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <label for="">phone number</label>
                <input class="form-control" value="<?php echo $row2["phone_num"]; ?>" type="text" name="Phone">
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <label for="Business">Business type:</label>
                <select class="form-control" name="Business">
                    <option>Restaurant</option>
                    <option>Coffee Shop</option>
                </select>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <button class="send" type="submit">Save Changes</button>
            </div>
        </div>
    </form>
<?php } ?>

<!-- Rest of the HTML code -->

            </footer>
            <!-- end footer -->
        </div>
    </div>
    <div class="overlay"></div>
    <!-- Javascript files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
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
