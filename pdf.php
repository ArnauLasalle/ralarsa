<?php
session_start();
 
if(!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true){
    header("location: index.php");
    exit;
}
$db = mysqli_connect('localhost', 'root', 'root', "ralarsa");

if($db === false){
    echo 'error sql';
    exit();
}
$sql = "SELECT name, location FROM pdfs";
$result = mysqli_query($db,$sql);
$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_close($db);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PDFs</title>

</head>
<body>
<div>
    <?php
    foreach ($rows as $row ) {
        ?>
        <p>
        <a href="<?php echo $row['location'] ?>" ><?php echo $row['name']?></a>
        </p>
    <?php } ?>
    <p>
        <a href="logout.php" >logout</a>
    </p>
</div>
</body>
</html>