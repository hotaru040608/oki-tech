<?php
/**
 * ブログ投稿カードコンポーネント
 *
 * @package OkiTech
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 scroll-fade-in'); ?>>

    <!-- 投稿画像 -->
    <?php if (has_post_thumbnail()) : ?>
        <div class="post-image">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium', array('class' => 'w-full h-48 object-cover')); ?>
            </a>
        </div>
    <?php else : ?>
        <div class="post-image bg-gray-50 h-48 flex items-center justify-center">
            <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
            </svg>
        </div>
    <?php endif; ?>

    <!-- 投稿情報 -->
    <div class="p-6">
        <h3 class="post-title text-lg font-bold mb-2">
            <a href="<?php the_permalink(); ?>" class="text-gray-900 hover:text-green-600 transition-colors">
                <?php the_title(); ?>
            </a>
        </h3>

        <div class="post-date text-xs text-gray-400 mb-3">
            <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                <?php echo esc_html(get_the_date('Y.n.j')); ?>
            </time>
        </div>

        <div class="post-excerpt text-gray-500 text-sm leading-relaxed mb-4">
            <?php the_excerpt(); ?>
        </div>

        <a href="<?php the_permalink(); ?>" class="text-green-600 hover:text-green-700 font-semibold text-sm transition-colors">
            <?php _e('続きを読む', 'okitech'); ?> &rarr;
        </a>
    </div>
</article>