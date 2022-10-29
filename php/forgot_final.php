<?php


require_once "database.php";

try {
    //code...
    $myusername = test_input($_POST['myusername']);
    $mytoken = test_input($_POST['mytoken']);
    $mypassword = test_input($_POST['mypassword']);

    $userinput = [$mypassword, $myusername, $mytoken];

    $query_change_pass = "UPDATE users SET `password` = ? WHERE username = ? AND token = ?";

    $_change_pass = $pdo->prepare($query_change_pass);
    $_change_pass->execute($userinput);

    echo json_encode(array(
        'status' => 1,
        'msg' => "Password Changed Success!"
    ));
} catch (PDOException $th) {
    //throw $th;
    echo "Error : " . $th->getMessage() . "<br>";
    die();
}
