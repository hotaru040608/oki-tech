<?php
/**
 * フロントページテンプレート
 *
 * @package OkiTech
 */

get_header();
?>

<main id="primary" class="site-main">
    
    <!-- ヒーローセクション -->
    <?php get_template_part('template-parts/hero'); ?>
    
    <!-- イベント一覧セクション -->
    <section class="section bg-gray-50 py-12 md:py-16">
        <div class="container mx-auto px-4">
            <h2 class="section-title text-center mb-8 md:mb-12"><?php _e('最新イベント', 'okitech'); ?></h2>
            
            <?php
            $events_query = new WP_Query(array(
                'post_type' => 'event',
                'posts_per_page' => 3,
                'post_status' => 'publish',
                'meta_key' => 'event_date',
                'orderby' => 'meta_value',
                'order' => 'ASC',
                'meta_query' => array(
                    array(
                        'key' => 'event_date',
                        'value' => date('Y-m-d'),
                        'compare' => '>=',
                        'type' => 'DATE'
                    )
                )
            ));
            
            if ($events_query->have_posts()) : ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                    <?php while ($events_query->have_posts()) : $events_query->the_post(); ?>
                        <?php get_template_part('template-parts/content', 'event'); ?>
                    <?php endwhile; ?>
                </div>
                
                <div class="text-center mt-8 md:mt-12">
                    <a href="<?php echo get_post_type_archive_link('event'); ?>" class="btn-primary">
                        <?php _e('もっとイベントを見る', 'okitech'); ?>
                    </a>
                </div>
            <?php else : ?>
                <p class="text-center text-gray-600 px-4"><?php _e('現在開催予定のイベントはありません。<br class="md:hidden">また後でチェックしてみてくださいね。', 'okitech'); ?></p>
            <?php endif; 
            wp_reset_postdata();
            ?>
        </div>
    </section>
    
    <!-- オキテクとはセクション -->
    <section class="section py-12 md:py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 items-center">
                <div class="order-2 lg:order-1">
                    <h2 class="section-title text-left mb-6 md:mb-8"><?php _e('オキテクとは', 'okitech'); ?></h2>
                    <div class="prose prose-lg">
                        <p class="text-gray-700 mb-4 md:mb-6 text-sm md:text-base leading-relaxed">
                            沖縄の「OkiTech」は、AIやSNS、プログラミングに興味がある人なら<br class="md:hidden">誰でも参加できる、やさしくて安心できる学べる場所です。
                        </p>
                        <p class="text-gray-700 mb-4 md:mb-6 text-sm md:text-base leading-relaxed">
                            初めての人向けのやさしい勉強会から、<br class="md:hidden">みんなで話し合う交流会まで。<br class="hidden md:block">沖縄ののんびりした雰囲気の中で、楽しく新しいことを学び、友達を作れます。
                        </p>
                        <p class="text-gray-700 mb-6 md:mb-8 text-sm md:text-base leading-relaxed">
                            ひとりで来ても大丈夫。途中から参加してもOK。<br class="md:hidden">無料のイベントもあります。<br class="hidden md:block">移住者も学生も、みんなで一緒に沖縄の新しい学びの場を作っていきましょう。
                        </p>
                        <a href="<?php echo get_permalink(get_page_by_path('about')); ?>" class="btn-secondary">
                            <?php _e('もっと詳しく', 'okitech'); ?>
                        </a>
                    </div>
                </div>
                <div class="relative order-1 lg:order-2 mb-8 lg:mb-0">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="チームワークとコラボレーション" 
                         class="rounded-lg shadow-lg w-full">
                </div>
            </div>
        </div>
    </section>
    
    <!-- コミュニティ参加セクション -->
    <section class="section bg-green-700 text-white py-12 md:py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="section-title text-center mb-6 md:mb-8 text-white font-bold text-3xl md:text-4xl"><?php _e('一緒に沖縄のテックコミュニティを作りませんか？', 'okitech'); ?></h2>
            
            <div class="max-w-3xl mx-auto">
                <p class="text-lg md:text-xl mb-8 opacity-90 leading-relaxed">
                    <?php _e('OkiTechは、沖縄で新しいことを学びたい人、仲間と出会いたい人、<br class="md:hidden">テクノロジーで沖縄を盛り上げたい人のための場所です。<br class="hidden md:block">あなたの「はじめの一歩」をお待ちしています！', 'okitech'); ?>
                </p>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 mb-8 md:mb-12">
                    <!-- 初心者歓迎 -->
                    <div class="bg-white bg-opacity-10 rounded-lg p-6">
                        <div class="bg-white bg-opacity-20 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h3 class="font-semibold mb-2"><?php _e('初心者歓迎', 'okitech'); ?></h3>
                        <p class="text-sm opacity-90"><?php _e('プログラミングやAIの知識がなくても大丈夫。みんなで楽しく学べます。', 'okitech'); ?></p>
                    </div>
                    
                    <!-- オンライン対応 -->
                    <div class="bg-white bg-opacity-10 rounded-lg p-6">
                        <div class="bg-white bg-opacity-20 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="font-semibold mb-2"><?php _e('オンライン対応', 'okitech'); ?></h3>
                        <p class="text-sm opacity-90"><?php _e('沖縄以外の方もオンラインで参加できます。', 'okitech'); ?></p>
                    </div>
                    
                    <!-- 無料イベント -->
                    <div class="bg-white bg-opacity-10 rounded-lg p-6">
                        <div class="bg-white bg-opacity-20 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                        <h3 class="font-semibold mb-2"><?php _e('無料イベント', 'okitech'); ?></h3>
                        <p class="text-sm opacity-90"><?php _e('多くのイベントが無料で参加できます。', 'okitech'); ?></p>
                    </div>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="https://discord.gg/KDBynzKzUA" target="_blank" rel="noopener noreferrer" class="btn-secondary bg-white text-green-600 hover:bg-gray-100">
                        <?php _e('Discordに参加', 'okitech'); ?>
                    </a>
                    <a href="<?php echo get_post_type_archive_link('event'); ?>" class="btn-primary bg-orange-500 hover:bg-orange-600">
                        <?php _e('イベントをチェック', 'okitech'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- ブログ最新投稿セクション -->
    <section class="section bg-gray-50 py-12 md:py-16">
        <div class="container mx-auto px-4">
            <h2 class="section-title text-center mb-8 md:mb-12"><?php _e('最新ブログ', 'okitech'); ?></h2>
            
            <?php
            $blog_query = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'post_status' => 'publish'
            ));
            
            if ($blog_query->have_posts()) : ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                    <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                        <?php get_template_part('template-parts/content', 'post'); ?>
                    <?php endwhile; ?>
                </div>
                
                <div class="text-center mt-8 md:mt-12">
                    <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="btn-primary">
                        <?php _e('オキテクニュースをもっと読む', 'okitech'); ?>
                    </a>
                </div>
            <?php else : ?>
                <p class="text-center text-gray-600 px-4"><?php _e('まだ投稿がありません。<br class="md:hidden">また後でチェックしてみてくださいね。', 'okitech'); ?></p>
            <?php endif; 
            wp_reset_postdata();
            ?>
        </div>
    </section>
    
    <!-- よくある質問セクション -->
    <section class="section py-12 md:py-16">
        <div class="container mx-auto px-4">
            <h2 class="section-title text-center mb-8 md:mb-12"><?php _e('よくある質問', 'okitech'); ?></h2>
            
            <div class="max-w-4xl mx-auto">
                <!-- FAQ カテゴリー1: 参加について -->
                <div class="mb-8 md:mb-12">
                    <h3 class="text-xl md:text-2xl font-bold text-gray-800 mb-6 text-center"><?php _e('参加について', 'okitech'); ?></h3>
                    <div class="space-y-4">
                        <details class="bg-white border border-gray-200 rounded-lg shadow-sm">
                            <summary class="px-6 py-4 cursor-pointer hover:bg-gray-50 transition-colors font-semibold text-gray-800 flex items-center justify-between">
                                <?php _e('初心者でも参加できますか？', 'okitech'); ?>
                                <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </summary>
                            <div class="px-6 pb-4 text-gray-700 leading-relaxed">
                                <?php _e('もちろんです！初心者向けのイベントもたくさんあります。プログラミングやAIの知識がなくても、みんなで楽しく学べる環境を提供しています。', 'okitech'); ?>
                            </div>
                        </details>
                        
                        <details class="bg-white border border-gray-200 rounded-lg shadow-sm">
                            <summary class="px-6 py-4 cursor-pointer hover:bg-gray-50 transition-colors font-semibold text-gray-800 flex items-center justify-between">
                                <?php _e('参加費はかかりますか？', 'okitech'); ?>
                                <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </summary>
                            <div class="px-6 pb-4 text-gray-700 leading-relaxed">
                                <?php _e('無料のイベントもあります！ただし、一部のワークショップでは材料費がかかる場合があります。イベント詳細でご確認ください。', 'okitech'); ?>
                            </div>
                        </details>
                        
                        <details class="bg-white border border-gray-200 rounded-lg shadow-sm">
                            <summary class="px-6 py-4 cursor-pointer hover:bg-gray-50 transition-colors font-semibold text-gray-800 flex items-center justify-between">
                                <?php _e('一人で参加しても大丈夫ですか？', 'okitech'); ?>
                                <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </summary>
                            <div class="px-6 pb-4 text-gray-700 leading-relaxed">
                                <?php _e('はい、大丈夫です！多くの方が一人で参加されています。みんなで楽しく交流できる雰囲気なので、すぐに友達ができますよ。', 'okitech'); ?>
                            </div>
                        </details>
                    </div>
                </div>
                
                <!-- FAQ カテゴリー2: イベントについて -->
                <div class="mb-8 md:mb-12">
                    <h3 class="text-xl md:text-2xl font-bold text-gray-800 mb-6 text-center"><?php _e('イベントについて', 'okitech'); ?></h3>
                    <div class="space-y-4">
                        <details class="bg-white border border-gray-200 rounded-lg shadow-sm">
                            <summary class="px-6 py-4 cursor-pointer hover:bg-gray-50 transition-colors font-semibold text-gray-800 flex items-center justify-between">
                                <?php _e('どんなイベントがありますか？', 'okitech'); ?>
                                <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </summary>
                            <div class="px-6 pb-4 text-gray-700 leading-relaxed">
                                <?php _e('プログラミング勉強会、AI・機械学習のワークショップ、SNS活用講座、交流会など、様々なイベントを開催しています。オンラインとオフラインの両方で開催しています。', 'okitech'); ?>
                            </div>
                        </details>
                        
                        <details class="bg-white border border-gray-200 rounded-lg shadow-sm">
                            <summary class="px-6 py-4 cursor-pointer hover:bg-gray-50 transition-colors font-semibold text-gray-800 flex items-center justify-between">
                                <?php _e('オンラインイベントの参加方法は？', 'okitech'); ?>
                                <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </summary>
                            <div class="px-6 pb-4 text-gray-700 leading-relaxed">
                                <?php _e('Zoom、Teams、Google Meetなどのオンライン会議ツールを使用します。イベント申し込み後、参加URLをお送りします。事前にツールのインストールをお願いします。', 'okitech'); ?>
                            </div>
                        </details>
                        
                        <details class="bg-white border border-gray-200 rounded-lg shadow-sm">
                            <summary class="px-6 py-4 cursor-pointer hover:bg-gray-50 transition-colors font-semibold text-gray-800 flex items-center justify-between">
                                <?php _e('イベントの申し込みはいつまでですか？', 'okitech'); ?>
                                <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </summary>
                            <div class="px-6 pb-4 text-gray-700 leading-relaxed">
                                <?php _e('各イベントによって締切日時が異なります。イベント詳細ページでご確認ください。定員に達した場合は早期に締め切る場合があります。', 'okitech'); ?>
                            </div>
                        </details>
                    </div>
                </div>
                
                <!-- FAQ カテゴリー3: コミュニティについて -->
                <div>
                    <h3 class="text-xl md:text-2xl font-bold text-gray-800 mb-6 text-center"><?php _e('コミュニティについて', 'okitech'); ?></h3>
                    <div class="space-y-4">
                        <details class="bg-white border border-gray-200 rounded-lg shadow-sm">
                            <summary class="px-6 py-4 cursor-pointer hover:bg-gray-50 transition-colors font-semibold text-gray-800 flex items-center justify-between">
                                <?php _e('Discordに参加したいのですが？', 'okitech'); ?>
                                <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </summary>
                            <div class="px-6 pb-4 text-gray-700 leading-relaxed">
                                <?php _e('Discordサーバーで日常的な交流や質問ができます。イベントの最新情報もお知らせします。誰でも参加可能ですので、お気軽にご参加ください。', 'okitech'); ?>
                            </div>
                        </details>
                        
                        <details class="bg-white border border-gray-200 rounded-lg shadow-sm">
                            <summary class="px-6 py-4 cursor-pointer hover:bg-gray-50 transition-colors font-semibold text-gray-800 flex items-center justify-between">
                                <?php _e('イベントを主催したいのですが？', 'okitech'); ?>
                                <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </summary>
                            <div class="px-6 pb-4 text-gray-700 leading-relaxed">
                                <?php _e('大歓迎です！イベントの企画や運営にご協力いただける方を募集しています。お気軽にお問い合わせください。みんなで沖縄のテックコミュニティを盛り上げましょう！', 'okitech'); ?>
                            </div>
                        </details>
                    </div>
                </div>
                
                <!-- もっと詳しく -->
                <div class="text-center mt-8 md:mt-12">
                    <p class="text-gray-600 mb-4"><?php _e('他にも質問がある場合は、お気軽にお問い合わせください', 'okitech'); ?></p>
                    <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="btn-secondary">
                        <?php _e('お問い合わせ', 'okitech'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- お問い合わせ導線セクション -->
    <section class="section bg-green-600 text-white py-12 md:py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-2xl md:text-3xl font-bold mb-4 md:mb-6 px-4">
                <?php _e('まずは気軽に話を聞いてみませんか？', 'okitech'); ?>
            </h2>
            <p class="text-base md:text-xl mb-8 md:mb-10 opacity-90 px-4 leading-relaxed">
                <?php _e('イベントの参加や主催、何か質問があるときは、<br class="md:hidden">どんなことでもお気軽にご連絡ください。<br class="hidden md:block">みなさんの「はじめの一歩」をお待ちしています！', 'okitech'); ?>
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center px-4">
                <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="btn-secondary bg-white text-green-600 hover:bg-gray-100 text-base md:text-lg px-6 md:px-8 py-3 md:py-4">
                    <?php _e('気軽に話を聞く', 'okitech'); ?>
                </a>
                <a href="<?php echo get_permalink(get_page_by_path('events')); ?>" class="btn-primary bg-orange-500 hover:bg-orange-600 text-base md:text-lg px-6 md:px-8 py-3 md:py-4">
                                            <?php _e('イベントを探す', 'okitech'); ?>
                </a>
            </div>
        </div>
    </section>
    
</main>

<?php
get_footer(); 