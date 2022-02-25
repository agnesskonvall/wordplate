<?php get_header(); ?>

<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>
        <div class="flex flex-col justify-center lg:flex-row mt-8 lg:mt-0 mx-4">
            <?php if (has_post_thumbnail()) : ?>
                <div class="mb-6 mr-6">
                    <?php the_post_thumbnail('medium'); ?>
                    <?php if (get_field('client-name')) : ?>
                        <?php if (get_field('client-website')) : ?>
                            <p>Client: <a href="<?php the_field('client-website'); ?>"><?php the_field('client-name'); ?></a></p>
                        <?php endif; ?>
                        <p>Client: <?php the_field('client-name'); ?></php>
                        <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="prose">
                <h1><?php the_title(); ?></h1>
                <?php $tools = get_the_terms($post, 'tool'); ?>
                <?php if ($tools) : ?>
                    <p class="mb-0">
                        <?php foreach ($tools as $tool) : ?>
                            <a class="text-lg italic" href="<?php echo get_term_link($tool) ?>"><?php echo $tool->name ?></a>
                        <?php endforeach; ?>
                    </p>
                <?php endif; ?>
                <div class="mt-3">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    <?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>