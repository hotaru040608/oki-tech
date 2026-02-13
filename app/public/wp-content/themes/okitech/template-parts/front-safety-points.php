<?php
/**
 * 3つの安心ポイント
 *
 * @package OkiTech
 */
?>

<section class="section-mesh-bg py-20 md:py-28">
    <div class="container mx-auto px-4">
        <div class="text-center mb-14 md:mb-20 scroll-fade-in">
            <div class="section-label justify-center">
                <?php _e('Why OkiTech', 'okitech'); ?>
            </div>
            <h2 class="section-title">
                <?php _e('安心して参加できる理由', 'okitech'); ?>
            </h2>
        </div>

        <div class="max-w-5xl mx-auto grid md:grid-cols-3 gap-6 md:gap-8 scroll-stagger">
            <!-- 初心者歓迎 -->
            <div class="safety-card scroll-fade-in">
                <div class="safety-card-icon">
                    <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2"><?php _e('初心者歓迎', 'okitech'); ?></h3>
                <p class="text-gray-500 text-sm leading-relaxed"><?php _e('参加者の半数以上が初心者スタート。知識ゼロでも問題ありません。', 'okitech'); ?></p>
            </div>

            <!-- オンライン対応 -->
            <div class="safety-card scroll-fade-in">
                <div class="safety-card-icon">
                    <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2"><?php _e('どこからでも参加OK', 'okitech'); ?></h3>
                <p class="text-gray-500 text-sm leading-relaxed"><?php _e('オンラインで自宅から参加できるイベントも多数あります。', 'okitech'); ?></p>
            </div>

            <!-- 無料イベント -->
            <div class="safety-card scroll-fade-in">
                <div class="safety-card-icon">
                    <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2"><?php _e('無料で始められる', 'okitech'); ?></h3>
                <p class="text-gray-500 text-sm leading-relaxed"><?php _e('多くのイベントが参加費無料。まずはお試しで気軽にどうぞ。', 'okitech'); ?></p>
            </div>
        </div>
    </div>
</section>
