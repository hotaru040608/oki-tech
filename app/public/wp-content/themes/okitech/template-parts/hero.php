<?php
/**
 * ヒーローセクション + 次回イベントスポットライト
 *
 * @package OkiTech
 */

// 次回イベントを取得
$next_event = okitech_get_next_event();
?>

<section class="hero-section flex items-center justify-center text-white relative py-12 md:py-20">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-3xl mx-auto">

            <!-- キャッチコピー -->
            <div class="mb-8 md:mb-10 scroll-fade-in">
                <h2 class="text-2xl md:text-5xl font-bold mb-4 leading-tight">
                    <?php _e('テクノロジーを、<br>もっと身近に。', 'okitech'); ?>
                </h2>
                <p class="text-sm md:text-xl opacity-80 max-w-xl mx-auto leading-relaxed">
                    <?php _e('沖縄でAI・SNS・プログラミングを気軽に学べるコミュニティ。初心者歓迎、無料イベントも多数。', 'okitech'); ?>
                </p>
            </div>

            <?php if ($next_event) :
                $event_id   = $next_event->ID;
                $event_date = get_post_meta($event_id, 'event_date', true);
                $event_time = get_post_meta($event_id, 'event_time', true);
                $event_location = get_post_meta($event_id, 'event_location', true);
                $event_price    = get_post_meta($event_id, 'event_price', true);
                $event_type     = get_post_meta($event_id, 'event_type', true);

                // カウントダウン用のISO日時を生成
                $countdown_target = '';
                if ($event_date) {
                    $countdown_target = $event_date;
                    if ($event_time && preg_match('/(\d{1,2}:\d{2})/', $event_time, $m)) {
                        $countdown_target .= 'T' . $m[1] . ':00';
                    } else {
                        $countdown_target .= 'T00:00:00';
                    }
                }

                // 開催形式のラベル
                $type_label = '';
                switch ($event_type) {
                    case 'online':  $type_label = 'オンライン'; break;
                    case 'hybrid':  $type_label = 'ハイブリッド'; break;
                    case 'offline': $type_label = '対面'; break;
                }
            ?>

            <!-- 次回イベントスポットライト -->
            <div class="hero-next-event">
                <p class="text-xs font-semibold text-green-600 uppercase tracking-widest mb-2"><?php _e('Next Event', 'okitech'); ?></p>
                <h3 class="event-spotlight-title">
                    <a href="<?php echo get_permalink($event_id); ?>" class="hover:text-green-600 transition-colors">
                        <?php echo esc_html(get_the_title($event_id)); ?>
                    </a>
                </h3>

                <div class="event-spotlight-meta">
                    <?php if ($event_date) : ?>
                        <span>
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <?php echo esc_html(date_i18n('n月j日（D）', strtotime($event_date))); ?>
                        </span>
                    <?php endif; ?>
                    <?php if ($event_time) : ?>
                        <span>
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <?php echo esc_html($event_time); ?>
                        </span>
                    <?php endif; ?>
                    <?php if ($event_location) : ?>
                        <span>
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <?php echo esc_html($event_location); ?>
                        </span>
                    <?php elseif ($type_label) : ?>
                        <span>
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            <?php echo esc_html($type_label); ?>
                        </span>
                    <?php endif; ?>
                    <?php if ($event_price) : ?>
                        <span class="font-semibold text-green-600"><?php echo esc_html($event_price); ?></span>
                    <?php endif; ?>
                </div>

                <?php if ($countdown_target) : ?>
                    <div id="hero-countdown" class="countdown-timer" data-target="<?php echo esc_attr($countdown_target); ?>">
                        <div class="countdown-unit"><span class="countdown-number">--</span><span class="countdown-label"><?php _e('日', 'okitech'); ?></span></div>
                        <div class="countdown-unit"><span class="countdown-number">--</span><span class="countdown-label"><?php _e('時間', 'okitech'); ?></span></div>
                        <div class="countdown-unit"><span class="countdown-number">--</span><span class="countdown-label"><?php _e('分', 'okitech'); ?></span></div>
                        <div class="countdown-unit"><span class="countdown-number">--</span><span class="countdown-label"><?php _e('秒', 'okitech'); ?></span></div>
                    </div>
                <?php endif; ?>

                <a href="<?php echo get_permalink($event_id); ?>" class="btn-event-apply">
                    <?php _e('詳細を見る', 'okitech'); ?>
                </a>
            </div>

            <?php else : ?>

            <!-- フォールバック: イベントがない場合 -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-16 md:mb-0">
                <a href="<?php echo get_post_type_archive_link('event'); ?>" class="inline-flex items-center justify-center bg-white text-gray-900 font-semibold text-lg px-8 py-4 rounded-xl hover:bg-gray-100 transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg">
                    <?php _e('イベントを見る', 'okitech'); ?>
                </a>
                <a href="https://discord.gg/KDBynzKzUA" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center border-2 border-white border-opacity-50 text-white font-semibold text-lg px-8 py-4 rounded-xl hover:border-opacity-100 transition-all duration-200 hover:-translate-y-0.5">
                    <?php _e('Discordに参加する', 'okitech'); ?>
                </a>
            </div>

            <?php endif; ?>

            <!-- スクロールインジケーター -->
            <div class="absolute bottom-6 md:bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
                <svg class="w-6 h-6 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </div>

        </div>
    </div>
</section>