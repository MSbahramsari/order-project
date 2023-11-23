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




}catch(PDOException $e) {
    echo "error"  . "<br>" . $e->getMessage();
}
?>



<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.css">
    <title>Document</title>
</head>
<body>
<div class="container mt-3">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>order</th>
                <th>user</th>
                <th>product</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($orders as $order){
                $orderid = $order['id'];
                $user = $order['firstname'];
                $proname = $order['name'];
                $td = '<td>';
                $tdc = '</td>';
                echo '<tr>';
                echo $td.$orderid.$tdc;
                echo $td.$user.$tdc;
                echo $td.$proname.$tdc;
                echo '</tr>';

            }

            ?>

            </tbody>
        </table>


</div>
</body>
</html>