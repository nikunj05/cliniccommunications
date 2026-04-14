  <footer class="footer">
    <div class="container">
      <div class="footer-top">
        <div class="footer-navbar">
          <div class="footer-brand">
            <?php
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo_url       = wp_get_attachment_image_src( $custom_logo_id, 'full' );
            $logo_src       = has_custom_logo() ? $logo_url[0] : get_template_directory_uri() . '/assets/images/clinic-logo.png';
            ?>
            <a class="footer-brand-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
              <img src="<?php echo esc_url( $logo_src ); ?>" alt="<?php bloginfo( 'name' ); ?>" width="180">
            </a>
          </div>
          <?php
          wp_nav_menu( array(
            'theme_location' => 'footer-menu',
            'container'      => false,
            'menu_class'     => 'footer-nav-links',
            'fallback_cb'    => false,
          ) );
          ?>
          <div class="footer-social-links">
            <?php
            $active_socials = clinic_communications_get_active_social_links();
            foreach ( $active_socials as $id => $social ) : ?>
            <a href="<?php echo esc_url( $social['url'] ); ?>" class="social-link" target="_blank">
              <?php echo $social['icon']; ?>
            </a>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="footer-acknowledgement">
          <p class="ack-text">
            <?php echo wp_kses_post( get_theme_mod( 'clinic_communications_ack_text_1', 'Clinic Communications acknowledges and pays respect to the Gadigal,<br> Cammeraygal and Gweagal people on the lands in which we work.' ) ); ?>
          </p>
          <p class="ack-text">
            <?php echo wp_kses_post( get_theme_mod( 'clinic_communications_ack_text_2', 'Clinic Communications acknowledges we are working on stolen<br> lands and that sovereignty has not been ceded.' ) ); ?>
          </p>
        </div>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>
