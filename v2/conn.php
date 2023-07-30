<?php
$link= mysql_connect("127.0.0.1:3307", "root", "password");
//mysql_select_db("ipptar", $link);
//$link= mysqli_connect("127.0.0.1:3307", "root", "password", "ipptar");
if (!$link) {
    echo 'Could not connect:';
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("ipptar", $link);

global $conn;

try {
    $conn = new PDO("mysql:host=127.0.0.1:3307;dbname=ipptar", "root", "password");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch(PDOException $e) {
    echo 'Could not connect:';
    die('Could not connect: ' .  $e->getMessage());
}

function sqlSelect ($sql, $inputs, $isMultipleRows=false) {
    try {
        global $conn;
        $stmt = $conn->prepare($sql);
        $stmt->execute($inputs);
        $results = $isMultipleRows ? $stmt->fetchAll() : $stmt->fetch();
        $stmt = null;
        //if (!empty($results))
        //    var_dump($results);
        return $results;
    } catch(PDOException $e) {
        echo 'Could not connect:';
        die('Could not connect: ' .  $e->getMessage());
    }
}

function sqlInsert ($sql, $inputs) {
    try {
        global $conn;
        $stmt = $conn->prepare($sql);
        $stmt->execute($inputs);
        $lastInsertedId = $conn->lastInsertId();
        $stmt = null;
        //echo ($lastInsertedId);
        return $lastInsertedId;
    } catch(PDOException $e) {
        echo 'Could not connect:';
        die('Could not connect: ' .  $e->getMessage());
    }
}

function sqlUpdate ($sql, $inputs) {
    try {
        global $conn;
        $stmt = $conn->prepare($sql);
        $stmt->execute($inputs);
        $lastInsertedId = $stmt->rowCount();
        $stmt = null;
        //echo ($lastInsertedId);
        return $lastInsertedId;
    } catch(PDOException $e) {
        echo 'Could not connect:';
        die('Could not connect: ' .  $e->getMessage());
    }
}

function sqlDelete ($sql, $inputs) {
    try {
        global $conn;
        $stmt = $conn->prepare($sql);
        $stmt->execute($inputs);
        $lastInsertedId = $stmt->rowCount();
        $stmt = null;
        //echo ($lastInsertedId);
        return $lastInsertedId;
    } catch(PDOException $e) {
        echo 'Could not connect:';
        die('Could not connect: ' .  $e->getMessage());
    }
}

//sqlSelect('SELECT * FROM gred WHERE g_id = ? AND g_code = ?', array(1, '01'));
//sqlSelect('SELECT * FROM gred WHERE g_code = ?', array('01'), true);
//sqlInsert('INSERT INTO gred (g_code, g_name) VALUES (?, ?)', array('00', 'Test'));
//sqlUpdate('UPDATE gred SET g_name = ? WHERE g_code = ?', array('Test Update', '00'));
//sqlDelete('DELETE FROM gred WHERE g_code = ?', array('00'));
?>