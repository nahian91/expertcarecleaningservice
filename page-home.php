<?php
/**
 * Template Name: Home Page
 *
 * @package Expertcare_Cleaning
 */

get_header(); 

// Global Settings
$phone    = get_option('expertcare_phone', '');
$whatsapp = get_option('expertcare_whatsapp', '');
$fb_url   = get_option('expertcare_facebook_url', '');

// Dynamic Home Page Data
$h = get_option('expertcare_home_data', []);

// 1. Hero
$hero_eyebrow  = $h['hero_eyebrow'] ?? '';
$hero_h1_main  = $h['hero_h1_main'] ?? '';
$hero_h1_shine = $h['hero_h1_shine'] ?? '';
$hero_sub      = $h['hero_sub'] ?? '';
$hero_img_val  = $h['hero_img'] ?? '';
$hero_img      = filter_var($hero_img_val, FILTER_VALIDATE_URL) ? $hero_img_val : (!empty($hero_img_val) ? get_template_directory_uri() . '/assets/img/' . ltrim($hero_img_val, '/') : '');
$hero_badge_t  = $h['hero_badge_t'] ?? '';
$hero_badge_s  = $h['hero_badge_s'] ?? '';
$stat_rating   = $h['stat_rating'] ?? '';
$stat_reach    = $h['stat_reach'] ?? '';
$stat_speed    = $h['stat_speed'] ?? '';

// 2. Why Us
$why_eyebrow = $h['why_eyebrow'] ?? '';
$why_title_m = $h['why_title_m'] ?? '';
$why_title_e = $h['why_title_e'] ?? '';
$why_p1      = $h['why_p1'] ?? '';
$why_p2      = $h['why_p2'] ?? '';

// 3. Featured Services Header
$svc_eyebrow = $h['svc_eyebrow'] ?? '';
$svc_title_m = $h['svc_title_m'] ?? '';
$svc_title_e = $h['svc_title_e'] ?? '';
$svc_lead    = $h['svc_lead'] ?? '';

// 4. Coverage Areas
$areas_eyebrow = $h['areas_eyebrow'] ?? '';
$areas_title_m = $h['areas_title_m'] ?? '';
$areas_title_e = $h['areas_title_e'] ?? '';
$areas_lead    = $h['areas_lead'] ?? '';
$areas_list    = !empty($h['areas_list']) && is_array($h['areas_list']) ? $h['areas_list'] : [];

// 5. About Us
$about_eyebrow = $h['about_eyebrow'] ?? '';
$about_title_m = $h['about_title_m'] ?? '';
$about_title_e = $h['about_title_e'] ?? '';
$about_c1_t1   = $h['about_c1_t1'] ?? '';
$about_c1_p1   = $h['about_c1_p1'] ?? '';
$about_c1_t2   = $h['about_c1_t2'] ?? '';
$about_c1_p2   = $h['about_c1_p2'] ?? '';
$about_c2_t1   = $h['about_c2_t1'] ?? '';
$about_c2_p1   = $h['about_c2_p1'] ?? '';
$about_c2_t2   = $h['about_c2_t2'] ?? '';
$about_c2_p2   = $h['about_c2_p2'] ?? '';

// 6. FAQs
$home_faqs = !empty($h['faqs']) && is_array($h['faqs']) ? $h['faqs'] : [];

