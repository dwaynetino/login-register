    <html>  
    <head lang="en">  
        <meta charset="UTF-8">  
        <link type="text/css" rel="stylesheet" href="bootstrap-4.0.0-dist\css\bootstrap.css">  
        <title>Registration</title>  
    </head>  
    <style>  
        .login-panel {  
            margin-top: 150px; 
            }
            body{
                background-image: images/login.jpg;
            } 
      
    </style>  
    <body>  
      
    <div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->  
        <div class="row"><!-- row class is used for grid system in Bootstrap-->  
            <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->  
                <div class="login-panel panel panel-success">  
                    <div class="panel-heading">  
                        <h3 class="panel-title">Registration</h3>  
                    </div>  
                    <div class="panel-body">  
                        <form role="form" method="post" action="" enctype="multipart/form-data">  
                            <fieldset>  
                                <div class="form-group">  
                                    <input class="form-control" placeholder="Reg Number" name="reg_num" type="text" required="required" autofocus>  
                                </div>  
                                
                                <div class="form-group">  
                                    <input class="form-control" placeholder="Name" name="name" type="text" required="required" autofocus>  
                                </div> 

                                <div class="form-group">  
                                    <input class="form-control" placeholder="Surname" name="sname" type="text" required="required" autofocus>  
                                </div>


                                <div class="form-group">  
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" required="required" autofocus>  
                                </div>  

                                <div class="form-group">  
                                    <input class="form-control" placeholder="Barcode" name="barcode" type="text" required="required" autofocus>  
                                </div>

                                <div class="form-group">  
                                    <input class="form-control" placeholder="Password" name="password" type="password" required="required" value="">  
                                </div>  
                                
                                 <div class="form-group">
                                     <label>Profile Picture</label>
                                    <input class="form-control" name="image" type="file" required="required" value="">  
                                </div> 
      
                                <input class="btn btn-lg btn-success btn-block" type="submit" value="register" name="register" >  
      
                            </fieldset>  
                        </form>  
                        <center><b>Already registered ?</b> <br></b><a href="login.php">Login here</a></center><!--for centered text-->  
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  
      
    </body>  
      
    </html>  
      
    <?php  
      
    include("db_conection.php");//make connection here  
    if(isset($_POST['register']))  
    {  
        $reg_num=$_POST['reg_num'];
        $name=$_POST['name'];
        $sname=$_POST['sname'];
        $barcode=$_POST['barcode'];
          
        $password=md5($_POST["password"]);//same  
        $email=$_POST['email'];//same  
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        
      
        
    //here query check weather if user already registered so can't register again.  
        $check_reg_query="select * from users WHERE reg_num='$reg_num'";   
        $run_query=mysqli_query($dbcon,$check_reg_query);  
      
        if(mysqli_num_rows($run_query)>0)  
        {  
    echo "<script>alert('$reg_num is already exist in our database, Please try another one!')</script>";  
    exit();  
        }  
    //insert the user into the database.  
        $insert_user="insert into users (reg_num,name,sname,password,email,amount,barcode,picture) VALUE ('$reg_num','$name','$sname','$password','$email','0','$barcode','$file')";  
        $insert_user2="insert into balance (reg_num,amount) VALUE ('$reg_num','0')"; 
        $query = "INSERT INTO profilepic (reg_num,picture) VALUES ('$reg_num','$file')";
        if(mysqli_query($dbcon,$insert_user))  
        {  
            header("Location: login.php");
            mysqli_query($dbcon,$insert_user2);
              mysqli_query($dbcon,$query);
            
             

        }  
      
      
    }  
      
    ?>  
  