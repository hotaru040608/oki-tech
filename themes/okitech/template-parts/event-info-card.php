<?php
/**
 * イベント情報カード（固定表示）
 *
 * @package OkiTech
 */

// イベント情報を取得
$event_date = get_post_meta(get_the_ID(), 'event_date', true);
$event_time = get_post_meta(get_the_ID(), 'event_time', true);
$event_location = get_post_meta(get_the_ID(), 'event_location', true);
$event_capacity = get_post_meta(get_the_ID(), 'event_capacity', true);
$event_price = get_post_meta(get_the_ID(), 'event_price', true);
$event_status = get_post_meta(get_the_ID(), 'event_status', true);

// デフォルト値の設定
if (!$event_date) $event_date = '未定';
if (!$event_time) $event_time = '未定';
if (!$event_location) $event_location = '未定';
if (!$event_capacity) $event_capacity = '未定';
if (!$event_price) $event_price = '無料';
if (!$event_status) $event_status = '募集中';
?>

<div class="event-info-card">
    <div class="event-info-header">
        <div class="flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            イベント情報
        </div>
    </div>
    
    <div class="event-info-content">
        <div class="event-info-item">
            <span class="event-info-label">開催日:</span>
            <span class="event-info-value"><?php echo esc_html($event_date); ?></span>
        </div>
        
        <div class="event-info-item">
            <span class="event-info-label">時間:</span>
            <span class="event-info-value"><?php echo esc_html($event_time); ?></span>
        </div>
        
        <div class="event-info-item">
            <span class="event-info-label">場所:</span>
            <span class="event-info-value"><?php echo esc_html($event_location); ?></span>
        </div>
        
        <?php if ($event_capacity && $event_capacity !== '未定') : ?>
        <div class="event-info-item">
            <span class="event-info-label">定員:</span>
            <span class="event-info-value"><?php echo esc_html($event_capacity); ?>名</span>
        </div>
        <?php endif; ?>
        
        <div class="event-info-item">
            <span class="event-info-label">参加費:</span>
            <span class="event-info-value"><?php echo esc_html($event_price); ?></span>
        </div>
        
        <div class="event-info-item">
            <span class="event-info-label">ステータス:</span>
            <span class="event-info-value">
                <?php
                $status_class = '';
                switch ($event_status) {
                    case '募集中':
                        $status_class = 'text-green-600';
                        break;
                    case '満員':
                        $status_class = 'text-red-600';
                        break;
                    case '終了':
                        $status_class = 'text-gray-600';
                        break;
                    default:
                        $status_class = 'text-blue-600';
                }
                ?>
                <span class="<?php echo $status_class; ?> font-semibold">
                    <?php echo esc_html($event_status); ?>
                </span>
            </span>
        </div>
        
        <!-- 申し込みボタン -->
        <div class="mt-6 pt-4 border-t border-gray-200">
            <?php if ($event_status === '募集中') : ?>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" 
                   class="w-full btn-primary text-center py-3 px-6 inline-flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    イベントに申し込む
                </a>
            <?php elseif ($event_status === '満員') : ?>
                <button disabled class="w-full bg-gray-400 text-white py-3 px-6 rounded-lg cursor-not-allowed">
                    満員のため申し込み終了
                </button>
            <?php else : ?>
                <button disabled class="w-full bg-gray-400 text-white py-3 px-6 rounded-lg cursor-not-allowed">
                    申し込み終了
                </button>
            <?php endif; ?>
        </div>
        
        <!-- お問い合わせリンク -->
        <div class="mt-4 text-center">
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" 
               class="text-sm text-gray-600 hover:text-green-600 transition-colors">
                お問い合わせはこちら
            </a>
        </div>
    </div>
</div> 