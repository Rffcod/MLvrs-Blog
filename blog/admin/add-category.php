<?php
    include 'partials/header.php';

    // get back form data if invalid
    $title = $_SESSION['add-category-data']['title'] ?? null;
    $description = $_SESSION['add-category-data']['description'] ?? null;
    
    unset($_SESSION['add-category-data']);
?>


<section class="form_section">
    <div class="container form_section-container">
        <h2>Tambah Kategori</h2>
        <?php if (isset($_SESSION['add-category'])) : ?>
            <div class="alert_message error">
                <p>
                    <?= $_SESSION['add-category'];
                    unset($_SESSION['add-category'])
                    ?>
                </p>
            </div>
        <?php endif ?>
        <form action="<?= ROOT_URL ?>admin/add-category-logic.php" method="post">
            <input type="text" name="title" value="<?= $title ?>" placeholder="Judul">
            <textarea rows="4" name="description" value="<?= $description ?>" placeholder="Deskripsi"></textarea>
            <button type="submit" name="submit" class="btn">Tambah Kategori</button>
        </form>
    </div>
</section>


<?php
    include '../partials/footer.php';
?>