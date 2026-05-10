<?php get_header(); ?>

<main id="main" class="site-main">
    <?php
    if (have_posts()):
        while (have_posts()):
            the_post();
            get_template_part('template-parts/content', get_post_format());
        endwhile;
    else:
        echo '<p>Không tìm thấy nội dung.</p>';
    endif;
    ?>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>