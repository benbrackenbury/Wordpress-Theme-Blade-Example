<?php

namespace ExampleTheme\Functions\PostTypes;

class Property
{

    protected function create_property_cpt()
    {
        register_post_type(
            'property',
            [
                'labels' => [
                    'name'          => 'Properties',
                    'singular_name' => 'Property',
                ],
                'public'      => true,
                'has_archive' => 'properties',
                'rewrite'     => ['slug' => 'properties'],
                'supports'    => ['title', 'editor', 'thumbnail', 'excerpt'],
            ]
        );
    }

    public static function init()
    {
        $instance = new self();
        add_action('init', function () use ($instance) {
            $instance->create_property_cpt();
        });
    }
}
