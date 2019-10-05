<?php
require_once('config.php');

if(isset($_SESSION['access_token'])){
	header("Location: fb.php");
	exit();
}


$redirectTo = "https://nike.carlyitservices.com/callback.php";
$data = ['email'];
$fullURL = $handler->getLoginUrl($redirectTo, $data);
?>



<!DOCTYPE html>

<html class="no-js">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<head>
    <meta charset="utf-8">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NetWorth &mdash; Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
   

    <?php
    session_start();
    
    $msg = '';
    
     if (isset($_GET['signup'])) {
        if ($_GET['signup'] == 'success') {
            $msg = '<p style="color: green">Your account has been created successfully</p>';    
            // echo 'hi';
        }
    }

    /* Trigger when the login btn is clicked */
    if (isset($_POST['log'])) {

        /* Fetch users.json file */
        $data = json_decode(file_get_contents("users.json"), true);

        /* Get form data */
        $email = $_POST['email'];
        $pwd = $_POST['password'];

        /* Form validation */
        if (empty($email || $pwd)) {
            $msg = 'Please fill in all fields';
        } elseif (strlen($pwd) < 5) {
            $msg = 'Password must be more than 5 charcter.';
        } else {
            /* loop through the users.json data */
            foreach ($data['users'] as $user) {
                /* Check if pwd is valid & email is registered */
                if ($pwd !== $user['Password']) {
                    $msg = 'Password is incorrect.';
                } elseif ($email !== $user['Email']) {
                    $msg = 'Email is not registered.';
                } else {
                    /* Login the user */
                    if ($email === $user['Email'] && $pwd === $user['Password']) {
                        $_SESSION['Name'] = $user['Name'];
                        header('location: home.php');
                        exit;
                    }
                }
            }
        }
    }

    ?>

    <div class="wrap">
        <h1>Networth Tracker</h1>
        <section class="form-container">
            <h3>Check your Networth</h3>
            <div> <?php if ($msg != '') {
                        echo  $msg;
                    } ?> </div>
            <form action="index.php" method="post" class="form-wrap">
                <div class="input-email">
                    <input type="text" name="email" placeholder=" Email Address">
                </div>
                <div class="input-password">
                    <input type="password" name="password" placeholder="Password">
                </div>

                <button type="submit" name="log" class="btn-sign-in">Sign in</button>
                
                
    <a class="btn btn-lg btn-social btn-facebook" onclick="window.location = '<?php echo $fullURL ?>'">
    <i class="fa fa-facebook fa-fw"  onclick="window.location = '<?php echo $fullURL ?>'"></i> Sign in with Facebook
    </a>

               
                <!--<input type="button" onclick="window.location = '<?php echo $fullURL ?>'" value="Login with Facebook" class="loginBtn loginBtn--facebook">-->
                <p>Don't have an account? <a href="register.php">Sign up here</a></p>
            </form>
        </section>
    </div>

    <script src="" async defer></script>
</body>

</html>
