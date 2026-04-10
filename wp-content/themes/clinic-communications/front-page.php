<?php
/**
 * The template for displaying the front page
 *
 * @package Clinic_Communications
 */

get_header();

// ACF Fields
$banner_title    = get_field( 'banner_title' );
$banner_subtitle = get_field( 'banner_subtitle' );
$banner_image    = get_field( 'banner_image' );
$banner_cta_text = get_field( 'banner_cta_text' );
$banner_cta_link = get_field( 'banner_cta_link' );

$dm_top_heading    = get_field( 'dm_top_heading' );
$dm_gallery        = get_field( 'dm_gallery' );
$dm_bottom_heading = get_field( 'dm_bottom_heading' );

$team_image        = get_field( 'team_image' );
$team_heading      = get_field( 'team_heading' );
$team_sub_heading  = get_field( 'team_sub_heading' );
$team_description  = get_field( 'team_description' );
$team_button_text  = get_field( 'team_button_text' );
$team_button_link  = get_field( 'team_button_link' );

$services_heading    = get_field( 'services_heading' );
$services_main_image = get_field( 'services_main_image' );
$service_feature_1   = get_field( 'service_feature_1' );
$service_feature_2   = get_field( 'service_feature_2' );
$service_feature_3   = get_field( 'service_feature_3' );

$explore_our_services_title   = get_field( 'explore_our_services_title' );
$explore_our_services_url   = get_field( 'explore_our_services_url' );

$approach_heading     = get_field( 'approach_heading' );
$approach_description = get_field( 'approach_description' );
$approach_items       = get_field( 'approach_items' );

$next_level_image = get_field( 'next_level_image' );
$next_level_title = get_field( 'next_level_title' );

// Fallbacks
if ( ! $banner_title ) {
	$banner_title = "You're <span class=\"font-style-italic\">passionate</span> about your client's wellbeing, and we're dedicated to making sure they can <span class=\"font-style-italic\">find</span> you.";
}
if ( ! $banner_image ) {
	$banner_image = get_template_directory_uri() . '/assets/images/home-banner-image.jpg';
}
if ( ! $banner_cta_text ) {
	$banner_cta_text = 'BUILD AUTHORITY';
}
if ( ! $banner_cta_link ) {
	$banner_cta_link = 'https://calendly.com/maddie-cliniccommunications/discovery';
}

if ( ! $dm_top_heading ) {
	$dm_top_heading = 'Digital marketing for allied health clinics<br>ready to <span class="font-style-italic">stop</span> DIY-ing and <span class="font-style-italic">start</span> growing';
}
if ( ! $dm_bottom_heading ) {
	$dm_bottom_heading = 'We bring together <span class="font-style-italic">health promotion</span> and<br><span class="font-style-italic">social media marketing</span> to make it easier for<br>your clinic to share content that <span class="font-style-italic">matters</span>.';
}

if ( ! $team_image ) {
	$team_image = get_template_directory_uri() . '/assets/images/meet-team-image.jpg';
}
if ( ! $team_heading ) {
	$team_heading = 'Meet your <span class="font-style-italic">marketing team</span>';
}
if ( ! $team_sub_heading ) {
	$team_sub_heading = 'We are Clinic Communications!';
}
if ( ! $team_description ) {
	$team_description = 'We\'re a team of coordinators, social media managers and paid ads specialists who love helping your clinic find its voice online. You focus on what you do best — <span class="font-style-italic">helping people</span> — and we\'ll take care of the rest, making sure your online presence grows with clarity.';
}
if ( ! $team_button_text ) {
	$team_button_text = 'ABOUT US';
}
if ( ! $team_button_link ) {
	$team_button_link = '#';
}

if ( ! $services_main_image ) {
	$services_main_image = get_template_directory_uri() . '/assets/images/services-overview-image.jpg';
}

if ( ! $next_level_image ) {
	$next_level_image = get_template_directory_uri() . '/assets/images/ready-to-next-level-image.jpg';
}
?>

