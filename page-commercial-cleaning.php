<?php
/**
 * Template Name: Commercial Cleaning
 *
 * @package Expertcare_Cleaning
 */

get_header(); 

// 1. Service Identification
$service_key = 'commercial-cleaning';

// 2. Fetch Master Defaults & Live Backend Customizations
$all_configs = expertcare_get_services_config();
$svc_config  = $all_configs[$service_key] ?? [];
$svc_data    = get_option('expertcare_svc_' . $service_key . '_data', []);

// 3. Dynamic Values (Zero Fallbacks)
$eyebrow  = $svc_data['eyebrow'] ?? '';
$h1_main  = $svc_data['h1_main'] ?? '';
$h1_shine = $svc_data['h1_shine'] ?? '';
$sub      = $svc_data['sub'] ?? '';
$price    = $svc_data['price'] ?? '';

// Editorial Prose Blocks Repeater
$prose_blocks = !empty($svc_data['prose']) && is_array($svc_data['prose']) ? $svc_data['prose'] : [];

// Checklist Items
$checklist = !empty($svc_data['checklist']) && is_array($svc_data['checklist']) ? $svc_data['checklist'] : [];

// Media Gallery Images
$raw_imgs = !empty($svc_data['imgs']) && is_array($svc_data['imgs']) ? $svc_data['imgs'] : [];
$images = [];
foreach ($raw_imgs as $img) {
    if (empty($img)) continue;
    if (filter_var($img, FILTER_VALIDATE_URL)) {
        $images[] = $img;
    } else {
        $images[] = get_template_directory_uri() . '/assets/img/' . ltrim($img, '/');
    }
}

// FAQs
$faqs = !empty($svc_data['faqs']) && is_array($svc_data['faqs']) ? $svc_data['faqs'] : [];
?>

