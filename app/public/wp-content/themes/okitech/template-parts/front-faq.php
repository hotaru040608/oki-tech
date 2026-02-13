<?php
/**
 * ミニFAQ
 *
 * @package OkiTech
 */
?>

<section class="py-16 md:py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 md:mb-16 scroll-fade-in">
            <p class="text-green-600 font-semibold text-sm tracking-widest uppercase mb-3">
                <?php _e('FAQ', 'okitech'); ?>
            </p>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
                <?php _e('よくある質問', 'okitech'); ?>
            </h2>
        </div>

        <div class="max-w-2xl mx-auto space-y-3 scroll-fade-in">
            <details class="bg-white rounded-xl shadow-sm group">
                <summary class="px-6 py-5 cursor-pointer font-semibold text-gray-900 flex items-center justify-between">
                    <?php _e('初心者でも参加できますか？', 'okitech'); ?>
                    <svg class="w-5 h-5 text-gray-400 transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </summary>
                <div class="px-6 pb-5 text-gray-500 leading-relaxed">
                    <?php _e('もちろんです。参加者の多くが初心者です。専門知識は不要で、わからないことはその場で気軽に質問できます。', 'okitech'); ?>
                </div>
            </details>

            <details class="bg-white rounded-xl shadow-sm group">
                <summary class="px-6 py-5 cursor-pointer font-semibold text-gray-900 flex items-center justify-between">
                    <?php _e('参加費はかかりますか？', 'okitech'); ?>
                    <svg class="w-5 h-5 text-gray-400 transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </summary>
                <div class="px-6 pb-5 text-gray-500 leading-relaxed">
                    <?php _e('無料のイベントが多数あります。有料の場合も各イベントページに金額が明記されています。', 'okitech'); ?>
                </div>
            </details>

            <details class="bg-white rounded-xl shadow-sm group">
                <summary class="px-6 py-5 cursor-pointer font-semibold text-gray-900 flex items-center justify-between">
                    <?php _e('一人で参加しても大丈夫ですか？', 'okitech'); ?>
                    <svg class="w-5 h-5 text-gray-400 transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </summary>
                <div class="px-6 pb-5 text-gray-500 leading-relaxed">
                    <?php _e('むしろ一人参加の方がほとんどです。初対面でも自然と会話が生まれる雰囲気なので、すぐに仲間ができますよ。', 'okitech'); ?>
                </div>
            </details>

            <details class="bg-white rounded-xl shadow-sm group">
                <summary class="px-6 py-5 cursor-pointer font-semibold text-gray-900 flex items-center justify-between">
                    <?php _e('申し込みは簡単ですか？', 'okitech'); ?>
                    <svg class="w-5 h-5 text-gray-400 transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </summary>
                <div class="px-6 pb-5 text-gray-500 leading-relaxed">
                    <?php _e('はい、30秒で完了します。お名前とメールアドレスを入力するだけ。会員登録やアプリは不要です。', 'okitech'); ?>
                </div>
            </details>
        </div>

        <div class="text-center mt-8">
            <?php
            $faq_page = get_page_by_path('faq');
            if ($faq_page) : ?>
                <a href="<?php echo get_permalink($faq_page); ?>" class="text-green-600 hover:text-green-700 font-semibold text-sm transition-colors">
                    <?php _e('もっと質問がある方はこちら', 'okitech'); ?>
                    <span class="ml-1">&rarr;</span>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>