
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>KIKOBA</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    </head>
    <body>
        <div class="wrapper">
            <header>Login</header>
            <?php 
                    include("config.php");
                    session_start();
                    $error = '';
                    if ($_SERVER["REQUEST_METHOD"]=="POST"){
                        $myusername = mysqli_real_escape_string($db,$_POST['username']);
                        $mypasscode = mysqli_real_escape_string($db,$_POST['password']);

                        $sql = "SELECT * FROM users WHERE username = '$myusername' AND passcode = '$mypasscode'";

                        $result = mysqli_query($db,$sql);
                        $row = mysqli_fetch_array($result);
                        $count = mysqli_num_rows($result);

                        if($count == 1){
                            if ($row["Rule"]=="admin") {
                                $_SESSION['login_user'] = $myusername;
                                $_SESSION['Rule'] = $row["Rule"];
                                header("location: Admin_dashboard.php");
                            }
                            elseif($row["Rule"]=="client"){
                                $_SESSION['login_user'] = $myusername;
                                header("location: blank.html");
                            }
                            else {
                                echo "haujasajiriwa";
                            }
                               
                        }
                        else{
                            echo "<div class='error error-txt'>Worng Username or Password</div>";
                        }
                    }
                ?>
            <form action="" method="post">
                <div class="field email">
                    <div class="input-area">
                    <input type="text" name="username" placeholder="Username" required>
                    <i class="icon fas fa-envelope"></i>
                    <i class="error error-icon fas fa-exclamation-circle"></i>
                    </div>
                    <div class="error error-txt">UserName can't be blank</div>
                </div>
                <div class="field password">
                    <div class="input-area">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class="icon fas fa-lock"></i>
                    <i class="error error-icon fas fa-exclamation-circle"></i>
                    </div>
                    <div class="error error-txt">Password can't be blank</div>
                </div>
                <div class="pass-txt"><a href="#">Forgot password?</a></div>
                <input type="submit" value="Login">
            </form>
            <div class="sign-txt">Not yet member? <a href="#">Signup now</a></div>
        </div>


    </body>
</html>
