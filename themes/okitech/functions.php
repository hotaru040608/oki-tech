<?php
/**
 * OkiTech Theme Functions
 * 
 * @package OkiTech
 */

// セキュリティ対策
if (!defined('ABSPATH')) {
    exit;
}

/**
 * テーマサポート機能の設定
 */
function okitech_theme_setup() {
    // タイトルタグのサポート
    add_theme_support('title-tag');
    
    // アイキャッチ画像のサポート
    add_theme_support('post-thumbnails');
    
    // HTML5マークアップのサポート
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // カスタムロゴのサポート
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // メニューの登録
    register_nav_menus(array(
        'primary' => __('プライマリメニュー', 'okitech'),
        'footer'  => __('フッターメニュー', 'okitech'),
    ));
}
add_action('after_setup_theme', 'okitech_theme_setup');

/**
 * スクリプトとスタイルの読み込み
 */
function okitech_scripts() {
    // メインスタイルシート
    wp_enqueue_style('okitech-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // メインスクリプト
    wp_enqueue_script('okitech-script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'okitech_scripts');

/**
 * イベント投稿タイプの登録
 */
function okitech_register_post_types() {
    // イベント投稿タイプ
    register_post_type('event', array(
        'labels' => array(
            'name'               => __('イベント', 'okitech'),
            'singular_name'      => __('イベント', 'okitech'),
            'add_new'            => __('新規追加', 'okitech'),
            'add_new_item'       => __('新しいイベントを追加', 'okitech'),
            'edit_item'          => __('イベントを編集', 'okitech'),
            'new_item'           => __('新しいイベント', 'okitech'),
            'view_item'          => __('イベントを表示', 'okitech'),
            'search_items'       => __('イベントを検索', 'okitech'),
            'not_found'          => __('イベントが見つかりませんでした', 'okitech'),
            'not_found_in_trash' => __('ゴミ箱にイベントが見つかりませんでした', 'okitech'),
            'archives'           => __('イベント', 'okitech'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-calendar-alt',
        'supports'     => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite'      => array('slug' => 'events'),
        'show_in_rest' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
    ));
}
add_action('init', 'okitech_register_post_types');



/**
 * ページテンプレートの登録
 */
function okitech_add_page_templates($templates) {
    $templates['page-faq.php'] = __('FAQページ', 'okitech');
    return $templates;
}
add_filter('theme_page_templates', 'okitech_add_page_templates');

/**
 * イベント用のカスタムフィールドを追加
 */
function okitech_add_event_meta_boxes() {
    add_meta_box(
        'event_details',
        __('イベント詳細', 'okitech'),
        'okitech_event_meta_box_callback',
        'event',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'okitech_add_event_meta_boxes');

/**
 * イベントメタボックスのコールバック関数
 */
function okitech_event_meta_box_callback($post) {
    wp_nonce_field('okitech_save_event_meta', 'okitech_event_meta_nonce');
    
    $event_date = get_post_meta($post->ID, 'event_date', true);
    $event_time = get_post_meta($post->ID, 'event_time', true);
    $event_type = get_post_meta($post->ID, 'event_type', true);
    $event_location = get_post_meta($post->ID, 'event_location', true);
    $event_address = get_post_meta($post->ID, 'event_address', true);
    $event_online_url = get_post_meta($post->ID, 'event_online_url', true);
    $event_online_tool = get_post_meta($post->ID, 'event_online_tool', true);
    $event_capacity = get_post_meta($post->ID, 'event_capacity', true);
    $event_price = get_post_meta($post->ID, 'event_price', true);
    $event_deadline = get_post_meta($post->ID, 'event_deadline', true);
    
    ?>
    <table class="form-table">
        <tr>
            <th><label for="event_date"><?php _e('開催日', 'okitech'); ?></label></th>
            <td><input type="date" id="event_date" name="event_date" value="<?php echo esc_attr($event_date); ?>" /></td>
        </tr>
        <tr>
            <th><label for="event_time"><?php _e('開催時間', 'okitech'); ?></label></th>
            <td><input type="text" id="event_time" name="event_time" value="<?php echo esc_attr($event_time); ?>" placeholder="例: 19:00-21:00" /></td>
        </tr>
        <tr>
            <th><label for="event_type"><?php _e('開催形式', 'okitech'); ?></label></th>
            <td>
                <select id="event_type" name="event_type">
                    <option value="offline" <?php selected($event_type, 'offline'); ?>><?php _e('オフライン（対面）', 'okitech'); ?></option>
                    <option value="online" <?php selected($event_type, 'online'); ?>><?php _e('オンライン', 'okitech'); ?></option>
                    <option value="hybrid" <?php selected($event_type, 'hybrid'); ?>><?php _e('ハイブリッド（オンライン+オフライン）', 'okitech'); ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="event_location"><?php _e('開催場所', 'okitech'); ?></label></th>
            <td><input type="text" id="event_location" name="event_location" value="<?php echo esc_attr($event_location); ?>" placeholder="例: 沖縄県那覇市国際通り1-1-1" /></td>
        </tr>
        <tr>
            <th><label for="event_address"><?php _e('住所', 'okitech'); ?></label></th>
            <td>
                <textarea id="event_address" name="event_address" rows="3" class="large-text" placeholder="例: 〒900-0001 沖縄県那覇市国際通り1-1-1 ビル名 階数"><?php echo esc_textarea($event_address); ?></textarea>
                <p class="description"><?php _e('Googleマップで正確に表示されるよう、詳細な住所を入力してください', 'okitech'); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="event_online_url"><?php _e('オンライン参加URL', 'okitech'); ?></label></th>
            <td>
                <input type="url" id="event_online_url" name="event_online_url" value="<?php echo esc_attr($event_online_url); ?>" placeholder="例: https://zoom.us/j/..." class="large-text" />
                <p class="description"><?php _e('オンラインまたはハイブリッドイベントの場合に入力してください', 'okitech'); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="event_online_tool"><?php _e('オンライン会議ツール', 'okitech'); ?></label></th>
            <td>
                <select id="event_online_tool" name="event_online_tool">
                    <option value=""><?php _e('選択してください', 'okitech'); ?></option>
                    <option value="zoom" <?php selected($event_online_tool, 'zoom'); ?>>Zoom</option>
                    <option value="teams" <?php selected($event_online_tool, 'teams'); ?>>Microsoft Teams</option>
                    <option value="meet" <?php selected($event_online_tool, 'meet'); ?>>Google Meet</option>
                    <option value="discord" <?php selected($event_online_tool, 'discord'); ?>>Discord</option>
                    <option value="other" <?php selected($event_online_tool, 'other'); ?>><?php _e('その他', 'okitech'); ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="event_capacity"><?php _e('定員', 'okitech'); ?></label></th>
            <td><input type="number" id="event_capacity" name="event_capacity" value="<?php echo esc_attr($event_capacity); ?>" placeholder="例: 50" /></td>
        </tr>
        <tr>
            <th><label for="event_price"><?php _e('参加費', 'okitech'); ?></label></th>
            <td><input type="text" id="event_price" name="event_price" value="<?php echo esc_attr($event_price); ?>" placeholder="例: 無料 または 1,000円" /></td>
        </tr>
        <tr>
            <th><label for="event_deadline"><?php _e('申し込み締切', 'okitech'); ?></label></th>
            <td>
                <input type="datetime-local" id="event_deadline" name="event_deadline" value="<?php echo esc_attr($event_deadline); ?>" />
                <p class="description"><?php _e('申し込みを受け付ける締切日時を設定してください', 'okitech'); ?></p>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * イベントメタデータの保存
 */
function okitech_save_event_meta($post_id) {
    if (!isset($_POST['okitech_event_meta_nonce']) || !wp_verify_nonce($_POST['okitech_event_meta_nonce'], 'okitech_save_event_meta')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    $fields = array('event_date', 'event_time', 'event_type', 'event_location', 'event_address', 'event_online_url', 'event_online_tool', 'event_capacity', 'event_price', 'event_deadline');
    
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'okitech_save_event_meta');

/**
 * ウィジェットエリアの登録
 */
function okitech_widgets_init() {
    register_sidebar(array(
        'name'          => __('サイドバー', 'okitech'),
        'id'            => 'sidebar-1',
        'description'   => __('メインサイドバーウィジェットエリア', 'okitech'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'okitech_widgets_init');

/**
 * 抜粋の長さを調整
 */
function okitech_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'okitech_excerpt_length');

/**
 * 抜粋の末尾を変更
 */
function okitech_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'okitech_excerpt_more');

/**
 * プライマリメニューのフォールバック
 */
function okitech_fallback_menu() {
    echo '<ul id="primary-menu" class="hidden md:flex space-x-8">';
    echo '<li><a href="' . get_post_type_archive_link('event') . '" class="text-gray-800 hover:text-green-600 transition-colors">' . __('イベント', 'okitech') . '</a></li>';
    echo '<li><a href="' . get_permalink(get_option('page_for_posts')) . '" class="text-gray-800 hover:text-green-600 transition-colors">' . __('ブログ', 'okitech') . '</a></li>';
    echo '<li><a href="' . get_permalink(get_page_by_path('about')) . '" class="text-gray-800 hover:text-green-600 transition-colors">' . __('オキテクについて', 'okitech') . '</a></li>';
    echo '<li><a href="' . get_permalink(get_page_by_path('contact')) . '" class="text-gray-800 hover:text-green-600 transition-colors">' . __('お問い合わせ', 'okitech') . '</a></li>';
    echo '</ul>';
}

/**
 * フッターメニューのフォールバック
 */
function okitech_footer_fallback_menu() {
    echo '<ul class="space-y-2">';
    echo '<li><a href="' . get_post_type_archive_link('event') . '" class="text-gray-300 hover:text-white transition-colors">' . __('イベント', 'okitech') . '</a></li>';
    echo '<li><a href="' . get_permalink(get_option('page_for_posts')) . '" class="text-gray-300 hover:text-white transition-colors">' . __('ブログ', 'okitech') . '</a></li>';
    echo '<li><a href="' . get_permalink(get_page_by_path('about')) . '" class="text-gray-300 hover:text-white transition-colors">' . __('オキテクについて', 'okitech') . '</a></li>';
    echo '<li><a href="' . get_permalink(get_page_by_path('contact')) . '" class="text-gray-300 hover:text-white transition-colors">' . __('お問い合わせ', 'okitech') . '</a></li>';
    echo '</ul>';
}

/**
 * カスタムウィジェットクラス
 */

// 最新イベントウィジェット
class OkiTech_Recent_Events_Widget extends WP_Widget {
    
    public function __construct() {
        parent::__construct(
            'okitech_recent_events',
            __('OkiTech - 最新イベント', 'okitech'),
            array('description' => __('最新のイベントを表示します', 'okitech'))
        );
    }
    
    public function widget($args, $instance) {
        echo $args['before_widget'];
        
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        
        $posts_per_page = !empty($instance['posts_per_page']) ? $instance['posts_per_page'] : 5;
        
        $recent_events = new WP_Query(array(
            'post_type' => 'event',
            'posts_per_page' => $posts_per_page,
            'post_status' => 'publish',
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
            )
        ));
        
        if ($recent_events->have_posts()) : ?>
            <ul class="space-y-3">
                <?php while ($recent_events->have_posts()) : $recent_events->the_post(); ?>
                    <li class="border-b border-gray-200 pb-3 last:border-b-0">
                        <a href="<?php the_permalink(); ?>" class="block hover:text-green-600 transition-colors">
                            <h4 class="font-semibold text-sm mb-1"><?php the_title(); ?></h4>
                            <?php 
                            $event_date = get_post_meta(get_the_ID(), 'event_date', true);
                            if ($event_date) : 
                                $formatted_date = date_i18n('n/j（D）', strtotime($event_date));
                            ?>
                                <p class="text-xs text-gray-600"><?php echo esc_html($formatted_date); ?></p>
                            <?php endif; ?>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
            <div class="mt-4">
                <a href="<?php echo get_post_type_archive_link('event'); ?>" class="text-green-600 hover:text-green-700 text-sm font-semibold">
                    <?php _e('すべてのイベント →', 'okitech'); ?>
                </a>
            </div>
        <?php else : ?>
            <p class="text-gray-600 text-sm"><?php _e('現在開催予定のイベントはありません。', 'okitech'); ?></p>
        <?php endif; 
        wp_reset_postdata();
        
        echo $args['after_widget'];
    }
    
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('最新イベント', 'okitech');
        $posts_per_page = !empty($instance['posts_per_page']) ? $instance['posts_per_page'] : 5;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('タイトル:', 'okitech'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('posts_per_page'); ?>"><?php _e('表示件数:', 'okitech'); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id('posts_per_page'); ?>" name="<?php echo $this->get_field_name('posts_per_page'); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($posts_per_page); ?>" size="3">
        </p>
        <?php
    }
    
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['posts_per_page'] = (!empty($new_instance['posts_per_page'])) ? absint($new_instance['posts_per_page']) : 5;
        return $instance;
    }
}

// カスタム検索ウィジェット
class OkiTech_Search_Widget extends WP_Widget {
    
    public function __construct() {
        parent::__construct(
            'okitech_search',
            __('OkiTech - 検索フォーム', 'okitech'),
            array('description' => __('カスタムスタイルの検索フォームを表示します', 'okitech'))
        );
    }
    
    public function widget($args, $instance) {
        echo $args['before_widget'];
        
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        ?>
        <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
            <div class="flex">
                <input type="search" 
                       class="search-field flex-1 px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" 
                       placeholder="<?php _e('キーワードを入力...', 'okitech'); ?>" 
                       value="<?php echo get_search_query(); ?>" 
                       name="s" />
                <button type="submit" 
                        class="search-submit bg-green-600 text-white px-4 py-2 rounded-r-lg hover:bg-green-700 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </div>
        </form>
        <?php
        echo $args['after_widget'];
    }
    
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('検索', 'okitech');
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('タイトル:', 'okitech'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <?php
    }
    
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}

/**
 * カスタムウィジェットの登録
 */
function okitech_register_widgets() {
    register_widget('OkiTech_Recent_Events_Widget');
    register_widget('OkiTech_Search_Widget');
}
add_action('widgets_init', 'okitech_register_widgets');

/**
 * コメント表示用のコールバック関数
 */
function okitech_comment_callback($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    ?>
    <li <?php comment_class('comment-item'); ?> id="comment-<?php comment_ID(); ?>">
        <article class="comment-body bg-white rounded-lg p-6 shadow-sm border border-gray-100">
            
            <!-- コメントヘッダー -->
            <div class="comment-meta flex items-start space-x-4 mb-4">
                <div class="comment-author-avatar">
                    <?php echo get_avatar($comment, $args['avatar_size'], '', '', array('class' => 'rounded-full')); ?>
                </div>
                <div class="comment-author-info flex-1">
                    <div class="comment-author-name font-semibold text-gray-800">
                        <?php comment_author_link(); ?>
                        <?php if ($comment->comment_author_email === get_the_author_meta('email')) : ?>
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full ml-2"><?php _e('投稿者', 'okitech'); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="comment-meta text-sm text-gray-600">
                        <time datetime="<?php comment_time('c'); ?>">
                            <?php printf(__('%1$s %2$s', 'okitech'), get_comment_date(), get_comment_time()); ?>
                        </time>
                        <?php if ('0' == $comment->comment_approved) : ?>
                            <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full ml-2"><?php _e('承認待ち', 'okitech'); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- コメント内容 -->
            <div class="comment-content prose prose-sm max-w-none">
                <?php comment_text(); ?>
            </div>

            <!-- コメントアクション -->
            <div class="comment-actions mt-4 pt-4 border-t border-gray-100">
                <?php
                comment_reply_link(array_merge($args, array(
                    'add_below' => 'div-comment',
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth'],
                    'before'    => '<span class="reply-link">',
                    'after'     => '</span>',
                    'reply_text' => __('返信', 'okitech'),
                    'class'     => 'text-green-600 hover:text-green-700 text-sm font-medium transition-colors'
                )));
                ?>
                
                <?php edit_comment_link(__('編集', 'okitech'), '<span class="edit-link ml-4">', '</span>'); ?>
            </div>

        </article>
    <?php
} 

/**
 * イベント申し込み処理
 */
function okitech_process_event_application() {
    if (!isset($_POST['event_application']) || !wp_verify_nonce($_POST['event_nonce'], 'event_application')) {
        return false;
    }
    
    $name = sanitize_text_field($_POST['applicant_name']);
    $email = sanitize_email($_POST['applicant_email']);
    $message = sanitize_textarea_field($_POST['applicant_message']);
    $event_id = get_the_ID();
    
    if (!$name || !$email || !$event_id) {
        return array('success' => false, 'message' => '必須項目を入力してください。');
    }
    
    // 管理者にメール送信
    $to = get_option('admin_email');
    $subject = 'イベント申し込み: ' . get_the_title($event_id);
    $body = "新しいイベント申し込みがありました。\n\n";
    $body .= "イベント: " . get_the_title($event_id) . "\n";
    $body .= "イベントURL: " . get_permalink($event_id) . "\n";
    $body .= "申込者名: " . $name . "\n";
    $body .= "メールアドレス: " . $email . "\n";

    $body .= "メッセージ: " . $message . "\n";
    $body .= "申込日時: " . current_time('Y-m-d H:i:s') . "\n";
    
    $headers = array('Content-Type: text/plain; charset=UTF-8');
    
    // 申込者にも確認メールを送信
    $user_subject = 'イベント申し込み確認: ' . get_the_title($event_id);
    $user_body = $name . " 様\n\n";
    $user_body .= "イベント「" . get_the_title($event_id) . "」への申し込みを受け付けました。\n\n";
    $user_body .= "【申し込み内容】\n";
    $user_body .= "イベント: " . get_the_title($event_id) . "\n";
    $user_body .= "開催日: " . get_post_meta($event_id, 'event_date', true) . "\n";
    $user_body .= "開催時間: " . get_post_meta($event_id, 'event_time', true) . "\n";
    $user_body .= "開催場所: " . get_post_meta($event_id, 'event_location', true) . "\n\n";
    $user_body .= "詳細については、後日改めてご連絡いたします。\n\n";
    $user_body .= "お問い合わせ: " . get_option('admin_email') . "\n\n";
    $user_body .= "OkiTech";
    
    $user_headers = array('Content-Type: text/plain; charset=UTF-8');
    
    $admin_sent = wp_mail($to, $subject, $body, $headers);
    $user_sent = wp_mail($email, $user_subject, $user_body, $user_headers);
    
    if ($admin_sent && $user_sent) {
        return array('success' => true, 'message' => '申し込みを受け付けました。確認メールをお送りします。');
    } else {
        return array('success' => false, 'message' => '申し込みの送信に失敗しました。もう一度お試しください。');
    }
}

/**
 * イベント申し込みフォームの表示
 */
function okitech_display_event_application_form($event_id = null) {
    if (!$event_id) {
        $event_id = get_the_ID();
    }
    
    $result = okitech_process_event_application();
    
    ob_start();
    ?>
    <div class="bg-white border border-gray-200 rounded-lg p-6 sticky top-8">
        <h3 class="text-xl font-bold text-gray-800 mb-4">イベント申し込み</h3>
        
        <?php if ($result) : ?>
            <div class="<?php echo $result['success'] ? 'bg-green-100 border border-green-400 text-green-700' : 'bg-red-100 border border-red-400 text-red-700'; ?> px-4 py-3 rounded mb-4">
                <?php echo esc_html($result['message']); ?>
            </div>
        <?php endif; ?>
        
        <form method="post" class="space-y-4">
            <?php wp_nonce_field('event_application', 'event_nonce'); ?>
            <input type="hidden" name="event_application" value="1">
            
            <div>
                <label for="applicant_name" class="block text-sm font-medium text-gray-700 mb-1">
                    お名前 <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="applicant_name" 
                       name="applicant_name" 
                       required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            
            <div>
                <label for="applicant_email" class="block text-sm font-medium text-gray-700 mb-1">
                    メールアドレス <span class="text-red-500">*</span>
                </label>
                <input type="email" 
                       id="applicant_email" 
                       name="applicant_email" 
                       required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            

            
            <div>
                <label for="applicant_message" class="block text-sm font-medium text-gray-700 mb-1">
                    メッセージ（任意）
                </label>
                <textarea id="applicant_message" 
                          name="applicant_message" 
                          rows="4"
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                          placeholder="ご質問やご要望がございましたらお書きください"></textarea>
            </div>
            
            <button type="submit" 
                    class="w-full bg-blue-600 text-white py-3 px-4 rounded-md hover:bg-blue-700 transition-colors font-medium">
                申し込む
            </button>
        </form>
        
        <div class="mt-4 text-sm text-gray-600">
            <p>※ 申し込み後、確認メールをお送りします。</p>
            <p>※ 個人情報は適切に管理いたします。</p>
        </div>
    </div>
    <?php
    return ob_get_clean();
} 

/**
 * Contact Form 7でイベント情報を取得するためのカスタムタグ
 */
function okitech_cf7_event_data($atts) {
    $event_id = get_the_ID();
    $event_title = get_the_title($event_id);
    $event_date = get_post_meta($event_id, 'event_date', true);
    $event_time = get_post_meta($event_id, 'event_time', true);
    $event_type = get_post_meta($event_id, 'event_type', true);
    $event_location = get_post_meta($event_id, 'event_location', true);
    $event_online_url = get_post_meta($event_id, 'event_online_url', true);
    $event_online_tool = get_post_meta($event_id, 'event_online_tool', true);
    
    $output = "イベント: " . $event_title . "\n";
    if ($event_date) {
        $output .= "開催日: " . date_i18n('Y年n月j日（D）', strtotime($event_date)) . "\n";
    }
    if ($event_time) {
        $output .= "開催時間: " . $event_time . "\n";
    }
    
    // 開催形式の表示
    if ($event_type) {
        switch ($event_type) {
            case 'online':
                $output .= "開催形式: オンライン\n";
                break;
            case 'hybrid':
                $output .= "開催形式: ハイブリッド（オンライン+オフライン）\n";
                break;
            case 'offline':
                $output .= "開催形式: オフライン（対面）\n";
                break;
        }
    }
    
    // オンライン情報の表示
    if (($event_type === 'online' || $event_type === 'hybrid') && $event_online_url) {
        $output .= "\n【オンライン参加情報】\n";
        if ($event_online_tool) {
            $output .= "会議ツール: " . ucfirst($event_online_tool) . "\n";
        }
        $output .= "参加URL: " . $event_online_url . "\n";
    }
    
    // オフライン情報の表示
    if (($event_type === 'offline' || $event_type === 'hybrid') && $event_location) {
        $output .= "\n【オフライン参加情報】\n";
        $output .= "開催場所: " . $event_location . "\n";
    }
    
    return $output;
}
add_shortcode('event_data', 'okitech_cf7_event_data');

/**
 * Contact Form 7でイベントタイトルを取得
 */
function okitech_cf7_event_title($atts) {
    return get_the_title();
}
add_shortcode('event_title', 'okitech_cf7_event_title');

/**
 * Contact Form 7でイベントURLを取得
 */
function okitech_cf7_event_url($atts) {
    return get_permalink();
}
add_shortcode('event_url', 'okitech_cf7_event_url');

/**
 * Contact Form 7でオンライン参加URLを取得
 */
function okitech_cf7_online_url($atts) {
    $event_online_url = get_post_meta(get_the_ID(), 'event_online_url', true);
    $event_type = get_post_meta(get_the_ID(), 'event_type', true);
    
    if (($event_type === 'online' || $event_type === 'hybrid') && $event_online_url) {
        return $event_online_url;
    }
    return '';
}
add_shortcode('online_url', 'okitech_cf7_online_url');

/**
 * Contact Form 7でオンライン会議ツールを取得
 */
function okitech_cf7_online_tool($atts) {
    $event_online_tool = get_post_meta(get_the_ID(), 'event_online_tool', true);
    $event_type = get_post_meta(get_the_ID(), 'event_type', true);
    
    if (($event_type === 'online' || $event_type === 'hybrid') && $event_online_tool) {
        return ucfirst($event_online_tool);
    }
    return '';
}
add_shortcode('online_tool', 'okitech_cf7_online_tool'); 

/**
 * Contact Form 7で締切時間をチェック
 */
function okitech_cf7_check_deadline($result, $tag) {
    // イベント投稿タイプの場合のみチェック
    if (get_post_type() !== 'event') {
        return $result;
    }
    
    $event_deadline = get_post_meta(get_the_ID(), 'event_deadline', true);
    
    if ($event_deadline) {
        $deadline_timestamp = strtotime($event_deadline);
        $current_timestamp = current_time('timestamp');
        
        if ($current_timestamp > $deadline_timestamp) {
            $result->invalidate('', '申し込み締切日時を過ぎたため、申し込みを受け付けることができません。');
        }
    }
    
    return $result;
}
add_filter('wpcf7_validate', 'okitech_cf7_check_deadline', 10, 2);

/**
 * イベントアーカイブページのタイトルを変更
 */
function okitech_event_archive_title($title) {
    if (is_post_type_archive('event')) {
        return 'イベント一覧';
    }
    return $title;
}
add_filter('get_the_archive_title', 'okitech_event_archive_title');

/**
 * イベントアーカイブページのページタイトルを変更
 */
function okitech_event_archive_page_title($title) {
    if (is_post_type_archive('event')) {
        return 'イベント一覧';
    }
    return $title;
}
add_filter('single_post_title', 'okitech_event_archive_page_title');
// the_titleフィルターを削除して、個別イベントページのタイトルが正しく表示されるようにする

/**
 * イベントアーカイブページのブラウザタイトルを変更
 */
function okitech_event_archive_document_title($title) {
    if (is_post_type_archive('event')) {
        return array(
            'title' => 'イベント一覧',
            'site' => get_bloginfo('name')
        );
    }
    return $title;
}
add_filter('document_title_parts', 'okitech_event_archive_document_title');

/**
 * イベントアーカイブページのメタタイトルを変更
 */
function okitech_event_archive_meta_title($title) {
    if (is_post_type_archive('event')) {
        return 'イベント一覧 - ' . get_bloginfo('name');
    }
    return $title;
}
add_filter('wp_title', 'okitech_event_archive_meta_title');

/**
 * パンくずリストでイベントアーカイブページのタイトルを変更
 */
function okitech_event_archive_breadcrumb_title($title, $post_type) {
    if ($post_type === 'event' && is_post_type_archive('event')) {
        return 'イベント一覧';
    }
    return $title;
}
add_filter('post_type_archive_title', 'okitech_event_archive_breadcrumb_title', 10, 2);

/**
 * Contact Form 7で締切時間を取得
 */
function okitech_cf7_event_deadline($atts) {
    $event_deadline = get_post_meta(get_the_ID(), 'event_deadline', true);
    if ($event_deadline) {
        return date_i18n('Y年n月j日 H:i', strtotime($event_deadline));
    }
    return '';
}
add_shortcode('event_deadline', 'okitech_cf7_event_deadline'); 

/**
 * イベントアーカイブページのクエリを設定
 */
function okitech_event_archive_query($query) {
    // メインクエリかつイベントアーカイブページの場合
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('event')) {
        // イベント投稿タイプを明示的に指定
        $query->set('post_type', 'event');
        $query->set('post_status', 'publish');
        
        // 開催日順でソート（開催日が設定されている場合）
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value');
        $query->set('order', 'ASC');
        
        // 1ページあたりの表示件数
        $query->set('posts_per_page', 12);
    }
}
add_action('pre_get_posts', 'okitech_event_archive_query'); 

/**
 * カスタムロゴの設定を強化
 */
function okitech_custom_logo_setup() {
    add_theme_support('custom-logo', array(
        'height'      => 120,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'unlink-homepage-logo' => false,
    ));
}
add_action('after_setup_theme', 'okitech_custom_logo_setup');

/**
 * カスタムロゴのHTMLをカスタマイズ
 */
function okitech_custom_logo_html($html, $blog_id) {
    // ヒーローセクションでは白いロゴを使用
    if (is_front_page() && is_home()) {
        $html = str_replace('class="custom-logo"', 'class="custom-logo hero-logo-img"', $html);
    }
    
    return $html;
}
add_filter('get_custom_logo', 'okitech_custom_logo_html', 10, 2); 