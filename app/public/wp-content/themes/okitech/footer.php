    </div><!-- #content -->

    <footer id="colophon" class="site-footer bg-gray-900 text-white">
        <div class="container mx-auto px-4 py-16">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">

                <!-- サイト情報 -->
                <div class="col-span-1 md:col-span-2">
                    <div class="site-branding mb-4">
                        <?php
                        if (has_custom_logo()) {
                            the_custom_logo();
                        } else {
                            ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="text-xl font-bold text-white">
                                <?php bloginfo('name'); ?>
                            </a>
                        <?php } ?>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed max-w-sm">
                        <?php _e('沖縄でAI・SNS・プログラミングを気軽に学べるコミュニティ。初心者歓迎、みんなで楽しく学べる場を提供しています。', 'okitech'); ?>
                    </p>
                </div>

                <!-- サイトナビゲーション -->
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-widest mb-4"><?php _e('ページ', 'okitech'); ?></h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'space-y-3',
                        'container'      => false,
                        'fallback_cb'    => 'okitech_footer_fallback_menu',
                    ));
                    ?>
                </div>

                <!-- お問い合わせ -->
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-widest mb-4"><?php _e('お問い合わせ', 'okitech'); ?></h3>
                    <div class="space-y-3 text-gray-400 text-sm">
                        <p>Email: info@oki-tech.okinawa</p>
                    </div>
                </div>

            </div>

            <!-- コピーライト -->
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-500 text-sm">
                <p>
                    &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.
                    <?php _e('All rights reserved.', 'okitech'); ?>
                </p>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>