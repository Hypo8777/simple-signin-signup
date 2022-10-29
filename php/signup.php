<?php



require_once "database.php";


try {
    //code...

    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $token = md5($password) . uniqid();
    $datetime = date("Y-m-d");

    $is_empty  = ((empty($username) && empty($password)) && (empty($username)  || empty($password)));

    if (!$is_empty) {
        $query_check = "SELECT * FROM users WHERE username = ?";
        $_check = $pdo->prepare($query_check);
        $_check->execute([$username]);
        if ($_check->rowCount() !== 0) {
            echo json_encode(array(
                'status' => 0,
                'msg' => "Sign Up : Username Taken!"
            ));
        } else {
            $query_signup = "INSERT INTO users(username,`password`,token,date_time) VALUES(?,?,?,?)";
            $_signup = $pdo->prepare($query_signup);
            $_signup->execute([$username, $password, $token, $datetime]);
            echo json_encode(array(
                'status' => 1,
                'msg' => "Sign Up : Success! Copy Token = '" . $token . "'"
            ));
        }
    } else {
        echo json_encode(array(
            'status' => 0,
            'msg' => "Sign Up : Username / Password cannot be empty!"
        ));
    }
} catch (PDOException $th) {
    //throw $th;
    echo "Error : " . $th->getMessage() . "<br>";
    die();
}
