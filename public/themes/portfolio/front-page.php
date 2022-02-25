<?php get_header(); ?>

<?php if (have_posts()) : ?>

    <div class="prose">
        <?php while (have_posts()) : the_post(); ?>

            <?php the_content(); ?>

        <?php endwhile; ?>
    </div>

<?php endif; ?>

<?php

$args = [
    'numberposts' => 3,
    'order' => 'desc',
];

$latestPosts = get_posts($args);
?>

<div class="grid gap-5 grid-flow-col mt-8">
    <?php foreach ($latestPosts as $post) : setup_postdata($post);  ?>
        <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('large'); ?>
            <?php endif; ?>
            <h3 class="text-2xl"><?php the_title(); ?></h3>
        </a>
    <?php endforeach;
    wp_reset_postdata(); ?>
</div>

<?php $blogPageUrl = get_post_type_archive_link('post'); ?>
<div class="mt-8">
    <a class="bg-teal-900 text-white px-3 py-2" href="<?= $blogPageUrl; ?>">All blog posts</a>
</div>

<?php get_footer(); ?>