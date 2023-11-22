<?php
extract($_REQUEST , EXTR_PREFIX_SAME , "dup");
$servername = "localhost";
$username = "root";
$dbname = "mekeen";
$password = "" ;
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
    $stmt = $conn->prepare("SELECT * FROM users  ");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($users as $user) {
        if ($name == $user['firstname']){
            $stmt = $conn->prepare("INSERT INTO orders (userid) VALUES (?)");
            $stmt->bindParam(1, $user['id']);
            $stmt->execute();
        }
    }
    $sql = $conn->prepare("SELECT * FROM products  ");
    $sql->execute();
    $allp= $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach ($allp as $products) {
        if ($productname == $products['name']){
            $sql = $conn->prepare("INSERT INTO order_pro (productid) VALUES (?)");
            $sql->bindParam(1, $products['id']);
            $sql->execute();

        }

    }


} catch(PDOException $e) {
    echo "error"  . "<br>" . $e->getMessage();}

?>

