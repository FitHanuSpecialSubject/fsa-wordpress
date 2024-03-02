<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package canary led
 */





if ( ! function_exists( 'canary_led_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function canary_led_posted_on() {
		$disable_date = get_theme_mod ('disable-date',0);
		if($disable_date == 0){
			if (has_post_thumbnail()){
				$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
				$time_string = '<span class="date-day"> %1$s </span>%2$s';
				$time_string = sprintf(
					$time_string,
					esc_html( get_the_date(' d ') ),
					esc_html( get_the_date('F Y') )
				);

			} else {
				$time_string = '<time class="entry-date published updated" datetime="%1$s"> <i class="far fa-calendar-alt"></i> %2$s </time>';

				$time_string = sprintf( $time_string,
				esc_attr( get_the_date( DATE_W3C ) ),
				esc_html( get_the_date(' d F Y') )
				);
			}

			$posted_on = sprintf(
				'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
			);

			

			echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

	}
endif;

if ( ! function_exists( 'canary_led_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function canary_led_posted_by() {
		$disable_author = get_theme_mod ('disable-author',0);
		if($disable_author == 0){
			$byline = sprintf(
				/* translators: %s: post author. */
				'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
			);

			echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

	}
endif;

if ( ! function_exists( 'canary_led_entry_cat_tags' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function canary_led_entry_cat_tags() {
		$disable_category = get_theme_mod ('disable-category',0);
		$disable_comments = get_theme_mod ('disable-comments',0);
		$disable_tags = get_theme_mod ('disable-tags',0);
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			if($disable_category == 0){
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( esc_html__( ' / ', 'canary-led' ) );
				if ( $categories_list  ) {
					/* translators: 1: list of categories. */
					printf( '<span class="cats-links">' . '%1$s' . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}

			if($disable_tags == 0){

				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', esc_html_x( ' / ', 'list item separator', 'canary-led' ) );
				if ( $tags_list ) {
					/* translators: 1: list of tags. */
					printf( '<span class="tags-links">' . '%1$s'. '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}
		}

		if($disable_comments == 0){

			if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<span class="comments-link">';
				comments_popup_link(
					sprintf(
						wp_kses(
							/* translators: %s: post title */
							__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'canary-led' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);
				echo '</span>';
			}
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'canary-led' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'canary_led_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function canary_led_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}
		if ( is_singular() ) :
			?>
			<figure class="post-featured-image">

				<?php the_post_thumbnail(); ?>
			</figure>
				<!-- end.post-featured-image -->

		<?php else : ?>
			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">

				<figure class="post-featured-image">
					<?php
						the_post_thumbnail(
							'canary-led-post-image',
							array(
								'alt' => the_title_attribute(
									array(
										'echo' => false,
									)
								),
								'class' => "featured-image",
							)
						);
					?>
				</figure>
				<!-- end.post-featured-image -->
			</a>
			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

if ( ! function_exists( 'canary_led_entry_format' ) ) :

	/**
	 * Displays an entry format
	 */

	function canary_led_entry_format() {

		$format = get_post_format();

		if ( current_theme_supports( 'post-formats', $format ) ) {
			printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
				sprintf( ''),
				esc_url( get_post_format_link( $format ) ),
				esc_html(get_post_format_string( $format ))
			);
		}
	}
endif;
