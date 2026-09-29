<?php
/**
 * Template Name: Regular Cleaning
 *
 * @package Expertcare_Cleaning
 */

get_header(); ?>

<style>
  /* Internal Styles for Regular Cleaning Service Page */
  .page-hero {
    position: relative;
    padding: 64px 0 54px;
    border-bottom: 1px solid var(--color-border, #e2e8f0);
    background: linear-gradient(180deg, #ffffff, var(--color-bg-light, #f8fafc));
  }
  .page-hero::before {
    content: "";
    position: absolute;
    top: -140px;
    right: -80px;
    width: 480px;
    height: 480px;
    background: radial-gradient(circle, rgba(47, 147, 204, 0.18), transparent 65%);
    pointer-events: none;
  }
  .crumb {
    font-size: 0.85rem;
    color: var(--color-muted, #94a3b8);
    margin-bottom: 16px;
  }
  .crumb a {
    color: var(--color-text, #475569);
    transition: color 0.2s;
  }
  .crumb a:hover {
    color: var(--color-primary, #0066cc);
  }
  .crumb span {
    color: var(--color-primary, #0066cc);
    font-weight: 500;
  }
  .page-hero h1 {
    font-family: var(--font-heading, 'Poppins', sans-serif);
    font-weight: 700;
    font-size: clamp(2rem, 3.8vw, 2.8rem);
    line-height: 1.2;
    letter-spacing: -0.01em;
    margin-top: 10px;
    color: var(--color-dark, #0f172a);
  }
  .page-hero h1 .shine {
    color: var(--color-primary, #0066cc);
  }
  .page-hero p.sub {
    color: var(--color-text, #475569);
    font-size: 1.15rem;
    margin-top: 16px;
    max-width: 58ch;
  }

  /* Two Column Split: Description & Included Checklist Box */
  .split {
    display: grid;
    grid-template-columns: 1.1fr 0.9fr;
    gap: 48px;
    align-items: start;
  }
  .prose h3 {
    font-family: var(--font-heading, 'Poppins', sans-serif);
    font-weight: 600;
    font-size: 1.35rem;
    margin: 32px 0 8px;
    color: var(--color-primary, #0066cc);
  }
  .prose h3:first-child {
    margin-top: 0;
  }
  .prose p {
    color: var(--color-text, #475569);
    font-size: 1rem;
    margin-bottom: 16px;
    line-height: 1.7;
  }
  .split-actions {
    display: flex;
    gap: 14px;
    margin-top: 28px;
    flex-wrap: wrap;
  }

  /* Right-hand Service Checklist Card */
  .incl {
    background: var(--color-white, #ffffff);
    border: 1px solid var(--color-border, #e2e8f0);
    border-radius: 16px;
    padding: 34px;
    box-shadow: var(--shadow-dropdown, 0 12px 30px -4px rgba(15, 23, 42, 0.12));
    position: sticky;
    top: 90px;
  }
  .incl h3 {
    font-family: var(--font-heading, 'Poppins', sans-serif);
    font-weight: 700;
    font-size: 1.45rem;
    margin-bottom: 6px;
    color: var(--color-dark, #0f172a);
  }
  .incl .pr {
    font-family: var(--font-heading, 'Poppins', sans-serif);
    color: var(--color-primary, #0066cc);
    font-weight: 600;
    font-size: 1.05rem;
    margin-bottom: 20px;
  }
  .incl .checklist-title {
    font-size: 0.84rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: var(--color-muted, #94a3b8);
    margin-bottom: 14px;
  }
  .incl ul {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 11px;
    padding: 0;
    margin: 0;
  }
  .incl li {
    display: flex;
    gap: 12px;
    font-size: 0.9rem;
    color: var(--color-text, #475569);
    font-weight: 500;
    line-height: 1.4;
  }
  .incl li .ck {
    width: 17px;
    height: 17px;
    flex: none;
    margin-top: 3px;
    stroke: var(--color-primary, #0066cc);
  }
  .incl .btn {
    width: 100%;
    margin-top: 26px;
  }

  /* Two Equal Column Layout for Showcase & FAQ */
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

  /* Work Showcase: 2-Column Inner Images */
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
        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> / <a href="<?php echo esc_url(home_url('#services')); ?>">Services</a> / <span>Regular Cleaning</span>
      </div>
      <span class="eyebrow">
        <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
        01 · Ongoing Domestic Housekeeping
      </span>
      <h1>Routine home cleaning, <span class="shine">consistently immaculate.</span></h1>
      <p class="sub">Structured weekly and bi-weekly domestic visits designed to keep your London home calm, tidy, and welcoming — assigned to the same dedicated cleaner every single time.</p>
    </div>
  </section>

  <!-- WHAT'S INCLUDED / SERVICE BREAKDOWN SPLIT -->
  <section class="section">
    <div class="wrap split">
      <!-- Left: Prose Description -->
      <div class="prose reveal in">
        <h3>What the service covers.</h3>
        <p>Our recurring housekeeping service takes charge of day-to-day household maintenance before chores accumulate. We handle complete surface dusting, deep sanitary wipe-downs across bathrooms and kitchens, bed dressings, laundry rotation, and floor conditioning throughout every room — ensuring your space always feels organised and refreshed.</p>

        <h3>Designed for</h3>
        <p>Working professionals, growing households, and busy London property owners seeking dependable, methodical support without having to oversee every single task.</p>

        <h3>Our working arrangement</h3>
        <p>Share your postcode and property scope to receive a confirmed, fixed quotation and schedule availability right away. A 50% reservation deposit secures your chosen recurring day and time, with the remainder settled once your property has been serviced and approved. Appointments may be rescheduled without charge with 48 hours’ notice. We arrive fully equipped with professional cleaning essentials, or gladly work with your preferred home supplies.</p>

        <div class="split-actions">
          <a class="btn btn-primary" href="<?php echo esc_url(home_url('#quote')); ?>">Request a Tailored Quote</a>
          <a class="btn btn-ghost" href="https://api.whatsapp.com/send?phone=447919033684&text=Hi%20Expertcare%20Cleaning%2C%20I%27d%20like%20a%20regular%20cleaning%20quote%20please." target="_blank" rel="noopener noreferrer">WhatsApp us →</a>
        </div>
      </div>

      <!-- Right: Boxed Checklist Card with All 15 Items -->
      <aside class="incl reveal in">
        <h3>Routine Domestic Care</h3>
        <div class="pr">Transparent pricing · adapted to your property footprint</div>
        
        <div class="checklist-title">Domestic Cleaning Checklist:</div>
        <ul>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            General dusting, wiping &amp; surface cleaning
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Tidying and refreshing living spaces
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Cleaning kitchen worktops, sinks &amp; surfaces
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Fridge, oven, microwave, hob &amp; appliance cleaning
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Bathroom &amp; shower area cleaning
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Mirrors and glass surface cleaning
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Bed making &amp; fresh linen changing
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Washing, drying &amp; folding laundry
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Vacuuming carpets, rugs &amp; floors
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Mopping hard floors
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Emptying bins &amp; replacing liners
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Wiping doors, handles &amp; frequently touched areas
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Light cleaning of skirting boards
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Keeping bedrooms, hallways &amp; living areas neat and fresh
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Final detailed inspection to ensure nothing is missed
          </li>
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
              Work Showcase
            </span>
            <h2 class="section-title">Visuals from <em>recent cleans.</em></h2>
            <p class="section-lead" style="margin-top: 10px;">Verified photographic records from regular home appointments across London.</p>
          </div>

          <div class="work-grid-two-col">
            <figure class="work-card">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/gallery-1.jpg" loading="lazy">
            </figure>
            <figure class="work-card">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/gallery-6.jpg" loading="lazy">
            </figure>
            <figure class="work-card">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/gallery-3.jpg" loading="lazy">
            </figure>
            <figure class="work-card">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/gallery-7.jpg" loading="lazy">
            </figure>
          </div>
        </div>

        <!-- Right Column: FAQ -->
        <div class="faq-col reveal">
          <div class="col-block-head">
            <span class="eyebrow">
              <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
              Common Questions
            </span>
            <h2 class="section-title">Important <em>clarifications.</em></h2>
            <p class="section-lead" style="margin-top: 10px;">Everything you need to know about keys, supplies, and booking flexibility.</p>
          </div>

          <div class="faq-list">
            <div class="faq-item">
              <button class="faq-q" type="button">Is it necessary for me to remain home during the clean?<span class="pm"></span></button>
              <div class="faq-a">
                <p>Not whatsoever. Many of our recurring clients entrust us with key safe codes, concierge drop-offs, or smart locks. Each operative is comprehensively vetted, DBS-checked, and covered by insurance, letting you carry on with your day uninterrupted.</p>
              </div>
            </div>

            <div class="faq-item">
              <button class="faq-q" type="button">Do your cleaners supply their own products and equipment?<span class="pm"></span></button>
              <div class="faq-a">
                <p>Yes, our professionals arrive fully prepared with industrial vacuums, fresh microfibres, and specialist cleaning solutions. Should you prefer us to utilise particular eco-friendly products or your own vacuum, we are delighted to comply.</p>
              </div>
            </div>

            <div class="faq-item">
              <button class="faq-q" type="button">What are your payment and rescheduling terms?<span class="pm"></span></button>
              <div class="faq-a">
                <p>A 50% deposit locks in your recurring calendar slot. The remaining 50% is settled following the visit once the work is checked and approved. While deposits hold your dedicated personnel, bookings can be moved without charge with at least 48 hours’ advance notice.</p>
              </div>
            </div>

            <div class="faq-item">
              <button class="faq-q" type="button">Which London areas do you serve for regular domestic cleans?<span class="pm"></span></button>
              <div class="faq-a">
                <p>We provide routine housekeeping visits across every London borough, covering Central, North, West, South, and East postcodes. Simply share your postcode to find our nearest available cleaner.</p>
              </div>
            </div>

            <div class="faq-item">
              <button class="faq-q" type="button">What are your customer support and operational hours?<span class="pm"></span></button>
              <div class="faq-a">
                <p>Our dispatch line and customer service channels remain open 24 hours a day, 7 days a week.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>