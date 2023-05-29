<?php

session_start();
if (!isset($_SESSION['user_id'])) {
  // User is not logged in, redirect to login page
  header("Location: login.html");
  exit(); // Stop further execution
}


include 'connect.php';



$sql= "SELECT * FROM products";

$all_product = $conn->query($sql);



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

    <link rel="stylesheet" href="css/style3.css">

    <!-- responsive-->

    <link rel="stylesheet" href="css/responsive.css">

    <!-- awesome fontfamily -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/your-custom-library/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/your-other-library/responsive.css">
    
    <!-- JavaScript libraries -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/your-custom-library/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.nicescroll@3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/malihu-custom-scrollbar-plugin@3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.meanmenu@2.0.8/jquery.meanmenu.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sticky-kit@1.1.3/jquery.sticky-kit.min.js"></script>

	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

      <style>
        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;

            margin-left:200px;
        }

        .column-names {
  background-color: grey;
}


.column-names.hover
{
  background-color: grey;
}

       

        tr:hover {
            background-color: #ddd;
        }

        .edit-button {
            background-color: orange;
            border: none;
            color: white;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 2px 2px;
            cursor: pointer;
            width:100px;
            height:30px;
            border-radius:25px;

    
        }

        .delete-button {
            background-color: red;
            border: none;
            color: white;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 2px 2px;
            cursor: pointer;
            width:100px;
            height:30px;
            border-radius:25px;
        }

        .add-button {
            background-color: green;
            border: none;
            color: white;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 2px 2px;
            cursor: pointer;
        }

        .footer {
            font-family: Arial, sans-serif;
        }

        .tetter
        {
          width:800px;
          margin-left:50px;
          padding-left:250px;
          font-size:18px;
          margin-bottom:20px
        }

        .accordion {
            background-color: #eee;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
        }

        .active,
        .accordion:hover {
            background-color: #ccc;
        }

        .panel {
            padding: 0 18px;
            display: none;
            background-color: white;
            overflow: hidden;
        }

        .panel p {
            margin: 0;
        }



        .add{
          background-color:green;
          color:white;
          margin-left:250px;

        }

        .add a
        {
          color:black;
        }

        .add:hover
        {
          background-color:green;
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



    </style>



</head>

<!-- body -->



<body class="main-layout blog_page">

    <!-- loader  -->

    <div class="loader_bg">

        <div class="loader"><img src="images/pizza.gif" alt="" /></div>

    </div>



    <div class="wrapper">

    <!-- end loader -->



     <div class="sidebar">

            <!-- Sidebar  -->

            <nav id="sidebar">



                <div id="dismiss">

                    <i class="fa fa-arrow-left"></i>

                </div>



                <ul class="list-unstyled components">



                    <li >

                        <a href="home.html">Home</a>

                    </li>

                    <li>

                        <a href="orders.html">Orders & Reservations</a>

                    </li>

                    

                    <li class="active">

                        <a href="menuMaker.html">Menu Maker</a>

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

                      <a class="logooo" href="#"><h1> FOODZ.</h1></a>

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





<!-- blog -->

<div class="blog">

  <div class="container">

    <div class="row">

      <div class="col-md-12">

        <div class="title" >

          <i><img src="images/menuu.png" width="50" 

            height="50" alt="#"/></i>

          

          <span>Introducing FOODZ menu maker</span>

        </div>

      </div>

    </div>

    <div class="row">

      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mar_bottom">

        <div class="blog_box">

          <div class="blog_img_box">

            <figure><img src="images/menu3.jpg" alt="#"/>

             

            </figure>

          </div>

          <h3>Design your business’s menu with Menu Maker</h3>

          <p>Easily create, edit, and update all parts of your menu, so you can serve up exactly what your customers want. Menu Maker is a fast, flexible tool built right into our platform. </p>

        </div>

      </div>

      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">

        <div class="blog_box">

          <div class="blog_img_box">

            <figure><img src="images/menu2.jpg" alt="#"/>

             

            </figure>

          </div>

          <h3>Bring your offerings to life</h3>

          <p>See how easy it is to create, customize and change your menu to appeal to everyone’s palate. Specify the category of each element in your menu with some description of the made-of ingredients.  </p>

        </div>

      </div>

       <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mar_bottom">

        <div class="blog_box">

          <div class="blog_img_box">

            <figure><img src="images/menu.jpg" alt="#"/>

             

            </figure>

          </div>

          <h3>Building your menu is a piece of cake</h3>

          <p>We’ll help create your menu and give you the tools to update it as needed in a few easy-to-follow steps. Add or remove items, upload photos, update prices, change menu categories, and more.</p>

        </div>

      </div>

      

    </div>

  </div>

  <div class="footer">
  <button class="add" style="background-color: green; color: white;"><a href="addMenu.html">+ Add more to the menu</a></button>

  <div class="new">

  <form class="newtetter">
    <input class="tetter" placeholder="Search dish name , price , category .." type="text" id="searchInput">
    <button class="submit" id="searchButton"><img src="images/search_icon.png" alt="srch"></button>
  </form>
</div>

<table style="width: 1000px">
  <tr class="column-names">
    <th>Dish Name</th>
    <th>Dish Price</th>
    <th>Dish Category</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>

  <?php
  while ($row = mysqli_fetch_assoc($all_product)) {
    ?>
    <tr>
      <td><?php echo $row["dish_name"]; ?></td>
      <td><?php echo $row["dish_price"]; ?><span>.00 dzd</span></td>
      <td><?php echo $row["dish_categ"]; ?></td>
      <td>
<!-- Edit Dish Link -->
<button type="button" class="edit-button" data-bs-toggle="modal" data-bs-target="#editDishModal" onclick="fillEditForm('<?php echo $row['dish_id']; ?>', '<?php echo $row['dish_name']; ?>', '<?php echo $row['dish_categ']; ?>', '<?php echo $row['dish_price']; ?>')">Edit</button>
      </td>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<!-- Edit Dish Modal -->
<div class="modal fade" id="editDishModal" tabindex="-1" role="dialog" aria-labelledby="editDishModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editDishModalLabel">Edit Dish</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Edit Dish Form -->
        <form id="editDishForm" action="process_edit_dish.php" method="POST">
  <input type="hidden" id="editDishId" name="dishId">
  <div class="form-group">
    <label for="editDishName">Dish Name</label>
    <input type="text" class="form-control" id="editDishName" name="dishName" required>
  </div>
  <div class="form-group">
    <label for="editDishCategory">Dish Category</label>
    <input type="text" class="form-control" id="editDishCategory" name="dishCategory" required>
  </div>
  <div class="form-group">
    <label for="editDishPrice">Dish Price</label>
    <input type="number" class="form-control" id="editDishPrice" name="dishPrice" required>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
    <button type="submit" class="btn btn-primary">Save Changes</button>
  </div>
</form>

      </div>
    </div>
  </div>
</div>


      <td>
        <button class="delete-button" onclick="deleteDish(<?php echo $row['dish_id']; ?>)">
          <a style="text-decoration: none; color: white;" href="#" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal">Delete</a>
        </button>
      </td>
    </tr>
  <?php
  }
  ?>
</table>

<script>
  // Dynamic search functionality
  document.getElementById('searchInput').addEventListener('input', function(event) {
    var searchInput = event.target.value.toLowerCase();
    var rows = document.getElementsByTagName('tr');

    for (var i = 1; i < rows.length; i++) {
      var name = rows[i].getElementsByTagName('td')[0].innerText.toLowerCase();
      var price = rows[i].getElementsByTagName('td')[1].innerText.toLowerCase();
      var category = rows[i].getElementsByTagName('td')[2].innerText.toLowerCase();

      if (name.includes(searchInput) || price.includes(searchInput) || category.includes(searchInput)) {
        rows[i].style.display = '';
      } else {
        rows[i].style.display = 'none';
      }
    }
  });
</script>


 



        <div class="row">
            <div class="col-md-12"></div>
            <div class="col-md-12">
                <ul class="lik"></ul>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer>
        <div class="footer">
            <div class="accord">
                <div class="col-md-12">
                    <h3>Frequently asked questions</h3>
                </div>
                <button class="accordion">How do I access Menu Maker?</button>
                <div class="panel">
                    <p>You can access Menu Maker by signing in to FOODZ Manager, then clicking Menu in the left sidebar</p>
                </div>
                <button class="accordion">I have multiple store locations on the FOODZ website. Can I make changes to all store menus at the same time?</button>
                <div class="panel">
                    <p>At this time, menus for different store locations will need to be updated individually. Menu Maker cannot currently make menu edits that span multiple store locations.</p>
                </div>
                <button class="accordion">How long does it take for changes that I make in Menu Maker to go live?</button>
                <div class="panel">
                    <p>Any change saved in Menu Maker will be live to customers right away.</p>
                </div>
            </div>
            <div class="container">
                <p><a href="home.html"><img src="images/FOODZ-2.png" width="100" height="100" alt="#"></a>FOODZ© 2023 All Rights Reserved.</p>
            </div>
        </div>
    </footer>
    <!-- end footer -->

    <!-- Modal -->
    


    <!-- Modal -->
    <!-- Add these script tags in the <head> section or before the closing </body> tag -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>

<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this dish?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="confirmDeleteButton">Yes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>



<!-- Add this script at the end, before the closing </body> tag -->
<script>
  // JavaScript code for deleting a dish
  function deleteDish(dishId) {
    // Set the dish ID in the confirmation modal
    document.getElementById("confirmDeleteButton").setAttribute("data-dish-id", dishId);
  }

  // Attach event listener to the delete confirmation button
  document.getElementById("confirmDeleteButton").addEventListener("click", function() {
    // Get the dish ID from the data attribute
    var dishId = this.getAttribute("data-dish-id");

    // Perform the delete action (you can modify this code based on your requirements)
    window.location.href = "deleteDish.php?deleteid=" + dishId;
  });
</script>




    <div class="overlay"></div>

    <!-- Javascript files-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" ></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>

    <script src="js/jquery.min.js"></script>

    <script src="js/popper.min.js"></script>

    <script src="js/bootstrap.bundle.min.js"></script>

    <script src="js/owl.carousel.min.js"></script>

    <script src="js/custom.js"></script>

     <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" ></script>



    

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

        }); </script>

        <script>



          acc = document.getElementsByClassName("accordion");

        var i;

        

        for (i = 0; i < acc.length; i++) {

        acc[i].addEventListener("click", function() {

        /* Toggle between adding and removing the "active" class,

        to highlight the button that controls the panel */

        this.classList.toggle("active");

        

        /* Toggle between hiding and showing the active panel */

        var panel = this.nextElementSibling;

        if (panel.style.display === "block") {

         panel.style.display = "none";

        } else {

         panel.style.display = "block";

        }

        });

        }

        </script>





<!-- Add this script at the end, before the closing </body> tag -->


</script>
<script>

function fillEditForm(dishId, dishName, dishCategory, dishPrice) {
    // Code to fill the edit form with the provided values
    // For example:
    document.getElementById('editDishId').value = dishId;
    document.getElementById('editDishName').value = dishName;
    document.getElementById('editDishCategory').value = dishCategory;
    document.getElementById('editDishPrice').value = dishPrice;
}
</script>


<script>
        $(document).ready(function() {
            // Initialize the libraries and use the functions
            $(".brand-box").niceScroll({
                cursorcolor: "#9b9b9c",
            });

            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('header nav').meanmenu();

            $(".sticky-wrapper-header").sticky({
                topSpacing: 0
            });
        });
    </script>



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
