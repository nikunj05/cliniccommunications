<?php
/**
 * Template Name: Social Media Marketing
 *
 * @package Clinic_Communications
 */

get_header();

// Banner Fields
$banner_title = get_field( 'marketing_banner_title' );
$banner_subtitle = get_field( 'marketing_banner_subtitle' );
$featured_img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
if ( ! $featured_img_url ) {
	$featured_img_url = get_template_directory_uri() . '/assets/images/our-service-bg-image.jpg';
}

// Management Overview Fields
$mgmt_title = get_field( 'marketing_mgmt_title' );
$mgmt_image = get_field( 'marketing_mgmt_image' );
$mgmt_content_top = get_field( 'marketing_mgmt_content_top' );
$mgmt_content_middle = get_field( 'marketing_mgmt_content_middle' );
$mgmt_list = get_field( 'marketing_mgmt_list' );

// Before vs After Fields
$bva_title = get_field( 'marketing_bva_title' );
$bva_image = get_field( 'marketing_bva_image' );

// Health Mission Fields
$mission_title = get_field( 'marketing_mission_title' );
$mission_description = get_field( 'marketing_mission_description' );
$mission_image = get_field( 'marketing_mission_image' );

// Strategy Highlights
$highlights = get_field( 'marketing_highlights' );

// CTA Section
$cta_bg_image = get_field( 'marketing_cta_bg' ) ?: get_theme_mod( 'clinic_communications_global_cta_bg' );
$cta_title = get_field( 'marketing_cta_title' ) ?: get_theme_mod( 'clinic_communications_global_cta_title' );
$cta_desc = get_field( 'marketing_cta_desc' ) ?: get_theme_mod( 'clinic_communications_global_cta_subtitle' );
$cta_btn_text = get_field( 'marketing_cta_btn_text' ) ?: get_theme_mod( 'clinic_communications_global_cta_btn_text' );
$cta_btn_link = get_field( 'marketing_cta_btn_link' ) ?: get_theme_mod( 'clinic_communications_global_cta_btn_link' );

// Fallbacks
if ( ! $cta_bg_image ) {
	$cta_bg_image = get_template_directory_uri() . '/assets/images/book-demo-bg-image.jpg';
}
if ( ! $cta_title ) {
	$cta_title = 'You’re here for your <span class="font-style-italic">clients</span>.<br> We’re here for your <span class="font-style-italic">content</span>.';
}
if ( ! $cta_desc ) {
	$cta_desc = 'Let’s elevate your socials together. Book your complimentary 15-minute call.';
}
if ( ! $cta_btn_text ) {
	$cta_btn_text = 'BOOK NOW';
}
if ( ! $cta_btn_link ) {
	$cta_btn_link = '#';
}
?>

