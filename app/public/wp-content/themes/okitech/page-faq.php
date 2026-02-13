<?php
/**
 * FAQページテンプレート
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
                    <?php _e('FAQ', 'okitech'); ?>
                </p>
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                    <?php _e('よくある質問', 'okitech'); ?>
                </h1>
                <p class="text-lg text-gray-500 leading-relaxed">
                    <?php _e('OkiTechへの参加について、よくある質問にお答えします。', 'okitech'); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- FAQコンテンツ -->
    <div class="container mx-auto px-4 pb-24">
        <div class="max-w-2xl mx-auto">

            <!-- 参加について -->
            <section class="mb-16 scroll-fade-in">
                <h2 class="text-sm font-semibold text-gray-400 uppercase tracking-widest mb-6">
                    <?php _e('参加について', 'okitech'); ?>
                </h2>

                <div class="space-y-3">
                    <details class="bg-gray-50 rounded-xl shadow-sm group">
                        <summary class="px-6 py-5 cursor-pointer font-semibold text-gray-900 flex items-center justify-between">
                            <?php _e('プログラミング初心者でも参加できますか？', 'okitech'); ?>
                            <svg class="w-5 h-5 text-gray-400 transition-transform group-open:rotate-180 flex-shrink-0 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="px-6 pb-5 text-gray-500 leading-relaxed">
                            <?php _e('もちろんです。OkiTechは初心者の方に特化したコミュニティです。プログラミング未経験の方も大歓迎で、基礎から丁寧に教えます。質問は何度でもOKです。', 'okitech'); ?>
                        </div>
                    </details>

                    <details class="bg-gray-50 rounded-xl shadow-sm group">
                        <summary class="px-6 py-5 cursor-pointer font-semibold text-gray-900 flex items-center justify-between">
                            <?php _e('何を持参すればいいですか？', 'okitech'); ?>
                            <svg class="w-5 h-5 text-gray-400 transition-transform group-open:rotate-180 flex-shrink-0 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="px-6 pb-5 text-gray-500 leading-relaxed">
                            <?php _e('基本的には手ぶらで参加できます。筆記用具と飲み物があると便利です。ノートパソコンがあればベストですが、貸出もあります。', 'okitech'); ?>
                        </div>
                    </details>

                    <details class="bg-gray-50 rounded-xl shadow-sm group">
                        <summary class="px-6 py-5 cursor-pointer font-semibold text-gray-900 flex items-center justify-between">
                            <?php _e('ひとりで参加しても大丈夫ですか？', 'okitech'); ?>
                            <svg class="w-5 h-5 text-gray-400 transition-transform group-open:rotate-180 flex-shrink-0 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="px-6 pb-5 text-gray-500 leading-relaxed">
                            <?php _e('大丈夫です。参加者の約8割が初回はひとりで参加しています。スタッフがサポートしますし、同じ境遇の仲間とすぐに仲良くなれます。途中参加もOKです。', 'okitech'); ?>
                        </div>
                    </details>

                    <details class="bg-gray-50 rounded-xl shadow-sm group">
                        <summary class="px-6 py-5 cursor-pointer font-semibold text-gray-900 flex items-center justify-between">
                            <?php _e('服装はどうすればいいですか？', 'okitech'); ?>
                            <svg class="w-5 h-5 text-gray-400 transition-transform group-open:rotate-180 flex-shrink-0 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="px-6 pb-5 text-gray-500 leading-relaxed">
                            <?php _e('特に決まりはありません。Tシャツにジーンズなど、リラックスできるカジュアルな服装でお越しください。', 'okitech'); ?>
                        </div>
                    </details>
                </div>
            </section>

            <!-- イベントについて -->
            <section class="mb-16 scroll-fade-in">
                <h2 class="text-sm font-semibold text-gray-400 uppercase tracking-widest mb-6">
                    <?php _e('イベントについて', 'okitech'); ?>
                </h2>

                <div class="space-y-3">
                    <details class="bg-gray-50 rounded-xl shadow-sm group">
                        <summary class="px-6 py-5 cursor-pointer font-semibold text-gray-900 flex items-center justify-between">
                            <?php _e('参加費はかかりますか？', 'okitech'); ?>
                            <svg class="w-5 h-5 text-gray-400 transition-transform group-open:rotate-180 flex-shrink-0 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="px-6 pb-5 text-gray-500 leading-relaxed">
                            <?php _e('勉強会や交流会など、無料で参加できるイベントが多数あります。一部のワークショップで材料費がかかる場合がありますが、各イベントページに金額が明記されています。', 'okitech'); ?>
                        </div>
                    </details>

                    <details class="bg-gray-50 rounded-xl shadow-sm group">
                        <summary class="px-6 py-5 cursor-pointer font-semibold text-gray-900 flex items-center justify-between">
                            <?php _e('イベントの予約は必要ですか？', 'okitech'); ?>
                            <svg class="w-5 h-5 text-gray-400 transition-transform group-open:rotate-180 flex-shrink-0 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="px-6 pb-5 text-gray-500 leading-relaxed">
                            <?php _e('はい、定員制のため事前予約をお願いしています。各イベントページから申し込めます。当日参加も定員に余裕があれば可能です。', 'okitech'); ?>
                        </div>
                    </details>

                    <details class="bg-gray-50 rounded-xl shadow-sm group">
                        <summary class="px-6 py-5 cursor-pointer font-semibold text-gray-900 flex items-center justify-between">
                            <?php _e('途中から参加・途中退席は可能ですか？', 'okitech'); ?>
                            <svg class="w-5 h-5 text-gray-400 transition-transform group-open:rotate-180 flex-shrink-0 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="px-6 pb-5 text-gray-500 leading-relaxed">
                            <?php _e('はい、どちらも可能です。ご都合に合わせてお気軽にご参加ください。スタッフに一声かけていただければ大丈夫です。', 'okitech'); ?>
                        </div>
                    </details>
                </div>
            </section>

            <!-- 会場・アクセスについて -->
            <section class="mb-16 scroll-fade-in">
                <h2 class="text-sm font-semibold text-gray-400 uppercase tracking-widest mb-6">
                    <?php _e('会場・アクセスについて', 'okitech'); ?>
                </h2>

                <div class="space-y-3">
                    <details class="bg-gray-50 rounded-xl shadow-sm group">
                        <summary class="px-6 py-5 cursor-pointer font-semibold text-gray-900 flex items-center justify-between">
                            <?php _e('駐車場はありますか？', 'okitech'); ?>
                            <svg class="w-5 h-5 text-gray-400 transition-transform group-open:rotate-180 flex-shrink-0 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="px-6 pb-5 text-gray-500 leading-relaxed">
                            <?php _e('会場によって異なります。各イベントページでアクセス情報をご確認ください。駐車場がない会場の場合は、近隣の有料駐車場や公共交通機関のご利用をおすすめします。', 'okitech'); ?>
                        </div>
                    </details>

                    <details class="bg-gray-50 rounded-xl shadow-sm group">
                        <summary class="px-6 py-5 cursor-pointer font-semibold text-gray-900 flex items-center justify-between">
                            <?php _e('子供連れでも参加できますか？', 'okitech'); ?>
                            <svg class="w-5 h-5 text-gray-400 transition-transform group-open:rotate-180 flex-shrink-0 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="px-6 pb-5 text-gray-500 leading-relaxed">
                            <?php _e('イベントによって異なります。家族向けワークショップや子供向けプログラミング教室も開催しています。事前にスタッフにご相談ください。', 'okitech'); ?>
                        </div>
                    </details>
                </div>
            </section>

            <!-- その他 -->
            <section class="mb-16 scroll-fade-in">
                <h2 class="text-sm font-semibold text-gray-400 uppercase tracking-widest mb-6">
                    <?php _e('その他', 'okitech'); ?>
                </h2>

                <div class="space-y-3">
                    <details class="bg-gray-50 rounded-xl shadow-sm group">
                        <summary class="px-6 py-5 cursor-pointer font-semibold text-gray-900 flex items-center justify-between">
                            <?php _e('イベントを主催したい場合は？', 'okitech'); ?>
                            <svg class="w-5 h-5 text-gray-400 transition-transform group-open:rotate-180 flex-shrink-0 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="px-6 pb-5 text-gray-500 leading-relaxed">
                            <?php _e('大歓迎です。Discordでスタッフにご相談いただくか、お問い合わせフォームからご連絡ください。初心者の方でもスタッフがサポートいたします。', 'okitech'); ?>
                        </div>
                    </details>
                </div>
            </section>

            <!-- CTA -->
            <section class="bg-gray-900 rounded-3xl py-16 px-8 text-center scroll-fade-in">
                <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">
                    <?php _e('解決しない場合は', 'okitech'); ?>
                </h2>
                <p class="text-gray-400 mb-8">
                    <?php _e('お気軽にお問い合わせください。', 'okitech'); ?>
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="https://discord.gg/KDBynzKzUA" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2 bg-green-600 hover:bg-green-700 text-white font-semibold px-8 py-3 rounded-xl transition-all duration-200 hover:shadow-lg hover:-translate-y-0.5">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515a.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0a12.64 12.64 0 0 0-.617-1.25a.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057a19.9 19.9 0 0 0 5.993 3.03a.078.078 0 0 0 .084-.028a14.09 14.09 0 0 0 1.226-1.994a.076.076 0 0 0-.041-.106a13.107 13.107 0 0 1-1.872-.892a.077.077 0 0 1-.008-.128a10.2 10.2 0 0 0 .372-.292a.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127a12.299 12.299 0 0 1-1.873.892a.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028a19.839 19.839 0 0 0 6.002-3.03a.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.956-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.955-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.946 2.418-2.157 2.418z"/>
                        </svg>
                        <?php _e('Discordで質問する', 'okitech'); ?>
                    </a>
                    <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="inline-flex items-center justify-center border-2 border-gray-600 text-gray-300 hover:border-gray-400 hover:text-white font-semibold px-8 py-3 rounded-xl transition-all duration-200 hover:-translate-y-0.5">
                        <?php _e('お問い合わせフォーム', 'okitech'); ?>
                    </a>
                </div>
            </section>

        </div>
    </div>
</main>

<?php
get_footer();
?>