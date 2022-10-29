<?php

require_once "database.php";

try {
    //code...
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);

    $userInputs = [$username, $password];

    $is_empty  = (empty($userInputs)) ||  (empty($username)  || empty($password));

    if (!$is_empty) {
        $query_signin = "SELECT * FROM users WHERE username = ? AND `password` = ?";
        $stm_signin = $pdo->prepare($query_signin);
        $stm_signin->execute($userInputs);
        $result_count = $stm_signin->rowCount();
        if ($result_count !== 0) {
            echo json_encode(array(
                'status' => 1,
                'msg' => "Sign In : Success!"
            ));
        } else {
            echo json_encode(array(
                'status' => 0,
                'msg' => "Sign In : Failed! No such user exists!"
            ));
        }
    } else {
        echo json_encode(array(
            'status' => 0,
            'msg' => "Sign In : Username / Password Cannot Be Empty!"
        ));
    }
} catch (PDOException $th) {
    //throw $th;
    echo "Error : " . $th->getMessage() . "<br>";
    die();
}
