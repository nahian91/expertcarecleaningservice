<?php
/**
 * Template Name: Inside Windows Cleaning
 *
 * @package Expertcare_Cleaning
 */

get_header(); ?>

<style>
  /* Internal CSS for Inside Windows Service Page */
  .page-hero{position:relative;padding:64px 0 54px;border-bottom:1px solid var(--color-border,#e2e8f0);background:linear-gradient(180deg,#ffffff,var(--color-bg-light,#f8fafc))}
  .page-hero::before{content:"";position:absolute;top:-140px;right:-80px;width:480px;height:480px;background:radial-gradient(circle,rgba(47,147,204,.18),transparent 65%);pointer-events:none}
  .crumb{font-size:.85rem;color:var(--color-muted,#94a3b8);margin-bottom:16px}
  .crumb a{color:var(--color-text,#475569);transition:color .2s}
  .crumb a:hover{color:var(--color-primary,#0066cc)}
  .crumb span{color:var(--color-primary,#0066cc);font-weight:500}
  .page-hero h1{font-family:var(--font-heading,'Poppins',sans-serif);font-weight:700;font-size:clamp(2rem,3.8vw,2.8rem);line-height:1.2;letter-spacing:-.01em;margin-top:10px;color:var(--color-dark,#0f172a)}
  .page-hero h1 .shine{color:var(--color-primary,#0066cc)}
  .page-hero p.sub{color:var(--color-text,#475569);font-size:1.15rem;margin-top:16px;max-width:58ch}

  .split{display:grid;grid-template-columns:1.1fr .9fr;gap:48px;align-items:start}
  .prose h3{font-family:var(--font-heading,'Poppins',sans-serif);font-weight:600;font-size:1.35rem;margin:32px 0 8px;color:var(--color-primary,#0066cc)}
  .prose h3:first-child{margin-top:0}
  .prose p{color:var(--color-text,#475569);font-size:1rem;margin-bottom:16px;line-height:1.7}
  .split-actions{display:flex;gap:14px;margin-top:28px;flex-wrap:wrap}

  .incl{background:var(--color-white,#ffffff);border:1px solid var(--color-border,#e2e8f0);border-radius:16px;padding:34px;box-shadow:var(--shadow-dropdown,0 12px 30px -4px rgba(15,23,42,.12));position:sticky;top:90px}
  .incl h3{font-family:var(--font-heading,'Poppins',sans-serif);font-weight:700;font-size:1.45rem;margin-bottom:6px;color:var(--color-dark,#0f172a)}
  .incl .pr{font-family:var(--font-heading,'Poppins',sans-serif);color:var(--color-primary,#0066cc);font-weight:600;font-size:1.05rem;margin-bottom:20px}
  .incl .checklist-title{font-size:.84rem;font-weight:600;text-transform:uppercase;letter-spacing:.08em;color:var(--color-muted,#94a3b8);margin-bottom:14px}
  .incl ul{list-style:none;display:flex;flex-direction:column;gap:11px;padding:0;margin:0}
  .incl li{display:flex;gap:12px;font-size:.9rem;color:var(--color-text,#475569);font-weight:500;line-height:1.35}
  .incl li .ck{width:16px;height:16px;flex:none;margin-top:2px;stroke:var(--color-primary,#0066cc)}
  .incl .btn{width:100%;margin-top:24px}

  /* Two Equal Column Layout for Showcase & FAQ */
  .showcase-faq-section{padding-top:0}
  .showcase-faq-grid{display:grid;grid-template-columns:1fr 1fr;gap:48px;align-items:start}
  .col-block-head{margin-bottom:24px}
  .col-block-head .section-title{font-size:clamp(1.6rem,2.5vw,2.1rem);margin-top:8px}

  /* Work Showcase: 2-Column Inner Images */
  .work-grid-two-col{display:grid;grid-template-columns:repeat(2,1fr);gap:14px}
  .work-card{position:relative;border-radius:14px;overflow:hidden;border:1px solid var(--color-border,#e2e8f0);aspect-ratio:1/1;margin:0}
  .work-card img{width:100%;height:100%;object-fit:cover;display:block;transition:transform .55s ease}
  .work-card:hover img{transform:scale(1.06)}
  .work-card figcaption{position:absolute;left:0;right:0;bottom:0;padding:26px 12px 10px;font-size:.8rem;font-weight:600;color:#fff;background:linear-gradient(to top,rgba(5,8,11,.88),transparent)}

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
        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> / <a href="<?php echo esc_url(home_url('#services')); ?>">Services</a> / <span>Inside Windows Cleaning</span>
      </div>
      <span class="eyebrow">
        <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
        Bespoke Detailing · Interior Glazing
      </span>
      <h1>Interior window detailing, <span class="shine">flawless optical clarity.</span></h1>
      <p class="sub">Smudge-free internal glass, debris-free track channels, washed framework, and immaculately wiped sills that flood your London property with unhindered natural light.</p>
    </div>
  </section>

  <!-- WHAT'S INCLUDED / SERVICE BREAKDOWN SPLIT -->
  <section class="section">
    <div class="wrap split">
      <!-- Left: Prose Description -->
      <div class="prose reveal in">
        <h3>Scope of service.</h3>
        <p>Airborne dust, airborne grease from cooking, paw prints, and atmospheric moisture steadily leave an unsightly, light-blocking haze across interior panes. Our internal glazing treatment eliminates film and residue using anti-static glass formulas, edge-to-edge lintless microfibres, and comprehensive treatment of sashes, rubber gaskets, and runners.</p>

        <h3>Recommended for</h3>
        <p>Residents seeking brighter natural spaces, properties with extensive architectural glazing or bi-folding systems, rental handovers preparing for strict inventory inspections, and short-stay hosts wanting five-star presentation.</p>

        <h3>Arranging your clean</h3>
        <p>Simply indicate your room count, glazing types, or specialized door configurations (such as sliding or French panels). This treatment is available as a solo specialist appointment or as a discounted bolt-on alongside our routine, deep reset, or checkout cleaning services.</p>

        <div class="split-actions">
          <a class="btn btn-primary" href="<?php echo esc_url(home_url('#quote')); ?>">Request Window Quote</a>
          <a class="btn btn-ghost" href="https://api.whatsapp.com/send?phone=447919033684&text=Hi%20Expertcare%20Cleaning%2C%20I%27d%20like%20an%20inside%20windows%20quote%20please." target="_blank" rel="noopener noreferrer">WhatsApp us →</a>
        </div>
      </div>

      <!-- Right: Boxed Checklist Card with All Items -->
      <aside class="incl reveal in">
        <h3>Internal Glazing Care</h3>
        <div class="pr">Custom quotation · individual panes or full property packages</div>
        
        <div class="checklist-title">Glazing Checklist Specification:</div>
        <ul>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Edge-to-edge streak-free glass polish
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Elimination of grease haze, water stains &amp; smudges
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Detailed cleaning of internal sashes, jambs &amp; corners
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Sanitising and wiping interior ledges and sill boards
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Extraction of accumulated grit &amp; grime from sliding runners
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Bi-fold panels, patio sliders &amp; terrace entryway glass
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Interior architectural partitions &amp; mezzanine glass panels
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Rigorous optical review under direct illumination
          </li>
        </ul>

        <a class="btn btn-primary" href="<?php echo esc_url(home_url('#quote')); ?>">Book Window Clean</a>
      </aside>
    </div>
  </section>

  <!-- 2-COLUMN EQUAL SECTION: WORK SHOWCASE & FAQ -->
  <section class="section showcase-faq-section">
    <div class="wrap">
      <div class="showcase-faq-grid">
        
        <!-- Left Column: Work Showcase with 2-Column Images -->
        <div class="showcase-col reveal">
          <div class="col-block-head">
            <span class="eyebrow">
              <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
              Work Showcase
            </span>
            <h2 class="section-title">Visuals from <em>recent glass cleans.</em></h2>
            <p class="section-lead" style="margin-top: 10px;">Verified photographic records from interior glass detailing projects across London residences.</p>
          </div>

          <div class="work-grid-two-col">
            <figure class="work-card">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/gallery-1.jpg" loading="lazy">
            <figure class="work-card">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/gallery-7.jpg" loading="lazy">
            </figure>
            <figure class="work-card">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/gallery-8.jpg" loading="lazy">
            </figure>
            <figure class="work-card">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/gallery-9.jpg" loading="lazy">
            </figure>
          </div>
        </div>

        <!-- Right Column: FAQ -->
        <div class="faq-col reveal">
          <div class="col-block-head">
            <span class="eyebrow">
              <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
              Common Queries
            </span>
            <h2 class="section-title">Key questions <em>answered.</em></h2>
            <p class="section-lead" style="margin-top: 10px;">Information regarding frame handling, external pane limits, and scheduling.</p>
          </div>

          <div class="faq-list">
            <div class="faq-item">
              <button class="faq-q" type="button">Does this service include external window facades?<span class="pm"></span></button>
              <div class="faq-a">
                <p>Our standard package targets internal surfaces, sills, and reachable casing. Exterior terrace panels, ground-level panes, or walk-out balcony glass can be added upon request during quotation.</p>
              </div>
            </div>

            <div class="faq-item">
              <button class="faq-q" type="button">Are the window sills, seals, and runner tracks detailed?<span class="pm"></span></button>
              <div class="faq-a">
                <p>Absolutely. We vacuum loose particulates, hand-wipe window ledges, sanitise surrounding woodwork, and clear trapped debris from sliding runners.</p>
              </div>
            </div>

            <div class="faq-item">
              <button class="faq-q" type="button">Can this be combined with regular or tenancy services?<span class="pm"></span></button>
              <div class="faq-a">
                <p>Yes. While essential spot-cleaning is part of standard resets, comprehensive whole-home internal pane detailing is easily integrated as an upgrade to any booking.</p>
              </div>
            </div>

            <div class="faq-item">
              <button class="faq-q" type="button">What solutions and tools do your technicians utilize?<span class="pm"></span></button>
              <div class="faq-a">
                <p>We deploy lint-free waffle-weave microfibres, residue-free surfactant solutions, and precision squeegees to achieve completely smear-free optical clarity.</p>
              </div>
            </div>

            <div class="faq-item">
              <button class="faq-q" type="button">Which London regions are eligible for this service?<span class="pm"></span></button>
              <div class="faq-a">
                <p>Our internal glazing specialists operate throughout all London postcodes across Central, West, North, East, and South districts.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>