<?php
/**
 * メインのテンプレートファイル
 *
 * @package OkiTech
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container mx-auto px-4 py-8">
        
        <?php if (have_posts()) : ?>
            
            <!-- ブログヘッダー -->
            <header class="blog-header mb-12">
                <div class="text-center mb-8">
                    <?php if (is_home() && !is_front_page()) : ?>
                        <h1 class="page-title text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                            <?php single_post_title(); ?>
                        </h1>
                        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                            沖縄の地域コミュニティ、イベント、技術情報など、最新の情報をお届けします。
                        </p>
                    <?php elseif (is_search()) : ?>
                        <h1 class="page-title text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                            <?php printf(__('検索結果: %s', 'okitech'), '<span class="text-green-600">' . get_search_query() . '</span>'); ?>
                        </h1>
                        <p class="text-lg text-gray-600">
                            検索結果をご確認ください。
                        </p>
                    <?php elseif (is_archive()) : ?>
                        <h1 class="page-title text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                            <?php the_archive_title(); ?>
                        </h1>
                        <?php the_archive_description('<div class="archive-description text-lg text-gray-600 max-w-2xl mx-auto">', '</div>'); ?>
                    <?php endif; ?>
                </div>
                
                <!-- カテゴリーフィルター -->
                <?php if (is_home() || is_archive()) : ?>
                    <div class="category-filter mb-8">
                        <div class="flex flex-wrap justify-center gap-4">
                            <a href="<?php echo esc_url(home_url('/')); ?>" 
                               class="px-4 py-2 rounded-full <?php echo is_home() ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'; ?> transition-colors">
                                すべて
                            </a>
                            <?php
                            $categories = get_categories(array(
                                'orderby' => 'count',
                                'order' => 'DESC',
                                'number' => 6
                            ));
                            foreach ($categories as $category) :
                                $is_current = is_category($category->term_id);
                            ?>
                                <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" 
                                   class="px-4 py-2 rounded-full <?php echo $is_current ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'; ?> transition-colors">
                                    <?php echo esc_html($category->name); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </header>

            <!-- 投稿グリッド -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                <?php
                /* 投稿ループ開始 */
                while (have_posts()) :
                    the_post();
                    
                    /*
                     * 投稿コンテンツのテンプレートパーツを読み込み
                     */
                    get_template_part('template-parts/content', get_post_type());
                    
                endwhile;
                ?>
            </div>

            <!-- ページネーション -->
            <div class="pagination-wrapper mb-12">
                <?php
                the_posts_navigation(array(
                    'prev_text' => __('← 前のページ', 'okitech'),
                    'next_text' => __('次のページ →', 'okitech'),
                    'class'     => 'flex justify-between items-center',
                ));
                ?>
            </div>

        <?php else : ?>
            <!-- 投稿が見つからない場合 -->
            <div class="text-center py-12">
                <div class="max-w-md mx-auto">
                    <svg class="w-24 h-24 text-gray-400 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4"><?php _e('投稿が見つかりません', 'okitech'); ?></h2>
                    <p class="text-gray-600 mb-8"><?php _e('お探しの投稿が見つかりませんでした。別のキーワードで検索してみてください。', 'okitech'); ?></p>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-primary">
                        <?php _e('ホームに戻る', 'okitech'); ?>
                    </a>
                </div>
            </div>
        <?php endif; ?>
        
    </div>
    
    <!-- CTAセクション -->
    <?php if (is_home() || is_archive()) : ?>
        <?php get_template_part('template-parts/blog-cta'); ?>
    <?php endif; ?>
</main>

<?php
get_sidebar();
get_footer(); 