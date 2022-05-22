<?php
include_once('db_conn.php');
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adminname = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
    $stmt = $conn->prepare("SELECT * FROM user_srms");
    $stmt->execute();
    $users = $stmt->fetchAll();
    foreach ($users as $user) {
        if (($user['user_email'] == $adminname) &&
            ($user['user_password'] == $password)
        ) {
            header("Location: adminpage.php");
        } else {
            header("Location: index.php?error=Incorrect Email or Password");
            exit();
        }
    }
}
