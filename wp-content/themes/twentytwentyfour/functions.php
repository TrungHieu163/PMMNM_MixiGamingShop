<?php
/**
 * Twenty Twenty-Four functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Twenty Twenty-Four
 * @since Twenty Twenty-Four 1.0
 */

/**
 * Register block styles.
 */

if ( ! function_exists( 'twentytwentyfour_block_styles' ) ) :
	/**
	 * Register custom block styles
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_block_styles() {

		register_block_style(
			'core/details',
			array(
				'name'         => 'arrow-icon-details',
				'label'        => __( 'Arrow icon', 'twentytwentyfour' ),
				/*
				 * Styles for the custom Arrow icon style of the Details block
				 */
				'inline_style' => '
				.is-style-arrow-icon-details {
					padding-top: var(--wp--preset--spacing--10);
					padding-bottom: var(--wp--preset--spacing--10);
				}

				.is-style-arrow-icon-details summary {
					list-style-type: "\2193\00a0\00a0\00a0";
				}

				.is-style-arrow-icon-details[open]>summary {
					list-style-type: "\2192\00a0\00a0\00a0";
				}',
			)
		);
		register_block_style(
			'core/post-terms',
			array(
				'name'         => 'pill',
				'label'        => __( 'Pill', 'twentytwentyfour' ),
				/*
				 * Styles variation for post terms
				 * https://github.com/WordPress/gutenberg/issues/24956
				 */
				'inline_style' => '
				.is-style-pill a,
				.is-style-pill span:not([class], [data-rich-text-placeholder]) {
					display: inline-block;
					background-color: var(--wp--preset--color--base-2);
					padding: 0.375rem 0.875rem;
					border-radius: var(--wp--preset--spacing--20);
				}

				.is-style-pill a:hover {
					background-color: var(--wp--preset--color--contrast-3);
				}',
			)
		);
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'twentytwentyfour' ),
				/*
				 * Styles for the custom checkmark list block style
				 * https://github.com/WordPress/gutenberg/issues/51480
				 */
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
		register_block_style(
			'core/navigation-link',
			array(
				'name'         => 'arrow-link',
				'label'        => __( 'With arrow', 'twentytwentyfour' ),
				/*
				 * Styles for the custom arrow nav link block style
				 */
				'inline_style' => '
				.is-style-arrow-link .wp-block-navigation-item__label:after {
					content: "\2197";
					padding-inline-start: 0.25rem;
					vertical-align: middle;
					text-decoration: none;
					display: inline-block;
				}',
			)
		);
		register_block_style(
			'core/heading',
			array(
				'name'         => 'asterisk',
				'label'        => __( 'With asterisk', 'twentytwentyfour' ),
				'inline_style' => "
				.is-style-asterisk:before {
					content: '';
					width: 1.5rem;
					height: 3rem;
					background: var(--wp--preset--color--contrast-2, currentColor);
					clip-path: path('M11.93.684v8.039l5.633-5.633 1.216 1.23-5.66 5.66h8.04v1.737H13.2l5.701 5.701-1.23 1.23-5.742-5.742V21h-1.737v-8.094l-5.77 5.77-1.23-1.217 5.743-5.742H.842V9.98h8.162l-5.701-5.7 1.23-1.231 5.66 5.66V.684h1.737Z');
					display: block;
				}

				/* Hide the asterisk if the heading has no content, to avoid using empty headings to display the asterisk only, which is an A11Y issue */
				.is-style-asterisk:empty:before {
					content: none;
				}

				.is-style-asterisk:-moz-only-whitespace:before {
					content: none;
				}

				.is-style-asterisk.has-text-align-center:before {
					margin: 0 auto;
				}

				.is-style-asterisk.has-text-align-right:before {
					margin-left: auto;
				}

				.rtl .is-style-asterisk.has-text-align-left:before {
					margin-right: auto;
				}",
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_block_styles' );

/**
 * Enqueue block stylesheets.
 */

if ( ! function_exists( 'twentytwentyfour_block_stylesheets' ) ) :
	/**
	 * Enqueue custom block stylesheets
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_block_stylesheets() {
		/**
		 * The wp_enqueue_block_style() function allows us to enqueue a stylesheet
		 * for a specific block. These will only get loaded when the block is rendered
		 * (both in the editor and on the front end), improving performance
		 * and reducing the amount of data requested by visitors.
		 *
		 * See https://make.wordpress.org/core/2021/12/15/using-multiple-stylesheets-per-block/ for more info.
		 */
		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'twentytwentyfour-button-style-outline',
				'src'    => get_parent_theme_file_uri( 'assets/css/button-outline.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/button-outline.css' ),
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_block_stylesheets' );

/**
 * Register pattern categories.
 */

if ( ! function_exists( 'twentytwentyfour_pattern_categories' ) ) :
	/**
	 * Register pattern categories
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_pattern_categories() {

		register_block_pattern_category(
			'page',
			array(
				'label'       => _x( 'Pages', 'Block pattern category' ),
				'description' => __( 'A collection of full page layouts.' ),
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_pattern_categories' );

// 1. Tạo Tab mới trong trang quản trị sản phẩm
add_filter( 'woocommerce_product_data_tabs', 'hieu_game_specs_tab' );
function hieu_game_specs_tab( $tabs ) {
    $tabs['game_specs'] = array(
        'label'    => __( 'Cấu hình Game', 'woocommerce' ),
        'target'   => 'game_specs_data',
        'class'    => array( 'show_if_simple', 'show_if_variable' ), // Hiện cho cả sản phẩm đơn giản và biến thể
        'priority' => 50,
    );
    return $tabs;
}

// 2. Nội dung bên trong Tab mới
add_action( 'woocommerce_product_data_panels', 'hieu_game_specs_panels' );
function hieu_game_specs_panels() {
    echo '<div id="game_specs_data" class="panel woocommerce_options_panel">';
    echo '<div class="options_group">';
    
    // Ô nhập cấu hình tối thiểu
    woocommerce_wp_textarea_input( array(
        'id'          => '_game_spec_min',
        'label'       => __( 'Cấu hình tối thiểu', 'woocommerce' ),
        'placeholder' => 'Nhập OS, CPU, RAM tối thiểu...',
        'style'       => 'width: 70%; height: 100px;',
    ) );

    // Ô nhập cấu hình khuyến nghị
    woocommerce_wp_textarea_input( array(
        'id'          => '_game_spec_rec',
        'label'       => __( 'Cấu hình khuyến nghị', 'woocommerce' ),
        'placeholder' => 'Nhập OS, CPU, RAM khuyến nghị...',
        'style'       => 'width: 70%; height: 100px;',
    ) );

    echo '</div>';
    echo '</div>';
}

// 3. Lưu dữ liệu khi nhấn Cập nhật sản phẩm
add_action( 'woocommerce_process_product_meta', 'hieu_save_game_specs' );
function hieu_save_game_specs( $post_id ) {
    update_post_meta( $post_id, '_game_spec_min', isset( $_POST['_game_spec_min'] ) ? $_POST['_game_spec_min'] : '' );
    update_post_meta( $post_id, '_game_spec_rec', isset( $_POST['_game_spec_rec'] ) ? $_POST['_game_spec_rec'] : '' );
}

// 4. Shortcode hiển thị [hien_thi_cau_hinh]
add_shortcode( 'hien_thi_cau_hinh', 'hieu_display_specs_shortcode' );
function hieu_display_specs_shortcode() {
    global $product;
    if ( ! $product ) return '';

    $min = get_post_meta( $product->get_id(), '_game_spec_min', true );
    $rec = get_post_meta( $product->get_id(), '_game_spec_rec', true );

    // Chỉ để lại class, xóa sạch style cũ
    $output = '<div class="game-specs-container">';

    if ( $min ) {
        $output .= '<div class="spec-column">';
        $output .= '<h4>Cấu hình tối thiểu</h4>';
        $output .= '<p>' . nl2br( esc_html( $min ) ) . '</p>';
        $output .= '</div>';
    }

    if ( $rec ) {
        $output .= '<div class="spec-column">';
        $output .= '<h4>Cấu hình khuyến nghị</h4>';
        $output .= '<p>' . nl2br( esc_html( $rec ) ) . '</p>';
        $output .= '</div>';
    }

    $output .= '</div>';
    return $output;
}

add_filter( 'wc_product_sku_enabled', 'hieu_remove_sku_from_product_page' );
function hieu_remove_sku_from_product_page( $enabled ) {
    // Nếu không phải trong trang quản trị thì ẩn SKU đi
    if ( ! is_admin() && is_product() ) {
        return false;
    }
    return $enabled;
}

// Thay đổi văn bản "0đ" thành "Miễn phí"
add_filter( 'woocommerce_get_price_html', 'mixigaming_change_free_price_text', 100, 2 );

function mixigaming_change_free_price_text( $price, $product ) {
    // Kiểm tra nếu giá bằng 0 hoặc trống
    if ( $product->get_price() == 0 || $product->get_price() == '' ) {
        return '<span class="amount free-price-text">MIỄN PHÍ</span>';
    }
    return $price;
}

add_filter( 'woocommerce_account_menu_items', 'hieu_remove_my_account_tabs', 99 );

function hieu_remove_my_account_tabs( $items ) {
    unset( $items['downloads'] ); // Xóa mục Tệp tải xuống
    unset( $items['edit-address'] ); // Xóa mục Địa chỉ
    return $items;
}

/**
 * Loại bỏ các trường địa chỉ không cần thiết tại trang Thanh toán
 */
add_filter( 'woocommerce_checkout_fields' , 'hieu_remove_checkout_fields' );

function hieu_remove_checkout_fields( $fields ) {
    // Loại bỏ các trường địa chỉ
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_phone']); // Ẩn luôn số điện thoại nếu chỉ cần email nhận key
    
    // Giữ lại Nâng cao (Order notes) nếu muốn, hoặc ẩn nốt bằng dòng dưới
    // unset($fields['order']['order_comments']);

    return $fields;
}

remove_action( 'woocommerce_checkout_terms_and_conditions', 'wc_checkout_privacy_policy_text', 20 );