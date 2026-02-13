<?php
/**
 * 投稿詳細ページテンプレート
 *
 * @package OkiTech
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php while (have_posts()) : the_post(); ?>

        <!-- 記事ヘッダー -->
        <section class="py-20 md:py-28">
            <div class="container mx-auto px-4">
                <div class="max-w-3xl mx-auto text-center">
                    <?php if (has_category()) : ?>
                        <div class="mb-4">
                            <?php
                            $categories = get_the_category();
                            $category = $categories[0];
                            ?>
                            <span class="inline-block px-3 py-1 text-xs font-semibold text-green-600 bg-green-50 rounded-full">
                                <?php echo esc_html($category->name); ?>
                            </span>
                        </div>
                    <?php endif; ?>

                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6 leading-tight">
                        <?php the_title(); ?>
                    </h1>

                    <div class="flex flex-wrap items-center justify-center gap-4 text-sm text-gray-400">
                        <time class="entry-date published" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                            <?php echo esc_html(get_the_date()); ?>
                        </time>
                        <?php if (has_tag()) : ?>
                            <span class="flex items-center gap-1">
                                <?php the_tags('', ', '); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <div class="container mx-auto px-4 pb-24">
            <article id="post-<?php the_ID(); ?>" <?php post_class('max-w-3xl mx-auto'); ?>>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="mb-10">
                        <?php the_post_thumbnail('large', array('class' => 'w-full h-64 md:h-96 object-cover rounded-2xl')); ?>
                    </div>
                <?php endif; ?>

                <!-- 記事コンテンツ -->
                <div class="entry-content prose prose-lg max-w-none">
                    <?php
                    the_content();
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . __('ページ:', 'okitech'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>

                <!-- 記事フッター -->
                <footer class="mt-12 pt-8 border-t border-gray-100">
                    <?php
                    $author_id = get_the_author_meta('ID');
                    if ($author_id) :
                    ?>
                        <div class="flex items-center gap-4 mb-8 p-6 bg-gray-50 rounded-2xl">
                            <div class="flex-shrink-0">
                                <?php echo get_avatar($author_id, 48, '', '', array('class' => 'rounded-full')); ?>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900"><?php the_author(); ?></p>
                                <?php if (get_the_author_meta('description')) : ?>
                                    <p class="text-gray-500 text-sm"><?php echo get_the_author_meta('description'); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- シェアボタン -->
                    <div class="mb-8">
                        <p class="text-sm font-semibold text-gray-400 uppercase tracking-widest mb-4"><?php _e('Share', 'okitech'); ?></p>
                        <div class="flex gap-3">
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>"
                               target="_blank" rel="noopener noreferrer"
                               class="inline-flex items-center justify-center w-10 h-10 bg-gray-100 text-gray-600 rounded-xl hover:bg-gray-200 hover:-translate-y-0.5 transition-all duration-200">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>"
                               target="_blank" rel="noopener noreferrer"
                               class="inline-flex items-center justify-center w-10 h-10 bg-gray-100 text-gray-600 rounded-xl hover:bg-gray-200 hover:-translate-y-0.5 transition-all duration-200">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                            <a href="https://line.me/R/msg/text/?<?php echo urlencode(get_the_title() . ' ' . get_permalink()); ?>"
                               target="_blank" rel="noopener noreferrer"
                               class="inline-flex items-center justify-center w-10 h-10 bg-gray-100 text-gray-600 rounded-xl hover:bg-gray-200 hover:-translate-y-0.5 transition-all duration-200">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 10.314C24 4.943 18.615.572 12 .572S0 4.943 0 10.314c0 4.811 4.27 8.842 10.035 9.608.391.082.923.258 1.058.59.12.301.079.766.038 1.08l-.164 1.02c-.045.301-.24 1.186 1.049.645 1.291-.539 6.916-4.078 9.436-6.975C23.176 14.393 24 12.458 24 10.314"/></svg>
                            </a>
                        </div>
                    </div>
                </footer>

            </article>

            <!-- 投稿ナビゲーション -->
            <nav class="max-w-3xl mx-auto mt-8 pt-8 border-t border-gray-100">
                <div class="flex justify-between text-sm">
                    <div class="nav-previous">
                        <?php previous_post_link('%link', '&larr; %title'); ?>
                    </div>
                    <div class="nav-next text-right">
                        <?php next_post_link('%link', '%title &rarr;'); ?>
                    </div>
                </div>
            </nav>

            <!-- CTAセクション -->
            <?php get_template_part('template-parts/single-cta'); ?>

            <!-- コメント -->
            <?php
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>
        </div>

    <?php endwhile; ?>

</main>

<?php
get_sidebar();
get_footer();