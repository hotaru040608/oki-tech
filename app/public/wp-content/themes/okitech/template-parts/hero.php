<?php
/**
 * ヒーローセクション + 次回イベントスポットライト
 *
 * @package OkiTech
 */

// 次回イベントを取得
$next_event = okitech_get_next_event();
?>

<section class="hero-section section-wave flex items-center justify-center text-white relative py-16 md:py-24">

    <!-- フローティング装飾 -->
    <div class="hero-floating-shape"></div>
    <div class="hero-floating-shape"></div>
    <div class="hero-floating-shape"></div>

    <!-- グリッドパターン -->
    <div class="hero-grid-pattern"></div>

    <!-- バイブコーディング風コードオーバーレイ -->
    <div class="hero-code-overlay" aria-hidden="true">
        <pre><code><span class="code-comment">// Vibe Coding — AIに話しかけてアプリを作ろう</span>
<span class="code-prompt">&gt; 「沖縄のカフェを検索できるアプリを作って」</span>

<span class="code-keyword">import</span> { createApp } <span class="code-keyword">from</span> <span class="code-string">'vue'</span>
<span class="code-keyword">import</span> { useGeolocation } <span class="code-keyword">from</span> <span class="code-string">'@vueuse/core'</span>

<span class="code-keyword">const</span> <span class="code-func">app</span> = <span class="code-func">createApp</span>({
  <span class="code-func">setup</span>() {
    <span class="code-keyword">const</span> { coords } = <span class="code-func">useGeolocation</span>()
    <span class="code-keyword">const</span> cafes = <span class="code-func">ref</span>([])

    <span class="code-keyword">async function</span> <span class="code-func">searchCafes</span>() {
      cafes.value = <span class="code-keyword">await</span> <span class="code-func">fetch</span>(
        <span class="code-string">`/api/cafes?lat=${coords.value.latitude}`</span>
      )
    }
    <span class="code-keyword">return</span> { cafes, searchCafes }
  }
})</code></pre>
    </div>

    <div class="container mx-auto px-4 text-center relative z-10">
        <div class="max-w-3xl mx-auto">

            <!-- キャッチコピー -->
            <div class="mb-8 md:mb-10 scroll-fade-in">
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full px-4 py-1.5 mb-6">
                    <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                    <span class="text-white/80 text-xs font-medium tracking-wide"><?php _e('沖縄発のテックコミュニティ', 'okitech'); ?></span>
                </div>

                <h2 class="hero-title mb-5">
                    <?php _e('テクノロジーを、<br>もっと身近に。', 'okitech'); ?>
                </h2>
                <p class="hero-subtitle max-w-xl mx-auto leading-relaxed">
                    <?php _e('沖縄でAI・SNS・プログラミングを気軽に学べるコミュニティ。<br class="hidden md:block">初心者歓迎、無料イベントも多数。', 'okitech'); ?>
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
            <div class="hero-next-event scroll-scale-in">
                <div class="next-event-label">
                    <?php _e('Next Event', 'okitech'); ?>
                </div>

                <h3 class="event-spotlight-title">
                    <a href="<?php echo get_permalink($event_id); ?>">
                        <?php echo esc_html(get_the_title($event_id)); ?>
                    </a>
                </h3>

                <div class="event-spotlight-meta">
                    <?php if ($event_date) : ?>
                        <span>
                            <svg class="w-4 h-4 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <?php echo esc_html(date_i18n('n月j日（D）', strtotime($event_date))); ?>
                        </span>
                    <?php endif; ?>
                    <?php if ($event_time) : ?>
                        <span>
                            <svg class="w-4 h-4 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <?php echo esc_html($event_time); ?>
                        </span>
                    <?php endif; ?>
                    <?php if ($event_location) : ?>
                        <span>
                            <svg class="w-4 h-4 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <?php echo esc_html($event_location); ?>
                        </span>
                    <?php elseif ($type_label) : ?>
                        <span>
                            <svg class="w-4 h-4 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            <?php echo esc_html($type_label); ?>
                        </span>
                    <?php endif; ?>
                    <?php if ($event_price) : ?>
                        <span class="font-semibold text-green-300"><?php echo esc_html($event_price); ?></span>
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
                    <?php _e('詳細を見る →', 'okitech'); ?>
                </a>
            </div>

            <?php else : ?>

            <!-- フォールバック: イベントがない場合 -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center scroll-fade-in">
                <a href="<?php echo get_post_type_archive_link('event'); ?>" class="inline-flex items-center justify-center bg-white text-gray-900 font-semibold text-lg px-8 py-4 rounded-xl hover:bg-gray-100 transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg">
                    <?php _e('イベントを見る', 'okitech'); ?>
                </a>
                <a href="https://discord.gg/KDBynzKzUA" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center border-2 border-white/40 text-white font-semibold text-lg px-8 py-4 rounded-xl hover:border-white/80 hover:bg-white/10 transition-all duration-200 hover:-translate-y-0.5">
                    <?php _e('Discordに参加する', 'okitech'); ?>
                </a>
            </div>

            <?php endif; ?>

        </div>
    </div>

    <!-- スクロールインジケーター -->
    <div class="scroll-indicator">
        <div class="scroll-indicator-dot"></div>
    </div>

</section>
