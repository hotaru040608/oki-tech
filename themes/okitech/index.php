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
            
            <header class="page-header mb-8">
                <?php if (is_home() && !is_front_page()) : ?>
                    <h1 class="page-title text-3xl font-bold text-gray-800">
                        <?php single_post_title(); ?>
                    </h1>
                <?php elseif (is_search()) : ?>
                    <h1 class="page-title text-3xl font-bold text-gray-800">
                        <?php printf(__('検索結果: %s', 'okitech'), '<span>' . get_search_query() . '</span>'); ?>
                    </h1>
                <?php elseif (is_archive()) : ?>
                    <h1 class="page-title text-3xl font-bold text-gray-800">
                        <?php the_archive_title(); ?>
                    </h1>
                    <?php the_archive_description('<div class="archive-description text-gray-600 mt-2">', '</div>'); ?>
                <?php endif; ?>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
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

            <?php
            /* ページネーション */
            the_posts_navigation(array(
                'prev_text' => __('← 前のページ', 'okitech'),
                'next_text' => __('次のページ →', 'okitech'),
                'class'     => 'mt-8 flex justify-between',
            ));

        else :
            /*
             * 投稿が見つからない場合のテンプレートパーツを読み込み
             */
            get_template_part('template-parts/content', 'none');

        endif;
        ?>
        
    </div>
</main>

<?php
get_sidebar();
get_footer(); 