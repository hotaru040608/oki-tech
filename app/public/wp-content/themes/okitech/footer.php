    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="container mx-auto px-4 lg:px-6 py-16 md:py-20">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-10 md:gap-8">

                <!-- サイト情報 -->
                <div class="md:col-span-5">
                    <div class="site-branding mb-5">
                        <?php
                        if (has_custom_logo()) {
                            the_custom_logo();
                        } else {
                            ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="text-xl font-bold text-white hover:text-green-400 transition-colors">
                                <?php bloginfo('name'); ?>
                            </a>
                        <?php } ?>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed max-w-sm mb-6">
                        <?php _e('沖縄でAI・SNS・プログラミングを気軽に学べるコミュニティ。初心者歓迎、みんなで楽しく学べる場を提供しています。', 'okitech'); ?>
                    </p>
                    <!-- ソーシャルリンク -->
                    <div class="flex items-center gap-3">
                        <a href="https://discord.gg/KDBynzKzUA" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-gray-800 hover:bg-green-600 rounded-lg flex items-center justify-center transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg" aria-label="Discord">
                            <svg class="w-5 h-5 text-gray-400 hover:text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M20.317 4.37a19.791 19.791 0 00-4.885-1.515.074.074 0 00-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 00-5.487 0 12.64 12.64 0 00-.617-1.25.077.077 0 00-.079-.037A19.736 19.736 0 003.677 4.37a.07.07 0 00-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 00.031.057 19.9 19.9 0 005.993 3.03.078.078 0 00.084-.028c.462-.63.874-1.295 1.226-1.994a.076.076 0 00-.041-.106 13.107 13.107 0 01-1.872-.892.077.077 0 01-.008-.128 10.2 10.2 0 00.372-.292.074.074 0 01.077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 01.078.01c.12.098.246.198.373.292a.077.077 0 01-.006.127 12.299 12.299 0 01-1.873.892.077.077 0 00-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 00.084.028 19.839 19.839 0 006.002-3.03.077.077 0 00.032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 00-.031-.03z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- ナビゲーション -->
                <div class="md:col-span-3 md:col-start-7">
                    <h3 class="footer-heading"><?php _e('ページ', 'okitech'); ?></h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'footer-link-list space-y-3',
                        'container'      => false,
                        'fallback_cb'    => 'okitech_footer_fallback_menu',
                    ));
                    ?>
                </div>

                <!-- お問い合わせ -->
                <div class="md:col-span-3">
                    <h3 class="footer-heading"><?php _e('お問い合わせ', 'okitech'); ?></h3>
                    <div class="space-y-4 text-sm">
                        <a href="mailto:info@oki-tech.okinawa" class="flex items-center gap-3 text-gray-400 hover:text-white transition-colors group">
                            <span class="w-9 h-9 bg-gray-800 group-hover:bg-green-600 rounded-lg flex items-center justify-center transition-all duration-200 flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </span>
                            info@oki-tech.okinawa
                        </a>
                    </div>
                </div>

            </div>

            <!-- コピーライト -->
            <div class="footer-copyright">
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
