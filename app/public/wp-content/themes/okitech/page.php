<?php
/**
 * 固定ページテンプレート
 *
 * @package OkiTech
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php while (have_posts()) : the_post(); ?>

        <!-- ページヘッダー -->
        <section class="page-hero py-24 md:py-32">
            <div class="container mx-auto px-4">
                <div class="max-w-3xl mx-auto text-center">
                    <h1 class="page-hero-title">
                        <?php the_title(); ?>
                    </h1>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="mt-10">
                            <?php the_post_thumbnail('large', array('class' => 'w-full h-64 md:h-80 object-cover rounded-2xl')); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <div class="container mx-auto px-4 pb-24">
            <article id="post-<?php the_ID(); ?>" <?php post_class('max-w-3xl mx-auto'); ?>>
                <div class="entry-content prose prose-lg max-w-none">
                    <?php
                    the_content();
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . __('ページ:', 'okitech'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>
            </article>

            <?php
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>
        </div>

    <?php endwhile; ?>

</main>

<?php
get_footer();