<main>
    <!-- Common Banner Section -->
    <section class="common-banner-section">
      <div class="common-banner-bg">
        <img src="<?php echo esc_url( $featured_img_url ); ?>" alt="<?php the_title_attribute(); ?>" class="banner-img">
        <div class="container">
          <div class="common-banner-content text-center">
            <?php if ( $banner_title ) : ?>
                <h1 data-aos="fade-up"> <?php echo wp_kses_post( $banner_title ); ?> </h1>
            <?php endif; ?>
            <?php if ( $banner_subtitle ) : ?>
                <h2 data-aos="fade-up" data-aos-delay="100"><?php echo wp_kses_post( $banner_subtitle ); ?></h2>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>

    <!-- Management Overview Section -->
    <section class="management-overview-section section-space-tb">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center" data-aos="fade-up">
            <h2>
              <?php echo wp_kses_post( $mgmt_title ); ?>
            </h2>
          </div>
        </div>
        <div class="align-items-center mo-content-row" data-aos="fade-up" data-aos-delay="200">
          <div class="management-img-col">
            <div class="management-image-wrapper">
              <img src="<?php echo esc_url( $mgmt_image ); ?>" alt="Social Media Management" width="500"
                height="505" class="management-img">
            </div>
          </div>
          <div class="management-text-col">
            <div class="management-text-content">
              <?php if ( $mgmt_content_top ) : ?>
                <h3><?php echo wp_kses_post( $mgmt_content_top ); ?></h3>
              <?php endif; ?>
              <?php if ( $mgmt_content_middle ) : ?>
                <p><?php echo wp_kses_post( $mgmt_content_middle ); ?></p>
              <?php endif; ?>
              <?php if ( $mgmt_list ) : ?>
              <ul class="management-list">
                <?php foreach ( $mgmt_list as $item ) : ?>
                    <li><?php echo wp_kses_post( $item['list_item'] ); ?></li>
                <?php endforeach; ?>
              </ul>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Social Media Mobile Section -->
    <section class="social-media-mobile-section section-space-tb">
      <div class="container">
        <div data-aos="fade-up">
          <h2>
            <?php echo wp_kses_post( $bva_title ); ?>
          </h2>
        </div>
        <div class="social-media-img-wrapper" data-aos="fade-up" data-aos-delay="200">
          <img src="<?php echo esc_url( $bva_image ); ?>" alt="Social Media mobile" width="614" height="542"
            class="social-media-img">
        </div>
      </div>
    </section>

    <!-- Health Mission Section -->
    <section class="health-mission-section section-space-tb">
      <div class="container">
        <div class="align-items-start health-mission-content-row" data-aos="fade-up" data-aos-delay="200">
          <div class="health-mission-text-col">
            <div class="health-mission-text-content">
              <h2><?php echo wp_kses_post( $mission_title ); ?></h2>
              <?php echo wp_kses_post( $mission_description ); ?>
            </div>
          </div>
          <div class="health-mission-img-col">
            <div class="health-mission-image-wrapper">
              <img src="<?php echo esc_url( $mission_image ); ?>" alt="health mission" width="500" height="505"
                class="health-mission-img">
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Strategy Highlights Section -->
    <?php if ( $highlights ) : ?>
    <section class="strategy-highlights-section section-space-tb">
      <div class="container">
        <?php foreach ( $highlights as $index => $highlight ) : ?>
            <div class="strategy-highlights-row <?php echo $highlight['reverse'] ? 'strategy-highlights-row-reverse' : ''; ?>" data-aos="fade-up">
              <div class="strategy-highlights-text-col">
                <div class="strategy-highlights-text-content">
                  <h2><?php echo wp_kses_post( $highlight['title'] ); ?></h2>
                  <?php echo wp_kses_post( $highlight['description'] ); ?>
                </div>
              </div>
              <div class="strategy-highlights-img-col">
                <div class="strategy-highlights-image-wrapper">
                  <img src="<?php echo esc_url( $highlight['image'] ); ?>" alt="<?php echo esc_attr( $highlight['title'] ); ?>"
                    class="strategy-highlights-img">
                </div>
              </div>
            </div>
        <?php endforeach; ?>
      </div>
    </section>
    <?php endif; ?>

    <!-- social media marketing Reviews Slider Section -->
    <section class="reviews-slider-section section-space-tb">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div>
              <script defer async src='https://cdn.trustindex.io/loader.js?2d151e6461b980211376abc8d68'></script>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- social media marketing Social CTA Section -->
    <section class="social-cta-section">
      <div class="social-cta-parallax">
        <img src="<?php echo esc_url( $cta_bg_image ); ?>" alt="social cta background image" class="social-cta-bg-img">
        <div class="container">
          <div class="social-cta-content text-center">
            <h2>
              <?php echo wp_kses_post( $cta_title ); ?>
            </h2>
            <p>
              <?php echo wp_kses_post( $cta_desc ); ?>
            </p>
            <div class="cta-btn-wrapper">
              <a href="<?php echo esc_url( $cta_btn_link ); ?>" class="button-primary"><?php echo esc_html( $cta_btn_text ); ?></a>
            </div>
          </div>
        </div>
      </div>
    </section>
</main>

<?php
get_footer();
?>
