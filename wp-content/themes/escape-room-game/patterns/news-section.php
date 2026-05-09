<?php
/**
 * Title: News Section
 * Slug: escape-room-game/news-section
 * Categories: template
 */
?>
<!-- wp:group {"className":"news-section","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"top":"0","bottom":"0rem","left":"0px","right":"0px"}}},"backgroundColor":"primary","layout":{"type":"constrained","contentSize":"65%"}} -->
<div class="wp-block-group news-section has-primary-background-color has-background" style="margin-top:0px;margin-bottom:0px;padding-top:0;padding-right:0px;padding-bottom:0rem;padding-left:0px"><!-- wp:columns {"className":"news-heading-box wow fadeInDown","style":{"spacing":{"margin":{"top":"0px","bottom":"var:preset|spacing|40"},"padding":{"top":"0px"}}}} -->
<div class="wp-block-columns news-heading-box wow fadeInDown" style="margin-top:0px;margin-bottom:var(--wp--preset--spacing--40);padding-top:0px"><!-- wp:column {"width":"25%"} -->
<div class="wp-block-column" style="flex-basis:25%"></div>
<!-- /wp:column -->

<!-- wp:column {"width":"50%","className":"news-heading-inner-box"} -->
<div class="wp-block-column news-heading-inner-box" style="flex-basis:50%"><!-- wp:paragraph {"align":"center","className":"news-small-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontStyle":"normal","fontWeight":"500","textTransform":"capitalize"},"spacing":{"padding":{"top":"4px","right":"var:preset|spacing|70","bottom":"4px","left":"var:preset|spacing|70"},"margin":{"bottom":"var:preset|spacing|20"}},"border":{"radius":"0px"}},"backgroundColor":"foreground","textColor":"background","fontSize":"medium"} -->
<p class="has-text-align-center news-small-title has-background-color has-foreground-background-color has-text-color has-background has-link-color has-medium-font-size" style="border-radius:0px;margin-bottom:var(--wp--preset--spacing--20);padding-top:4px;padding-right:var(--wp--preset--spacing--70);padding-bottom:4px;padding-left:var(--wp--preset--spacing--70);font-style:normal;font-weight:500;text-transform:capitalize"><?php echo esc_html__('news & blogs', 'escape-room-game'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":4,"className":"news-sec-heading","style":{"typography":{"textTransform":"uppercase","fontSize":"22px","fontStyle":"normal","fontWeight":"600","letterSpacing":"4px"},"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"0rem"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background"} -->
<h4 class="wp-block-heading has-text-align-center news-sec-heading has-background-color has-text-color has-link-color" style="margin-top:var(--wp--preset--spacing--40);margin-bottom:0rem;font-size:22px;font-style:normal;font-weight:600;letter-spacing:4px;text-transform:uppercase"><?php echo esc_html__('blog over tips', 'escape-room-game'); ?></h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontSize":"15px","lineHeight":1.4},"spacing":{"margin":{"top":"12px"}}},"textColor":"background"} -->
<p class="has-text-align-center has-background-color has-text-color has-link-color" style="margin-top:12px;font-size:15px;line-height:1.4"><?php echo esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nisi elit, consequat pharetra elementum nec, eleifend non turpis.', 'escape-room-game'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"25%"} -->
<div class="wp-block-column" style="flex-basis:25%"></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:query {"queryId":11,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[],"format":[]},"metadata":{"categories":["posts"],"patternName":"core/query-standard-posts","name":"Standard"}} -->
<div class="wp-block-query"><!-- wp:post-template {"className":"news-box wow fadeInUp","layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"className":"news-img","style":{"dimensions":{"minHeight":"230px"},"border":{"radius":"0px"},"spacing":{"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"}},"color":{"background":"#8e8e8e"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group news-img has-background" style="border-radius:0px;background-color:#8e8e8e;min-height:230px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:post-featured-image {"isLink":true,"height":"230px","align":"wide","style":{"color":[],"border":{"radius":"0px"}}} /--></div>
<!-- /wp:group -->

<!-- wp:post-title {"level":5,"isLink":true,"className":"news-box-title","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20","top":"var:preset|spacing|30"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontStyle":"normal","fontWeight":"500","fontSize":"20px"}},"textColor":"background"} /-->

<!-- wp:post-excerpt {"excerptLength":15,"className":"news-box-desc","style":{"typography":{"fontSize":"15px","lineHeight":1.4},"spacing":{"margin":{"top":"0px","bottom":"5px"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background"} /-->

<!-- wp:group {"className":"news-meta","fontFamily":"inter","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group news-meta has-inter-font-family"><!-- wp:post-author-name {"style":{"typography":{"textTransform":"capitalize","lineHeight":"1.2","fontStyle":"normal","fontWeight":"600","fontSize":"15px"},"spacing":{"padding":{"left":"var:preset|spacing|50","top":"3px"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background"} /-->

<!-- wp:post-date {"style":{"layout":{"selfStretch":"fit","flexSize":null},"spacing":{"padding":{"left":"var:preset|spacing|50","top":"3px"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontStyle":"normal","fontWeight":"600","fontSize":"15px"}},"textColor":"background"} /-->

<!-- wp:comments {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background"} -->
<div class="wp-block-comments has-background-color has-text-color has-link-color"><!-- wp:comments-title {"showPostTitle":false,"level":6,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","fontSize":"15px","textTransform":"capitalize"},"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"left":"var:preset|spacing|50","top":"3px"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background"} /--></div>
<!-- /wp:comments --></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query -->

<!-- wp:spacer {"height":"65px","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:65px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->