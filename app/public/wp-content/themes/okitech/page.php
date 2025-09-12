<?php
/**
 * 固定ページテンプレート
 *
 * @package OkiTech
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container mx-auto px-4 py-8">
        
        <?php while (have_posts()) : the_post(); ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class('max-w-4xl mx-auto'); ?>>
                
                <!-- ページヘッダー -->
                <header class="entry-header mb-8">
                    <?php the_title('<h1 class="entry-title text-4xl font-bold text-gray-800 mb-4">', '</h1>'); ?>
                    
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="entry-thumbnail mb-6">
                            <?php the_post_thumbnail('large', array('class' => 'w-full h-64 object-cover rounded-lg')); ?>
                        </div>
                    <?php endif; ?>
                </header>

                <!-- ページコンテンツ -->
                <div class="entry-content prose prose-lg max-w-none">
                    <?php
                    the_content();
                    
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . __('ページ:', 'okitech'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>

                <!-- ページフッター -->
                <footer class="entry-footer mt-8 pt-8 border-t border-gray-200">
                    <div class="entry-meta text-gray-600">
                        <span class="posted-on">
                            <?php _e('更新日:', 'okitech'); ?>
                            <time class="entry-date published" datetime="<?php echo esc_attr(get_the_modified_date('c')); ?>">
                                <?php echo esc_html(get_the_modified_date()); ?>
                            </time>
                        </span>
                    </div>
                </footer>
                
            </article>

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