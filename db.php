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
        body{
        background-color: black;
        color:red;
        font-family: 'Montserrat', sans-serif;
        text-align:center;
        font-size:25px;;
        font-weight:bold;
        line-height:44px;
        text-shadow:  20px 20px 50px rgba(201, 0, 0, 0.836);
    }

    ::selection{
            background-color: red;
            color:black;
        }
    button{
            padding:10px;
            width:15%;
            cursor:pointer;
            top:300px;
            border:none;
            left:45%;
            font-size:16px;
            border-radius:4px;
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
            color:white;
            background-color: red;
        }
    </style>
    <script>
        function signin(){
            window.open("signin.html","_self");
        }
    </script>
</head>
<body>
    <h2 id="h2" class="<?php echo isset($connected) ? $connected : ''; ?>"><?php echo isset($msg) ? $msg : ''; ?></h2><br>
    <h2 id="h2" class="<?php echo isset($success) ? $success : ''; ?>"><?php echo isset($nmsg) ? $msg : ''; ?></h2><br>
    
<?php
$conn = mysqli_connect('localhost', 'root', '', 'NETFLIXCLONE');
$connected="Connected <br>";
$msg="";
if($conn){
    echo $connected;
}else{
    echo "Notconnected";
}

// Use prepared statement to insert data safely
$stmt = $conn->prepare("INSERT INTO NetflixLogin (mail_id, mobile, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $mail, $mob, $pwd);
// Set parameters and execute
$mail = $_POST['mail'];
$mob = $_POST['mob'];
$pwd = $_POST['pwd'];

$sql = "SELECT * FROM users WHERE mail_id = '$mail' OR mobile = '$mob'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found
    echo "<p>User already registered!</p> <button onclick='signin()'>sign-in</button>";
} else {
    // User not found
    $success="\nRegistered Successfully.<br>";

    if ($stmt->execute()) {
        echo $success;
        echo "<button onclick='signin()'>sign-in</button>";
    } else {
        echo "Error : " . $stmt->error;
    }
}

$stmt->close();
?>

</body>
</html>
