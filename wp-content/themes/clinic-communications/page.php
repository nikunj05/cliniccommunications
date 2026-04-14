<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Clinic_Communications
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php
	while ( have_posts() ) :
		the_post();
		?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<!-- Page Header / Title -->
			<section class="page-title-section section-space-tb" style="background-color: #F6F5F0; padding: 100px 0 60px;">
				<div class="container text-center">
					<h1 class="entry-title" data-aos="fade-up" style="font-family: 'Playfair Display', serif; font-size: 48px; font-weight: 400;"><?php the_title(); ?></h1>
				</div>
			</section>

			<!-- Page Content -->
			<section class="page-content-section section-space-tb">
				<div class="container">
					<div class="entry-content" data-aos="fade-up" style="font-size: 17px; line-height: 1.6; max-width: 800px; margin: 0 auto;">
						<?php
						the_content();

						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'clinic-communications' ),
								'after'  => '</div>',
							)
						);
						?>
					</div>
				</div>
			</section>
		</article><!-- #post-<?php the_ID(); ?> -->

		<?php
	endwhile; // End of the loop.
	?>
</main><!-- #main -->

<?php
get_footer();
