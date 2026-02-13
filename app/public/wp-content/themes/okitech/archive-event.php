<?php
/**
 * イベントアーカイブページテンプレート（リッチデザイン版）
 *
 * @package OkiTech
 */

get_header();

// 統計情報の取得
$total_events = wp_count_posts('event')->publish;
$upcoming_query = new WP_Query(array(
    'post_type'      => 'event',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'meta_key'       => 'event_date',
    'meta_query'     => array(
        array(
            'key'     => 'event_date',
            'value'   => date('Y-m-d'),
            'compare' => '>=',
            'type'    => 'DATE'
        )
    ),
    'fields' => 'ids'
));
$upcoming_count = $upcoming_query->found_posts;
wp_reset_postdata();
?>

<main id="primary" class="site-main">

    <!-- ヒーローセクション -->
    <section class="relative overflow-hidden bg-gradient-to-br from-green-50 via-white to-teal-50 py-20 md:py-32">
        <!-- 装飾ブロブ -->
        <div class="absolute top-0 left-0 w-72 h-72 bg-green-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
        <div class="absolute top-0 right-0 w-72 h-72 bg-teal-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-0 left-1/2 w-72 h-72 bg-orange-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl mx-auto text-center scroll-fade-in">
                <!-- ラベル -->
                <div class="inline-flex items-center gap-2 bg-green-100 text-green-700 font-semibold text-xs tracking-widest uppercase px-4 py-2 rounded-full mb-6">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <?php _e('Events', 'okitech'); ?>
                </div>

                <!-- タイトル -->
                <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                    <?php _e('イベント一覧', 'okitech'); ?>
                </h1>
                <p class="text-lg md:text-xl text-gray-500 leading-relaxed mb-10">
                    <?php _e('勉強会、交流会、ワークショップなど、<br class="hidden md:inline">様々なイベントを開催しています。', 'okitech'); ?>
                </p>

                <!-- 統計カウンター -->
                <div class="grid grid-cols-3 gap-4 max-w-lg mx-auto">
                    <div class="bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm rounded-2xl p-4 shadow-sm border border-gray-100">
                        <span class="block text-2xl md:text-3xl font-bold text-green-600" data-count="<?php echo esc_attr($total_events); ?>" data-suffix="">0</span>
                        <span class="block text-xs text-gray-400 mt-1"><?php _e('累計開催', 'okitech'); ?></span>
                    </div>
                    <div class="bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm rounded-2xl p-4 shadow-sm border border-gray-100">
                        <span class="block text-2xl md:text-3xl font-bold text-orange-500" data-count="<?php echo esc_attr($upcoming_count); ?>" data-suffix="">0</span>
                        <span class="block text-xs text-gray-400 mt-1"><?php _e('開催予定', 'okitech'); ?></span>
                    </div>
                    <div class="bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm rounded-2xl p-4 shadow-sm border border-gray-100">
                        <span class="block text-2xl md:text-3xl font-bold text-teal-600"><?php _e('無料', 'okitech'); ?></span>
                        <span class="block text-xs text-gray-400 mt-1"><?php _e('参加多数', 'okitech'); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- 波形装飾 -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
                <path d="M0 60V30C240 0 480 0 720 30C960 60 1200 60 1440 30V60H0Z" fill="white"/>
            </svg>
        </div>
    </section>

    <div class="container mx-auto px-4 pb-24">

        <!-- フィルターセクション -->
        <div class="max-w-5xl mx-auto -mt-6 mb-12 relative z-20 scroll-fade-in">
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 md:p-8">
                <div class="flex items-center gap-3 mb-6">
                    <div class="bg-green-100 w-10 h-10 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                        </svg>
                    </div>
                    <h2 class="text-lg font-bold text-gray-800"><?php _e('イベントを探す', 'okitech'); ?></h2>
                </div>

                <div class="grid md:grid-cols-3 gap-4">
                    <div>
                        <label for="event-search" class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2"><?php _e('検索', 'okitech'); ?></label>
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <input type="text" id="event-search" placeholder="<?php esc_attr_e('イベント名で検索...', 'okitech'); ?>"
                                   class="w-full pl-10 pr-3 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200">
                        </div>
                    </div>

                    <div>
                        <label for="event-month" class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2"><?php _e('開催月', 'okitech'); ?></label>
                        <select id="event-month" class="w-full px-3 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200">
                            <option value=""><?php _e('すべての月', 'okitech'); ?></option>
                            <?php
                            for ($month = 1; $month <= 12; $month++) {
                                $month_name = date_i18n('n月', mktime(0, 0, 0, $month, 1));
                                echo '<option value="' . $month . '">' . $month_name . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div>
                        <label for="event-price" class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2"><?php _e('参加費', 'okitech'); ?></label>
                        <select id="event-price" class="w-full px-3 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200">
                            <option value=""><?php _e('すべて', 'okitech'); ?></option>
                            <option value="無料"><?php _e('無料', 'okitech'); ?></option>
                            <option value="有料"><?php _e('有料', 'okitech'); ?></option>
                        </select>
                    </div>
                </div>

                <div class="mt-4 flex items-center justify-between">
                    <p class="text-sm text-gray-400">
                        <span id="event-count">0</span><?php _e('件のイベント', 'okitech'); ?>
                    </p>
                    <button id="reset-filters" class="inline-flex items-center gap-1 text-xs text-gray-400 hover:text-gray-600 transition-colors">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        <?php _e('リセット', 'okitech'); ?>
                    </button>
                </div>
            </div>
        </div>

        <?php
        // 今後のイベント取得
        $events_query = new WP_Query(array(
            'post_type'      => 'event',
            'post_status'    => 'publish',
            'posts_per_page' => 12,
            'meta_key'       => 'event_date',
            'orderby'        => 'meta_value',
            'order'          => 'ASC',
            'meta_query'     => array(
                array(
                    'key'     => 'event_date',
                    'value'   => date('Y-m-d'),
                    'compare' => '>=',
                    'type'    => 'DATE'
                )
            ),
            'paged' => get_query_var('paged') ? get_query_var('paged') : 1
        ));

        if ($events_query->have_posts()) : ?>

            <!-- ビュー切り替え -->
            <div class="max-w-5xl mx-auto mb-8 flex items-center justify-between scroll-fade-in">
                <div class="flex items-center gap-3">
                    <h2 class="text-xl font-bold text-gray-800"><?php _e('開催予定のイベント', 'okitech'); ?></h2>
                    <span class="bg-green-100 text-green-700 text-xs font-bold px-2.5 py-1 rounded-full"><?php echo $events_query->found_posts; ?><?php _e('件', 'okitech'); ?></span>
                </div>
                <div class="flex items-center gap-2">
                    <button id="grid-view" class="p-2.5 rounded-xl bg-green-50 text-green-600 transition-all duration-200 hover:bg-green-100">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M3 3h7v7H3V3zm0 11h7v7H3v-7zm11-11h7v7h-7V3zm0 11h7v7h-7v-7z"/></svg>
                    </button>
                    <button id="list-view" class="p-2.5 rounded-xl text-gray-400 hover:bg-gray-100 transition-all duration-200">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M3 13h2v-2H3v2zm0 4h2v-2H3v2zm0-8h2V7H3v2zm4 4h14v-2H7v2zm0 4h14v-2H7v2zM7 7v2h14V7H7z"/></svg>
                    </button>
                </div>
            </div>

            <!-- イベントグリッド -->
            <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 scroll-stagger" id="events-grid">
                <?php
                while ($events_query->have_posts()) : $events_query->the_post();
                    get_template_part('template-parts/content', 'event');
                endwhile;
                ?>
            </div>

            <!-- ページネーション -->
            <?php if ($events_query->max_num_pages > 1) :
                $big = 999999999;
            ?>
            <div class="max-w-5xl mx-auto mt-16 scroll-fade-in">
                <div class="flex justify-center">
                    <?php
                    echo paginate_links(array(
                        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format'    => '?paged=%#%',
                        'current'   => max(1, get_query_var('paged')),
                        'total'     => $events_query->max_num_pages,
                        'prev_text' => __('&larr; 前のページ', 'okitech'),
                        'next_text' => __('次のページ &rarr;', 'okitech'),
                        'type'      => 'list',
                        'class'     => 'pagination'
                    ));
                    ?>
                </div>
            </div>
            <?php endif; ?>

            <?php wp_reset_postdata(); ?>

        <?php else : ?>

            <!-- イベントなしの表示 -->
            <div class="max-w-2xl mx-auto text-center py-20 scroll-fade-in">
                <div class="bg-gradient-to-br from-green-50 to-teal-50 rounded-3xl p-12 md:p-16 border border-green-100">
                    <!-- イラスト風アイコン -->
                    <div class="relative w-32 h-32 mx-auto mb-8">
                        <div class="absolute inset-0 bg-green-100 rounded-full animate-blob opacity-50"></div>
                        <div class="relative z-10 w-full h-full flex items-center justify-center">
                            <svg class="w-16 h-16 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>

                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">
                        <?php _e('現在開催予定のイベントはありません', 'okitech'); ?>
                    </h2>
                    <p class="text-gray-500 mb-10 leading-relaxed">
                        <?php _e('新しいイベントの情報は随時更新いたします。<br class="hidden md:inline">Discordコミュニティに参加して最新情報をお受け取りください。', 'okitech'); ?>
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center justify-center bg-green-600 hover:bg-green-700 text-white font-semibold px-8 py-4 rounded-xl transition-all duration-200 hover:shadow-lg hover:-translate-y-0.5">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            <?php _e('ホームに戻る', 'okitech'); ?>
                        </a>
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="inline-flex items-center justify-center border-2 border-gray-200 text-gray-600 hover:border-green-300 hover:text-green-700 font-semibold px-8 py-4 rounded-xl transition-all duration-200 hover:-translate-y-0.5">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <?php _e('お問い合わせ', 'okitech'); ?>
                        </a>
                    </div>
                </div>
            </div>

        <?php endif; ?>

        <!-- 過去のイベント -->
        <?php
        $past_events_query = new WP_Query(array(
            'post_type'      => 'event',
            'post_status'    => 'publish',
            'posts_per_page' => 6,
            'meta_key'       => 'event_date',
            'orderby'        => 'meta_value',
            'order'          => 'DESC',
            'meta_query'     => array(
                array(
                    'key'     => 'event_date',
                    'value'   => date('Y-m-d'),
                    'compare' => '<',
                    'type'    => 'DATE'
                )
            )
        ));

        if ($past_events_query->have_posts()) : ?>
        <div class="max-w-5xl mx-auto mt-20 scroll-fade-in">
            <div class="border-t border-gray-200 pt-16">
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center gap-3">
                        <div class="bg-gray-100 w-10 h-10 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-800"><?php _e('過去のイベント', 'okitech'); ?></h2>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 scroll-stagger" id="past-events-grid">
                    <?php
                    while ($past_events_query->have_posts()) : $past_events_query->the_post();
                        get_template_part('template-parts/content', 'event');
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </div>

    <!-- CTA セクション -->
    <section class="bg-gray-900 text-white py-16 md:py-24 scroll-fade-in">
        <div class="container mx-auto px-4 text-center">
            <div class="max-w-2xl mx-auto">
                <p class="text-green-400 font-semibold text-sm tracking-widest uppercase mb-4"><?php _e('Join Us', 'okitech'); ?></p>
                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    <?php _e('一緒に学び、つながろう。', 'okitech'); ?>
                </h2>
                <p class="text-gray-400 text-lg mb-10 leading-relaxed">
                    <?php _e('知識ゼロでOK。一人でもOK。<br class="hidden md:inline">Discordで最新イベント情報をお届けします。', 'okitech'); ?>
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="https://discord.gg/KDBynzKzUA" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center bg-green-600 hover:bg-green-700 text-white font-semibold text-lg px-8 py-4 rounded-xl transition-all duration-200 hover:shadow-lg hover:-translate-y-0.5">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M20.317 4.37a19.791 19.791 0 00-4.885-1.515.074.074 0 00-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 00-5.487 0 12.64 12.64 0 00-.617-1.25.077.077 0 00-.079-.037A19.736 19.736 0 003.677 4.37a.07.07 0 00-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 00.031.057 19.9 19.9 0 005.993 3.03.078.078 0 00.084-.028c.462-.63.874-1.295 1.226-1.994a.076.076 0 00-.041-.106 13.107 13.107 0 01-1.872-.892.077.077 0 01-.008-.128 10.2 10.2 0 00.372-.292.074.074 0 01.077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 01.078.01c.12.098.246.198.373.292a.077.077 0 01-.006.127 12.299 12.299 0 01-1.873.892.077.077 0 00-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 00.084.028 19.839 19.839 0 006.002-3.03.077.077 0 00.032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 00-.031-.03z"/></svg>
                        <?php _e('Discordに参加する', 'okitech'); ?>
                    </a>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="inline-flex items-center justify-center border-2 border-gray-600 text-gray-300 hover:border-gray-400 hover:text-white font-semibold text-lg px-8 py-4 rounded-xl transition-all duration-200 hover:-translate-y-0.5">
                        <?php _e('お問い合わせ', 'okitech'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<!-- フィルター用JavaScript -->
<script>
jQuery(document).ready(function($) {
    // 初期カウント設定
    var totalVisible = $('.event-card:visible').length;
    $('#event-count').text(totalVisible);

    // フィルター処理
    $('#event-search').on('input', function() { filterEvents(); });
    $('#event-month').on('change', function() { filterEvents(); });
    $('#event-price').on('change', function() { filterEvents(); });

    $('#reset-filters').on('click', function() {
        $('#event-search').val('');
        $('#event-month').val('');
        $('#event-price').val('');
        filterEvents();
    });

    // ビュー切り替え
    $('#grid-view').on('click', function() {
        $('#events-grid').removeClass('list-view space-y-4').addClass('grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6');
        $(this).addClass('bg-green-50 text-green-600').removeClass('text-gray-400');
        $('#list-view').removeClass('bg-green-50 text-green-600').addClass('text-gray-400');
    });

    $('#list-view').on('click', function() {
        $('#events-grid').removeClass('grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6').addClass('list-view space-y-4');
        $(this).addClass('bg-green-50 text-green-600').removeClass('text-gray-400');
        $('#grid-view').removeClass('bg-green-50 text-green-600').addClass('text-gray-400');
    });

    function filterEvents() {
        var searchTerm = $('#event-search').val().toLowerCase();
        var selectedMonth = $('#event-month').val();
        var selectedPrice = $('#event-price').val();
        var visibleCount = 0;

        $('#events-grid .event-card').each(function() {
            var $card = $(this);
            var title = $card.find('.event-title').text().toLowerCase();
            var dateText = $card.find('.event-details').text();
            var priceText = $card.find('.event-details').text();
            var showCard = true;

            if (searchTerm && !title.includes(searchTerm)) showCard = false;
            if (selectedMonth && dateText) {
                var monthMatch = dateText.match(/(\d+)月/);
                if (monthMatch && parseInt(monthMatch[1]) !== parseInt(selectedMonth)) showCard = false;
            }
            if (selectedPrice && priceText) {
                if (selectedPrice === '無料' && !priceText.includes('無料')) showCard = false;
                else if (selectedPrice === '有料' && priceText.includes('無料')) showCard = false;
            }

            if (showCard) { $card.show(); visibleCount++; } else { $card.hide(); }
        });

        $('#event-count').text(visibleCount);
        if (visibleCount === 0) {
            if ($('#no-results').length === 0) {
                $('#events-grid').after('<div id="no-results" class="text-center py-16"><div class="bg-gray-50 rounded-2xl p-10 inline-block"><svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg><p class="text-gray-400 font-medium"><?php _e('条件に一致するイベントが見つかりませんでした。', 'okitech'); ?></p></div></div>');
            }
        } else { $('#no-results').remove(); }
    }
});
</script>

<?php
get_sidebar();
get_footer();
?>
