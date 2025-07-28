<?php
/**
 * イベントカードコンポーネント
 *
 * @package OkiTech
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('event-card bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border border-gray-100'); ?>>
    
    <!-- イベント画像 -->
    <?php if (has_post_thumbnail()) : ?>
        <div class="event-image relative">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium', array('class' => 'w-full h-48 object-cover')); ?>
                <!-- オーバーレイ -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 hover:opacity-100 transition-opacity"></div>
            </a>
        </div>
    <?php else : ?>
        <div class="event-image bg-gradient-to-br from-green-50 to-orange-50 h-48 flex items-center justify-center relative">
            <div class="text-center">
                <svg class="w-16 h-16 text-green-500 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <p class="text-sm text-gray-600 font-medium">コミュニティイベント</p>
            </div>
        </div>
    <?php endif; ?>
    
    <!-- ステータスバッジ -->
    <?php
    $event_date = get_post_meta(get_the_ID(), 'event_date', true);
    $event_deadline = get_post_meta(get_the_ID(), 'event_deadline', true);
    
    $is_available = true;
    $status_text = __('募集中', 'okitech');
    $status_class = 'bg-green-100 text-green-800';
    
    // イベント開催日のチェック
    if ($event_date && strtotime($event_date) < current_time('timestamp')) {
        $is_available = false;
        $status_text = __('終了', 'okitech');
        $status_class = 'bg-gray-100 text-gray-800';
    }
    
    // 申し込み締切のチェック
    if ($event_deadline && strtotime($event_deadline) < current_time('timestamp')) {
        $is_available = false;
        $status_text = __('締切済み', 'okitech');
        $status_class = 'bg-red-100 text-red-800';
    }
    ?>
    <div class="absolute top-4 right-4 z-10">
        <span class="<?php echo $status_class; ?> text-xs font-semibold px-3 py-1 rounded-full shadow-sm">
            <?php echo $status_text; ?>
        </span>
    </div>
    
    <!-- イベント情報 -->
    <div class="p-6">
        
        <!-- イベントタイトル -->
        <h3 class="event-title text-xl font-bold mb-4">
            <a href="<?php the_permalink(); ?>" class="text-gray-800 hover:text-green-600 transition-colors">
                <?php the_title(); ?>
            </a>
        </h3>
        
        <!-- イベント詳細 -->
        <div class="event-details space-y-3 text-gray-600 mb-6">
            
            <!-- 開催日 -->
            <?php 
            if ($event_date) : 
                $formatted_date = date_i18n('Y年n月j日（D）', strtotime($event_date));
            ?>
                <div class="flex items-center">
                    <div class="bg-orange-100 w-8 h-8 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                        <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <span class="font-medium text-sm"><?php echo esc_html($formatted_date); ?></span>
                </div>
            <?php endif; ?>
            
            <!-- 開催時間 -->
            <?php 
            $event_time = get_post_meta(get_the_ID(), 'event_time', true);
            if ($event_time) : 
            ?>
                <div class="flex items-center">
                    <div class="bg-teal-100 w-8 h-8 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                        <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <span class="font-medium text-sm"><?php echo esc_html($event_time); ?></span>
                </div>
            <?php endif; ?>
            
            <!-- 開催場所 -->
            <?php 
            $event_location = get_post_meta(get_the_ID(), 'event_location', true);
            $event_address = get_post_meta(get_the_ID(), 'event_address', true);
            if ($event_location) : 
            ?>
                <div class="flex items-start">
                    <div class="bg-blue-100 w-8 h-8 rounded-full flex items-center justify-center mr-3 flex-shrink-0 mt-0.5">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <span class="font-medium text-sm block"><?php echo esc_html($event_location); ?></span>
                        <?php if ($event_address) : ?>
                            <a href="https://www.google.com/maps/search/<?php echo urlencode($event_address); ?>" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="text-blue-600 hover:text-blue-800 hover:underline transition-colors flex items-center text-xs mt-1">
                                <svg class="w-3 h-3 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                                <span class="truncate"><?php echo esc_html($event_address); ?></span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
            
            <!-- 参加費 -->
            <?php 
            $event_price = get_post_meta(get_the_ID(), 'event_price', true);
            if ($event_price) : 
            ?>
                <div class="flex items-center">
                    <div class="bg-green-100 w-8 h-8 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <span class="font-bold text-green-600 text-lg"><?php echo esc_html($event_price); ?></span>
                </div>
            <?php endif; ?>
            
            <!-- 申し込み締切 -->
            <?php 
            if ($event_deadline) : 
                $deadline_timestamp = strtotime($event_deadline);
                $current_timestamp = current_time('timestamp');
                $is_deadline_passed = $current_timestamp > $deadline_timestamp;
            ?>
                <div class="flex items-center">
                    <div class="bg-red-100 w-8 h-8 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                        <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <span class="<?php echo $is_deadline_passed ? 'text-red-600' : 'text-orange-600'; ?> font-medium text-sm">
                        締切: <?php echo esc_html(date_i18n('n/j H:i', strtotime($event_deadline))); ?>
                    </span>
                </div>
            <?php endif; ?>
            
        </div>
        
        <!-- アクションボタン -->
        <div class="flex justify-between items-center pt-4 border-t border-gray-100">
            <a href="<?php the_permalink(); ?>" class="text-green-600 hover:text-green-700 font-semibold transition-colors flex items-center text-sm">
                <?php _e('詳細を見る', 'okitech'); ?>
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
            
            <?php if ($is_available) : ?>
                <span class="text-xs text-green-600 font-medium flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <?php _e('参加可能', 'okitech'); ?>
                </span>
            <?php endif; ?>
        </div>
        
    </div>
</article> 