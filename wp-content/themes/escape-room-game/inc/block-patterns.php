<?php
/**
 * Escape Room Game: Block Patterns
 *
 * @since Escape Room Game 1.0
 */

 /**
  * Get patterns content.
  *
  * @param string $file_name Filename.
  * @return string
  */
function escape_room_game_get_pattern_content( $file_name ) {
	ob_start();
	include get_theme_file_path( '/patterns/' . $file_name . '.php' );
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}

/**
 * Registers block patterns and categories.
 *
 * @since Escape Room Game 1.0
 *
 * @return void
 */
function escape_room_game_register_block_patterns() {

	$patterns = array(
		'header-default' => array(
			'title'      => __( 'Default header', 'escape-room-game' ),
			'categories' => array( 'escape-room-game-headers' ),
			'blockTypes' => array( 'parts/header' ),
		),
		'footer-default' => array(
			'title'      => __( 'Default footer', 'escape-room-game' ),
			'categories' => array( 'escape-room-game-footers' ),
			'blockTypes' => array( 'parts/footer' ),
		),
		'home-banner' => array(
			'title'      => __( 'Home Banner', 'escape-room-game' ),
			'categories' => array( 'escape-room-game-banner' ),
		),
		'about-us-section' => array(
			'title'      => __( 'About Us Section', 'escape-room-game' ),
			'categories' => array( 'escape-room-game-about-us-section' ),
		),
		'experience-section' => array(
			'title'      => __( 'Experience Section', 'escape-room-game' ),
			'categories' => array( 'escape-room-game-experience-section' ),
		),
		'testimonial-section' => array(
			'title'      => __( 'Testimonial Section', 'escape-room-game' ),
			'categories' => array( 'escape-room-game-testimonial-section' ),
		),
		'news-section' => array(
			'title'      => __( 'News Section', 'escape-room-game' ),
			'categories' => array( 'escape-room-game-news-section' ),
		),
		'faq-section' => array(
			'title'      => __( 'FAQ Section', 'escape-room-game' ),
			'categories' => array( 'escape-room-game-faq-section' ),
		),
		'primary-sidebar' => array(
			'title'    => __( 'Primary Sidebar', 'escape-room-game' ),
			'categories' => array( 'escape-room-game-sidebars' ),
		),
		'hidden-404' => array(
			'title'    => __( '404 content', 'escape-room-game' ),
			'categories' => array( 'escape-room-game-pages' ),
		),
		'post-listing-single-column' => array(
			'title'    => __( 'Post Single Column', 'escape-room-game' ),
			//'inserter' => false,
			'categories' => array( 'escape-room-game-query' ),
		),
		'post-listing-two-column' => array(
			'title'    => __( 'Post Two Column', 'escape-room-game' ),
			//'inserter' => false,
			'categories' => array( 'escape-room-game-query' ),
		),
		'post-listing-three-column' => array(
			'title'    => __( 'Post Three Column', 'escape-room-game' ),
			//'inserter' => false,
			'categories' => array( 'escape-room-game-query' ),
		),
		'post-listing-four-column' => array(
			'title'    => __( 'Post Four Column', 'escape-room-game' ),
			//'inserter' => false,
			'categories' => array( 'escape-room-game-query' ),
		),
		'feature-post-column' => array(
			'title'    => __( 'Feature Post Column', 'escape-room-game' ),
			//'inserter' => false,
			'categories' => array( 'escape-room-game-query' ),
		),
		'comment-section-1' => array(
			'title'    => __( 'Comment Section 1', 'escape-room-game' ),
			'categories' => array( 'escape-room-game-comment-sections' ),
		),
		'cover-with-post-title' => array(
			'title'    => __( 'Cover With Post Title', 'escape-room-game' ),
			'categories' => array( 'escape-room-game-banner-sections' ),
		),
		'cover-with-search-title' => array(
			'title'    => __( 'Cover With Search Title', 'escape-room-game' ),
			'categories' => array( 'escape-room-game-banner-sections' ),
		),
		'cover-with-archive-title' => array(
			'title'    => __( 'Cover With Archive Title', 'escape-room-game' ),
			'categories' => array( 'escape-room-game-banner-sections' ),
		),
		'cover-with-index-title' => array(
			'title'    => __( 'Cover With Index Title', 'escape-room-game' ),
			'categories' => array( 'escape-room-game-banner-sections' ),
		),
		'theme-button' => array(
			'title'    => __( 'Theme Button', 'escape-room-game' ),
			'categories' => array( 'escape-room-game-theme-button' ),
		),
	);

	$block_pattern_categories = array(
		'escape-room-game-footers' => array( 'label' => __( 'Footers', 'escape-room-game' ) ),
		'escape-room-game-headers' => array( 'label' => __( 'Headers', 'escape-room-game' ) ),
		'escape-room-game-pages'   => array( 'label' => __( 'Pages', 'escape-room-game' ) ),
		'escape-room-game-query'   => array( 'label' => __( 'Query', 'escape-room-game' ) ),
		'escape-room-game-sidebars'   => array( 'label' => __( 'Sidebars', 'escape-room-game' ) ),
		'escape-room-game-banner'   => array( 'label' => __( 'Banner Sections', 'escape-room-game' ) ),
		'escape-room-game-about-us-section'   => array( 'label' => __( 'About Us Section', 'escape-room-game' ) ),
		'escape-room-game-experience-section'   => array( 'label' => __( 'Experience Section', 'escape-room-game' ) ),
		'escape-room-game-testimonial-section'   => array( 'label' => __( 'Testimonial Section', 'escape-room-game' ) ),
		'escape-room-game-news-section'   => array( 'label' => __( 'News Section', 'escape-room-game' ) ),
		'escape-room-game-faq-section'   => array( 'label' => __( 'FAQ Section', 'escape-room-game' ) ),
		'escape-room-game-comment-section'   => array( 'label' => __( 'Comment Sections', 'escape-room-game' ) ),
		'escape-room-game-theme-button'   => array( 'label' => __( 'Theme Button Sections', 'escape-room-game' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since Escape Room Game 1.0
	 *
	 * @param array[] $block_pattern_categories {
	 *     An associative array of block pattern categories, keyed by category name.
	 *
	 *     @type array[] $properties {
	 *         An array of block category properties.
	 *
	 *         @type string $label A human-readable label for the pattern category.
	 *     }
	 * }
	 */
	$block_pattern_categories = apply_filters( 'escape_room_game_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	/**
	 * Filters the theme block patterns.
	 *
	 * @since Escape Room Game 1.0
	 *
	 * @param array $block_patterns List of block patterns by name.
	 */
	$patterns = apply_filters( 'escape_room_game_block_patterns', $patterns );

	foreach ( $patterns as $block_pattern => $pattern ) {
		$pattern['content'] = escape_room_game_get_pattern_content( $block_pattern );
		register_block_pattern(
			'escape-room-game/' . $block_pattern,
			$pattern
		);
	}
}
add_action( 'init', 'escape_room_game_register_block_patterns', 9 );
