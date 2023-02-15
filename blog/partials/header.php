<?php
require 'config/database.php';

// fetch current user from database
if (isset($_SESSION['user-id'])) {
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $avatar = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewpot" content="width=device-width, initial-scale=1.0">
        <title>M Lvrs Blog</title>
        <!--Custom Stylesheet-->
        <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">
        <!--Iconcout CDN-->
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <!--Google Font (montserrat)-->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    </head>
    <body>
        <nav>
            <div class="container nav_container">
                <a class="nav_logo">M LVRS</a>
                <ul class="nav_items">
                    <li><a href="<?= ROOT_URL ?>">Home</a></li>
                    <li><a href="<?= ROOT_URL ?>blog.php">Blog</a></li>
                    <li><a href="<?= ROOT_URL ?>about.php">Tentang</a></li>
                    <li><a href="<?= ROOT_URL ?>contact.php">Kontak</a></li>
                    <?php if(isset($_SESSION['user-id'])) : ?>
                        <li class="nav_profile">
                            <div class="avatar">
                                <img src="<?= ROOT_URL . 'images/' . $avatar['avatar'] ?>">
                            </div>
                            <ul>
                                <li><a href="<?= ROOT_URL ?>admin/index.php">Dashboard</a></li>
                                <li><a href="<?= ROOT_URL ?>logout.php">Keluar</a></li>
                            </ul>
                        </li>
                    <?php else : ?>
                        <li><a href="<?= ROOT_URL ?>signin.php">Masuk</a></li>
                    <?php endif ?>
                </ul>

                <button id="open_nav-btn"><i class="uil uil-bars"></i></button>
                <button id="close_nav-btn"><i class="uil uil-multiply"></i></button>
            </div>
        </nav>
        <!--==========End of Nav==========-->
