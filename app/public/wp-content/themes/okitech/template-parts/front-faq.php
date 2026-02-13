<?php
/**
 * ミニFAQ
 *
 * @package OkiTech
 */
?>

<section class="section-mesh-bg py-20 md:py-28">
    <div class="container mx-auto px-4">
        <div class="text-center mb-14 md:mb-20 scroll-fade-in">
            <div class="section-label justify-center">
                <?php _e('FAQ', 'okitech'); ?>
            </div>
            <h2 class="section-title">
                <?php _e('よくある質問', 'okitech'); ?>
            </h2>
        </div>

        <div class="max-w-2xl mx-auto space-y-3 scroll-fade-in">
            <details class="faq-item group">
                <summary>
                    <span><?php _e('初心者でも参加できますか？', 'okitech'); ?></span>
                    <span class="faq-icon">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </span>
                </summary>
                <div class="faq-answer">
                    <?php _e('もちろんです。参加者の多くが初心者です。専門知識は不要で、わからないことはその場で気軽に質問できます。', 'okitech'); ?>
                </div>
            </details>

            <details class="faq-item group">
                <summary>
                    <span><?php _e('参加費はかかりますか？', 'okitech'); ?></span>
                    <span class="faq-icon">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </span>
                </summary>
                <div class="faq-answer">
                    <?php _e('無料のイベントが多数あります。有料の場合も各イベントページに金額が明記されています。', 'okitech'); ?>
                </div>
            </details>

            <details class="faq-item group">
                <summary>
                    <span><?php _e('一人で参加しても大丈夫ですか？', 'okitech'); ?></span>
                    <span class="faq-icon">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </span>
                </summary>
                <div class="faq-answer">
                    <?php _e('むしろ一人参加の方がほとんどです。初対面でも自然と会話が生まれる雰囲気なので、すぐに仲間ができますよ。', 'okitech'); ?>
                </div>
            </details>

            <details class="faq-item group">
                <summary>
                    <span><?php _e('申し込みは簡単ですか？', 'okitech'); ?></span>
                    <span class="faq-icon">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </span>
                </summary>
                <div class="faq-answer">
                    <?php _e('はい、30秒で完了します。お名前とメールアドレスを入力するだけ。会員登録やアプリは不要です。', 'okitech'); ?>
                </div>
            </details>
        </div>

        <div class="text-center mt-10">
            <?php
            $faq_page = get_page_by_path('faq');
            if ($faq_page) : ?>
                <a href="<?php echo get_permalink($faq_page); ?>" class="inline-flex items-center gap-2 text-green-600 hover:text-green-700 font-semibold text-sm transition-colors">
                    <?php _e('もっと質問がある方はこちら', 'okitech'); ?>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
