<?php
/**
 * イベントアーカイブページテンプレート
 *
 * @package OkiTech
 */

get_header();
?>

<main id="primary" class="site-main bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        
        <!-- ページヘッダー -->
        <header class="page-header mb-8 text-center bg-white rounded-xl shadow-sm p-8">
            <h1 class="page-title text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                <?php _e('イベント一覧', 'okitech'); ?>
            </h1>
            <p class="text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed">
                沖縄の地域コミュニティ型イベントを開催しています。<br>
                技術交流、勉強会、ワークショップなど、様々なイベントにご参加ください。
            </p>
            
            <!-- イベント統計 -->
            <div class="mt-8 flex flex-wrap justify-center gap-6 text-sm">
                <div class="flex items-center bg-green-50 px-4 py-2 rounded-full">
                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span class="font-medium">開催予定: <span class="font-bold text-green-600"><?php echo count(get_posts(array('post_type' => 'event', 'meta_query' => array(array('key' => 'event_date', 'value' => date('Y-m-d'), 'compare' => '>=', 'type' => 'DATE'))))); ?>件</span></span>
                </div>
                <div class="flex items-center bg-blue-50 px-4 py-2 rounded-full">
                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                    <span class="font-medium">無料イベント: <span class="font-bold text-blue-600"><?php echo count(get_posts(array('post_type' => 'event', 'meta_query' => array(array('key' => 'event_price', 'value' => '無料', 'compare' => '='))))); ?>件</span></span>
                </div>
            </div>
        </header>

        <!-- フィルター・検索セクション -->
        <div class="mb-8 bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z"></path>
                </svg>
                イベントを絞り込む
            </h3>
            <div class="grid md:grid-cols-3 gap-4">
                <!-- 検索 -->
                <div>
                    <label for="event-search" class="block text-sm font-medium text-gray-700 mb-2">イベントを検索</label>
                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input type="text" id="event-search" placeholder="イベント名で検索..." 
                               class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                </div>
                
                <!-- 開催月フィルター -->
                <div>
                    <label for="event-month" class="block text-sm font-medium text-gray-700 mb-2">開催月</label>
                    <select id="event-month" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <option value="">すべての月</option>
                        <?php
                        $current_year = date('Y');
                        for ($month = 1; $month <= 12; $month++) {
                            $month_name = date_i18n('n月', mktime(0, 0, 0, $month, 1));
                            echo '<option value="' . $month . '">' . $month_name . '</option>';
                        }
                        ?>
                    </select>
                </div>
                
                <!-- 参加費フィルター -->
                <div>
                    <label for="event-price" class="block text-sm font-medium text-gray-700 mb-2">参加費</label>
                    <select id="event-price" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <option value="">すべて</option>
                        <option value="無料">無料</option>
                        <option value="有料">有料</option>
                    </select>
                </div>
            </div>
            
            <!-- フィルターリセット -->
            <div class="mt-4 flex justify-end">
                <button id="reset-filters" class="text-sm text-gray-500 hover:text-gray-700 transition-colors flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    フィルターをリセット
                </button>
            </div>
        </div>

        <?php 
        // イベントを取得
        $events_query = new WP_Query(array(
            'post_type' => 'event',
            'post_status' => 'publish',
            'posts_per_page' => 12,
            'meta_key' => 'event_date',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'event_date',
                    'value' => date('Y-m-d'),
                    'compare' => '>=',
                    'type' => 'DATE'
                )
            ),
            'paged' => get_query_var('paged') ? get_query_var('paged') : 1
        ));
        
        if ($events_query->have_posts()) : ?>
            
            <!-- 結果表示 -->
            <div class="mb-6 flex items-center justify-between">
                <div class="text-sm text-gray-600">
                    <span id="event-count"><?php echo $events_query->found_posts; ?></span>件のイベントが見つかりました
                </div>
                <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-600">表示:</span>
                    <button id="grid-view" class="p-2 rounded-lg bg-green-100 text-green-600">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M3 3h7v7H3V3zm0 11h7v7H3v-7zm11-11h7v7h-7V3zm0 11h7v7h-7v-7z"/>
                        </svg>
                    </button>
                    <button id="list-view" class="p-2 rounded-lg text-gray-400 hover:text-gray-600">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M3 13h2v-2H3v2zm0 4h2v-2H3v2zm0-8h2V7H3v2zm4 4h14v-2H7v2zm0 4h14v-2H7v2zM7 7v2h14V7H7z"/>
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- イベント一覧 -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="events-grid">
                <?php
                /* イベントループ開始 */
                while ($events_query->have_posts()) : $events_query->the_post();
                    
                    /*
                     * イベントコンテンツのテンプレートパーツを読み込み
                     */
                    get_template_part('template-parts/content', 'event');
                    
                endwhile;
                ?>
            </div>

            <?php
            /* ページネーション */
            $big = 999999999;
            echo '<div class="mt-8 flex justify-center">';
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $events_query->max_num_pages,
                'prev_text' => __('← 前のページ', 'okitech'),
                'next_text' => __('次のページ →', 'okitech'),
                'type' => 'list',
                'class' => 'pagination'
            ));
            echo '</div>';
            
            wp_reset_postdata();

        else :
            /*
             * イベントが見つからない場合
             */
            ?>
            <div class="text-center py-16 bg-white rounded-xl shadow-sm">
                <div class="mb-6">
                    <svg class="w-24 h-24 text-gray-400 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 mb-4">
                    <?php _e('現在開催予定のイベントはありません', 'okitech'); ?>
                </h2>
                <p class="text-gray-600 mb-8 max-w-md mx-auto">
                    <?php _e('新しいイベントの情報は随時更新いたします。お気軽にお問い合わせください。', 'okitech'); ?>
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-block bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors">
                        <?php _e('ホームに戻る', 'okitech'); ?>
                    </a>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                        <?php _e('お問い合わせ', 'okitech'); ?>
                    </a>
                </div>
            </div>
        <?php endif; ?>
        
    </div>
