<?php
/**
 * Template Name: Contact
 *
 * @package Clinic_Communications
 */

get_header();

// Banner Fields
$banner_title    = get_field( 'contact_banner_title' );
$banner_btn_text = get_field( 'contact_banner_btn_text' );
$banner_btn_link = get_field( 'contact_banner_btn_link' );
$banner_bg       = get_field( 'contact_banner_bg' );

// Fallbacks
if ( ! $banner_title ) {
	$banner_title = 'Ready to <span class="font-style-italic">sprinkle</span> some <span class="font-style-italic">magic</span> on your marketing?';
}
if ( ! $banner_btn_text ) {
	$banner_btn_text = 'BOOK A DISCOVERY CALL';
}
if ( ! $banner_btn_link ) {
	$banner_btn_link = '#';
}
if ( ! $banner_bg ) {
	$banner_bg = get_template_directory_uri() . '/assets/images/book-demo-bg-image.jpg';
}

// Form Section Fields
$form_heading    = get_field( 'contact_form_heading' );
$form_subheading = get_field( 'contact_form_subheading' );
$form_shortcode  = get_field( 'contact_form_shortcode' );

// Fallbacks
if ( ! $form_heading ) {
	$form_heading = 'Interested in having a chat?';
}
if ( ! $form_subheading ) {
	$form_subheading = 'Fill out our contact form and our team will get back to you!';
}
?>

<main>
	<!-- Common Banner Section -->
	<section class="common-banner-section contact-banner-section">
		<div class="common-banner-bg">
			<img src="<?php echo esc_url( $banner_bg ); ?>" alt="<?php echo esc_attr( strip_tags( $banner_title ) ); ?>" class="banner-img">
			<div class="container">
				<div class="common-banner-content text-center" data-aos="fade-up">
					<h1><?php echo wp_kses_post( $banner_title ); ?></h1>
					<?php if ( $banner_btn_text ) : ?>
						<a href="<?php echo esc_url( $banner_btn_link ); ?>" class="btn button-secondary mx-auto"><?php echo esc_html( $banner_btn_text ); ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

	<section class="contact-form-section section-space-tb">
		<div class="container">
			<div class="contact-form-content text-center" data-aos="fade-up">
				<h2><?php echo wp_kses_post( $form_heading ); ?></h2>
				<h3><?php echo wp_kses_post( $form_subheading ); ?></h3>
			</div>

			<div class="contact-main-form" data-aos="fade-up">
				<?php
				if ( $form_shortcode ) {
					echo do_shortcode( $form_shortcode );
				} else {
					// Fallback message if no shortcode is provided
					echo '<p class="text-center">Please add a Contact Form 7 shortcode in the page settings.</p>';
				}
				?>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
