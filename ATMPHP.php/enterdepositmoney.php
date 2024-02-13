<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
                .welcome{
            background-color: black;
            height:80%;
            width:80%;
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
        .input-container {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding-top: 5px;
        }
        .amount-input {
            width: 400px;
            height: 80px;
            text-align: center;
            font-size: 30px;
        
            
        }
        .button-container {
            display: flex;
            justify-content: flex-end;
        }
        </style>
</head>

<body>
<div class="container welcome" style="background-image: url('https://res-console.cloudinary.com/dkwudq5i7/thumbnails/transform/v1/image/upload/Y19saW1pdCxoXzE2MDAsd18xNjAwLGZfanBnLGZsX2xvc3N5LmFueV9mb3JtYXQucHJlc2VydmVfdHJhbnNwYXJlbmN5LnByb2dyZXNzaXZl/v1/c2J0YTV3a3F3bm9hd3dyY3cxenU=/template_primary')">
    <div class="logo-container">
        <img class="logo"  src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0dLKUPaWUbzzNwLyJs71zsDkscj7dJRSg8RhO02l82Dahl-JKFzd6rQLPGPrQbzJL9IQ&usqp=CAU"></img>
    </div>
    <div class="container head1">
        <p class="display-4 head">Dear Customer,Please Enter Deposit Money
        </p>   
    </div> 
    <div class="input-container">
        <input type="number" class="form-control amount-input" placeholder="Rs 0">
    </div>

    <div class="d-grid gap-2 col-11 mx-auto button-container">
            <button class="btn btn-danger btn-lg mb-3 account-button typebuttons" id="YES">YES</button>
            <button class="btn btn-danger btn-lg mb-3 account-button typebuttons">NO</button>
    </div>

</div>
<script>
            document.getElementById("YES").addEventListener("click", function(event) {
            event.preventDefault(); // Prevent the default form submission behavior
            // Replace the URL with your desired destination URL
            window.location.href = "http://localhost/ATM.php/finaldepositprocess.php"; // Replace with your target URL
        });
    </script>

    </body>
</html>