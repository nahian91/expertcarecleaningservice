<?php
/**
 * Expertcare Cleaning Service Functions and Definitions
 *
 * @package Expertcare_Cleaning
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Prevent direct access
}

define( 'EXPERTCARE_VERSION', '1.0.0' );
define( 'EXPERTCARE_DIR', get_template_directory() );
define( 'EXPERTCARE_URI', get_template_directory_uri() );

/* ==========================================================================
   Theme Setup & Capabilities
   ========================================================================== */

if ( ! function_exists( 'expertcare_setup' ) ) :
    function expertcare_setup() {
        // Translation support
        load_theme_textdomain( 'expertcare', EXPERTCARE_DIR . '/languages' );

        // Document head title handling
        add_theme_support( 'title-tag' );

        // Featured images
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 1200, 630, true );

        // Selective refresh for widgets in customizer
        add_theme_support( 'customize-selective-refresh-widgets' );

        // HTML5 markup support
        add_theme_support( 'html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ] );

        // Custom Logo support via Customizer
        add_theme_support( 'custom-logo', [
            'height'      => 80,
            'width'       => 240,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => [ 'site-title', 'site-description' ],
        ] );

        // Register Navigation Menus
        register_nav_menus( [
            'primary' => __( 'Primary Navigation', 'expertcare' ),
            'mobile'  => __( 'Mobile Navigation', 'expertcare' ),
            'footer'  => __( 'Footer Services Menu', 'expertcare' ),
        ] );
    }
endif;
add_action( 'after_setup_theme', 'expertcare_setup' );

/* ==========================================================================
   Asset Enqueues (Styles & Scripts)
   ========================================================================== */

function expertcare_scripts() {
    // 1. Google Fonts
    wp_enqueue_style(
        'expertcare-google-fonts',
        'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap',
        [],
        null
    );

    // 2. Main Stylesheet with dynamic filemtime versioning for cache-busting
    $css_file = EXPERTCARE_DIR . '/assets/css/style.css';
    $css_ver  = file_exists( $css_file ) ? filemtime( $css_file ) : EXPERTCARE_VERSION;

    wp_enqueue_style(
        'expertcare-style',
        EXPERTCARE_URI . '/assets/css/style.css',
        [],
        $css_ver
    );

    // 3. Main JavaScript file
    $js_file = EXPERTCARE_DIR . '/assets/js/main.js';
    $js_ver  = file_exists( $js_file ) ? filemtime( $js_file ) : EXPERTCARE_VERSION;

    wp_enqueue_script(
        'expertcare-main',
        EXPERTCARE_URI . '/assets/js/main.js',
        [],
        $js_ver,
        [ 'strategy' => 'defer', 'in_footer' => true ]
    );

    // 4. Pass backend parameters to client-side JS
    wp_localize_script( 'expertcare-main', 'ExpertcareData', [
        'ajaxUrl'  => admin_url( 'admin-ajax.php' ),
        'siteUrl'  => home_url( '/' ),
        'phone'    => '07919 033684',
        'whatsapp' => '447919033684',
    ] );
}
add_action( 'wp_enqueue_scripts', 'expertcare_scripts' );

/* ==========================================================================
   Performance: Resource Hints (Preconnect for Google Fonts)
   ========================================================================== */

function expertcare_resource_hints( $urls, $relation_type ) {
    if ( wp_style_is( 'expertcare-google-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
        $urls[] = [
            'href'        => 'https://fonts.googleapis.com',
            'crossorigin' => 'anonymous',
        ];
        $urls[] = [
            'href'        => 'https://fonts.gstatic.com',
            'crossorigin' => 'anonymous',
        ];
    }
    return $urls;
}
add_filter( 'wp_resource_hints', 'expertcare_resource_hints', 10, 2 );

/* ==========================================================================
   Security & Header Cleanup
   ========================================================================== */

// Remove WordPress generator version tag
remove_action( 'wp_head', 'wp_generator' );

// Remove Windows Live Writer and RSD links
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );

// Disable core emoji scripts and styles to improve page speed
function expertcare_disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'expertcare_disable_emojis' );

/* ==========================================================================
   Helper Functions (Global Site Details)
   ========================================================================== */

/**
 * Returns formatted WhatsApp link
 */
function expertcare_get_whatsapp_url( $message = "Hi Expertcare Cleaning, I'd like a cleaning quote please." ) {
    return 'https://api.whatsapp.com/send?phone=447919033684&text=' . rawurlencode( $message );
}

/**
 * Returns clean sanitized tel link
 */
