<?php
/**
 * Title: Experience Section
 * Slug: escape-room-game/experience-section
 * Categories: template
 */
?>
<!-- wp:group {"className":"experience-section","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group experience-section"><!-- wp:columns {"className":"experience-head-top wow zoomIn"} -->
<div class="wp-block-columns experience-head-top wow zoomIn"><!-- wp:column {"width":"28%","className":"experience-head-box"} -->
<div class="wp-block-column experience-head-box" style="flex-basis:28%"><!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontSize":"22px","fontStyle":"normal","fontWeight":"600","textTransform":"uppercase","letterSpacing":"4px"}},"textColor":"background"} -->
<h3 class="wp-block-heading has-background-color has-text-color has-link-color" style="font-size:22px;font-style:normal;font-weight:600;letter-spacing:4px;text-transform:uppercase"><?php echo esc_html__('escape ', 'escape-room-game'); ?><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-secondary-color"><?php echo esc_html__('rooms', 'escape-room-game'); ?></mark></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontSize":"15px","lineHeight":1.4},"spacing":{"margin":{"top":"5px","bottom":"0px"}}},"textColor":"background"} -->
<p class="has-background-color has-text-color has-link-color" style="margin-top:5px;margin-bottom:0px;font-size:15px;line-height:1.4"><?php echo esc_html__('Unlock adventures through immersive, mind-bending escape experiences.', 'escape-room-game'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"72%"} -->
<div class="wp-block-column" style="flex-basis:72%"></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:query {"queryId":61,"query":{"perPage":4,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"metadata":{"categories":["posts"],"patternName":"core/query-grid-posts","name":"Grid"},"className":"experience-boxes wow zoomIn"} -->
<div class="wp-block-query experience-boxes wow zoomIn"><!-- wp:post-template {"className":"experience-inner-box","layout":{"type":"grid","columnCount":4}} -->
<!-- wp:group {"className":"experience-box","style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}},"dimensions":{"minHeight":"490px"},"color":{"background":"#8e8e8e"}},"layout":{"inherit":false}} -->
<div class="wp-block-group experience-box has-background" style="background-color:#8e8e8e;min-height:490px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:post-featured-image {"isLink":true,"height":"490px","align":"wide"} /-->

<!-- wp:group {"className":"experience-outer-content","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group experience-outer-content" style="margin-top:0px;margin-bottom:0px"><!-- wp:group {"className":"experience-content","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group experience-content" style="margin-top:0px;margin-bottom:0px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)"><!-- wp:post-excerpt {"moreText":"\u003cimg class=\u0022wp-image-160\u0022 style=\u0022width: 36px;\u0022 src=<?php echo esc_url(get_template_directory_uri(). '/images/btn-arrow.png'); ?> alt=\u0022\u0022\u003e","className":"experience-btn","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} /-->

<!-- wp:post-title {"textAlign":"center","level":6,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"500","textTransform":"uppercase"}},"textColor":"background"} /-->

<!-- wp:post-excerpt {"textAlign":"center","excerptLength":10,"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontSize":"15px","fontStyle":"normal","fontWeight":"400","lineHeight":1.4},"spacing":{"margin":{"top":"5px","bottom":"0px"}}},"textColor":"background"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->

<!-- wp:spacer {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:100px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->