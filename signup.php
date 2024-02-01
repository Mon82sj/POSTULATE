<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking Form</title>
</head>
<body>
    <h2>Banking Form</h2>
    <form action="login.php" method="post">
        <label for="accountNo">Account Number:</label>
        <input type="text" name="accountNo" required><br>

        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="mobile">Mobile:</label>
        <input type="text" name="mobile" required><br>

        <label for="balance">Balance:</label>
        <input type="text" name="balance" required><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
