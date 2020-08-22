<html>
    <head>
        <title>logout</title>
</head>

<body>

<?php
session_start();
$_SESSION["authenticated_user_id"] = null;
header("Location: ../index.html");
?>
</body>
</html>