<?php get_header(); ?>

<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>
        <div class="flex flex-col md:flex-row items-center mb-5">
            <?php if (has_post_thumbnail()) : ?>
                <a class="md:w-1/4 mr-4" href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('medium'); ?>
                </a>
            <?php endif ?>
            <div class="md:w-3/4">
                <h2 class="text-2xl"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                <?php the_excerpt(); ?>
            </div>
        </div>
    <?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>