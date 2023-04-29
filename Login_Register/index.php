<?php
require 'connect.php';
if (!empty($_SESSION["sira"])) {
    $sira = $_SESSION["sira"];
    $result = mysqli_query($conn, "SELECT * FROM gk WHERE sira = $sira");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: login.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Document</title>
</head>
<body>
<header>
    <h2 class="logo">Logo</h2>
    <nav class="navigation b">
        <a href="#">
            Home
        </a>
        <a href="#">
            About
        </a>
        <a href="#">
            Services
        </a>
        <a href="#">
            Contact
        </a>
        <a>
            <ion-icon class='a' name="person-outline"></ion-icon> <?php echo $row["username"]; ?></a>

        <a href="logout.php">
            <ion-icon class='a' name="exit-outline"></ion-icon>
            Logout</a>
    </nav>
</header>
</div>

<script src="script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>