function expertcare_get_phone_url() {
    return 'tel:+447919033684';
}
/* ==========================================================================
   Complete Client Reviews CPT with Textarea, Photo & 1-Click Approve/Decline
   ========================================================================== */

// 1. Register 'expertcare_review' Custom Post Type (No WYSIWYG Editor)
function expertcare_register_review_cpt() {
    $labels = [
        'name'               => _x('Client Reviews', 'post type general name', 'expertcare'),
        'singular_name'      => _x('Review', 'post type singular name', 'expertcare'),
        'menu_name'          => _x('Client Reviews', 'admin menu', 'expertcare'),
        'name_admin_bar'     => _x('Review', 'add new on admin bar', 'expertcare'),
        'add_new'            => _x('Add New Review', 'review', 'expertcare'),
        'add_new_item'       => __('Add New Review', 'expertcare'),
        'new_item'           => __('New Review', 'expertcare'),
        'edit_item'          => __('Edit Review', 'expertcare'),
        'view_item'          => __('View Review', 'expertcare'),
        'all_items'          => __('All Reviews', 'expertcare'),
        'search_items'       => __('Search Reviews', 'expertcare'),
        'not_found'          => __('No reviews found.', 'expertcare'),
        'not_found_in_trash' => __('No reviews found in Trash.', 'expertcare'),
    ];

    $args = [
        'labels'             => $labels,
        'description'        => __('Customer reviews and testimonials for Expertcare Cleaning.', 'expertcare'),
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => false,
        'rewrite'            => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-star-filled',
        'supports'           => ['title', 'thumbnail'], // Title = Name, Thumbnail = Avatar
        'show_in_rest'       => false,
    ];

    register_post_type('expertcare_review', $args);
}
add_action('init', 'expertcare_register_review_cpt');


// 2. Custom Meta Box with Plain Textarea & Settings
function expertcare_add_review_meta_boxes() {
    add_meta_box(
        'expertcare_review_box',
        __('Review Content & Client Details', 'expertcare'),
        'expertcare_render_review_metabox',
        'expertcare_review',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'expertcare_add_review_meta_boxes');

function expertcare_render_review_metabox($post) {
    wp_nonce_field('expertcare_review_meta_nonce_action', 'expertcare_review_meta_nonce');

    $rating   = get_post_meta($post->ID, '_review_rating', true) ?: '5';
    $location = get_post_meta($post->ID, '_review_location', true) ?: 'London';
    $comment  = $post->post_content;
    ?>
    <div style="margin-top: 10px;">
        <label for="review_comment" style="font-weight:600;display:block;margin-bottom:6px;">
            <?php _e('Review / Client Comment:', 'expertcare'); ?>
        </label>
        <textarea 
            name="review_comment" 
            id="review_comment" 
            rows="6" 
            style="width:100%;padding:12px;font-family:inherit;font-size:14px;border:1px solid #8c8f94;border-radius:4px;box-sizing:border-box;" 
            placeholder="<?php esc_attr_e('Enter client feedback...', 'expertcare'); ?>"><?php echo esc_textarea($comment); ?></textarea>
    </div>

    <div style="display:flex;gap:24px;flex-wrap:wrap;margin-top:18px;">
        <div style="flex:1;min-width:220px;">
            <label for="review_rating" style="font-weight:600;display:block;margin-bottom:6px;">
                <?php _e('Star Rating (1 to 5):', 'expertcare'); ?>
            </label>
            <select name="review_rating" id="review_rating" style="width:100%;height:38px;">
                <?php for ($i = 5; $i >= 1; $i--) : ?>
                    <option value="<?php echo $i; ?>" <?php selected($rating, $i); ?>>
                        <?php echo str_repeat('★', $i) . str_repeat('☆', 5 - $i); ?> (<?php echo $i; ?> Stars)
                    </option>
                <?php endfor; ?>
            </select>
        </div>

        <div style="flex:1;min-width:220px;">
            <label for="review_location" style="font-weight:600;display:block;margin-bottom:6px;">
                <?php _e('Client Area / Service (e.g. Central London · Airbnb Clean):', 'expertcare'); ?>
            </label>
            <input 
                type="text" 
                name="review_location" 
                id="review_location" 
                value="<?php echo esc_attr($location); ?>" 
                style="width:100%;height:38px;" 
            />
        </div>
    </div>
    <?php
}


// 3. Save Textarea Content & Meta Data
function expertcare_save_review_meta($post_id) {
    if (!isset($_POST['expertcare_review_meta_nonce']) || !wp_verify_nonce($_POST['expertcare_review_meta_nonce'], 'expertcare_review_meta_nonce_action')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['review_comment'])) {
        remove_action('save_post_expertcare_review', 'expertcare_save_review_meta');

        wp_update_post([
            'ID'           => $post_id,
            'post_content' => sanitize_textarea_field($_POST['review_comment']),
        ]);

        add_action('save_post_expertcare_review', 'expertcare_save_review_meta');
    }

    if (isset($_POST['review_rating'])) {
        update_post_meta($post_id, '_review_rating', sanitize_text_field($_POST['review_rating']));
    }

    if (isset($_POST['review_location'])) {
        update_post_meta($post_id, '_review_location', sanitize_text_field($_POST['review_location']));
    }
}
add_action('save_post_expertcare_review', 'expertcare_save_review_meta');


