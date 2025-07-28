<?php
/**
 * デフォルトコンテンツテンプレート
 *
 * @package OkiTech
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-lg shadow-md overflow-hidden mb-8'); ?>>
    
    <!-- 投稿ヘッダー -->
    <header class="entry-header p-6">
        <?php the_title('<h2 class="entry-title text-2xl font-bold mb-2"><a href="' . esc_url(get_permalink()) . '" rel="bookmark" class="text-gray-800 hover:text-green-600 transition-colors">', '</a></h2>'); ?>
        
        <?php if ('post' === get_post_type()) : ?>
            <div class="entry-meta text-sm text-gray-600">
                <span class="posted-on">
                    <?php _e('投稿日:', 'okitech'); ?>
                    <time class="entry-date published" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                        <?php echo esc_html(get_the_date()); ?>
                    </time>
                </span>
                
                <?php if (has_category()) : ?>
                    <span class="cat-links ml-4">
                        <?php _e('カテゴリー:', 'okitech'); ?>
                        <?php the_category(', '); ?>
                    </span>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </header>

    <!-- 投稿サムネイル -->
    <?php if (has_post_thumbnail()) : ?>
        <div class="entry-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('large', array('class' => 'w-full h-64 object-cover')); ?>
            </a>
        </div>
    <?php else : ?>
        <div class="entry-thumbnail bg-gradient-to-br from-gray-50 to-green-50 h-64 flex items-center justify-center">
            <div class="text-center">
                <svg class="w-20 h-20 text-green-500 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
                <p class="text-gray-600 font-medium"><?php _e('記事', 'okitech'); ?></p>
            </div>
        </div>
    <?php endif; ?>

    <!-- 投稿コンテンツ -->
    <div class="entry-content p-6">
        <?php
        if (is_singular()) {
            the_content();
            
            wp_link_pages(array(
                'before' => '<div class="page-links">' . __('ページ:', 'okitech'),
                'after'  => '</div>',
            ));
        } else {
            the_excerpt();
        }
        ?>
    </div>

    <!-- 投稿フッター -->
    <footer class="entry-footer p-6 pt-0">
        <?php if (!is_singular()) : ?>
            <a href="<?php the_permalink(); ?>" class="text-green-600 hover:text-green-700 font-semibold">
                <?php _e('続きを読む', 'okitech'); ?> →
            </a>
        <?php endif; ?>
    </footer>
    
</article> 