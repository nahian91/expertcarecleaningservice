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
        load_theme_textdomain( 'expertcare', EXPERTCARE_DIR . '/languages' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 1200, 630, true );
        add_theme_support( 'customize-selective-refresh-widgets' );

        add_theme_support( 'html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ] );

        add_theme_support( 'custom-logo', [
            'height'      => 80,
            'width'       => 240,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => [ 'site-title', 'site-description' ],
        ] );

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
    wp_enqueue_style(
        'expertcare-google-fonts',
        'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@400;500;600;700;800&display=swap',
        [],
        null
    );

    $css_file = EXPERTCARE_DIR . '/assets/css/style.css';
    $css_ver  = file_exists( $css_file ) ? filemtime( $css_file ) : EXPERTCARE_VERSION;

    wp_enqueue_style(
        'expertcare-style',
        EXPERTCARE_URI . '/assets/css/style.css',
        [],
        $css_ver
    );

    $js_file = EXPERTCARE_DIR . '/assets/js/main.js';
    $js_ver  = file_exists( $js_file ) ? filemtime( $js_file ) : EXPERTCARE_VERSION;

    wp_enqueue_script(
        'expertcare-main',
        EXPERTCARE_URI . '/assets/js/main.js',
        [],
        $js_ver,
        [ 'strategy' => 'defer', 'in_footer' => true ]
    );

    wp_localize_script( 'expertcare-main', 'ExpertcareData', [
        'ajaxUrl'  => admin_url( 'admin-ajax.php' ),
        'siteUrl'  => home_url( '/' ),
        'phone'    => get_option( 'expertcare_phone', '' ),
        'whatsapp' => get_option( 'expertcare_whatsapp', '' ),
    ] );
}
add_action( 'wp_enqueue_scripts', 'expertcare_scripts' );

/* ==========================================================================
   Auto-Redirect on Login to Hub
   ========================================================================== */

function expertcare_login_redirect( $redirect_to, $request, $user ) {
    if ( isset( $user->roles ) && is_array( $user->roles ) ) {
        if ( in_array( 'administrator', $user->roles ) || in_array( 'editor', $user->roles ) ) {
            return admin_url( 'admin.php?page=expertcare-hub' );
        }
    }
    return $redirect_to;
}
add_filter( 'login_redirect', 'expertcare_login_redirect', 10, 3 );

/* ==========================================================================
   Modern SaaS Admin UI Styles & Assets
   ========================================================================== */

