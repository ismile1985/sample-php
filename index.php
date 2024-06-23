<?php
require_once "config.php";

// Fetch data from the database
$sql = "SELECT id, name, email FROM users";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("ERROR: Could not execute $sql. " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample PHP App</title>
</head>
<body>
    <h1>Welcome to the Sample PHP App</h1>
    <h2>List of Users</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No users found</td></tr>";
        }
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>
