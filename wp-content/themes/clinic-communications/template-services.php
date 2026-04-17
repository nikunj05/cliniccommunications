<?php
/**
 * Template Name: Services
 *
 * @package Clinic_Communications
 */

get_header();

// Banner Fields
$banner_title = get_field( 'services_banner_title' );
$featured_img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
if ( ! $featured_img_url ) {
	$featured_img_url = get_template_directory_uri() . '/assets/images/our-service-bg-image.jpg';
}

// Intro Fields
$intro_heading = get_field( 'services_intro_heading' );
$intro_description = get_field( 'services_intro_description' );

// What We Do Best Fields
$best_heading = get_field( 'services_best_heading' );
$best_description = get_field( 'services_best_description' );

// Services List
$services_list = get_field( 'services_list' );

// How We Work
$how_we_work_items = get_field( 'how_we_work_items' );

// Reviews
$reviews_excellent_text = get_field( 'reviews_excellent_text' );
$reviews_count_text = get_field( 'reviews_count_text' );
$reviews_link = get_field( 'reviews_link' );
$services_reviews = get_field( 'services_reviews' );
?>

<main>
    <!-- Common Banner Section -->
    <section class="common-banner-section">
      <div class="common-banner-bg">
        <img src="<?php echo esc_url( $featured_img_url ); ?>" alt="<?php the_title_attribute(); ?>" class="banner-img">
        <div class="container">
          <div class="common-banner-content text-center">
            <h1 class="common-banner-title" data-aos="fade-up">
              <span class="font-style-italic"><?php echo $banner_title; ?></span>
            </h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Services Intro Section -->
    <section class="services-intro-section section-space-tb">
      <div class="container">
        <div class="services-intro-content text-center" data-aos="fade-up">
          <h2 class="si-title">
            <?php echo wp_kses_post( $intro_heading ); ?>
          </h2>
          <div class="si-desc-wrapper">
		  	<?php echo wp_kses_post( $intro_description ); ?>
		  </div>
        </div>
      </div>
    </section>

    <!-- what we do best Section -->
    <section class="services-intro-section what-we-do-best-section section-space-tb">
      <div class="container">
        <div class="services-intro-content text-center" data-aos="fade-up">
          <h2 class="si-title">
            <?php echo wp_kses_post( $best_heading ); ?>
          </h2>
          <div class="si-desc-wrapper">
		  	<?php echo wp_kses_post( $best_description ); ?>
		  </div>
        </div>
      </div>
    </section>

    <!-- Services List Section -->
    <section class="services-list-section section-space-tb">
      <div class="container">
		<?php if ( $services_list ) : ?>
			<?php foreach ( $services_list as $index => $service ) : 
				$row_class = ( $index % 2 != 0 ) ? 'row-reverse' : '';
				?>
				<div class="service-row <?php echo esc_attr( $row_class ); ?>" data-aos="fade-up">
					<div class="service-content">
						<h3 class="service-title"><?php echo esc_html( $service['service_title'] ); ?></h3>
						<div class="service-description">
							<?php echo wp_kses_post( $service['service_description'] ); ?>
						</div>
						<?php if ( $service['service_price'] ) : ?>
							<p class="service-price"><?php echo esc_html( $service['service_price'] ); ?></p>
						<?php endif; ?>
						<?php if ( $service['service_button_text'] ) : ?>
						<div class="service-btn">
							<a href="<?php echo esc_url( $service['service_button_link'] ?: '#' ); ?>" class="button-black"><?php echo esc_html( $service['service_button_text'] ); ?></a>
						</div>
						<?php endif; ?>
					</div>
					<div class="service-image">
						<img src="<?php echo esc_url( $service['service_image'] ); ?>" alt="<?php echo esc_attr( $service['service_title'] ); ?>" width="394" height="423">
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
      </div>
    </section>

    <!-- how we work Section -->
    <section class="how-we-work-section section-space-tb">
      <div class="container">
        <div class="how-we-work-inner">
          <div class="how-we-work-flex-row">
			<?php if ( $how_we_work_items ) : ?>
				<?php foreach ( $how_we_work_items as $index => $item ) : ?>
					<div class="how-we-work-flex-col" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
						<div class="how-we-work-item text-center">
							<div class="how-we-work-icon">
								<img src="<?php echo esc_url( $item['item_icon'] ); ?>" alt="<?php echo esc_attr( $item['item_title'] ); ?>" width="61" height="61">
							</div>
							<h4><?php echo esc_html( $item['item_title'] ); ?></h4>
							<p>
								<?php echo esc_html( $item['item_description'] ); ?>
							</p>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
          </div>
        </div>
      </div>
    </section>

    <!-- services Reviews Slider Section -->
    <section class="reviews-slider-section section-space-tb">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div> <script defer async src='https://cdn.trustindex.io/loader.js?2d151e6461b980211376abc8d68'></script> </div>
          </div>
        </div>
      </div>
    </section>

    <!-- services Social CTA Section -->
    <?php
    $cta_bg_image = get_field('services_cta_bg_image');
    $cta_title = get_field('services_cta_title');
    $cta_subtitle = get_field('services_cta_subtitle');
    $cta_button_text = get_field('services_cta_button_text');
    $cta_button_link = get_field('services_cta_button_link');
    ?>
    <section class="social-cta-section">
      <div class="social-cta-parallax" style="background-image: url('<?php echo esc_url($cta_bg_image); ?>');">
        <div class="container">
          <div class="social-cta-content text-center">
            <h2 class="social-cta-title">
              <?php echo wp_kses_post($cta_title); ?>
            </h2>
            <p class="cta-subtitle">
              <?php echo wp_kses_post($cta_subtitle); ?>
            </p>
            <div class="cta-btn-wrapper">
              <a href="<?php echo esc_url($cta_button_link ?: '#'); ?>" class="button-primary"><?php echo esc_html($cta_button_text); ?></a>
            </div>
          </div>
        </div>
      </div>
    </section>
</main>

<?php
get_footer();
?>
