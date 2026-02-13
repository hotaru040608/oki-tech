<?php
/**
 * イベント申し込み情報リスト
 *
 * @package OkiTech
 */

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

$is_deadline_passed = false;
if ($event_deadline) {
    $is_deadline_passed = current_time('timestamp') > strtotime($event_deadline);
}

$application_status = '募集中';
$status_color = 'text-green-600 bg-green-50';
if ($is_deadline_passed) {
    $application_status = '受付終了';
    $status_color = 'text-red-600 bg-red-50';
}
?>

<div class="event-application-info bg-white border border-gray-100 rounded-2xl p-6 sticky top-8 shadow-sm scroll-fade-in-right">
    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-widest mb-6">
        <?php _e('Event Info', 'okitech'); ?>
    </h3>

    <!-- 申し込み状況 -->
    <div class="mb-6">
        <div class="flex items-center justify-between px-4 py-3 rounded-xl <?php echo $status_color; ?>">
            <span class="text-sm font-medium"><?php _e('ステータス', 'okitech'); ?></span>
            <span class="font-bold text-sm"><?php echo esc_html($application_status); ?></span>
        </div>
        <?php if ($event_deadline && !$is_deadline_passed) : ?>
            <p class="text-xs text-gray-400 mt-2 px-1"><?php _e('締切:', 'okitech'); ?> <?php echo esc_html(date_i18n('n月j日 H:i', strtotime($event_deadline))); ?></p>
        <?php endif; ?>
    </div>

    <!-- イベント詳細情報 -->
    <div class="space-y-4">
        <?php if ($event_date) : ?>
            <div class="flex items-center justify-between text-sm">
                <span class="text-gray-400"><?php _e('開催日', 'okitech'); ?></span>
                <span class="font-medium text-gray-900"><?php echo esc_html(date_i18n('Y年n月j日（D）', strtotime($event_date))); ?></span>
            </div>
        <?php endif; ?>

        <?php if ($event_time) : ?>
            <div class="flex items-center justify-between text-sm">
                <span class="text-gray-400"><?php _e('時間', 'okitech'); ?></span>
                <span class="font-medium text-gray-900"><?php echo esc_html($event_time); ?></span>
            </div>
        <?php endif; ?>

        <?php if ($event_type && ($event_type === 'online' || $event_type === 'hybrid')) : ?>
            <div class="flex items-center justify-between text-sm">
                <span class="text-gray-400"><?php _e('オンライン', 'okitech'); ?></span>
                <div class="text-right">
                    <?php if ($event_online_tool) : ?>
                        <span class="font-medium text-gray-900"><?php echo esc_html(ucfirst($event_online_tool)); ?></span>
                    <?php endif; ?>
                    <?php if ($event_online_url) : ?>
                        <a href="<?php echo esc_url($event_online_url); ?>" target="_blank" rel="noopener noreferrer" class="block text-xs text-green-600 hover:text-green-700 mt-0.5"><?php _e('参加URL', 'okitech'); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($event_location && ($event_type === 'offline' || $event_type === 'hybrid')) : ?>
            <div class="flex items-center justify-between text-sm">
                <span class="text-gray-400"><?php _e('場所', 'okitech'); ?></span>
                <div class="text-right">
                    <span class="font-medium text-gray-900"><?php echo esc_html($event_location); ?></span>
                    <?php if ($event_address) : ?>
                        <a href="https://www.google.com/maps/search/<?php echo urlencode($event_address); ?>" target="_blank" rel="noopener noreferrer" class="block text-xs text-green-600 hover:text-green-700 mt-0.5"><?php echo esc_html($event_address); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($event_capacity) : ?>
            <div class="flex items-center justify-between text-sm">
                <span class="text-gray-400"><?php _e('定員', 'okitech'); ?></span>
                <span class="font-medium text-gray-900"><?php echo esc_html($event_capacity); ?><?php _e('名', 'okitech'); ?></span>
            </div>
        <?php endif; ?>

        <?php if ($event_price) : ?>
            <div class="flex items-center justify-between text-sm">
                <span class="text-gray-400"><?php _e('参加費', 'okitech'); ?></span>
                <span class="font-medium text-green-600"><?php echo esc_html($event_price); ?></span>
            </div>
        <?php endif; ?>
    </div>

    <!-- 申し込みフォーム -->
    <div class="mt-6 pt-6 border-t border-gray-100">
        <?php if ($is_deadline_passed) : ?>
            <div class="bg-red-50 text-red-600 px-4 py-3 rounded-xl text-sm text-center">
                <p class="font-semibold"><?php _e('申し込み受付終了', 'okitech'); ?></p>
            </div>
        <?php else : ?>
            <?php
            if (function_exists('wpcf7_contact_form')) {
                echo do_shortcode('[contact-form-7 id="8697354" title="イベント申し込みフォーム"]');
            } else {
                echo okitech_display_event_application_form();
            }
            ?>
        <?php endif; ?>
    </div>
</div>