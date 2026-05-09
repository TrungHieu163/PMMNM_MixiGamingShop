<?php
/**
 * Title: Home Banner
 * Slug: escape-room-game/home-banner
 * Categories: template
 */
?>

<div class="wp-block-outermost-icon-block"><div class="icon-container" style="width:100%;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg width="100%" height="4150" viewBox="0 0 1920 4150" xmlns="http://www.w3.org/2000/svg">
  <path d="M264 0V653.5L322.8 690H1551.1L1614.1 731.5V1366.5L1551.1 1409.5H322.8L264 1443.5V1963L321.5 2000H1551.1L1614.1 2035V2541.5L1551.1 2580H322.8L264 2618.5V3169.5L330.5 3210H1551.1L1629.5 3255.5V3630L1551.1 3666.5L194.9 3678L127.1 3720V4079L194.9 4119.5H1950" stroke="#B5995A" stroke-width="2" fill="none" vector-effect="non-scaling-stroke"></path>
  <circle cx="1850" cy="4119.5" r="10" fill="var(--wp--preset--color--secondary)" stroke="white" stroke-width="5"></circle>
</svg></div></div>

<!-- wp:group {"className":"banner-section","style":{"dimensions":{"minHeight":"650px"},"spacing":{"padding":{"top":"0rem","bottom":"0rem","left":"0rem","right":"0rem"},"margin":{"top":"0","bottom":"0"}},"border":{"radius":"0px"},"background":{"backgroundImage":{"url":"<?php echo esc_url(get_template_directory_uri()); ?>/images/banner-bg.png","id":293,"source":"file","title":"banner-bg"},"backgroundSize":"cover","backgroundPosition":"50% 50%"}},"backgroundColor":"primary","layout":{"type":"constrained","contentSize":"70%"}} -->
<div class="wp-block-group banner-section has-primary-background-color has-background" style="border-radius:0px;min-height:650px;margin-top:0;margin-bottom:0;padding-top:0rem;padding-right:0rem;padding-bottom:0rem;padding-left:0rem"><!-- wp:group {"className":"banner-content wow zoomInRight","style":{"dimensions":{"minHeight":"650px"},"spacing":{"padding":{"bottom":"var:preset|spacing|50","right":"var:preset|spacing|70","left":"var:preset|spacing|70"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group banner-content wow zoomInRight" style="min-height:650px;padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--70)"><!-- wp:group {"className":"banner-inner-content","style":{"spacing":{"padding":{"right":"18rem","left":"18rem"}}},"layout":{"type":"constrained","contentSize":""}} -->
<div class="wp-block-group banner-inner-content" style="padding-right:18rem;padding-left:18rem"><!-- wp:heading {"textAlign":"center","className":"banner-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"textTransform":"uppercase","fontSize":"42px","fontStyle":"Thin","fontWeight":"500","letterSpacing":"5px"},"spacing":{"margin":{"bottom":"15px"}}},"textColor":"background","fontFamily":"montserrat"} -->
<h2 class="wp-block-heading has-text-align-center banner-title has-background-color has-text-color has-link-color has-montserrat-font-family" style="margin-bottom:15px;font-size:42px;font-style:Thin;font-weight:500;letter-spacing:5px;text-transform:uppercase"><?php echo esc_html__('unlock the mystery within now', 'escape-room-game'); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"banner-desc","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontSize":"15px","fontStyle":"normal","fontWeight":"400","lineHeight":1.4},"spacing":{"margin":{"top":"0px","bottom":"30px"}}},"textColor":"background"} -->
<p class="has-text-align-center banner-desc has-background-color has-text-color has-link-color" style="margin-top:0px;margin-bottom:30px;font-size:15px;font-style:normal;font-weight:400;line-height:1.4"><?php echo esc_html__('Step into a world of mystery, clues, and thrilling challenges. Work as a team, race against the clock, and escape before time runs out. Are you ready to unlock the adventure that awaits you?', 'escape-room-game'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"banner-button","style":{"spacing":{"margin":{"top":"20px","bottom":"60px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons banner-button" style="margin-top:20px;margin-bottom:60px"><!-- wp:button {"backgroundColor":"primary","textColor":"background","className":"banner-btn","style":{"typography":{"fontSize":"15px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"400"},"spacing":{"padding":{"left":"20px","right":"20px","top":"6px","bottom":"6px"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"border":{"radius":"0px","width":"0px","style":"none"}}} -->
<div class="wp-block-button banner-btn"><a class="wp-block-button__link has-background-color has-primary-background-color has-text-color has-background has-link-color has-custom-font-size wp-element-button" href="#" style="border-style:none;border-width:0px;border-radius:0px;padding-top:6px;padding-right:20px;padding-bottom:6px;padding-left:20px;font-size:15px;font-style:normal;font-weight:400;text-transform:capitalize"><?php echo esc_html__('explore the rooms', 'escape-room-game'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:columns {"className":"banner-posts"} -->
<div class="wp-block-columns banner-posts"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":6,"className":"banner-post-box","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"textTransform":"uppercase","fontSize":"15px","fontStyle":"normal","fontWeight":"600"},"spacing":{"padding":{"top":"10px","bottom":"10px","left":"15px","right":"15px"}},"border":{"width":"1px"}},"backgroundColor":"foreground","textColor":"background","borderColor":"background"} -->
<h6 class="wp-block-heading banner-post-box has-border-color has-background-border-color has-background-color has-foreground-background-color has-text-color has-background has-link-color" style="border-width:1px;padding-top:10px;padding-right:15px;padding-bottom:10px;padding-left:15px;font-size:15px;font-style:normal;font-weight:600;text-transform:uppercase"><img class="wp-image-7" style="width: 24px;" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/door.png" alt=""><?php echo esc_html__('The Forgotten Asylum', 'escape-room-game'); ?></h6>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":6,"className":"banner-post-box","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"textTransform":"uppercase","fontSize":"15px","fontStyle":"normal","fontWeight":"600"},"spacing":{"padding":{"top":"10px","bottom":"10px","left":"15px","right":"15px"}},"border":{"width":"1px"}},"backgroundColor":"foreground","textColor":"background","borderColor":"background"} -->
<h6 class="wp-block-heading banner-post-box has-border-color has-background-border-color has-background-color has-foreground-background-color has-text-color has-background has-link-color" style="border-width:1px;padding-top:10px;padding-right:15px;padding-bottom:10px;padding-left:15px;font-size:15px;font-style:normal;font-weight:600;text-transform:uppercase"><img class="wp-image-7" style="width: 24px;" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/door.png" alt=""><?php echo esc_html__('The Pharaoh\'s Curse', 'escape-room-game'); ?></h6>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":6,"className":"banner-post-box","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"textTransform":"uppercase","fontSize":"15px","fontStyle":"normal","fontWeight":"600"},"spacing":{"padding":{"top":"10px","bottom":"10px","left":"15px","right":"15px"}},"border":{"width":"1px"}},"backgroundColor":"foreground","textColor":"background","borderColor":"background"} -->
<h6 class="wp-block-heading banner-post-box has-border-color has-background-border-color has-background-color has-foreground-background-color has-text-color has-background has-link-color" style="border-width:1px;padding-top:10px;padding-right:15px;padding-bottom:10px;padding-left:15px;font-size:15px;font-style:normal;font-weight:600;text-transform:uppercase"><img class="wp-image-7" style="width: 24px;" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/door.png" alt=""><?php echo esc_html__('Ravenwood Manor', 'escape-room-game'); ?></h6>
<!-- /wp:heading --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"45px","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:45px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->