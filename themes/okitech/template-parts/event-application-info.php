<?php
/**
 * イベント申し込み情報リスト
 *
 * @package OkiTech
 */

// イベント情報を取得
$event_date = get_post_meta(get_the_ID(), 'event_date', true);
$event_time = get_post_meta(get_the_ID(), 'event_time', true);
$event_location = get_post_meta(get_the_ID(), 'event_location', true);
$event_capacity = get_post_meta(get_the_ID(), 'event_capacity', true);
$event_price = get_post_meta(get_the_ID(), 'event_price', true);
$event_deadline = get_post_meta(get_the_ID(), 'event_deadline', true);
$event_type = get_post_meta(get_the_ID(), 'event_type', true);
$event_online_url = get_post_meta(get_the_ID(), 'event_online_url', true);
$event_online_tool = get_post_meta(get_the_ID(), 'event_online_tool', true);
$event_address = get_post_meta(get_the_ID(), 'event_address', true);

// 申し込み締切のチェック
$is_deadline_passed = false;
if ($event_deadline) {
    $deadline_timestamp = strtotime($event_deadline);
    $current_timestamp = current_time('timestamp');
    $is_deadline_passed = $current_timestamp > $deadline_timestamp;
}

// 申し込み状況の判定
$application_status = '募集中';
$status_color = 'text-green-600';
$status_bg = 'bg-green-100';
$status_border = 'border-green-400';

if ($is_deadline_passed) {
    $application_status = '申し込み終了';
    $status_color = 'text-red-600';
    $status_bg = 'bg-red-100';
    $status_border = 'border-red-400';
}
?>

<div class="event-application-info bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
    <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
        <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
        </svg>
        申し込み情報
    </h3>

    <!-- 申し込み状況 -->
    <div class="mb-6">
        <div class="<?php echo $status_bg; ?> <?php echo $status_border; ?> text-gray-700 px-4 py-3 rounded-lg">
            <div class="flex items-center justify-between">
                <span class="font-semibold">申し込み状況</span>
                <span class="<?php echo $status_color; ?> font-bold"><?php echo esc_html($application_status); ?></span>
            </div>
            <?php if ($event_deadline && !$is_deadline_passed) : ?>
                <p class="text-sm mt-1">締切: <?php echo esc_html(date_i18n('n月j日 H:i', strtotime($event_deadline))); ?></p>
            <?php endif; ?>
        </div>
    </div>

    <!-- イベント詳細情報リスト -->
    <div class="space-y-4">
        <h4 class="font-semibold text-gray-700 mb-3 flex items-center">
            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            イベント詳細
        </h4>
        
        <div class="space-y-3">
            <?php if ($event_date) : ?>
                <div class="flex items-center justify-between py-2 border-b border-gray-100">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span class="text-gray-600">開催日</span>
                    </div>
                    <span class="font-medium text-gray-800"><?php echo esc_html(date_i18n('Y年n月j日（D）', strtotime($event_date))); ?></span>
                </div>
            <?php endif; ?>

            <?php if ($event_time) : ?>
                <div class="flex items-center justify-between py-2 border-b border-gray-100">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-gray-600">開催時間</span>
                    </div>
                    <span class="font-medium text-gray-800"><?php echo esc_html($event_time); ?></span>
                </div>
            <?php endif; ?>

            <?php if ($event_type && ($event_type === 'online' || $event_type === 'hybrid')) : ?>
                <div class="flex items-center justify-between py-2 border-b border-gray-100">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                        <span class="text-gray-600">オンライン参加</span>
                    </div>
                    <div class="text-right">
                        <?php if ($event_online_tool) : ?>
                            <span class="font-medium text-gray-800"><?php echo esc_html(ucfirst($event_online_tool)); ?></span>
                        <?php endif; ?>
                        <?php if ($event_online_url) : ?>
                            <a href="<?php echo esc_url($event_online_url); ?>" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="block text-sm text-blue-600 hover:text-blue-800 mt-1">
                                参加URL
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($event_location && ($event_type === 'offline' || $event_type === 'hybrid')) : ?>
                <div class="flex items-center justify-between py-2 border-b border-gray-100">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="text-gray-600">開催場所</span>
                    </div>
                    <div class="text-right">
                        <span class="font-medium text-gray-800"><?php echo esc_html($event_location); ?></span>
                        <?php if ($event_address) : ?>
                            <a href="https://www.google.com/maps/search/<?php echo urlencode($event_address); ?>" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="block text-sm text-blue-600 hover:text-blue-800 mt-1">
                                <?php echo esc_html($event_address); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($event_capacity) : ?>
                <div class="flex items-center justify-between py-2 border-b border-gray-100">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span class="text-gray-600">定員</span>
                    </div>
                    <span class="font-medium text-gray-800"><?php echo esc_html($event_capacity); ?>名</span>
                </div>
            <?php endif; ?>

            <?php if ($event_price) : ?>
                <div class="flex items-center justify-between py-2 border-b border-gray-100">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                        <span class="text-gray-600">参加費</span>
                    </div>
                    <span class="font-medium text-green-600"><?php echo esc_html($event_price); ?></span>
                </div>
            <?php endif; ?>

            <?php if ($event_deadline) : ?>
                <div class="flex items-center justify-between py-2 border-b border-gray-100">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-gray-600">申し込み締切</span>
                    </div>
                    <span class="font-medium text-gray-800"><?php echo esc_html(date_i18n('n月j日 H:i', strtotime($event_deadline))); ?></span>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- 申し込みフォーム -->
    <div class="mt-6 pt-4 border-t border-gray-200">
        <?php if ($is_deadline_passed) : ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                <p class="font-semibold">申し込み受付終了</p>
                <p class="text-sm mt-1">申し込み締切日時を過ぎたため、受付を終了いたしました。</p>
            </div>
        <?php else : ?>
            <h4 class="font-semibold text-gray-700 mb-3 flex items-center">
                <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                申し込みフォーム
            </h4>
            
            <?php
            // Contact Form 7のフォームを表示
            if (function_exists('wpcf7_contact_form')) {
                echo do_shortcode('[contact-form-7 id="8697354" title="イベント申し込みフォーム"]');
            } else {
                // Contact Form 7が無効な場合のフォールバック
                echo okitech_display_event_application_form();
            }
            ?>
            
            <div class="mt-4 text-sm text-gray-600 space-y-1">
                <p>※ 申し込み後、確認メールをお送りします。</p>
                <p>※ 個人情報は適切に管理いたします。</p>
                <p>※ 定員に達した場合は先着順となります。</p>
            </div>
        <?php endif; ?>
    </div>
</div> 