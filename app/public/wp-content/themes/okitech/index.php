<?php
/**
 * メインのテンプレートファイル
 *
 * @package OkiTech
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php if (have_posts()) : ?>

        <!-- ページヘッダー -->
        <section class="py-20 md:py-28">
            <div class="container mx-auto px-4">
                <div class="max-w-3xl mx-auto text-center">
                    <?php if (is_home() && !is_front_page()) : ?>
                        <p class="text-green-600 font-semibold text-sm tracking-widest uppercase mb-4">
                            <?php _e('Blog', 'okitech'); ?>
                        </p>
                        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                            <?php single_post_title(); ?>
                        </h1>
                        <p class="text-lg text-gray-500">
                            <?php _e('沖縄のコミュニティ、イベント、技術情報をお届けします。', 'okitech'); ?>
                        </p>
                    <?php elseif (is_search()) : ?>
                        <p class="text-green-600 font-semibold text-sm tracking-widest uppercase mb-4">
                            <?php _e('Search Results', 'okitech'); ?>
                        </p>
                        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                            <?php printf(__('「%s」の検索結果', 'okitech'), get_search_query()); ?>
                        </h1>
                    <?php elseif (is_archive()) : ?>
                        <p class="text-green-600 font-semibold text-sm tracking-widest uppercase mb-4">
                            <?php _e('Archive', 'okitech'); ?>
                        </p>
                        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                            <?php the_archive_title(); ?>
                        </h1>
                        <?php the_archive_description('<p class="text-lg text-gray-500">', '</p>'); ?>
                    <?php endif; ?>
                </div>

                <!-- カテゴリーフィルター -->
                <?php if (is_home() || is_archive()) : ?>
                    <div class="max-w-3xl mx-auto mt-10">
                        <div class="flex flex-wrap justify-center gap-2">
                            <a href="<?php echo esc_url(home_url('/')); ?>"
                               class="px-4 py-2 rounded-full text-sm font-medium <?php echo is_home() ? 'bg-gray-900 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'; ?> transition-colors">
                                <?php _e('すべて', 'okitech'); ?>
                            </a>
                            <?php
                            $categories = get_categories(array('orderby' => 'count', 'order' => 'DESC', 'number' => 6));
                            foreach ($categories as $category) :
                                $is_current = is_category($category->term_id);
                            ?>
                                <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"
                                   class="px-4 py-2 rounded-full text-sm font-medium <?php echo $is_current ? 'bg-gray-900 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'; ?> transition-colors">
                                    <?php echo esc_html($category->name); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <!-- 投稿グリッド -->
        <div class="container mx-auto px-4 pb-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12 scroll-stagger">
                <?php
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/content', get_post_type());
                endwhile;
                ?>
            </div>

            <!-- ページネーション -->
            <div class="text-center">
                <?php
                the_posts_navigation(array(
                    'prev_text' => __('&larr; 前のページ', 'okitech'),
                    'next_text' => __('次のページ &rarr;', 'okitech'),
                ));
                ?>
            </div>
        </div>

    <?php else : ?>

        <section class="py-24">
            <div class="container mx-auto px-4 text-center">
                <div class="max-w-md mx-auto">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4"><?php _e('投稿が見つかりません', 'okitech'); ?></h2>
                    <p class="text-gray-500 mb-8"><?php _e('お探しの投稿が見つかりませんでした。別のキーワードで検索してみてください。', 'okitech'); ?></p>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center justify-center bg-green-600 hover:bg-green-700 text-white font-semibold px-8 py-3 rounded-xl transition-colors duration-200">
                        <?php _e('ホームに戻る', 'okitech'); ?>
                    </a>
                </div>
            </div>
        </section>

    <?php endif; ?>

    <!-- CTAセクション -->
    <?php if (is_home() || is_archive()) : ?>
        <?php get_template_part('template-parts/blog-cta'); ?>
    <?php endif; ?>

</main>

<?php
get_sidebar();
get_footer();