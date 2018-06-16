<?php  
    session_start();  
      
    if(!$_SESSION['reg_num'])  
    {  
      
        header("Location: login.php"); //redirect to login page to secure the welcome page without login access.  
    }  
       //database connection
       $dbcon=mysqli_connect("localhost","root","");  
       mysqli_select_db($dbcon,"project102"); 


       //selecting stuff from users
       $sql = "SELECT * FROM users WHERE reg_num = '" . $_SESSION['reg_num'] . "'";
       $result = mysqli_query($dbcon,$sql);
       $row = mysqli_fetch_array($result);
       $val = $row['reg_num'];
       $val2 = $row['email'];
?>  


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="shortcut icon" href="images/star.png" type="favicon/ico" /> -->

        <title>DACS</title>

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.theme.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/flexslider.css">
        <link rel="stylesheet" href="css/pricing.css">
        <link rel="stylesheet" href="css/main.css">

        <style type="text/css">
            .proc{
                margin-left: 150px;
                margin-top: 200px;
                border-radius: 50%;
            }
        </style>


        <script src="js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.flexslider.min.js"></script>
        <script type="text/javascript">
            $(window).load(function() {
                $('.flexslider').flexslider({
                 animation: "slide",
                 controlsContainer: ".flexslider-container"
                });
            });
        </script>

        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <script>
            function initialize() {
                var mapCanvas = document.getElementById('map-canvas');
                var mapOptions = {
                    center: new google.maps.LatLng(24.909439, 91.833800),
                    zoom: 16,
                    scrollwheel: false,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }
                var map = new google.maps.Map(mapCanvas, mapOptions)

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(24.909439, 91.833800),
                    title:"Mamma's Kitchen Restaurant"
                });

                // To add the marker to the map, call setMap();
                marker.setMap(map);
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>


    </head>
    <body data-spy="scroll" data-target="#template-navbar">

        <!--== 4. Navigation ==-->
        <nav id="template-navbar" class="navbar navbar-default custom-navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#Food-fair-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img id="logo" src="images/Logo_main.png" class="logo img-responsive">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="Food-fair-toggle">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#about">profile</a></li>
                        <li><a href="#pricing">pricing</a></li>
                        <li><a href="#contact">contact</a></li>
                        <li><a href="settings.php">settings</a></li>
                        <li><a href="logout.php">logout</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.row -->
        </nav>


        <!--== 5. Header ==-->
        <section id="header-slider" class="owl-carousel">
            <div class="item">
                <div class="container">
                    <div class="header-content">
                        <h1 class="header-title">BEST FOOD</h1>
                        <p class="header-sub-title">cooked with best cooks</p>
                    </div> <!-- /.header-content -->
                </div>
            </div>
            <div class="item">
                <div class="container">
                    <div class="header-content">
                        <h1 class="header-title">BEST SNACKS</h1>
                        <p class="header-sub-title">made with best snackers</p>
                    </div> <!-- /.header-content -->
                </div>
            </div>
            <div class="item">
                <div class="container">
                    <div class="header-content text-right pull-right">
                        <h1 class="header-title">BEST DRINKS</h1>
                        <p class="header-sub-title">brewed with best drinkers lol</p>
                    </div> <!-- /.header-content -->
                </div>
            </div>
        </section>



        <!--== 6. About us ==-->
        <section id="about" class="about">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row dis-table">
                        <div class="col-xs-12 col-sm-6  dis-table-cell">
                           <?php
                           
                            echo'<tr>
                        <td>
                        <img class="proc" height="280px" width="280px" position="50%" src="data:image/png;base64,'.base64_encode($row['picture']).'"/>
                        </td>
                    </tr>';
                            ?>

                        </div>
                        <div class="col-xs-12 col-sm-6 dis-table-cell">
                            <div class="section-content">
                                <h2 class="section-content-title">Welcome <?php echo $_SESSION['reg_num']; ?></h2>
                                <p class="section-content-para">
                                   <div class="row">
                            
                            <div class="col-sm-9">
                                <div class="row">
                                    
                                    <div class="col-md-6"><b>Name</b></div>  <div class="col-md-6"><b><?php echo  $row['name'] ." " . $row['sname']   ?></b></div>
                                </div><br>
                                    
                                <div class="row">
                                    <div class="col-md-6"><b>Reg Number</b></div>  <div class="col-md-6"><b><?php echo $_SESSION['reg_num']; ?></b></div>

                                </div><br>
                                <div class="row">
                                    <div class="col-md-6"><b>Email</b></div>  <div class="col-md-6"><b><?php echo  $row['email'] ?></b></div>

                                </div><br>
                                <div class="row">
                                    <div class="col-md-6"><b>Balance</b></div>  <div class="col-md-6"><b><?php echo "$ " . $row['amount'] ?></b></div>

                                </div><br>

                              
                                    
                            </div>
                        </div>
                                </p>
                                <p class="section-content-para">
                                    <button class="btn btn-info" data-target="#tmodal" data-toggle="modal" >Transaction History</button> 
                                    <br><br>
                                    <div class="modal" id="tmodal" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Transaction History</h4>
                                            </div>
                                            <div class="modal-body">
                                            <form>    
                                            </div>
                                            <div class="modal-footer">
                                                <button name="lt" class="btn btn-primary">Transfer Out </button>
                                                <button name="pt" class="btn btn-primary">Transfer In</button>
                                                <button class="btn btn-primary" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div> 
                                         
                                    </div>
                                      
                                    <div class="row">
                                        <form>
                                            <input type="hidden" name="username" value="<?php echo (isset($val)) ?  $val : '' ?>" />
                                            
                                    <input type="number" name="amount" placeholder="e.g 20"> <button class="btn btn-success" >Make Payment </button>
                                </form>




                                </div><br>
                                </p>
                            </div> <!-- /.section-content -->
                        </div>
                    </div> <!-- /.row -->
                </div> <!-- /.container-fluid -->
            </div> <!-- /.wrapper -->
        </section> <!-- /#about -->


        <!--==  7. Afordable Pricing  ==-->
        <section id="pricing" class="pricing">
            <div id="w">
                <div class="pricing-filter">
                    <div class="pricing-filter-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="section-header">
                                        <h2 class="pricing-title">Affordable Pricing</h2>
                                        <ul id="filter-list" class="clearfix">
                                            <li class="filter" data-filter="all">All</li>
                                            <li class="filter" data-filter=".breakfast">Breakfast</li>
                                            <li class="filter" data-filter=".special">Special</li>
                                            <li class="filter" data-filter=".desert">Desert</li>
                                            <li class="filter" data-filter=".dinner">Dinner</li>
                                        </ul><!-- @end #filter-list -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">  
                        <div class="col-md-10 col-md-offset-1">
                            <ul id="menu-pricing" class="menu-price">
                                <li class="item dinner">

                                    <a href="#">
                                        <img src="images/sadza1.jpg" class="img-responsive" alt="Food" >
                                        <div class="menu-desc text-center">
                                            <span>
                                                <h3>Sadza &amp; Beans</h3>
                                                Sadza &amp; Beans with vegetables
                                            </span>
                                        </div>
                                    </a>
                                        
                                    <h2 class="white">$1</h2>
                                </li>

                                <li class="item breakfast">

                                    <a href="#">
                                        <img src="images/sadza2.jpg" class="img-responsive" alt="Food" >
                                        <div class="menu-desc">
                                            <span>
                                                <h3>Sadza &amp; Beef</h3>
                                                Sadza &amp; Beef with vegetables
                                            </span>
                                        </div>
                                    </a>
                                        
                                    <h2 class="white">$1</h2>
                                </li>
                                <li class="item desert">

                                    <a href="#">
                                        <img src="images/lacto1.png" class="img-responsive" alt="Food" >
                                        <div class="menu-desc">
                                            <span>
                                                <h3>Sadza &amp; Lacto</h3>
                                                Sadza with 1 packet lacto
                                            </span>
                                        </div>
                                    </a>
                                        
                                    <h2 class="white">$1</h2>
                                </li>
                                <li class="item breakfast special">

                                    <a href="#">
                                        <img src="images/rice1.jpg" class="img-responsive" alt="Food" >
                                        <div class="menu-desc">
                                            <span>
                                                <h3>Rice &amp; Beef</h3>
                                                
                                            </span>
                                        </div>
                                    </a>
                                        
                                    <h2 class="white">$1</h2>
                                </li>
                                <li class="item breakfast">

                                    <a href="#">
                                        <img src="images/food5.jpg" class="img-responsive" alt="Food" >
                                        <div class="menu-desc">
                                            <span>
                                                <h3>Vegetable Dish</h3>
                                                Magna aliqua. Ut enim ad minim veniam
                                            </span>
                                        </div>
                                    </a>
                                        
                                    <h2 class="white">$1</h2>
                                </li>
                                <li class="item dinner special">

                                    <a href="#">
                                        <img src="images/food6.jpg" class="img-responsive" alt="Food" >
                                        <div class="menu-desc">
                                            <span>
                                                <h3>Chicken Dish</h3>
                                                Quis nostrud exercitation ullamco laboris
                                            </span>
                                        </div>
                                    </a>

                                    <h2 class="white">$1</h2>
                                </li>
                                <li class="item desert">

                                   
                                    
                                    
                                    
                                </li>  
                            </ul>

                            <!-- <div class="text-center">
                                    <a id="loadPricingContent" class="btn btn-middle hidden-sm hidden-xs">Load More <span class="caret"></span></a>
                            </div> -->

                        </div>   
                    </div>
                </div>

            </div> 
        </section>


       






       




        <section id="contact" class="contact">
            <div class="container-fluid color-bg">
                <div class="row dis-table">
                    <div class="hidden-xs col-sm-6 dis-table-cell">
                        <h2 class="section-title">Contact With us</h2>
                    </div>
                    <div class="col-xs-6 col-sm-6 dis-table-cell">
                        <div class="section-content">
                            <p> SU DACS</p>
                            <p>+263 778 213584</p>
                            <p>dacsdax@mail.com </p>
                        </div>
                    </div>
                </div>
                <div class="social-media">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <ul class="center-block">
                                <li><a href="#" class="fb"></a></li>
                                <li><a href="#" class="twit"></a></li>
                                <li><a href="#" class="g-plus"></a></li>
                                <li><a href="#" class="link"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container-fluid">
            <div class="row">
                <div id="map-canvas"></div>
            </div>
        </div>



        <section class="contact-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                        <div class="row">
                             <form class="contact-form" method="post" action="contact.php">
                                
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input  name="name" type="text" class="form-control" id="name" required="required" placeholder="  Name">
                                    </div>
                                    <div class="form-group">
                                        <input name="email" type="email" class="form-control" id="email" required="required" placeholder="  Email">
                                    </div>
                                    <div class="form-group">
                                        <input name="subject" type="text" class="form-control" id="subject" required="required" placeholder="  Subject">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <textarea name="message" type="text" class="form-control" id="message" rows="7" required="required" placeholder="  Message"></textarea>
                                </div>

                                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                                    <div class="text-center">
                                        <button type="submit" id="submit" name="submit" class="btn btn-send">Send </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="copyright text-center">
                            <p>
                                &copy; Copyright, 2018 <a href="#">Project102</a> Theme by <a href="http://varconn.com/"  target="_blank">Project102</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="js/jquery.mixitup.min.js" ></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script type="text/javascript" src="js/jquery.hoverdir.js"></script>
        <script type="text/javascript" src="js/jQuery.scrollSpeed.js"></script>
        <script src="js/script.js"></script>
        

    </body>
</html>