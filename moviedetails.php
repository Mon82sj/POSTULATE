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
        background-image:linear-gradient();
        font-family: 'Montserrat', sans-serif;
        font-size:25px;;
        font-weight:bold;
        line-height:44px;
        text-shadow:  20px 20px 50px rgba(201, 0, 0, 0.836);
    }
    h5{
        padding-inline:2px;
        text-align:left;
        color:red;
        text-decoration:underline;
    }
    h2{
        text-align:center;
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
        img{
            width:380px;
            height:450px;
        }
        table{
            cell-spacing:30px;
            margin-left:5%;
            top:3%;
        }
        div{
            align-items:bottom;
        }
    </style>
</head>
    <script>
    </script>
</head>
<body>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'NETFLIXCLONE');

if ($conn) {
    echo "";
} else {
    echo 'not connected';
}

// Fetch movie details based on the movie_id passed in the URL
$mediaId = isset($_GET['media_id']) ? $_GET['media_id'] : 0;

$sql = "SELECT * FROM Media WHERE media_id = $mediaId";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die('Error: ' . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Display movie details on the new page
    echo '<h2>' . $row['filename'] . '</h2>';
    echo '<table> <tr>';
    echo '<td><img src="'.$row['poster'].'" alt="poster"></td>';
    echo '<td><video width="720" height="530" controls autoplay="on">';
    echo '<source src="' . $row['filepath'] . '" type="video/mp4">';
    echo 'Your browser does not support the video tag.';
    echo '</video></td><br>';
    echo '';
    echo '<tr>
          <td>
          <h5> Ratings :        ' . $row['ratings'] . '★</h5>';
    echo '<h5> Director :       ' . $row['director'] . '</h5>';
    echo '<h5> Producer :       ' . $row['producer'] . '</h5>';
    echo '<h5> Released Date :      ' . $row['date'] . '</h5>';
    echo '<h5> Duration :       ' . $row['duration'] . '</h5></td></tr></table>';
} else {
    echo 'Movie details not found.';
}

mysqli_close($conn);
?>
</body>
</html>