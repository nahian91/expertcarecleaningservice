<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#ffffff">
  <meta name="color-scheme" content="light only">

  <script>document.documentElement.classList.add("js")</script>

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

  <div class="announce">
    <span>★ <b><?php bloginfo('name'); ?></b> · Fully Insured · Domestic &amp; Airbnb Cleaners · Serving London</span>
  </div>

  <header class="header" id="header">
    <div class="wrap nav">
      <a class="brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr(get_bloginfo('name')); ?> home">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/logo.png" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
      </a>

      <!-- Desktop Navigation -->
      <nav class="nav-links">
        <div class="nav-item has-dropdown">
          <button class="nav-top" type="button">
            Services
            <svg class="nav-caret" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round">
              <path d="M6 9l6 6 6-6"/>
            </svg>
          </button>
          <div class="dropdown">
  <a href="<?php echo esc_url(home_url('/services/')); ?>">All services</a>
  <a href="<?php echo esc_url(home_url('/regular-cleaning/')); ?>">Regular Cleaning</a>
  <a href="<?php echo esc_url(home_url('/airbnb-cleaning/')); ?>">Airbnb Turnover Cleaning</a>
  <a href="<?php echo esc_url(home_url('/deep-cleaning/')); ?>">Deep Clean</a>
  <a href="<?php echo esc_url(home_url('/tenancy-cleaning/')); ?>">End of Tenancy</a>
  <a href="<?php echo esc_url(home_url('/oven-cleaning/')); ?>">Oven Cleaning</a>
  <a href="<?php echo esc_url(home_url('/sofa-cleaning/')); ?>">Upholstery &amp; Sofa</a>
  <a href="<?php echo esc_url(home_url('/inside-windows/')); ?>">Inside Windows</a>
</div>
        </div>
        <a href="<?php echo esc_url(home_url('#why')); ?>">Why Us</a>
        <a href="<?php echo esc_url(home_url('#reviews')); ?>">Reviews</a>
        <a href="<?php echo esc_url(home_url('#areas')); ?>">Areas</a>
        <a href="<?php echo esc_url(home_url('#faq')); ?>">FAQ</a>
        <a href="<?php echo esc_url(home_url('#quote')); ?>">Contact</a>
      </nav>

      <div class="nav-cta">
        <a class="btn btn-primary" href="tel:07919033684">07919 033684</a>
      </div>

      <button class="burger" id="burger" aria-label="Open menu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </header>

  <!-- Mobile Drawer -->
  <div class="mobile-menu" id="mobileMenu">
    <button class="mobile-close" id="mClose" aria-label="Close menu">×</button>
    <a href="<?php echo esc_url(home_url('#services')); ?>">Services</a>
    <a class="mobile-sub" href="<?php echo esc_url(home_url('/regular-cleaning/')); ?>">Regular Cleaning</a>
    <a class="mobile-sub" href="<?php echo esc_url(home_url('/airbnb-cleaning/')); ?>">Airbnb Turnover Cleaning</a>
    <a class="mobile-sub" href="<?php echo esc_url(home_url('/deep-cleaning/')); ?>">Deep Clean</a>
    <a class="mobile-sub" href="<?php echo esc_url(home_url('/tenancy-cleaning/')); ?>">End of Tenancy</a>
    <a class="mobile-sub" href="<?php echo esc_url(home_url('/oven-cleaning/')); ?>">Oven Cleaning</a>
    <a class="mobile-sub" href="<?php echo esc_url(home_url('/sofa-cleaning/')); ?>">Upholstery &amp; Sofa</a>
    <a class="mobile-sub" href="<?php echo esc_url(home_url('/inside-windows/')); ?>">Inside Windows</a>
    <a href="<?php echo esc_url(home_url('#why')); ?>">Why Us</a>
    <a href="<?php echo esc_url(home_url('#reviews')); ?>">Reviews</a>
    <a href="<?php echo esc_url(home_url('#areas')); ?>">Areas</a>
    <a href="<?php echo esc_url(home_url('#faq')); ?>">FAQ</a>
    <a href="<?php echo esc_url(home_url('#quote')); ?>">Contact</a>
    <a class="btn btn-primary" href="<?php echo esc_url(home_url('#quote')); ?>">Get a Free Quote</a>
    <a class="btn btn-wa" href="https://api.whatsapp.com/send?phone=447919033684&text=Hi%20Expertcare%20Cleaning%2C%20I%27d%20like%20a%20cleaning%20quote%20please." target="_blank" rel="noopener noreferrer">WhatsApp 07919 033684</a>
  </div>