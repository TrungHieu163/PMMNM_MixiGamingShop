<?php
/**
 * Title: About Us Section
 * Slug: escape-room-game/about-us-section
 * Categories: template
 */
?>
<!-- wp:group {"className":"about-section","style":{"spacing":{"margin":{"top":"0rem"},"padding":{"top":"0rem","bottom":"0rem","left":"0px","right":"0px"}}},"backgroundColor":"primary","layout":{"type":"constrained","contentSize":"70%"}} -->
<div class="wp-block-group about-section has-primary-background-color has-background" style="margin-top:0rem;padding-top:0rem;padding-right:0px;padding-bottom:0rem;padding-left:0px"><!-- wp:columns {"className":"about-inner-content"} -->
<div class="wp-block-columns about-inner-content"><!-- wp:column {"width":"","className":"about-left-content wow fadeInUp"} -->
<div class="wp-block-column about-left-content wow fadeInUp"><!-- wp:group {"className":"about-images","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group about-images"><!-- wp:image {"id":147,"width":"auto","height":"475px","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"0px"}}} -->
<figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/experience1.png" alt="" class="wp-image-147" style="border-radius:0px;width:auto;height:475px"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":148,"width":"auto","height":"475px","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"0px"}}} -->
<figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/experience2.png" alt="" class="wp-image-148" style="border-radius:0px;width:auto;height:475px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"","className":"about-right-content wow fadeInDown"} -->
<div class="wp-block-column is-vertically-aligned-center about-right-content wow fadeInDown"><!-- wp:paragraph {"align":"left","className":"about-small-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontStyle":"normal","fontWeight":"500","textTransform":"uppercase"},"spacing":{"padding":{"top":"4px","right":"var:preset|spacing|50","bottom":"4px","left":"var:preset|spacing|50"},"margin":{"bottom":"var:preset|spacing|20"}},"border":{"radius":"0px","width":"1px"}},"backgroundColor":"foreground","textColor":"background","fontSize":"medium","borderColor":"background"} -->
<p class="has-text-align-left about-small-title has-border-color has-background-border-color has-background-color has-foreground-background-color has-text-color has-background has-link-color has-medium-font-size" style="border-width:1px;border-radius:0px;margin-bottom:var(--wp--preset--spacing--20);padding-top:4px;padding-right:var(--wp--preset--spacing--50);padding-bottom:4px;padding-left:var(--wp--preset--spacing--50);font-style:normal;font-weight:500;text-transform:uppercase"><?php echo esc_html__('about the final clue', 'escape-room-game'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":4,"style":{"typography":{"fontSize":"25px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"700"},"spacing":{"margin":{"top":"var:preset|spacing|30"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background"} -->
<h4 class="wp-block-heading has-background-color has-text-color has-link-color" style="margin-top:var(--wp--preset--spacing--30);font-size:25px;font-style:normal;font-weight:700;text-transform:capitalize"><?php echo esc_html__('unlock thrilling adventures with immersive escape room experiences.', 'escape-room-game'); ?></h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}},"typography":{"lineHeight":1.4},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","fontSize":"small","fontFamily":"inter"} -->
<p class="has-background-color has-text-color has-link-color has-inter-font-family has-small-font-size" style="margin-top:0px;margin-bottom:0px;line-height:1.4"><?php echo esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nisi elit, consequat pharetra elementum nec, eleifend non turpis.', 'escape-room-game'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:columns {"className":"about-bottom","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns about-bottom" style="margin-top:var(--wp--preset--spacing--60)"><!-- wp:column {"width":"40%","className":"about-btm-left"} -->
<div class="wp-block-column about-btm-left" style="flex-basis:40%"><!-- wp:image {"id":329,"width":"25px","height":"25px","scale":"contain","sizeSlug":"full","linkDestination":"none","className":"about-icon"} -->
<figure class="wp-block-image size-full is-resized about-icon"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/about-icon.png" alt="" class="wp-image-329" style="object-fit:contain;width:25px;height:25px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":6,"style":{"typography":{"textTransform":"capitalize","fontStyle":"normal","fontWeight":"700","fontSize":"18px"},"spacing":{"margin":{"top":"var:preset|spacing|40"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background"} -->
<h6 class="wp-block-heading has-background-color has-text-color has-link-color" style="margin-top:var(--wp--preset--spacing--40);font-size:18px;font-style:normal;font-weight:700;text-transform:capitalize"><?php echo esc_html__('Guaranteed Satisfaction', 'escape-room-game'); ?></h6>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"13px","lineHeight":"1.4"},"spacing":{"margin":{"top":"0px","bottom":"0px"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","fontFamily":"inter"} -->
<p class="has-background-color has-text-color has-link-color has-inter-font-family" style="margin-top:0px;margin-bottom:0px;font-size:13px;line-height:1.4"><?php echo esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nisi elit, consequat pharetra elementum nec, eleifend non turpis.', 'escape-room-game'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"40%","className":"about-btm-right"} -->
<div class="wp-block-column about-btm-right" style="flex-basis:40%"><!-- wp:image {"id":341,"width":"22px","height":"22px","scale":"contain","sizeSlug":"full","linkDestination":"none","className":"about-icon"} -->
<figure class="wp-block-image size-full is-resized about-icon"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/about-icon1.png" alt="" class="wp-image-341" style="object-fit:contain;width:22px;height:22px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":6,"style":{"typography":{"textTransform":"capitalize","fontStyle":"normal","fontWeight":"700","fontSize":"18px"},"spacing":{"margin":{"top":"var:preset|spacing|40"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","fontFamily":"inter"} -->
<h6 class="wp-block-heading has-background-color has-text-color has-link-color has-inter-font-family" style="margin-top:var(--wp--preset--spacing--40);font-size:18px;font-style:normal;font-weight:700;text-transform:capitalize"><?php echo esc_html__('Customer Rating 4.9', 'escape-room-game'); ?></h6>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"13px","lineHeight":"1.4"},"spacing":{"margin":{"top":"0px","bottom":"0px"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","fontFamily":"inter"} -->
<p class="has-background-color has-text-color has-link-color has-inter-font-family" style="margin-top:0px;margin-bottom:0px;font-size:13px;line-height:1.4"><?php echo esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nisi elit, consequat pharetra elementum nec, eleifend non turpis.', 'escape-room-game'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"90px","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:90px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->