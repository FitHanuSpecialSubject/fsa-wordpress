<?php
/**
 * Template for displaying search forms in PPC Specialist
 *
 * @subpackage PPC Specialist
 * @since 1.0
 */
?>

<?php $ppc_specialist_unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'ppc-specialist' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" />
	<button type="submit" class="search-submit"><?php echo esc_html_x( 'Search', 'submit button', 'ppc-specialist' ); ?></button>
</form>