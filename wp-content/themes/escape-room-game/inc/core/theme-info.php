<?php
/* Add to Dashboard main menu */
function escape_room_game_dashboard_menu() {
    add_menu_page(
        esc_html__( 'Escape Room Game', 'escape-room-game' ), // Page title
        esc_html__( 'Escape Room Game', 'escape-room-game' ), // Menu title
        'manage_options',                                             // Capability
        'escape-room-game-info',                                  // Menu slug (same)
        'escape_room_game_theme_page_display',                    // Callback
         get_template_directory_uri() . '/images/menu-icon.svg', // Image icon
        59                                           // Position
    );
}
add_action( 'admin_menu', 'escape_room_game_dashboard_menu' );

function escape_room_game_admin_theme_style() {
	wp_enqueue_style('escape-room-game-custom-admin-style', esc_url(get_template_directory_uri()) . '/css/admin-style.css');
	wp_enqueue_script('escape-room-game-tabs', esc_url(get_template_directory_uri()) . '/js/tab.js');
}
add_action('admin_enqueue_scripts', 'escape_room_game_admin_theme_style');

/**
 * Display About page
 */
function escape_room_game_theme_page_display() {
	$escape_room_game_theme = wp_get_theme();

	if ( is_child_theme() ) {
		$escape_room_game_theme = wp_get_theme()->parent();
	} ?>

	<div class="wrapper-info">
	<div class="tab-sec">
    	
    	<div class="tab">
			<button class="tablinks" onclick="escape_room_game_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Free Setup', 'escape-room-game' ); ?></button>
			<button class="tablinks" onclick="escape_room_game_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'escape-room-game' ); ?></button>
  			<button class="tablinks" onclick="escape_room_game_open_tab(event, 'free_pro')"><?php esc_html_e( 'Free VS Premium', 'escape-room-game' ); ?></button>
  			<button class="tablinks" onclick="escape_room_game_open_tab(event, 'get_bundle')"><?php esc_html_e( 'WP Theme Bundle', 'escape-room-game' ); ?></button>
		</div>

		<?php 
			$escape_room_game_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$escape_room_game_plugin_custom_css ='display: block';
			}
		?>

		<div id="lite_theme" class="tabcontent open">
			<div class="lite-theme-tab">
				<h3><?php esc_html_e( 'Escape Room Game', 'escape-room-game' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e('The Escape Room Game is an excellent solution for businesses, entertainment centers, and enthusiasts looking to build a compelling online presence for escape room experiences while facilitating ecommerce functionality for selling tickets, gift cards, merchandise, and themed products through WooCommerce. This makes it perfect for ideas related to online store building and event-based bookings. The theme features a modern, interactive layout that highlights puzzle games, mystery adventures, challenges, and group activities across desktops, tablets, and mobile devices, all while emphasizing user engagement through intuitive navigation, eye-catching visuals, and well-placed call-to-action buttons. Its SEO-friendly architecture, compatible with Yoast SEO, enhances visibility, while seamless integration with Bookly and Contact Form 7 simplifies online reservations and group bookings. Customizable layouts, adjustable colors, fonts, and content sections allow for full branding control, promoting special offers, seasonal events, and limited-time challenges that turn visitors into paying participants. With features like fast loading performance, cross-browser support, and an immersive design, the Escape Room Game delivers a professional and dynamic website that not only captivates users but also encourages repeat engagement, making it a must for escape game entertainment. Demo: https://www.vwthemes.net/escape-room-game-pro/','escape-room-game'); ?></p>
			  	<div class="col-left-inner">
					<div class="pro-links">
				    	<a href="<?php echo esc_url( admin_url() . 'site-editor.php' ); ?>" target="_blank"><?php esc_html_e('Edit Your Site', 'escape-room-game'); ?></a>
						<a href="<?php echo esc_url( home_url() ); ?>" target="_blank"><?php esc_html_e('Visit Your Site', 'escape-room-game'); ?></a>
					</div>
					<div class="support-forum-col-section">
						<div class="support-forum-col">
							<h4><?php esc_html_e('Having Trouble, Need Support?', 'escape-room-game'); ?></h4>
							<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'escape-room-game'); ?></p>
							<div class="info-link">
								<a href="<?php echo esc_url( ESCAPE_ROOM_GAME_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'escape-room-game'); ?></a>
							</div>
						</div>
						<div class="support-forum-col">
							<h4><?php esc_html_e('Reviews & Testimonials', 'escape-room-game'); ?></h4>
							<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'escape-room-game'); ?>  </p>
							<div class="info-link">
								<a href="<?php echo esc_url( ESCAPE_ROOM_GAME_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'escape-room-game'); ?></a>
							</div>
						</div>
						<div class="support-forum-col">
							<h4><?php esc_html_e('Theme Documentation', 'escape-room-game'); ?></h4>
							<p> <?php esc_html_e('If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'escape-room-game'); ?>  </p>
							<div class="info-link">
								<a href="<?php echo esc_url( ESCAPE_ROOM_GAME_FREE_DOC ); ?>" target="_blank"><?php esc_html_e('Free Theme Documentation', 'escape-room-game'); ?></a>
							</div>
						</div>
					</div>
			  	</div>
			</div>
		</div>

		<div id="theme_pro" class="tabcontent">		  	
			<div class="pro-info">
				<div class="col-left-pro">
					<h3><?php esc_html_e( 'Premium Theme Information', 'escape-room-game' ); ?></h3>
					<hr class="h3hr">
			    	<p><?php esc_html_e('The Escape Room WordPress Theme is the ultimate solution for businesses in the entertainment and adventure industry looking to create a captivating online presence. Designed with immersive visuals and interactive elements, this theme allows you to showcase your escape room games, highlight challenges, and engage visitors from the moment they land on your website. Its responsive design ensures seamless performance across desktops, tablets, and smartphones, while the intuitive interface makes navigation easy for both you and your customers. Perfect for promoting events, online bookings, and team-building activities, the theme integrates effortlessly with popular WordPress plugins, enabling smooth functionality for payment gateways, booking systems, and contact forms. Whether you’re a small local escape room or a growing chain, this theme provides a professional, modern, and user-friendly platform to attract and retain customers. The Escape Room WordPress Theme combines aesthetics with functionality, giving your business a competitive edge in the digital space.','escape-room-game'); ?></p>
			    	<div class="pro-links">
				    	<a href="<?php echo esc_url( ESCAPE_ROOM_GAME_LIVE_DEMO ); ?>" target="_blank" class="demo-btn"><?php esc_html_e('Live Demo', 'escape-room-game'); ?></a>
						<a href="<?php echo esc_url( ESCAPE_ROOM_GAME_BUY_NOW ); ?>" target="_blank" class="prem-btn"><?php esc_html_e('Buy Premium', 'escape-room-game'); ?></a>
						<a href="<?php echo esc_url( ESCAPE_ROOM_GAME_PRO_DOC ); ?>" target="_blank" class="doc-btn"><?php esc_html_e('Documentation', 'escape-room-game'); ?></a>
					</div>
			    </div>
			    <div class="col-right-pro scroll-image-wrapper">
			    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/premium-img.jpg" alt="" class="pro-img" />		    	
			    </div>
			</div>		    
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'escape-room-game' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th><?php esc_html_e('Features', 'escape-room-game'); ?></th>
								<th><?php esc_html_e('Free Themes', 'escape-room-game'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'escape-room-game'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Easy Setup', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('SEO Friendly', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Banner Settings', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'escape-room-game'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'escape-room-game'); ?></td>
								<td class="table-img"><?php esc_html_e('14', 'escape-room-game'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'escape-room-game'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'escape-room-game'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'escape-room-game'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'escape-room-game'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'escape-room-game'); ?></td>
								<td class="table-img"><?php esc_html_e('12', 'escape-room-game'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'escape-room-game'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'escape-room-game'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'escape-room-game'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'escape-room-game'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Reordering', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Demo Importer', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Full Documentation', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Latest WordPress Compatibility', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('WordPress 6.4 or later', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('PHP 8.2 or 8.3', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('MySQL 5.6 (or greater) | MariaDB 10.0 (or greater)', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Influence Registration', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Detailed Influencer Portfolio', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Premium Pricing Plan', 'escape-room-game'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
							<td></td>
							<td class="table-img"></td>
							<td class="update-link"><a href="<?php echo esc_url( ESCAPE_ROOM_GAME_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'escape-room-game'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="get_bundle" class="tabcontent">	
			<div class="bundle-info">
				<div class="col-left-pro">
			   		<h3><?php esc_html_e( 'WP Theme Bundle', 'escape-room-game' ); ?></h3>
			   		<hr class="h3hr">
			    	<p><?php esc_html_e('Enhance your website effortlessly with our WP Theme Bundle. Get access to 485+ premium WordPress themes and 5+ powerful plugins, all designed to meet diverse business needs. Enjoy seamless integration with any plugins, ultimate customization flexibility, and regular updates to keep your site current and secure. Plus, benefit from our dedicated customer support, ensuring a smooth and professional web experience.','escape-room-game'); ?></p>
			    	<div class="feature">
			    		<h4><?php esc_html_e( 'Features:', 'escape-room-game' ); ?></h4>
			    		<p><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/tick.png" alt="" /><?php esc_html_e('485+ Premium Themes & 5+ Plugins.', 'escape-room-game'); ?></p>
			    		<p><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/tick.png" alt="" /><?php esc_html_e('Seamless Integration.', 'escape-room-game'); ?></p>
			    		<p><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/tick.png" alt="" /><?php esc_html_e('Customization Flexibility.', 'escape-room-game'); ?></p>
			    		<p><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/tick.png" alt="" /><?php esc_html_e('Regular Updates.', 'escape-room-game'); ?></p>
			    		<p><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/tick.png" alt="" /><?php esc_html_e('Dedicated Support.', 'escape-room-game'); ?></p>
			    	</div>
			    	<p><?php esc_html_e('Upgrade now and give your website the professional edge it deserves, all at an unbeatable price of $99!', 'escape-room-game'); ?></p>
			    	<div class="pro-links">
						<a href="<?php echo esc_url( ESCAPE_ROOM_GAME_THEME_BUNDLE_BUY_NOW ); ?>" target="_blank" class="bundle-buy"><?php esc_html_e('Get Bundle', 'escape-room-game'); ?></a>
						<a href="<?php echo esc_url( ESCAPE_ROOM_GAME_THEME_BUNDLE_DOC ); ?>" target="_blank" class="bundle-doc"><?php esc_html_e('Documentation', 'escape-room-game'); ?></a>
					</div>
			   	</div>
			   	<div class="col-right-pro scroll-image-wrapper">
			    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/bundle.jpg" alt="" />
			   	</div>
			</div>	  	
		</div>
	</div>
	<div class="coupen-code-section">
		<div class="sshot-section">
			<div class="sshot-inner">
				<h2><?php esc_html_e('Welcome To Escape Room Game','escape-room-game'); ?> </h2>
				<div class="on-pro">
					<span class="version"><?php esc_html_e( 'Version', 'escape-room-game' ); ?>: <?php echo esc_html($escape_room_game_theme['Version']);?></span>
					<span class="coupon-code"><?php esc_html_e('Get 20% Of On Pro Theme-Use Code: ','escape-room-game'); ?><span class="code-highlight"><?php esc_html_e('VWPRO20','escape-room-game'); ?></span>
				</div>
		    	<p><?php esc_html_e('All Our Wordpress Themes Are Modern, Minimalist, 100% Responsive, Seo-Friendly,Feature-Rich, And Multipurpose That Best Suit Designers, Bloggers And Other Professionals Who Are Working In The Creative Fields.','escape-room-game'); ?></p>
		    	<div class="btn-section">
			    	<div class="proo-links">
				    	<a href="<?php echo esc_url( ESCAPE_ROOM_GAME_LIVE_DEMO ); ?>" target="_blank" class="demo-btn"><?php esc_html_e('Live Demo', 'escape-room-game'); ?></a>
						<a href="<?php echo esc_url( ESCAPE_ROOM_GAME_BUY_NOW ); ?>" target="_blank" class="prem-btn"><?php esc_html_e('Buy Premium', 'escape-room-game'); ?></a>
						<a href="<?php echo esc_url( ESCAPE_ROOM_GAME_PRO_DOC ); ?>" target="_blank" class="doc-btn"><?php esc_html_e('Documentation', 'escape-room-game'); ?></a>
						
					</div>
			    	
			    </div>
			</div>
	    	<div class="bundle-banner">
	    		<div class="bundle-img">
	    			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/bundle-notice.png" alt="" />
	    		</div>
	    		<div class="bundle-text">
		  			<h2><?php esc_html_e('WP THEME BUNDLE','escape-room-game'); ?></h2>
					<h4><?php esc_html_e('Get Access to 485+ Premium WordPress Themes At Just $99','escape-room-game'); ?></h4>
					<div class="bundle-button">
			  			<a href="<?php echo esc_url( 'https://www.vwthemes.com/discount/FREEBREF?redirect=/products/wp-theme-bundle'); ?>" target="_blank"><?php esc_html_e('Get 10% OFF On Bundle', 'escape-room-game'); ?></a>
			  		</div>
		  		</div>
	    	</div>
	    </div>
	    <div class="coupen-section">
	    	<div class="logo-section">
			  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" alt="" />
		  	</div>
		  	<div class="logo-right">	
		  		<div class="logo-text">
		  			<h2><?php esc_html_e('GET PRO','escape-room-game'); ?></h2>
					<h4><?php esc_html_e('20% Off','escape-room-game'); ?></h4>
		  		</div>						
			</div>
	    </div>
	</div>
</div>
<?php }?>
