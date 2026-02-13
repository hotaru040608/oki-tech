<?php
/**
 * Aboutページテンプレート
 *
 * @package OkiTech
 */

get_header();
?>

<main id="primary" class="site-main">

    <!-- ヒーローセクション -->
    <section class="py-24 md:py-32">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center scroll-fade-in">
                <p class="text-green-600 font-semibold text-sm tracking-widest uppercase mb-4">
                    <?php _e('About OkiTech', 'okitech'); ?>
                </p>
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                    <?php _e('テクノロジーを、<br class="hidden md:inline">もっと身近に。', 'okitech'); ?>
                </h1>
                <p class="text-lg md:text-xl text-gray-500 leading-relaxed">
                    <?php _e('沖縄で、AI・SNS・プログラミングに興味がある人が<br class="hidden md:inline">気軽に集まれるコミュニティです。', 'okitech'); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- メインコンテンツ -->
    <div class="container mx-auto px-4">

        <?php while (have_posts()) : the_post(); ?>

            <!-- ミッションセクション -->
            <section class="mb-24 md:mb-32">
                <div class="max-w-5xl mx-auto">
                    <div class="grid lg:grid-cols-2 gap-16 items-center">
                        <div class="scroll-fade-in-left">
                            <p class="text-green-600 font-semibold text-sm tracking-widest uppercase mb-3">
                                <?php _e('Our Mission', 'okitech'); ?>
                            </p>
                            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6 leading-tight">
                                <?php _e('学びたい気持ちがあれば、<br>それだけで十分。', 'okitech'); ?>
                            </h2>
                            <div class="space-y-5 text-gray-600 text-lg leading-relaxed">
                                <p>
                                    <?php _e('「興味はあるけど、何から始めればいいかわからない」そんな人のための場所がOkiTechです。', 'okitech'); ?>
                                </p>
                                <p>
                                    <?php _e('初心者向けの勉強会から、気軽に参加できる交流会まで。沖縄のリラックスした雰囲気の中で、自分のペースで新しいことを学べます。', 'okitech'); ?>
                                </p>
                                <p>
                                    <?php _e('ひとりで来ても大丈夫。途中参加もOK。無料イベントもあります。', 'okitech'); ?>
                                </p>
                            </div>
                        </div>
                        <div class="space-y-4 scroll-fade-in-right scroll-stagger">
                            <div class="bg-gray-50 rounded-2xl p-6 flex items-start gap-4 hover:bg-green-50 transition-colors duration-300">
                                <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900 mb-1"><?php _e('初心者歓迎', 'okitech'); ?></h3>
                                    <p class="text-gray-500 text-sm"><?php _e('経験ゼロでも安心。やさしい勉強会からスタートできます。', 'okitech'); ?></p>
                                </div>
                            </div>
                            <div class="bg-gray-50 rounded-2xl p-6 flex items-start gap-4 hover:bg-green-50 transition-colors duration-300">
                                <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900 mb-1"><?php _e('沖縄ならではの雰囲気', 'okitech'); ?></h3>
                                    <p class="text-gray-500 text-sm"><?php _e('のんびりした空気の中で、楽しく学べる環境です。', 'okitech'); ?></p>
                                </div>
                            </div>
                            <div class="bg-gray-50 rounded-2xl p-6 flex items-start gap-4 hover:bg-green-50 transition-colors duration-300">
                                <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900 mb-1"><?php _e('一緒に成長できる仲間', 'okitech'); ?></h3>
                                    <p class="text-gray-500 text-sm"><?php _e('移住者も学生も、同じ興味を持つ人とつながれます。', 'okitech'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 活動内容セクション -->
            <section class="mb-24 md:mb-32">
                <div class="max-w-5xl mx-auto">
                    <div class="text-center mb-16 scroll-fade-in">
                        <p class="text-green-600 font-semibold text-sm tracking-widest uppercase mb-3">
                            <?php _e('What We Do', 'okitech'); ?>
                        </p>
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
                            <?php _e('3つの活動', 'okitech'); ?>
                        </h2>
                    </div>
                    <div class="grid md:grid-cols-3 gap-8 scroll-stagger">
                        <!-- 勉強会 -->
                        <div class="text-center p-8 bg-gray-50 rounded-2xl hover:bg-green-50 transition-all duration-300 hover:-translate-y-1 scroll-fade-in">
                            <div class="w-16 h-16 bg-green-50 rounded-2xl flex items-center justify-center mx-auto mb-6">
                                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3"><?php _e('勉強会', 'okitech'); ?></h3>
                            <p class="text-gray-500 leading-relaxed">
                                <?php _e('AI・SNS・プログラミングなど、初心者向けのやさしい勉強会を定期開催しています。', 'okitech'); ?>
                            </p>
                        </div>

                        <!-- 交流会 -->
                        <div class="text-center p-8 bg-gray-50 rounded-2xl hover:bg-green-50 transition-all duration-300 hover:-translate-y-1 scroll-fade-in">
                            <div class="w-16 h-16 bg-green-50 rounded-2xl flex items-center justify-center mx-auto mb-6">
                                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3"><?php _e('交流会', 'okitech'); ?></h3>
                            <p class="text-gray-500 leading-relaxed">
                                <?php _e('同じ興味を持つ仲間と出会い、情報交換や相談ができるカジュアルな場です。', 'okitech'); ?>
                            </p>
                        </div>

                        <!-- ワークショップ -->
                        <div class="text-center p-8 bg-gray-50 rounded-2xl hover:bg-green-50 transition-all duration-300 hover:-translate-y-1 scroll-fade-in">
                            <div class="w-16 h-16 bg-green-50 rounded-2xl flex items-center justify-center mx-auto mb-6">
                                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3"><?php _e('ワークショップ', 'okitech'); ?></h3>
                            <p class="text-gray-500 leading-relaxed">
                                <?php _e('実際に手を動かしながら学ぶ実践型。スキルが自然と身につきます。', 'okitech'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 参加者の声セクション -->
            <section class="mb-24 md:mb-32 bg-gray-50 py-20 md:py-24 rounded-3xl">
                <div class="max-w-5xl mx-auto px-4">
                    <div class="text-center mb-16 scroll-fade-in">
                        <p class="text-green-600 font-semibold text-sm tracking-widest uppercase mb-3">
                            <?php _e('Voices', 'okitech'); ?>
                        </p>
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
                            <?php _e('参加者の声', 'okitech'); ?>
                        </h2>
                    </div>
                    <div class="grid md:grid-cols-3 gap-8 scroll-stagger">
                        <!-- 声1 -->
                        <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 scroll-fade-in">
                            <p class="text-gray-600 leading-relaxed mb-6">
                                <?php _e('「沖縄に移住して、新しいことを始めたいと思っていました。同じ志を持つ仲間と出会えて、毎日が楽しくなりました。」', 'okitech'); ?>
                            </p>
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                    <span class="text-green-600 font-bold text-sm">A</span>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900 text-sm"><?php _e('移住者・30代', 'okitech'); ?></p>
                                    <p class="text-gray-400 text-xs"><?php _e('プログラミング初心者', 'okitech'); ?></p>
                                </div>
                            </div>
                        </div>

                        <!-- 声2 -->
                        <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 scroll-fade-in">
                            <p class="text-gray-600 leading-relaxed mb-6">
                                <?php _e('「AIに興味はあったけど、どこで学べるかわからなかった。勉強会で基礎から教えてもらえて、とても分かりやすかったです。」', 'okitech'); ?>
                            </p>
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                    <span class="text-blue-600 font-bold text-sm">B</span>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900 text-sm"><?php _e('学生・20代', 'okitech'); ?></p>
                                    <p class="text-gray-400 text-xs"><?php _e('AIに興味あり', 'okitech'); ?></p>
                                </div>
                            </div>
                        </div>

                        <!-- 声3 -->
                        <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 scroll-fade-in">
                            <p class="text-gray-600 leading-relaxed mb-6">
                                <?php _e('「リモートワークで地元の人と知り合う機会が少なかったけど、交流会で素敵な仲間に出会えました。」', 'okitech'); ?>
                            </p>
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center">
                                    <span class="text-orange-600 font-bold text-sm">C</span>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900 text-sm"><?php _e('リモートワーカー・40代', 'okitech'); ?></p>
                                    <p class="text-gray-400 text-xs"><?php _e('SNS活用中', 'okitech'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 参加の流れセクション -->
            <section class="mb-24 md:mb-32">
                <div class="max-w-4xl mx-auto">
                    <div class="text-center mb-16 scroll-fade-in">
                        <p class="text-green-600 font-semibold text-sm tracking-widest uppercase mb-3">
                            <?php _e('How to Join', 'okitech'); ?>
                        </p>
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
                            <?php _e('参加はかんたん3ステップ', 'okitech'); ?>
                        </h2>
                    </div>
                    <div class="grid md:grid-cols-3 gap-8 md:gap-12 scroll-stagger">
                        <div class="text-center scroll-scale-in">
                            <div class="w-16 h-16 bg-green-600 text-white rounded-full flex items-center justify-center mx-auto mb-5 text-xl font-bold shadow-lg" style="box-shadow: 0 4px 14px rgba(5, 150, 105, 0.4);">1</div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2"><?php _e('Discordに参加', 'okitech'); ?></h3>
                            <p class="text-gray-500 text-sm leading-relaxed"><?php _e('まずはオンラインでコミュニティの雰囲気を覗いてみてください。', 'okitech'); ?></p>
                        </div>
                        <div class="text-center scroll-scale-in">
                            <div class="w-16 h-16 bg-green-600 text-white rounded-full flex items-center justify-center mx-auto mb-5 text-xl font-bold shadow-lg" style="box-shadow: 0 4px 14px rgba(5, 150, 105, 0.4);">2</div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2"><?php _e('イベントを見つける', 'okitech'); ?></h3>
                            <p class="text-gray-500 text-sm leading-relaxed"><?php _e('興味のあるイベントを見つけたら、気軽にエントリー。', 'okitech'); ?></p>
                        </div>
                        <div class="text-center scroll-scale-in">
                            <div class="w-16 h-16 bg-green-600 text-white rounded-full flex items-center justify-center mx-auto mb-5 text-xl font-bold shadow-lg" style="box-shadow: 0 4px 14px rgba(5, 150, 105, 0.4);">3</div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2"><?php _e('仲間とつながる', 'okitech'); ?></h3>
                            <p class="text-gray-500 text-sm leading-relaxed"><?php _e('ひとりでも大丈夫。来てみれば、自然と仲間ができます。', 'okitech'); ?></p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTAセクション -->
            <section class="mb-16 bg-gray-900 py-20 md:py-24 rounded-3xl scroll-fade-in">
                <div class="max-w-3xl mx-auto text-center px-4">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                        <?php _e('まずは気軽に覗いてみませんか？', 'okitech'); ?>
                    </h2>
                    <p class="text-gray-400 text-lg mb-10">
                        <?php _e('Discordで質問や相談も気軽にできます。お待ちしています。', 'okitech'); ?>
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="https://discord.gg/KDBynzKzUA" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2 bg-green-600 hover:bg-green-700 text-white text-lg font-semibold px-8 py-4 rounded-xl transition-all duration-200 hover:shadow-lg hover:-translate-y-0.5">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515a.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0a12.64 12.64 0 0 0-.617-1.25a.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057a19.9 19.9 0 0 0 5.993 3.03a.078.078 0 0 0 .084-.028a14.09 14.09 0 0 0 1.226-1.994a.076.076 0 0 0-.041-.106a13.107 13.107 0 0 1-1.872-.892a.077.077 0 0 1-.008-.128a10.2 10.2 0 0 0 .372-.292a.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127a12.299 12.299 0 0 1-1.873.892a.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028a19.839 19.839 0 0 0 6.002-3.03a.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.956-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.955-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.946 2.418-2.157 2.418z"/>
                            </svg>
                            <?php _e('Discordに参加する', 'okitech'); ?>
                        </a>
                        <a href="<?php echo get_post_type_archive_link('event'); ?>" class="inline-flex items-center justify-center border-2 border-gray-600 text-gray-300 hover:border-gray-400 hover:text-white text-lg font-semibold px-8 py-4 rounded-xl transition-all duration-200 hover:-translate-y-0.5">
                            <?php _e('イベント一覧を見る', 'okitech'); ?>
                        </a>
                    </div>
                </div>
            </section>

        <?php endwhile; ?>

    </div>
</main>

<?php
get_footer();
?>