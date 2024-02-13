<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


   
<style>
    .swalbutton{
        background-color: red !important;;
    }
            .welcome{
            background-color: black;
            height:98%;
            width:98%;
            background-repeat: no-repeat;
            background-size: cover;
            box-shadow: 0px 100px 100px 0px rgba(0, 0, 0, 0.7);
            animation: pulse 1s ; /* Keyframes animation */
        }

        @keyframes pulse {
            0% {
                transform: scale(1.06); 
             
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
            //float:left ;


        }
        .head{
            background-color:#FFF5F5;
            font-weight: bold;
            text-align: center;
        }
        .head1{
            margin-top: 5px;
            text-shadow: 2px 2px 4px black;
        }
        //.options{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
          

        }
        .option {
            border: 5px solid red;
         width: 400px;
         height: 100px;
          font-size: 31px;
          background-color:#cc0000;
          font-weight: bold;
          transition: all 0.3s ease;
        text-align: left;
        }
        .option:hover {
          background-color: black; /* Change this to your desired color */
          color: white; 
          transform: scale(1.1);
            border: 2px solid #cc0000;
        }
        .icons{
          width: 50px;
        }
        .buttons:hover{
            background-color: white;
            color:black;
        }
        .logout{
            float: right;
            font-size: 20px;
          background-color:#cc0000;
          font-weight: bold;
          margin-top: 55px;

        }
        .iconlogout{
            width: 35px;
        }
        .inquiry{
            background-color: white;
            color:black;
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
    .pinchangebuttons{
     font-weight: bold;
    }
    </style>
</head>



<body>


<?php
require_once "atmmachine.php";
session_start();
$mainID=$_SESSION["mainID"];
//echo $mainID;

// DEPOSIT SECTION
if (isset($_POST['deposit'])) { // Check if the form with name "deposit" is submitted
    $pin = $_POST['pin'];
    $amount = ($_POST['amount']); // Get the deposit amount

    // First, you should validate the PIN, for security purposes
    $pin_validation_sql = "SELECT * FROM myguests WHERE pin = ?";
    $stmt = $conn->prepare($pin_validation_sql);
    $stmt->bind_param("i", $pin);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // PIN is valid, proceed with the deposit
        $row = $result->fetch_assoc();
        $current_balance = $row['balance'];
        $new_balance = $current_balance + $amount;

        // Update the balance in the database
        $update_sql = "UPDATE myguests SET balance = ? WHERE pin = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("di", $new_balance, $pin);
        

        $sqlinsert=mysqli_query($conn, "INSERT INTO transactions(a_id,deposit) VALUES ('$mainID','$amount')")or die(mysqli_error($conn));

        if ($update_stmt->execute()) {
            // Successfully updated the balance
            header("Location: finaldepositprocess.php");
        } else {
          $loginError = "Error updating balance: "; $conn->error;
        }
    } else {
        // Invalid PIN, you can handle this case as needed
        ?>
        <script>
        Swal.fire({
            icon: "error",
            title: "Oops...🥴",
            text: "Incorrect PIN!",
            footer: "Try Again",
            customClass: {
            confirmButton: 'swalbutton' // Add a custom class for the confirm button
        }
          });
          </script>
          <?php
    }

    $stmt->close(); // Close the prepared statement
}

//DEPOSIT SECTION END
?>



<div class="container-fluid welcome" style="background-image:url('https://wallpaperaccess.com/full/2910881.jpg')">
    
    <div class="logo-container">
        <img class="logo"  src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0dLKUPaWUbzzNwLyJs71zsDkscj7dJRSg8RhO02l82Dahl-JKFzd6rQLPGPrQbzJL9IQ&usqp=CAU"></img>
    </div>
    <div class="container-fluid head1">
        <p class="display-3 head">Dear Customer,Please Select Transaction</p>   
    </div> 


    <div class="container options  pulse">
        <div class="row justify-content-center select ">
          <div class="col-6 ">
           <button  class="btn btn-danger btn-lg mb-3 option"  data-bs-toggle="modal" data-bs-target="#exampleModal"><img class="icons"  src="https://cdn-icons-png.flaticon.com/128/8766/8766462.png"/>CHANGE PIN</button>
          </div>
         
<!-- Modal start -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-weight:bold">CHANGE PIN</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" >
  <div class="modal-body">
    <div class="d-flex flex-column align-items-left pinchangebuttons">
      <label for="email" class="form-label">ENTER EMAIL</label>
      <input type="email" class="btn btn-outline-danger btn-lg mb-3 account-button buttons" name="email">
      <label for="current_pin" class="form-label">ENTER OLD PIN</label>
      <input type="number" class="btn btn-outline-danger btn-lg mb-3 account-button buttons" name="current_pin" maxlength="4" oninput="this.value = this.value.slice(0, 4);">
      <label for="new_pin" class="form-label">ENTER NEW PIN</label>
      <input type="number" class="btn btn-outline-danger btn-lg mb-3 account-button buttons" name="new_pin" maxlength="4" oninput="this.value = this.value.slice(0, 4);">
      <label for="new_pin" class="form-label">CONFIRM NEW PIN</label>
      <input type="number" class="btn btn-outline-danger btn-lg mb-3 account-button buttons" name="confirm_new_pin" maxlength="4" oninput="this.value = this.value.slice(0, 4);">

    </div>

    <?php
      //PIN CHANGE
