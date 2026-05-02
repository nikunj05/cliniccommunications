<?php
/**
 * Template Name: Landing Page
 *
 * @package Clinic_Communications
 */

get_header();

// Hero Marketing Section
$hero_subheading = get_field('hero_subheading') ?: 'EXCLUSIVE TO DENTAL PRACTICES';
$hero_heading = get_field('hero_heading') ?: 'Marketing built for <span class="font-style-italic">clinical excellence.</span>';
$hero_description = get_field('hero_description') ?: 'We help Australian dental practices fill chairs with high - value patients, without compromising professional reputation or resorting to gimmicks.';
$hero_btn_1_text = get_field('hero_btn_1_text') ?: 'Book a strategy call';
$hero_btn_1_link = get_field('hero_btn_1_link') ?: '#';
$hero_btn_2_text = get_field('hero_btn_2_text') ?: 'Explore services';
$hero_btn_2_link = get_field('hero_btn_2_link') ?: '#';
$hero_image = get_field('hero_image') ?: get_template_directory_uri() . '/assets/images/landing-page-hero-image.png';

// Trusted Practices Section
$trusted_heading = get_field('trusted_heading') ?: 'Trusted by 80+ leading practices across Australia';
$trusted_logos = get_field('trusted_logos'); 

// Landscape Section
$landscape_subheading = get_field('landscape_subheading') ?: 'THE LANDSCAPE';
$landscape_heading = get_field('landscape_heading') ?: 'Great clinical outcomes don\'t automatically mean a full appointment book.';
$landscape_description = get_field('landscape_description') ?: 'Most generic marketing agencies don\'t understand the nuances of dentistry. They promise "leads," but deliver price-shoppers instead of patients seeking comprehensive care, implants, or cosmetic work.';
$landscape_cards = get_field('landscape_cards');

// Solutions Section
$solutions_subheading = get_field('solutions_subheading') ?: 'OUR SOLUTIONS';
$solutions_heading = get_field('solutions_heading') ?: 'Systems engineered to attract <span class="font-style-italic">the right</span> patients.';
$solutions_features = get_field('solutions_features');
$solutions_image = get_field('solutions_image') ?: get_template_directory_uri() . '/assets/images/solutions-image.png';
$solutions_testimonial = get_field('solutions_testimonial') ?: '"Clinic Communications transformed how we present our practice online."';
$solutions_author = get_field('solutions_author') ?: '— DR. A. REYNOLDS';

// Case Study Section
$case_study_subheading = get_field('case_study_subheading') ?: 'CASE STUDY';
$case_study_heading = get_field('case_study_heading') ?: 'Shifting focus from general check-ups to cosmetic cases.';
$case_study_description = get_field('case_study_description') ?: 'A premium practice in Sydney wanted to reduce reliance on insurance-driven cleans and increase their share of clear aligner and veneer patients.';
$case_study_stats = get_field('case_study_stats');
$case_study_link_text = get_field('case_study_link_text') ?: 'Discuss your goals';
$case_study_link_url = get_field('case_study_link_url') ?: '#';
$case_study_image = get_field('case_study_image') ?: get_template_directory_uri() . '/assets/images/case-study-image.png';

// Methodology Section
$methodology_heading = get_field('methodology_heading') ?: 'Our Methodology';
$methodology_subheading = get_field('methodology_subheading') ?: 'A considered, clinical approach to practice growth.';
$methodology_steps = get_field('methodology_steps');

// Philosophy Section
$philosophy_image = get_field('philosophy_image') ?: get_template_directory_uri() . '/assets/images/philosophy-image.png';
$philosophy_subheading = get_field('philosophy_subheading') ?: 'PHILOSOPHY';
$philosophy_heading = get_field('philosophy_heading') ?: '"Dentistry is built on trust. Your marketing should be too."';
$philosophy_content_1 = get_field('philosophy_content_1') ?: 'When we started Clinic Communications, we noticed a disconnect. Dental practices are clinical, precise, and deeply ethical. Yet the marketing agencies serving them were loud, aggressive, and focused on vanity metrics.';
$philosophy_content_2 = get_field('philosophy_content_2') ?: 'We believe that premium practices deserve premium marketing. You shouldn\'t have to choose between growing your revenue and maintaining your professional integrity. We build elegant systems that attract patients who value your expertise, not just your price point.';
$philosophy_author_name = get_field('philosophy_author_name') ?: 'Sarah Jenkins';
$philosophy_author_title = get_field('philosophy_author_title') ?: 'FOUNDER, CLINIC COMMUNICATIONS';

