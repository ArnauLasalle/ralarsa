<?php

$db = mysqli_connect('localhost', 'root', 'root', "ralarsa");

if($db === false){
	echo 'error sql';
	exit();
}
session_start();


if(isset($_SESSION["logged"]) && $_SESSION["logged"] === true){
    header("location: pdf.php");
    exit();


}
 
// Define variables and initialize with empty values
$username = $password = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    echo $username;
    echo $password;
    
    $sql = "SELECT id, username, password FROM users WHERE username = '". $username ."' and password =  '" .$password. "'";
    $result = mysqli_query($db,$sql);
    $count = mysqli_num_rows($result);

    if($count == 1) {
        $_SESSION['logged'] = true;   
        $_SESSION["id"] = $id;
        $_SESSION["username"] = $username; 
        header("location: pdf.php");
    	exit();
    }

    mysqli_close($db);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>test</title>
</head>
<body>
    <div>
        <h2>Login</h2>

        <form action="index.php" method="post">
            <div>
                <label>Username</label>
                <input type="text" name="username" required="required">
            </div> 
            <br/>   
            <div>
                <label>Password</label>
                <input type="password" name="password" required="required">
            </div>
            <br/>
            <div>
                <input type="submit" value="login">
            </div>
        </form>
    </div>
</body>
</html>