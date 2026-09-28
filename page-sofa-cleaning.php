<?php
/**
 * Template Name: Upholstery & Sofa Cleaning
 *
 * @package Expertcare_Cleaning
 */

get_header(); ?>

<style>
  /* Internal CSS for Upholstery & Sofa Cleaning Service Page */
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
        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> / <a href="<?php echo esc_url(home_url('#services')); ?>">Services</a> / <span>Upholstery &amp; Sofa Cleaning</span>
      </div>
      <span class="eyebrow">
        <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
        06 · Fabric &amp; Living Care
      </span>
      <h1>Upholstery &amp; sofa cleaning, <span class="shine">deeply revitalised.</span></h1>
      <p class="sub">Professional extraction, targeted stain treatment, and fabric refreshment for sofas, armchairs, dining chairs, and mattresses across London.</p>
    </div>
  </section>

  <!-- WHAT'S INCLUDED / SERVICE BREAKDOWN SPLIT -->
  <section class="section">
    <div class="wrap split">
      <!-- Left: Prose Description -->
      <div class="prose reveal in">
        <h3>What’s included.</h3>
        <p>Everyday use leaves soft furnishings holding onto trapped dust, pet hair, accidental spills, body oils, and allergens that normal vacuuming can never dislodge. Our professional upholstery cleaning penetrates deep into furniture fabrics using industrial extraction, targeted spot treatments, and gentle fibre-safe deodorisers to lift embedded grime and restore fabric vitality.</p>

        <h3>Ideal for</h3>
        <p>London households with pets or young children, fabric sofas with stubborn drink or food marks, delicate velvet or linen suites needing refreshment, and short-let Airbnb operators preparing properties for incoming guests.</p>

        <h3>How it works</h3>
        <p>Tell us your sofa size (e.g. 2-seater, 3-seater, corner sectional, or armchair) and fabric composition. We begin with high-filtration dry vacuuming, pre-treat problem spots, and apply hot-water or low-moisture extraction. Our gentle deodorising process eliminates trapped odours without leaving harmful chemical residues behind.</p>

        <div class="split-actions">
          <a class="btn btn-primary" href="<?php echo esc_url(home_url('#quote')); ?>">Request Fabric Quote</a>
          <a class="btn btn-ghost" href="https://api.whatsapp.com/send?phone=447919033684&text=Hi%20Expertcare%20Cleaning%2C%20I%27d%20like%20an%20upholstery%20cleaning%20quote%20please." target="_blank" rel="noopener noreferrer">WhatsApp us →</a>
        </div>
      </div>

      <!-- Right: Boxed Checklist Card with 10 Items -->
      <aside class="incl reveal in">
        <h3>Upholstery &amp; Sofa</h3>
        <div class="pr">Bespoke pricing · tailored to your furniture</div>
        
        <div class="checklist-title">10-Point Fabric Revitalisation Checklist:</div>
        <ul>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            High-filtration vacuuming &amp; allergen extraction
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Targeted spot &amp; accidental spill stain pre-treatment
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Deep fibre extraction &amp; embedded soil removal
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Gentle deodorising &amp; stale odour neutralisation
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Removable cushions cleaned on both sides
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Armrests, headrests &amp; seating base detailed
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Crevice vacuuming &amp; trapped debris removal
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Pet hair, dander &amp; dust mite clearance
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Safe handling for delicate fabrics (linen, velvet, wool)
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Quick-dry extraction moisture reduction
          </li>
        </ul>

        <a class="btn btn-primary" href="<?php echo esc_url(home_url('#quote')); ?>">Book Upholstery Clean</a>
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
        <h2 class="section-title">Photos from <em>real sofa cleaning jobs.</em></h2>
        <p class="section-lead">Actual results from recent upholstery and sofa cleaning jobs across London — the standard we bring to every visit.</p>
      </div>

      <div class="work-grid reveal">
        <figure class="work-card">
          <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?auto=format&fit=crop&w=800&q=80" alt="Fabric sofa cleaned and refreshed" loading="lazy">
          <figcaption>Sectional Sofa Cleaned</figcaption>
        </figure>
        <figure class="work-card">
          <img src="https://images.unsplash.com/photo-1493663284031-b7e3aefcae8e?auto=format&fit=crop&w=800&q=80" alt="Armchair and cushion detailing" loading="lazy">
          <figcaption>Armchair &amp; Cushion Detailing</figcaption>
        </figure>
        <figure class="work-card">
          <img src="https://images.unsplash.com/photo-1583847268964-b28dc8f51f92?auto=format&fit=crop&w=800&q=80" alt="Living room seating refreshed" loading="lazy">
          <figcaption>Living Room Seating</figcaption>
        </figure>
        <figure class="work-card">
          <img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=800&q=80" alt="Deep vacuumed living space" loading="lazy">
          <figcaption>Fabric Odours Removed</figcaption>
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
          <button class="faq-q" type="button">How long does it take for sofas to dry after cleaning?<span class="pm"></span></button>
          <div class="faq-a">
            <p>Depending on room ventilation, heating, and fabric thickness, drying times typically range between 3 to 6 hours. Our high-suction extraction removes the majority of moisture during the clean to speed up the process.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-q" type="button">Can you remove old, stubborn stains?<span class="pm"></span></button>
          <div class="faq-a">
            <p>We treat every stain with specialised lifting agents. While most common spills (coffee, food, wine, pet mud) can be completely lifted or significantly lightened, permanent chemical discoloration or bleached fibres cannot be reversed.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-q" type="button">Is the cleaning safe for delicate fabrics like velvet or linen?<span class="pm"></span></button>
          <div class="faq-a">
            <p>Yes. Our technicians inspect the manufacturer care labels and test cleaning solutions on an inconspicuous area first to ensure there is no risk of shrinkage, colour bleeding, or fabric texture distortion.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-q" type="button">Can this service be added to a regular or deep clean?<span class="pm"></span></button>
          <div class="faq-a">
            <p>Yes. You can book sofa and upholstery cleaning as a standalone appointment or bundle it with a regular clean, deep reset, or tenancy clean at a discounted combined rate.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-q" type="button">What areas do you cover?<span class="pm"></span></button>
          <div class="faq-a">
            <p>We provide upholstery and sofa cleaning across all London boroughs: Central, North, East, South, and West London.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>