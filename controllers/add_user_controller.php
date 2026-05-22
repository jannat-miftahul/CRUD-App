<?php

include "../function.php";
session_start();

// collecting data from form
$btn = test_user($_POST["submit"]);
$name = test_user($_POST["name"]);
$email = test_user($_POST["email"]);
// $phone = test_user($_POST["phone"]);
$description = test_user($_POST["description"]);
$experience = test_user($_POST["experience"]);
$project = test_user($_POST["project"]);
$profile_image = $_FILES["profile_image"];

// print_r($profile_image);

// // validation
// if (empty($name) || empty($email) || empty($phone) || empty($description) || empty($experience) || empty($project)) {
//     $_SESSION['error'] = "All fields are required";
//     header("Location: ../add_user.php");
// }

// name validation
if (empty($name)) {
    $_SESSION['name_err'] = "Name is required";
    header("Location: ../add_user.php");
} elseif (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
    $_SESSION['name_err'] = "Only letters and white space allowed in name";
    header("Location: ../add_user.php");
}

// email validation
if (empty($email)) {
    $_SESSION['email_err'] = "Email is required";
    header("Location: ../add_user.php");
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['email_err'] = "Invalid email format";
    header("Location: ../add_user.php");
} elseif (!preg_match("/@gmail\.com$/", $email)) {
    $_SESSION["email_err"] = "Email must end with @gmail.com";
    header("Location: ../add_user.php");
}

// description validation
if (empty($description)) {
    $_SESSION["description_err"] = "Description is required";
    header("Location: ../add_user.php");
}

// // experience validation
// if (empty($experience)) {
//     $_SESSION["experience_err"] = "Experience is required";
//     header("Location: ../add_user.php");
// }

// // project validation
// if (empty($project)) {
//     $_SESSION["project_err"] = "Project is required";
//     header("Location: ../add_user.php");
// }

// file handling
if (isset($_FILES['profile_image'])) {
    if (empty($profile_image['name'])) {
        $_SESSION['image_err'] = "profile image image is required";
        header("Location: ../add_user.php");
    }
    // extension validation
    $image_name = $profile_image['name'];
    $file_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
    print_r($file_extension);
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'webp'];

    if (!in_array($file_extension, $allowed_extensions)) {
        $_SESSION['image_err'] = "Only JPG, JPEG, PNG, and WEBP files are allowed";
        header("Location: ../add_user.php");
    }

    // uploading image
    $image_location = $profile_image['tmp_name'];
    $image_new_name = uniqid("user_") . "." . $file_extension; // user_123456789.jpg
    $image_url = "http://localhost/CRUD-App/uploads/" . $image_new_name;

    // store data in database
    include "./config/db.php";
    $stmt = $conn->prepare("INSERT INTO users (name, email, description, experience, project, profile_image) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "ssssss",
        $name,
        $email,
        $description,
        $experience,
        $project,
        $image_new_name,
        $image_url
    );

    $insert = $stmt->execute();
    if ($insert) {
        move_uploaded_file($image_location, "../uploads/" . $image_new_name);
        $_SESSION['success'] = "User added successfully";
        header("Location: ../add_user.php");
    } else {
        $_SESSION['error'] = "Failed to add user";
        header("Location: ../add_user.php");
    }
}

?>