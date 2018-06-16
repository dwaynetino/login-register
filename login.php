    <?php  
    session_start();//session starts here  
      
    ?>  
      
      
      
    <html>  
    <head lang="en">  
        <meta charset="UTF-8">  
        <link type="text/css" rel="stylesheet" href="bootstrap-4.0.0-dist\css\bootstrap.css">  
        <title>Login</title>  
    </head>  
    <style>  
        .login-panel {  
            margin: 200px auto; 
            }

            


      
    </style>  
      
    <body>  
      
      
    <div class="container">  
        <div class="row">  
            <div class="col-md-4 col-md-offset-4">  
                <div class="login-panel panel panel-success">  
                    <div class="panel-heading">  
                        <h3 class="panel-title">Sign In</h3>  
                    </div>  
                    <div class="panel-body">  
                        <form role="form" method="post" action="login.php">  
                            <fieldset>  
                                <div class="form-group"  >  
                                    <input class="form-control" placeholder="Reg Number" name="reg_num" type="text" autofocus>  
                                </div>  
                                <div class="form-group">  
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">  
                                </div>  
      
      
                                    <input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login" >  
      
                                <!-- Change this to a button or input when using this as a form -->  
                              <!--  <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a> -->  
                            </fieldset>  
                        </form>  
                        <center><b>Not a member ?</b> <br></b><a href="registration.php">Register Here</a></center>
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  
      
      
    </body>  
      
    </html>  
      
    <?php  
      
    include("db_conection.php");  
      
    if(isset($_POST['login']))  
    {  
        $reg_num=$_POST['reg_num'];  
        $password=md5($_POST["password"]);  
      
        $check_user="select * from users WHERE reg_num='$reg_num'AND password='$password'";  
      
        $run=mysqli_query($dbcon,$check_user);  
      
        if(mysqli_num_rows($run))  
        {  
            header("Location: index.php"); 
      
            $_SESSION['reg_num']=$reg_num;//here session is used and value of $reg_num store in $_SESSION.  
            $_SESSION['name']=$name;

            $query= mysql_query("SELECT * FROM 'users' WHERE 'reg_num' = '".$_SESSION['reg_num']."' ")or die(mysql_error());
            $row = mysql_fetch_array($query);
            $num = mysql_numrows($query); //this will count the rows (if exists) 

      
        }  
        else  
        {  
          echo "<script>alert('Reg Number or Password is incorrect!')</script>";  
        }  
    }  
    ?>  
