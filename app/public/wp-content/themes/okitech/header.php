
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php _e('コンテンツにスキップ', 'okitech'); ?></a>

    <header id="masthead" class="site-header">
        <div class="container mx-auto px-4 lg:px-6">
            <div class="flex justify-between items-center py-3 md:py-4">

                <!-- サイトロゴ・タイトル -->
                <div class="site-branding flex items-center">
                    <?php
                    if (has_custom_logo()) {
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                        if ($logo) {
                            echo '<a href="' . esc_url(home_url('/')) . '" rel="home" class="custom-logo-link">';
                            echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" class="custom-logo" style="height: 52px; width: auto; max-width: 400px;">';
                            echo '</a>';
                        } else {
                            // フォールバックロゴ
                            echo '<a href="' . esc_url(home_url('/')) . '" rel="home" class="custom-logo-link">';
                            echo '<img src="' . get_template_directory_uri() . '/assets/images/logo.png" alt="' . get_bloginfo('name') . '" class="custom-logo" style="height: 52px; width: auto; max-width: 400px;">';
                            echo '</a>';
                        }
                    } else {
                    ?>
                        <h1 class="site-title">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <?php bloginfo('name'); ?>
                            </a>
                        </h1>
                        <?php
                        $okitech_description = get_bloginfo('description', 'display');
                        if ($okitech_description || is_customize_preview()) :
                            ?>
                            <p class="site-description ml-3 hidden md:block">
                                <?php echo $okitech_description; ?>
                            </p>
                        <?php endif; ?>
                    <?php } ?>
                </div>

                <!-- ナビゲーションメニュー -->
                <nav id="site-navigation" class="main-navigation flex items-center gap-3">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'hidden md:flex items-center space-x-6 lg:space-x-8 text-sm',
                        'container'      => false,
                        'fallback_cb'    => 'okitech_fallback_menu',
                    ));
                    ?>

                    <!-- CTAボタン（デスクトップ） -->
                    <a href="<?php echo get_post_type_archive_link('event'); ?>" class="header-cta-btn hidden md:inline-flex">
                        <?php _e('イベントを探す', 'okitech'); ?>
                    </a>

                    <button class="menu-toggle md:hidden" aria-controls="primary-menu" aria-expanded="false">
                        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </nav>

            </div>
        </div>
    </header>

    <div id="content" class="site-content">
