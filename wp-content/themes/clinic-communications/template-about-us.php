<?php
/**
 * Template Name: About Us
 *
 * @package Clinic_Communications
 */

get_header();

// Get the featured image URL
$featured_img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
if ( ! $featured_img_url ) {
	$featured_img_url = get_template_directory_uri() . '/assets/images/about-us-banner-image.jpg';
}
?>

<main>
	<!-- Common Banner Section -->
	<section class="common-banner-section">
		<div class="common-banner-bg">
			<img src="<?php echo esc_url( $featured_img_url ); ?>" alt="<?php the_title_attribute(); ?>" class="banner-img">
			<div class="container">
				<div class="common-banner-content text-center">
					<?php
					$title = get_the_title();
					$words = explode( ' ', $title );
					if ( ! empty( $words ) ) {
						$words[0] = '<span class="font-style-italic">' . $words[0] . '</span>';
						$title    = implode( ' ', $words );
					}
					?>
					<h1 class="common-banner-title" data-aos="fade-up"><?php echo $title; ?></h1>
				</div>
			</div>
		</div>
	</section>

	<!-- Digital Support Section -->
	<?php
	$support_heading = get_field('about_support_heading');
	$support_description = get_field('about_support_description');
	$info_image          = get_field( 'about_info_image' );
	$info_title          = get_field( 'about_info_title' );
	$info_text           = get_field( 'about_info_text' );
	$info_button_text    = get_field( 'about_info_button_text' );
	$info_button_link    = get_field( 'about_info_button_link' );

	if ( ! $support_heading ) {
		$support_heading = 'A little <span class="font-style-italic">extra</span> to help your <br> clinic\'s <span class="font-style-italic">digital marketing</span>';
	}
	if ( ! $support_description ) {
		$support_description = 'We work with allied health clinics who want to show up online without <br> it feeling like a full-time job. We bring clarity, consistency and a bit of <br> strategy to your content and paid socials (if you want)!';
	}
	if ( ! $info_image ) {
		$info_image = get_template_directory_uri() . '/assets/images/digital-support-image.jpg';
	}
	if ( ! $info_title ) {
		$info_title = 'We get health promotion and we get content — so your socials <span class="font-style-italic">actually</span> reflect your expertise.';
	}
	if ( ! $info_text ) {
		$info_text = "We're Clinic Communications, a full-service digital marketing team for allied health clinics. We know how important it is to share clear, compliant content that helps people make informed health choices. We take care of strategy, content, and paid ads so you can focus on doing what you do best!";
	}
	if ( ! $info_button_text ) {
		$info_button_text = 'BOOK NOW';
	}
	if ( ! $info_button_link ) {
		$info_button_link = '#';
	}
	?>
	<section class="digital-support-section section-space-tb">
		<div class="container">
			<div class="digital-support-info text-center" data-aos="fade-up">
				<h2 class="ds-info-heading"><?php echo wp_kses_post( $support_heading ); ?></h2>
				<p class="ds-info-desc"><?php echo wp_kses_post( $support_description ); ?></p>
			</div>

			<div class="image-with-content-section">
				<div class="image-with-content-row align-items-center">
					<div class="image-with-content-image-left" data-aos="fade-right">
						<div class="image-with-content-image">
							<img src="<?php echo esc_url( $info_image ); ?>" alt="Digital Support" class="img-fluid" width="422" height="452">
						</div>
					</div>
					<div class="image-with-content-right" data-aos="fade-left">
						<div class="image-with-content-content">
							<h3 class="image-with-content-heading"><?php echo wp_kses_post( $info_title ); ?></h3>
							<p class="image-with-content-desc"><?php echo wp_kses_post( $info_text ); ?></p>
							<div class="image-with-content-btn">
								<a href="<?php echo esc_url( $info_button_link ); ?>" class="button-black"><?php echo esc_html( $info_button_text ); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Marketing Needs Section -->
	<?php
	$marketing_title = get_field( 'about_marketing_title' );
	$marketing_items = get_field( 'about_marketing_items' );

	if ( ! $marketing_title ) {
		$marketing_title = 'All your digital marketing <br> needs, <span class="font-style-italic">covered</span>';
	}
	?>
	<section class="marketing-needs-section section-space-tb">
		<div class="container">
			<div class="marketing-needs-header text-center" data-aos="fade-up">
				<h2 class="mn-title"><?php echo wp_kses_post( $marketing_title ); ?></h2>
			</div>

			<div class="marketing-needs-blocks">
				<?php if ( $marketing_items ) : ?>
					<?php foreach ( $marketing_items as $index => $item ) : 
						$alignment = ( $index % 2 == 0 ) ? 'block-left' : 'block-right';
						?>
						<div class="mn-block <?php echo esc_attr( $alignment ); ?>" data-aos="fade-up">
							<h4 class="mn-block-title"><?php echo esc_html( $item['item_title'] ); ?></h4>
							<p class="mn-block-desc">
								<?php echo wp_kses_post( $item['item_description'] ); ?>
							</p>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- Love Note Section -->
	 <?php
	 $about_clinic_communications_title = get_field( 'about_clinic_communications_title' );
	 $about_clinic_communications_photo = get_field( 'about_clinic_communications_photo' );
	 ?>
	<section class="love-note-section section-space-tb">
		<div class="container">
			<div class="love-note-flex-row align-items-center">
				<div class="love-note-image-left" data-aos="fade-right">
					<div class="love-note-img">
						<img src="<?php echo esc_url( $about_clinic_communications_photo ); ?>" alt="Maddie from Clinic Communications" width="425" height="712" class="img-fluid">
					</div>
				</div>
				<div class="love-note-content-right" data-aos="fade-left">
					<div class="love-note-content">
						<h2 class="ln-title"><?php echo wp_kses_post( $about_clinic_communications_title ); ?></h2>
						<div class="ln-desc">
							<?php
							if ( have_posts() ) :
								while ( have_posts() ) :
									the_post();
									the_content();
								endwhile;
							endif;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- about Social CTA Section -->
	<?php
	$cta_bg_image    = get_field( 'cta_bg_image' );
	$cta_title       = get_field( 'cta_title' );
	$cta_subtitle    = get_field( 'cta_subtitle' );
	$cta_button_text = get_field( 'cta_button_text' );
	$cta_button_link = get_field( 'cta_button_link' );

	if ( ! $cta_bg_image ) {
		$cta_bg_image = get_template_directory_uri() . '/assets/images/book-demo-bg-image.jpg';
	}
	if ( ! $cta_title ) {
		$cta_title = 'Clients? Supported. <br> Socials? I think I need support..';
	}
	if ( ! $cta_subtitle ) {
		$cta_subtitle = 'Let’s take that off your plate. Book your free 15-minute call.';
	}
	if ( ! $cta_button_text ) {
		$cta_button_text = 'BOOK NOW';
	}
	if ( ! $cta_button_link ) {
		$cta_button_link = '#';
	}
	?>
	<section class="social-cta-section">
		<div class="social-cta-parallax" style="background-image: url('<?php echo esc_url( $cta_bg_image ); ?>');">
			<div class="container">
				<div class="social-cta-content text-center">
					<h2 class="social-cta-title">
						<?php echo wp_kses_post( $cta_title ); ?>
					</h2>
					<p class="cta-subtitle">
						<?php echo wp_kses_post( $cta_subtitle ); ?>
					</p>
					<div class="cta-btn-wrapper">
						<a href="<?php echo esc_url( $cta_button_link ); ?>" class="button-primary"><?php echo esc_html( $cta_button_text ); ?></a>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

