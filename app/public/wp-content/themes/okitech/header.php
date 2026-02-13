
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

    <header id="masthead" class="site-header bg-white border-b border-gray-100">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">

                <!-- サイトロゴ・タイトル -->
                <div class="site-branding flex items-center">
                    <?php
                    if (has_custom_logo()) {
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                        if ($logo) {
                            echo '<a href="' . esc_url(home_url('/')) . '" rel="home" class="custom-logo-link">';
                            echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" class="custom-logo" style="height: 64px; width: auto; max-width: 400px;">';
                            echo '</a>';
                        } else {
                            echo '<h1 class="site-title">';
                            echo '<a href="' . esc_url(home_url('/')) . '" rel="home" class="text-2xl font-bold text-gray-900">';
                            echo get_bloginfo('name');
                            echo '</a>';
                            echo '</h1>';
                        }
                    } else {
                    ?>
                        <h1 class="site-title">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="text-2xl font-bold text-gray-900">
                                <?php bloginfo('name'); ?>
                            </a>
                        </h1>
                        <?php
                        $okitech_description = get_bloginfo('description', 'display');
                        if ($okitech_description || is_customize_preview()) :
                            ?>
                            <p class="site-description text-gray-400 text-sm ml-3">
                                <?php echo $okitech_description; ?>
                            </p>
                        <?php endif; ?>
                    <?php } ?>
                </div>

                <!-- ナビゲーションメニュー -->
                <nav id="site-navigation" class="main-navigation">
                    <button class="menu-toggle md:hidden" aria-controls="primary-menu" aria-expanded="false">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'hidden md:flex space-x-8',
                        'container'      => false,
                        'fallback_cb'    => 'okitech_fallback_menu',
                    ));
                    ?>
                </nav>

            </div>
        </div>
    </header>

    <div id="content" class="site-content">