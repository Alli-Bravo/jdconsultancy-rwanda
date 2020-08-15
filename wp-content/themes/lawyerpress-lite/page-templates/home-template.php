<?php
/**
 *
 *
 * Template Name: Home
 *
 **/
get_header();
get_template_part('template-parts/content', 'aboutus');
get_template_part('template-parts/content', 'callout');
get_template_part('template-parts/cta', 'section');
get_template_part('template-parts/blog', 'section');
get_footer();
?>