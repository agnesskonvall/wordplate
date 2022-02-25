<?php
// Check function exists.
if (function_exists('acf_add_options_page')) {

    // Register options page.
    $option_page = acf_add_options_page(array(
        'page_title'    => ('Theme General Settings'),
        'menu_title'    => ('Theme Settings'),
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'field_footer-fields',
        'title' => 'Footer',
        'fields' => [
            [
                'name' => 'footer-email',
                'label' => 'Footer email',
                'key' => 'field_footer-email',
                'type' => 'email',
            ],
            [
                'name' => 'footer-contact-label',
                'type' => 'text',
                'key' => 'field_footer-contact-label',
            ],
        ],

        'location' => [
            [
                [
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-general-settings',
                ],
            ],
        ],
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
    ));
}
