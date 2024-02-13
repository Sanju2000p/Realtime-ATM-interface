<?php
include_once("atmmachine.php");

if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  //echo "SELECT a_id from myguests WHERE email ='$email' AND password='$password'";
  $qry = mysqli_query($conn,"SELECT a_id FROM myguests WHERE email ='$email' AND password ='$password'") or die(mysqli_error($conn));
  while($row = mysqli_fetch_object($qry)){
    $mainID = $row->a_id;
    session_start();
    $_SESSION["mainID"] = $mainID;
  }

   //echo "$mainID";

  $count = mysqli_num_rows($qry);


  if($count > 0){
   header("location:languagepage.php");
  } else{
    $loginError="Login failed. Email or password is incorrect!";
  }
}

?>

<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <style>
        .welcome{
            background-color: black;
            height:98%;
            width:98%;
            background-repeat: no-repeat;
            background-size: cover;
            position:relative;
            animation: pulse 1s ; /* Keyframes animation */
            box-shadow: 0px 100px 100px 0px rgba(0, 0, 0, 0.7);

        }

        @keyframes pulse {
            0% {
                transform: scale(1.09 ); /* Initial size */
             
            }
            50% {
                transform: scale(1); /* 5% larger size */
            
            }
            100% {
                transform: scale(1); /* Back to initial size */
                
            }
        }
        .pulse {
        animation: pulse 1s;
        transform-origin: center;
    }

    @keyframes pulse {
        0% {
            transform: scale(1.09);
        }
        50% {
            transform: scale(1);
        }
        100% {
            transform: scale(1);
        }
    }
      

        
        .logo-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .logo{
            width:220px;
            height:100px;
            float:left ;
            background-color:white;

        }
        .logo1{
            width: 500px;
            background-color: black;
        }
        .container-fluid{
            align-items: center;
        }  
        .head{
            text-align: center;
            font-size:120px; 
            color: red;
            font-weight:bold;
    
        }
        .subhead1{
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

        }
        .subhead2{
            color: black;
           
        }
        .adminlogin{
            position: absolute;
            top: 0;
            start: 0;
}
       
    </style>
</head>
    <body>
   
    <div class="container-fluid welcome" style="background-image:url('https://wallpaperaccess.com/full/2910881.jpg')">

           
            <div class="logo-container">              
                <img class="logo"  src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0dLKUPaWUbzzNwLyJs71zsDkscj7dJRSg8RhO02l82Dahl-JKFzd6rQLPGPrQbzJL9IQ&usqp=CAU"></img>
            </div>
            <div class="container-fluid">
            <p class="display-1 head" >WELCOME</p>
            </div>
            <div class="login-form subhead1 pulse">
                <h2>LOGIN</h2>
                <form id="login-form" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label><br>
                        <input type="email"  id="email" name="email" >
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label><br>
                        <input type="password"  id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-danger" id="login" name="login">LOGIN</button>
                      
                
    

                </form>
                <?php if (!empty($loginError)) { echo '<div class="alert alert-danger d-flex align-items-center">'.$loginError.'</div>'; } 
             ?>
            </div>

          
             
             
</div>
<!-- <div class="position-relative"><button type="submit" class=" adminlogin" id="adminlogin" name="adminlogin">ADMIN LOGIN</button> </div>
            </div> -->
    </body>
</html>
