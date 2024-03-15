<?php
include "config.php";

if(isset($_POST['but_login'])){

    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);
    

    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from staff where username='".$uname."' and password='".sha1($password)."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location: welcome.php');
        }else{
            echo "Invalid username and password";
        }

    }

    // CODE FROM STACK OVERFLOW https://stackoverflow.com/questions/5059151/encrypting-decrypting-passwords-to-and-from-a-mysql-database

    // if ($hashpw = hash_hmac('sha512', 'salt' . $_REQUEST['password'], $_SERVER['site_key'])){
    //     header('Location: welcome.php');
    // }


    // CODE OBTAINED FROM https://codeshack.io/secure-login-system-php-mysql/

    // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
    if ($stmt = $con->prepare('SELECT id, password FROM staff WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['txt_uname']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        if (password_verify($_POST['txt_pwd'], $password)) {
            // Verification success! User has logged-in!
            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            header('Location: welcome.php');
            echo 'Welcome ' . $_SESSION['uname'] . '!';
        } else {
            // Incorrect password
            echo 'Incorrect username and/or password!';
        }
    } else {
        // Incorrect username
        echo 'Incorrect username and/or password!';
    }

	$stmt->close();


    }


}

include "participant.php";

?>
