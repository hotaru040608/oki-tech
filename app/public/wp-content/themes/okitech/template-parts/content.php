<?php
/**
 * デフォルトコンテンツテンプレート
 *
 * @package OkiTech
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('rich-card scroll-fade-in'); ?>>

    <!-- 投稿サムネイル -->
    <?php if (has_post_thumbnail()) : ?>
        <div class="entry-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('large', array('class' => 'w-full h-48 object-cover')); ?>
            </a>
        </div>
    <?php else : ?>
        <div class="entry-thumbnail bg-gray-50 h-48 flex items-center justify-center">
            <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
            </svg>
        </div>
    <?php endif; ?>

    <!-- 投稿コンテンツ -->
    <div class="p-6">
        <?php if (has_category()) : ?>
            <div class="mb-3">
                <?php $category = get_the_category()[0]; ?>
                <span class="inline-block px-3 py-1 text-xs font-semibold text-green-600 bg-green-50 rounded-full">
                    <?php echo esc_html($category->name); ?>
                </span>
            </div>
        <?php endif; ?>

        <?php the_title('<h2 class="entry-title text-lg font-bold mb-2"><a href="' . esc_url(get_permalink()) . '" rel="bookmark" class="text-gray-900 hover:text-green-600 transition-colors">', '</a></h2>'); ?>

        <?php if ('post' === get_post_type()) : ?>
            <div class="text-xs text-gray-400 mb-3">
                <time class="entry-date published" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                    <?php echo esc_html(get_the_date()); ?>
                </time>
            </div>
        <?php endif; ?>

        <?php if (!is_singular()) : ?>
            <div class="entry-content text-gray-500 text-sm leading-relaxed mb-4">
                <?php the_excerpt(); ?>
            </div>
            <a href="<?php the_permalink(); ?>" class="text-green-600 hover:text-green-700 font-semibold text-sm">
                <?php _e('続きを読む', 'okitech'); ?> &rarr;
            </a>
        <?php else : ?>
            <div class="entry-content prose prose-lg max-w-none">
                <?php the_content(); ?>
            </div>
        <?php endif; ?>
    </div>

</article>