<style>
  /* Internal CSS for Commercial Cleaning Service Page */
  .page-hero{position:relative;padding:64px 0 54px;border-bottom:1px solid var(--color-border,#e2e8f0);background:linear-gradient(180deg,#ffffff,var(--color-bg-light,#f8fafc))}
  .page-hero::before{content:"";position:absolute;top:-140px;right:-80px;width:480px;height:480px;background:radial-gradient(circle,rgba(47,147,204,.18),transparent 65%);pointer-events:none}
  .crumb{font-size:.85rem;color:var(--color-muted,#94a3b8);margin-bottom:16px}
  .crumb a{color:var(--color-text,#475569);transition:color .2s}
  .crumb a:hover{color:var(--color-primary,#0066cc)}
  .crumb span{color:var(--color-primary,#0066cc);font-weight:500}
  .page-hero h1{font-family:var(--font-heading,'Poppins',sans-serif);font-weight:700;font-size:clamp(2rem,3.8vw,2.8rem);line-height:1.2;letter-spacing:-.01em;margin-top:10px;color:var(--color-dark,#0f172a)}
  .page-hero h1 .shine{color:var(--color-primary,#0066cc)}
  .page-hero p.sub{color:var(--color-text,#475569);font-size:1.15rem;margin-top:16px;max-width:58ch}

  .split{display:grid;grid-template-columns:1.05fr .95fr;gap:48px;align-items:start}
  .prose h3{font-family:var(--font-heading,'Poppins',sans-serif);font-weight:600;font-size:1.35rem;margin:32px 0 8px;color:var(--color-primary,#0066cc)}
  .prose h3:first-child{margin-top:0}
  .prose p{color:var(--color-text,#475569);font-size:1rem;margin-bottom:16px;line-height:1.7}
  .split-actions{display:flex;gap:14px;margin-top:28px;flex-wrap:wrap}

  .incl{background:var(--color-white,#ffffff);border:1px solid var(--color-border,#e2e8f0);border-radius:16px;padding:34px;box-shadow:var(--shadow-dropdown,0 12px 30px -4px rgba(15,23,42,.12));position:sticky;top:90px}
  .incl h3{font-family:var(--font-heading,'Poppins',sans-serif);font-weight:700;font-size:1.45rem;margin-bottom:6px;color:var(--color-dark,#0f172a)}
  .incl .pr{font-family:var(--font-heading,'Poppins',sans-serif);color:var(--color-primary,#0066cc);font-weight:600;font-size:1.05rem;margin-bottom:20px}
  .incl .checklist-title{font-size:.84rem;font-weight:600;text-transform:uppercase;letter-spacing:.08em;color:var(--color-muted,#94a3b8);margin-bottom:14px}
  .incl ul{list-style:none;display:flex;flex-direction:column;gap:10px;padding:0;margin:0}
  .incl li{display:flex;gap:12px;font-size:.88rem;color:var(--color-text,#475569);font-weight:500;line-height:1.35}
  .incl li .ck{width:16px;height:16px;flex:none;margin-top:2px;stroke:var(--color-primary,#0066cc)}
  .incl .btn{width:100%;margin-top:24px}

  /* Two Equal Column Layout for Showcase & FAQ */
  .showcase-faq-section{padding-top:0}
  .showcase-faq-grid{display:grid;grid-template-columns:1fr 1fr;gap:48px;align-items:start}
  .col-block-head{margin-bottom:24px}
  .col-block-head .section-title{font-size:clamp(1.6rem,2.5vw,2.1rem);margin-top:8px}

  /* Workplace Showcase: 2-Column Inner Images */
  .work-grid-two-col{display:grid;grid-template-columns:repeat(2,1fr);gap:14px}
  .work-card{position:relative;border-radius:14px;overflow:hidden;border:1px solid var(--color-border,#e2e8f0);aspect-ratio:1/1;margin:0;background:#f8fafc}
  .work-card img{width:100%;height:100%;object-fit:cover;display:block;transition:transform .55s ease}
  .work-card:hover img{transform:scale(1.06)}

  /* FAQ Accordion List */
  .faq-list{border-top:1px solid var(--color-border,#e2e8f0)}
  .faq-item{border-bottom:1px solid var(--color-border,#e2e8f0)}
  .faq-q{width:100%;text-align:left;background:none;border:0;cursor:pointer;color:var(--color-dark,#0f172a);font-family:var(--font-heading,'Poppins',sans-serif);font-weight:600;font-size:1.05rem;padding:20px 0;display:flex;justify-content:space-between;align-items:center;gap:18px}
  .faq-q .pm{flex:none;width:22px;height:22px;position:relative;transition:transform .3s}
  .faq-q .pm::before,.faq-q .pm::after{content:"";position:absolute;background:var(--color-primary,#0066cc);border-radius:2px;top:50%;left:50%;transform:translate(-50%,-50%)}
  .faq-q .pm::before{width:13px;height:2px}
  .faq-q .pm::after{width:2px;height:13px;transition:transform .3s}
  .faq-item.open .pm::after{transform:translate(-50%,-50%) rotate(90deg);opacity:0}
  .faq-a{max-height:0;overflow:hidden;transition:max-height .35s ease}
  .faq-a p{color:var(--color-text,#475569);padding-bottom:20px;font-size:.94rem;line-height:1.6;margin:0}

  @media(max-width:980px){
    .split{grid-template-columns:1fr;gap:36px}
    .incl{position:static}
    .showcase-faq-grid{grid-template-columns:1fr;gap:48px}
  }
  @media(max-width:560px){
    .work-grid-two-col{grid-template-columns:1fr}
  }
</style>

<main>
  <!-- PAGE HERO -->
  <section class="page-hero">
    <div class="wrap">
      <div class="crumb">
        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> / <a href="<?php echo esc_url(home_url('#services')); ?>">Services</a> / <span><?php echo esc_html($svc_config['title'] ?? ''); ?></span>
      </div>
      <?php if (!empty($eyebrow)) : ?>
        <span class="eyebrow">
          <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
          <?php echo esc_html($eyebrow); ?>
        </span>
      <?php endif; ?>

      <?php if (!empty($h1_main) || !empty($h1_shine)) : ?>
        <h1><?php echo esc_html($h1_main); ?> <?php if (!empty($h1_shine)) : ?><span class="shine"><?php echo esc_html($h1_shine); ?></span><?php endif; ?></h1>
      <?php endif; ?>

      <?php if (!empty($sub)) : ?>
        <p class="sub"><?php echo esc_html($sub); ?></p>
      <?php endif; ?>
    </div>
  </section>

  <!-- WHAT'S INCLUDED / SERVICE BREAKDOWN SPLIT -->
  <section class="section">
    <div class="wrap split">
      <!-- Left: Dynamic Editorial Prose Blocks Repeater -->
      <div class="prose reveal in">
        <?php if (!empty($prose_blocks)) : ?>
          <?php foreach ($prose_blocks as $block) : ?>
            <?php if (!empty($block['title'])) : ?>
              <h3><?php echo esc_html($block['title']); ?></h3>
            <?php endif; ?>
            <?php if (!empty($block['body'])) : ?>
              <p><?php echo nl2br(esc_html($block['body'])); ?></p>
            <?php endif; ?>
          <?php endforeach; ?>
        <?php endif; ?>

        <div class="split-actions">
          <a class="btn btn-primary" href="<?php echo esc_url(home_url('#quote')); ?>">Request Commercial Quote</a>
          <a class="btn btn-ghost" href="<?php echo esc_url(expertcare_get_whatsapp_url("Hi Expertcare Cleaning, I'd like a commercial cleaning quote please.")); ?>" target="_blank" rel="noopener noreferrer">WhatsApp us →</a>
        </div>
      </div>

      <!-- Right: Dynamic Boxed Checklist Card -->
      <?php if (!empty($svc_config['title']) || !empty($checklist)) : ?>
      <aside class="incl reveal in">
        <?php if (!empty($svc_config['title'])) : ?>
          <h3><?php echo esc_html($svc_config['title']); ?></h3>
        <?php endif; ?>
        
        <?php if (!empty($price)) : ?>
          <div class="pr"><?php echo esc_html($price); ?></div>
        <?php endif; ?>
        
        <?php if (!empty($checklist)) : ?>
          <div class="checklist-title">Checklist Protocol Included:</div>
          <ul>
            <?php foreach ($checklist as $item) : ?>
              <?php if (!empty(trim($item))) : ?>
                <li>
                  <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
                  <?php echo esc_html($item); ?>
                </li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>

        <a class="btn btn-primary" href="<?php echo esc_url(home_url('#quote')); ?>">Book Commercial Clean</a>
      </aside>
      <?php endif; ?>
    </div>
  </section>

  <!-- 2-COLUMN EQUAL SECTION: WORK SHOWCASE & FAQ -->
  <?php if (!empty($images) || !empty($faqs)) : ?>
  <section class="section showcase-faq-section">
    <div class="wrap">
      <div class="showcase-faq-grid">
        
        <!-- Left Column: Work Showcase -->
        <?php if (!empty($images)) : ?>
        <div class="showcase-col reveal">
          <div class="col-block-head">
            <span class="eyebrow">
              <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
              Workplace Standards
            </span>
            <h2 class="section-title">Results from <em>commercial spaces.</em></h2>
            <p class="section-lead" style="margin-top: 10px;">Photographs from ongoing commercial contracts across Central London and surrounding boroughs.</p>
          </div>

          <div class="work-grid-two-col">
            <?php foreach ($images as $img_url) : ?>
              <figure class="work-card">
                <img src="<?php echo esc_url($img_url); ?>" alt="Completed commercial workspace cleaning" loading="lazy">
              </figure>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>

        <!-- Right Column: FAQ -->
        <?php if (!empty($faqs)) : ?>
        <div class="faq-col reveal">
          <div class="col-block-head">
            <span class="eyebrow">
              <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
              Common Inquiries
            </span>
            <h2 class="section-title">Essential <em>details &amp; policies.</em></h2>
            <p class="section-lead" style="margin-top: 10px;">Operational hours, vetting guarantees, and replenishment terms.</p>
          </div>

          <div class="faq-list">
            <?php foreach ($faqs as $faq) : ?>
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
        <?php endif; ?>

      </div>
    </div>
  </section>
  <?php endif; ?>
</main>

<?php get_footer(); ?>