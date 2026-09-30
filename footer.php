<?php
/**
 * The template for displaying the footer
 *
 * @package Expertcare_Cleaning
 */

// Global Settings
$phone    = get_option('expertcare_phone', '');
$whatsapp = get_option('expertcare_whatsapp', '447919033684');
$email    = get_option('expertcare_home_data')['contact_email'] ?? 'Expertcarecleaninglondon@gmail.com';
?>

  <footer class="footer">
    <div class="wrap">
      <div class="foot-grid">
        <div class="foot-brand">
          <h4>
            <svg class="mark" viewBox="0 0 120 120" aria-hidden="true" style="width:28px;height:28px;display:inline-block;vertical-align:middle;margin-right:4px">
              <g fill="none" stroke="currentColor" stroke-width="6" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 56 L60 24 L92 56"/><path d="M84 36 V20 H96 V46"/><path d="M30 54 V96 H90 V54"/>
                <path d="M58 60 V86"/><path d="M48 86 L52 70 H64 L68 86 Z"/><path d="M40 74 H52 M40 74 V86 H52"/>
              </g>
            </svg>
            EXPERTCARE <b>CLEANING</b>
          </h4>
          <p>Professional cleaning that truly shines — the Expertcare standard across London.</p>
        </div>

        <div class="foot-col">
          <h6>Services</h6>
          <a href="<?php echo esc_url(home_url('/regular-cleaning/')); ?>">Regular Cleaning</a>
          <a href="<?php echo esc_url(home_url('/airbnb-turnover/')); ?>">Airbnb Turnover Cleaning</a>
          <a href="<?php echo esc_url(home_url('/deep-cleaning/')); ?>">Deep Cleaning</a>
          <a href="<?php echo esc_url(home_url('/end-of-tenancy/')); ?>">End of Tenancy</a>
        </div>

        <div class="foot-col">
          <h6>Company</h6>
          <a href="<?php echo esc_url(home_url('#about-us')); ?>">About Us</a>
          <a href="<?php echo esc_url(home_url('#why-us')); ?>">Why Us</a>
          <a href="<?php echo esc_url(home_url('#reviews')); ?>">Reviews</a>
          <a href="<?php echo esc_url(home_url('#areas')); ?>">Areas We Cover</a>
          <a href="<?php echo esc_url(home_url('#contact')); ?>">Contact</a>
        </div>

        <div class="foot-col">
          <h6>Contact</h6>
          <?php if (!empty($phone)) : ?>
            <a href="<?php echo esc_url(expertcare_get_phone_url()); ?>"><?php echo esc_html($phone); ?></a>
          <?php endif; ?>
          <a href="<?php echo esc_url(expertcare_get_whatsapp_url("Hi Expertcare Cleaning, I'd like a cleaning quote please.")); ?>" target="_blank" rel="noopener noreferrer">WhatsApp us</a>
          <?php if (!empty($email)) : ?>
            <a href="<?php echo esc_url('mailto:' . antispambot($email)); ?>">
              <?php echo esc_html(antispambot($email)); ?>
            </a>
          <?php endif; ?>
          <span>Open 24 hours · 7 days</span>
        </div>
      </div>

      <div class="foot-bottom" style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:14px;">
        <!-- Moved to Left -->
        <div style="display:flex;align-items:center;gap:8px;font-size:0.85rem;font-weight:600;">
          <span style="color:var(--muted, #94a3b8);">Design &amp; Development by</span>
          <a href="https://infinityflamesoft.com" target="_blank" rel="noopener noreferrer" style="display:inline-flex;align-items:center;gap:6px;text-decoration:none;color:inherit;transition:opacity 0.2s;" onmouseover="this.style.opacity='0.8'" onmouseout="this.style.opacity='1'">
            <img src="https://infinityflamesoft.com/wp-content/themes/ifs-theme/assets/img/logo.png" alt="Infinity Flame Soft" style="height:20px;width:auto;display:block;" />
            <span style="color:var(--color-primary, #0284c7);">Infinity Flame Soft</span>
          </a>
        </div>

        <!-- Moved to Right -->
        <span style="color:var(--muted, #94a3b8);font-size:0.85rem;">© <?php echo date('Y'); ?> <?php bloginfo('name'); ?> · Serving All London Postcodes.</span>
      </div>
    </div>
  </footer>

  <!-- Floating WhatsApp CTA -->
  <a class="fab" href="<?php echo esc_url(expertcare_get_whatsapp_url("Hi Expertcare Cleaning, I'd like a cleaning quote please.")); ?>" target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp">
    <svg viewBox="0 0 24 24" fill="currentColor">
      <path d="M12 2a10 10 0 0 0-8.5 15.3L2 22l4.8-1.5A10 10 0 1 0 12 2Zm5.3 13.9c-.2.6-1.3 1.2-1.8 1.2-.5.1-1 .1-1.6-.1-.4-.1-.9-.3-1.5-.6-2.7-1.2-4.4-3.9-4.5-4.1-.1-.2-1.1-1.4-1.1-2.7s.7-1.9 .9-2.1c.2-.2.5-.3.6-.3h.5c.2 0 .4 0 .6.5l.7 1.7c.1.2.1.4 0 .5l-.3.5-.3.3c-.1.1-.3.3-.1.5.1.3.7 1.1 1.4 1.8.9.8 1.7 1 2 1.2.2.1.4.1.5-.1l.6-.7c.2-.2.3-.2.6-.1l1.6.8c.3.1.4.2.5.3.1.2.1.6-.1 1.1Z"/>
    </svg>
    <span>Chat on WhatsApp</span>
  </a>

  <?php wp_footer(); ?>
</body>
</html>