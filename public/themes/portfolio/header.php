<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tailwindcss/typography@0.5.x/dist/typography.min.css" />

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php if (
        wp_get_environment_type() === 'local' &&
        is_array(wp_remote_get('http://localhost:3000'))
    ) : ?>
        <script type="module" src="http://localhost:3000/@vite/client"></script>
        <script type="module" src="http://localhost:3000/resources/scripts/index.js"></script>
    <?php else : ?>
        <?php $manifest = json_decode(file_get_contents(get_theme_file_path('assets/manifest.json')), true); ?>
        <script type="module" src="<?= get_theme_file_uri('assets/' . $manifest['resources/scripts/index.js']['file']) ?>" defer></script>
        <link rel="stylesheet" href="<?= get_theme_file_uri('assets/' . $manifest['resources/scripts/index.js']['css'][0]) ?>">
    <?php endif; ?>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php $menuItems = wp_get_nav_menu_items('primary-menu'); ?>

    <nav class="font-sans flex flex-col text-center sm:flex-row sm:text-left sm:justify-between py-4 px-6 bg-white shadow sm:items-baseline w-full">
        <div class="mb-2 sm:mb-0">
            <a href="<?= site_url(); ?>" class="text-2xl no-underline text-grey-darkest hover:text-blue-dark"><?php bloginfo('name'); ?></a>
        </div>
        <div>
            <?php $currentPageId = get_queried_object_id();
            foreach ($menuItems as $item) : ?>
                <a class="hover:bg-teal-900 hover:text-white px-3 py-2 <?= $currentPageId == $item->object_id ? 'text-teal-900' : 'text-gray-400' ?> >" href="<?= $item->url; ?>">
                    <?= $item->title; ?>
                </a>
            <?php endforeach; ?>
        </div>
    </nav>

    <div class="container mx-auto mt-6 mb-6">
