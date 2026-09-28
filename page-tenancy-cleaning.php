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
        03 · Lease Handover Solutions
      </span>
      <h1>Tenancy departure cleaning, <span class="shine">approved for full deposit return.</span></h1>
      <p class="sub">Comprehensive, inspection-grade changeover sanitisation structured specifically to satisfy demanding letting agents and independent inventory clerks across Greater London.</p>
    </div>
  </section>

  <!-- WHAT'S INCLUDED / SERVICE BREAKDOWN SPLIT -->
  <section class="section">
    <div class="wrap split">
      <!-- Left: Prose Description -->
      <div class="prose reveal in">
        <h3>Scope of the clean.</h3>
        <p>Relocating is stressful enough without risking unfair deductions from your tenancy bond over minor cleanliness disputes. Our checkout sanitisation package directly replicates professional inventory check standards: deep internal and external scrubbing of kitchen cabinetry and wardrobes, complete descaling of sanitary fittings, degreased cooking appliances, interior window tracks and panes, floor rejuvenation, and removal of stray debris.</p>

        <h3>Who this is for</h3>
        <p>Outgoing tenants safeguarding their complete damage deposit, private landlords prepping an empty property for prime market listing, and managing agents seeking reliable turnaround standards throughout the London rental sector.</p>

        <h3>Our operational procedure</h3>
        <p>Provide your property layout, location, and key collection date to secure a confirmed, transparent proposal. Our specialists arrive equipped with commercial rotary descalers, industrial extractors, and heavy-duty degreasers. Our crew remains until every single specification on our comprehensive checkout checklist is satisfied, presenting your property in flawless handover condition.</p>

        <div class="split-actions">
          <a class="btn btn-primary" href="<?php echo esc_url(home_url('#quote')); ?>">Request Handover Quote</a>
          <a class="btn btn-ghost" href="https://api.whatsapp.com/send?phone=447919033684&text=Hi%20Expertcare%20Cleaning%2C%20I%27d%20like%20an%20end%20of%20tenancy%20cleaning%20quote%20please." target="_blank" rel="noopener noreferrer">WhatsApp us →</a>
        </div>
      </div>

      <!-- Right: Boxed Checklist Card with All 15 Items -->
      <aside class="incl reveal in">
        <h3>Inventory Handover</h3>
        <div class="pr">Deposit return benchmark · tailored to property footprint</div>
        
        <div class="checklist-title">15-Point Tenancy Checkout Checklist Included:</div>
        <ul>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Bed staging &amp; clean mattress protector placement
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Domestic linen washing &amp; cycle handling
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Towel laundering, neat folding &amp; wardrobe alignment
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Full top-to-bottom property deep scrub &amp; reset
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Kitchen degreasing: splashbacks, counters &amp; sinks
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Shower, tub &amp; toilet descaling and antibacterial cleanse
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Inside and outside wipe-down of all storage units &amp; drawers
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Interior window glass, frames, runners &amp; ledges polished
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Baseboards, doors, handles &amp; power sockets sanitised
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Detailed dusting and polishing of remaining furniture items
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Wall-to-wall vacuuming across all carpeted rooms
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Hard floor sanitisation &amp; damp mopping
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Waste bin clearance &amp; fresh liner replacement
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Disposal of left-behind light domestic packaging
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Rigorous checkout inspection against inventory standards
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
          Handover Portfolio
        </span>
        <h2 class="section-title">Visual evidence from <em>completed tenancy checkouts.</em></h2>
        <p class="section-lead">Photographic records from checkout transformations across London rental properties — demonstrating the standards delivered ahead of inventory inspections.</p>
      </div>

      <div class="work-grid reveal">
        <figure class="work-card">
          <img src="https://images.unsplash.com/photo-1556911220-e15b29be8c8f?auto=format&fit=crop&w=800&q=80" alt="Kitchen cupboards and appliances cleaned" loading="lazy">
          <figcaption>Inventory-Ready Kitchen Station</figcaption>
        </figure>
        <figure class="work-card">
          <img src="https://images.unsplash.com/photo-1590725140246-201509650275?auto=format&fit=crop&w=800&q=80" alt="Oven interior degreased" loading="lazy">
          <figcaption>Cooker &amp; Extractor Detailing</figcaption>
        </figure>
        <figure class="work-card">
          <img src="https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?auto=format&fit=crop&w=800&q=80" alt="Descaled bathroom tiles and bath" loading="lazy">
          <figcaption>Descaled Bath &amp; Tilework</figcaption>
        </figure>
        <figure class="work-card">
          <img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=800&q=80" alt="Spotless empty apartment living room" loading="lazy">
          <figcaption>Pristine Handover Presentation</figcaption>
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
          Important Policies
        </span>
        <h2 class="section-title">Common tenancy <em>questions answered.</em></h2>
      </div>

      <div class="faq-list reveal">
        <div class="faq-item">
          <button class="faq-q" type="button">Will this clean satisfy an official inventory checkout report?<span class="pm"></span></button>
          <div class="faq-a">
            <p>Yes. Our tenancy checklist directly aligns with standard UK landlord, estate agency, and inventory clerk specifications. We systematically clean inside storage, address ovens and white goods, and descale all sanitary fixtures to safeguard your deposit.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-q" type="button">Should the property be vacant of personal effects before arrival?<span class="pm"></span></button>
          <div class="faq-a">
            <p>Yes. All personal belongings, packing boxes, and residential waste must be cleared prior to our arrival. An empty space ensures our cleaners can access and sanitise every corner, wardrobe shelf, and skirting board without hindrance.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-q" type="button">Does the refrigerator/freezer need to be defrosted beforehand?<span class="pm"></span></button>
          <div class="faq-a">
            <p>Yes, please. Switch off and defrost freezers at least 24 hours in advance of the visit so our operatives can safely clean, disinfect, and dry all internal shelving, trays, and rubber door seals.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-q" type="button">Do you bring your own cleaning supplies and equipment?<span class="pm"></span></button>
          <div class="faq-a">
            <p>Yes, our crew arrives completely self-sufficient with commercial-grade vacuums, heavy-duty descaling compounds, grease removers, and microfibre equipment. You do not need to provide any materials.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-q" type="button">What areas in London do you cover for end of tenancy cleans?<span class="pm"></span></button>
          <div class="faq-a">
            <p>We provide comprehensive end of tenancy services across every London borough, spanning Central, North, West, East, and South districts.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>