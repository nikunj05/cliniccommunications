<?php
/**
 * Template Name: Social Media Strategy
 *
 * @package Clinic_Communications
 */

get_header();

// Banner Fields
$banner_title = get_field( 'strategy_banner_title' );
$featured_img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
if ( ! $featured_img_url ) {
	$featured_img_url = get_template_directory_uri() . '/assets/images/our-service-bg-image.jpg';
}

// Blueprint Section
$blueprint_text = get_field( 'strategy_blueprint_text' );

// Strategy Intro Fields
$intro_image = get_field( 'strategy_intro_image' );
$intro_title = get_field( 'strategy_intro_title' );
$intro_subtitle = get_field( 'strategy_intro_subtitle' );
$intro_description = get_field( 'strategy_intro_description' );

// Prerequisite Section
$prerequisite_title = get_field( 'strategy_prerequisite_title' );
$prerequisite_description = get_field( 'strategy_prerequisite_description' );

// Testimonials
$strategy_testimonials = get_field( 'strategy_testimonials' );

// Process Section
$process_title = get_field( 'strategy_process_title' );
$process_steps = get_field( 'strategy_process_steps' );

// CTA Section
$cta_bg_image = get_field( 'strategy_cta_bg_image' );
$cta_title = get_field( 'strategy_cta_title' );
$cta_subtitle = get_field( 'strategy_cta_subtitle' );
$cta_button_text = get_field( 'strategy_cta_button_text' );
$cta_button_link = get_field( 'strategy_cta_button_link' );
?>

<main>
    <!-- Common Banner Section -->
    <section class="common-banner-section">
      <div class="common-banner-bg">
        <img src="<?php echo esc_url( $featured_img_url ); ?>" alt="<?php the_title_attribute(); ?>" class="banner-img">
        <div class="container">
          <div class="common-banner-content text-center">
            <h1 class="common-banner-title" data-aos="fade-up">
              <span class="font-style-italic"><?php echo wp_kses_post( $banner_title ); ?></span>
            </h1>
          </div>
        </div>
      </div>
    </section>

    <!-- blueprint behind Section -->
    <section class="blueprint-behind-section section-space-tb">
      <div class="container">
        <div class="blueprint-behind-content text-center" data-aos="fade-up">
          <h2 class="blueprint-title">
            <?php echo wp_kses_post( $blueprint_text ); ?>
          </h2>
        </div>
      </div>
    </section>

    <!-- strategy intro Section -->
    <section class="strategy-intro-section section-space-tb">
      <div class="container">
        <div class="strategy-intro-row" data-aos="fade-up">
          <div class="strategy-intro-image">
            <img src="<?php echo esc_url( $intro_image ); ?>" alt="Strategy Intro" width="529" height="640">
          </div>
          <div class="strategy-intro-content">
            <h2 class="si-title">
                <?php echo wp_kses_post( $intro_title ); ?>
            </h2>
            <?php if ( $intro_subtitle ) : ?>
                <h3 class="si-subtitle"><?php echo wp_kses_post( $intro_subtitle ); ?></h3>
            <?php endif; ?>
            <div class="si-description">
                <?php echo wp_kses_post( $intro_description ); ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- strategy prerequisite Section -->
    <section class="strategy-prerequisite-section section-space-tb">
      <div class="container">
        <div class="strategy-prerequisite-content text-center" data-aos="fade-up">
          <h2 class="sp-title">
            <?php echo wp_kses_post( $prerequisite_title ); ?>
          </h2>
          <div class="sp-description">
            <?php echo wp_kses_post( $prerequisite_description ); ?>
          </div>
        </div>
      </div>
    </section>

    <!-- strategy testimonials Section -->
    <?php if ( $strategy_testimonials ) : ?>
    <section class="strategy-testimonials-section section-space-tb">
      <div class="container">
        <div class="testimonials-wrapper">
          <?php foreach ( $strategy_testimonials as $testimonial ) : ?>
            <div class="testimonial-item text-center" data-aos="fade-up">
              <div class="testimonial-stars">
                <?php 
                $stars = isset( $testimonial['star_count'] ) ? (int) $testimonial['star_count'] : 5;
                for ( $i = 0; $i < $stars; $i++ ) : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/star-rate-white-icon.svg" alt="star" width="62" height="62">
                <?php endfor; ?>
              </div>
              <h2 class="testimonial-headline">
                <?php echo wp_kses_post( $testimonial['testimonial_headline'] ); ?>
              </h2>
              <div class="testimonial-body">
                <?php echo wp_kses_post( $testimonial['testimonial_body'] ); ?>
              </div>
              <p class="testimonial-author"><?php echo esc_html( $testimonial['testimonial_author'] ); ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <!-- strategy process Section -->
    <section class="strategy-process-section section-space-tb">
      <div class="container">
        <?php if ( $process_title ) : ?>
        <div class="strategy-process-header text-center" data-aos="fade-up">
          <h2 class="process-title"><?php echo wp_kses_post( $process_title ); ?></h2>
        </div>
        <?php endif; ?>
        
        <?php if ( $process_steps ) : ?>
        <div class="strategy-process-row">
          <?php foreach ( $process_steps as $index => $step ) : ?>
            <div class="process-item text-center" data-aos="fade-up" data-aos-delay="<?php echo ( $index + 1 ) * 100; ?>">
              <div class="process-icon">
                <img src="<?php echo esc_url( $step['step_icon'] ); ?>" alt="<?php echo esc_attr( $step['step_title'] ); ?>" width="112" height="112">
              </div>
              <h4 class="process-step-title"><?php echo esc_html( $step['step_title'] ); ?></h4>
              <p class="process-step-desc">
                  <?php echo esc_html( $step['step_description'] ); ?>
              </p>
            </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>
    </section>

    <!-- social media strategy Reviews Slider Section -->
    <section class="reviews-slider-section section-space-tb">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div> <script defer async src='https://cdn.trustindex.io/loader.js?2d151e6461b980211376abc8d68'></script> </div>
          </div>
        </div>
      </div>
    </section>

    <!-- social media strategy Social CTA Section -->
    <section class="social-cta-section">
      <div class="social-cta-parallax" style="background-image: url('<?php echo esc_url( $cta_bg_image ?: get_template_directory_uri() . '/assets/images/book-demo-bg-image.jpg' ); ?>');">
        <div class="container">
          <div class="social-cta-content text-center">
            <h2 class="social-cta-title">
              <?php echo wp_kses_post( $cta_title ); ?>
            </h2>
            <div class="cta-subtitle">
              <?php echo wp_kses_post( $cta_subtitle ); ?>
            </div>
            <div class="cta-btn-wrapper">
              <a href="<?php echo esc_url( $cta_button_link ?: '#' ); ?>" class="button-primary"><?php echo esc_html( $cta_button_text ?: 'BOOK NOW' ); ?></a>
            </div>
          </div>
        </div>
      </div>
    </section>
</main>

<?php
get_footer();
?>
