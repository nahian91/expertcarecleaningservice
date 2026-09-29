<?php
/**
 * Template Name: Airbnb Turnover Cleaning
 *
 * @package Expertcare_Cleaning
 */

get_header(); ?>

<style>
  /* Service Page Specific Internal Styles */
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
  .incl li{display:flex;gap:12px;font-size:.9rem;color:var(--color-text,#475569);font-weight:500;line-height:1.4}
  .incl li .ck{width:18px;height:18px;flex:none;margin-top:3px;stroke:var(--color-primary,#0066cc)}
  .incl .btn{width:100%;margin-top:24px}

  /* Two Equal Column Layout for Portfolio Showcase & FAQ */
  .showcase-faq-section {
    padding-top: 0;
  }
  .showcase-faq-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 48px;
    align-items: start;
  }
  .col-block-head {
    margin-bottom: 24px;
  }
  .col-block-head .section-title {
    font-size: clamp(1.6rem, 2.5vw, 2.1rem);
    margin-top: 8px;
  }

  /* Portfolio Snapshots: 2-Column Inner Images */
  .work-grid-two-col {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 14px;
  }
  .work-card {
    position: relative;
    border-radius: 14px;
    overflow: hidden;
    border: 1px solid var(--color-border, #e2e8f0);
    aspect-ratio: 1/1;
    margin: 0;
  }
  .work-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.55s ease;
  }
  .work-card:hover img {
    transform: scale(1.06);
  }
  .work-card figcaption {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    padding: 26px 12px 10px;
    font-size: 0.8rem;
    font-weight: 600;
    color: #fff;
    background: linear-gradient(to top, rgba(5, 8, 11, 0.88), transparent);
  }

  /* FAQ Accordion List */
  .faq-list {
    border-top: 1px solid var(--color-border, #e2e8f0);
  }
  .faq-item {
    border-bottom: 1px solid var(--color-border, #e2e8f0);
  }
  .faq-q {
    width: 100%;
    text-align: left;
    background: none;
    border: 0;
    cursor: pointer;
    color: var(--color-dark, #0f172a);
    font-family: var(--font-heading, 'Poppins', sans-serif);
    font-weight: 600;
    font-size: 1.05rem;
    padding: 20px 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 18px;
  }
  .faq-q .pm {
    flex: none;
    width: 22px;
    height: 22px;
    position: relative;
    transition: transform 0.3s;
  }
  .faq-q .pm::before,
  .faq-q .pm::after {
    content: "";
    position: absolute;
    background: var(--color-primary, #0066cc);
    border-radius: 2px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
  .faq-q .pm::before {
    width: 13px;
    height: 2px;
  }
  .faq-q .pm::after {
    width: 2px;
    height: 13px;
    transition: transform 0.3s;
  }
  .faq-item.open .pm::after {
    transform: translate(-50%, -50%) rotate(90deg);
    opacity: 0;
  }
  .faq-a {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.35s ease;
  }
  .faq-a p {
    color: var(--color-text, #475569);
    padding-bottom: 20px;
    font-size: 0.94rem;
    line-height: 1.6;
    margin: 0;
  }

  @media (max-width: 980px) {
    .split {
      grid-template-columns: 1fr;
      gap: 36px;
    }
    .incl {
      position: static;
    }
    .showcase-faq-grid {
      grid-template-columns: 1fr;
      gap: 48px;
    }
  }
  @media (max-width: 560px) {
    .work-grid-two-col {
      grid-template-columns: 1fr;
    }
  }
</style>

<main>
  <!-- PAGE HERO -->
  <section class="page-hero">
    <div class="wrap">
      <div class="crumb">
        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> / <a href="<?php echo esc_url(home_url('#services')); ?>">Services</a> / <span>Airbnb Turnover Cleaning</span>
      </div>
      <span class="eyebrow">
        <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
        02 · Hospitality Changeovers
      </span>
      <h1>Airbnb turnover care, <span class="shine">flawlessly staged for every check-in.</span></h1>
      <p class="sub">Dependable, high-spec turnover solutions engineered to secure 5-star hospitality reviews and protect your Superhost reputation throughout London.</p>
    </div>
  </section>

  <!-- WHAT'S INCLUDED / SERVICE BREAKDOWN SPLIT -->
  <section class="section">
    <div class="wrap split">
      <!-- Left: Prose Description -->
      <div class="prose reveal in">
        <h3>What the service covers.</h3>
        <p>Short-stay operations demand precision execution within compact changeover hours. Our turnover teams oversee the entire staging cycle: crisp boutique-style bed dressing, full linen and towel handling, deep hygiene resets across kitchen and bathroom spaces, restocking essential guest amenities, and a final supervisory audit before the door lock engages.</p>

        <h3>Designed for</h3>
        <p>Independent Airbnb hosts, portfolio property managers, and luxury serviced accommodation providers across the capital who require dependable scheduling without micro-managing personnel.</p>

        <h3>The workflow</h3>
        <p>Share your property setup, access codes, and typical departure/arrival schedules. We adapt smoothly to your live booking calendar. Every operative is fully screened, trained in short-let standards, and comprehensively insured. We arrive equipped with professional-grade supplies, cycle your linens efficiently, and display your welcome touches exactly to specification.</p>

        <div class="split-actions">
          <a class="btn btn-primary" href="<?php echo esc_url(home_url('#quote')); ?>">Request Turnover Quote</a>
          <a class="btn btn-ghost" href="https://api.whatsapp.com/send?phone=447919033684&text=Hi%20Expertcare%20Cleaning%2C%20I%27d%20like%20an%20Airbnb%20turnover%20quote%20please." target="_blank" rel="noopener noreferrer">WhatsApp us →</a>
        </div>
      </div>

      <!-- Right: Boxed Checklist Card with All 12 Items -->
      <aside class="incl reveal in">
        <h3>Short-Let Service</h3>
        <div class="pr">Custom changeover rates · tailored to your property footprint</div>
        
        <div class="checklist-title">Turnover Checklist Included:</div>
        <ul>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Bed making &amp; linen changes
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Laundry services
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Bathroom deep cleaning &amp; sanitising
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Kitchen cleaning, including worktops and appliances
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Vacuuming &amp; mopping all floors
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Dusting furniture and surfaces
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Cleaning and wiping skirting boards
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Cleaning doors, handles and high-touch areas
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Cleaning accessible glass and mirrors
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Emptying bins and replacing liners
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Checking and arranging toiletries
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Final quality check before the next guest arrives
          </li>
        </ul>

        <a class="btn btn-primary" href="<?php echo esc_url(home_url('#quote')); ?>">Book Turnover Clean</a>
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
              Portfolio Snapshots
            </span>
            <h2 class="section-title">Visuals from <em>active turnovers.</em></h2>
            <p class="section-lead" style="margin-top: 10px;">Documented changeover outcomes from short-let properties across London.</p>
          </div>

          <div class="work-grid-two-col">
            <figure class="work-card">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/gallery-4.jpg" loading="lazy">
            </figure>
            <figure class="work-card">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/gallery-2.jpg" loading="lazy">
            </figure>
            <figure class="work-card">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/gallery-10.jpg" loading="lazy">
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
              Clarifications &amp; Details
            </span>
            <h2 class="section-title">Frequently <em>asked questions.</em></h2>
            <p class="section-lead" style="margin-top: 10px;">Essential answers regarding turnover scheduling, linen handling, and incident reporting.</p>
          </div>

          <div class="faq-list">
            <div class="faq-item">
              <button class="faq-q" type="button">What tasks are covered in an Airbnb changeover clean?<span class="pm"></span></button>
              <div class="faq-a">
                <p>Our turnover package encompasses full guest reset duties: stripping and remaking beds with fresh bedding, on-site laundering, descaling and sanitising bathrooms, degreasing kitchen appliances and counters, vacuuming and damp-mopping all floor types, dusting surfaces, topping up amenity packs, emptying rubbish, and performing an all-room staging walkthrough prior to incoming guests.</p>
              </div>
            </div>

            <div class="faq-item">
              <button class="faq-q" type="button">Can you accommodate strict turnaround times between guests?<span class="pm"></span></button>
              <div class="faq-a">
                <p>Certainly. The vast majority of our turnovers occur within the standard 10:00 AM to 3:00 PM timeframe. We schedule our teams to guarantee the residence is fully prepped, inspected, and ready well before arrival time.</p>
              </div>
            </div>

            <div class="faq-item">
              <button class="faq-q" type="button">How do you manage linen rotation and laundry?<span class="pm"></span></button>
              <div class="faq-a">
                <p>We strip used sheets and towels, wash and dry them on-site using your laundry appliances, or swap in your secondary backup sets while neatly folding and staging the rest to hospitality presentation standards.</p>
              </div>
            </div>

            <div class="faq-item">
              <button class="faq-q" type="button">Will your cleaners restock toiletries and guest welcome supplies?<span class="pm"></span></button>
              <div class="faq-a">
                <p>Yes. Simply provide an inventory location for replacement items (toilet rolls, hand washes, hospitality tea/coffee packs), and our staff will restock and arrange them neatly according to your staging guidelines.</p>
              </div>
            </div>

            <div class="faq-item">
              <button class="faq-q" type="button">How do you handle unexpected property damage or excessive mess?<span class="pm"></span></button>
              <div class="faq-a">
                <p>Upon stepping inside, our staff photograph any irregularities, property damage, or guest-left belongings and notify you immediately via WhatsApp so you have clear visual documentation ready for resolution claims.</p>
              </div>
            </div>

            <div class="faq-item">
              <button class="faq-q" type="button">Which London regions do your turnover teams service?<span class="pm"></span></button>
              <div class="faq-a">
                <p>We provide full turnover support across all London postcodes: spanning Central, West, North, East, and South London boroughs.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>