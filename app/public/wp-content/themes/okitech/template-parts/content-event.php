<?php
/**
 * イベントカードコンポーネント
 *
 * @package OkiTech
 *
 * @param array $args {
 *     @type bool $is_featured      おすすめカードとしてハイライトするか (default: false)
 *     @type bool $is_deadline_soon 締切間近バッジを表示するか (default: false)
 * }
 */

$is_featured      = ! empty( $args['is_featured'] );
$is_deadline_soon = ! empty( $args['is_deadline_soon'] );

// カスタムフィールド取得
$event_date     = get_post_meta( get_the_ID(), 'event_date', true );
$event_deadline = get_post_meta( get_the_ID(), 'event_deadline', true );
$event_time     = get_post_meta( get_the_ID(), 'event_time', true );
$event_location = get_post_meta( get_the_ID(), 'event_location', true );
$event_address  = get_post_meta( get_the_ID(), 'event_address', true );
$event_price    = get_post_meta( get_the_ID(), 'event_price', true );

// ステータス判定
$is_available = true;
$status_text  = __( '募集中', 'okitech' );
$status_class = 'bg-green-100 text-green-800';

if ( $event_date && strtotime( $event_date ) < current_time( 'timestamp' ) ) {
    $is_available = false;
    $status_text  = __( '終了', 'okitech' );
    $status_class = 'bg-gray-100 text-gray-800';
}

if ( $event_deadline && strtotime( $event_deadline ) < current_time( 'timestamp' ) ) {
    $is_available = false;
    $status_text  = __( '締切済み', 'okitech' );
    $status_class = 'bg-red-100 text-red-800';
}

// カードのクラス
$card_classes = 'event-card scroll-fade-in';
if ( $is_featured ) {
    $card_classes .= ' event-card-featured';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $card_classes ); ?>>

    <!-- イベント画像 -->
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="event-image relative">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'medium', array( 'class' => 'w-full h-48 object-cover' ) ); ?>
                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 hover:opacity-100 transition-opacity"></div>
            </a>
        </div>
    <?php else : ?>
        <div class="event-image relative">
            <a href="<?php the_permalink(); ?>">
                <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="<?php _e( 'コミュニティイベント', 'okitech' ); ?>" class="w-full h-48 object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 hover:opacity-100 transition-opacity"></div>
            </a>
        </div>
    <?php endif; ?>

    <!-- ステータスバッジ -->
    <div class="absolute top-4 right-4 z-10">
        <span class="<?php echo $status_class; ?> text-xs font-semibold px-3 py-1 rounded-full shadow-sm">
            <?php echo $status_text; ?>
        </span>
    </div>

    <!-- イベント情報 -->
    <div class="p-6">

        <?php if ( $is_deadline_soon ) : ?>
            <span class="deadline-soon-badge mb-2">
                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                <?php _e( 'まもなく締切', 'okitech' ); ?>
            </span>
        <?php endif; ?>

        <h3 class="event-title text-xl font-bold mb-4">
            <a href="<?php the_permalink(); ?>" class="text-gray-800 hover:text-green-600 transition-colors">
                <?php the_title(); ?>
            </a>
        </h3>

        <div class="event-details space-y-3 text-gray-600 mb-6">

            <?php if ( $event_date ) : ?>
                <div class="flex items-center">
                    <div class="bg-orange-100 w-8 h-8 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                        <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <span class="font-medium text-sm"><?php echo esc_html( date_i18n( 'Y年n月j日（D）', strtotime( $event_date ) ) ); ?></span>
                </div>
            <?php endif; ?>

            <?php if ( $event_time ) : ?>
                <div class="flex items-center">
                    <div class="bg-teal-100 w-8 h-8 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                        <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <span class="font-medium text-sm"><?php echo esc_html( $event_time ); ?></span>
                </div>
            <?php endif; ?>

            <?php if ( $event_location ) : ?>
                <div class="flex items-start">
                    <div class="bg-blue-100 w-8 h-8 rounded-full flex items-center justify-center mr-3 flex-shrink-0 mt-0.5">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <span class="font-medium text-sm block"><?php echo esc_html( $event_location ); ?></span>
                        <?php if ( $event_address ) : ?>
                            <a href="https://www.google.com/maps/search/<?php echo urlencode( $event_address ); ?>"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="text-blue-600 hover:text-blue-800 hover:underline transition-colors flex items-center text-xs mt-1">
                                <svg class="w-3 h-3 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                                <span class="truncate"><?php echo esc_html( $event_address ); ?></span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( $event_price ) : ?>
                <div class="flex items-center">
                    <div class="bg-green-100 w-8 h-8 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path></svg>
                    </div>
                    <span class="font-bold text-green-600 text-lg"><?php echo esc_html( $event_price ); ?></span>
                </div>
            <?php endif; ?>

            <?php if ( $event_deadline ) :
                $is_deadline_passed = current_time( 'timestamp' ) > strtotime( $event_deadline );
            ?>
                <div class="flex items-center">
                    <div class="bg-red-100 w-8 h-8 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                        <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <span class="<?php echo $is_deadline_passed ? 'text-red-600' : 'text-orange-600'; ?> font-medium text-sm">
                        <?php echo esc_html( __( '締切: ', 'okitech' ) . date_i18n( 'n/j H:i', strtotime( $event_deadline ) ) ); ?>
                    </span>
                </div>
            <?php endif; ?>

        </div>

        <div class="flex justify-between items-center pt-4 border-t border-gray-100">
            <a href="<?php the_permalink(); ?>" class="text-green-600 hover:text-green-700 font-semibold transition-colors flex items-center text-sm">
                <?php _e( '詳細を見る', 'okitech' ); ?>
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
            <?php if ( $is_available ) : ?>
                <span class="text-xs text-green-600 font-medium flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <?php _e( '参加可能', 'okitech' ); ?>
                </span>
            <?php endif; ?>
        </div>

    </div>
</article>
