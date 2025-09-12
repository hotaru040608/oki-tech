<?php
/**
 * ヒーローセクション
 *
 * @package OkiTech
 */
?>

<section class="hero-section flex items-center justify-center text-white relative pt-20 pb-20 md:pb-8">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-4xl mx-auto">
            
            <!-- キャッチコピー -->
            <div class="mb-8 md:mb-8">
                <h2 class="text-xl md:text-4xl font-semibold mb-4 leading-tight px-2">
                    <?php _e('沖縄で、<br class="md:hidden">新しいことを始める<br class="hidden md:block">仲間と出会おう', 'okitech'); ?>
                </h2>
                <p class="hidden md:block text-xl opacity-90 max-w-2xl mx-auto leading-relaxed px-4">
                    <?php _e('AIやSNS、プログラミングを気軽に学べる沖縄の場所。初めての人も大丈夫、みんなで一緒に楽しく学びましょう。', 'okitech'); ?>
                </p>
            </div>
            
            <!-- モバイル版専用の簡潔な説明 -->
            <div class="md:hidden mb-6">
                <p class="text-sm opacity-90 leading-relaxed px-4">
                    <?php _e('初心者も安心。沖縄で楽しく学ぼう。', 'okitech'); ?>
                </p>
            </div>
            
            <!-- CTAボタン -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-16 md:mb-0">
                <a href="<?php echo get_post_type_archive_link('event'); ?>" class="btn-primary text-lg px-8 py-4">
                    <?php _e('イベントをチェック', 'okitech'); ?>
                </a>
                <a href="https://discord.gg/KDBynzKzUA" target="_blank" rel="noopener noreferrer" class="btn-secondary text-lg px-8 py-4">
                    <span class="md:hidden"><?php _e('Discordに参加', 'okitech'); ?></span>
                    <span class="hidden md:inline"><?php _e('みんなのやりとりを見てみる', 'okitech'); ?></span>
                </a>
            </div>
            
            <!-- スクロールインジケーター -->
            <div class="absolute bottom-6 md:bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </div>
            
        </div>
    </div>
</section> 