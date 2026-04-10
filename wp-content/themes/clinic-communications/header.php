<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <!-- Vertical Floating Social Bar -->
  <?php
  $active_socials = clinic_communications_get_active_social_links();
  if ( ! empty( $active_socials ) ) : ?>
  <div class="fixed-social-bar">
	<?php foreach ( $active_socials as $id => $social ) :
		// Determine the icon source: either a custom URL or a default theme asset path
		$icon_src = $social['is_custom_sidebar'] ? $social['sidebar_icon'] : get_template_directory_uri() . '/assets/images/icon/' . $social['sidebar_icon'];
		
		if ( ! empty( $social['sidebar_icon'] ) ) : ?>
		<a href="<?php echo esc_url( $social['url'] ); ?>" class="fixed-social-link" target="_blank">
			<img src="<?php echo esc_url( $icon_src ); ?>" width="21" height="21" alt="<?php echo esc_attr( $social['label'] ); ?>">
		</a>
		<?php endif;
	endforeach; ?>
  </div>
  <?php endif; ?>

  <!-- Interactive Google Review Widget -->
  <div class="google-review-widget" id="googleReviewWidget">
    <div class="review-small-box" id="openReviewPanel">
      <div class="rsb-top">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/google-round-icon.svg" class="google-review-icon" alt="Google" width="28">
        <span>Google</span>
      </div>
      <div class="rsb-middle">
        <span class="rating-value">5.0</span>
        <div class="star-group">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/star-rate-icon.svg" alt="star" width="24" height="24">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/star-rate-icon.svg" alt="star" width="24" height="24">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/star-rate-icon.svg" alt="star" width="24" height="24">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/star-rate-icon.svg" alt="star" width="24" height="24">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/star-rate-icon.svg" alt="star" width="24" height="24">
        </div>
      </div>
      <div class="rsb-bottom">Based on 2 reviews</div>
    </div>

    <div class="review-detailed-panel" id="reviewDetailedPanel">
      <div class="rdp-header">
        <div class="rdp-header-content">
          <div class="rdp-logo-wrap">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/google-round-icon.svg" alt="Google" width="42" height="42">
          </div>
          <div class="rdp-header-text">
            <div class="rdp-stars-row">
              <span class="rdp-val">5.0</span>
              <div class="rdp-stars">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/star-rate-icon.svg" alt="star" width="14">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/star-rate-icon.svg" alt="star" width="14">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/star-rate-icon.svg" alt="star" width="14">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/star-rate-icon.svg" alt="star" width="14">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/star-rate-icon.svg" alt="star" width="14">
              </div>
            </div>
            <div class="rdp-count">2 REVIEWS</div>
          </div>
        </div>
        <button class="rdp-collapse-btn" id="closeReviewPanel">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="6 9 12 15 18 9"></polyline>
          </svg>
        </button>
      </div>

      <div class="rdp-body-scroll">
        <div class="rdp-review-item">
          <div class="rdp-item-header">
            <div class="rdp-avatar avatar-dk">DK</div>
            <div class="rdp-user-meta">
              <div class="rdp-name">Demi Krstevski</div>
              <div class="rdp-stars-date">
                <div class="rdp-item-stars">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/star-rate-icon.svg" alt="star" width="12">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/star-rate-icon.svg" alt="star" width="12">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/star-rate-icon.svg" alt="star" width="12">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/star-rate-icon.svg" alt="star" width="12">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/star-rate-icon.svg" alt="star" width="12">
                </div>
                <span class="rdp-date">2025-04-16</span>
              </div>
            </div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/google-round-icon.svg" alt="Google" class="rdp-item-google" width="18">
          </div>
          <div class="rdp-comment">
            <div class="comment-text-trunc">
              We chose Clinic Communications to kickstart and grow the social media side of our business and they did
              not disappoint!! Maddie and Bianca were so lovely and patient...
              <span class="full-comment-text d-none">We chose Clinic Communications to kickstart and
                grow the social media side of our business and they did not disappoint!! Maddie and Bianca were so
                lovely and patient through the whole process. Highly recommend!</span>
            </div>
            <a href="javascript:void(0)" class="comment-toggle">Show More</a>
          </div>
        </div>

        <div class="rdp-review-item">
          <div class="rdp-item-header">
            <div class="rdp-avatar avatar-cfy">CFY</div>
            <div class="rdp-user-meta">
              <div class="rdp-name">Care For Your Mind</div>
              <div class="rdp-stars-date">
                <div class="rdp-item-stars">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/star-rate-icon.svg" alt="star" width="12">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/star-rate-icon.svg" alt="star" width="12">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/star-rate-icon.svg" alt="star" width="12">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/star-rate-icon.svg" alt="star" width="12">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/star-rate-icon.svg" alt="star" width="12">
                </div>
                <span class="rdp-date">2025-03-14</span>
              </div>
            </div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/google-round-icon.svg" alt="Google" class="rdp-item-google" width="18">
          </div>
          <div class="rdp-comment">
            <div class="comment-text-trunc">
              The team at Clinic Communications have a deep and relational understanding of the allied health sector,
              and the needs of clinics to share content that matters...
              <span class="full-comment-text d-none">The team at Clinic Communications have a deep and
                relational understanding of the allied health sector, and the needs of clinics to share content that
                matters. Their expertise in social media marketing is second to none.</span>
            </div>
            <a href="javascript:void(0)" class="comment-toggle">Show More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Header Start -->
  <header class="header">
    <div class="container">
      <div class="header-inner">
        <nav class="navbar navbar-expand-lg justify-content-between align-items-center py-0">
          <?php
          $custom_logo_id = get_theme_mod( 'custom_logo' );
          $logo_url       = wp_get_attachment_image_src( $custom_logo_id, 'full' );
          $logo_src       = has_custom_logo() ? $logo_url[0] : get_template_directory_uri() . '/assets/images/clinic-logo.png';
          ?>
          <a class="navbar-brand p-0 m-0" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img src="<?php echo esc_url( $logo_src ); ?>" alt="<?php bloginfo( 'name' ); ?>" width="190" height="76" />
          </a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/hamburger-menu-icon.svg" class="hamburger-icon" alt="menu">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/close-btn-icon.svg" class="close-icon" alt="close">
          </button>

          <div class="collapse navbar-collapse navigation-barmenu" id="navbarSupportedContent">
            <?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'container'      => false,
						'items_wrap'     => '<ul class="navbar-nav mx-auto">%3$s</ul>',
						'fallback_cb'    => '__return_false',
						'walker'         => new Clinic_Communications_Walker(),
					)
				);
			?>
          </div>

          <div class="header-social-links d-flex align-items-center">
			<?php foreach ( $active_socials as $id => $social ) : ?>
            <a href="<?php echo esc_url( $social['url'] ); ?>" class="social-link" target="_blank">
              <?php echo $social['icon']; ?>
            </a>
			<?php endforeach; ?>
          </div>
        </nav>
      </div>
    </div>
  </header>
  <!-- Header End -->
        </nav>
      </div>
    </div>
  </header>
  <!-- Header End -->
</body>
</html>