<main>
  <!-- Hero Section -->
  <section class="banner-section" style="background-image: url('<?php echo esc_url( $banner_image ); ?>');">
    <div class="banner-overlay"></div>
    <div class="container">
      <div class="banner-content">
        <div class="banner-text-wrapper" data-aos="fade-up">
          <h1 class="banner-title"><?php echo $banner_title; ?></h1>
		  <?php if ( $banner_subtitle ) : ?>
            <p class="banner-sub-title"><?php echo esc_html( $banner_subtitle ); ?></p>
		  <?php endif; ?>
        </div>
        <div class="banner-btn-wrapper" data-aos="fade-up" data-aos-delay="200">
          <a href="<?php echo esc_url( $banner_cta_link ); ?>" class="button-primary">
			<?php echo esc_html( $banner_cta_text ); ?>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Digital Marketing Section -->
  <section class="digital-marketing-section section-space-tb">
    <div class="container">
      <div class="dm-top-text" data-aos="fade-in">
        <h2 class="dm-heading"><?php echo $dm_top_heading; ?></h2>
      </div>

      <div class="dm-gallery-wrapper">
        <div class="row align-items-center justify-content-center">
		  <?php if ( $dm_gallery ) :
			$gallery_chunks = array_chunk( $dm_gallery, ceil( count( $dm_gallery ) / 2 ) );
			foreach ( $gallery_chunks as $chunk ) : ?>
            <div class="col-md-3" data-aos="fade-in">
              <div class="dm-gallery-img">
				<?php foreach ( $chunk as $item ) : ?>
                  <img src="<?php echo esc_url( $item['dm_image'] ); ?>" alt="Marketing Gallery Image" class="mb-3">
				<?php endforeach; ?>
              </div>
            </div>
			<?php endforeach;
		  else : ?>
            <div class="col-md-3" data-aos="fade-in">
              <div class="dm-gallery-img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/digital-marketing-gallery-img-left.png" width="274" height="456" alt="Marketing Gallery Left">
              </div>
            </div>
            <div class="col-md-3" data-aos="fade-in">
              <div class="dm-gallery-img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/digital-marketing-gallery-img-right.png" width="274" height="456" alt="Marketing Gallery Right">
              </div>
            </div>
		  <?php endif; ?>
        </div>
      </div>

      <div class="dm-bottom-text" data-aos="fade-in">
        <h2 class="dm-heading"><?php echo $dm_bottom_heading; ?></h2>
      </div>
    </div>
  </section>

  <!-- Meet Team Section -->
  <section class="meet-team-section">
    <div class="container-fluid p-0">
      <div class="row g-0">
        <div class="col-lg-5 beige-bg">
          <div class="team-image-wrapper" data-aos="fade-right">
            <img src="<?php echo esc_url( $team_image ); ?>" class="team-img" alt="<?php echo esc_attr( strip_tags( $team_heading ) ); ?>" width="544" height="679">
          </div>
          <div class="rotating-text-wrapper" data-aos="zoom-in" data-aos-delay="500">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/are-you-ready-text.svg" class="rotating-text" alt="Are you ready?">
          </div>
        </div>
        <div class="col-lg-7 white-bg">
          <div class="team-content-wrapper" data-aos="fade-left">
            <?php if ( $team_heading ) : ?>
              <h2 class="team-heading"><?php echo $team_heading; ?></h2>
            <?php endif; ?>
            <?php if ( $team_sub_heading ) : ?>
              <h3 class="team-sub-heading"><?php echo esc_html( $team_sub_heading ); ?></h3>
            <?php endif; ?>
            <?php if ( $team_description ) : ?>
              <div class="team-description"><?php echo $team_description; ?></div>
            <?php endif; ?>
            <?php if ( $team_button_text && $team_button_link ) : ?>
              <div class="team-btn-wrapper">
                <a href="<?php echo esc_url( $team_button_link ); ?>" class="button-secondary"><?php echo esc_html( $team_button_text ); ?></a>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Overview Section -->
  <section class="services-overview-section section-space-tb">
    <div class="container text-center">
	  <?php if ( $services_heading ) : ?>
        <h2 class="services-heading" data-aos="fade-up"><?php echo wp_kses_post($services_heading); ?></h2>
	  <?php endif; ?>
      <div class="services-middle-wrapper" data-aos="fade-up">
        <div class="services-main-image">
          <img src="<?php echo esc_url( $services_main_image ); ?>" alt="Services Overview">
        </div>
        <div class="services-features-row text-center" data-aos="fade-up">
        <?php if ( $service_feature_1 ) : ?>
              <div class="feature-item">
                <h3 class="feature-title"><?php echo wp_kses_post( $service_feature_1 ); ?></h3>
              </div>
        <?php endif; ?>
        <?php if ( $service_feature_2 ) : ?>
              <div class="feature-item">
                <h3 class="feature-title"><?php echo wp_kses_post( $service_feature_2 ); ?></h3>
              </div>
        <?php endif; ?>
        <?php if ( $service_feature_3 ) : ?>
              <div class="feature-item">
                <h3 class="feature-title"><?php echo wp_kses_post( $service_feature_3 ); ?></h3>
              </div>
        <?php endif; ?>
        </div>
      </div>
      <div class="services-bottom text-center" data-aos="fade-up" data-aos-delay="400">
          <a href="<?php echo esc_url( $explore_our_services_url ); ?>" class="button-secondary"><?php echo wp_kses_post( $explore_our_services_title ); ?></a>
        </div>
    </div>
  </section>

  <!-- Next Level Section -->
  <section class="next-level-section">
    <div class="next-level-parallax" style="background-image: url('<?php echo esc_url( $next_level_image ); ?>');">
      <div class="next-level-content text-center" data-aos="fade-up">
		<?php if ( $next_level_title ) : ?>
          <h2 class="next-level-title"><?php echo wp_kses_post( $next_level_title ); ?></h2>
		<?php endif; ?>
        <div class="down-arrow">
          <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="30" cy="30" r="29.5" stroke="white"/>
            <path d="M30 42L30 18M30 42L22 34M30 42L38 34" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
      </div>
    </div>
  </section>

  <!-- Approach Section -->
  <section class="approach-section section-space-tb">
    <div class="container text-center">
	  <?php if ( $approach_heading ) : ?>
        <h2 class="approach-heading" data-aos="fade-up"><?php echo wp_kses_post( $approach_heading ); ?></h2>
	  <?php endif; ?>
	  <?php if ( $approach_description ) : ?>
        <p class="approach-description mx-auto" data-aos="fade-up"><?php echo wp_kses_post( $approach_description ); ?></p>
	  <?php endif; ?>
      <div class="approach-grid">
		<?php if ( $approach_items ) : ?>
		  <?php foreach ( $approach_items as $item ) : ?>
            <div class="approach-item-wrap" data-aos="fade-up">
              <div class="approach-item">
                <div class="approach-img-wrap">
                  <img src="<?php echo esc_url( $item['item_image'] ); ?>" alt="<?php echo esc_attr( $item['item_title'] ); ?>">
                </div>
                <h4 class="approach-item-title"><?php echo wp_kses_post( $item['item_title'] ); ?></h4>
              </div>
            </div>
		  <?php endforeach; ?>
		<?php else : ?>
          <!-- Static Fallback Items -->
          <div class="approach-item-wrap" data-aos="fade-up">
            <div class="approach-item">
              <div class="approach-img-wrap">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/approach-image-one.jpg" alt="Approach 1">
              </div>
              <h4 class="approach-item-title">STRATEGY</h4>
            </div>
          </div>
          <div class="approach-item-wrap" data-aos="fade-up">
            <div class="approach-item">
              <div class="approach-img-wrap">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/approach-image-two.jpg" alt="Approach 2">
              </div>
              <h4 class="approach-item-title">CREATION</h4>
            </div>
          </div>
          <div class="approach-item-wrap" data-aos="fade-up">
            <div class="approach-item">
              <div class="approach-img-wrap">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/approach-image-three.jpg" alt="Approach 3">
              </div>
              <h4 class="approach-item-title">GROWTH</h4>
            </div>
          </div>
		<?php endif; ?>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
