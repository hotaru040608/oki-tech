<?php
/**
 * 社会的証明ストリップ
 *
 * @package OkiTech
 */

$sp_events  = get_theme_mod('okitech_sp_events', '10');
$sp_members = get_theme_mod('okitech_sp_members', '100');
$sp_satisfaction = get_theme_mod('okitech_sp_satisfaction', '95');
?>

<section class="py-12 md:py-16 border-b border-gray-100">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto scroll-fade-in">
            <div class="grid grid-cols-3 gap-4 text-center">
                <div>
                    <span class="block text-3xl md:text-4xl font-bold text-green-600" data-count="<?php echo esc_attr($sp_events); ?>" data-suffix="+">0</span>
                    <span class="block text-xs md:text-sm text-gray-400 mt-1"><?php _e('イベント開催', 'okitech'); ?></span>
                </div>
                <div>
                    <span class="block text-3xl md:text-4xl font-bold text-green-600" data-count="<?php echo esc_attr($sp_members); ?>" data-suffix="+">0</span>
                    <span class="block text-xs md:text-sm text-gray-400 mt-1"><?php _e('参加者', 'okitech'); ?></span>
                </div>
                <div>
                    <span class="block text-3xl md:text-4xl font-bold text-green-600" data-count="<?php echo esc_attr($sp_satisfaction); ?>" data-suffix="%">0</span>
                    <span class="block text-xs md:text-sm text-gray-400 mt-1"><?php _e('満足度', 'okitech'); ?></span>
                </div>
            </div>
        </div>
    </div>
</section>