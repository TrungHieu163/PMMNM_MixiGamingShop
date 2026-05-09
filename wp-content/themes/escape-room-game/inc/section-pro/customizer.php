<?php 
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Escape_Room_Game_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro/section-pro.php' );

		// Register custom section types.
		
		$manager->register_section_type( 'Escape_Room_Game_Customize_Section_Pro' );


		// Register sections.
		$manager->add_section( new Escape_Room_Game_Customize_Section_Pro( $manager,'escape_room_game_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'Escape Room Game Pro', 'escape-room-game' ),
			'pro_text' => esc_html__( 'Upgrade Pro', 'escape-room-game' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/products/escape-room-wordpress-theme'),
		) )	);

		// Register sections.
		$manager->add_section( new Escape_Room_Game_Customize_Section_Pro( $manager,'escape_room_game_live_demo', array(
			'priority'   => 2,
			'title'    => esc_html__( 'Escape Room Game Live Demo', 'escape-room-game' ),
			'demo_text' => esc_html__( 'Live Demo', 'escape-room-game' ),
			'demo_url'  => esc_url('https://www.vwthemes.net/escape-room-game-pro/'),
		) )	);

	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_style( 'escape-room-game-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Escape_Room_Game_Customize::get_instance();