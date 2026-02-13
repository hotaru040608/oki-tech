<?php
/**
 * イベント詳細ページテンプレート
 *
 * @package OkiTech
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php while (have_posts()) : the_post(); ?>

        <!-- パンくずリスト -->
        <div class="container mx-auto px-4 pt-8">
            <nav class="mb-6" aria-label="パンくずリスト">
                <ol class="flex flex-wrap items-center space-x-1 md:space-x-2 text-xs md:text-sm text-gray-400">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-green-600 transition-colors"><?php _e('ホーム', 'okitech'); ?></a></li>
                    <li class="flex items-center">
                        <svg class="w-3 h-3 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <a href="<?php echo esc_url(get_post_type_archive_link('event')); ?>" class="hover:text-green-600 transition-colors"><?php _e('イベント一覧', 'okitech'); ?></a>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-3 h-3 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <span class="text-gray-600 font-medium truncate"><?php the_title(); ?></span>
                    </li>
                </ol>
            </nav>
        </div>

        <!-- メインコンテンツ -->
        <div class="container mx-auto px-4 pb-24">
            <div class="max-w-6xl mx-auto">

                <!-- アイキャッチ画像 -->
                <?php if (has_post_thumbnail()) : ?>
                    <div class="mb-8">
                        <div class="h-64 md:h-80 lg:h-96 rounded-2xl overflow-hidden">
                            <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover')); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="grid lg:grid-cols-3 gap-8">
                    <!-- イベント詳細 -->
                    <div class="lg:col-span-2">
                        <!-- タイトル -->
                        <div class="mb-8">
                            <?php if (has_category()) : ?>
                                <div class="flex flex-wrap gap-2 mb-4">
                                    <?php
                                    $categories = get_the_category();
                                    foreach ($categories as $category) :
                                    ?>
                                        <span class="inline-block px-3 py-1 text-xs font-semibold text-green-600 bg-green-50 rounded-full">
                                            <?php echo esc_html($category->name); ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight mb-4">
                                <?php the_title(); ?>
                            </h1>

                            <div class="flex flex-wrap items-center gap-4 text-sm text-gray-400">
                                <span><?php echo get_the_date('Y年n月j日'); ?></span>
                            </div>
                        </div>

                        <!-- イベント詳細内容 -->
                        <div class="bg-white rounded-2xl border border-gray-100 p-6 md:p-8 shadow-sm scroll-fade-in">
                            <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-widest mb-6"><?php _e('Event Details', 'okitech'); ?></h3>
                            <div class="entry-content prose prose-lg max-w-none">
                                <?php
                                the_content();
                                wp_link_pages(array(
                                    'before' => '<div class="page-links">' . __('ページ:', 'okitech'),
                                    'after'  => '</div>',
                                ));
                                ?>
                            </div>
                        </div>
                    </div>

                    <!-- サイドバー -->
                    <div class="lg:col-span-1 space-y-6">
                        <?php get_template_part('template-parts/event-application-info'); ?>

                        <div class="bg-gray-50 rounded-2xl p-6">
                            <h4 class="font-bold text-gray-900 mb-3"><?php _e('お問い合わせ', 'okitech'); ?></h4>
                            <p class="text-gray-500 text-sm mb-4"><?php _e('イベントについてご質問がございましたら、お気軽にどうぞ。', 'okitech'); ?></p>
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>"
                               class="inline-flex items-center justify-center w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-xl text-sm transition-colors duration-200">
                                <?php _e('お問い合わせ', 'okitech'); ?>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- シェア -->
                <footer class="mt-12 pt-8 border-t border-gray-100">
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
                </footer>

            </div>

            <!-- 関連イベント -->
            <?php
            $related_events = new WP_Query(array(
                'post_type' => 'event',
                'posts_per_page' => 3,
                'post__not_in' => array(get_the_ID()),
                'meta_query' => array(
                    array(
                        'key' => 'event_date',
                        'value' => date('Y-m-d'),
                        'compare' => '>=',
                        'type' => 'DATE'
                    )
                ),
                'meta_key' => 'event_date',
                'orderby' => 'meta_value',
                'order' => 'ASC'
            ));

            if ($related_events->have_posts()) :
            ?>
                <section class="max-w-6xl mx-auto mt-16 pt-12 border-t border-gray-100">
                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-widest mb-8"><?php _e('Related Events', 'okitech'); ?></h3>
                    <div class="grid md:grid-cols-3 gap-6 scroll-stagger">
                        <?php while ($related_events->have_posts()) : $related_events->the_post(); ?>
                            <article class="bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="h-48">
                                        <?php the_post_thumbnail('medium', array('class' => 'w-full h-full object-cover')); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="p-5">
                                    <h4 class="font-bold text-gray-900 mb-2">
                                        <a href="<?php the_permalink(); ?>" class="hover:text-green-600 transition-colors">
                                            <?php the_title(); ?>
                                        </a>
                                    </h4>
                                    <?php
                                    $event_date = get_post_meta(get_the_ID(), 'event_date', true);
                                    if ($event_date) :
                                    ?>
                                        <p class="text-gray-400 text-sm"><?php echo esc_html(date_i18n('n/j（D）', strtotime($event_date))); ?></p>
                                    <?php endif; ?>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>
                </section>
            <?php
            endif;
            wp_reset_postdata();
            ?>
        </div>

    <?php endwhile; ?>

</main>

<?php
get_footer();
?>