require_once "atmmachine.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["change_pin1"])) {
    $email = isset($_POST["email"]) ? $_POST["email"] : null;
    $currentPIN = isset($_POST["current_pin"]) ? $_POST["current_pin"] : null;
    $newPIN = isset($_POST["new_pin"]) ? $_POST["new_pin"] : null;
    $confirmPIN = isset($_POST["confirm_new_pin"]) ? $_POST["confirm_new_pin"] : null;

    if ($email !== null && $currentPIN !== null && $newPIN !== null && $confirmPIN !== null) {
        if ($newPIN === $confirmPIN) {
            // Now you can use $email, $currentPIN, and $newPIN safely
            $select_sql = "SELECT * FROM myguests WHERE email = ? AND pin = ?";
            $stmt = $conn->prepare($select_sql);
            $stmt->bind_param("ss", $email, $currentPIN);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                // Valid email and current PIN
                $update_sql = "UPDATE myguests SET pin = ? WHERE email = ?";
                $update_stmt = $conn->prepare($update_sql);
                $update_stmt->bind_param("ss", $newPIN, $email);

                if ($update_stmt->execute()) {
                    ?>
                    <script>
                        Swal.fire({
  title: "Do you want to save the changes?",
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Save",
  denyButtonText: `Don't save`
  customClass: {
            confirmButton: 'swalbutton' // Add a custom class for the confirm button
        }
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    Swal.fire("Saved!", "", "success");
  } else if (result.isDenied) {
    Swal.fire("Changes are not saved", "", "info");
  }
});
                    </script>
                    <?php
                    // $loginError1 = "PIN changed successfully!";
                } else {
                    $loginError1 = "Error updating PIN: " . $conn->error;
                }
            } else {
                // need to fill the details
                ?>
                <script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...🥴",
                    text: "Something went wrong!",
                    customClass: {
                    confirmButton: 'swalbutton' // Add a custom class for the confirm button
                      }
                    // footer: '<a href="#">Why do I have this issue?</a>'
                  });
                  </script>
                  <?php
            }

            $stmt->close();
        } else {
            ?>
            <script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...🥴",
                    text: "New PIN and Confirm PIN do not match. Please re-enter them.",
                     footer: "Try Again",
                     customClass: {
                       confirmButton: 'swalbutton' // Add a custom class for the confirm button
                    }
                  });
                  </script>
                  <?php
            // $loginError1 = "New PIN and Confirm PIN do not match. Please re-enter them.";
        }
    } else {
        $loginError1 = "Incomplete form data. Please fill in all the required fields.";
    }
}
// PIN CHANGE END
?>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
    <button type="submit" class="btn btn-danger" name="change_pin1" id="change_pin1">Save changes</button>
  </div>

</form>
  </div>
</div>
</div>
</div>



<!-- model end -->  
          <div class="col-4 ">
           <button class="btn btn-danger btn-lg mb-3 option" id=cashwithdraw><img class="icons" src="https://cdn-icons-png.flaticon.com/128/9590/9590117.png"/>CASH WITHDRAW</button>
          </div>
        </div>


        <div class="row justify-content-around select">
          <div class="col-4">
           <button class="btn btn-danger btn-lg mb-3 option" id=ministatement><img class="icons" src="https://cdn-icons-png.flaticon.com/128/2084/2084028.png"/>MINI STATEMENT</button>
          </div>
          <div class="col-4">
           <button class="btn btn-danger btn-lg mb-3 option" data-bs-toggle="modal" data-bs-target="#exampleModal1"><img class="icons" src="https://cdn-icons-png.flaticon.com/128/9590/9590116.png"/>CASH DEPOSIT</button>
          </div>
        </div>
<!-- Modal start -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">DEPOSIT</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="mainmenu.php"> <!-- This action points to the PHP processing file -->
                <div class="modal-body">
                    <div class="d-flex flex-column align-items-center">
                        <label for="amount" class="form-label"> ENTER AMOUNT</label>
                        <input type="number" class="btn btn-outline-danger btn-lg mb-3 account-button buttons" name="amount" id="amount">
                    </div>
                </div>

                <div class="modal-body">
                    <div class="d-flex flex-column align-items-center">
                        <label for="pin" class="form-label"> ENTER PIN</label>
                        <input type="password" class="btn btn-outline-danger btn-lg mb-3 account-button buttons" name="pin" id="pin">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="deposit" id="deposit">ENTER</button><!-- This name should match the PHP code -->
                </div>
            </form>
            
        </div>
    </div>
