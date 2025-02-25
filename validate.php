<?php
include_once('connection.php');

function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);

    // Query only the required user
    $stmt = $conn->prepare("SELECT * FROM adminlogin WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $user['password'] == $password) {
        // Redirect to index.html if login is successful
        header("Location: index.html");
        exit();
    } else {
        // Show an alert if login fails
        echo "<script>alert('WRONG INFORMATION');</script>";
    }
}
?>
