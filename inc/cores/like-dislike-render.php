<?php

defined('ABSPATH') or die('No script kiddies please!!');
global $post;
if (empty($post)) {
    return $content;
}
$pld_settings = $this->pld_settings;
if (empty($shortcode)) {
    $checked_post_types = (!empty($pld_settings['basic_settings']['post_types'])) ? $pld_settings['basic_settings']['post_types'] : array();
    if (!in_array($post->post_type, $checked_post_types)) {
        return $content;
    }
}
/**
 * Don't implement on admin section
 *
 * @since 1.0.0
 */
if (is_admin()) {
    return $content;
}
ob_start();

/**
 * Fires while generating the like dislike html
 *
 * @param type string $content
 *
 * @since 1.0.0
 */
do_action('pld_like_dislike_output', $content);

$like_dislike_html = ob_get_contents();
ob_end_clean();

if ($pld_settings['basic_settings']['like_dislike_position'] == 'after') {
    /**
     * Filters Like Dislike HTML
     *
     * @param string $like_dislike_html
     * @param array $pld_settings
     *
     * @since 1.0.0
     */
    $content .= apply_filters('pld_like_dislike_html', $like_dislike_html, $pld_settings);
} else {
    $content = apply_filters('pld_like_dislike_html', $like_dislike_html, $pld_settings) . $content;
}