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

  .work-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;margin-top:40px}
  .work-card{position:relative;border-radius:14px;overflow:hidden;border:1px solid var(--color-border,#e2e8f0);aspect-ratio:1/1;margin:0}
  .work-card img{width:100%;height:100%;object-fit:cover;display:block;transition:transform .55s ease}
  .work-card:hover img{transform:scale(1.06)}
  .work-card figcaption{position:absolute;left:0;right:0;bottom:0;padding:26px 12px 10px;font-size:.8rem;font-weight:600;color:#fff;background:linear-gradient(to top,rgba(5,8,11,.88),transparent)}

  .faq-list{margin-top:46px;border-top:1px solid var(--color-border,#e2e8f0)}
  .faq-item{border-bottom:1px solid var(--color-border,#e2e8f0)}
  .faq-q{width:100%;text-align:left;background:none;border:0;cursor:pointer;color:var(--color-dark,#0f172a);font-family:var(--font-heading,'Poppins',sans-serif);font-weight:600;font-size:1.05rem;padding:24px 0;display:flex;justify-content:space-between;align-items:center;gap:20px}
  .faq-q .pm{flex:none;width:24px;height:24px;position:relative;transition:transform .3s}
  .faq-q .pm::before,.faq-q .pm::after{content:"";position:absolute;background:var(--color-primary,#0066cc);border-radius:2px;top:50%;left:50%;transform:translate(-50%,-50%)}
  .faq-q .pm::before{width:14px;height:2px}
  .faq-q .pm::after{width:2px;height:14px;transition:transform .3s}
  .faq-item.open .pm::after{transform:translate(-50%,-50%) rotate(90deg);opacity:0}
  .faq-a{max-height:0;overflow:hidden;transition:max-height .35s ease}
  .faq-a p{color:var(--color-text,#475569);padding-bottom:24px;font-size:.96rem;max-width:70ch;margin:0}

  @media(max-width:980px){
    .split{grid-template-columns:1fr;gap:36px}
    .incl{position:static}
    .work-grid{grid-template-columns:repeat(2,1fr)}
  }
  @media(max-width:560px){
    .work-grid{grid-template-columns:1fr}
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
        05 · Specialist Appliance Care
      </span>
      <h1>Oven deep cleaning, <span class="shine">restored like new.</span></h1>
      <p class="sub">Intensive, fume-free cooker, grill, hob and extractor detailing that eliminates baked-on grease and carbon residue across London.</p>
    </div>
  </section>

  <!-- WHAT'S INCLUDED / SERVICE BREAKDOWN SPLIT -->
  <section class="section">
    <div class="wrap split">
      <!-- Left: Prose Description -->
      <div class="prose reveal in">
        <h3>What’s included.</h3>
        <p>Over time, cooking fat and food splatters bake onto your oven walls, racks, and door glass, creating stubborn carbon build-ups and unpleasant smoking. Our specialist oven cleaning strips away months or years of grease without harsh, choking fumes, restoring your appliance to near-showroom condition.</p>

        <h3>Ideal for</h3>
        <p>Homeowners, tenants wanting to prevent checkout deposit deductions, short-let Airbnb operators, and busy families who want a clean, hygienic, and smoke-free cooking environment.</p>

        <h3>How it works</h3>
        <p>Tell us whether you have a single oven, double oven, range cooker, or integrated hob. We dismantle removable parts including the door, inner glass panels, wire racks, side runners, and trays for individual dipping and detailing. We apply 100% non-caustic, food-safe degreasers, making your appliance safe for cooking immediately after completion.</p>

        <div class="split-actions">
          <a class="btn btn-primary" href="<?php echo esc_url(home_url('#quote')); ?>">Request an Oven Quote</a>
          <a class="btn btn-ghost" href="https://api.whatsapp.com/send?phone=447919033684&text=Hi%20Expertcare%20Cleaning%2C%20I%27d%20like%20an%20oven%20cleaning%20quote%20please." target="_blank" rel="noopener noreferrer">WhatsApp us →</a>
        </div>
      </div>

      <!-- Right: Boxed Checklist Card (10-Point Detailing Checklist) -->
      <aside class="incl reveal in">
        <h3>Oven Cleaning</h3>
        <div class="pr">Transparent pricing · single, double &amp; ranges</div>
        
        <div class="checklist-title">10-Point Appliance Detailing Checklist:</div>
        <ul>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Complete stripping of baked-on grease &amp; carbon deposits
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Racks, grill pans &amp; side runners soaked and detailed
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Door dismantled to polish inside between glass layers
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Back plate, fan casing &amp; heating element area scrubbed
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Gas, ceramic &amp; induction hob surface degreasing
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Extractor hood exterior wiped &amp; mesh filters degreased
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Control dials, timers, switches &amp; handles sanitised
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Rubber seals, hinges &amp; door frames cleaned
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            100% fume-free, non-caustic &amp; food-safe formulas
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Full final inspection &amp; immediate cooking-ready handoff
          </li>
        </ul>

        <a class="btn btn-primary" href="<?php echo esc_url(home_url('#quote')); ?>">Book Oven Clean</a>
      </aside>
    </div>
  </section>

  <!-- RECENT RESULTS PHOTOS GRID -->
  <section class="section section--tight" style="padding-top:0">
    <div class="wrap">
      <div class="reveal">
        <span class="eyebrow">
          <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
          Recent Results
        </span>
        <h2 class="section-title">Photos from <em>real oven cleaning jobs.</em></h2>
        <p class="section-lead">Actual before-and-after results from recent cooker and appliance cleans across London.</p>
      </div>

      <div class="work-grid reveal">
        <figure class="work-card">
          <img src="https://images.unsplash.com/photo-1590725140246-201509650275?auto=format&fit=crop&w=800&q=80" alt="Oven interior stripped of carbon" loading="lazy">
          <figcaption>Oven Cavity &amp; Fan Casing</figcaption>
        </figure>
        <figure class="work-card">
          <img src="https://images.unsplash.com/photo-1556911220-e15b29be8c8f?auto=format&fit=crop&w=800&q=80" alt="Spotless kitchen hob and cooker" loading="lazy">
          <figcaption>Hob &amp; Cooker Surface</figcaption>
        </figure>
        <figure class="work-card">
          <img src="https://images.unsplash.com/photo-1584622650111-993a426fbf0a?auto=format&fit=crop&w=800&q=80" alt="Kitchen sink and appliances polished" loading="lazy">
          <figcaption>Grill Trays &amp; Racks Cleaned</figcaption>
        </figure>
        <figure class="work-card">
          <img src="https://images.unsplash.com/photo-1600585152220-90363fe7e115?auto=format&fit=crop&w=800&q=80" alt="Finished gleaming kitchen appliance clean" loading="lazy">
          <figcaption>Clear Sparkling Door Glass</figcaption>
        </figure>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="section section--tight" id="faq">
    <div class="wrap">
      <div class="reveal">
        <span class="eyebrow">
          <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
          Frequently Asked
        </span>
        <h2 class="section-title">The small <em>print.</em></h2>
      </div>

      <div class="faq-list reveal">
        <div class="faq-item">
          <button class="faq-q" type="button">Can I use the oven straight away after cleaning?<span class="pm"></span></button>
          <div class="faq-a">
            <p>Yes. Because we use non-caustic, fume-free, and food-safe cleaning solutions, there are no dangerous fumes or chemical odours left behind. Your oven is ready for cooking immediately.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-q" type="button">Do you clean between the glass panels on the door?<span class="pm"></span></button>
          <div class="faq-a">
            <p>Yes, wherever the manufacturer design allows, our technicians dismantle the oven door to remove drips, grease, and streaks trapped between the inner and outer glass panes.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-q" type="button">How long does an oven clean take?<span class="pm"></span></button>
          <div class="faq-a">
            <p>A standard single oven typically takes between 1.5 to 2 hours. Double ovens, large range cookers, and AGAs may take 2.5 to 3.5 hours depending on grease accumulation.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-q" type="button">Can this be added to a deep or tenancy clean?<span class="pm"></span></button>
          <div class="faq-a">
            <p>Yes. Oven cleaning can be booked as a standalone service or added as a discounted extra to your regular, deep clean, or end of tenancy booking.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-q" type="button">What areas do you cover?<span class="pm"></span></button>
          <div class="faq-a">
            <p>We provide professional oven cleaning coverage across all London postcodes: Central, North, East, South, and West London.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>