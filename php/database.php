<?php

try {

    $hostname = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "authentication_db";
    $dsn = 'mysql:host=' . $hostname . ';dbname=' . $dbName;
    $pdo = new PDO($dsn, $dbUsername, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    // Sanitize Inputs
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

} catch (PDOException $th) {
    echo "ERROR : " . $th->getMessage() .  "<br>";
    die();
}
