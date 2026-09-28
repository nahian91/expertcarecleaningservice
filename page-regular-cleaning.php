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

  /* Photos Grid */
  .work-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 14px;
    margin-top: 40px;
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
    margin-top: 46px;
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
    padding: 24px 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
  }
  .faq-q .pm {
    flex: none;
    width: 24px;
    height: 24px;
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
    width: 14px;
    height: 2px;
  }
  .faq-q .pm::after {
    width: 2px;
    height: 14px;
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
    padding-bottom: 24px;
    font-size: 0.96rem;
    max-width: 70ch;
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
    .work-grid {
      grid-template-columns: repeat(2, 1fr);
    }
  }
  @media (max-width: 560px) {
    .work-grid {
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
        01 · Regular Cleaning
      </span>
      <h1>Regular cleaning, <span class="shine">kept effortless.</span></h1>
      <p class="sub">A dependable weekly or fortnightly clean that keeps your London home consistently fresh — same trusted cleaner, same high standard, every visit.</p>
    </div>
  </section>

  <!-- WHAT'S INCLUDED / SERVICE BREAKDOWN SPLIT -->
  <section class="section">
    <div class="wrap split">
      <!-- Left: Prose Description -->
      <div class="prose reveal in">
        <h3>What’s included.</h3>
        <p>A regular clean keeps the whole home ticking over — the essentials done properly, every single visit, so you never come home to a list of chores. From general dusting and surface care to sanitising bathrooms, cleaning appliance exteriors, changing bed sheets, and keeping hallways and living areas spotless, we ensure complete peace of mind.</p>

        <h3>Ideal for</h3>
        <p>Busy professionals, families and households across London who want a consistent, dependable routine without lifting a finger.</p>

        <h3>How it works</h3>
        <p>Send us your postcode and a few details and we’ll confirm a tailored quote and available dates — usually within minutes. We take a 50% deposit to secure your booking, and the balance is paid once the clean is complete and you’re happy. Deposits are non-refundable, but you can reschedule with at least 48 hours’ notice. We bring our own products and equipment as standard, or use yours if you’d prefer.</p>

        <div class="split-actions">
          <a class="btn btn-primary" href="<?php echo esc_url(home_url('#quote')); ?>">Request a Tailored Quote</a>
          <a class="btn btn-ghost" href="https://api.whatsapp.com/send?phone=447919033684&text=Hi%20Expertcare%20Cleaning%2C%20I%27d%20like%20a%20regular%20cleaning%20quote%20please." target="_blank" rel="noopener noreferrer">WhatsApp us →</a>
        </div>
      </div>

      <!-- Right: Boxed Checklist Card with All 14 Items -->
      <aside class="incl reveal in">
        <h3>Regular Domestic Cleaning</h3>
        <div class="pr">Bespoke pricing · tailored to your home</div>
        
        <div class="checklist-title">14-Point Domestic Cleaning Checklist:</div>
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
        </ul>

        <a class="btn btn-primary" href="<?php echo esc_url(home_url('#quote')); ?>">Book this clean</a>
      </aside>
    </div>
  </section>

  <!-- RECENT WORK GALLERY -->
  <section class="section section--tight" style="padding-top:0">
    <div class="wrap">
      <div class="reveal">
        <span class="eyebrow">
          <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
          Recent Results
        </span>
        <h2 class="section-title">Photos from <em>real regular cleaning jobs.</em></h2>
        <p class="section-lead">Actual results from recent regular cleaning jobs across London — the standard we bring to every visit.</p>
      </div>

      <div class="work-grid reveal">
        <figure class="work-card">
          <img src="https://images.unsplash.com/photo-1583847268964-b28dc8f51f92?auto=format&fit=crop&w=800&q=80" alt="Living room cleaned" loading="lazy">
          <figcaption>Living Area</figcaption>
        </figure>
        <figure class="work-card">
          <img src="https://images.unsplash.com/photo-1556911220-e15b29be8c8f?auto=format&fit=crop&w=800&q=80" alt="Spotless kitchen worktop" loading="lazy">
          <figcaption>Kitchen Surfaces</figcaption>
        </figure>
        <figure class="work-card">
          <img src="https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?auto=format&fit=crop&w=800&q=80" alt="Freshly made bed" loading="lazy">
          <figcaption>Bedroom &amp; Linens</figcaption>
        </figure>
        <figure class="work-card">
          <img src="https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?auto=format&fit=crop&w=800&q=80" alt="Clean polished bathroom" loading="lazy">
          <figcaption>Sanitised Bathroom</figcaption>
        </figure>
      </div>
    </div>
  </section>

  <!-- FAQ SECTION -->
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
          <button class="faq-q" type="button">Do I need to be home during the clean?<span class="pm"></span></button>
          <div class="faq-a">
            <p>Not at all. Many regulars give us a key or use a smart lock. Every cleaner is vetted, trained and fully insured, so you can hand over the keys and get on with your day.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-q" type="button">Do you bring your own products and equipment?<span class="pm"></span></button>
          <div class="faq-a">
            <p>Yes, we bring everything we need as standard. If you’d prefer we use your own products, that’s easier still — just let us know when you book.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-q" type="button">How does payment work?<span class="pm"></span></button>
          <div class="faq-a">
            <p>We take a 50% deposit to secure your booking. The balance is paid once the clean is complete and you’re happy with the result. Deposits are non-refundable, but you can reschedule as long as you give us at least 48 hours’ notice.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-q" type="button">What areas do you cover?<span class="pm"></span></button>
          <div class="faq-a">
            <p>We cover all of London and surrounding boroughs across Central, North, East, South, and West London. Get in touch with your postcode and we’ll confirm a slot.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-q" type="button">What are your opening hours?<span class="pm"></span></button>
          <div class="faq-a">
            <p>We’re open 24 hours a day, 7 days a week.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>