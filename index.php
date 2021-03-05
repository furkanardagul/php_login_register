<?php 
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP | Login - Register System</title>
</head>
<body>
    <p>You are welcome!</p>
    <br>
<?php if(isset($_SESSION['login']) == 'true'){ ?>
    <form action='logout.php' method='post'>
    <button type='submit'> Logout </button>
    </form>
<?php }else{ ?>
    <form action='post.php' method='post'>
    <label for="lName">Username:</label>
    <input type="text" id="fname" name="username"><br><br>
    <label for="lPassword">Password:</label>
    <input type="text" id="lname" name="password"><br><br>
    <button type='submit' name='btn_login'> Login </button>
    </form>
    <br><br>
    <form action='post.php' method='post'>
    <label for="lName">Username:</label>
    <input type="text" id="fname" name="username"><br><br>
    <label for="lPassword">Password:</label>
    <input type="text" id="lname" name="password"><br><br>
    <button type='submit' name='btn_register'> Register </button>
    </form>
<?php } ?>

<?php if(isset($_GET['text'])){ ?>
<p>Server Message: <?php echo $_GET['text'] ?></p>
<?php } ?>
</body>
</html>