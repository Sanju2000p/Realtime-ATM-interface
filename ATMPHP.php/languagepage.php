
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

        
        .logo{
            width:150px;
            height: 80px;
             background-color:white;

        }
        .language {
           text-shadow: 2px 2px 4px #f81717;
            font-size: 100px;
            color: white;
            text-align: center;
            font-weight: bold;
        }

        .languages {
            //text-shadow: 2px 2px 4px #f81717;
            color: red;
            font-size: 36px;
            padding: 10px 20px;
            margin: 10px;
            border: 2px solid white;
            border-radius: 10px;
            font-weight: bold;
        }
        .languages:hover{
            background-color: #cc0000;

}
            </style>

    </head>
    <body>
    <div class="container-fluid welcome" style="background-image:url('https://wallpaperaccess.com/full/2910881.jpg')">
            <div class="container-lg">
            <img class="logo" src="https://i.pinimg.com/564x/d6/0a/89/d60a89c313406a93985d7eda5b9d7346.jpg" alt="Logo"></img>
            </div>
            <div><h1 class="display-1 language">SELECT LANGUAGE</h1></div>
            <div class="d-flex flex-column align-items-center">
            <button type="button" id="button" class="btn btn-outline-danger languages">ENGLISH</button>
            <button type="button" class="btn btn-outline-danger languages">తెలుగు</button>
            <button type="button" class="btn btn-outline-danger languages">हिन्दी</button>
            </div>
        </div>
        <script>
        // JavaScript code to redirect after form submission
        document.getElementById("button").addEventListener("click", function(event) {
            event.preventDefault(); // Prevent the default form submission behavior
            // Replace the URL with your desired destination URL
            window.location.href = "http://localhost/ATMPHP.php/mainmenu.php"; // Replace with your target URL
        });
    </script>
    </body>
</html>
