<?php
/**
 * ブログ記事ページ用CTAセクション
 *
 * @package OkiTech
 */
?>

<section class="max-w-3xl mx-auto mt-12 bg-gray-50 rounded-2xl py-12 px-8 text-center scroll-fade-in">
    <h3 class="text-2xl font-bold text-gray-900 mb-3">
        <?php _e('興味を持ったら、次はイベントへ。', 'okitech'); ?>
    </h3>
    <p class="text-gray-500 mb-8">
        <?php _e('沖縄でAI・プログラミングを学びたい方は、ぜひイベントに参加してみてください。', 'okitech'); ?>
    </p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="<?php echo get_post_type_archive_link('event'); ?>"
           class="inline-flex items-center justify-center bg-green-600 hover:bg-green-700 text-white font-semibold px-8 py-3 rounded-xl transition-colors duration-200">
            <?php _e('イベントを見る', 'okitech'); ?>
        </a>
        <a href="<?php echo esc_url(home_url('/about/')); ?>"
           class="inline-flex items-center justify-center border-2 border-gray-200 text-gray-600 hover:border-gray-300 font-semibold px-8 py-3 rounded-xl transition-colors duration-200">
            <?php _e('OkiTechについて', 'okitech'); ?>
        </a>
    </div>
</section>