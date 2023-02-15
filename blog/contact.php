<?php
include 'partials/header.php';

// fetch categories from database
$query = "SELECT * FROM comments";
$categories = mysqli_query($connection, $query);

// get back form data if invalid
$name = $_SESSION['comment-data']['name'] ?? null;
$email = $_SESSION['comment-data']['email'] ?? null;
$message = $_SESSION['comment-data']['message'] ?? null;

// delete form data session
unset($_SESSION['comment-data']);
?>

    <section class="container empty_page">

        <h1>Contact Page</h1>

    </section>

        <?php if (isset($_SESSION['comments-success'])) : ?>
            <div class="alert_message success">
                <p>
                    <?= $_SESSION['comments-success'];
                    unset($_SESSION['comments-success'])
                    ?>
                </p>
            </div>
        <?php elseif (isset($_SESSION['comments-error'])) : ?>
            <div class="alert_message error">
                <p>
                    <?= $_SESSION['comments-error'];
                    unset($_SESSION['comments-error'])
                    ?>
                </p>
            </div>
        <?php endif ?><br>

        <div class="container contact_page">
            <div class="item">
                <i class="uil uil-map-marker-alt"></i>
                <h3>Alamat</h3>
                <address>Jl. Tanimbar, Kec. Klojen, Malang, Jatim</address>
            </div>

            <div class="item item-borders">
                <i class="uil uil-phone"></i>
                <h3>No. Telepon</h3>
                <p class="phone_number"><a href="tel:+6285732917536">+6285 732 917 536</a></p>
            </div>

            <div class="item">
                <i class="uil uil-envelope"></i>
                <h3>Email</h3>
                <p class="email"><a href="mailto:arifmalangg.gmail.com">arifmalangg.gmail.com</a></p>
            </div>
        </div>
        </form>

        <div class="containerr">
            <h2>Komentar</h2>
            <?php if (isset($_SESSION['comment'])) : ?>
            <div class="alert_message error">
                <p>
                    <?= $_SESSION['comment'];
                    unset($_SESSION['comment'])
                    ?>
                </p>
            </div>
            <?php endif ?><br>
                <form action="<?= ROOT_URL ?>comment-logic.php" enctype="multipart/form-data" method="POST">
                    <input type="text" name="name" placeholder="Nama Anda">
                    <input type="email" name="email" placeholder="Email Anda">
                    <textarea name="message" placeholder="Komentar Anda"></textarea>
                    <input type="submit" name="submit" value="Kirim">
                </form>
        </div>



<?php
include 'partials/footer.php';

?>