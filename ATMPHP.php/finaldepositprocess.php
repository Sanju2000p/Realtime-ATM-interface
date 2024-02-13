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
        .loading-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .loading {
            border: 5px solid #f3f3f3;
            border-top: 6px solid #3498db;
            border-radius: 100%;
            width: 50px;
            height: 50px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .popup {
            display: none;
            width: 50%;
            height: 50%;
            background: black;
            color: white;
            font-weight: bold;
            text-align: center;
            font-size: 40px;
            z-index: 1;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 100px 100px 0px rgba(0, 0, 0, 0.7);
            animation: fadeIn 3s forwards; /* Fade-in animation */
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 3;
            }
        }

        }
        .option{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;


        }
        </style>
</head>

<body>
<div class="container-fluid welcome" style="background-image:url('https://wallpaperaccess.com/full/2910881.jpg')">
    <div class="logo-container">
        <img class="logo"  src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0dLKUPaWUbzzNwLyJs71zsDkscj7dJRSg8RhO02l82Dahl-JKFzd6rQLPGPrQbzJL9IQ&usqp=CAU"></img>
    </div>
    <div class="container head1" id="final">
        <p class="display-4 head">Dear Customer,Please Wait Your Money Is Depositing
        </p>   
    </div> 


    <div class="loading-container" id="loading-container">
        <div class="loading"></div>
    </div>

    <div class="popup" id="popup">
        Your Transaction Is Successful.<br>
        THANK YOU<br>
        <img src="https://cdn-icons-png.flaticon.com/128/3844/3844566.png"/>
        <div class="d-flex flex-column align-items-center">
        <button type="button" id="mainmenu" class="btn btn-danger btn-lg mb-3">MAIN MENU</button>
        <button type="button" id="exit" class="btn btn-danger btn-lg mb-3">EXIT</button>
    </div>
    </div>
   

</div>
    <script>
        // Simulate loading for 5 seconds
        setTimeout(function () {
            document.getElementById("loading-container").style.display = "none";
            document.getElementById("popup").style.display = "block";
            document.getElementById("final").style.display = "none";
        }, 3000);
    </script>
    <script>
    document.getElementById("mainmenu").addEventListener("click", function(event) {
            event.preventDefault(); // Prevent the default form submission behavior
            // Replace the URL with your desired destination URL
            window.location.href = "http://localhost/ATMPHP.php/mainmenu.php"; // Replace with your target URL
        });
    </script>
        <script>
    document.getElementById("exit").addEventListener("click", function(event) {
            event.preventDefault(); // Prevent the default form submission behavior
            // Replace the URL with your desired destination URL
            window.location.href = "http://localhost/ATMPHP.php/welcomepage.php"; // Replace with your target URL
        });
    </script>

    </body>
</html>