// 4. Custom Admin Columns in WordPress Dashboard (With Approve / Decline Buttons)
function expertcare_review_admin_columns($columns) {
    $new_columns = [];
    $new_columns['cb']        = $columns['cb'];
    $new_columns['photo']     = __('Photo', 'expertcare');
    $new_columns['title']     = __('Client Name', 'expertcare');
    $new_columns['rating']    = __('Rating', 'expertcare');
    $new_columns['comment']   = __('Review Text', 'expertcare');
    $new_columns['location']  = __('Area / Subtitle', 'expertcare');
    $new_columns['status']    = __('Status', 'expertcare');
    $new_columns['actions']   = __('Moderate Action', 'expertcare'); // New Action Buttons Column
    $new_columns['date']      = __('Submitted', 'expertcare');
    return $new_columns;
}
add_filter('manage_expertcare_review_posts_columns', 'expertcare_review_admin_columns');

function expertcare_render_review_admin_columns($column, $post_id) {
    switch ($column) {
        case 'photo':
            if (has_post_thumbnail($post_id)) {
                echo get_the_post_thumbnail($post_id, [42, 42], ['style' => 'border-radius:50%;object-fit:cover;width:42px;height:42px;display:block;']);
            } else {
                echo '<span style="display:inline-block;width:42px;height:42px;border-radius:50%;background:#e2e8f0;line-height:42px;text-align:center;font-weight:600;color:#64748b;">—</span>';
            }
            break;

        case 'rating':
            $rating = intval(get_post_meta($post_id, '_review_rating', true) ?: 5);
            echo '<span style="color:#f59e0b;letter-spacing:1px;font-size:14px;white-space:nowrap;">' . str_repeat('★', $rating) . str_repeat('☆', 5 - $rating) . '</span>';
            break;

        case 'comment':
            echo esc_html(wp_trim_words(get_post_field('post_content', $post_id), 12, '...'));
            break;

        case 'location':
            echo esc_html(get_post_meta($post_id, '_review_location', true) ?: '—');
            break;

        case 'status':
            $status = get_post_status($post_id);
            if ('publish' === $status) {
                echo '<span style="display:inline-block;padding:3px 8px;font-size:11px;font-weight:700;color:#15803d;background:#dcfce7;border-radius:4px;">Published</span>';
            } elseif ('pending' === $status) {
                echo '<span style="display:inline-block;padding:3px 8px;font-size:11px;font-weight:700;color:#b45309;background:#fef3c7;border-radius:4px;">Pending Review</span>';
            } else {
                echo '<span style="display:inline-block;padding:3px 8px;font-size:11px;font-weight:700;color:#475569;background:#f1f5f9;border-radius:4px;">' . esc_html(ucfirst($status)) . '</span>';
            }
            break;

        case 'actions':
            $status = get_post_status($post_id);

            // Approve Action URL
            $approve_url = wp_nonce_url(
                admin_url('admin-post.php?action=expertcare_moderate_review&mod_action=approve&post_id=' . $post_id),
                'expertcare_mod_action_' . $post_id
            );

            // Decline Action URL (sets to draft or trash)
            $decline_url = wp_nonce_url(
                admin_url('admin-post.php?action=expertcare_moderate_review&mod_action=decline&post_id=' . $post_id),
                'expertcare_mod_action_' . $post_id
            );

            echo '<div style="display:flex;gap:6px;align-items:center;">';

            if ('publish' !== $status) {
                echo '<a href="' . esc_url($approve_url) . '" class="button button-small" style="background:#16a34a;border-color:#15803d;color:#ffffff;font-weight:600;" title="Approve & Show on Website">✓ Approve</a>';
            } else {
                echo '<span style="font-size:11px;color:#16a34a;font-weight:600;">Active</span>';
            }

            if ('draft' !== $status) {
                echo '<a href="' . esc_url($decline_url) . '" class="button button-small" style="background:#dc2626;border-color:#b91c1c;color:#ffffff;font-weight:600;" onclick="return confirm(\'Decline this review? It will be removed from the live site.\');" title="Decline / Unpublish">✕ Decline</a>';
            }

            echo '</div>';
            break;
    }
}
add_action('manage_expertcare_review_posts_custom_column', 'expertcare_render_review_admin_columns', 10, 2);