</div>
<script>
    const passwordInput = document.getElementById("pin");
    const togglePassword = document.getElementById("togglePassword");

    togglePassword.addEventListener("click", function () {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            togglePassword.classList.remove("fa-eye");
            togglePassword.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            togglePassword.classList.remove("fa-eye-slash");
            togglePassword.classList.add("fa-eye");
        }
    });
</script>
<!-- model end -->
 

        <div class="row justify-content-around select">
          <div class="col-4">
            <button class="btn btn-danger btn-lg mb-3 option" id=all_transactions name=all_transactions ><img class="icons" src="https://cdn-icons-png.flaticon.com/128/1728/1728987.png"/>ALL TRANSACTIONS</button>
          
          </div>
          <div class="col-4">
       
            <button class="btn btn-danger btn-lg mb-3 option" id=balanceinquary  data-bs-toggle="modal" data-bs-target="#exampleModal2"><img class="icons" src="https://cdn-icons-png.flaticon.com/128/733/733186.png">BALANCE INQUARY</button>
        </div>
    </div>
<!-- Modal start-->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <form method="POST" action="mainmenu.php">
              
                    <h1 class="modal-title fs-5" id="exampleModalLabel">YOUR AVAILABLE BALANCE</h1>
                    <!-- <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>

                <div class="modal-body inquiry">
                <label for="pin" class="form-label">Enter Your PIN</label>
                            <input type="password" class="btn btn-outline-danger btn-lg mb-3 account-button buttons" maxlength="4" name="pin" id="pin" >

<?php
require_once "atmmachine.php";

if (isset($_POST['balance_inquiry_balance'])) {
    $pin = $_POST['pin'];
    $mainID = $_SESSION["mainID"];

    // Verify the PIN
    $qry = mysqli_query($conn, "SELECT balance FROM myguests WHERE status='1' and a_id = '$mainID' AND pin = '$pin'") or die(mysqli_error($conn));
    $row = mysqli_fetch_object($qry);

    if ($row) {
        $balance = $row->balance;
        echo "<h2>AVAILABLE BALANCE: </h2><h1>$balance</h1>";
    } else {
        ?>
        <script>
        swal.fire({
            icon: "error",
            title: "Oops...🥴",
            text: "Incorrect PIN",
            footer: "Try Again",
            customClass: {
            confirmButton: 'swalbutton' // Add a custom class for the confirm button
        }
          });
       // $loginError ="Invalid PIN. Please try again.";
       </script>
       <?php
    }
}

?>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-secondary" id="balance_inquiry_balance" name="balance_inquiry_balance" >Enter</button>
  </div>
                

            </div>

        </div>

    </div>

</div>
    

</form>
<?php if (!empty($loginError1)) { echo '<div class="alert alert-danger d-flex align-items-center">'.$loginError1.'</div>'; } 
             ?>
<?php if (!empty($loginError)) { echo '<div class="alert alert-danger d-flex align-items-center">'.$loginError.'</div>'; } 
             ?> 
<!-- model end -->

<!-- <script>
    <?php
    // Check if the PHP variable $loginError1 or $loginError is set and not empty
    if (!empty($loginError1)) {
        // Use JavaScript to display an alert with the error message
       
        echo "alert('$loginError1')" ;
    }

    if (!empty($loginError)) {
        echo "alert('$loginError');";
    }
    ?>
</script> -->


    <script>
            document.getElementById("cashwithdraw").addEventListener("click", function(event) {
            event.preventDefault(); // Prevent the default form submission behavior
            // Replace the URL with your desired destination URL
            window.location.href = "http://localhost/ATMPHP.php/acounttype.php"; // Replace with your target URL
        });
    </script>
    <script>
            document.getElementById("ministatement").addEventListener("click", function(event) {
            event.preventDefault();
            window.location.href = "http://localhost/ATMPHP.php/mini_statement.php"; // Replace with your target URL
        });
    </script>
    <script>
            document.getElementById("all_transactions").addEventListener("click", function(event) {
            event.preventDefault(); 
            window.location.href = "http://localhost/ATMPHP.php/all_transactions.php"; // Replace with your target URL
        });
    </script>
    <script>
    const passwordInput = document.getElementById("password");
    const passwordToggle = document.getElementById("password-toggle");

    passwordToggle.addEventListener("click", () => {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordToggle.innerHTML = '<i class="fa fa-eye-slash"></i>';
        } else {
            passwordInput.type = "password";
            passwordToggle.innerHTML = '<i class="fa fa-eye"></i>';
        }
    });
</script>


    <!-- <button type="submit"  class="btn btn-danger btn-lg mb-3 float-end logout" name="logout" id="logout">
        
        <img class="iconlogout" src="https://cdn-icons-png.flaticon.com/128/10313/10313030.png">
        LOGOUT
    </button>
</form>
<script>
            document.getElementById("logout").addEventListener("click", function(event) {
            event.preventDefault(); // Prevent the default form submission behavior
            // Replace the URL with your desired destination URL
            window.location.href = "http://localhost/ATMPHP.php/welcomepage.php"; // Replace with your target URL
        });
    </script> -->

</body>

</html>