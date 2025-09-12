<?php
/**
 * 投稿詳細ページテンプレート
 *
 * @package OkiTech
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container mx-auto px-4 py-8">
        
        <?php while (have_posts()) : the_post(); ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class('max-w-4xl mx-auto'); ?>>
                
                <!-- 投稿ヘッダー -->
                <header class="entry-header mb-8">
                    <!-- カテゴリーバッジ -->
                    <?php if (has_category()) : ?>
                        <div class="mb-4">
                            <?php
                            $categories = get_the_category();
                            $category = $categories[0];
                            ?>
                            <span class="inline-block px-4 py-2 text-sm font-semibold text-white bg-green-600 rounded-full">
                                <?php echo esc_html($category->name); ?>
                            </span>
                        </div>
                    <?php endif; ?>
                    
                    <?php the_title('<h1 class="entry-title text-4xl md:text-5xl font-bold text-gray-800 mb-6 leading-tight">', '</h1>'); ?>
                    
                    <div class="entry-meta text-gray-600 mb-6 flex flex-wrap items-center gap-4">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <time class="entry-date published" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                <?php echo esc_html(get_the_date()); ?>
                            </time>
                        </div>
                        
                        <?php if (has_tag()) : ?>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                <?php the_tags('', ', '); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="entry-thumbnail mb-6">
                            <?php the_post_thumbnail('large', array('class' => 'w-full h-64 object-cover rounded-lg')); ?>
                        </div>
                    <?php endif; ?>
                </header>

                <!-- 投稿コンテンツ -->
                <div class="entry-content prose prose-lg max-w-none">
                    <?php
                    the_content();
                    
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . __('ページ:', 'okitech'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>

                <!-- 投稿フッター -->
                <footer class="entry-footer mt-8 pt-8 border-t border-gray-200">
                    <?php
                    // 著者情報
                    $author_id = get_the_author_meta('ID');
                    if ($author_id) :
                    ?>
                        <div class="author-info mb-6 p-6 bg-gray-50 rounded-lg">
                            <div class="flex items-center">
                                <div class="author-avatar mr-4">
                                    <?php echo get_avatar($author_id, 60, '', '', array('class' => 'rounded-full')); ?>
                                </div>
                                <div>
                                    <h3 class="author-name font-semibold text-lg">
                                        <?php the_author(); ?>
                                    </h3>
                                    <p class="author-description text-gray-600">
                                        <?php echo get_the_author_meta('description'); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <!-- シェアボタン -->
                    <div class="share-buttons mb-6">
                        <h4 class="text-lg font-semibold mb-3"><?php _e('この記事をシェア', 'okitech'); ?></h4>
                        <div class="flex space-x-4">
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" 
                               target="_blank" 
                               class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                                Twitter
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" 
                               target="_blank" 
                               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                                Facebook
                            </a>
                            <a href="https://line.me/R/msg/text/?<?php echo urlencode(get_the_title() . ' ' . get_permalink()); ?>" 
                               target="_blank" 
                               class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-colors">
                                LINE
                            </a>
                            <a href="https://www.instagram.com/?url=<?php echo urlencode(get_permalink()); ?>" 
                               target="_blank" 
                               class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-4 py-2 rounded-lg hover:from-purple-600 hover:to-pink-600 transition-colors">
                                Instagram
                            </a>
                        </div>
                    </div>
                </footer>
                
            </article>

            <!-- 投稿ナビゲーション -->
            <nav class="post-navigation mt-12 pt-8 border-t border-gray-200">
                <div class="flex justify-between">
                    <div class="nav-previous">
                        <?php previous_post_link('%link', '← %title'); ?>
                    </div>
                    <div class="nav-next">
                        <?php next_post_link('%link', '%title →'); ?>
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

        <?php endwhile; ?>
        
    </div>
</main>

<?php
get_sidebar();
get_footer(); 