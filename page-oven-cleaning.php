<?php
/**
 * Template Name: Oven Cleaning
 *
 * @package Expertcare_Cleaning
 */

get_header(); ?>

<style>
  /* Internal CSS for Oven Cleaning Service Page */
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
  .incl ul{list-style:none;display:flex;flex-direction:column;gap:11px;padding:0;margin:0}
  .incl li{display:flex;gap:12px;font-size:.9rem;color:var(--color-text,#475569);font-weight:500;line-height:1.35}
  .incl li .ck{width:16px;height:16px;flex:none;margin-top:2px;stroke:var(--color-primary,#0066cc)}
  .incl .btn{width:100%;margin-top:24px}

  /* Two Equal Column Layout for Showcase & FAQ */
  .showcase-faq-section{padding-top:0}
  .showcase-faq-grid{display:grid;grid-template-columns:1fr 1fr;gap:48px;align-items:start}
  .col-block-head{margin-bottom:24px}
  .col-block-head .section-title{font-size:clamp(1.6rem,2.5vw,2.1rem);margin-top:8px}

  /* Transformation Gallery: 2-Column Inner Images */
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
        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> / <a href="<?php echo esc_url(home_url('#services')); ?>">Services</a> / <span>Oven Cleaning</span>
      </div>
      <span class="eyebrow">
        <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
        05 · Specialist Cooker Care
      </span>
      <h1>Professional oven restoration, <span class="shine">immaculate and showroom-ready.</span></h1>
      <p class="sub">Non-caustic, odourless deep cleaning for ranges, ovens, hobs, and extractors that lifts hardened carbon and burnt-in fat across all London postcodes.</p>
    </div>
  </section>

  <!-- WHAT'S INCLUDED / SERVICE BREAKDOWN SPLIT -->
  <section class="section">
    <div class="wrap split">
      <!-- Left: Prose Description -->
      <div class="prose reveal in">
        <h3>Scope of our treatment.</h3>
        <p>Repeated roasting and baking leave layers of heat-crystallised fats, sticky splatters, and burnt soot across cavity walls, fan housings, and glazing. Our technical oven detailing breaks down months of polymerised grease without noxious fumes or toxic acids, reviving cooking efficiency and returning metal surfaces to gleaming condition.</p>

        <h3>Who benefits most</h3>
        <p>Private homeowners desiring a pristine kitchen environment, departing tenants needing to satisfy strict landlord inventory checks, short-stay hosts maintaining pristine standards, and enthusiastic home cooks tired of smoking appliances.</p>

        <h3>How we deliver results</h3>
        <p>Share whether you operate a single compact unit, double oven stack, broad range cooker, or induction surface. We methodically unmount removable components—including wire racks, side guides, internal fan cover plates, and multi-pane door glass—for isolated decarbonising baths. Using 100% biodegradable, food-safe agents, your cooker is primed for culinary use the moment we pack our tools.</p>

        <div class="split-actions">
          <a class="btn btn-primary" href="<?php echo esc_url(home_url('#quote')); ?>">Request an Oven Quote</a>
          <a class="btn btn-ghost" href="https://api.whatsapp.com/send?phone=447919033684&text=Hi%20Expertcare%20Cleaning%2C%20I%27d%20like%20an%20oven%20cleaning%20quote%20please." target="_blank" rel="noopener noreferrer">WhatsApp us →</a>
        </div>
      </div>

      <!-- Right: Boxed Checklist Card (10-Point Detailing Checklist) -->
      <aside class="incl reveal in">
        <h3>Cooker Detailing</h3>
        <div class="pr">Upfront, fixed rates · single, double &amp; range models</div>
        
        <div class="checklist-title">10-Point Appliance Detailing Checklist:</div>
        <ul>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Complete breakdown of heat-hardened fats &amp; carbon layers
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Shelves, baking trays &amp; lateral supports stripped in dip tanks
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Door disassembly for inside glass pane clarity polishing
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Rear baffle panel, blower fan &amp; element housing desoiling
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Degreasing of gas burners, ceramic plates &amp; induction surfaces
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Canopy canopy hood wiping &amp; aluminium filter degreasing
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Rotary dials, control fascia, push buttons &amp; grab bars sanitised
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Thermal rubber gaskets, pivot hinges &amp; door jambs cleared
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            100% eco-friendly, non-abrasive &amp; fume-free formulation
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Post-clean operational test &amp; immediate cooking clearance
          </li>
        </ul>

        <a class="btn btn-primary" href="<?php echo esc_url(home_url('#quote')); ?>">Book Oven Clean</a>
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
              Transformation Gallery
            </span>
            <h2 class="section-title">Visual outcomes from <em>completed cooker treatments.</em></h2>
            <p class="section-lead" style="margin-top: 10px;">Photographic evidence of greasy appliance transformations across London residences.</p>
          </div>

          <div class="work-grid-two-col">
            <figure class="work-card">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/gallery-2.jpg" loading="lazy">
            </figure>
            <figure class="work-card">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/gallery-4.jpg" loading="lazy">
            </figure>
            <figure class="work-card">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/gallery-6.jpg" loading="lazy">
            </figure>
            <figure class="work-card">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/gallery-5.jpg" loading="lazy">
            </figure>
          </div>
        </div>

        <!-- Right Column: FAQ -->
        <div class="faq-col reveal">
          <div class="col-block-head">
            <span class="eyebrow">
              <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
              Important Details
            </span>
            <h2 class="section-title">Common appliance <em>questions answered.</em></h2>
            <p class="section-lead" style="margin-top: 10px;">Turnaround timing, chemical safety guarantees, and glass pane dismantling.</p>
          </div>

          <div class="faq-list">
            <div class="faq-item">
              <button class="faq-q" type="button">Is the appliance safe to cook in right after the appointment?<span class="pm"></span></button>
              <div class="faq-a">
                <p>Yes, without delay. Because we employ caustic-free, plant-based bio-cleansers, there are zero persistent chemical residues or dangerous gas emissions. Your oven is 100% meal-ready straight away.</p>
              </div>
            </div>

            <div class="faq-item">
              <button class="faq-q" type="button">Do you dismantle and wash inside multi-layered door glass?<span class="pm"></span></button>
              <div class="faq-a">
                <p>Yes. Providing the model's design accommodates disassembly without seal damage, our specialists separate the glass panes to eliminate streaks, runs, and fog trapped within the door construction.</p>
              </div>
            </div>

            <div class="faq-item">
              <button class="faq-q" type="button">How much time does an oven treatment typically require?<span class="pm"></span></button>
              <div class="faq-a">
                <p>An average single-cavity appliance takes approximately 90 to 120 minutes. Larger double units, standard range cookers, and wide cast-iron models like AGAs often require 2.5 to 3.5 hours for total restoration.</p>
              </div>
            </div>

            <div class="faq-item">
              <button class="faq-q" type="button">Can this treatment be bundled with general or move-out cleans?<span class="pm"></span></button>
              <div class="faq-a">
                <p>Certainly. While basic superficial wipe-downs accompany routine cleans, full restorative appliance detailing can be added to any regular, intensive deep, or end-of-tenancy clean at preferential package pricing.</p>
              </div>
            </div>

            <div class="faq-item">
              <button class="faq-q" type="button">What geographical zones do your cooker cleaners cover?<span class="pm"></span></button>
              <div class="faq-a">
                <p>Our dedicated cooker cleaning specialists travel to properties across Greater London, including Central, North, West, East, and South London postcodes.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>