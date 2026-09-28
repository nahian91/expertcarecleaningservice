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
  .incl li{display:flex;gap:12px;font-size:.9rem;color:var(--color-text,#475569);font-weight:500}
  .incl li .ck{width:18px;height:18px;flex:none;margin-top:3px;stroke:var(--color-primary,#0066cc)}
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
        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> / <a href="<?php echo esc_url(home_url('#services')); ?>">Services</a> / <span>Airbnb Turnover Cleaning</span>
      </div>
      <span class="eyebrow">
        <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
        02 · Short-Let Turnover
      </span>
      <h1>Airbnb cleaning, <span class="shine">guest-ready every time.</span></h1>
      <p class="sub">Punctual, thorough turnover cleaning that protects your Superhost rating and ensures incoming guests arrive to 5-star cleanliness across London.</p>
    </div>
  </section>

  <!-- WHAT'S INCLUDED / SERVICE BREAKDOWN SPLIT -->
  <section class="section">
    <div class="wrap split">
      <!-- Left: Prose Description -->
      <div class="prose reveal in">
        <h3>What’s included.</h3>
        <p>Short-let hosting demands perfection between tight check-out and check-in windows. Our Airbnb turnover cleans handle every detail: hotel-quality bed dressing, complete laundry care, deep sanitisation of bathrooms and kitchens, restocking amenities, and a final quality check before your next guest arrives.</p>

        <h3>Ideal for</h3>
        <p>London Airbnb hosts, serviced apartment operators, and holiday let managers who require reliable, punctual turnarounds without having to manage cleaners directly.</p>

        <h3>How it works</h3>
        <p>Send us your property details, key safe or smart lock instructions, and regular guest check-in/out times. We coordinate seamlessly around your booking calendar. Every cleaner is vetted, trained, and fully insured. We bring professional products and equipment, handle linens, and leave welcome packs exactly where you want them.</p>

        <div class="split-actions">
          <a class="btn btn-primary" href="<?php echo esc_url(home_url('#quote')); ?>">Request Turnover Quote</a>
          <a class="btn btn-ghost" href="https://api.whatsapp.com/send?phone=447919033684&text=Hi%20Expertcare%20Cleaning%2C%20I%27d%20like%20an%20Airbnb%20turnover%20quote%20please." target="_blank" rel="noopener noreferrer">WhatsApp us →</a>
        </div>
      </div>

      <!-- Right: Boxed Checklist Card with All 12 Items -->
      <aside class="incl reveal in">
        <h3>Airbnb Cleaning</h3>
        <div class="pr">Bespoke turnover pricing · tailored to your property</div>
        
        <div class="checklist-title">12-Point Turnover Checklist Included:</div>
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

  <!-- RECENT WORK GALLERY -->
  <section class="section section--tight" style="padding-top:0">
    <div class="wrap">
      <div class="reveal">
        <span class="eyebrow">
          <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
          Recent Results
        </span>
        <h2 class="section-title">Photos from <em>real short-let turnovers.</em></h2>
        <p class="section-lead">Actual results from recent guest turnover cleaning jobs across London — the standard we bring to every visit.</p>
      </div>

      <div class="work-grid reveal">
        <figure class="work-card">
          <img src="https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?auto=format&fit=crop&w=800&q=80" alt="Fresh hotel-style bed linen dressing" loading="lazy">
          <figcaption>Bed Dressing &amp; Linens</figcaption>
        </figure>
        <figure class="work-card">
          <img src="https://images.unsplash.com/photo-1556911220-e15b29be8c8f?auto=format&fit=crop&w=800&q=80" alt="Spotless kitchen counters and hob" loading="lazy">
          <figcaption>Kitchen Sanitised</figcaption>
        </figure>
        <figure class="work-card">
          <img src="https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?auto=format&fit=crop&w=800&q=80" alt="Sanitised bathroom and folded towels" loading="lazy">
          <figcaption>Bathroom Guest-Ready</figcaption>
        </figure>
        <figure class="work-card">
          <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80" alt="Pristine living room presentation" loading="lazy">
          <figcaption>Living Area Presentation</figcaption>
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
          <button class="faq-q" type="button">What is included in an Airbnb turnover clean?<span class="pm"></span></button>
          <div class="faq-a">
            <p>Our Airbnb service covers the complete guest turnaround: stripping and making beds with fresh linens, laundry services, sanitising bathrooms, degreasing kitchen appliances, vacuuming and mopping, dusting, restocking toiletries, emptying bins, and conducting a final quality inspection before your next guest checks in.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-q" type="button">Can you manage tight check-out and check-in windows?<span class="pm"></span></button>
          <div class="faq-a">
            <p>Yes. Most host turnovers take place between 10:00 AM and 3:00 PM. We allocate dedicated cleaners to ensure the property is fully inspected and guest-ready before your next arrival.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-q" type="button">Do you handle laundry and fresh bed linen?<span class="pm"></span></button>
          <div class="faq-a">
            <p>Yes. We strip used linens and towels, wash and dry them on-site (or rotate your spare sets), and dress all beds to high hotel presentation standards.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-q" type="button">Do you restock toiletries and welcome amenities?<span class="pm"></span></button>
          <div class="faq-a">
            <p>Yes. If you keep supplies on-site (toilet rolls, soaps, shampoo, tea/coffee), our cleaners will restock them neatly according to your instructions.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-q" type="button">What if a guest damages or leaves the property excessively dirty?<span class="pm"></span></button>
          <div class="faq-a">
            <p>Our cleaners take photos immediately and flag any damages or left-behind items directly to you via WhatsApp before proceeding, helping you manage guest resolution claims quickly.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-q" type="button">What areas do you cover for short-let turnovers?<span class="pm"></span></button>
          <div class="faq-a">
            <p>We provide full Airbnb turnover coverage across all London boroughs: Central, North, East, South, and West London.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>