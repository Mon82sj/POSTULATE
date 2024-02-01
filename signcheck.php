<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="This is a cloned netflix website project for full stack web development internship">
    <meta name="author" content="Monica G">
    <title>Netflix</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
    <link rel="icon" href="netflix icon.png" type="icon">
    <style>
        body {
            background-color: black;
            color: red;
            text-align:center;
            line-height:20px;
            font-family: 'Montserrat', sans-serif;
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            line-height: 44px;
            text-shadow: 20px 20px 50px rgba(201, 0, 0, 0.836);
        }
        button{
            background-color: red;
            color:white;
            width:30%;
            cursor: pointer;
            font-size:18px;
            padding:12px;
            cursor: pointer;
            border:transparent;
            border-radius:5px;
            font-weight:bold;
            font-family: 'Montserrat', sans-serif;
        }
        ::selection{
            background-color: red;
            color:black;
        }
    </style>
    <script>
        function signin() {
            var v2=document.getElementById("h2")
            window.open("sign.html", "_self");
        }
        function account(){
            window.open("myaccount.html","_self");
        }
    </script>
</head>
<body>
    <h2 id="h1" class="<?php echo isset($success) ? 'success' : ''; ?>"><?php echo isset($success) ? $success : ''; ?></h2><br>
    <h2 id="h2" class="<?php echo isset($fail) ? 'fail' : ''; ?>"><?php echo isset($fail) ? $fail : ''; ?></h2><br>
    
    <?php
    // Create connection
    $conn = new mysqli('localhost', 'root', '', 'NETFLIXCLONE');

    // Check connection
    if ($conn) {
        echo 'Connected<br>';
    } else {
        echo 'not connected';
    }

    // Process login form data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $mail = $_POST["mail"];
        $pwd = $_POST["pwd"];

        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM NetflixLogin WHERE (mobile = ? OR mail_id = ?) AND password = ?");
        $stmt->bind_param("sss", $mail, $mail, $pwd); // Use $mail consistently for both email and mobile
        $stmt->execute();

        // Check if a matching record is found
        $result = $stmt->get_result();
        $success = "Login successful. Welcome!<br>";
        $fail = "User not found. Sign up first.";
        $row = $result->fetch_assoc();
        if (($result->num_rows > 0)) {
            echo $success;
            echo " <button onclick='account()'>Open My Netflix Account</button>";
            // Perform further actions if needed
            if (password_verify($pwd, $row['password'])){
                echo "Incorrect Password";
            }else{
                echo "";
            }
        }
         else {
            echo $fail;
        }
        

        $stmt->close();
    }

    // Close the database connection
    $conn->close();
    ?>
    <br>
   
</body>
</html>
