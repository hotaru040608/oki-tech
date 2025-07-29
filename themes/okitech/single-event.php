<?php
/**
 * イベント詳細ページテンプレート
 *
 * @package OkiTech
 */

get_header();
?>

<main id="primary" class="site-main bg-gray-50">
    
    <?php while (have_posts()) : the_post(); ?>
        
        <!-- パンくずリスト -->
        <div class="container mx-auto px-4 pt-8">
            <nav class="mb-6" aria-label="パンくずリスト">
                <ol class="flex flex-wrap items-center space-x-1 md:space-x-2 text-xs md:text-sm text-gray-600">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-green-600 transition-colors">ホーム</a></li>
                    <li class="flex items-center">
                        <svg class="w-3 h-3 md:w-4 md:h-4 mx-1 md:mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <a href="<?php echo esc_url(get_post_type_archive_link('event')); ?>" class="hover:text-green-600 transition-colors">イベント一覧</a>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-3 h-3 md:w-4 md:h-4 mx-1 md:mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <span class="text-gray-800 font-medium truncate"><?php the_title(); ?></span>
                    </li>
                </ol>
            </nav>
        </div>

        <!-- メインコンテンツ -->
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-6xl mx-auto">
                
                <!-- アイキャッチ画像のみのヘッダー -->
                <?php if (has_post_thumbnail()) : ?>
                    <div class="relative mb-8">
                        <div class="relative h-64 md:h-80 lg:h-96 rounded-2xl overflow-hidden shadow-lg">
                            <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover')); ?>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                            
                            <!-- イベントタイトルオーバーレイ -->
                            <div class="absolute bottom-0 left-0 right-0 p-6 md:p-8">
                                <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white mb-2 leading-tight">
                                    <?php the_title(); ?>
                                </h1>
                                
                                <!-- カテゴリーバッジ -->
                                <?php if (has_category()) : ?>
                                    <div class="flex flex-wrap gap-2">
                                        <?php
                                        $categories = get_the_category();
                                        foreach ($categories as $category) :
                                        ?>
                                            <span class="inline-block px-3 py-1 text-sm font-semibold text-white bg-green-600/80 backdrop-blur-sm rounded-full">
                                                <?php echo esc_html($category->name); ?>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <!-- アイキャッチ画像がない場合のフォールバック -->
                    <div class="bg-gradient-to-r from-green-500 to-blue-600 rounded-2xl p-8 mb-8 text-center">
                        <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">
                            <?php the_title(); ?>
                        </h1>
                        <?php if (has_category()) : ?>
                            <div class="flex flex-wrap justify-center gap-2">
                                <?php
                                $categories = get_the_category();
                                foreach ($categories as $category) :
                                ?>
                                    <span class="inline-block px-3 py-1 text-sm font-semibold text-white bg-white/20 backdrop-blur-sm rounded-full">
                                        <?php echo esc_html($category->name); ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                
                <div class="grid lg:grid-cols-3 gap-6 md:gap-8">
                    <!-- イベント詳細 -->
                    <div class="lg:col-span-2">
                        <!-- イベント詳細内容 -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 md:p-6">
                            <h3 class="text-xl md:text-2xl font-bold text-gray-800 mb-4 flex items-center">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <?php the_title(); ?>
                            </h3>
                            <div class="entry-content prose prose-lg max-w-none text-gray-700 leading-relaxed">
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
                        <!-- リスト化された申し込み情報 -->
                        <?php get_template_part('template-parts/event-application-info'); ?>
                        
                        <!-- お問い合わせ -->
                        <div class="bg-blue-50 border border-blue-200 rounded-xl p-6">
                            <h4 class="text-lg font-semibold text-gray-800 mb-4">お問い合わせ</h4>
                            <p class="text-sm text-gray-600 mb-4">イベントについてご質問がございましたら、お気軽にお問い合わせください。</p>
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" 
                               class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm">
                                お問い合わせフォーム
                            </a>
                        </div>
                    </div>
                </div>

                <!-- イベントフッター -->
                <footer class="entry-footer mt-12 pt-8 border-t border-gray-200">
                    <!-- シェアボタン -->
                    <div class="share-buttons mb-6">
                        <h4 class="text-lg font-semibold mb-3">このイベントをシェア</h4>
                        <div class="flex flex-wrap gap-3">
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" 
                               target="_blank" 
                               class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                                Twitter
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" 
                               target="_blank" 
                               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854.391.082.923.258 1.058.59.12.301.079.766.038 1.08l-.164 1.02c-.045.301-.24 1.186 1.049.645 1.291-.539 6.916-4.078 9.436-6.975C23.176 14.393 24 12.458 24 10.314"/>
                                </svg>
                                Facebook
                            </a>
                            <a href="https://line.me/R/msg/text/?<?php echo urlencode(get_the_title() . ' ' . get_permalink()); ?>" 
                               target="_blank" 
                               class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-colors flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19.365 9.863c.349 0 .63.285.63.631 0 .345-.281.63-.63.63H17.61v1.125h1.755c.349 0 .63.283.63.63 0 .344-.281.629-.63.629h-2.386c-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.63-.63h2.386c.346 0 .627.285.627.63 0 .349-.281.63-.63.63H17.61v1.125h1.755zm-3.855 3.016c0 .27-.174.51-.432.596-.064.021-.133.031-.199.031-.211 0-.391-.09-.51-.25l-2.443-3.317v2.94c0 .344-.279.629-.631.629-.346 0-.626-.285-.626-.629V8.108c0-.27.173-.51.43-.595.06-.023.136-.033.194-.033.195 0 .375.104.495.254l2.462 3.33V8.108c0-.345.282-.63.63-.63.345 0 .63.285.63.63v4.771zm-5.741 0c0 .344-.282.629-.631.629-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.63-.63.346 0 .628.285.628.63v4.771zm-2.466.629H4.917c-.345 0-.63-.285-.63-.629V8.108c0-.345.285-.63.63-.63.348 0 .63.285.63.63v4.141h1.756c.348 0 .629.283.629.63 0 .344-.282.629-.629.629M24 10.314C24 4.943 18.615.572 12 .572S0 4.943 0 10.314c0 4.811 4.27 8.842 10.035 9.608.391.082.923.258 1.058.59.12.301.079.766.038 1.08l-.164 1.02c-.045.301-.24 1.186 1.049.645 1.291-.539 6.916-4.078 9.436-6.975C23.176 14.393 24 12.458 24 10.314"/>
                                </svg>
                                LINE
                            </a>
                            <a href="https://www.instagram.com/?url=<?php echo urlencode(get_permalink()); ?>" 
                               target="_blank" 
                               class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-4 py-2 rounded-lg hover:from-purple-600 hover:to-pink-600 transition-colors flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                                Instagram
                            </a>
                        </div>
                    </div>
                </footer>
                
            </article>

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
                <section class="related-events mt-12 pt-8 border-t border-gray-200">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                        <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        関連イベント
                    </h3>
                    <div class="grid md:grid-cols-3 gap-6">
                        <?php while ($related_events->have_posts()) : $related_events->the_post(); ?>
                            <article class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition-shadow">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="h-48">
                                        <?php the_post_thumbnail('medium', array('class' => 'w-full h-full object-cover')); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="p-4">
                                    <h4 class="font-semibold text-lg mb-2">
                                        <a href="<?php the_permalink(); ?>" class="text-gray-800 hover:text-green-600 transition-colors">
                                            <?php the_title(); ?>
                                        </a>
                                    </h4>
                                    <?php
                                    $event_date = get_post_meta(get_the_ID(), 'event_date', true);
                                    if ($event_date) :
                                    ?>
                                        <p class="text-gray-600 text-sm"><?php echo esc_html(date_i18n('n/j（D）', strtotime($event_date))); ?></p>
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

        <?php endwhile; ?>
        
    </div>
</main>

<?php
get_footer(); 
?> 