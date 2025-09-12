    </div><!-- #content -->

    <footer id="colophon" class="site-footer bg-gray-800 text-white">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                
                <!-- サイト情報 -->
                <div class="col-span-1 md:col-span-2 text-left">
                    <div class="site-branding mb-4 flex justify-start">
                        <?php
                        if (has_custom_logo()) {
                            the_custom_logo();
                        } else {
                            ?>
                            <h2 class="site-title text-xl font-bold text-white">
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                    <?php bloginfo('name'); ?>
                                </a>
                            </h2>
                        <?php } ?>
                    </div>
                    <p class="text-gray-300 mb-4">
                        <?php bloginfo('description'); ?>
                    </p>
                    <p class="text-gray-300 text-sm">
                        沖縄のAI・SNS・プログラミングを学べる場所<br>
                        初めての人も安心、みんなで楽しく新しいことを学べる場を提供しています。
                    </p>
                </div>

                <!-- サイトナビゲーション -->
                <div>
                    <h3 class="text-lg font-semibold mb-4"><?php _e('サイトマップ', 'okitech'); ?></h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'space-y-2',
                        'container'      => false,
                        'fallback_cb'    => 'okitech_footer_fallback_menu',
                    ));
                    ?>
                </div>

                <!-- お問い合わせ -->
                <div>
                    <h3 class="text-lg font-semibold mb-4"><?php _e('お問い合わせ', 'okitech'); ?></h3>
                    <div class="space-y-2 text-gray-300">
                        <p>Email: info@oki-tech.okinawa</p>
                    </div>
                </div>
                
            </div>
            
            <!-- コピーライト -->
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
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