// Field Notes Section
$field_notes_subheading = get_field('field_notes_subheading') ?: 'FIELD NOTES';
$field_notes_heading = get_field('field_notes_heading') ?: 'Marketing for dentists, <span class="font-style-italic">done with care.</span>';
$field_notes_left_desc = get_field('field_notes_left_desc') ?: 'Dentistry is one of the most trust-driven industries in healthcare. Patients aren\'t choosing between products on a shelf — they\'re choosing who gets to look inside their mouth, numb their face, and place restorations they\'ll live with for decades. That changes everything about how a practice should communicate.';
$field_notes_right_desc_1 = get_field('field_notes_right_desc_1') ?: 'Most agencies treat dental practices like generic small businesses — running discount offers, chasing keyword volume, and measuring success in clicks. The result is predictable: a flood of price-sensitive enquiries for $99 cleans, no growth in implants or aligners, and a front desk burnt out on tyre-kickers.';
$field_notes_right_desc_2 = get_field('field_notes_right_desc_2') ?: 'We take a different view. Patient acquisition for a modern practice is really three problems: being found by the right person at the right moment, earning their trust before they ever pick up the phone, and giving the team a calm, considered system that converts enquiries into booked, ready-to-treat appointments. Get those three right and growth stops feeling like a hustle.';
$field_notes_cards = get_field('field_notes_cards');
$field_notes_stats = get_field('field_notes_stats');

// FAQ Section
$faq_title = get_field('faq_title') ?: 'Common Questions';
$faqs = get_field('faqs');

// Ready to Elevate Strategy Section
$elevate_heading = get_field('elevate_heading') ?: 'Ready to elevate your practice?';
$elevate_description = get_field('elevate_description') ?: 'Let\'s discuss your current challenges and map out a strategy to attract the patients you actually want to treat.';
$elevate_btn_text = get_field('elevate_btn_text') ?: 'Book a strategy call';
$elevate_btn_link = get_field('elevate_btn_link') ?: 'book-a-call.html';

?>

