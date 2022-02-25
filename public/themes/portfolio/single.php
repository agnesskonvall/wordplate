<?php get_header(); ?>

<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>

        <?php if (has_post_thumbnail()) : ?>
            <div class="mb-8">
                <?php the_post_thumbnail('large'); ?>
            </div>
        <?php endif; ?>

        <div class="prose">
            <h1><?php the_title(); ?></h1>
            <span class="text-lg italic"><?php the_date(); ?></span>

            <?php the_content(); ?>
        </div>

        <div class="flex justify-between mt-10">
            <span class="underline">
                <?php previous_post_link(); ?>
            </span>

            <span class="underline">
                <?php next_post_link(); ?>
            </span>
        </div>
    <?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>