<?php
$link= mysql_connect("127.0.0.1:3307", "root", "password");
//mysql_select_db("ipptar", $link);
//$link= mysqli_connect("127.0.0.1:3307", "root", "password", "ipptar");
if (!$link) {
    echo 'Could not connect:';
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("ipptar", $link);


try {
    $conn = new PDO("mysql:host=127.0.0.1:3307;dbname=ipptar", "root", "password");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    // echo "Connected successfully";
    //$stmt = $conn->query("Select * from gred where g_code = '01'");
    $stmt = $conn->prepare('Select * from gred where g_code = ?'); //
    $preparedValues =  array('01');
    $stmt->execute($preparedValues);
    $results = $stmt->fetchAll();
    $stmt = null;
    /* foreach ($results as $result) {
       echo($result[1]) ;
    } */

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


?>