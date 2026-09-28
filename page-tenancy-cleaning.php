<?php
/**
 * Template Name: End of Tenancy Cleaning
 *
 * @package Expertcare_Cleaning
 */

get_header(); ?>

<style>
  /* Internal CSS for End of Tenancy Cleaning Service Page */
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
        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> / <a href="<?php echo esc_url(home_url('#services')); ?>">Services</a> / <span>End of Tenancy</span>
      </div>
      <span class="eyebrow">
        <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
        03 · Move-In / Move-Out
      </span>
      <h1>End of tenancy cleaning, <span class="shine">deposit handover standard.</span></h1>
      <p class="sub">Rigorous, inventory-ready move-out cleaning tailored to pass strict landlord and letting-agent checkouts across London.</p>
    </div>
  </section>

  <!-- WHAT'S INCLUDED / SERVICE BREAKDOWN SPLIT -->
  <section class="section">
    <div class="wrap split">
      <!-- Left: Prose Description -->
      <div class="prose reveal in">
        <h3>What’s included.</h3>
        <p>Moving is stressful enough without losing your tenancy deposit over checkout cleaning issues. Our end of tenancy cleaning service is built specifically around official inventory checkout requirements: inside and outside of all kitchen cupboards, wardrobes and drawers, deep kitchen and bathroom cleaning, descaling, interior window panes, frames and sills, vacuuming carpets, mopping hard floors, and removing general household waste.</p>

        <h3>Ideal for</h3>
        <p>Tenants moving out who need their security deposit returned in full, landlords preparing a vacant property for incoming tenants, and estate agents requiring reliable turnaround handovers across London.</p>

        <h3>How it works</h3>
        <p>Send us your property size, postcode, and move-out date for an immediate quote. We arrive with all industrial-strength equipment, limescale removers, and appliance degreasers. Our team stays on-site until every single point on the move-out inventory checklist is completed, leaving the property in immaculate handover condition.</p>

        <div class="split-actions">
          <a class="btn btn-primary" href="<?php echo esc_url(home_url('#quote')); ?>">Request Handover Quote</a>
          <a class="btn btn-ghost" href="https://api.whatsapp.com/send?phone=447919033684&text=Hi%20Expertcare%20Cleaning%2C%20I%27d%20like%20an%20end%20of%20tenancy%20cleaning%20quote%20please." target="_blank" rel="noopener noreferrer">WhatsApp us →</a>
        </div>
      </div>

      <!-- Right: Boxed Checklist Card with All 15 Items -->
      <aside class="incl reveal in">
        <h3>End of Tenancy</h3>
        <div class="pr">Deposit guarantee standard · tailored to your property</div>
        
        <div class="checklist-title">15-Point Tenancy Checkout Checklist Included:</div>
        <ul>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Bed making &amp; fresh linen changing
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Laundry, washing &amp; drying
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Folding and organising clean laundry
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Deep cleaning throughout the property
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Kitchen deep cleaning
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Bathroom &amp; toilet deep cleaning
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Cleaning cupboards, wardrobes &amp; drawers
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Interior windows, frames &amp; sills
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Skirting boards, doors, handles &amp; switches
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Dusting and cleaning furniture
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Vacuuming carpets and floors
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Mopping hard floors
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Emptying and replacing bin liners
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Removing general household waste
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Final detailed checks to make sure nothing is missed
          </li>
        </ul>

        <a class="btn btn-primary" href="<?php echo esc_url(home_url('#quote')); ?>">Book Move-Out Clean</a>
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
        <h2 class="section-title">Photos from <em>real tenancy handovers.</em></h2>
        <p class="section-lead">Actual results from move-out cleaning jobs across London — the standard we bring to every inspection.</p>
      </div>

      <div class="work-grid reveal">
        <figure class="work-card">
          <img src="https://images.unsplash.com/photo-1556911220-e15b29be8c8f?auto=format&fit=crop&w=800&q=80" alt="Kitchen cupboards and appliances cleaned" loading="lazy">
          <figcaption>Kitchen Handover Standard</figcaption>
        </figure>
        <figure class="work-card">
          <img src="https://images.unsplash.com/photo-1590725140246-201509650275?auto=format&fit=crop&w=800&q=80" alt="Oven interior degreased" loading="lazy">
          <figcaption>Oven &amp; Cooker Detailing</figcaption>
        </figure>
        <figure class="work-card">
          <img src="https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?auto=format&fit=crop&w=800&q=80" alt="Descaled bathroom tiles and bath" loading="lazy">
          <figcaption>Bathroom Limescale Removed</figcaption>
        </figure>
        <figure class="work-card">
          <img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=800&q=80" alt="Spotless empty apartment living room" loading="lazy">
          <figcaption>Empty Property Handover</figcaption>
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
          <button class="faq-q" type="button">Will this clean pass my inventory clerk's inspection?<span class="pm"></span></button>
          <div class="faq-a">
            <p>Yes. Our end of tenancy cleaning checklist is modelled directly on standard UK inventory and letting agency guidelines. We clean inside cupboards, ovens, fridge/freezers, and descale bathrooms to ensure your deposit is safeguarded.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-q" type="button">Does the property need to be empty before the clean starts?<span class="pm"></span></button>
          <div class="faq-a">
            <p>Yes, all personal belongings, rubbish, and furniture (if unfurnished) should be removed before our team arrives so we can access every cupboard, drawer, corner, and skirting board.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-q" type="button">Should the fridge and freezer be defrosted beforehand?<span class="pm"></span></button>
          <div class="faq-a">
            <p>Yes. Please switch off and defrost the freezer at least 24 hours prior to our arrival so our cleaners can thoroughly clean and sanitise the interior trays and seals.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-q" type="button">Do you bring your own cleaning supplies and equipment?<span class="pm"></span></button>
          <div class="faq-a">
            <p>Yes, we arrive fully equipped with heavy-duty degreasers, descalers, vacuums, and specialised cleaning tools as standard. You don't need to provide any materials.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-q" type="button">What areas in London do you cover for end of tenancy cleans?<span class="pm"></span></button>
          <div class="faq-a">
            <p>We provide full end of tenancy cleaning coverage across all London boroughs: Central, North, East, South, and West London.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>