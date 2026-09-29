<?php
/**
 * Template Name: Deep Cleaning
 *
 * @package Expertcare_Cleaning
 */

get_header(); ?>

<style>
  /* Internal CSS for Deep Clean Service Page */
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

  /* Transformation Showcase: 2-Column Inner Images */
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
        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> / <a href="<?php echo esc_url(home_url('#services')); ?>">Services</a> / <span>Deep Clean</span>
      </div>
      <span class="eyebrow">
        <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
        02 · Complete Intensive Restoration
      </span>
      <h1>Comprehensive deep cleaning, <span class="shine">restoring true pristine comfort.</span></h1>
      <p class="sub">A rigorous, corner-to-corner sanitisation package targeting hardened limescale, baked-on grease, hidden dust traps, and high-frequency touch surfaces across London.</p>
    </div>
  </section>

  <!-- WHAT'S INCLUDED / SERVICE BREAKDOWN SPLIT -->
  <section class="section">
    <div class="wrap split">
      <!-- Left: Prose Description -->
      <div class="prose reveal in">
        <h3>Scope of the treatment.</h3>
        <p>A deep restorative clean targets the stubborn deposits that standard weekly routines cannot resolve. We address long-term residue head-on: high-level cobweb extraction, detailed baseboard and architrave washing, cleaning under moveable furniture, intensive degreasing of cooker hobs and backsplashes, appliance sanitisation, and complete bathroom scale removal across grout, screens, and fixtures.</p>

        <h3>Who this is for</h3>
        <p>Residences requiring a complete seasonal refresh, homes that have gone without professional maintenance for months, pre-hosting preparation, or properties setting a clean benchmark before commencing regular housekeeping visits.</p>

        <h3>Our operational process</h3>
        <p>Submit your postcode and room configuration for an all-inclusive, fixed estimate. Our operatives arrive equipped with industrial descalers, grease-dissolving formulas, and specialised extraction equipment. Every technician works systematically against our 22-point protocol, ensuring your home is left completely revitalised, hygienic, and spotless.</p>

        <div class="split-actions">
          <a class="btn btn-primary" href="<?php echo esc_url(home_url('#quote')); ?>">Request a Tailored Quote</a>
          <a class="btn btn-ghost" href="https://api.whatsapp.com/send?phone=447919033684&text=Hi%20Expertcare%20Cleaning%2C%20I%27d%20like%20a%20deep%20cleaning%20quote%20please." target="_blank" rel="noopener noreferrer">WhatsApp us →</a>
        </div>
      </div>

      <!-- Right: Boxed Checklist Card with All 22 Items -->
      <aside class="incl reveal in">
        <h3>Intensive Reset</h3>
        <div class="pr">Customised pricing · calculated to your layout</div>
        
        <div class="checklist-title">Deep Reset Checklist Included:</div>
        <ul>
          <li><svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>Detailed dusting of all accessible surfaces</li>
          <li><svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>Removing cobwebs from ceilings, corners &amp; walls</li>
          <li><svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>Deep cleaning skirting boards, edges &amp; corners</li>
          <li><svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>Cleaning doors, door frames, handles &amp; switches</li>
          <li><svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>Cleaning window sills, frames &amp; accessible interior glass</li>
          <li><svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>Cleaning behind and underneath accessible furniture</li>
          <li><svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>Detailed vacuuming of carpets, rugs &amp; upholstery</li>
          <li><svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>Deep mopping of hard floors</li>
          <li><svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>Degreasing kitchen surfaces, hobs &amp; splashbacks</li>
          <li><svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>Deep cleaning fridges, ovens &amp; microwaves</li>
          <li><svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>Cleaning inside and outside accessible cupboards &amp; drawers</li>
          <li><svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>Deep cleaning showers, baths, sinks &amp; bathroom surfaces</li>
          <li><svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>Thorough toilet cleaning &amp; sanitising</li>
          <li><svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>Cleaning mirrors and glass surfaces</li>
          <li><svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>Bed making &amp; fresh linen changing</li>
          <li><svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>Washing, drying &amp; folding laundry</li>
          <li><svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>Emptying bins &amp; replacing bin liners</li>
          <li><svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>Cleaning soap holders, taps &amp; bathroom accessories</li>
          <li><svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>Dusting accessible light fittings &amp; lamps</li>
          <li><svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>Wiping tables, chairs &amp; other furniture</li>
          <li><svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>Extra attention to high-touch and frequently missed areas</li>
          <li><svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>Final detailed check throughout the property</li>
        </ul>

        <a class="btn btn-primary" href="<?php echo esc_url(home_url('#quote')); ?>">Book this clean</a>
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
              Transformation Showcase
            </span>
            <h2 class="section-title">Visual evidence from <em>completed resets.</em></h2>
            <p class="section-lead" style="margin-top: 10px;">Documented before-and-after restorations across London residences.</p>
          </div>

          <div class="work-grid-two-col">
            <figure class="work-card">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/gallery-10.jpg" loading="lazy">
            </figure>
            <figure class="work-card">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/gallery-9.jpg" loading="lazy">
            </figure>
            <figure class="work-card">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/gallery-8.jpg" loading="lazy">
            </figure>
            <figure class="work-card">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/gallery-1.jpg" loading="lazy">
              <figcaption>Refreshed Living Zone &amp; Flooring</figcaption>
            </figure>
          </div>
        </div>

        <!-- Right Column: FAQ -->
        <div class="faq-col reveal">
          <div class="col-block-head">
            <span class="eyebrow">
              <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
              Common Inquiries
            </span>
            <h2 class="section-title">Essential <em>details &amp; policies.</em></h2>
            <p class="section-lead" style="margin-top: 10px;">Everything you need to know about our restorative protocols and expectations.</p>
          </div>

          <div class="faq-list">
            <div class="faq-item">
              <button class="faq-q" type="button">What differentiates a deep clean from ongoing maintenance?<span class="pm"></span></button>
              <div class="faq-a">
                <p>Routine housekeeping sustains day-to-day tidiness, whereas our deep reset removes stubborn, embedded contaminants: calcified limescale, high-level cobwebs, scuffs on baseboards, switches, dirt traps behind moveable furniture, internal appliance degreasing, and intensive tile grout revival.</p>
              </div>
            </div>

            <div class="faq-item">
              <button class="faq-q" type="button">Do your operatives arrive with all equipment and detergents?<span class="pm"></span></button>
              <div class="faq-a">
                <p>Yes. Our teams bring industrial-strength descaling agents, non-abrasive degreasers, HEPA filtration vacuums, and clean microfibre systems. If you prefer us to apply your own specialised solutions, we are happy to accommodate.</p>
              </div>
            </div>

            <div class="faq-item">
              <button class="faq-q" type="button">Are customers expected to shift furniture prior to your arrival?<span class="pm"></span></button>
              <div class="faq-a">
                <p>Our team cleans behind and underneath accessible freestanding pieces (such as chairs, light sofas, and dining tables). To protect flooring and personnel, we do not relocate solid structural wardrobes, pianos, or delicate entertainment units unless arranged prior to the visit.</p>
              </div>
            </div>

            <div class="faq-item">
              <button class="faq-q" type="button">What are your billing and booking deposit conditions?<span class="pm"></span></button>
              <div class="faq-a">
                <p>We require a 50% reservation deposit to secure your operational slot. The remaining 50% is settled upon final inspection and completion of the work. Appointments can be rescheduled without fee up to 48 hours in advance.</p>
              </div>
            </div>

            <div class="faq-item">
              <button class="faq-q" type="button">Which London postal districts do you service for deep cleans?<span class="pm"></span></button>
              <div class="faq-a">
                <p>We provide full deep cleaning coverage across every London borough, encompassing Central, East, West, North, and South districts.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>