<!-- Social Post Modal -->
<div class="modal fade social-post-modal" id="socialPostModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl">
		<div class="modal-content">
			<div class="modal-body p-0">
				<div class="social-modal-container">
					<!-- Left Side: Image -->
					<div class="social-modal-left">
						<img src="" alt="Post Image" id="modalPostImage">
					</div>

					<!-- Right Side: Details -->
					<div class="social-modal-right">
						<div class="modal-header-custom d-flex justify-content-between align-items-center">
							<div class="header-left">
								<div class="insta-icon">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/instagram.svg" alt="Instagram">
								</div>
								<span class="handle">cliniccommunications</span>
							</div>
							<button type="button" class="btn-close-modal" data-bs-dismiss="modal" aria-label="Close">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/close-btn-icon.svg" alt="Close" width="24" height="24" class="social-close-btn">
							</button>
						</div>

						<div class="modal-content-scroll">
							<div class="modal-nav-arrows">
								<button class="nav-arrow prev-post" id="modalPrev">
								</button>
								<button class="nav-arrow next-post" id="modalNext">
								</button>
							</div>

							<div class="post-caption" id="modalPostCaption">
								<!-- Content injected via JS -->
							</div>
						</div>

						<div class="modal-footer-custom">
							<span class="post-date" id="modalPostDate">11 March 2026</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
