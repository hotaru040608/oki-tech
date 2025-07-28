<?php
/**
 * ブログ投稿カードコンポーネント
 *
 * @package OkiTech
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow'); ?>>
    
    <!-- 投稿画像 -->
    <?php if (has_post_thumbnail()) : ?>
        <div class="post-image">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium', array('class' => 'w-full h-48 object-cover')); ?>
            </a>
        </div>
    <?php else : ?>
        <div class="post-image bg-gradient-to-br from-blue-50 to-green-50 h-48 flex items-center justify-center">
            <div class="text-center">
                <svg class="w-16 h-16 text-blue-500 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                </svg>
                <p class="text-sm text-gray-600 font-medium">技術ブログ</p>
            </div>
        </div>
    <?php endif; ?>
    
    <!-- 投稿情報 -->
    <div class="p-6">
        
        <!-- 投稿タイトル -->
        <h3 class="post-title text-xl font-bold mb-3">
            <a href="<?php the_permalink(); ?>" class="text-gray-800 hover:text-green-600 transition-colors">
                <?php the_title(); ?>
            </a>
        </h3>
        
        <!-- 投稿日 -->
        <div class="post-date text-sm text-gray-600 mb-4">
            <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                <?php echo esc_html(get_the_date('Y.n.j')); ?>
            </time>
        </div>
        
        <!-- 投稿抜粋 -->
        <div class="post-excerpt text-gray-700 mb-4">
            <?php the_excerpt(); ?>
        </div>
        
        <!-- 続きを読む -->
        <a href="<?php the_permalink(); ?>" class="text-green-600 hover:text-green-700 font-semibold transition-colors">
            <?php _e('続きを読む', 'okitech'); ?> →
        </a>
        
    </div>
</article> 