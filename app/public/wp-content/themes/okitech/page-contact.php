<?php
/**
 * お問い合わせページテンプレート
 *
 * @package OkiTech
 */

get_header();
?>

<main id="primary" class="site-main">

    <!-- ヒーローセクション -->
    <section class="page-hero py-24 md:py-32">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center scroll-fade-in">
                <div class="page-hero-label justify-center">
                    <?php _e('Contact', 'okitech'); ?>
                </div>
                <h1 class="page-hero-title">
                    <?php _e('お問い合わせ', 'okitech'); ?>
                </h1>
                <p class="page-hero-desc">
                    <?php _e('ご質問やご相談など、お気軽にお問い合わせください。<br class="hidden md:inline">通常2営業日以内にご返信いたします。', 'okitech'); ?>
                </p>
            </div>
        </div>
    </section>

    <div class="container mx-auto px-4 pb-24">

        <?php while (have_posts()) : the_post(); ?>

            <!-- フォームセクション -->
            <div class="max-w-2xl mx-auto mb-16">
                <?php if (get_the_content()) : ?>
                    <div class="entry-content prose prose-lg max-w-none mb-10">
                        <?php the_content(); ?>
                    </div>
                <?php endif; ?>

                <div class="glass-card p-8 md:p-10 scroll-fade-in">
                    <?php
                    if (function_exists('wpcf7_contact_form')) {
                        $custom_form_id = get_theme_mod('okitech_contact_form_id', '');
                        if (!empty($custom_form_id)) {
                            echo do_shortcode('[contact-form-7 id="' . esc_attr($custom_form_id) . '"]');
                        } else {
                            echo do_shortcode('[contact-form-7 id="e9860a7" title="コンタクトフォーム"]');
                        }
                    } else {
                        ?>
                        <div class="text-center py-8">
                            <p class="text-gray-500 mb-4">
                                <?php _e('メールでのお問い合わせ:', 'okitech'); ?>
                            </p>
                            <a href="mailto:<?php echo esc_attr(get_option('admin_email')); ?>"
                               class="text-green-600 hover:text-green-700 font-semibold text-lg">
                                <?php echo esc_html(get_option('admin_email')); ?>
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <!-- その他の方法 -->
            <div class="max-w-2xl mx-auto">
                <div class="grid md:grid-cols-2 gap-6 scroll-stagger">
                    <div class="safety-card scroll-fade-in">
                        <div class="safety-card-icon">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1"><?php _e('メール', 'okitech'); ?></h3>
                        <a href="mailto:<?php echo esc_attr(get_option('admin_email')); ?>"
                           class="text-green-600 hover:text-green-700 text-sm font-semibold">
                            <?php echo esc_html(get_option('admin_email')); ?>
                        </a>
                    </div>

                    <div class="safety-card scroll-fade-in">
                        <div class="safety-card-icon">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1"><?php _e('FAQ', 'okitech'); ?></h3>
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('faq'))); ?>"
                           class="text-green-600 hover:text-green-700 text-sm font-semibold">
                            <?php _e('よくある質問を見る', 'okitech'); ?> &rarr;
                        </a>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>

    </div>
</main>

<?php
get_footer();
