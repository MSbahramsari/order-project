<?php
extract($_REQUEST , EXTR_PREFIX_SAME , "dup");
$servername = "localhost";
$username = "root";
$dbname = "mekeen";
$password = "" ;
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
    $sql = $conn->prepare("SELECT name FROM products  ");
    $sql->execute();
    $products = $sql->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
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
    <h2>orders</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>user</th>
            <th>products</th>
            <th>add product</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>John</td>
            <td>Doe</td>
            <td><div><select class="form-select form-select" name="products">
                        <?php
                        foreach ($products as $pro) {
                            foreach ($pro as $value){
                                $option = '<option>';
                                $optionc = '</option>';
                                echo $option . $value .$optionc ;
                            }
                        }?>
                    </select>
                </div></td>
            <td><button type="button" class="btn btn-outline-primary">Primary</button>
            </td>
        </tr>

        </tbody>
    </table>
</div>
</body>
</html>
