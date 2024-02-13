<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
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
                transform: scale(1.06); /* Initial size */
             
            }
            50% {
                transform: scale(1.); /* 5% larger size */
            
            }
            100% {
                transform: scale(1); /* Back to initial size */
                
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
        .head{
            background-color:#FFF5F5;
            font-weight: bold;
            text-align: center;
        }
        .head1{
            margin-top: 5px;
            text-shadow: 2px 2px 4px black;
        }
        .typebuttons{
        font-size: 50px;
        font-weight: bold;
        transition: all 0.3s ease;

        }
        .typebuttons:hover{
            background-color: #cc0000;
            transform: scale(1.1); /* Increase the size by 10% */
            border: 2px solid #cc0000;
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
        </style>
</head>

<body>
<div class="container-fluid welcome" style="background-image:url('https://wallpaperaccess.com/full/2910881.jpg')">
    <div class="logo-container">
        <img class="logo"  src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0dLKUPaWUbzzNwLyJs71zsDkscj7dJRSg8RhO02l82Dahl-JKFzd6rQLPGPrQbzJL9IQ&usqp=CAU"></img>
    </div>
    <div class="container head1">
        <p class="display-4 head">Dear Customer,Please Select Account Type</p>   
    </div> 
    <div class="d-flex flex-column align-items-center pulse">
            <button class="btn btn-outline-danger btn-lg mb-3 account-button typebuttons "id="savings">Savings Account</button>
            <button class="btn btn-outline-danger btn-lg mb-3 account-button typebuttons">Current Account</button>
            <button class="btn btn-outline-danger btn-lg mb-3 account-button typebuttons">Business Account</button>
        </div>
</div>
<script>
            document.getElementById("savings").addEventListener("click", function(event) {
            event.preventDefault(); // Prevent the default form submission behavior
            // Replace the URL with your desired destination URL
            window.location.href = "http://localhost/ATMPHP.php/enteramount.php"; // Replace with your target URL
        });
    </script>
    </body>
</html>