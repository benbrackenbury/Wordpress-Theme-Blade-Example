<?php

namespace ExampleTheme\Functions;

use eftec\bladeone\BladeOne;

class Blade
{

    protected function render_blade($template, $data = [])
    {
        $views = get_stylesheet_directory() . '/views';
        $cache = get_stylesheet_directory() . '/cache';
        $blade_file = get_stylesheet_directory() . "/views/{$template}.blade.php";

        if (file_exists($blade_file)) {
            $blade = new BladeOne($views, $cache, BladeOne::MODE_AUTO);
            echo $blade->run($template, $data);
        }
    }

    public static function init()
    {
        add_filter('template_include', function ($template) {
            $new = null;

            if (is_404()) {
                $new = '404';
            } elseif (is_search()) {
                $new = 'search';
            } elseif (is_page()) {
                $new = 'page';
            } elseif (is_singular('post')) { // Adjust for other post types
                $new = 'single';
            } elseif (is_home() || is_front_page()) {
                $new = 'home'; // Or 'front-page' if separate
            } elseif (is_archive()) {
                $new = is_post_type_archive() ? 'archive-' . get_query_var('post_type') : 'archive';
            } elseif (is_category()) {
                $new = 'archive-category';
            } elseif (is_tag()) {
                $new = 'archive-tag';
            } // Add more (e.g., is_tax() => "taxonomy-{$taxonomy}-{$term}", etc.)

            if ($new) {
                $blade_file = get_stylesheet_directory() . "/views/{$new}.blade.php";
                if (file_exists($blade_file)) {
                    $instance = new self();
                    $instance->render_blade($new);
                    return ''; // Stop WP loading
                }
            }

            return $template;
        }, 999);
    }
}
