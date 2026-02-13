<?php
/**
 * 最終CTA
 *
 * @package OkiTech
 */
?>

<section class="bg-gray-900 text-white py-16 md:py-24 scroll-fade-in">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-2xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                <?php _e('「やってみたい」を、<br>ここから始めよう。', 'okitech'); ?>
            </h2>
            <p class="text-gray-400 text-lg mb-10 leading-relaxed">
                <?php _e('知識ゼロでOK。一人でもOK。無料イベントも多数。', 'okitech'); ?>
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?php echo get_post_type_archive_link('event'); ?>" class="inline-flex items-center justify-center bg-green-600 hover:bg-green-700 text-white font-semibold text-lg px-8 py-4 rounded-xl transition-all duration-200 hover:shadow-lg hover:-translate-y-0.5">
                    <?php _e('イベントを探す', 'okitech'); ?>
                </a>
                <a href="https://discord.gg/KDBynzKzUA" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center border-2 border-gray-600 text-gray-300 hover:border-gray-400 hover:text-white font-semibold text-lg px-8 py-4 rounded-xl transition-all duration-200 hover:-translate-y-0.5">
                    <?php _e('Discordに参加する', 'okitech'); ?>
                </a>
            </div>
        </div>
    </div>
</section>