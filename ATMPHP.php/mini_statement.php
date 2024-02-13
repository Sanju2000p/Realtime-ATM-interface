<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<style>
            .welcome{
            background-color: black;
            height:98%;
            width:98%;
            background-repeat: no-repeat;
            background-size: cover;
      

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
.statement{
    text-align: center;

            color: red;
            font-size:50px;
            font-weight: bold;
}
    </style>
        <body>
            
<div class="container-fluid welcome" style="background-image:url('https://wallpaperaccess.com/full/2910881.jpg')">

           
<div class="logo-container">
    <img class="logo"  src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0dLKUPaWUbzzNwLyJs71zsDkscj7dJRSg8RhO02l82Dahl-JKFzd6rQLPGPrQbzJL9IQ&usqp=CAU"></img>
</div>
    <div class="mb-3 statement">MINI STATEMENT</div>
        <table class="table">
            <thead>
                <tr>
                <th>Serial No.</th>
                    <!-- <th>ID</th> -->
                    <th>Deposit</th>
                    <th>Withdraw</th>
                    <th>Transaction Date</th>
                </tr>
            </thead>
            <tbody>

            <?php
require_once "atmmachine.php";
session_start();

$mainID=$_SESSION["mainID"];
 echo $mainID;
 $serialNo = 1; 


            require_once "atmmachine.php";
    $qry=mysqli_query($conn,"SELECT * FROM transactions where  status='1' and a_id='$mainID' ORDER BY create_date_time DESC LIMIT 5") or die(mysqli_error($conn));
    while($res=mysqli_fetch_object($qry)){

      ?>      
            <tr>
            <td><?php echo $serialNo++; ?></td>
    <!-- <td> <?php echo $res ->t_id;?> </td> -->
    <td> <?php echo $res ->deposit;?> </td>
    <td> <?php echo $res ->withdraw;?> </td>
    <td> <?php echo $res ->create_date_time;?> </td>
            </tr>         
              
         </tbody>
         

         <?php
    }
?>
        </table>
        <button type="input " class="btn btn-danger btn-lg mb-3 option languages" id="back" name="back">BACK</button>
 </div>
        <div class="row row-col-3 justify-content-center">
    <?php if (!empty($tra)) { echo '<div class="alert alert-info text-center m-3">'.$tra.'</div>'; } 
?>

</div>
</div>

  </div>

</div>
<script>
            document.getElementById("back").addEventListener("click", function(event) {
            event.preventDefault(); // Prevent the default form submission behavior
            // Replace the URL with your desired destination URL
            window.location.href = "http://localhost/ATMPHP.php/mainmenu.php"; // Replace with your target URL
        });
    </script>
</body>
</html>