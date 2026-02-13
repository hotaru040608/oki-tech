<?php
/**
 * ブログページ用CTAセクション
 *
 * @package OkiTech
 */
?>

<section class="bg-gray-900 text-white py-16 md:py-24 mt-16 scroll-fade-in">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-2xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                <?php _e('一緒に学びませんか？', 'okitech'); ?>
            </h2>
            <p class="text-gray-400 text-lg mb-10">
                <?php _e('イベントに参加して、沖縄の仲間とつながりましょう。', 'okitech'); ?>
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?php echo get_post_type_archive_link('event'); ?>"
                   class="inline-flex items-center justify-center bg-green-600 hover:bg-green-700 text-white font-semibold text-lg px-8 py-4 rounded-xl transition-all duration-200 hover:shadow-lg hover:-translate-y-0.5">
                    <?php _e('イベントを見る', 'okitech'); ?>
                </a>
                <a href="<?php echo esc_url(home_url('/about/')); ?>"
                   class="inline-flex items-center justify-center border-2 border-gray-600 text-gray-300 hover:border-gray-400 hover:text-white font-semibold text-lg px-8 py-4 rounded-xl transition-all duration-200 hover:-translate-y-0.5">
                    <?php _e('OkiTechについて', 'okitech'); ?>
                </a>
            </div>
        </div>
    </div>
</section>