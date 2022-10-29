<?php

require_once "database.php";
try {

    $myusername = test_input($_POST['myusername']);
    $mytoken = test_input($_POST['mytoken']);
    $userinput = [$myusername, $mytoken];
    $query_match_token = "SELECT * FROM users WHERE username = ? AND token = ?";
    $_match_token = $pdo->prepare($query_match_token);
    $_match_token->execute($userinput);
    if ($_match_token->rowCount() !== 0) {
        echo json_encode(array(
            'status' => 1,
            'msg' => "Token Verified, Proceed to change password"
        ));
    } else {
        echo json_encode(array(
            'status' => 0,
            'msg' => "Invalid Token or Username"
        ));
    }
} catch (PDOException $th) {
    //throw $th;
    echo "Error : " . $th->getMessage() . "<br>";
    die();
}
