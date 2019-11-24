<?php
    get_header();
?>
<main class="container">
        <header>
            <div class="topnav">
                <?php echo $imageGallery->header_menu(); ?>
            </div>
        </header>
    <div class="slick-slider">
        <?php echo $imageGallery->gallery_post_type_items(); ?>
    </div>
</main>
<?php get_footer(); ?>