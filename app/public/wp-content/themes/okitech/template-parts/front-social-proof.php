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

<section class="social-proof-section py-14 md:py-20 border-b border-gray-100">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto scroll-fade-in">
            <div class="grid grid-cols-3 gap-6 md:gap-12">
                <!-- イベント開催 -->
                <div class="social-proof-item">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-green-50 rounded-2xl mb-3 mx-auto">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <span class="social-proof-number" data-count="<?php echo esc_attr($sp_events); ?>" data-suffix="+">0</span>
                    <span class="social-proof-label"><?php _e('イベント開催', 'okitech'); ?></span>
                </div>
                <!-- 参加者 -->
                <div class="social-proof-item">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-blue-50 rounded-2xl mb-3 mx-auto">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <span class="social-proof-number" data-count="<?php echo esc_attr($sp_members); ?>" data-suffix="+">0</span>
                    <span class="social-proof-label"><?php _e('参加者', 'okitech'); ?></span>
                </div>
                <!-- 満足度 -->
                <div class="social-proof-item">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-orange-50 rounded-2xl mb-3 mx-auto">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <span class="social-proof-number" data-count="<?php echo esc_attr($sp_satisfaction); ?>" data-suffix="%">0</span>
                    <span class="social-proof-label"><?php _e('満足度', 'okitech'); ?></span>
                </div>
            </div>
        </div>
    </div>
</section>
