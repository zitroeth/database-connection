<?php
include 'db.php';
$username=$_POST['username'];
$sth = $dbconnection->prepare('SELECT password from users where username = ?');
$sth->bindParam(1, $username, PDO::PARAM_STR);
$sth->execute();

$result = $sth->fetch(PDO::FETCH_ASSOC);

if (password_verify($_POST['password'], $result['password'])) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
?>