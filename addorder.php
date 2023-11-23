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
    $last_id = $conn->lastInsertId();
            foreach ($productname as $id){
                $sql = $conn->prepare("INSERT INTO order_pro (orderid , productid) VALUES (? , ?)");
                $sql->bindParam(1, $last_id);
                $sql->bindParam(2, $id);
                $sql->execute();
                echo $id ;
                echo '<br>';
            }



} catch(PDOException $e) {
    echo "error"  . "<br>" . $e->getMessage();}

?>

