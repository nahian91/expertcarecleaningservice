<?php
/**
 * Template Name: Inside Windows Cleaning
 *
 * @package Expertcare_Cleaning
 */

get_header(); ?>

<style>
  /* Internal CSS for Inside Windows Service Page */
  .page-hero{position:relative;padding:64px 0 54px;border-bottom:1px solid var(--color-border,#e2e8f0);background:linear-gradient(180deg,#ffffff,var(--color-bg-light,#f8fafc))}
  .page-hero::before{content:"";position:absolute;top:-140px;right:-80px;width:480px;height:480px;background:radial-gradient(circle,rgba(47,147,204,.18),transparent 65%);pointer-events:none}
  .crumb{font-size:.85rem;color:var(--color-muted,#94a3b8);margin-bottom:16px}
  .crumb a{color:var(--color-text,#475569);transition:color .2s}
  .crumb a:hover{color:var(--color-primary,#0066cc)}
  .crumb span{color:var(--color-primary,#0066cc);font-weight:500}
  .page-hero h1{font-family:var(--font-heading,'Poppins',sans-serif);font-weight:700;font-size:clamp(2rem,3.8vw,2.8rem);line-height:1.2;letter-spacing:-.01em;margin-top:10px;color:var(--color-dark,#0f172a)}
  .page-hero h1 .shine{color:var(--color-primary,#0066cc)}
  .page-hero p.sub{color:var(--color-text,#475569);font-size:1.15rem;margin-top:16px;max-width:58ch}

  .split{display:grid;grid-template-columns:1.1fr .9fr;gap:48px;align-items:start}
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
        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> / <a href="<?php echo esc_url(home_url('#services')); ?>">Services</a> / <span>Inside Windows Cleaning</span>
      </div>
      <span class="eyebrow">
        <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
        Specialist Clean · Inside Windows
      </span>
      <h1>Inside window cleaning, <span class="shine">streak-free clarity.</span></h1>
      <p class="sub">Crystal-clear interior glass, cleaned tracks, dusted frames, and spotless sills that maximise natural light across your London home.</p>
    </div>
  </section>

  <!-- WHAT'S INCLUDED / SERVICE BREAKDOWN SPLIT -->
  <section class="section">
    <div class="wrap split">
      <!-- Left: Prose Description -->
      <div class="prose reveal in">
        <h3>What’s included.</h3>
        <p>Over time, cooking steam, dust, pet marks, and condensation create a dull film over internal glass. Our inside window cleaning service delivers smear-free transparency using microfibre glass polishers, non-abrasive glass solutions, and detailed attention to window frames, tracks, and sills.</p>

        <h3>Ideal for</h3>
        <p>Homeowners, tenants, and Airbnb hosts wanting to maximise interior sunlight, refresh sunrooms and bi-fold glass doors, or prepare a property for end-of-tenancy inspections.</p>

        <h3>How it works</h3>
        <p>Tell us how many rooms, window panes, or French/bi-fold doors you have. We can book this as a standalone appointment or bundle it into your regular, deep, or end-of-tenancy clean for maximum convenience.</p>

        <div class="split-actions">
          <a class="btn btn-primary" href="<?php echo esc_url(home_url('#quote')); ?>">Request Window Quote</a>
          <a class="btn btn-ghost" href="https://api.whatsapp.com/send?phone=447919033684&text=Hi%20Expertcare%20Cleaning%2C%20I%27d%20like%20an%20inside%20windows%20quote%20please." target="_blank" rel="noopener noreferrer">WhatsApp us →</a>
        </div>
      </div>

      <!-- Right: Boxed Checklist Card with All Items -->
      <aside class="incl reveal in">
        <h3>Inside Windows</h3>
        <div class="pr">Bespoke pricing · per room or full house bundle</div>
        
        <div class="checklist-title">Inside Window Checklist Included:</div>
        <ul>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Complete interior glass streak-free polish
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Removal of fingerprints, grease &amp; condensation marks
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Detailed wiping of internal window frames &amp; corners
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Dusting and washing of internal window sills &amp; ledges
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Clearing built-up dust from sliding tracks
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            French door, patio door &amp; bi-fold glass panels
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Interior glass partitions &amp; balustrades
          </li>
          <li>
            <svg class="ck" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l5 5L20 6"/></svg>
            Final quality review for crystal clarity
          </li>
        </ul>

        <a class="btn btn-primary" href="<?php echo esc_url(home_url('#quote')); ?>">Book Window Clean</a>
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
        <h2 class="section-title">Photos from <em>real inside window cleans.</em></h2>
        <p class="section-lead">Actual results from recent internal glass cleaning appointments across London — the standard we bring to every visit.</p>
      </div>

      <div class="work-grid reveal">
        <figure class="work-card">
          <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=800&q=80" alt="Streak free window glass" loading="lazy">
          <figcaption>Streak-Free Glass</figcaption>
        </figure>
        <figure class="work-card">
          <img src="https://images.unsplash.com/photo-1505691938895-1758d7feb511?auto=format&fit=crop&w=800&q=80" alt="Window sill and frame clean" loading="lazy">
          <figcaption>Frames &amp; Sills Cleaned</figcaption>
        </figure>
        <figure class="work-card">
          <img src="https://images.unsplash.com/photo-1507652313519-d4e9174996dd?auto=format&fit=crop&w=800&q=80" alt="Bathroom window clean" loading="lazy">
          <figcaption>Bathroom Glazing</figcaption>
        </figure>
        <figure class="work-card">
          <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80" alt="Living room patio window clean" loading="lazy">
          <figcaption>Living Area Panes</figcaption>
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
          <button class="faq-q" type="button">Do you clean external windows as well?<span class="pm"></span></button>
          <div class="faq-a">
            <p>This dedicated service covers all interior glass, sills, and reachable interior frames. If you need exterior glass done, reachable balcony or ground-floor glass can be accommodated upon request.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-q" type="button">Do you wipe the sills and internal tracks?<span class="pm"></span></button>
          <div class="faq-a">
            <p>Yes. We remove loose dust, wipe down the window sill, clean frame corners, and ensure sliding door tracks are free of built-up grit.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-q" type="button">Can this be added to a domestic or deep clean?<span class="pm"></span></button>
          <div class="faq-a">
            <p>Yes. While light internal glass is included in deep cleans, you can add comprehensive whole-home internal window detailing to any booking.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-q" type="button">What equipment do you use?<span class="pm"></span></button>
          <div class="faq-a">
            <p>We use lint-free microfibres, premium glass treatment solutions, and squeegees designed to leave zero smears or residue.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-q" type="button">What areas do you cover?<span class="pm"></span></button>
          <div class="faq-a">
            <p>We provide full internal window cleaning coverage across all London boroughs: Central, North, East, South, and West London.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>