// 7. Contact Email
$contact_email = $h['contact_email'] ?? '';
?>

  <span id="top"></span>

  <!-- HERO SECTION -->
  <section class="hero">
    <div class="wrap hero-grid">
      <div class="reveal in">
        <?php if (!empty($hero_eyebrow)) : ?>
          <span class="eyebrow">
            <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
            <?php echo esc_html($hero_eyebrow); ?>
          </span>
        <?php endif; ?>

        <?php if (!empty($hero_h1_main) || !empty($hero_h1_shine)) : ?>
          <h1><?php echo esc_html($hero_h1_main); ?> <?php if (!empty($hero_h1_shine)) : ?><span class="shine"><?php echo esc_html($hero_h1_shine); ?></span><?php endif; ?></h1>
        <?php endif; ?>

        <?php if (!empty($hero_sub)) : ?>
          <p class="sub"><?php echo esc_html($hero_sub); ?></p>
        <?php endif; ?>
        
        <div class="hero-cta">
          <?php if (!empty($phone)) : ?>
            <a class="btn btn-primary" href="<?php echo esc_url(expertcare_get_phone_url()); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html($phone); ?></a>
          <?php endif; ?>
          <?php if (!empty($whatsapp)) : ?>
            <a class="btn btn-ghost" href="<?php echo esc_url(expertcare_get_whatsapp_url("Hi Expertcare Cleaning, I'd like a cleaning quote please.")); ?>" target="_blank" rel="noopener noreferrer">Message on WhatsApp →</a>
          <?php endif; ?>
        </div>

        <?php if (!empty($stat_rating) || !empty($stat_reach) || !empty($stat_speed)) : ?>
          <div class="hero-stats">
            <?php if (!empty($stat_rating)) : ?>
              <div class="stat">
                <div class="n stars">★★★★★</div>
                <div class="l"><?php echo esc_html($stat_rating); ?></div>
              </div>
            <?php endif; ?>
            <?php if (!empty($stat_reach)) : ?>
              <div class="stat">
                <div class="n">London</div>
                <div class="l"><?php echo esc_html($stat_reach); ?></div>
              </div>
            <?php endif; ?>
            <?php if (!empty($stat_speed)) : ?>
              <div class="stat">
                <div class="n">Rapid</div>
                <div class="l"><?php echo esc_html($stat_speed); ?></div>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>

      <?php if (!empty($hero_img)) : ?>
        <div class="hero-photo reveal in">
          <img src="<?php echo esc_url($hero_img); ?>" alt="Expertcare Cleaning" loading="eager">
          <?php if (!empty($hero_badge_t) || !empty($hero_badge_s)) : ?>
            <div class="hero-badge">
              <div class="hb-stars">★★★★★</div>
              <div class="hb-text">
                <?php if (!empty($hero_badge_t)) : ?><b><?php echo esc_html($hero_badge_t); ?></b><?php endif; ?>
                <?php if (!empty($hero_badge_s)) : ?><span><?php echo esc_html($hero_badge_s); ?></span><?php endif; ?>
              </div>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <div class="trust">
    <div class="trust-track" id="trustTrack"></div>
  </div>

  <!-- WHY US BANNER SECTION -->
  <?php if (!empty($why_eyebrow) || !empty($why_title_m) || !empty($why_p1)) : ?>
  <section class="section section--tight" id="why-us">
    <div class="wrap" style="max-width:880px;margin:0 auto;text-align:center">
      <?php if (!empty($why_eyebrow)) : ?>
        <span class="eyebrow" style="justify-content:center">
          <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
          <?php echo esc_html($why_eyebrow); ?>
        </span>
      <?php endif; ?>

      <?php if (!empty($why_title_m) || !empty($why_title_e)) : ?>
        <h2 class="section-title" style="margin-top:10px">
          <?php echo esc_html($why_title_m); ?>
          <?php if (!empty($why_title_e)) : ?><em><?php echo esc_html($why_title_e); ?></em><?php endif; ?>
        </h2>
      <?php endif; ?>

      <?php if (!empty($why_p1)) : ?>
        <p class="section-lead" style="margin:20px auto 0;text-align:center"><?php echo esc_html($why_p1); ?></p>
      <?php endif; ?>

      <?php if (!empty($why_p2)) : ?>
        <p class="section-lead" style="margin:16px auto 0;text-align:center"><?php echo esc_html($why_p2); ?></p>
      <?php endif; ?>

      <div class="hero-cta" style="justify-content:center;margin-top:30px">
        <a class="btn btn-primary" href="#quote">Request Your Tailored Quote</a>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- DYNAMIC 3-COLUMN SERVICES SECTION WITH FEATURED IMAGES -->
  <section class="section" id="services">
    <div class="wrap">
      <?php if (!empty($svc_eyebrow) || !empty($svc_title_m) || !empty($svc_lead)) : ?>
        <div class="reveal">
          <?php if (!empty($svc_eyebrow)) : ?>
            <span class="eyebrow">
              <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
              <?php echo esc_html($svc_eyebrow); ?>
            </span>
          <?php endif; ?>

          <?php if (!empty($svc_title_m) || !empty($svc_title_e)) : ?>
            <h2 class="section-title">
              <?php echo esc_html($svc_title_m); ?>
              <?php if (!empty($svc_title_e)) : ?><em><?php echo esc_html($svc_title_e); ?></em><?php endif; ?>
            </h2>
          <?php endif; ?>

          <?php if (!empty($svc_lead)) : ?>
            <p class="section-lead"><?php echo esc_html($svc_lead); ?></p>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <div class="svc-grid" style="display:grid;grid-template-columns:repeat(3, 1fr);gap:28px;margin-top:40px;">
        <?php 
        $all_services = expertcare_get_services_config();
        
        foreach ($all_services as $key => $svc) :
          $svc_tab_data = get_option('expertcare_svc_' . $key . '_data', []);
          
          $price_display = $svc_tab_data['price'] ?? '';
          $card_code = !empty($svc['code']) ? $svc['code'] : '';
          $card_eyebrow = !empty($svc_tab_data['eyebrow']) ? $svc_tab_data['eyebrow'] : ($card_code ? $card_code . ' · ' . $svc['title'] : $svc['title']);

          $checklist_raw = !empty($svc_tab_data['checklist']) && is_array($svc_tab_data['checklist']) ? $svc_tab_data['checklist'] : [];
          $ten_features = array_slice($checklist_raw, 0, 10);

          // Check for Featured Service Image first, fallback to first gallery image if empty
          $feat_img_val = $svc_tab_data['feat_img'] ?? '';
          $card_img = '';
          
          if (!empty($feat_img_val)) {
              $card_img = filter_var($feat_img_val, FILTER_VALIDATE_URL) ? $feat_img_val : get_template_directory_uri() . '/assets/img/' . ltrim($feat_img_val, '/');
          } else {
              $gallery_raw = !empty($svc_tab_data['imgs']) && is_array($svc_tab_data['imgs']) ? $svc_tab_data['imgs'] : [];
              if (!empty($gallery_raw[0])) {
                  $card_img = filter_var($gallery_raw[0], FILTER_VALIDATE_URL) ? $gallery_raw[0] : get_template_directory_uri() . '/assets/img/' . ltrim($gallery_raw[0], '/');
              }
          }

          $service_page_url = home_url('/' . $key . '/');
          $is_featured = ($key === 'airbnb-turnover');
        ?>
          <div class="svc <?php echo $is_featured ? 'featured' : ''; ?> reveal" style="display:flex;flex-direction:column;height:100%;">
            <?php if ($is_featured) : ?>
              <span class="tag">Host Favourite</span>
            <?php endif; ?>

            <?php if (!empty($card_img)) : ?>
              <div class="svc-img" style="aspect-ratio:16/9;overflow:hidden;border-radius:12px;margin-bottom:18px;">
                <img src="<?php echo esc_url($card_img); ?>" alt="<?php echo esc_attr($svc['title']); ?>" loading="lazy" style="width:100%;height:100%;object-fit:cover;">
              </div>
            <?php endif; ?>

            <?php if (!empty($card_eyebrow)) : ?>
              <div class="no" style="font-size:0.85rem;font-weight:700;color:var(--color-primary, #0066cc);text-transform:uppercase;letter-spacing:0.04em;">
                <?php echo esc_html($card_eyebrow); ?>
              </div>
            <?php endif; ?>

            <h3 style="font-family:var(--font-heading,'Poppins',sans-serif);font-size:1.35rem;font-weight:700;margin:6px 0 8px;color:var(--color-dark,#0f172a);">
              <?php echo esc_html($svc['title']); ?>
            </h3>

            <?php if (!empty($price_display)) : ?>
              <div class="price" style="font-size:0.95rem;color:var(--color-primary,#0066cc);font-weight:600;margin-bottom:18px;">
                <?php echo esc_html($price_display); ?>
              </div>
            <?php endif; ?>

            <ul style="list-style:none;padding:0;margin:0 0 24px;display:flex;flex-direction:column;gap:10px;flex:1;">
              <?php if (!empty($ten_features)) : ?>
                <?php foreach ($ten_features as $feature_item) : ?>
                  <li style="display:flex;gap:10px;font-size:0.88rem;color:var(--color-text,#475569);line-height:1.4;">
                    <svg class="ck" viewBox="0 0 24 24" fill="none" stroke="#5cb8ec" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" style="width:16px;height:16px;flex:none;margin-top:2px;">
                      <path d="M4 12l5 5L20 6"/>
                    </svg>
                    <span><?php echo esc_html($feature_item); ?></span>
                  </li>
                <?php endforeach; ?>
              <?php endif; ?>
            </ul>

            <a class="btn <?php echo $is_featured ? 'btn-primary' : 'btn-ghost'; ?>" href="<?php echo esc_url($service_page_url); ?>" style="width:100%;text-align:center;justify-content:center;margin-top:auto;">
              Learn more
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- TESTIMONIALS / REVIEWS SECTION -->
  <section class="section" id="reviews">
    <div class="wrap">
      <div class="rev-head reveal">
        <div>
          <span class="eyebrow">
            <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
            Client Endorsements
          </span>
          <h2 class="section-title">Genuine experiences, <em>shared.</em></h2>
        </div>
        <div class="rev-score">
          <div class="big">4.8</div>
          <div>
            <div class="stars">★★★★★</div>
            <div class="sub">Rated 4.8 across verified London reviews</div>
            <div style="display:flex;gap:14px;align-items:center;margin-top:6px;flex-wrap:wrap">
              <?php if (!empty($fb_url)) : ?>
                <a class="sub" href="<?php echo esc_url($fb_url); ?>" target="_blank" rel="noopener noreferrer" style="color:var(--blue-bright)">View Facebook Testimonials →</a>
                <span style="color:var(--muted);font-size:0.8rem">·</span>
              <?php endif; ?>
              <a class="sub" href="<?php echo esc_url(home_url('/reviews/')); ?>" style="color:var(--blue);font-weight:600">Submit Your Review →</a>
            </div>
          </div>
        </div>
      </div>

      <!-- DYNAMIC WP_QUERY: APPROVED REVIEWS -->
      <div class="rev-grid reveal">
        <?php
        $home_reviews = new WP_Query([
            'post_type'      => 'expertcare_review',
            'post_status'    => 'publish',
            'posts_per_page' => 6,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'no_found_rows'  => true,
        ]);

        if ($home_reviews->have_posts()) :
            while ($home_reviews->have_posts()) : $home_reviews->the_post();
                $post_id  = get_the_ID();
                $rating   = intval(get_post_meta($post_id, '_review_rating', true) ?: 5);
                $location = get_post_meta($post_id, '_review_location', true) ?: '';
                $name     = get_the_title();
                $comment  = get_post_field('post_content', $post_id);

                $initials = '';
                $name_parts = explode(' ', trim($name));
                foreach ($name_parts as $part) {
                    if (!empty($part)) {
                        $initials .= strtoupper($part[0]);
                    }
                }
                $initials = substr($initials, 0, 2);
                ?>
                <div class="rev">
                  <div class="stars">
                    <?php echo str_repeat('★', $rating) . str_repeat('☆', 5 - $rating); ?>
                  </div>
                  <p><?php echo esc_html($comment); ?></p>
                  <div class="who">
                    <?php if (has_post_thumbnail($post_id)) : ?>
                      <div class="av" style="padding:0;overflow:hidden;border-radius:50%">
                        <?php echo get_the_post_thumbnail($post_id, [45, 45], ['style' => 'width:100%;height:100%;object-fit:cover;border-radius:50%;display:block;']); ?>
                      </div>
                    <?php else : ?>
                      <div class="av"><?php echo esc_html($initials ?: 'VC'); ?></div>
                    <?php endif; ?>
                    <div>
                      <b><?php echo esc_html($name); ?></b>
                      <?php if (!empty($location)) : ?><small><?php echo esc_html($location); ?></small><?php endif; ?>
                    </div>
                  </div>
                </div>
            <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
      </div>

      <div style="text-align:center;margin-top:36px;" class="reveal">
        <a class="btn btn-primary" href="<?php echo esc_url(home_url('/reviews/')); ?>" style="display:inline-flex;align-items:center;gap:8px;">
          <span>Leave a Review</span>
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
      </div>

      <!-- SCANNER DECK -->
      <div class="trust-qr-panel-premium reveal" style="margin-top:54px;">
        <div class="tqp-copy">
          <span class="eyebrow">
            <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
            Fast Mobile Bridge
          </span>
          <h3>Scan via camera. <em>Connect instantly.</em></h3>
          <p>Aim your mobile lens to view authenticated resident feedback or immediately bookmark our dispatch desk directly to your address book.</p>
          
          <div class="tqp-actions">
            <?php if (!empty($phone)) : ?>
              <a class="btn btn-primary" href="<?php echo esc_url(expertcare_get_phone_url()); ?>">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" style="margin-right:8px"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92Z"/></svg>
                Call <?php echo esc_html($phone); ?>
              </a>
            <?php endif; ?>
            <?php if (!empty($fb_url)) : ?>
              <a class="btn btn-ghost" href="<?php echo esc_url($fb_url); ?>" target="_blank" rel="noopener noreferrer">Facebook Page ↗</a>
            <?php endif; ?>
          </div>
        </div>

        <div class="tqp-dual-deck">
          <div class="tqp-tile">
            <span class="tqp-tile-badge">Verified Reviews</span>
            <div class="qr-scanner-frame" style="position:relative; background:#ffffff; padding:12px; border-radius:16px;">
              <span class="scanner-laser" style="pointer-events:none; opacity:0.35;"></span>
              <div class="qr-svg-holder" style="background:#ffffff; display:flex; align-items:center; justify-content:center;">
                <img 
                  src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=<?php echo urlencode(home_url('/reviews/')); ?>&margin=1" 
                  alt="Scan to open reviews" 
                  width="140" 
                  height="140"
                  style="display:block; width:100%; max-width:140px; height:auto; aspect-ratio:1/1;"
                />
              </div>
            </div>
            <div class="tqp-tile-info">
              <h4>Client Reviews</h4>
              <span>All Testimonials</span>
            </div>
            <a class="tqp-tile-btn" href="<?php echo esc_url(home_url('/reviews/')); ?>">
              Open Reviews
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7M17 7H7M17 7V17"/></svg>
            </a>
          </div>

          <?php if (!empty($phone)) : ?>
          <div class="tqp-tile">
            <span class="tqp-tile-badge badge-accent">Direct Line</span>
            <div class="qr-scanner-frame" style="position:relative; background:#ffffff; padding:12px; border-radius:16px;">
              <span class="scanner-laser" style="pointer-events:none; opacity:0.25;"></span>
              <div class="qr-svg-holder" style="background:#ffffff; display:flex; align-items:center; justify-content:center; padding:4px;">
                <img 
                  src="https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=<?php echo rawurlencode('TEL:' . preg_replace('/[^0-9+]/', '', $phone)); ?>&color=0f172a&bgcolor=ffffff&margin=2" 
                  alt="Scan to call <?php echo esc_attr($phone); ?>" 
                  width="140" 
                  height="140" 
                  loading="eager"
                  style="display:block; width:100%; max-width:140px; height:auto; aspect-ratio:1/1;"
                />
              </div>
            </div>
            <div class="tqp-tile-info">
              <h4>Call &amp; Book</h4>
              <span><?php echo esc_html($phone); ?></span>
            </div>
            <a class="tqp-tile-btn" href="<?php echo esc_url(expertcare_get_phone_url()); ?>">
              Tap to Call
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7M17 7H7M17 7V17"/></svg>
            </a>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- COVERAGE SECTION -->
  <?php if (!empty($areas_eyebrow) || !empty($areas_title_m) || !empty($areas_list)) : ?>
  <section class="section section--tight" id="areas">
    <div class="wrap areas-wrap">
      <div class="reveal">
        <?php if (!empty($areas_eyebrow)) : ?>
          <span class="eyebrow">
            <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
            <?php echo esc_html($areas_eyebrow); ?>
          </span>
        <?php endif; ?>

        <?php if (!empty($areas_title_m) || !empty($areas_title_e)) : ?>
          <h2 class="section-title">
            <?php echo esc_html($areas_title_m); ?>
            <?php if (!empty($areas_title_e)) : ?><em><?php echo esc_html($areas_title_e); ?></em><?php endif; ?>
          </h2>
        <?php endif; ?>

        <?php if (!empty($areas_lead)) : ?>
          <p class="section-lead"><?php echo esc_html($areas_lead); ?></p>
        <?php endif; ?>

        <?php if (!empty($phone)) : ?>
          <a class="btn btn-primary" href="<?php echo esc_url(expertcare_get_phone_url()); ?>" target="_blank" rel="noopener noreferrer" style="margin-top:24px"><?php echo esc_html($phone); ?></a>
        <?php endif; ?>
      </div>

      <?php if (!empty($areas_list)) : ?>
        <div class="area-grid reveal">
          <?php foreach ($areas_list as $area) : ?>
            <div class="area">
              <?php if (!empty($area['title'])) : ?><b><?php echo esc_html($area['title']); ?></b><?php endif; ?>
              <?php if (!empty($area['postcodes'])) : ?><small><?php echo esc_html($area['postcodes']); ?></small><?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </section>
  <?php endif; ?>

  <!-- ABOUT US SECTION -->
  <?php if (!empty($about_title_m) || !empty($about_c1_p1)) : ?>
  <section class="section" id="about-us">
    <div class="wrap">
      <div class="reveal">
        <?php if (!empty($about_eyebrow)) : ?>
          <span class="eyebrow">
            <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
            <?php echo esc_html($about_eyebrow); ?>
          </span>
        <?php endif; ?>

        <?php if (!empty($about_title_m) || !empty($about_title_e)) : ?>
          <h2 class="section-title">
            <?php echo esc_html($about_title_m); ?>
            <?php if (!empty($about_title_e)) : ?><em><?php echo esc_html($about_title_e); ?></em><?php endif; ?>
          </h2>
        <?php endif; ?>
      </div>
      <div class="about-grid reveal">
        <div class="about-col">
          <?php if (!empty($about_c1_t1)) : ?><h4><?php echo esc_html($about_c1_t1); ?></h4><?php endif; ?>
          <?php if (!empty($about_c1_p1)) : ?><p><?php echo esc_html($about_c1_p1); ?></p><?php endif; ?>
          <?php if (!empty($about_c1_t2)) : ?><h4><?php echo esc_html($about_c1_t2); ?></h4><?php endif; ?>
          <?php if (!empty($about_c1_p2)) : ?><p><?php echo esc_html($about_c1_p2); ?></p><?php endif; ?>
        </div>
        <div class="about-col">
          <?php if (!empty($about_c2_t1)) : ?><h4><?php echo esc_html($about_c2_t1); ?></h4><?php endif; ?>
          <?php if (!empty($about_c2_p1)) : ?><p><?php echo esc_html($about_c2_p1); ?></p><?php endif; ?>
          <?php if (!empty($about_c2_t2)) : ?><h4><?php echo esc_html($about_c2_t2); ?></h4><?php endif; ?>
          <?php if (!empty($about_c2_p2)) : ?><p><?php echo esc_html($about_c2_p2); ?></p><?php endif; ?>
          <?php if (!empty($phone)) : ?>
            <a class="btn btn-ghost" href="<?php echo esc_url(expertcare_get_phone_url()); ?>" target="_blank" rel="noopener noreferrer" style="margin-top:8px"><?php echo esc_html($phone); ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- FAQ SECTION -->
  <?php if (!empty($home_faqs)) : ?>
  <section class="section section--tight" id="faq">
    <div class="wrap">
      <div class="reveal">
        <span class="eyebrow">
          <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
          Common Questions
        </span>
        <h2 class="section-title">Helpful <em>clarifications.</em></h2>
      </div>

      <div class="faq-list reveal">
        <?php foreach ($home_faqs as $faq) : ?>
          <?php if (!empty($faq['q'])) : ?>
            <div class="faq-item">
              <button class="faq-q" type="button"><?php echo esc_html($faq['q']); ?><span class="pm"></span></button>
              <div class="faq-a">
                <p><?php echo esc_html($faq['a'] ?? ''); ?></p>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- QUOTE FORM SECTION -->
  <section class="section quote" id="quote">
    <div class="wrap quote-grid">
      <div class="reveal">
        <span class="eyebrow">
          <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
          Get Started
        </span>
        <h2 class="section-title">Tell us about <em>your property.</em></h2>
        <p class="section-lead">Share a few quick specifics and receive a clear, tailored proposal. We operate around the clock, 7 days a week. Want to speak directly? Select your preferred channel below.</p>
        
        <div class="contact-opt">
          <?php if (!empty($phone)) : ?>
            <a class="copt" href="<?php echo esc_url(expertcare_get_phone_url()); ?>" target="_blank" rel="noopener noreferrer">
              <span class="ic">
                <svg viewBox="0 0 24 24" width="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92Z"/>
                </svg>
              </span>
              <div><b>Call <?php echo esc_html($phone); ?></b><small>Direct phone line · 24/7</small></div>
            </a>
          <?php endif; ?>

          <a class="copt" href="<?php echo esc_url(expertcare_get_whatsapp_url("Hi Expertcare Cleaning, I'd like a cleaning quote please.")); ?>" target="_blank" rel="noopener noreferrer">
            <span class="ic">
              <svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2a10 10 0 0 0-8.5 15.3L2 22l4.8-1.5A10 10 0 1 0 12 2Zm5.3 13.9c-.2.6-1.3 1.2-1.8 1.2-.5.1-1 .1-1.6-.1-.4-.1-.9-.3-1.5-.6-2.7-1.2-4.4-3.9-4.5-4.1-.1-.2-1.1-1.4-1.1-2.7s.7-1.9 .9-2.1c.2-.2.5-.3.6-.3h.5c.2 0 .4 0 .6.5l.7 1.7c.1.2.1.4 0 .5l-.3.5-.3.3c-.1.1-.3.3-.1.5.1.3.7 1.1 1.4 1.8.9.8 1.7 1 2 1.2.2.1.4.1.5-.1l.6-.7c.2-.2.3-.2.6-.1l1.6.8c.3.1.4.2.5.3.1.2.1.6-.1 1.1Z"/>
              </svg>
            </span>
            <div><b>WhatsApp Us Directly</b><small>Immediate chat · 24/7</small></div>
          </a>
        </div>
      </div>

      <div class="form-card reveal">
        <div class="fh">Request Your Estimate</div>
        <p class="fnote">Submit your requirements and receive a prompt, tailored quotation and schedule options — typically within minutes.</p>
        
        <div id="quoteFormNotice" style="display:none;margin-bottom:16px;padding:12px 14px;border-radius:8px;font-size:13.5px;font-weight:600;"></div>

        <form id="quoteForm" enctype="multipart/form-data">
          <?php wp_nonce_field('expertcare_quote_nonce_action', 'quote_nonce'); ?>
          <input type="hidden" name="action" value="submit_expertcare_quote">
          <p class="hp" style="display:none !important;"><label>Leave empty: <input name="bot-field"></label></p>
          
          <div class="frow">
            <div class="field"><label>First name</label><input name="name" required placeholder="e.g. Alex" autocomplete="name"></div>
            <div class="field"><label>Postcode</label><input name="postcode" required placeholder="e.g. N1 7AA" autocomplete="postal-code"></div>
          </div>
          <div class="field"><label>Phone number</label><input name="phone" type="tel" required placeholder="07…" autocomplete="tel"></div>
          
          <div class="field">
            <label>Service</label>
            <select name="service" required>
              <option value="">Choose one</option>
              <option value="Regular cleaning">Regular cleaning</option>
              <option value="Airbnb Turnover Clean">Airbnb Turnover Cleaning</option>
              <option value="Deep clean">Deep clean</option>
              <option value="End of tenancy (move-in / move-out)">End of tenancy (move-in / move-out)</option>
              <option value="Commercial Cleaning">Commercial Cleaning</option>
              <option value="Oven Cleaning">Oven Cleaning</option>
              <option value="Upholstery & Sofa Cleaning">Upholstery & Sofa Cleaning</option>
              <option value="Inside Windows Cleaning">Inside Windows Cleaning</option>
              <option value="Not sure — please advise">Not sure — please advise</option>
            </select>
          </div>

          <div class="field">
            <label>Why are you looking for a clean?</label>
            <select name="reason">
              <option value="">Choose one</option>
              <option value="Moving in / out (end of tenancy)">Moving in / out (end of tenancy)</option>
              <option value="Landlord / letting agent requirement">Landlord / letting agent requirement</option>
              <option value="Airbnb / short-let guest turnaround">Airbnb / short-let guest turnaround</option>
              <option value="One-off refresh or spring clean">One-off refresh or spring clean</option>
              <option value="Regular ongoing cleaning">Regular ongoing cleaning</option>
              <option value="Preparing to sell or let the property">Preparing to sell or let the property</option>
              <option value="After building or renovation work">After building or renovation work</option>
              <option value="Special occasion / guests visiting">Special occasion / guests visiting</option>
              <option value="Other (tell us below)">Other (tell us below)</option>
            </select>
          </div>

          <div class="frow">
            <div class="field">
              <label>Bedrooms</label>
              <select name="bedrooms">
                <option value="">Select</option>
                <option value="Studio / 1 bed">Studio / 1 bed</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5+">5+</option>
              </select>
            </div>
            <div class="field">
              <label>Bathrooms / toilets</label>
              <select name="bathrooms">
                <option value="">Select</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4+">4+</option>
              </select>
            </div>
          </div>

          <div class="frow">
            <div class="field">
              <label>Kitchens</label>
              <select name="kitchens">
                <option value="">Select</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3+">3+</option>
              </select>
            </div>
            <div class="field">
              <label>Living rooms</label>
              <select name="living_rooms">
                <option value="">Select</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3+">3+</option>
              </select>
            </div>
          </div>

          <div class="frow">
            <div class="field">
              <label>Other rooms (study, utility…)</label>
              <select name="other_rooms">
                <option value="">Select</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3+">3+</option>
              </select>
            </div>
            <div class="field">
              <label>Floors</label>
              <select name="floors">
                <option value="">Select</option>
                <option value="1 (flat / single floor)">1 (flat / single floor)</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4+">4+</option>
              </select>
            </div>
          </div>

          <div class="field">
            <label>Parking availability</label>
            <select name="parking">
              <option value="">Select</option>
              <option value="Free parking available">Free parking available</option>
              <option value="Paid parking / permit">Paid parking / permit</option>
              <option value="No parking available">No parking available</option>
              <option value="Not sure">Not sure</option>
            </select>
          </div>

          <div class="field">
            <label>Photos of your property (optional)</label>
            <input type="file" name="photos[]" accept="image/*" multiple>
            <small style="display:block;color:var(--muted-dim);font-size:.74rem;margin-top:6px">Attach key room images — cookers, bathrooms, living areas.</small>
          </div>

          <div class="field">
            <label>Anything else? (dates, linen instructions, parking details...)</label>
            <textarea name="notes" placeholder="Include any details that assist us in preparing an accurate quote."></textarea>
          </div>

          <button class="btn btn-primary" type="submit" id="formSubmitBtn">Request My Quote →</button>
          
          <div class="or-wa">or</div>
          <button class="btn btn-wa" type="button" id="waCompose">Send My Details on WhatsApp</button>
          
          <div class="form-foot">Zero obligation · Your details remain strictly confidential</div>
        </form>
      </div>
    </div>
  </section>

  <!-- DEDICATED CONTACT US SECTION AT THE BOTTOM -->
  <section class="section contact-section" id="contact" style="background:var(--black);border-top:1px solid var(--line);border-bottom:1px solid var(--line)">
    <div class="wrap">
      <div class="reveal" style="text-align:center">
        <span class="eyebrow" style="justify-content:center">
          <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
          Direct Communication
        </span>
        <h2 class="section-title">Get in Touch with <em>Expertcare Cleaning.</em></h2>
        <p class="section-lead" style="margin:16px auto 0">Reach out directly to our central London operations and dispatch desk. We are on hand 24 hours a day, 7 days a week.</p>
      </div>

      <div class="contact-grid reveal" style="display:grid;grid-template-columns:repeat(4,1fr);gap:20px;margin-top:40px">
        <!-- Direct Phone -->
        <div class="contact-card-box" style="background:var(--ink);border:1px solid var(--line);border-radius:16px;padding:26px 20px;display:flex;flex-direction:column">
          <div class="c-icon" style="width:46px;height:46px;border-radius:12px;background:rgba(47,147,204,.14);display:flex;align-items:center;justify-content:center;color:var(--blue);margin-bottom:16px">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          </div>
          <h4 style="font-family:var(--display);font-size:1.1rem;font-weight:600;margin-bottom:6px">Call Direct</h4>
          <p style="color:var(--muted);font-size:.86rem;margin-bottom:12px">Rapid telephone bookings &amp; urgent turnover requests.</p>
          <?php if (!empty($phone)) : ?>
            <a href="<?php echo esc_url(expertcare_get_phone_url()); ?>" target="_blank" rel="noopener noreferrer" style="font-weight:600;color:var(--blue);font-size:.92rem"><?php echo esc_html($phone); ?></a>
          <?php endif; ?>
        </div>

        <!-- WhatsApp Support -->
        <div class="contact-card-box" style="background:var(--ink);border:1px solid var(--line);border-radius:16px;padding:26px 20px;display:flex;flex-direction:column">
          <div class="c-icon" style="width:46px;height:46px;border-radius:12px;background:rgba(47,147,204,.14);display:flex;align-items:center;justify-content:center;color:var(--blue);margin-bottom:16px">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 0 0-8.5 15.3L2 22l4.8-1.5A10 10 0 1 0 12 2Zm5.3 13.9c-.2.6-1.3 1.2-1.8 1.2-.5.1-1 .1-1.6-.1-.4-.1-.9-.3-1.5-.6-2.7-1.2-4.4-3.9-4.5-4.1-.1-.2-1.1-1.4-1.1-2.7s.7-1.9 .9-2.1c.2-.2.5-.3.6-.3h.5c.2 0 .4 0 .6.5l.7 1.7c.1.2.1.4 0 .5l-.3.5-.3.3c-.1.1-.3.3-.1.5.1.3.7 1.1 1.4 1.8.9.8 1.7 1 2 1.2.2.1.4.1.5-.1l.6-.7c.2-.2.3-.2.6-.1l1.6.8c.3.1.4.2.5.3.1.2.1.6-.1 1.1Z"/></svg>
          </div>
          <h4 style="font-family:var(--display);font-size:1.1rem;font-weight:600;margin-bottom:6px">WhatsApp</h4>
          <p style="color:var(--muted);font-size:.86rem;margin-bottom:12px">Fast messaging, instant estimates &amp; property photo reviews.</p>
          <a href="<?php echo esc_url(expertcare_get_whatsapp_url("Hi Expertcare Cleaning, I'd like a cleaning quote please.")); ?>" target="_blank" rel="noopener noreferrer" style="font-weight:600;color:var(--blue);font-size:.92rem">Chat on WhatsApp</a>
        </div>

        <!-- Email Inquiries -->
        <div class="contact-card-box" style="background:var(--ink);border:1px solid var(--line);border-radius:16px;padding:26px 20px;display:flex;flex-direction:column">
          <div class="c-icon" style="width:46px;height:46px;border-radius:12px;background:rgba(47,147,204,.14);display:flex;align-items:center;justify-content:center;color:var(--blue);margin-bottom:16px">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
          </div>
          <h4 style="font-family:var(--display);font-size:1.1rem;font-weight:600;margin-bottom:6px">Email Inquiries</h4>
          <p style="color:var(--muted);font-size:.86rem;margin-bottom:12px">Send tenancy checklists, job scopes &amp; bespoke requirements.</p>
          <?php if (!empty($contact_email)) : ?>
            <a href="<?php echo esc_url('mailto:' . antispambot($contact_email)); ?>" target="_blank" rel="noopener noreferrer" style="font-weight:600;color:var(--blue);font-size:.92rem">Email Us</a>
          <?php endif; ?>
        </div>

        <!-- Service Hours & Area -->
        <div class="contact-card-box" style="background:var(--ink);border:1px solid var(--line);border-radius:16px;padding:26px 20px;display:flex;flex-direction:column">
          <div class="c-icon" style="width:46px;height:46px;border-radius:12px;background:rgba(47,147,204,.14);display:flex;align-items:center;justify-content:center;color:var(--blue);margin-bottom:16px">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          </div>
          <h4 style="font-family:var(--display);font-size:1.1rem;font-weight:600;margin-bottom:6px">London-Wide Coverage</h4>
          <p style="color:var(--muted);font-size:.86rem;margin-bottom:12px">Available 24 hours a day, 7 days a week.</p>
          <a href="<?php echo esc_url(home_url('#areas')); ?>" style="font-weight:600;color:var(--blue);font-size:.92rem">All London Boroughs</a>
        </div>
      </div>
    </div>
  </section>

<?php get_footer(); ?>