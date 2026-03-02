<?php
require 'db.php';
require 'Conference.php';

$conference = new Conference($pdo);

$name = htmlspecialchars($_POST['name']);
$birthyear = intval($_POST['birthyear']);
$section = htmlspecialchars($_POST['section']);
$certificate = isset($_POST['certificate']) ? 1 : 0;
$participation = htmlspecialchars($_POST['participation']);

$conference->add($name, $birthyear, $section, $certificate, $participation);

header("Location: index.php");
exit();