</main>

<!-- フィルター用JavaScript -->
<script>
jQuery(document).ready(function($) {
    // 検索機能
    $('#event-search').on('input', function() {
        filterEvents();
    });
    
    // 月フィルター
    $('#event-month').on('change', function() {
        filterEvents();
    });
    
    // 参加費フィルター
    $('#event-price').on('change', function() {
        filterEvents();
    });
    
    // フィルターリセット
    $('#reset-filters').on('click', function() {
        $('#event-search').val('');
        $('#event-month').val('');
        $('#event-price').val('');
        filterEvents();
    });
    
    // ビュー切り替え
    $('#grid-view').on('click', function() {
        $('#events-grid').removeClass('list-view').addClass('grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6');
        $('#grid-view').addClass('bg-green-100 text-green-600').removeClass('text-gray-400');
        $('#list-view').removeClass('bg-green-100 text-green-600').addClass('text-gray-400');
    });
    
    $('#list-view').on('click', function() {
        $('#events-grid').removeClass('grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6').addClass('list-view space-y-4');
        $('#list-view').addClass('bg-green-100 text-green-600').removeClass('text-gray-400');
        $('#grid-view').removeClass('bg-green-100 text-green-600').addClass('text-gray-400');
    });
    
    function filterEvents() {
        var searchTerm = $('#event-search').val().toLowerCase();
        var selectedMonth = $('#event-month').val();
        var selectedPrice = $('#event-price').val();
        var visibleCount = 0;
        
        $('.event-card').each(function() {
            var $card = $(this);
            var title = $card.find('.event-title').text().toLowerCase();
            var dateText = $card.find('.event-details').text();
            var priceText = $card.find('.event-details').text();
            
            var showCard = true;
            
            // 検索フィルター
            if (searchTerm && !title.includes(searchTerm)) {
                showCard = false;
            }
            
            // 月フィルター
            if (selectedMonth && dateText) {
                var monthMatch = dateText.match(/(\d+)月/);
                if (monthMatch && parseInt(monthMatch[1]) !== parseInt(selectedMonth)) {
                    showCard = false;
                }
            }
            
            // 参加費フィルター
            if (selectedPrice && priceText) {
                if (selectedPrice === '無料' && !priceText.includes('無料')) {
                    showCard = false;
                } else if (selectedPrice === '有料' && priceText.includes('無料')) {
                    showCard = false;
                }
            }
            
            if (showCard) {
                $card.show();
                visibleCount++;
            } else {
                $card.hide();
            }
        });
        
        // 結果数を更新
        $('#event-count').text(visibleCount);
        
        // 結果がない場合のメッセージ
        if (visibleCount === 0) {
            if ($('#no-results').length === 0) {
                $('#events-grid').after('<div id="no-results" class="text-center py-12 text-gray-500">条件に一致するイベントが見つかりませんでした。</div>');
            }
        } else {
            $('#no-results').remove();
        }
    }
});
</script>

<?php
get_sidebar();
get_footer(); 
?> 