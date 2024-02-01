<?php
// Create connection
$conn = mysqli_connect('localhost', 'root','', 'bank');

if($conn){
    echo "connected";
}
else{
    echo "not connected" ;
}
//Get form data
$accountNo = $_POST['accountNo'];
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$balance = $_POST['balance'];

// Insert data into the database
$sql = "INSERT INTO banking (Account_no, Name, Mobile, Balance) VALUES ('$accountNo', '$name', '$mobile', '$balance')";

if ($conn->query($sql) === TRUE) {
    echo "Record added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
