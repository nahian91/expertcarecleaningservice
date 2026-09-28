<?php
/**
 * Template Name: Reviews Archive & Submission Form
 *
 * @package Expertcare_Cleaning
 */

get_header(); ?>

<style>
  /* ==========================================================================
     Reviews Page Hero & Single-Column Form
     ========================================================================== */
  .reviews-hero {
    padding: 64px 0 44px;
    background: linear-gradient(180deg, #ffffff, var(--color-bg-light, #f8fafc));
    border-bottom: 1px solid var(--color-border, #e2e8f0);
    text-align: center;
  }
  .reviews-hero h1 {
    font-size: clamp(2.2rem, 3.8vw, 3rem);
    margin-top: 10px;
    margin-bottom: 12px;
    color: var(--color-dark, #0f172a);
  }
  .reviews-hero .lead {
    font-size: 1.05rem;
    color: var(--color-text, #475569);
    max-width: 60ch;
    margin: 0 auto 24px;
    line-height: 1.6;
  }
  .score-badge-card {
    display: inline-flex;
    align-items: center;
    gap: 14px;
    background: #ffffff;
    border: 1px solid var(--color-border, #e2e8f0);
    border-radius: 9999px;
    padding: 8px 22px;
    box-shadow: 0 4px 14px rgba(15, 23, 42, 0.05);
  }
  .score-badge-card .num {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--color-dark, #0f172a);
    line-height: 1;
  }
  .score-badge-card .stars-gold {
    color: #f59e0b;
    letter-spacing: 2px;
    font-size: 1.1rem;
  }
  .score-badge-card .tagline {
    font-size: 0.86rem;
    font-weight: 500;
    color: var(--color-text, #475569);
  }

  /* Single Column Submission Form */
  .review-submit-section {
    background: #f8fafc;
    padding: 56px 0 96px;
  }
  .review-form-card-single {
    width: 100%;
    max-width: 620px;
    margin: 0 auto;
    background: #ffffff;
    border: 1px solid var(--color-border, #e2e8f0);
    border-radius: 20px;
    padding: 40px 36px;
    box-shadow: 0 12px 30px -4px rgba(15, 23, 42, 0.08);
  }
  .form-title-wrap {
    text-align: center;
    margin-bottom: 28px;
  }
  .form-title-wrap h2 {
    font-size: 1.85rem;
    color: var(--color-dark, #0f172a);
    margin-top: 10px;
    margin-bottom: 8px;
  }
  .form-title-wrap p {
    color: var(--color-text, #475569);
    font-size: 0.92rem;
    line-height: 1.55;
    margin: 0;
  }
  .single-col-form {
    display: flex;
    flex-direction: column;
    gap: 18px;
  }
  .single-col-form .field {
    display: flex;
    flex-direction: column;
    gap: 6px;
  }
  .single-col-form label {
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--color-dark, #0f172a);
  }
  .single-col-form input[type="text"],
  .single-col-form select,
  .single-col-form textarea {
    width: 100%;
    padding: 12px 14px;
    border: 1px solid var(--color-border, #e2e8f0);
    border-radius: 8px;
    font-size: 0.93rem;
    color: var(--color-dark, #0f172a);
    background: #ffffff;
    outline: none;
    box-sizing: border-box;
    transition: border-color 0.2s;
    font-family: inherit;
  }
  .single-col-form input[type="text"]:focus,
  .single-col-form select:focus,
  .single-col-form textarea:focus {
    border-color: var(--color-primary, #0066cc);
  }
  .single-col-form textarea {
    min-height: 120px;
    resize: vertical;
  }
  .file-dropzone {
    border: 2px dashed #cbd5e1;
    border-radius: 10px;
    padding: 18px;
    text-align: center;
    background: #f8fafc;
    cursor: pointer;
    transition: all 0.2s;
  }
  .file-dropzone:hover {
    border-color: var(--color-primary, #0066cc);
    background: #f0f7ff;
  }
  .file-dropzone input[type="file"] {
    display: block;
    width: 100%;
    font-size: 0.85rem;
    color: var(--color-text, #475569);
  }

  /* Form Notice Alerts */
  .review-notice {
    padding: 14px 18px;
    border-radius: 8px;
    margin-bottom: 22px;
    font-size: 0.92rem;
  }
  .review-notice.success {
    background: #ecfdf5;
    border: 1px solid #10b981;
    color: #065f46;
  }
  .review-notice.error {
    background: #fef2f2;
    border: 1px solid #ef4444;
    color: #991b1b;
  }

  @media (max-width: 640px) {
    .review-form-card-single {
      padding: 30px 20px;
    }
    .score-badge-card {
      flex-direction: column;
      border-radius: 16px;
      gap: 6px;
    }
  }
</style>

<main>
  <!-- HERO HEADER & TRUST SCORE -->
  <section class="reviews-hero">
    <div class="wrap">
      <span class="eyebrow" style="justify-content:center">
        <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
        Client Feedback &amp; Ratings
      </span>
      <h1>Client Reviews &amp; Testimonials</h1>
      <p class="lead">
        Verified impressions and feedback from domestic clients, tenancy checkouts, and short-let Airbnb hosts across London.
      </p>

      <div class="score-badge-card">
        <div class="num">4.8</div>
        <div class="stars-gold">★★★★★</div>
        <div class="tagline">Rated 4.8 / 5 Across Verified London Jobs</div>
      </div>
    </div>
  </section>

  <!-- 1-COLUMN SUBMISSION FORM ONLY -->
  <section class="review-submit-section" id="leave-review">
    <div class="wrap">
      <div class="review-form-card-single">
        
        <div class="form-title-wrap">
          <span class="eyebrow" style="justify-content:center">
            <svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
            Leave Your Feedback
          </span>
          <h2>Share Your Experience</h2>
          <p>We appreciate your feedback. All reviews are reviewed by our team before appearing publicly.</p>
        </div>

        <?php if ( isset( $_GET['review_status'] ) && $_GET['review_status'] === 'success' ) : ?>
          <div class="review-notice success">
            <strong>Thank you!</strong> Your review has been submitted for moderation. Once approved by our team, it will be published on our home page.
          </div>
        <?php elseif ( isset( $_GET['review_status'] ) && $_GET['review_status'] === 'error' ) : ?>
          <div class="review-notice error">
            <strong>Error:</strong> Please fill in all required fields and try submitting again.
          </div>
        <?php endif; ?>

        <form class="single-col-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="action" value="submit_expertcare_review">
          <?php wp_nonce_field( 'submit_review_action', 'review_nonce' ); ?>
          
          <!-- Anti-spam honeypot field -->
          <input type="text" name="website_hp" style="display:none" tabindex="-1" autocomplete="off">

          <div class="field">
            <label for="client_name">Your Name *</label>
            <input type="text" id="client_name" name="client_name" required placeholder="e.g. Kevin Wilson">
          </div>

          <div class="field">
            <label for="client_location">Area / Clean Type *</label>
            <input type="text" id="client_location" name="client_location" required placeholder="e.g. Regular Client · North London">
          </div>

          <div class="field">
            <label for="client_rating">Star Rating *</label>
            <select id="client_rating" name="client_rating" required>
              <option value="5" selected>★★★★★ (5 Stars - Excellent)</option>
              <option value="4">★★★★☆ (4 Stars - Very Good)</option>
              <option value="3">★★★☆☆ (3 Stars - Average)</option>
              <option value="2">★★☆☆☆ (2 Stars - Below Average)</option>
              <option value="1">★☆☆☆☆ (1 Star - Poor)</option>
            </select>
          </div>

          <div class="field">
            <label for="client_photo">Your Photo / Avatar (Optional)</label>
            <div class="file-dropzone">
              <input type="file" id="client_photo" name="client_photo" accept="image/png, image/jpeg, image/webp">
            </div>
          </div>

          <div class="field">
            <label for="client_comment">Your Review *</label>
            <textarea id="client_comment" name="client_comment" required placeholder="Tell us how our cleaning team performed..."></textarea>
          </div>

          <button type="submit" class="btn btn-primary" style="width:100%;padding:14px;margin-top:6px;">
            Submit Review for Verification
          </button>
        </form>

      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>