function expertcare_admin_setup_assets( $hook ) {
    if ( strpos( $hook, 'expertcare' ) !== false ) {
        wp_enqueue_media();
        wp_enqueue_script( 'jquery-ui-sortable' );

        $custom_admin_css = "
            @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
            
            #adminmenumain, #wpfooter { display: none !important; }
            #wpcontent, #wpfooter { margin-left: 0 !important; padding: 0 !important; }
            #wpbody-content { padding-bottom: 0 !important; }
            body.wp-admin { background: #090e1a; font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif; color: #1e293b; overflow-x: hidden; }
            
            .hub-app-shell { display: grid; grid-template-columns: 280px 1fr; min-height: 100vh; }
            @media (max-width: 1100px) { .hub-app-shell { grid-template-columns: 1fr; } }

            /* Left Rail Navigation */
            .hub-left-rail { background: #0c1322; border-right: 1px solid rgba(255,255,255,0.06); padding: 30px 20px; display: flex; flex-direction: column; }
            .hub-brand { display: flex; align-items: center; gap: 14px; margin-bottom: 28px; padding-bottom: 22px; border-bottom: 1px solid rgba(255,255,255,0.06); }
            .hub-brand svg { width: 34px; height: 34px; fill: #38bdf8; flex-shrink: 0; filter: drop-shadow(0 0 12px rgba(56,189,248,0.4)); }
            
            .hub-section-label { font-size: 10.5px; font-weight: 800; letter-spacing: 0.12em; color: #475569; text-transform: uppercase; margin: 18px 10px 8px; }
            .hub-nav-link { display: flex; align-items: center; justify-content: space-between; padding: 11px 14px; border-radius: 10px; color: #94a3b8; text-decoration: none; font-size: 13.5px; font-weight: 600; margin-bottom: 4px; transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1); }
            .hub-nav-link:hover { background: rgba(255,255,255,0.05); color: #f8fafc; transform: translateX(3px); }
            .hub-nav-link.active { background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%); color: #ffffff; box-shadow: 0 4px 18px rgba(2,132,199,0.38); }
            .hub-nav-link .badge { font-size: 10px; padding: 3px 8px; border-radius: 6px; background: rgba(255,255,255,0.08); color: inherit; font-weight: 800; letter-spacing: 0.04em; }
            .hub-nav-link.active .badge { background: rgba(255,255,255,0.24); color: #fff; }

            /* Logout Footer Box */
            .hub-user-panel { margin-top: auto; padding-top: 20px; border-top: 1px solid rgba(255,255,255,0.08); display: flex; align-items: center; justify-content: space-between; gap: 10px; }
            .hub-user-meta { display: flex; align-items: center; gap: 12px; }
            .hub-user-meta img { width: 36px; height: 36px; border-radius: 50%; object-fit: cover; border: 2px solid #1e293b; }
            .hub-user-meta strong { font-size: 13px; color: #f8fafc; display: block; line-height: 1.2; font-weight: 700; }
            .hub-user-meta span { font-size: 11px; color: #64748b; font-weight: 500; }
            .hub-logout-btn { background: rgba(239,68,68,0.12); color: #f87171 !important; border: 1px solid rgba(239,68,68,0.2); font-size: 11.5px; font-weight: 700; padding: 7px 12px; border-radius: 8px; text-decoration: none; transition: all 0.2s; }
            .hub-logout-btn:hover { background: #ef4444; color: #fff !important; }

            /* Right Main Container */
            .hub-main { background: #f8fafc; padding: 36px 48px; min-height: 100vh; box-sizing: border-box; }
            .hub-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 28px; flex-wrap: wrap; gap: 16px; }
            .hub-header h1 { font-size: 26px; font-weight: 800; color: #0f172a; margin: 0; letter-spacing: -0.03em; }
            
            .hub-grid { display: grid; grid-template-columns: 1.28fr 0.72fr; gap: 28px; align-items: start; }
            @media (max-width: 1240px) { .hub-grid { grid-template-columns: 1fr; } }

            .hub-card { background: #ffffff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 26px; box-shadow: 0 4px 20px rgba(15,23,42,0.03); margin-bottom: 24px; }
            .hub-card h3 { font-size: 15.5px; font-weight: 700; color: #0f172a; margin: 0 0 18px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px; display: flex; align-items: center; gap: 10px; }
            .hub-field { margin-bottom: 16px; }
            .hub-field label { display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 7px; }
            .hub-field input[type=text], .hub-field textarea { width: 100%; border-radius: 10px; border: 1px solid #cbd5e1; padding: 10px 14px; font-size: 13.5px; background: #fafafa; font-family: inherit; transition: all 0.2s; }
            .hub-field input[type=text]:focus, .hub-field textarea:focus { border-color: #0284c7; box-shadow: 0 0 0 3px rgba(2,132,199,0.12); outline: none; background: #fff; }

            /* Sortable Drag & Drop */
            .sortable-placeholder { background: #f0f9ff !important; border: 2px dashed #38bdf8 !important; border-radius: 10px; visibility: visible !important; min-height: 48px; }
            .sort-handle { color: #94a3b8; cursor: grab; padding: 0 8px; font-size: 18px; user-select: none; line-height: 1; }
            .sort-handle:active { cursor: grabbing; color: #0284c7; }
            .checklist-row, .faq-row, .image-box, .area-row, .prose-row { transition: box-shadow 0.2s; }
            .ui-sortable-helper { box-shadow: 0 12px 28px -4px rgba(15,23,42,0.18) !important; opacity: 0.95; }

            .btn-save { background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%); color: #fff; font-weight: 700; padding: 12px 24px; border-radius: 10px; border: none; cursor: pointer; transition: all 0.2s; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; box-shadow: 0 4px 14px rgba(2,132,199,0.28); }
            .btn-save:hover { transform: translateY(-1px); box-shadow: 0 6px 18px rgba(2,132,199,0.36); color: #fff; }

            /* Stat Cards Grid */
            .hub-stats-bar { display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px; margin-bottom: 26px; }
            @media (max-width: 960px) { .hub-stats-bar { grid-template-columns: repeat(2, 1fr); } }
            .hub-stat-widget { background: #ffffff; border: 1px solid #e2e8f0; border-radius: 14px; padding: 20px 22px; box-shadow: 0 2px 10px rgba(15,23,42,0.02); display: flex; align-items: center; gap: 16px; }
            .hsw-icon { width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px; flex-shrink: 0; }
            .hsw-info h4 { margin: 0; font-size: 24px; font-weight: 800; color: #0f172a; line-height: 1.1; }
            .hsw-info span { font-size: 12px; font-weight: 600; color: #64748b; }

            /* Filter & Search Bar */
            .hub-filter-bar { background: #ffffff; border: 1px solid #e2e8f0; border-radius: 14px; padding: 12px 18px; display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 12px; }
            .hub-filter-pills { display: flex; gap: 6px; flex-wrap: wrap; }
            .hub-pill { font-size: 12px; font-weight: 700; padding: 6px 14px; border-radius: 8px; text-decoration: none; color: #64748b; background: #f1f5f9; transition: all 0.2s; }
            .hub-pill:hover { background: #e2e8f0; color: #0f172a; }
            .hub-pill.active { background: #0284c7; color: #ffffff; box-shadow: 0 2px 8px rgba(2,132,199,0.3); }

            /* Enhanced Queue Table */
            .hub-table-wrapper { background: #ffffff; border: 1px solid #e2e8f0; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 20px rgba(15,23,42,0.03); }
            .hub-table { width: 100%; border-collapse: separate; border-spacing: 0; }
            .hub-table thead { background: #f8fafc; border-bottom: 1px solid #e2e8f0; }
            .hub-table th { padding: 14px 20px; font-size: 11.5px; font-weight: 800; letter-spacing: 0.06em; text-transform: uppercase; color: #475569; text-align: left; }
            .hub-table td { padding: 16px 20px; border-bottom: 1px solid #f1f5f9; font-size: 13.5px; color: #334155; vertical-align: middle; }
            .hub-table tbody tr { transition: background 0.15s; }
            .hub-table tbody tr:hover { background: #f8fafc; }
            .hub-table tbody tr:last-child td { border-bottom: none; }

            .client-cell { display: flex; align-items: center; gap: 12px; }
            .client-avatar { width: 38px; height: 38px; border-radius: 50%; background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 100%); color: #0284c7; font-weight: 800; font-size: 14px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
            .client-name { font-weight: 700; color: #0f172a; text-decoration: none; display: block; font-size: 14px; }
            .client-name:hover { color: #0284c7; }
            .client-time { font-size: 11.5px; color: #94a3b8; font-weight: 500; }

            .badge-status { display: inline-flex; align-items: center; gap: 5px; font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 20px; letter-spacing: 0.02em; }
            .badge-status.new { background: #fef3c7; color: #b45309; }
            .badge-status.contacted { background: #e0e7ff; color: #4338ca; }
            .badge-status.quoted { background: #e0f2fe; color: #0369a1; }
            .badge-status.booked { background: #dcfce7; color: #15803d; }
            .badge-status.archived { background: #f1f5f9; color: #64748b; }

            .badge-service { font-size: 12px; font-weight: 700; color: #0f172a; background: #f1f5f9; padding: 4px 10px; border-radius: 7px; display: inline-block; }
            .badge-specs { font-size: 12px; font-weight: 600; color: #64748b; background: #fafafa; border: 1px solid #e2e8f0; padding: 3px 8px; border-radius: 6px; }

            .action-group { display: flex; gap: 6px; align-items: center; }
            .action-btn { padding: 7px 13px; border-radius: 8px; font-size: 12px; font-weight: 700; text-decoration: none; transition: all 0.2s; display: inline-flex; align-items: center; gap: 5px; border: none; cursor: pointer; }
            .action-btn.view { background: #0284c7; color: #fff; }
            .action-btn.view:hover { background: #0369a1; color: #fff; }
            .action-btn.delete { background: rgba(239,68,68,0.1); color: #ef4444; }
            .action-btn.delete:hover { background: #ef4444; color: #fff; }
        ";
        wp_add_inline_style( 'wp-admin', $custom_admin_css );
    }
}
add_action( 'admin_enqueue_scripts', 'expertcare_admin_setup_assets' );

/* ==========================================================================
   Security & Header Cleanup
   ========================================================================== */

remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );

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

function expertcare_get_whatsapp_url( $message = '' ) {
    $wa = get_option( 'expertcare_whatsapp', '' );
    if ( empty( $wa ) ) {
        return '#';
    }
    return 'https://api.whatsapp.com/send?phone=' . preg_replace( '/[^0-9]/', '', $wa ) . ( ! empty( $message ) ? '&text=' . rawurlencode( $message ) : '' );
}

function expertcare_get_phone_url() {
    $ph = get_option( 'expertcare_phone', '' );
    if ( empty( $ph ) ) {
        return '#';
    }
    return 'tel:' . preg_replace( '/[^0-9+]/', '', $ph );
}

/* ==========================================================================
   Client Reviews & Estimate Requests Custom Post Types
   ========================================================================== */

function expertcare_register_custom_post_types() {
    // Reviews CPT
    register_post_type( 'expertcare_review', [
        'labels' => [
            'name'          => _x( 'Reviews', 'post type general name', 'expertcare' ),
            'singular_name' => _x( 'Review', 'post type singular name', 'expertcare' ),
            'menu_name'     => _x( 'Reviews', 'admin menu', 'expertcare' ),
            'add_new'       => _x( 'Add Review', 'review', 'expertcare' ),
            'add_new_item'  => __( 'Add New Review', 'expertcare' ),
            'edit_item'     => __( 'Edit Review', 'expertcare' ),
            'all_items'     => __( 'All Reviews', 'expertcare' ),
        ],
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => false,
        'capability_type'    => 'post',
        'supports'           => [ 'title', 'thumbnail' ],
        'show_in_rest'       => false,
    ] );

    // Estimate Requests CPT
    register_post_type( 'expertcare_quote', [
        'labels' => [
            'name'          => __( 'Estimate Requests', 'expertcare' ),
            'singular_name' => __( 'Estimate Request', 'expertcare' ),
        ],
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => false,
        'capability_type'    => 'post',
        'supports'           => [ 'title' ],
        'show_in_rest'       => false,
    ] );
}
add_action( 'init', 'expertcare_register_custom_post_types' );

/* ==========================================================================
   Services Master Configuration Array
   ========================================================================== */

function expertcare_get_services_config() {
    return [
        'regular-cleaning' => [
            'title' => 'Regular Cleaning',
            'code'  => '01',
        ],
        'airbnb-turnover' => [
            'title' => 'Airbnb Turnover Cleaning',
            'code'  => '02',
        ],
        'deep-cleaning' => [
            'title' => 'Deep Cleaning',
            'code'  => '03',
        ],
        'commercial-cleaning' => [
            'title' => 'Commercial Cleaning',
            'code'  => '04',
        ],
        'end-of-tenancy' => [
            'title' => 'End of Tenancy',
            'code'  => '05',
        ],
        'oven-cleaning' => [
            'title' => 'Oven Cleaning',
            'code'  => '06',
        ],
        'upholstery-sofa' => [
            'title' => 'Upholstery & Sofa',
            'code'  => '07',
        ],
        'inside-windows' => [
            'title' => 'Inside Windows',
            'code'  => '08',
        ],
    ];
}

/* ==========================================================================
   Register Settings Dynamically
   ========================================================================== */

function expertcare_register_all_settings() {
    register_setting( 'expertcare_global_settings', 'expertcare_phone' );
    register_setting( 'expertcare_global_settings', 'expertcare_whatsapp' );
    register_setting( 'expertcare_global_settings', 'expertcare_facebook_url' );

    register_setting( 'expertcare_home_settings_group', 'expertcare_home_data' );

    $services = expertcare_get_services_config();
    foreach ( $services as $key => $svc ) {
        register_setting( 'expertcare_svc_group_' . $key, 'expertcare_svc_' . $key . '_data' );
    }
}
add_action( 'admin_init', 'expertcare_register_all_settings' );

/* ==========================================================================
   Admin Hub Menus
   ========================================================================== */

function expertcare_admin_hub_menus() {
    add_menu_page(
        __( 'Expertcare Hub', 'expertcare' ),
        __( 'Expertcare Hub', 'expertcare' ),
        'manage_options',
        'expertcare-hub',
        'expertcare_render_hub_dashboard',
        'dashicons-shield-alt',
        3
    );

    add_submenu_page(
        'expertcare-hub',
        __( 'Dashboard', 'expertcare' ),
        __( 'Dashboard', 'expertcare' ),
        'manage_options',
        'expertcare-hub',
        'expertcare_render_hub_dashboard'
    );

    add_submenu_page(
        'expertcare-hub',
        __( 'Home Page', 'expertcare' ),
        __( 'Home Page', 'expertcare' ),
        'manage_options',
        'expertcare-home',
        'expertcare_render_home_settings_page'
    );

    add_submenu_page(
        'expertcare-hub',
        __( 'Estimate Requests', 'expertcare' ),
        __( 'Estimate Requests', 'expertcare' ),
        'manage_options',
        'expertcare-quotes',
        'expertcare_render_hub_quotes'
    );

    add_submenu_page(
        'expertcare-hub',
        __( 'Client Reviews', 'expertcare' ),
        __( 'Client Reviews', 'expertcare' ),
        'manage_options',
        'expertcare-reviews',
        'expertcare_render_hub_reviews'
    );

    $services = expertcare_get_services_config();
    foreach ( $services as $key => $svc ) {
        add_submenu_page(
            'expertcare-hub',
            $svc['title'],
            $svc['title'],
            'manage_options',
            'expertcare-svc-' . $key,
            function() use ( $key, $svc ) {
                expertcare_render_service_tab_page( $key, $svc );
            }
        );
    }
}
add_action( 'admin_menu', 'expertcare_admin_hub_menus' );

/* ==========================================================================
   Vertical Left Rail App Navigation
   ========================================================================== */

function expertcare_render_left_nav( $active_key = 'dashboard' ) {
    $services      = expertcare_get_services_config();
    $count_pending = wp_count_posts( 'expertcare_review' )->pending ?? 0;
    
    $new_quotes_query = new WP_Query([
        'post_type'  => 'expertcare_quote',
        'meta_key'   => '_quote_status',
        'meta_value' => 'New',
        'fields'     => 'ids',
        'posts_per_page' => -1,
    ]);
    $count_new_quotes = $new_quotes_query->found_posts;
    
    $current_user  = wp_get_current_user();
    $logout_url    = wp_logout_url( home_url() );
    ?>
    <aside class="hub-left-rail">
        <div class="hub-brand">
            <svg viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>
            <div>
                <strong style="font-size:15.5px;color:#fff;display:block;line-height:1.2;font-weight:800;">Expertcare</strong>
                <span style="font-size:11px;color:#64748b;font-weight:600;letter-spacing:0.04em;">ADMIN HQ</span>
            </div>
        </div>

        <div class="hub-section-label">Management</div>
        <a href="<?php echo admin_url( 'admin.php?page=expertcare-hub' ); ?>" class="hub-nav-link <?php echo ( $active_key === 'dashboard' ) ? 'active' : ''; ?>">
            <span><span class="dashicons dashicons-dashboard" style="margin-right:8px;font-size:16px;"></span> Dashboard</span>
            <span class="badge">HQ</span>
        </a>
        <a href="<?php echo admin_url( 'admin.php?page=expertcare-home' ); ?>" class="hub-nav-link <?php echo ( $active_key === 'home' ) ? 'active' : ''; ?>">
            <span><span class="dashicons dashicons-admin-home" style="margin-right:8px;font-size:16px;"></span> Home Page</span>
            <span class="badge" style="background:rgba(255,255,255,0.12);">00</span>
        </a>
        <a href="<?php echo admin_url( 'admin.php?page=expertcare-quotes' ); ?>" class="hub-nav-link <?php echo ( $active_key === 'quotes' ) ? 'active' : ''; ?>">
            <span><span class="dashicons dashicons-email-alt" style="margin-right:8px;font-size:16px;"></span> Estimates</span>
            <?php if ( $count_new_quotes > 0 ) : ?>
                <span style="background:#f59e0b;color:#fff;font-size:10.5px;font-weight:800;padding:2px 8px;border-radius:999px;"><?php echo $count_new_quotes; ?> New</span>
            <?php else : ?>
                <span class="badge">Inbox</span>
            <?php endif; ?>
        </a>
        <a href="<?php echo admin_url( 'admin.php?page=expertcare-reviews' ); ?>" class="hub-nav-link <?php echo ( $active_key === 'reviews' ) ? 'active' : ''; ?>">
            <span><span class="dashicons dashicons-star-filled" style="margin-right:8px;font-size:16px;"></span> Reviews</span>
            <?php if ( $count_pending > 0 ) : ?>
                <span style="background:#ef4444;color:#fff;font-size:10.5px;font-weight:800;padding:2px 7px;border-radius:999px;"><?php echo $count_pending; ?></span>
            <?php else : ?>
                <span class="badge">Feed</span>
            <?php endif; ?>
        </a>

        <div class="hub-section-label" style="margin-top:22px;">Cleaning Services</div>
        <div style="flex:1;">
            <?php foreach ( $services as $k => $s ) : ?>
                <a href="<?php echo admin_url( 'admin.php?page=expertcare-svc-' . $k ); ?>" class="hub-nav-link <?php echo ( $active_key === $k ) ? 'active' : ''; ?>">
                    <span><?php echo esc_html( $s['title'] ); ?></span>
                    <span class="badge"><?php echo esc_html( $s['code'] ); ?></span>
                </a>
            <?php endforeach; ?>
        </div>

        <div class="hub-user-panel">
            <div class="hub-user-meta">
                <?php echo get_avatar( $current_user->ID, 36 ); ?>
                <div>
                    <strong><?php echo esc_html( $current_user->display_name ); ?></strong>
                    <span>Administrator</span>
                </div>
            </div>
            <a href="<?php echo esc_url( $logout_url ); ?>" class="hub-logout-btn" title="Sign out">Log Out</a>
        </div>
    </aside>
    <?php
}

/* ==========================================================================
   Render Comprehensive Dynamic Home Page Settings Screen
   ========================================================================== */

function expertcare_render_home_settings_page() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    $opt_key = 'expertcare_home_data';
    $data    = get_option( $opt_key, [] );

    $hero_eyebrow  = $data['hero_eyebrow'] ?? '';
    $hero_h1_main  = $data['hero_h1_main'] ?? '';
    $hero_h1_shine = $data['hero_h1_shine'] ?? '';
    $hero_sub      = $data['hero_sub'] ?? '';
    $hero_img      = $data['hero_img'] ?? '';
    $hero_badge_t  = $data['hero_badge_t'] ?? '';
    $hero_badge_s  = $data['hero_badge_s'] ?? '';
    $stat_rating   = $data['stat_rating'] ?? '';
    $stat_reach    = $data['stat_reach'] ?? '';
    $stat_speed    = $data['stat_speed'] ?? '';

    $why_eyebrow = $data['why_eyebrow'] ?? '';
    $why_title_m = $data['why_title_m'] ?? '';
    $why_title_e = $data['why_title_e'] ?? '';
    $why_p1      = $data['why_p1'] ?? '';
    $why_p2      = $data['why_p2'] ?? '';

    $svc_eyebrow = $data['svc_eyebrow'] ?? '';
    $svc_title_m = $data['svc_title_m'] ?? '';
    $svc_title_e = $data['svc_title_e'] ?? '';
    $svc_lead    = $data['svc_lead'] ?? '';

    $areas_eyebrow = $data['areas_eyebrow'] ?? '';
    $areas_title_m = $data['areas_title_m'] ?? '';
    $areas_title_e = $data['areas_title_e'] ?? '';
    $areas_lead    = $data['areas_lead'] ?? '';
    $areas_list    = ! empty( $data['areas_list'] ) && is_array( $data['areas_list'] ) ? $data['areas_list'] : [];

    $about_eyebrow = $data['about_eyebrow'] ?? '';
    $about_title_m = $data['about_title_m'] ?? '';
    $about_title_e = $data['about_title_e'] ?? '';
    $about_c1_t1   = $data['about_c1_t1'] ?? '';
    $about_c1_p1   = $data['about_c1_p1'] ?? '';
    $about_c1_t2   = $data['about_c1_t2'] ?? '';
    $about_c1_p2   = $data['about_c1_p2'] ?? '';
    $about_c2_t1   = $data['about_c2_t1'] ?? '';
    $about_c2_p1   = $data['about_c2_p1'] ?? '';
    $about_c2_t2   = $data['about_c2_t2'] ?? '';
    $about_c2_p2   = $data['about_c2_p2'] ?? '';

    $faqs          = ! empty( $data['faqs'] ) && is_array( $data['faqs'] ) ? $data['faqs'] : [];
    $contact_email = $data['contact_email'] ?? '';
    ?>
    <div class="hub-app-shell">
        <?php expertcare_render_left_nav( 'home' ); ?>

        <main class="hub-main">
            <div class="hub-header">
                <div>
                    <span style="font-size:12px;font-weight:700;color:#0284c7;text-transform:uppercase;">Front Page Settings</span>
                    <h1>Home Page Content Configurator</h1>
                </div>
                <div>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank" class="button" style="border-radius:8px;padding:6px 14px;font-weight:600;">
                        View Live Home ↗
                    </a>
                </div>
            </div>

            <?php if ( isset( $_GET['settings-updated'] ) ) : ?>
                <div class="notice notice-success is-dismissible" style="border-radius:10px;margin-bottom:24px;">
                    <p><strong>Saved:</strong> All sections across the Home Page have been updated live.</p>
                </div>
            <?php endif; ?>

            <form method="post" action="options.php">
                <?php settings_fields( 'expertcare_home_settings_group' ); ?>

                <div class="hub-grid">
                    <div>
                        <div class="hub-card">
                            <h3><span class="dashicons dashicons-cover-image" style="color:#0284c7;"></span> 1. Hero Section</h3>
                            <div class="hub-field"><label>Eyebrow Tagline</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[hero_eyebrow]" value="<?php echo esc_attr( $hero_eyebrow ); ?>" /></div>
                            <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">
                                <div class="hub-field"><label>H1 Normal Title</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[hero_h1_main]" value="<?php echo esc_attr( $hero_h1_main ); ?>" /></div>
                                <div class="hub-field"><label>H1 Highlight (Shine)</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[hero_h1_shine]" value="<?php echo esc_attr( $hero_h1_shine ); ?>" /></div>
                            </div>
                            <div class="hub-field"><label>Hero Subtitle</label><textarea name="<?php echo esc_attr( $opt_key ); ?>[hero_sub]" rows="2"><?php echo esc_textarea( $hero_sub ); ?></textarea></div>
                            <div style="display:grid;grid-template-columns:repeat(3, 1fr);gap:12px;">
                                <div class="hub-field"><label>Stat 1 Subtitle</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[stat_rating]" value="<?php echo esc_attr( $stat_rating ); ?>" /></div>
                                <div class="hub-field"><label>Stat 2 (City / Subtitle)</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[stat_reach]" value="<?php echo esc_attr( $stat_reach ); ?>" /></div>
                                <div class="hub-field"><label>Stat 3 (Response Subtitle)</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[stat_speed]" value="<?php echo esc_attr( $stat_speed ); ?>" /></div>
                            </div>
                        </div>

                        <div class="hub-card">
                            <h3><span class="dashicons dashicons-thumbs-up" style="color:#10b981;"></span> 2. Why Choose Us Banner</h3>
                            <div class="hub-field"><label>Eyebrow</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[why_eyebrow]" value="<?php echo esc_attr( $why_eyebrow ); ?>" /></div>
                            <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">
                                <div class="hub-field"><label>Heading Main</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[why_title_m]" value="<?php echo esc_attr( $why_title_m ); ?>" /></div>
                                <div class="hub-field"><label>Heading Italic</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[why_title_e]" value="<?php echo esc_attr( $why_title_e ); ?>" /></div>
                            </div>
                            <div class="hub-field"><label>Paragraph 1</label><textarea name="<?php echo esc_attr( $opt_key ); ?>[why_p1]" rows="2"><?php echo esc_textarea( $why_p1 ); ?></textarea></div>
                            <div class="hub-field" style="margin-bottom:0;"><label>Paragraph 2</label><textarea name="<?php echo esc_attr( $opt_key ); ?>[why_p2]" rows="2"><?php echo esc_textarea( $why_p2 ); ?></textarea></div>
                        </div>

                        <div class="hub-card">
                            <h3><span class="dashicons dashicons-clipboard" style="color:#8b5cf6;"></span> 3. Services Section Header</h3>
                            <div class="hub-field"><label>Eyebrow</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[svc_eyebrow]" value="<?php echo esc_attr( $svc_eyebrow ); ?>" /></div>
                            <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">
                                <div class="hub-field"><label>Title Main</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[svc_title_m]" value="<?php echo esc_attr( $svc_title_m ); ?>" /></div>
                                <div class="hub-field"><label>Title Accent (Italic)</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[svc_title_e]" value="<?php echo esc_attr( $svc_title_e ); ?>" /></div>
                            </div>
                            <div class="hub-field" style="margin-bottom:0;"><label>Lead Paragraph</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[svc_lead]" value="<?php echo esc_attr( $svc_lead ); ?>" /></div>
                        </div>

                        <div class="hub-card">
                            <h3><span class="dashicons dashicons-location" style="color:#f59e0b;"></span> 4. London Coverage Areas <small style="font-weight:normal;color:#64748b;font-size:12px;">(Drag handle ⋮⋮)</small></h3>
                            <div class="hub-field"><label>Eyebrow</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[areas_eyebrow]" value="<?php echo esc_attr( $areas_eyebrow ); ?>" /></div>
                            <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-bottom:12px;">
                                <div class="hub-field"><label>Title Main</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[areas_title_m]" value="<?php echo esc_attr( $areas_title_m ); ?>" /></div>
                                <div class="hub-field"><label>Title Accent</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[areas_title_e]" value="<?php echo esc_attr( $areas_title_e ); ?>" /></div>
                            </div>
                            <div class="hub-field"><label>Lead</label><textarea name="<?php echo esc_attr( $opt_key ); ?>[areas_lead]" rows="2"><?php echo esc_textarea( $areas_lead ); ?></textarea></div>

                            <label style="font-size:12.5px;font-weight:700;display:block;margin-bottom:8px;">Boroughs / Zones List:</label>
                            <div id="areas-sortable" style="display:flex;flex-direction:column;gap:8px;">
                                <?php if ( ! empty( $areas_list ) ) : ?>
                                    <?php foreach ( $areas_list as $a_idx => $area ) : ?>
                                        <div class="area-row" style="display:flex;gap:8px;align-items:center;background:#f8fafc;border:1px solid #e2e8f0;padding:6px 10px;border-radius:8px;">
                                            <span class="sort-handle">⋮⋮</span>
                                            <input type="text" name="<?php echo esc_attr( $opt_key ); ?>[areas_list][<?php echo $a_idx; ?>][title]" value="<?php echo esc_attr( $area['title'] ?? '' ); ?>" style="flex:1;" placeholder="Area Title" />
                                            <input type="text" name="<?php echo esc_attr( $opt_key ); ?>[areas_list][<?php echo $a_idx; ?>][postcodes]" value="<?php echo esc_attr( $area['postcodes'] ?? '' ); ?>" style="flex:1;" placeholder="Postcodes" />
                                            <button type="button" class="button remove-area-row" style="color:#ef4444;border-color:#fecaca;">✕</button>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <button type="button" id="add-area-row" class="button button-secondary" style="margin-top:10px;">+ Add Area Block</button>
                        </div>

                        <div class="hub-card">
                            <h3><span class="dashicons dashicons-id-alt" style="color:#0284c7;"></span> 5. About Us Detailed Narrative</h3>
                            <div class="hub-field"><label>Eyebrow</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[about_eyebrow]" value="<?php echo esc_attr( $about_eyebrow ); ?>" /></div>
                            <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-bottom:12px;">
                                <div class="hub-field"><label>Title Main</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[about_title_m]" value="<?php echo esc_attr( $about_title_m ); ?>" /></div>
                                <div class="hub-field"><label>Title Accent</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[about_title_e]" value="<?php echo esc_attr( $about_title_e ); ?>" /></div>
                            </div>
                            
                            <h4 style="margin:16px 0 8px;border-top:1px solid #f1f5f9;padding-top:12px;">Column 1 Content</h4>
                            <div class="hub-field"><label>Block 1 Title & Description</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[about_c1_t1]" value="<?php echo esc_attr( $about_c1_t1 ); ?>" style="margin-bottom:6px;" /><textarea name="<?php echo esc_attr( $opt_key ); ?>[about_c1_p1]" rows="2"><?php echo esc_textarea( $about_c1_p1 ); ?></textarea></div>
                            <div class="hub-field"><label>Block 2 Title & Description</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[about_c1_t2]" value="<?php echo esc_attr( $about_c1_t2 ); ?>" style="margin-bottom:6px;" /><textarea name="<?php echo esc_attr( $opt_key ); ?>[about_c1_p2]" rows="2"><?php echo esc_textarea( $about_c1_p2 ); ?></textarea></div>

                            <h4 style="margin:16px 0 8px;border-top:1px solid #f1f5f9;padding-top:12px;">Column 2 Content</h4>
                            <div class="hub-field"><label>Block 3 Title & Description</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[about_c2_t1]" value="<?php echo esc_attr( $about_c2_t1 ); ?>" style="margin-bottom:6px;" /><textarea name="<?php echo esc_attr( $opt_key ); ?>[about_c2_p1]" rows="2"><?php echo esc_textarea( $about_c2_p1 ); ?></textarea></div>
                            <div class="hub-field" style="margin-bottom:0;"><label>Block 4 Title & Description</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[about_c2_t2]" value="<?php echo esc_attr( $about_c2_t2 ); ?>" style="margin-bottom:6px;" /><textarea name="<?php echo esc_attr( $opt_key ); ?>[about_c2_p2]" rows="2"><?php echo esc_textarea( $about_c2_p2 ); ?></textarea></div>
                        </div>

                        <div class="hub-card">
                            <h3><span class="dashicons dashicons-editor-help" style="color:#0284c7;"></span> 6. Frequently Asked Questions <small style="font-weight:normal;color:#64748b;font-size:12px;">(Drag handle ⋮⋮)</small></h3>
                            <div id="home-faq-sortable" style="display:flex;flex-direction:column;gap:12px;">
                                <?php if ( ! empty( $faqs ) ) : ?>
                                    <?php foreach ( $faqs as $f_idx => $faq ) : ?>
                                        <div class="faq-row" style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:16px;position:relative;">
                                            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;">
                                                <span class="sort-handle" title="Drag to reorder">⋮⋮ Reorder FAQ</span>
                                                <button type="button" class="button remove-faq-row" style="color:#ef4444;border-color:#fecaca;border-radius:6px;">✕ Remove</button>
                                            </div>
                                            <div class="hub-field" style="margin-bottom:8px;"><label>Question:</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[faqs][<?php echo $f_idx; ?>][q]" value="<?php echo esc_attr( $faq['q'] ?? '' ); ?>" style="font-weight:600;" /></div>
                                            <div class="hub-field" style="margin-bottom:0;"><label>Answer:</label><textarea name="<?php echo esc_attr( $opt_key ); ?>[faqs][<?php echo $f_idx; ?>][a]" rows="2"><?php echo esc_textarea( $faq['a'] ?? '' ); ?></textarea></div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <button type="button" id="add-home-faq-row" class="button button-secondary" style="margin-top:14px;border-radius:8px;">+ Add Question &amp; Answer</button>
                        </div>
                    </div>

                    <div>
                        <div class="hub-card" style="border-top:4px solid #0284c7;position:sticky;top:30px;z-index:10;">
                            <h3 style="border:none;margin-bottom:6px;padding:0;">Publish Control</h3>
                            <p style="color:#64748b;font-size:13px;margin:0 0 16px;">Saves all home page sections and repeaters live immediately.</p>
                            <button type="submit" class="btn-save" style="width:100%;height:44px;font-size:14px;">Save Home Page</button>
                        </div>

                        <div class="hub-card">
                            <h3><span class="dashicons dashicons-format-image" style="color:#0284c7;"></span> Hero Showcase Photo</h3>
                            <?php $resolved_hero = ( filter_var( $hero_img, FILTER_VALIDATE_URL ) ) ? $hero_img : ( ! empty( $hero_img ) ? get_template_directory_uri() . '/assets/img/' . ltrim( $hero_img, '/' ) : '' ); ?>
                            <div class="image-box" style="display:flex;flex-direction:column;align-items:center;">
                                <div class="img-preview" style="width:100%;aspect-ratio:4/3;background:#e2e8f0;border-radius:10px;overflow:hidden;margin-bottom:10px;display:flex;align-items:center;justify-content:center;">
                                    <?php if ( $resolved_hero ) : ?>
                                        <img src="<?php echo esc_url( $resolved_hero ); ?>" style="width:100%;height:100%;object-fit:cover;" />
                                    <?php else : ?>
                                        <span style="color:#94a3b8;font-size:12px;">No Photo Selected</span>
                                    <?php endif; ?>
                                </div>
                                <input type="hidden" name="<?php echo esc_attr( $opt_key ); ?>[hero_img]" value="<?php echo esc_attr( $hero_img ); ?>" class="img-url-input" />
                                <div style="display:flex;gap:6px;width:100%;">
                                    <button type="button" class="button button-small upload-media-btn" style="flex:1;">Choose Hero Image</button>
                                    <button type="button" class="button button-small remove-image-row" style="color:#ef4444;">✕</button>
                                </div>
                            </div>

                            <h4 style="margin:20px 0 8px;border-top:1px solid #f1f5f9;padding-top:12px;">Hero Floating Badge</h4>
                            <div class="hub-field"><label>Badge Title</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[hero_badge_t]" value="<?php echo esc_attr( $hero_badge_t ); ?>" /></div>
                            <div class="hub-field" style="margin-bottom:0;"><label>Badge Subtitle</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[hero_badge_s]" value="<?php echo esc_attr( $hero_badge_s ); ?>" /></div>
                        </div>

                        <div class="hub-card">
                            <h3><span class="dashicons dashicons-email" style="color:#0284c7;"></span> Contact Email</h3>
                            <div class="hub-field" style="margin-bottom:0;"><label>Dispatch / Operational Email</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[contact_email]" value="<?php echo esc_attr( $contact_email ); ?>" /></div>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </div>

    <script>
    jQuery(document).ready(function($) {
        var optKey = '<?php echo esc_js( $opt_key ); ?>';

        $('#areas-sortable, #home-faq-sortable').sortable({ handle: '.sort-handle', placeholder: 'sortable-placeholder', axis: 'y' });

        $('#add-area-row').on('click', function(e) {
            e.preventDefault();
            var idx = $('#areas-sortable .area-row').length;
            var row = $('<div class="area-row" style="display:flex;gap:8px;align-items:center;background:#f8fafc;border:1px solid #e2e8f0;padding:6px 10px;border-radius:8px;">' +
                '<span class="sort-handle">⋮⋮</span>' +
                '<input type="text" name="' + optKey + '[areas_list][' + idx + '][title]" value="" style="flex:1;" placeholder="Area Title" />' +
                '<input type="text" name="' + optKey + '[areas_list][' + idx + '][postcodes]" value="" style="flex:1;" placeholder="Postcodes" />' +
                '<button type="button" class="button remove-area-row" style="color:#ef4444;border-color:#fecaca;">✕</button>' +
            '</div>');
            $('#areas-sortable').append(row);
        });

        $(document).on('click', '.remove-area-row', function(e) {
            e.preventDefault();
            $(this).closest('.area-row').remove();
        });

        $('#add-home-faq-row').on('click', function(e) {
            e.preventDefault();
            var index = $('#home-faq-sortable .faq-row').length;
            var faqRow = $('<div class="faq-row" style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:16px;position:relative;">' +
                '<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;">' +
                    '<span class="sort-handle" title="Drag to reorder">⋮⋮ Reorder FAQ</span>' +
                    '<button type="button" class="button remove-faq-row" style="color:#ef4444;border-color:#fecaca;border-radius:6px;">✕ Remove</button>' +
                '</div>' +
                '<div class="hub-field" style="margin-bottom:8px;"><label>Question:</label><input type="text" name="' + optKey + '[faqs][' + index + '][q]" value="" style="font-weight:600;" /></div>' +
                '<div class="hub-field" style="margin-bottom:0;"><label>Answer:</label><textarea name="' + optKey + '[faqs][' + index + '][a]" rows="2"></textarea></div>' +
            '</div>');
            $('#home-faq-sortable').append(faqRow);
        });

        $(document).on('click', '.remove-faq-row', function(e) {
            e.preventDefault();
            $(this).closest('.faq-row').remove();
        });

        $(document).on('click', '.upload-media-btn', function(e) {
            e.preventDefault();
            var box = $(this).closest('.image-box');
            var input = box.find('.img-url-input');
            var preview = box.find('.img-preview');

            var mediaUploader = wp.media({
                title: 'Select or Upload Photo',
                button: { text: 'Use this Photo' },
                multiple: false
            }).on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                input.val(attachment.url);
                preview.html('<img src="' + attachment.url + '" style="width:100%;height:100%;object-fit:cover;" />');
            }).open();
        });

        $(document).on('click', '.remove-image-row', function(e) {
            e.preventDefault();
            var box = $(this).closest('.image-box');
            box.find('.img-url-input').val('');
            box.find('.img-preview').html('<span style="color:#94a3b8;font-size:12px;">No Photo Selected</span>');
        });
    });
    </script>
    <?php
}

/* ==========================================================================
   Render Dashboard & Global Settings
   ========================================================================== */

function expertcare_render_hub_dashboard() {
    $services = expertcare_get_services_config();
    ?>
    <div class="hub-app-shell">
        <?php expertcare_render_left_nav( 'dashboard' ); ?>

        <main class="hub-main">
            <div class="hub-header">
                <div>
                    <span style="font-size:12px;font-weight:700;color:#0284c7;text-transform:uppercase;">Overview &amp; Global Channels</span>
                    <h1>Platform Dashboard</h1>
                </div>
            </div>

            <div class="hub-grid">
                <div>
                    <div class="hub-card">
                        <h3><span class="dashicons dashicons-admin-settings" style="color:#0284c7;"></span> Global Contact &amp; Booking Channels</h3>
                        <form method="post" action="options.php">
                            <?php settings_fields( 'expertcare_global_settings' ); ?>
                            <div class="hub-field">
                                <label for="expertcare_phone">Direct Phone Display</label>
                                <input type="text" id="expertcare_phone" name="expertcare_phone" value="<?php echo esc_attr( get_option( 'expertcare_phone', '' ) ); ?>" placeholder="e.g. 07919 033684" />
                            </div>
                            <div class="hub-field">
                                <label for="expertcare_whatsapp">WhatsApp Target Number</label>
                                <input type="text" id="expertcare_whatsapp" name="expertcare_whatsapp" value="<?php echo esc_attr( get_option( 'expertcare_whatsapp', '' ) ); ?>" placeholder="e.g. 447919033684" />
                            </div>
                            <div class="hub-field">
                                <label for="expertcare_facebook_url">Official Facebook Review Page URL</label>
                                <input type="url" id="expertcare_facebook_url" name="expertcare_facebook_url" value="<?php echo esc_attr( get_option( 'expertcare_facebook_url', '' ) ); ?>" placeholder="https://facebook.com/..." />
                            </div>
                            <button type="submit" class="btn-save" style="padding:10px 22px;">Save Global Channels</button>
                        </form>
                    </div>
                </div>

                <div>
                    <div class="hub-card">
                        <h3><span class="dashicons dashicons-clipboard" style="color:#0284c7;"></span> Service Page Controls</h3>
                        <div style="display:flex;flex-direction:column;gap:10px;">
                            <?php foreach ( $services as $k => $s ) : ?>
                                <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;padding:12px 16px;display:flex;justify-content:space-between;align-items:center;">
                                    <div>
                                        <span style="font-size:11px;font-weight:700;color:#0284c7;">#<?php echo esc_html( $s['code'] ); ?></span>
                                        <h4 style="margin:2px 0 0;font-size:14px;color:#0f172a;"><?php echo esc_html( $s['title'] ); ?></h4>
                                    </div>
                                    <a href="<?php echo admin_url( 'admin.php?page=expertcare-svc-' . $k ); ?>" class="button button-small" style="border-radius:6px;font-weight:600;">Edit Settings →</a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <?php
}

/* ==========================================================================
   Render Estimates Requests Hub (Queue & Single Inspector)
   ========================================================================== */

function expertcare_render_hub_quotes() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    if ( isset( $_GET['toggle_status'], $_GET['quote_id'] ) ) {
        check_admin_referer( 'toggle_quote_' . intval( $_GET['quote_id'] ) );
        $new_status = sanitize_text_field( $_GET['toggle_status'] );
        update_post_meta( intval( $_GET['quote_id'] ), '_quote_status', $new_status );
        wp_safe_redirect( admin_url( 'admin.php?page=expertcare-quotes&quote_id=' . intval( $_GET['quote_id'] ) ) );
        exit;
    }

    if ( isset( $_GET['delete_quote'] ) ) {
        $del_id = intval( $_GET['delete_quote'] );
        check_admin_referer( 'delete_quote_' . $del_id );
        wp_delete_post( $del_id, true );
        wp_safe_redirect( admin_url( 'admin.php?page=expertcare-quotes' ) );
        exit;
    }

    $active_quote_id = isset( $_GET['quote_id'] ) ? intval( $_GET['quote_id'] ) : 0;
    $status_filter   = isset( $_GET['status'] ) ? sanitize_text_field( $_GET['status'] ) : 'all';
    $search_term     = isset( $_GET['s'] ) ? sanitize_text_field( $_GET['s'] ) : '';
    ?>
    <div class="hub-app-shell">
        <?php expertcare_render_left_nav( 'quotes' ); ?>

        <main class="hub-main">
            <?php if ( $active_quote_id ) : 
                $post = get_post( $active_quote_id );
                if ( ! $post || 'expertcare_quote' !== $post->post_type ) {
                    echo '<div class="notice notice-error"><p>Lead not found.</p></div>';
                    return;
                }

                $name        = get_post_meta( $post->ID, '_quote_name', true );
                $postcode    = get_post_meta( $post->ID, '_quote_postcode', true );
                $phone       = get_post_meta( $post->ID, '_quote_phone', true );
                $service     = get_post_meta( $post->ID, '_quote_service', true );
                $reason      = get_post_meta( $post->ID, '_quote_reason', true );
                $bedrooms    = get_post_meta( $post->ID, '_quote_bedrooms', true );
                $bathrooms   = get_post_meta( $post->ID, '_quote_bathrooms', true );
                $kitchens    = get_post_meta( $post->ID, '_quote_kitchens', true );
                $living      = get_post_meta( $post->ID, '_quote_living_rooms', true );
                $other_rooms = get_post_meta( $post->ID, '_quote_other_rooms', true );
                $floors      = get_post_meta( $post->ID, '_quote_floors', true );
                $parking     = get_post_meta( $post->ID, '_quote_parking', true );
                $notes       = get_post_meta( $post->ID, '_quote_notes', true );
                $photos      = get_post_meta( $post->ID, '_quote_photos', true ) ?: [];
                $status      = get_post_meta( $post->ID, '_quote_status', true ) ?: 'New';

                $wa_url = 'https://api.whatsapp.com/send?phone=' . preg_replace( '/[^0-9]/', '', $phone ) . '&text=' . rawurlencode( "Hi {$name}, this is Expertcare Cleaning reaching out regarding your quote request for {$service}." );
            ?>
                <div class="hub-header">
                    <div>
                        <a href="<?php echo admin_url( 'admin.php?page=expertcare-quotes' ); ?>" style="text-decoration:none;color:#0284c7;font-weight:700;font-size:13px;display:inline-flex;align-items:center;gap:4px;margin-bottom:6px;">
                            ← Back to Leads Inbox
                        </a>
                        <h1><?php echo esc_html( $name ); ?> <span style="font-weight:400;color:#64748b;">· <?php echo esc_html( $postcode ); ?></span></h1>
                        <span style="font-size:12.5px;color:#64748b;font-weight:500;">Submitted <?php echo human_time_diff( get_the_time( 'U', $post->ID ), current_time( 'timestamp' ) ); ?> ago on <?php echo get_the_date( 'l, j M Y @ H:i', $post->ID ); ?></span>
                    </div>
                    <div style="display:flex;gap:10px;">
                        <a href="tel:<?php echo esc_attr( $phone ); ?>" class="btn-save" style="background:#0f172a;box-shadow:none;">
                            📞 Direct Call
                        </a>
                        <a href="<?php echo esc_url( $wa_url ); ?>" target="_blank" class="btn-save" style="background:linear-gradient(135deg, #22c55e 0%, #16a34a 100%);box-shadow:0 4px 14px rgba(34,197,94,0.3);">
                            💬 Message on WhatsApp
                        </a>
                    </div>
                </div>

                <div class="hub-grid">
                    <div>
                        <div class="hub-card">
                            <h3><span class="dashicons dashicons-businessman" style="color:#0284c7;"></span> Client Contact Details</h3>
                            <div style="display:grid;grid-template-columns:repeat(2, 1fr);gap:18px;">
                                <div style="background:#f8fafc;padding:14px 18px;border-radius:12px;border:1px solid #f1f5f9;">
                                    <span style="font-size:11px;font-weight:700;color:#64748b;text-transform:uppercase;">Customer Name</span>
                                    <div style="font-size:16px;font-weight:800;color:#0f172a;margin-top:2px;"><?php echo esc_html( $name ); ?></div>
                                </div>
                                <div style="background:#f8fafc;padding:14px 18px;border-radius:12px;border:1px solid #f1f5f9;">
                                    <span style="font-size:11px;font-weight:700;color:#64748b;text-transform:uppercase;">Phone Number</span>
                                    <div style="font-size:16px;font-weight:800;color:#0284c7;margin-top:2px;">
                                        <a href="tel:<?php echo esc_attr( $phone ); ?>" style="text-decoration:none;color:inherit;"><?php echo esc_html( $phone ); ?></a>
                                    </div>
                                </div>
                                <div style="background:#f8fafc;padding:14px 18px;border-radius:12px;border:1px solid #f1f5f9;">
                                    <span style="font-size:11px;font-weight:700;color:#64748b;text-transform:uppercase;">Target Postcode</span>
                                    <div style="font-size:16px;font-weight:800;color:#0f172a;margin-top:2px;"><?php echo esc_html( $postcode ); ?></div>
                                </div>
                                <div style="background:#f8fafc;padding:14px 18px;border-radius:12px;border:1px solid #f1f5f9;">
                                    <span style="font-size:11px;font-weight:700;color:#64748b;text-transform:uppercase;">Service Requested</span>
                                    <div style="font-size:16px;font-weight:800;color:#0f172a;margin-top:2px;"><?php echo esc_html( $service ); ?></div>
                                </div>
                            </div>
                        </div>

                        <div class="hub-card">
                            <h3><span class="dashicons dashicons-admin-home" style="color:#10b981;"></span> Property Footprint Specification</h3>
                            <div style="display:grid;grid-template-columns:repeat(3, 1fr);gap:14px;">
                                <div style="border:1px solid #e2e8f0;padding:12px 16px;border-radius:10px;">
                                    <span style="font-size:11.5px;color:#64748b;font-weight:600;">🛏 Bedrooms</span>
                                    <div style="font-size:16px;font-weight:800;color:#0f172a;margin-top:4px;"><?php echo esc_html( $bedrooms ?: '—' ); ?></div>
                                </div>
                                <div style="border:1px solid #e2e8f0;padding:12px 16px;border-radius:10px;">
                                    <span style="font-size:11.5px;color:#64748b;font-weight:600;">🚿 Bathrooms</span>
                                    <div style="font-size:16px;font-weight:800;color:#0f172a;margin-top:4px;"><?php echo esc_html( $bathrooms ?: '—' ); ?></div>
                                </div>
                                <div style="border:1px solid #e2e8f0;padding:12px 16px;border-radius:10px;">
                                    <span style="font-size:11.5px;color:#64748b;font-weight:600;">🍳 Kitchens</span>
                                    <div style="font-size:16px;font-weight:800;color:#0f172a;margin-top:4px;"><?php echo esc_html( $kitchens ?: '—' ); ?></div>
                                </div>
                                <div style="border:1px solid #e2e8f0;padding:12px 16px;border-radius:10px;">
                                    <span style="font-size:11.5px;color:#64748b;font-weight:600;">🛋 Living Rooms</span>
                                    <div style="font-size:16px;font-weight:800;color:#0f172a;margin-top:4px;"><?php echo esc_html( $living ?: '—' ); ?></div>
                                </div>
                                <div style="border:1px solid #e2e8f0;padding:12px 16px;border-radius:10px;">
                                    <span style="font-size:11.5px;color:#64748b;font-weight:600;">🚪 Other Rooms</span>
                                    <div style="font-size:16px;font-weight:800;color:#0f172a;margin-top:4px;"><?php echo esc_html( $other_rooms ?: '—' ); ?></div>
                                </div>
                                <div style="border:1px solid #e2e8f0;padding:12px 16px;border-radius:10px;">
                                    <span style="font-size:11.5px;color:#64748b;font-weight:600;">🏢 Floor Level</span>
                                    <div style="font-size:16px;font-weight:800;color:#0f172a;margin-top:4px;"><?php echo esc_html( $floors ?: '—' ); ?></div>
                                </div>
                            </div>
                            
                            <div style="margin-top:16px;background:#f8fafc;border-radius:10px;padding:14px 18px;border:1px solid #f1f5f9;display:flex;justify-content:space-between;flex-wrap:wrap;gap:12px;">
                                <div>
                                    <span style="font-size:11px;font-weight:700;color:#64748b;text-transform:uppercase;">Parking Access</span>
                                    <div style="font-size:13.5px;font-weight:700;color:#0f172a;margin-top:2px;">🚗 <?php echo esc_html( $parking ?: 'Not specified' ); ?></div>
                                </div>
                                <div>
                                    <span style="font-size:11px;font-weight:700;color:#64748b;text-transform:uppercase;">Cleaning Trigger / Reason</span>
                                    <div style="font-size:13.5px;font-weight:700;color:#0f172a;margin-top:2px;">📋 <?php echo esc_html( $reason ?: 'Standard clean' ); ?></div>
                                </div>
                            </div>
                        </div>

                        <div class="hub-card">
                            <h3><span class="dashicons dashicons-edit" style="color:#f59e0b;"></span> Additional Notes &amp; Logistics</h3>
                            <div style="background:#f8fafc;padding:18px;border-radius:12px;border:1px solid #e2e8f0;font-size:14px;line-height:1.7;color:#334155;">
                                <?php echo nl2br( esc_html( $notes ?: 'No additional notes provided by client.' ) ); ?>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="hub-card" style="border-top:4px solid #0284c7;">
                            <h3>Lead Pipeline State</h3>
                            <p style="margin:0 0 16px;font-size:13px;color:#64748b;">
                                Current stage: <strong style="color:#0f172a;text-transform:uppercase;"><?php echo esc_html( $status ); ?></strong>
                            </p>

                            <div style="display:flex;flex-direction:column;gap:8px;">
                                <?php foreach ( [ 'New', 'Contacted', 'Quoted', 'Booked', 'Archived' ] as $st ) : 
                                    $st_url = wp_nonce_url( admin_url( 'admin.php?page=expertcare-quotes&quote_id=' . $post->ID . '&toggle_status=' . $st ), 'toggle_quote_' . $post->ID );
                                    $is_active = ( $status === $st );
                                ?>
                                    <a href="<?php echo esc_url( $st_url ); ?>" style="display:flex;justify-content:space-between;align-items:center;padding:10px 14px;border-radius:8px;text-decoration:none;font-size:13px;font-weight:700;transition:all 0.15s;background:<?php echo $is_active ? '#0284c7' : '#f8fafc'; ?>;color:<?php echo $is_active ? '#ffffff' : '#334155'; ?>;border:1px solid <?php echo $is_active ? '#0284c7' : '#e2e8f0'; ?>;">
                                        <span><?php echo esc_html( $st ); ?></span>
                                        <?php if ( $is_active ) : ?>
                                            <span>✓ Current</span>
                                        <?php endif; ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>

                            <div style="margin-top:20px;border-top:1px solid #f1f5f9;padding-top:14px;">
                                <?php $del_lead_url = wp_nonce_url( admin_url( 'admin.php?page=expertcare-quotes&delete_quote=' . $post->ID ), 'delete_quote_' . $post->ID ); ?>
                                <a href="<?php echo esc_url( $del_lead_url ); ?>" onclick="return confirm('Permanently remove this lead from database?');" style="color:#ef4444;font-size:12px;font-weight:700;text-decoration:none;display:flex;align-items:center;gap:4px;">
                                    🗑 Delete Lead Request
                                </a>
                            </div>
                        </div>

                        <div class="hub-card">
                            <h3><span class="dashicons dashicons-format-gallery" style="color:#0284c7;"></span> Attached Property Photos (<?php echo count( $photos ); ?>)</h3>
                            <?php if ( ! empty( $photos ) ) : ?>
                                <div style="display:grid;grid-template-columns:repeat(2, 1fr);gap:12px;">
                                    <?php foreach ( $photos as $att_id ) : 
                                        $full_img = wp_get_attachment_image_url( $att_id, 'full' );
                                        $thumb    = wp_get_attachment_image_url( $att_id, 'medium' );
                                    ?>
                                        <a href="<?php echo esc_url( $full_img ); ?>" target="_blank" style="display:block;border-radius:10px;overflow:hidden;border:1px solid #e2e8f0;aspect-ratio:1/1;box-shadow:0 2px 8px rgba(0,0,0,0.04);">
                                            <img src="<?php echo esc_url( $thumb ); ?>" style="width:100%;height:100%;object-fit:cover;transition:transform 0.3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'" />
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php else : ?>
                                <p style="color:#94a3b8;font-size:13px;margin:0;font-style:italic;">No photos uploaded with this request.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            <?php else : 
                $stat_all       = wp_count_posts( 'expertcare_quote' )->publish ?? 0;
                
                $get_status_count = function($status_name) {
                    $q = new WP_Query([
                        'post_type'  => 'expertcare_quote',
                        'meta_key'   => '_quote_status',
                        'meta_value' => $status_name,
                        'fields'     => 'ids',
                        'posts_per_page' => -1,
                    ]);
                    return $q->found_posts;
                };

                $stat_new       = $get_status_count('New');
                $stat_contacted = $get_status_count('Contacted');
                $stat_booked    = $get_status_count('Booked');

                $args = [
                    'post_type'      => 'expertcare_quote',
                    'post_status'    => 'publish',
                    'posts_per_page' => 40,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                ];

                if ( ! empty( $search_term ) ) {
                    $args['s'] = $search_term;
                }

                if ( $status_filter !== 'all' ) {
                    $args['meta_key']   = '_quote_status';
                    $args['meta_value'] = $status_filter;
                }

                $quotes_query = new WP_Query( $args );
            ?>
                <div class="hub-header">
                    <div>
                        <span style="font-size:11.5px;font-weight:800;color:#0284c7;text-transform:uppercase;letter-spacing:0.08em;">Live Pipeline</span>
                        <h1>Estimate Requests Queue</h1>
                    </div>
                    <form method="get" action="<?php echo esc_url( admin_url('admin.php') ); ?>" style="display:flex;gap:8px;">
                        <input type="hidden" name="page" value="expertcare-quotes">
                        <?php if ( $status_filter !== 'all' ) : ?>
                            <input type="hidden" name="status" value="<?php echo esc_attr( $status_filter ); ?>">
                        <?php endif; ?>
                        <input type="text" name="s" value="<?php echo esc_attr( $search_term ); ?>" placeholder="Search name, phone, postcode..." style="border-radius:10px;border:1px solid #cbd5e1;padding:8px 14px;font-size:13px;width:240px;background:#fff;" />
                        <button type="submit" class="btn-save" style="padding:8px 16px;box-shadow:none;">Search</button>
                    </form>
                </div>

                <div class="hub-stats-bar">
                    <div class="hub-stat-widget">
                        <div class="hsw-icon" style="background:#e0f2fe;color:#0284c7;">📥</div>
                        <div class="hsw-info">
                            <h4><?php echo $stat_all; ?></h4>
                            <span>Total Leads</span>
                        </div>
                    </div>
                    <div class="hub-stat-widget">
                        <div class="hsw-icon" style="background:#fef3c7;color:#b45309;">⚡</div>
                        <div class="hsw-info">
                            <h4><?php echo $stat_new; ?></h4>
                            <span>New Inquiries</span>
                        </div>
                    </div>
                    <div class="hub-stat-widget">
                        <div class="hsw-icon" style="background:#e0e7ff;color:#4338ca;">💬</div>
                        <div class="hsw-info">
                            <h4><?php echo $stat_contacted; ?></h4>
                            <span>In Progress</span>
                        </div>
                    </div>
                    <div class="hub-stat-widget">
                        <div class="hsw-icon" style="background:#dcfce7;color:#15803d;">🎉</div>
                        <div class="hsw-info">
                            <h4><?php echo $stat_booked; ?></h4>
                            <span>Confirmed Booked</span>
                        </div>
                    </div>
                </div>

                <div class="hub-filter-bar">
                    <div class="hub-filter-pills">
                        <a href="<?php echo admin_url( 'admin.php?page=expertcare-quotes' ); ?>" class="hub-pill <?php echo ( $status_filter === 'all' ) ? 'active' : ''; ?>">
                            All Leads (<?php echo $stat_all; ?>)
                        </a>
                        <a href="<?php echo admin_url( 'admin.php?page=expertcare-quotes&status=New' ); ?>" class="hub-pill <?php echo ( $status_filter === 'New' ) ? 'active' : ''; ?>">
                            New (<?php echo $stat_new; ?>)
                        </a>
                        <a href="<?php echo admin_url( 'admin.php?page=expertcare-quotes&status=Contacted' ); ?>" class="hub-pill <?php echo ( $status_filter === 'Contacted' ) ? 'active' : ''; ?>">
                            Contacted (<?php echo $stat_contacted; ?>)
                        </a>
                        <a href="<?php echo admin_url( 'admin.php?page=expertcare-quotes&status=Quoted' ); ?>" class="hub-pill <?php echo ( $status_filter === 'Quoted' ) ? 'active' : ''; ?>">
                            Quoted
                        </a>
                        <a href="<?php echo admin_url( 'admin.php?page=expertcare-quotes&status=Booked' ); ?>" class="hub-pill <?php echo ( $status_filter === 'Booked' ) ? 'active' : ''; ?>">
                            Booked (<?php echo $stat_booked; ?>)
                        </a>
                        <a href="<?php echo admin_url( 'admin.php?page=expertcare-quotes&status=Archived' ); ?>" class="hub-pill <?php echo ( $status_filter === 'Archived' ) ? 'active' : ''; ?>">
                            Archived
                        </a>
                    </div>
                    <span style="font-size:12px;font-weight:600;color:#64748b;">
                        Showing <?php echo $quotes_query->post_count; ?> lead results
                    </span>
                </div>

                <div class="hub-table-wrapper">
                    <?php if ( $quotes_query->have_posts() ) : ?>
                        <table class="hub-table">
                            <thead>
                                <tr>
                                    <th>Client</th>
                                    <th>Postcode</th>
                                    <th>Service</th>
                                    <th>Footprint</th>
                                    <th>Media</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ( $quotes_query->have_posts() ) : $quotes_query->the_post(); 
                                    $q_id      = get_the_ID();
                                    $name      = get_post_meta( $q_id, '_quote_name', true );
                                    $phone     = get_post_meta( $q_id, '_quote_phone', true );
                                    $postcode  = get_post_meta( $q_id, '_quote_postcode', true );
                                    $service   = get_post_meta( $q_id, '_quote_service', true );
                                    $beds      = get_post_meta( $q_id, '_quote_bedrooms', true );
                                    $baths     = get_post_meta( $q_id, '_quote_bathrooms', true );
                                    $photos    = get_post_meta( $q_id, '_quote_photos', true ) ?: [];
                                    $status    = get_post_meta( $q_id, '_quote_status', true ) ?: 'New';
                                    
                                    $initials  = strtoupper( substr( trim($name), 0, 1 ) );
                                    $view_url  = admin_url( 'admin.php?page=expertcare-quotes&quote_id=' . $q_id );
                                    $del_url   = wp_nonce_url( admin_url( 'admin.php?page=expertcare-quotes&delete_quote=' . $q_id ), 'delete_quote_' . $q_id );
                                    
                                    $status_class = strtolower($status);
                                ?>
                                <tr>
                                    <td>
                                        <div class="client-cell">
                                            <div class="client-avatar"><?php echo esc_html( $initials ?: 'U' ); ?></div>
                                            <div>
                                                <a href="<?php echo esc_url( $view_url ); ?>" class="client-name">
                                                    <?php echo esc_html( $name ); ?>
                                                </a>
                                                <span class="client-time">
                                                    <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ); ?> ago · <a href="tel:<?php echo esc_attr( $phone ); ?>" style="color:#64748b;text-decoration:none;"><?php echo esc_html( $phone ); ?></a>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <strong style="color:#0f172a;"><?php echo esc_html( $postcode ); ?></strong>
                                    </td>
                                    <td>
                                        <span class="badge-service"><?php echo esc_html( $service ); ?></span>
                                    </td>
                                    <td>
                                        <span class="badge-specs">
                                            <?php echo ( !empty($beds) || !empty($baths) ) ? esc_html("{$beds} bed / {$baths} bath") : 'Not specified'; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php if ( ! empty( $photos ) ) : ?>
                                            <span style="font-size:12.5px;font-weight:700;color:#0284c7;">📷 <?php echo count($photos); ?></span>
                                        <?php else : ?>
                                            <span style="color:#94a3b8;font-size:13px;">—</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <span class="badge-status <?php echo esc_attr( $status_class ); ?>">
                                            ● <?php echo esc_html( $status ); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-group">
                                            <a href="<?php echo esc_url( $view_url ); ?>" class="action-btn view">
                                                Inspect Lead →
                                            </a>
                                            <a href="<?php echo esc_url( $del_url ); ?>" onclick="return confirm('Delete this estimate request?');" class="action-btn delete" title="Delete">
                                                🗑
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endwhile; wp_reset_postdata(); ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <div style="text-align:center;padding:50px 20px;">
                            <div style="font-size:36px;margin-bottom:12px;">📬</div>
                            <h3 style="font-size:16px;font-weight:800;color:#0f172a;margin:0 0 4px;">No estimate requests found</h3>
                            <p style="color:#64748b;font-size:13px;margin:0;">There are no customer leads matching this status criteria.</p>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </main>
    </div>
    <?php
}

/* ==========================================================================
   Render Reviews Moderation Hub
   ========================================================================== */

function expertcare_render_hub_reviews() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    $reviews_query = new WP_Query( [
        'post_type'      => 'expertcare_review',
        'post_status'    => [ 'publish', 'pending', 'draft' ],
        'posts_per_page' => 50,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ] );
    ?>
    <div class="hub-app-shell">
        <?php expertcare_render_left_nav( 'reviews' ); ?>

        <main class="hub-main">
            <div class="hub-header">
                <div>
                    <span style="font-size:12px;font-weight:700;color:#0284c7;text-transform:uppercase;">Feedback Moderation</span>
                    <h1>Client Reviews</h1>
                </div>
            </div>

            <div class="hub-card">
                <h3><span class="dashicons dashicons-star-filled" style="color:#f59e0b;"></span> Testimonials Queue</h3>
                <p style="color:#64748b;font-size:13px;margin:0 0 18px;">Approve or decline customer feedback with 1-click verification.</p>

                <?php if ( $reviews_query->have_posts() ) : ?>
                    <table class="wp-list-table widefat fixed striped" style="border-radius:10px;overflow:hidden;border:1px solid #e2e8f0;">
                        <thead>
                            <tr>
                                <th style="width:50px;">Photo</th>
                                <th style="width:140px;">Client</th>
                                <th style="width:100px;">Rating</th>
                                <th>Feedback Snippet</th>
                                <th style="width:150px;">Service / Area</th>
                                <th style="width:100px;">Status</th>
                                <th style="width:180px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ( $reviews_query->have_posts() ) : $reviews_query->the_post(); 
                                $rev_id   = get_the_ID();
                                $rating   = intval( get_post_meta( $rev_id, '_review_rating', true ) ?: 5 );
                                $location = get_post_meta( $rev_id, '_review_location', true ) ?: '';
                                $status   = get_post_status( $rev_id );

                                $approve_url = wp_nonce_url(
                                    admin_url( 'admin-post.php?action=expertcare_hub_mod_review&mod_action=approve&post_id=' . $rev_id ),
                                    'expertcare_mod_' . $rev_id
                                );
                                $decline_url = wp_nonce_url(
                                    admin_url( 'admin-post.php?action=expertcare_hub_mod_review&mod_action=decline&post_id=' . $rev_id ),
                                    'expertcare_mod_' . $rev_id
                                );
                                $delete_url  = get_delete_post_link( $rev_id );
                            ?>
                            <tr>
                                <td>
                                    <?php if ( has_post_thumbnail( $rev_id ) ) : ?>
                                        <?php echo get_the_post_thumbnail( $rev_id, [ 36, 36 ], [ 'style' => 'border-radius:50%;object-fit:cover;width:36px;height:36px;display:block;' ] ); ?>
                                    <?php else : ?>
                                        <span style="display:inline-block;width:36px;height:36px;border-radius:50%;background:#e2e8f0;line-height:36px;text-align:center;font-weight:700;color:#64748b;">—</span>
                                    <?php endif; ?>
                                </td>
                                <td><strong><?php the_title(); ?></strong></td>
                                <td>
                                    <span style="color:#f59e0b;letter-spacing:1px;font-size:13px;">
                                        <?php echo str_repeat( '★', $rating ); ?>
                                    </span>
                                </td>
                                <td><?php echo esc_html( wp_trim_words( get_the_content(), 14, '...' ) ); ?></td>
                                <td><span style="color:#64748b;font-size:12px;"><?php echo esc_html( $location ?: '—' ); ?></span></td>
                                <td>
                                    <?php if ( 'publish' === $status ) : ?>
                                        <span style="background:#dcfce7;color:#15803d;padding:3px 8px;border-radius:4px;font-size:11px;font-weight:700;">Live</span>
                                    <?php elseif ( 'pending' === $status ) : ?>
                                        <span style="background:#fef3c7;color:#b45309;padding:3px 8px;border-radius:4px;font-size:11px;font-weight:700;">Pending</span>
                                    <?php else : ?>
                                        <span style="background:#f1f5f9;color:#64748b;padding:3px 8px;border-radius:4px;font-size:11px;font-weight:700;">Declined</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div style="display:flex;gap:6px;align-items:center;">
                                        <?php if ( 'publish' !== $status ) : ?>
                                            <a href="<?php echo esc_url( $approve_url ); ?>" class="button button-small" style="background:#16a34a;border-color:#15803d;color:#fff;font-weight:600;">Approve</a>
                                        <?php endif; ?>

                                        <?php if ( 'draft' !== $status ) : ?>
                                            <a href="<?php echo esc_url( $decline_url ); ?>" class="button button-small" style="background:#dc2626;border-color:#b91c1c;color:#fff;font-weight:600;">Decline</a>
                                        <?php endif; ?>

                                        <a href="<?php echo esc_url( $delete_url ); ?>" onclick="return confirm('Permanently remove this review?');" style="color:#94a3b8;margin-left:4px;text-decoration:none;" title="Delete">🗑</a>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p style="color:#64748b;text-align:center;padding:20px;">No reviews submitted yet.</p>
                <?php endif; ?>
            </div>
        </main>
    </div>
    <?php
}

/* ==========================================================================
   Handle Review Moderation Actions
   ========================================================================== */

function expertcare_process_hub_moderation() {
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( __( 'Unauthorized permissions.', 'expertcare' ) );
    }

    $post_id    = isset( $_GET['post_id'] ) ? intval( $_GET['post_id'] ) : 0;
    $mod_action = isset( $_GET['mod_action'] ) ? sanitize_text_field( $_GET['mod_action'] ) : '';

    check_admin_referer( 'expertcare_mod_' . $post_id );

    if ( $post_id && get_post_type( $post_id ) === 'expertcare_review' ) {
        if ( 'approve' === $mod_action ) {
            wp_update_post( [
                'ID'          => $post_id,
                'post_status' => 'publish',
            ] );
        } elseif ( 'decline' === $mod_action ) {
            wp_update_post( [
                'ID'          => $post_id,
                'post_status' => 'draft',
            ] );
        }
    }

    wp_safe_redirect( admin_url( 'admin.php?page=expertcare-reviews' ) );
    exit;
}
add_action( 'admin_post_expertcare_hub_mod_review', 'expertcare_process_hub_moderation' );

/* ==========================================================================
   Render Service Tab Page (Drag & Drop Sortable + Featured Image + Prose)
   ========================================================================== */

function expertcare_render_service_tab_page( $key, $svc ) {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    $opt_key = 'expertcare_svc_' . $key . '_data';
    $data    = get_option( $opt_key, [] );

    $h1_main   = $data['h1_main'] ?? '';
    $h1_shine  = $data['h1_shine'] ?? '';
    $sub       = $data['sub'] ?? '';
    $eyebrow   = $data['eyebrow'] ?? '';
    $price     = $data['price'] ?? '';
    $feat_img  = $data['feat_img'] ?? '';

    $prose     = ! empty( $data['prose'] ) && is_array( $data['prose'] ) ? $data['prose'] : [];
    $checklist = ! empty( $data['checklist'] ) && is_array( $data['checklist'] ) ? $data['checklist'] : [];
    $imgs      = ! empty( $data['imgs'] ) && is_array( $data['imgs'] ) ? $data['imgs'] : [];
    $faqs      = ! empty( $data['faqs'] ) && is_array( $data['faqs'] ) ? $data['faqs'] : [];
    ?>
    <div class="hub-app-shell">
        <?php expertcare_render_left_nav( $key ); ?>

        <main class="hub-main">
            <div class="hub-header">
                <div>
                    <span style="font-size:12px;font-weight:700;color:#0284c7;text-transform:uppercase;">Configuring Service #<?php echo esc_html( $svc['code'] ); ?></span>
                    <h1><?php echo esc_html( $svc['title'] ); ?></h1>
                </div>
                <div>
                    <a href="<?php echo esc_url( home_url( '/' . $key . '/' ) ); ?>" target="_blank" class="button" style="border-radius:8px;padding:6px 14px;font-weight:600;">
                        View Live Page ↗
                    </a>
                </div>
            </div>

            <?php if ( isset( $_GET['settings-updated'] ) ) : ?>
                <div class="notice notice-success is-dismissible" style="border-radius:10px;margin-bottom:24px;"><p><strong>Saved:</strong> All content, featured image, checklists, and media are updated live.</p></div>
            <?php endif; ?>

            <form method="post" action="options.php">
                <?php settings_fields( 'expertcare_svc_group_' . $key ); ?>

                <div class="hub-grid">
                    <div>
                        <!-- Hero Card -->
                        <div class="hub-card">
                            <h3><span class="dashicons dashicons-welcome-write-blog" style="color:#0284c7;"></span> 1. Hero &amp; Header Copywriting</h3>
                            <div class="hub-field"><label>Eyebrow Tagline</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[eyebrow]" value="<?php echo esc_attr( $eyebrow ); ?>" placeholder="e.g. 01 · Ongoing Domestic Housekeeping" /></div>
                            <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">
                                <div class="hub-field"><label>H1 Normal Title</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[h1_main]" value="<?php echo esc_attr( $h1_main ); ?>" placeholder="e.g. Routine home cleaning," /></div>
                                <div class="hub-field"><label>H1 Highlight (Blue Accent)</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[h1_shine]" value="<?php echo esc_attr( $h1_shine ); ?>" placeholder="e.g. consistently immaculate." /></div>
                            </div>
                            <div class="hub-field" style="margin-bottom:0;"><label>Hero Subtitle Paragraph</label><textarea name="<?php echo esc_attr( $opt_key ); ?>[sub]" rows="3" placeholder="Enter service introduction paragraph..."><?php echo esc_textarea( $sub ); ?></textarea></div>
                        </div>

                        <!-- Editorial Prose Repeater -->
                        <div class="hub-card">
                            <h3><span class="dashicons dashicons-text-page" style="color:#f59e0b;"></span> 2. Editorial Prose Blocks <small style="font-weight:normal;color:#64748b;font-size:12px;">(Drag handle ⋮⋮)</small></h3>
                            <p style="color:#64748b;font-size:12.5px;margin-top:0;">Add subheadings and paragraphs for the left-hand column description.</p>
                            
                            <div id="prose-sortable" style="display:flex;flex-direction:column;gap:12px;">
                                <?php if ( ! empty( $prose ) ) : ?>
                                    <?php foreach ( $prose as $p_idx => $p_item ) : ?>
                                        <div class="prose-row" style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:16px;position:relative;">
                                            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;">
                                                <span class="sort-handle" title="Drag to reorder">⋮⋮ Reorder Block</span>
                                                <button type="button" class="button remove-prose-row" style="color:#ef4444;border-color:#fecaca;border-radius:6px;">✕ Remove</button>
                                            </div>
                                            <div class="hub-field" style="margin-bottom:8px;"><label>Heading Title:</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[prose][<?php echo $p_idx; ?>][title]" value="<?php echo esc_attr( $p_item['title'] ?? '' ); ?>" style="font-weight:600;" placeholder="e.g. What the service covers" /></div>
                                            <div class="hub-field" style="margin-bottom:0;"><label>Paragraph Body:</label><textarea name="<?php echo esc_attr( $opt_key ); ?>[prose][<?php echo $p_idx; ?>][body]" rows="3" placeholder="Enter paragraph content..."><?php echo esc_textarea( $p_item['body'] ?? '' ); ?></textarea></div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <button type="button" id="add-prose-row" class="button button-secondary" style="margin-top:14px;border-radius:8px;">+ Add Prose Block</button>
                        </div>

                        <!-- Checklist Card Repeater -->
                        <div class="hub-card">
                            <h3><span class="dashicons dashicons-yes-alt" style="color:#10b981;"></span> 3. Checklist Protocol &amp; Rate Card</h3>
                            <div class="hub-field"><label>Checklist Price / Rate Subtitle</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[price]" value="<?php echo esc_attr( $price ); ?>" placeholder="e.g. Transparent pricing · adapted to your property footprint" /></div>

                            <label style="font-size:12.5px;font-weight:700;display:block;margin-bottom:8px;color:#334155;">Checklist Items Repeater <small style="color:#64748b;font-weight:normal;">(Drag handle ⋮⋮)</small>:</label>
                            <div id="checklist-sortable" style="display:flex;flex-direction:column;gap:8px;">
                                <?php if ( ! empty( $checklist ) ) : ?>
                                    <?php foreach ( $checklist as $c_idx => $c_item ) : ?>
                                        <div class="checklist-row" style="display:flex;gap:8px;align-items:center;background:#fff;border:1px solid #e2e8f0;padding:6px 10px;border-radius:8px;">
                                            <span class="sort-handle" title="Drag to reorder">⋮⋮</span>
                                            <input type="text" name="<?php echo esc_attr( $opt_key ); ?>[checklist][]" value="<?php echo esc_attr( $c_item ); ?>" style="flex:1;border:none;background:transparent;padding:6px 8px;font-size:13.5px;" />
                                            <button type="button" class="button remove-checklist-row" style="color:#ef4444;border-color:#fecaca;border-radius:6px;">✕</button>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <button type="button" id="add-checklist-row" class="button button-secondary" style="margin-top:14px;border-radius:8px;">+ Add Checklist Task</button>
                        </div>

                        <!-- FAQ Card Repeater -->
                        <div class="hub-card">
                            <h3><span class="dashicons dashicons-editor-help" style="color:#8b5cf6;"></span> 4. Frequently Asked Questions <small style="font-weight:normal;color:#64748b;font-size:12px;">(Drag handle ⋮⋮)</small></h3>
                            <div id="faq-sortable" style="display:flex;flex-direction:column;gap:12px;">
                                <?php if ( ! empty( $faqs ) ) : ?>
                                    <?php foreach ( $faqs as $f_idx => $faq ) : ?>
                                        <div class="faq-row" style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:16px;position:relative;">
                                            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;">
                                                <span class="sort-handle" title="Drag to reorder">⋮⋮ Reorder FAQ</span>
                                                <button type="button" class="button remove-faq-row" style="color:#ef4444;border-color:#fecaca;border-radius:6px;">✕ Remove</button>
                                            </div>
                                            <div class="hub-field" style="margin-bottom:8px;"><label>Question:</label><input type="text" name="<?php echo esc_attr( $opt_key ); ?>[faqs][<?php echo $f_idx; ?>][q]" value="<?php echo esc_attr( $faq['q'] ); ?>" style="font-weight:600;" /></div>
                                            <div class="hub-field" style="margin-bottom:0;"><label>Answer:</label><textarea name="<?php echo esc_attr( $opt_key ); ?>[faqs][<?php echo $f_idx; ?>][a]" rows="2"><?php echo esc_textarea( $faq['a'] ); ?></textarea></div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <button type="button" id="add-faq-row" class="button button-secondary" style="margin-top:14px;border-radius:8px;">+ Add Question &amp; Answer</button>
                        </div>
                    </div>

                    <div>
                        <div class="hub-card" style="border-top:4px solid #0284c7;position:sticky;top:30px;z-index:10;">
                            <h3 style="border:none;margin-bottom:6px;padding:0;">Publish Control</h3>
                            <p style="color:#64748b;font-size:13px;margin:0 0 16px;">Saves texts, checklists, repeaters, and media changes live immediately.</p>
                            <button type="submit" class="btn-save" style="width:100%;height:44px;font-size:14px;">Save <?php echo esc_html( $svc['title'] ); ?></button>
                        </div>

                        <!-- Featured Service Image Card -->
                        <div class="hub-card">
                            <h3><span class="dashicons dashicons-format-image" style="color:#0284c7;"></span> 5. Featured Service Image</h3>
                            <p style="color:#64748b;font-size:12.5px;margin-top:0;">Main banner or hero visual for this specific service.</p>
                            
                            <?php 
                            $resolved_feat = ( filter_var( $feat_img, FILTER_VALIDATE_URL ) ) ? $feat_img : ( ! empty( $feat_img ) ? get_template_directory_uri() . '/assets/img/' . ltrim( $feat_img, '/' ) : '' ); 
                            ?>
                            <div class="image-box feat-image-box" style="display:flex;flex-direction:column;align-items:center;margin-top:12px;">
                                <div class="img-preview" style="width:100%;aspect-ratio:16/9;background:#e2e8f0;border-radius:10px;overflow:hidden;margin-bottom:10px;display:flex;align-items:center;justify-content:center;">
                                    <?php if ( $resolved_feat ) : ?>
                                        <img src="<?php echo esc_url( $resolved_feat ); ?>" style="width:100%;height:100%;object-fit:cover;" />
                                    <?php else : ?>
                                        <span style="color:#94a3b8;font-size:12px;">No Featured Image</span>
                                    <?php endif; ?>
                                </div>
                                <input type="hidden" name="<?php echo esc_attr( $opt_key ); ?>[feat_img]" value="<?php echo esc_attr( $feat_img ); ?>" class="img-url-input" />
                                <div style="display:flex;gap:6px;width:100%;">
                                    <button type="button" class="button button-small upload-feat-media-btn" style="flex:1;">Choose Image</button>
                                    <button type="button" class="button button-small remove-feat-image-row" style="color:#ef4444;">✕</button>
                                </div>
                            </div>
                        </div>

                        <!-- Showcase Gallery Media -->
                        <div class="hub-card">
                            <h3><span class="dashicons dashicons-format-gallery" style="color:#0284c7;"></span> 6. Showcase Gallery Media</h3>
                            <p style="color:#64748b;font-size:12.5px;margin-top:0;">Drag tiles to reorder images. Upload or pick from the WordPress library.</p>

                            <div id="images-sortable" style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-top:12px;">
                                <?php if ( ! empty( $imgs ) ) : ?>
                                    <?php foreach ( $imgs as $im_idx => $im_url ) : 
                                        $resolved_url = ( filter_var( $im_url, FILTER_VALIDATE_URL ) ) ? $im_url : ( get_template_directory_uri() . '/assets/img/' . ltrim( $im_url, '/' ) );
                                    ?>
                                        <div class="image-box" style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:10px;display:flex;flex-direction:column;align-items:center;cursor:grab;">
                                            <div class="img-preview" style="width:100%;aspect-ratio:1/1;background:#e2e8f0;border-radius:8px;overflow:hidden;margin-bottom:8px;display:flex;align-items:center;justify-content:center;">
                                                <img src="<?php echo esc_url( $resolved_url ); ?>" style="width:100%;height:100%;object-fit:cover;" />
                                            </div>
                                            <input type="hidden" name="<?php echo esc_attr( $opt_key ); ?>[imgs][]" value="<?php echo esc_attr( $im_url ); ?>" class="img-url-input" />
                                            <div style="display:flex;gap:4px;width:100%;">
                                                <button type="button" class="button button-small upload-media-btn" style="flex:1;border-radius:6px;font-size:11px;">Change</button>
                                                <button type="button" class="button button-small remove-image-row" style="color:#ef4444;border-radius:6px;">✕</button>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <button type="button" id="add-image-row" class="button button-secondary" style="width:100%;margin-top:14px;border-radius:8px;">+ Add New Media Photo</button>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </div>

    <script>
    jQuery(document).ready(function($) {
        var optKey = '<?php echo esc_js( $opt_key ); ?>';

        $('#prose-sortable').sortable({ handle: '.sort-handle', placeholder: 'sortable-placeholder', axis: 'y' });
        $('#checklist-sortable').sortable({ handle: '.sort-handle', placeholder: 'sortable-placeholder', axis: 'y' });
        $('#faq-sortable').sortable({ handle: '.sort-handle', placeholder: 'sortable-placeholder', axis: 'y' });
        $('#images-sortable').sortable({ placeholder: 'sortable-placeholder', tolerance: 'pointer' });

        // Prose Repeater Add
        $('#add-prose-row').on('click', function(e) {
            e.preventDefault();
            var index = $('#prose-sortable .prose-row').length;
            var row = $('<div class="prose-row" style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:16px;position:relative;">' +
                '<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;">' +
                    '<span class="sort-handle" title="Drag to reorder">⋮⋮ Reorder Block</span>' +
                    '<button type="button" class="button remove-prose-row" style="color:#ef4444;border-color:#fecaca;border-radius:6px;">✕ Remove</button>' +
                '</div>' +
                '<div class="hub-field" style="margin-bottom:8px;"><label>Heading Title:</label><input type="text" name="' + optKey + '[prose][' + index + '][title]" value="" style="font-weight:600;" placeholder="e.g. What the service covers" /></div>' +
                '<div class="hub-field" style="margin-bottom:0;"><label>Paragraph Body:</label><textarea name="' + optKey + '[prose][' + index + '][body]" rows="3" placeholder="Enter paragraph content..."></textarea></div>' +
            '</div>');
            $('#prose-sortable').append(row);
        });

        $(document).on('click', '.remove-prose-row', function(e) {
            e.preventDefault();
            $(this).closest('.prose-row').remove();
        });

        // Checklist Repeater Add
        $('#add-checklist-row').on('click', function(e) {
            e.preventDefault();
            var row = $('<div class="checklist-row" style="display:flex;gap:8px;align-items:center;background:#fff;border:1px solid #e2e8f0;padding:6px 10px;border-radius:8px;">' +
                '<span class="sort-handle" title="Drag to reorder">⋮⋮</span>' +
                '<input type="text" name="' + optKey + '[checklist][]" value="" style="flex:1;border:none;background:transparent;padding:6px 8px;font-size:13.5px;" placeholder="Enter checklist task..." />' +
                '<button type="button" class="button remove-checklist-row" style="color:#ef4444;border-color:#fecaca;border-radius:6px;">✕</button>' +
            '</div>');
            $('#checklist-sortable').append(row);
        });

        $(document).on('click', '.remove-checklist-row', function(e) {
            e.preventDefault();
            $(this).closest('.checklist-row').remove();
        });

        // Featured Image Uploader
        $(document).on('click', '.upload-feat-media-btn', function(e) {
            e.preventDefault();
            var box = $(this).closest('.feat-image-box');
            var input = box.find('.img-url-input');
            var preview = box.find('.img-preview');

            var mediaUploader = wp.media({
                title: 'Select or Upload Featured Service Image',
                button: { text: 'Use this Image' },
                multiple: false
            }).on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                input.val(attachment.url);
                preview.html('<img src="' + attachment.url + '" style="width:100%;height:100%;object-fit:cover;" />');
            }).open();
        });

        $(document).on('click', '.remove-feat-image-row', function(e) {
            e.preventDefault();
            var box = $(this).closest('.feat-image-box');
            box.find('.img-url-input').val('');
            box.find('.img-preview').html('<span style="color:#94a3b8;font-size:12px;">No Featured Image</span>');
        });

        function openWpMedia(btn) {
            var box = btn.closest('.image-box');
            var input = box.find('.img-url-input');
            var preview = box.find('.img-preview');

            var mediaUploader = wp.media({
                title: 'Select or Upload Service Photo',
                button: { text: 'Use this Photo' },
                multiple: false
            }).on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                input.val(attachment.url);
                preview.html('<img src="' + attachment.url + '" style="width:100%;height:100%;object-fit:cover;" />');
            }).open();
        }

        $(document).on('click', '.upload-media-btn', function(e) {
            e.preventDefault();
            openWpMedia($(this));
        });

        $('#add-image-row').on('click', function(e) {
            e.preventDefault();
            var newBox = $('<div class="image-box" style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:10px;display:flex;flex-direction:column;align-items:center;cursor:grab;">' +
                '<div class="img-preview" style="width:100%;aspect-ratio:1/1;background:#e2e8f0;border-radius:8px;overflow:hidden;margin-bottom:8px;display:flex;align-items:center;justify-content:center;">' +
                    '<span style="color:#94a3b8;font-size:11px;">No Image</span>' +
                '</div>' +
                '<input type="hidden" name="' + optKey + '[imgs][]" value="" class="img-url-input" />' +
                '<div style="display:flex;gap:4px;width:100%;">' +
                    '<button type="button" class="button button-small upload-media-btn" style="flex:1;border-radius:6px;font-size:11px;">Choose</button>' +
                    '<button type="button" class="button button-small remove-image-row" style="color:#ef4444;border-radius:6px;">✕</button>' +
                '</div>' +
            '</div>');
            $('#images-sortable').append(newBox);
            newBox.find('.upload-media-btn').trigger('click');
        });

        $(document).on('click', '.remove-image-row', function(e) {
            e.preventDefault();
            $(this).closest('.image-box').remove();
        });

        $('#add-faq-row').on('click', function(e) {
            e.preventDefault();
            var index = $('#faq-sortable .faq-row').length;
            var faqRow = $('<div class="faq-row" style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:16px;position:relative;">' +
                '<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;">' +
                    '<span class="sort-handle" title="Drag to reorder">⋮⋮ Reorder FAQ</span>' +
                    '<button type="button" class="button remove-faq-row" style="color:#ef4444;border-color:#fecaca;border-radius:6px;">✕ Remove</button>' +
                '</div>' +
                '<div class="hub-field" style="margin-bottom:8px;"><label>Question:</label><input type="text" name="' + optKey + '[faqs][' + index + '][q]" value="" style="font-weight:600;" placeholder="Enter question..." /></div>' +
                '<div class="hub-field" style="margin-bottom:0;"><label>Answer:</label><textarea name="' + optKey + '[faqs][' + index + '][a]" rows="2" placeholder="Enter answer..."></textarea></div>' +
            '</div>');
            $('#faq-sortable').append(faqRow);
        });

        $(document).on('click', '.remove-faq-row', function(e) {
            e.preventDefault();
            $(this).closest('.faq-row').remove();
        });
    });
    </script>
    <?php
}

/* ==========================================================================
   Handle Frontend Quote Form AJAX Submissions
   ========================================================================== */

function expertcare_handle_quote_ajax_submission() {
    check_ajax_referer( 'expertcare_quote_nonce_action', 'quote_nonce' );

    if ( ! empty( $_POST['bot-field'] ) ) {
        wp_send_json_error( __( 'Spam detected.', 'expertcare' ) );
    }

    $name     = sanitize_text_field( $_POST['name'] ?? '' );
    $postcode = sanitize_text_field( $_POST['postcode'] ?? '' );
    $phone    = sanitize_text_field( $_POST['phone'] ?? '' );

    if ( empty( $name ) || empty( $postcode ) || empty( $phone ) ) {
        wp_send_json_error( __( 'Name, postcode, and phone number are required.', 'expertcare' ) );
    }

    $service      = sanitize_text_field( $_POST['service'] ?? 'Not specified' );
    $reason       = sanitize_text_field( $_POST['reason'] ?? '' );
    $bedrooms     = sanitize_text_field( $_POST['bedrooms'] ?? '' );
    $bathrooms    = sanitize_text_field( $_POST['bathrooms'] ?? '' );
    $kitchens     = sanitize_text_field( $_POST['kitchens'] ?? '' );
    $living_rooms = sanitize_text_field( $_POST['living_rooms'] ?? '' );
    $other_rooms  = sanitize_text_field( $_POST['other_rooms'] ?? '' );
    $floors       = sanitize_text_field( $_POST['floors'] ?? '' );
    $parking      = sanitize_text_field( $_POST['parking'] ?? '' );
    $notes        = sanitize_textarea_field( $_POST['notes'] ?? '' );

    $post_id = wp_insert_post( [
        'post_title'  => $name . ' — ' . $postcode . ' (' . $service . ')',
        'post_type'   => 'expertcare_quote',
        'post_status' => 'publish',
    ] );

    if ( is_wp_error( $post_id ) ) {
        wp_send_json_error( __( 'Failed to save quote request.', 'expertcare' ) );
    }

    update_post_meta( $post_id, '_quote_name', $name );
    update_post_meta( $post_id, '_quote_postcode', $postcode );
    update_post_meta( $post_id, '_quote_phone', $phone );
    update_post_meta( $post_id, '_quote_service', $service );
    update_post_meta( $post_id, '_quote_reason', $reason );
    update_post_meta( $post_id, '_quote_bedrooms', $bedrooms );
    update_post_meta( $post_id, '_quote_bathrooms', $bathrooms );
    update_post_meta( $post_id, '_quote_kitchens', $kitchens );
    update_post_meta( $post_id, '_quote_living_rooms', $living_rooms );
    update_post_meta( $post_id, '_quote_other_rooms', $other_rooms );
    update_post_meta( $post_id, '_quote_floors', $floors );
    update_post_meta( $post_id, '_quote_parking', $parking );
    update_post_meta( $post_id, '_quote_notes', $notes );
    update_post_meta( $post_id, '_quote_status', 'New' );

    if ( ! empty( $_FILES['photos']['name'][0] ) ) {
        require_once ABSPATH . 'wp-admin/includes/image.php';
        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/media.php';

        $photo_ids = [];
        $files     = $_FILES['photos'];

        foreach ( $files['name'] as $f_key => $val ) {
            if ( $files['name'][ $f_key ] ) {
                $file = [
                    'name'     => $files['name'][ $f_key ],
                    'type'     => $files['type'][ $f_key ],
                    'tmp_name' => $files['tmp_name'][ $f_key ],
                    'error'    => $files['error'][ $f_key ],
                    'size'     => $files['size'][ $f_key ],
                ];

                $_FILES['single_upload'] = $file;
                $attachment_id = media_handle_upload( 'single_upload', $post_id );

                if ( ! is_wp_error( $attachment_id ) ) {
                    $photo_ids[] = $attachment_id;
                }
            }
        }

        if ( ! empty( $photo_ids ) ) {
            update_post_meta( $post_id, '_quote_photos', $photo_ids );
        }
    }

    wp_send_json_success( [ 'message' => 'Thank you! Your estimate request has been received.' ] );
}
add_action( 'wp_ajax_submit_expertcare_quote', 'expertcare_handle_quote_ajax_submission' );
add_action( 'wp_ajax_nopriv_submit_expertcare_quote', 'expertcare_handle_quote_ajax_submission' );

/* ==========================================================================
   Public Review Form Submission Handler
   ========================================================================== */

function expertcare_handle_review_submission() {
    if ( ! isset( $_POST['action'] ) || $_POST['action'] !== 'submit_expertcare_review' ) {
        return;
    }

    if ( ! isset( $_POST['review_nonce'] ) || ! wp_verify_nonce( $_POST['review_nonce'], 'submit_review_action' ) ) {
        wp_die( __( 'Security verification failed.', 'expertcare' ) );
    }

    if ( ! empty( $_POST['website_hp'] ) ) {
        wp_die( __( 'Spam submission detected.', 'expertcare' ) );
    }

    $name     = sanitize_text_field( $_POST['client_name'] ?? '' );
    $location = sanitize_text_field( $_POST['client_location'] ?? '' );
    $rating   = intval( $_POST['client_rating'] ?? 5 );
    $comment  = sanitize_textarea_field( $_POST['client_comment'] ?? '' );

    if ( empty( $name ) || empty( $comment ) ) {
        wp_redirect( add_query_arg( 'review_status', 'error', wp_get_referer() ) );
        exit;
    }

    $post_id = wp_insert_post( [
        'post_title'   => $name,
        'post_content' => $comment,
        'post_type'    => 'expertcare_review',
        'post_status'  => 'pending',
    ] );

    if ( ! is_wp_error( $post_id ) ) {
        update_post_meta( $post_id, '_review_rating', $rating );
        update_post_meta( $post_id, '_review_location', $location );

        if ( ! empty( $_FILES['client_photo']['name'] ) ) {
            require_once ABSPATH . 'wp-admin/includes/image.php';
            require_once ABSPATH . 'wp-admin/includes/file.php';
            require_once ABSPATH . 'wp-admin/includes/media.php';

            $attachment_id = media_handle_upload( 'client_photo', $post_id );
            if ( ! is_wp_error( $attachment_id ) ) {
                set_post_thumbnail( $post_id, $attachment_id );
            }
        }

        wp_redirect( add_query_arg( 'review_status', 'success', wp_get_referer() ) );
        exit;
    } else {
        wp_redirect( add_query_arg( 'review_status', 'error', wp_get_referer() ) );
        exit;
    }
}
add_action( 'admin_post_nopriv_submit_expertcare_review', 'expertcare_handle_review_submission' );
add_action( 'admin_post_submit_expertcare_review', 'expertcare_handle_review_submission' );