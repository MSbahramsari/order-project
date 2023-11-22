<?php
$servername = "localhost";
$username = "root";
$dbname = "mekeen";
$password = "" ;
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {$sql = $conn->prepare("SELECT users.id , users.firstname ,orders.id , products.name
                                FROM orders
                                INNER JOIN users ON orders.userid = users.id
                                INNER JOIN order_pro ON orders.id = order_pro.orderid
                                INNER JOIN products ON order_pro.productid = products.id");
    $sql->execute();
    $orders = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach ($orders as $order){
        print_r($order);
        echo '<br>';
    }


}catch(PDOException $e) {
    echo "error"  . "<br>" . $e->getMessage();
}
?>



