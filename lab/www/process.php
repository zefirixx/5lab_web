<?php
session_start();

$name = htmlspecialchars($_POST['name']);
$birthyear = htmlspecialchars($_POST['birthyear']);
$section = htmlspecialchars($_POST['section']);
$certificate = $_POST['certificate'] ?? '';
$participation = htmlspecialchars($_POST['participation']);

$errors = [];

if(empty($name)) $errors[] = "Имя не может быть пустым";

if(!is_numeric($birthyear) || $birthyear < 1900 || $birthyear > 2026){
    $errors[] = "Введите корректный год рождения (1900-2026)";
}

if(!empty($errors)){
    $_SESSION['errors'] = $errors;
    header("Location: index.php");
    exit();
}

$_SESSION['name'] = $name;
$_SESSION['birthyear'] = $birthyear;
$_SESSION['section'] = $section;
$_SESSION['certificate'] = $certificate;
$_SESSION['participation'] = $participation;

// $line = $name . ";" . $birthyear . ";" . $section . ";" . $certificate . ";" . $participation . "\n";
// file_put_contents("data.txt", $line, FILE_APPEND);

require_once 'ApiClient.php';
$api = new ApiClient();

$url = 'https://restcountries.com/v3.1/all?fields=name,capital,region';
$apiData = $api->request($url);

$_SESSION['api_data'] = $apiData;

setcookie("last_submission", date('Y-m-d H:i:s'), time() + 3600, "/");

header("Location: index.php");
exit();
?>