// 5. Handle Admin One-Click Approve / Decline Actions
function expertcare_process_review_moderation() {
    if (!current_user_can('edit_posts')) {
        wp_die(__('Unauthorized user permissions.', 'expertcare'));
    }

    $post_id    = isset($_GET['post_id']) ? intval($_GET['post_id']) : 0;
    $mod_action = isset($_GET['mod_action']) ? sanitize_text_field($_GET['mod_action']) : '';

    check_admin_referer('expertcare_mod_action_' . $post_id);

    if ($post_id && get_post_type($post_id) === 'expertcare_review') {
        if ('approve' === $mod_action) {
            wp_update_post([
                'ID'          => $post_id,
                'post_status' => 'publish',
            ]);
            $redirect_flag = 'approved';
        } elseif ('decline' === $mod_action) {
            wp_update_post([
                'ID'          => $post_id,
                'post_status' => 'draft',
            ]);
            $redirect_flag = 'declined';
        }
    }

    wp_safe_redirect(admin_url('edit.php?post_type=expertcare_review&mod_notice=' . $redirect_flag));
    exit;
}
add_action('admin_post_expertcare_moderate_review', 'expertcare_process_review_moderation');

// Notice bar at the top of admin list after clicking Approve or Decline
function expertcare_review_moderation_admin_notices() {
    global $pagenow, $post_type;

    if ($pagenow === 'edit.php' && $post_type === 'expertcare_review' && isset($_GET['mod_notice'])) {
        if ('approved' === $_GET['mod_notice']) {
            echo '<div class="notice notice-success is-dismissible"><p><strong>Review Approved!</strong> It is now published live on your site.</p></div>';
        } elseif ('declined' === $_GET['mod_notice']) {
            echo '<div class="notice notice-warning is-dismissible"><p><strong>Review Declined!</strong> It has been unpublished and set to draft.</p></div>';
        }
    }
}
add_action('admin_notices', 'expertcare_review_moderation_admin_notices');


// 6. Frontend Form Submission Handler (Saves as 'pending' for Moderation)
function expertcare_handle_review_submission() {
    if (!isset($_POST['action']) || $_POST['action'] !== 'submit_expertcare_review') {
        return;
    }

    if (!isset($_POST['review_nonce']) || !wp_verify_nonce($_POST['review_nonce'], 'submit_review_action')) {
        wp_die(__('Security verification failed.', 'expertcare'));
    }

    // Anti-spam honeypot
    if (!empty($_POST['website_hp'])) {
        wp_die(__('Spam submission detected.', 'expertcare'));
    }

    $name     = sanitize_text_field($_POST['client_name'] ?? '');
    $location = sanitize_text_field($_POST['client_location'] ?? 'London');
    $rating   = intval($_POST['client_rating'] ?? 5);
    $comment  = sanitize_textarea_field($_POST['client_comment'] ?? '');

    if (empty($name) || empty($comment)) {
        wp_redirect(add_query_arg('review_status', 'error', wp_get_referer()));
        exit;
    }

    // Post created as 'pending' so it waits for admin approval
    $post_id = wp_insert_post([
        'post_title'   => $name,
        'post_content' => $comment,
        'post_type'    => 'expertcare_review',
        'post_status'  => 'pending',
    ]);

    if (!is_wp_error($post_id)) {
        update_post_meta($post_id, '_review_rating', $rating);
        update_post_meta($post_id, '_review_location', $location);

        if (!empty($_FILES['client_photo']['name'])) {
            require_once(ABSPATH . 'wp-admin/includes/image.php');
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            require_once(ABSPATH . 'wp-admin/includes/media.php');

            $attachment_id = media_handle_upload('client_photo', $post_id);
            if (!is_wp_error($attachment_id)) {
                set_post_thumbnail($post_id, $attachment_id);
            }
        }

        wp_redirect(add_query_arg('review_status', 'success', wp_get_referer()));
        exit;
    } else {
        wp_redirect(add_query_arg('review_status', 'error', wp_get_referer()));
        exit;
    }
}
add_action('admin_post_nopriv_submit_expertcare_review', 'expertcare_handle_review_submission');
add_action('admin_post_submit_expertcare_review', 'expertcare_handle_review_submission');