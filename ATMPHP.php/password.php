<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<head>
   


<!-- Rest of your PIN entry page HTML -->

    <style>
        .welcome{
            background-color: black;
            height:98%;
            width:98%;
            background-repeat: no-repeat;
            background-size: cover;
            box-shadow: 0px 100px 100px 0px rgba(0, 0, 0, 0.7);   
        } 

        .logo-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .logo {
            width: 220px;
            height: 100px;
            float: left;
            background-color: white;
        }

        .head {
            background-color: #FFF5F5;
            font-weight: bold;
            text-align: center;
        }

        .head1 {
            margin-top: 5px;
            text-shadow: 2px 2px 4px black;
        }

        .pin-input {
            width: 70px;
            height: 70px;
            font-size: 20px;
            text-align: center;
        }

        .bar {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .submit {
            padding-top: 5px;
        }

        .amount-input {
            width: 200px;
        }
        .btn-red {
        background-color: red !important; // Change the button's background color to red
        color: white !important; // Change the button's text color to white
    }
    </style>
</head>

<body>
<?php
require_once "atmmachine.php";
session_start();
$mainID=$_SESSION["mainID"];
// echo $mainID;
?>

    <?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once "atmmachine.php";
$loginError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["continue1"])) {
    $pinDigits = isset($_POST["pin"]) ? $_POST["pin"] : array();

    if (count($pinDigits) === 4) {
        $pin = implode('', $pinDigits);

        // Validate the PIN
        $pin_validation_sql = "SELECT * FROM myguests WHERE pin = ? ";
        $stmt = $conn->prepare($pin_validation_sql);
        

        if ($stmt) {
            $stmt->bind_param("s", $pin);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $current_balance = $row['balance'];
                $storedAmount = $_SESSION['amount'];

                if ($current_balance >= $storedAmount) {
                   $new_balance = $current_balance - $storedAmount;
                //    if ($stored_amount != null) {
                //    }
                //     else{$loginError= "ENTER THE AMOUNT";}
                    // Update the balance
                    $update_sql = "UPDATE myguests SET balance = ? WHERE pin = ?";
                    $update_stmt = $conn->prepare($update_sql);
                    $sqlinsert=mysqli_query($conn, "INSERT INTO transactions(a_id,withdraw) VALUES ('$mainID','$storedAmount')")or die(mysqli_error($conn));
                    if ($update_stmt) {
                        $update_stmt->bind_param("ds", $new_balance, $pin);

                        if ($update_stmt->execute()) {
                            // Balance updated successfully, proceed to the next page
                            header("Location: finalprocess.php");
                            exit();
                        } else {
                            $loginError = "Error updating balance: " . $update_stmt->error;
                        }
                    } else {
                        $loginError = "Error preparing balance update query: " . $conn->error;
                    }
                } else {
                    ?>
                <script>
                Swal.fire({
                    icon: "warning",
                    title: "Oops...😢",
                    text: "Insufficient balance.",
                    footer: "Try Again",
                  });
                  </script>
                  <?php
                //$loginError = "Insufficient balance. Please try again.";
                
                }
            } else {
                ?>
                <script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...🥴",
                    text: "Incorrect PIN!",
                    footer: "Try Again",
                  });
                  </script>
                  <?php

                //$loginError = "Invalid PIN. Please try again.";
            }

            $stmt->close();
        } else {
            $loginError = "Error preparing PIN validation query: " . $conn->error;
        }
    } else {
        $loginError = "Invalid PIN format. Please enter a 4-digit PIN.";
    }
}
                
$conn->close();
?>
<div class="container-fluid welcome" style="background-image:url('https://wallpaperaccess.com/full/2910881.jpg')">

    <div class="logo-container">
        <img class="logo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0dLKUPaWUbzzNwLyJs71zsDkscj7dJRSg8RhO02l82Dahl-JKFzd6rQLPGPrQbzJL9IQ&usqp=CAU"></img>
    </div>
    <div class="container head1">
        <p class="display-4 head">Dear Customer,<br>Please Enter Your Four-Digit Pin
        </p>
    </div>
    <div class="btn-toolbar bar" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group me-2" role="group" aria-label="First group">
            <form method="POST">
                <input type="password" class="pin-input" maxlength="1" oninput="moveToNextInput(this)" name="pin[]">
                <input type="password" class="pin-input" maxlength="1" oninput="moveToNextInput(this)" name="pin[]">
                <input type="password" class="pin-input" maxlength="1" oninput="moveToNextInput(this)" name="pin[]">
                <input type="password" class="pin-input" maxlength="1"  name="pin[]">

                <div class="d-flex flex-column align-items-center submit">
                    <button type="button " class="btn btn-danger btn-lg mb-3 option languages" name="continue1">CONTINUE</button>
                    <button type="button " class="btn btn-danger btn-lg mb-3 option languages" id="back" name="back">BACK</button>
                </div>
                <?php if (!empty($loginError)) { echo '<div class="alert alert-danger d-flex align-items-center">'.$loginError.'</div>'; } 
             ?>
            </form>
        </div>
    </div>
</div>
<script>
           document.getElementById("back").addEventListener("click", function(event) {
    event.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: 'You want to go back?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, go back',
        cancelButtonText: 'No, stay here',
        customClass: {
            confirmButton: 'btn-red' // Add a custom class for the confirm button
        }
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "http://localhost/ATMPHP.php/enteramount.php"; // Replace with your target URL
        }
    });
});
  
    function moveToNextInput(currentInput) {
        if (currentInput.value.length === currentInput.maxLength) {
            // Get the next input element
            var nextInput = currentInput.nextElementSibling;

            // If there is a next input, focus on it
            if (nextInput !== null) {
                nextInput.focus();
            }
        }
    }
</script>
</body>
</html>