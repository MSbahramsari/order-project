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
<form action="addpro.php" method="post">
    <div class="container">
        <div class="mb-3 mt-3">
            <label for="text" class="form-label">name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3 mt-3">
            <label for="number" class="form-label">price</label>
            <input type="number" class="form-control" name="price">
        </div>
        <button type="submit" class="btn btn-primary">add</button>
    </div>
</form>
</body>
</html>
<?php
extract($_REQUEST , EXTR_PREFIX_SAME , "dup");
try {
    $servername = "localhost";
    $username = "root";
    $dbname = "mekeen";
    $password = "" ;
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $conn->prepare("INSERT INTO products (name , price) VALUES (? , ? )");

    $sql->bindParam(1, $name);
    $sql->bindParam(2, $price);
    $sql->execute();
    echo "new product added";
} catch(PDOException $e) {
    echo "error"  . "<br>" . $e->getMessage();
}
$conn = null;