<main>
    <!-- Hero Marketing Section -->
    <section class="hero-marketing-section section-space-tb128">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="hero-marketing-content" data-aos="fade-right">
              <h5><?php echo wp_kses_post( $hero_subheading ); ?></h5>
              <h1><?php echo wp_kses_post( $hero_heading ); ?></h1>
              <p>
                <?php echo wp_kses_post( $hero_description ); ?>
              </p>
              <div class="hero-button-group">
                <?php if ( $hero_btn_1_text ): ?>
                    <a href="<?php echo esc_url( $hero_btn_1_link ); ?>" class="btn btn-primary-large"><?php echo esc_html( $hero_btn_1_text ); ?></a>
                <?php endif; ?>
                <?php if ( $hero_btn_2_text ): ?>
                    <a href="<?php echo esc_url( $hero_btn_2_link ); ?>" class="btn btn-secondary-large"><?php echo esc_html( $hero_btn_2_text ); ?></a>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="hero-marketing-image" data-aos="fade-left">
              <div class="hero-image-wrapper">
                <div class="hero-shape-background"></div>
                <img src="<?php echo esc_url( $hero_image ); ?>" width="664" height="664"
                  alt="<?php echo esc_attr( strip_tags( $hero_heading ) ); ?>" class="img-fluid hero-main-image">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Trusted Practices Section -->
    <section class="trusted-practices-section">
      <div class="container">
        <div class="trusted-practices-inner">
          <h4><?php echo wp_kses_post( $trusted_heading ); ?></h4>
          <ul>
            <?php if ( $trusted_logos ): ?>
                <?php foreach ( $trusted_logos as $logo_item ): ?>
                    <li><?php echo esc_html( $logo_item['logo_text'] ); ?></li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>SYDNEY DENTAL</li>
                <li>BONDI SMILES</li>
                <li>NORTHSHORE ORTHO</li>
                <li>MELBOURNE IMPLANTS</li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </section>

    <!-- Landscape Section -->
    <section class="landscape-section section-space-tb128">
      <div class="container">
        <h5 data-aos="fade-up"><?php echo wp_kses_post( $landscape_subheading ); ?></h5>
        <h2 data-aos="fade-up" data-aos-delay="100"><?php echo wp_kses_post( $landscape_heading ); ?></h2>
        <p data-aos="fade-up" data-aos-delay="200">
          <?php echo wp_kses_post( $landscape_description ); ?>
        </p>
        <div class="landscape-cards-row" data-aos="fade-up" data-aos-delay="100">
          <div class="row">
            <?php if ( $landscape_cards ): ?>
                <?php foreach ( $landscape_cards as $card ): ?>
                    <div class="col-lg-4 col-md-6 landscape-card-wrapper">
                      <div class="landscape-card">
                        <div class="landscape-card-icon">
                          <img src="<?php echo esc_url( $card['icon'] ); ?>" width="40" height="40" alt="<?php echo esc_attr( $card['title'] ); ?>">
                        </div>
                        <h3><?php echo esc_html( $card['title'] ); ?></h3>
                        <p><?php echo wp_kses_post( $card['description'] ); ?></p>
                      </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-lg-4 col-md-6 landscape-card-wrapper">
                  <div class="landscape-card">
                    <div class="landscape-card-icon">
                      <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon/empty-chairs-icon.svg' ); ?>" width="40" height="40" alt="Empty Chairs Icon">
                    </div>
                    <h3>Empty Chairs</h3>
                    <p>Inconsistent patient flow creates stress and makes it impossible to scale your team confidently.</p>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 landscape-card-wrapper">
                  <div class="landscape-card">
                    <div class="landscape-card-icon">
                      <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon/low-value-leads-icon.svg' ); ?>" width="40" height="40" alt="Low-Value Leads Icon">
                    </div>
                    <h3>Low-Value Leads</h3>
                    <p>Marketing that attracts bargain-hunters rather than patients who value quality clinical care.</p>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 landscape-card-wrapper">
                  <div class="landscape-card">
                    <div class="landscape-card-icon">
                      <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon/stagnant-growth-icon.svg' ); ?>" width="40" height="40" alt="Stagnant Growth Icon">
                    </div>
                    <h3>Stagnant Growth</h3>
                    <p>Relying solely on word-of-mouth is no longer enough in increasingly competitive suburbs.</p>
                  </div>
                </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>

    <!-- Solutions Section -->
    <section class="solutions-section section-space-tb128">
      <div class="container">
        <h5><?php echo wp_kses_post( $solutions_subheading ); ?></h5>
        <h2><?php echo wp_kses_post( $solutions_heading ); ?></h2>
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="solutions-content" data-aos="fade-right">
              <div class="solutions-features">
                <?php if ( $solutions_features ): ?>
                    <?php foreach ( $solutions_features as $feature ): ?>
                        <div class="solutions-feature-item">
                          <div class="solutions-feature-icon">
                            <img src="<?php echo esc_url( $feature['icon'] ); ?>" width="20" height="20" alt="<?php echo esc_attr( $feature['title'] ); ?>">
                          </div>
                          <div class="solutions-feature-text">
                            <h3><?php echo esc_html( $feature['title'] ); ?></h3>
                            <p><?php echo wp_kses_post( $feature['description'] ); ?></p>
                          </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="solutions-feature-item">
                      <div class="solutions-feature-icon">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon/practice-icon.svg' ); ?>" width="20" height="20" alt="Practice Websites">
                      </div>
                      <div class="solutions-feature-text">
                        <h3>Practice Websites</h3>
                        <p>High-converting, elegantly designed websites that establish instant trust and guide patients to book seamlessly.</p>
                      </div>
                    </div>
                    <div class="solutions-feature-item">
                      <div class="solutions-feature-icon">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon/search-icon.svg' ); ?>" width="20" height="20" alt="Google Ads & Local SEO">
                      </div>
                      <div class="solutions-feature-text">
                        <h3>Google Ads & Local SEO</h3>
                        <p>Dominate local search results when patients are actively looking for high-value treatments like Invisalign or implants.</p>
                      </div>
                    </div>
                    <div class="solutions-feature-item">
                      <div class="solutions-feature-icon">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon/massage-icon.svg' ); ?>" width="20" height="20" alt="Content & Reactivation">
                      </div>
                      <div class="solutions-feature-text">
                        <h3>Content & Reactivation</h3>
                        <p>Strategic social content that builds authority, and automated systems to bring dormant patients back to the chair.</p>
                      </div>
                    </div>
                <?php endif; ?>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="solutions-image-wrapper" data-aos="fade-left">
              <img src="<?php echo esc_url( $solutions_image ); ?>" width="696" height="487" class="img-fluid solutions-main-image" alt="Solutions">
              <div class="solutions-testimonial-card">
                <p><?php echo wp_kses_post( $solutions_testimonial ); ?></p>
                <h5><?php echo wp_kses_post( $solutions_author ); ?></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Case Study Section -->
    <section class="case-study-section section-space-tb128">
      <div class="container">
        <div class="case-study-card" data-aos="fade-up">
          <div class="row g-0 align-items-stretch">
            <div class="col-lg-6">
              <div class="case-study-content">
                <h5><?php echo wp_kses_post( $case_study_subheading ); ?></h5>
                <h2><?php echo wp_kses_post( $case_study_heading ); ?></h2>
                <p>
                  <?php echo wp_kses_post( $case_study_description ); ?>
                </p>
                <div class="case-study-stats">
                  <?php if ( $case_study_stats ): ?>
                      <?php foreach ( $case_study_stats as $stat ): ?>
                          <div class="stat-item">
                            <h3><?php echo esc_html( $stat['number'] ); ?></h3>
                            <p><?php echo wp_kses_post( $stat['text'] ); ?></p>
                          </div>
                      <?php endforeach; ?>
                  <?php else: ?>
                      <div class="stat-item">
                        <h3>+212%</h3>
                        <p>Increase in high-value patient enquiries within 6 months</p>
                      </div>
                      <div class="stat-item">
                        <h3>14</h3>
                        <p>New aligner case starts per month consistently</p>
                      </div>
                  <?php endif; ?>
                </div>
                <a href="<?php echo esc_url( $case_study_link_url ); ?>"><?php echo esc_html( $case_study_link_text ); ?> <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon/down-arrow-icon.svg' ); ?>" alt="Discuss your goals" width="24" height="24"></a>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="case-study-image h-100">
                <img src="<?php echo esc_url( $case_study_image ); ?>" width="712" height="712" alt="Case Study" class="img-fluid">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Methodology Section -->
    <section class="methodology-section section-space-tb128">
      <div class="container">
        <h2 data-aos="fade-up"><?php echo wp_kses_post( $methodology_heading ); ?></h2>
        <p data-aos="fade-up" data-aos-delay="100"><?php echo wp_kses_post( $methodology_subheading ); ?></p>

        <div class="methodology-timeline" data-aos="fade-up" data-aos-delay="100">
          <div class="row gx-4">
            <?php if ( $methodology_steps ): ?>
                <?php foreach ( $methodology_steps as $step ): ?>
                    <div class="col-lg-3 col-md-6 methodology-step-card">
                      <div class="methodology-step">
                        <div class="step-indicator">
                          <span><?php echo esc_html( $step['number'] ); ?></span>
                        </div>
                        <h3><?php echo esc_html( $step['title'] ); ?></h3>
                        <p><?php echo wp_kses_post( $step['description'] ); ?></p>
                      </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-lg-3 col-md-6 methodology-step-card">
                  <div class="methodology-step">
                    <div class="step-indicator">
                      <span>01</span>
                    </div>
                    <h3>Discovery</h3>
                    <p>We audit your current patient flow, digital presence, and local competition.</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 methodology-step-card">
                  <div class="methodology-step">
                    <div class="step-indicator">
                      <span>02</span>
                    </div>
                    <h3>Strategy</h3>
                    <p>Developing a custom roadmap focused specifically on the treatments you want to perform.</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 methodology-step-card">
                  <div class="methodology-step">
                    <div class="step-indicator">
                      <span>03</span>
                    </div>
                    <h3>Execution</h3>
                    <p>Building the assets, launching campaigns, and establishing your premium brand positioning.</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 methodology-step-card">
                  <div class="methodology-step">
                    <div class="step-indicator">
                      <span>04</span>
                    </div>
                    <h3>Refinement</h3>
                    <p>Monthly reviews of patient acquisition costs, campaign performance, and ROI.</p>
                  </div>
                </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>

    <!-- Philosophy Section -->
    <section class="philosophy-section section-space-tb128">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5">
            <div class="philosophy-image-wrapper" data-aos="fade-right">
              <img src="<?php echo esc_url( $philosophy_image ); ?>" width="554" height="791" class="img-fluid" alt="<?php echo esc_attr( $philosophy_author_name ); ?>">
            </div>
          </div>
          <div class="col-lg-7">
            <div class="philosophy-content" data-aos="fade-left">
              <h5><?php echo wp_kses_post( $philosophy_subheading ); ?></h5>
              <h2><?php echo wp_kses_post( $philosophy_heading ); ?></h2>
              <p><?php echo wp_kses_post( $philosophy_content_1 ); ?></p>
              <p><?php echo wp_kses_post( $philosophy_content_2 ); ?></p>
              <div class="philosophy-author">
                <h3><?php echo esc_html( $philosophy_author_name ); ?></h3>
                <span><?php echo esc_html( $philosophy_author_title ); ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Field Notes Section -->
    <section class="field-notes-section section-space-tb128">
      <div class="container">
        <div class="row" data-aos="fade-up">
          <div class="col-lg-5">
            <h5><?php echo wp_kses_post( $field_notes_subheading ); ?></h5>
            <h2><?php echo wp_kses_post( $field_notes_heading ); ?></h2>
            <p><?php echo wp_kses_post( $field_notes_left_desc ); ?></p>
          </div>
          <div class="col-lg-7 field-notes-right">
            <p><?php echo wp_kses_post( $field_notes_right_desc_1 ); ?></p>
            <p><?php echo wp_kses_post( $field_notes_right_desc_2 ); ?></p>
          </div>
        </div>

        <div class="row field-notes-card-area" data-aos="fade-up" data-aos-delay="100">
          <?php if ( $field_notes_cards ): ?>
              <?php foreach ( $field_notes_cards as $card ): ?>
                  <div class="col-lg-4 col-md-6">
                    <div class="field-notes-card">
                      <div class="card-header">
                        <h5><?php echo esc_html( $card['tag'] ); ?></h5>
                        <h6><?php echo esc_html( $card['number'] ); ?></h6>
                      </div>
                      <h3><?php echo esc_html( $card['title'] ); ?></h3>
                      <p><?php echo wp_kses_post( $card['description'] ); ?></p>
                    </div>
                  </div>
              <?php endforeach; ?>
          <?php else: ?>
              <div class="col-lg-4 col-md-6">
                <div class="field-notes-card">
                  <div class="card-header">
                    <h5>POSITIONING</h5>
                    <h6>01</h6>
                  </div>
                  <h3>Stop competing on price. Start competing on care.</h3>
                  <p>The practices that consistently win high-value cases — implants, full arch, aligners, cosmetic — aren't the cheapest. They're the ones whose website, photography, and tone of voice quietly signal expertise from the very first scroll. Premium positioning is a marketing decision, not just a clinical one.</p>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="field-notes-card">
                  <div class="card-header">
                    <h5>LOCAL SEARCH</h5>
                    <h6>02</h6>
                  </div>
                  <h3>Your Google Business Profile is your new front door.</h3>
                  <p>Before a patient ever sees your homepage, they've already judged you on Google: reviews, photos, response times, treatments listed. A neglected profile costs more new patients per month than most owners realise. Treating it as a living asset — not a one time setup — is the highest-ROI move in local marketing today.</p>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="field-notes-card">
                  <div class="card-header">
                    <h5>CONVERSION</h5>
                    <h6>03</h6>
                  </div>
                  <h3>Most lost patients are lost at the front desk, not online.</h3>
                  <p>Beautiful ads and a great website only buy you the enquiry. What happens in the next 90 seconds — how the call is answered, how quickly the form is replied to, how the booking is framed — decides whether that lead becomes a patient. Marketing without conversion infrastructure is just expensive noise.</p>
                </div>
              </div>
          <?php endif; ?>
        </div>

        <div class="field-notes-stats-seperator" data-aos="fade-up" data-aos-delay="200"></div>

        <div class="row field-notes-stats" data-aos="fade-up" data-aos-delay="200">
          <?php if ( $field_notes_stats ): ?>
              <?php foreach ( $field_notes_stats as $stat ): ?>
                  <div class="col-lg-4 col-md-4">
                    <div class="stat-box">
                      <h4><?php echo esc_html( $stat['number'] ); ?></h4>
                      <p><?php echo wp_kses_post( $stat['text'] ); ?></p>
                    </div>
                  </div>
              <?php endforeach; ?>
          <?php else: ?>
              <div class="col-lg-4 col-md-4">
                <div class="stat-box">
                  <h4>67%</h4>
                  <p>of new patients research a practice online before calling</p>
                </div>
              </div>
              <div class="col-lg-4 col-md-4">
                <div class="stat-box">
                  <h4>5x</h4>
                  <p>higher lifetime value from cosmetic & implant patients vs. general check-ups</p>
                </div>
              </div>
              <div class="col-lg-4 col-md-4">
                <div class="stat-box">
                  <h4>&lt;5min</h4>
                  <p>lead response time, the single biggest predictor of conversion</p>
                </div>
              </div>
          <?php endif; ?>
        </div>
      </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section section-space-b128">
      <div class="container">
        <div class="faq-header" data-aos="fade-up">
          <h2 class="faq-title"><?php echo wp_kses_post( $faq_title ); ?></h2>
        </div>

        <div class="faq-accordion-wrapper" data-aos="fade-up" data-aos-delay="100">
          <div class="accordion" id="faqAccordion">
            <?php if ( $faqs ): ?>
                <?php foreach ( $faqs as $index => $faq ): ?>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="heading<?php echo esc_attr( $index ); ?>">
                        <button class="accordion-button <?php echo $index !== 0 ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo esc_attr( $index ); ?>"
                          aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>" aria-controls="collapse<?php echo esc_attr( $index ); ?>">
                          <?php echo esc_html( $faq['question'] ); ?>
                        </button>
                      </h2>
                      <div id="collapse<?php echo esc_attr( $index ); ?>" class="accordion-collapse collapse <?php echo $index === 0 ? 'show' : ''; ?>" aria-labelledby="heading<?php echo esc_attr( $index ); ?>"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                          <?php echo wp_kses_post( $faq['answer'] ); ?>
                        </div>
                      </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                      aria-expanded="true" aria-controls="collapseOne">
                      Do you work with practices outside of Sydney?
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                      Yes. While we are based in Sydney, we partner with premium dental practices across Australia, including Melbourne, Brisbane, Perth, and regional hubs. We understand the nuances of different local markets.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      How long until we see results from Google Ads?
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                      Google Ads typically start generating patient enquiries within the first 2-3 weeks of launch. However, we continuously optimize campaigns, meaning the cost-per-acquisition usually decreases and lead quality improves significantly by month 3.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Do you guarantee a certain number of patients?
                    </button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                      No reputable agency can guarantee exact patient numbers, as factors like front-desk conversion and local competition play a role. We do, however, guarantee transparent reporting, highly targeted traffic, and proven systems that have reliably grown over 80 Australian practices.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                      Do you handle our social media posts?
                    </button>
                  </h2>
                  <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                      Yes. We create refined, educational, and engaging content that positions your clinicians as authorities. We handle the strategy, design, and scheduling, requiring minimal input from your busy team.
                    </div>
                  </div>
                </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>

    <!-- Ready to Elevate Strategy Section -->
    <section class="ready-elevate-strategy-section section-space-tb128">
      <div class="container">
        <div class="ready-elevate-strategy-content text-center" data-aos="fade-up">
          <h2><?php echo wp_kses_post( $elevate_heading ); ?></h2>
          <p><?php echo wp_kses_post( $elevate_description ); ?></p>
          <?php if ( $elevate_btn_text ): ?>
              <a href="<?php echo esc_url( $elevate_btn_link ); ?>" class="btn btn-primary-large"><?php echo esc_html( $elevate_btn_text ); ?></a>
          <?php endif; ?>
        </div>
      </div>
    </section>
</main>

<?php
get_footer();
?>
