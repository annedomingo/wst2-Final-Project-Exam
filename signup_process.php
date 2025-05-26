<?php
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if ($password !== $confirm_password) {
    echo "<script>alert('Passwords do not match.'); window.history.back();</script>";
    exit;
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$xmlFile = 'users.xml';
if (!file_exists($xmlFile)) {
    $users = new SimpleXMLElement('<users></users>');
} else {
    $users = simplexml_load_file($xmlFile);
}

foreach ($users->user as $user) {
    if ((string)$user->username === $username) {
        echo "<script>alert('Username already exists.'); window.history.back();</script>";
        exit;
    }
}

$newUser = $users->addChild('user');
$newUser->addChild('fullname', $fullname);
$newUser->addChild('username', $username);
$newUser->addChild('password', $hashedPassword);

$users->asXML($xmlFile);

echo "<script>alert('Signup successful! You can now log in.'); window.location.href='index.php';</script>";
?>
