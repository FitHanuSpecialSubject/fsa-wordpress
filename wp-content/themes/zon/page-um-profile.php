<?php
/*
Template Name: UM Profile Page
*/
get_header();
?>

<div class="um-theme-profile-container">
    <?php echo do_shortcode('[ultimatemember form_id="your-form-id"]'); ?>
</div>

<?php get_footer(); ?>
