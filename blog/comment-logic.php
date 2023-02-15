<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

// validate form data
if (!$name) {
    $_SESSION['comment'] = "Masukkan nama";
} elseif (!$email) {
    $_SESSION['comment'] = "Masukkan email yang valid";
} elseif (!$message) {
    $_SESSION['comment'] = "Masukkan comment";
}

// redirect back to contact page with form data if there was invalid input
if (isset($_SESSION['comment'])) {
    $_SESSION['comment-data'] = $_POST;
    header('location: ' . ROOT_URL . 'contact.php');
    die();
} else {
    // insert comment into database
    $query = "INSERT INTO comments (name, email, message) VALUES ('$name', '$email', '$message')";
    $result = mysqli_query($connection, $query);
    if (mysqli_errno($connection)) {
        $_SESSION['comments-error'] = "Tidak dapat mengirim comment";
        header('location: ' . ROOT_URL . 'contact.php');
        die();
    } else {
        $_SESSION['comments-success'] = "Comment berhasil dikirim";
        header('location: ' . ROOT_URL . 'contact.php');
        die();
    }
}

header('location: ' . ROOT_URL . 'contact.php');
die();