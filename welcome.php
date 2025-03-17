<?php 
include('ssession.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome <?php echo $login_session; ?></h1>
    <h2><a href="logout.php">Sing out</a></h2>
</body>
</html>