<?php

include "../function.php";
session_start();

// collecting data from form
$btn = test_user($_POST["submit"]);
$name = test_user($_POST["name"]);
$email = test_user($_POST["email"]);
$phone = test_user($_POST["phone"]);
$description = test_user($_POST["description"]);
$experience = test_user($_POST["experience"]);
$project = test_user($_POST["project"]);
$profile = $_FILES["profile"];

// // validation
// if (empty($name) || empty($email) || empty($phone) || empty($description) || empty($experience) || empty($project)) {
//     $_SESSION['error'] = "All fields are required";
//     header("Location: ../add_user.php");
// }

// name validation
if (empty($name)) {
    $_SESSION['error'] = "Name is required";
    header("Location: ../add_user.php");
    exit();
} elseif (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
    $_SESSION['error'] = "Only letters and white space allowed in name";
    header("Location: ../add_user.php");
}

// email validation
if (empty($email)) {
    $_SESSION['error'] = "Email is required";
    header("Location: ../add_user.php");
    exit();
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "Invalid email format";
    header("Location: ../add_user.php");
} elseif (!preg_match("/@gmail\.com$/", $email)) {
    $_SESSION["error"] = "Email must end with @gmail.com";
    header("Location: ../add_user.php");
}

?>