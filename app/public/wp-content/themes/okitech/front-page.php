<?php
/**
 * フロントページテンプレート
 *
 * @package OkiTech
 */

get_header();
?>

<main id="primary" class="site-main">

    <!-- 1. ヒーロー + 次回イベントスポットライト -->
    <?php get_template_part('template-parts/hero'); ?>

    <!-- 2. 社会的証明ストリップ -->
    <?php get_template_part('template-parts/front-social-proof'); ?>

    <!-- 3. 開催予定イベント一覧 -->
    <section class="py-16 md:py-24">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 md:mb-16 scroll-fade-in">
                <p class="text-green-600 font-semibold text-sm tracking-widest uppercase mb-3">
                    <?php _e('Events', 'okitech'); ?>
                </p>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
                    <?php _e('開催予定のイベント', 'okitech'); ?>
                </h2>
            </div>

            <?php
            $events_query = new WP_Query(array(
                'post_type' => 'event',
                'posts_per_page' => 6,
                'post_status' => 'publish',
                'meta_key' => 'event_date',
                'orderby' => 'meta_value',
                'order' => 'ASC',
                'meta_query' => array(
                    array(
                        'key' => 'event_date',
                        'value' => date('Y-m-d'),
                        'compare' => '>=',
                        'type' => 'DATE'
                    )
                )
            ));

            if ($events_query->have_posts()) :
                $event_index = 0;
            ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 scroll-stagger">
                    <?php while ($events_query->have_posts()) : $events_query->the_post();
                        // 締切間近チェック（3日以内）
                        $card_deadline = get_post_meta(get_the_ID(), 'event_deadline', true);
                        $deadline_soon = false;
                        if ($card_deadline) {
                            $diff_days = (strtotime($card_deadline) - current_time('timestamp')) / DAY_IN_SECONDS;
                            $deadline_soon = ($diff_days > 0 && $diff_days <= 3);
                        }

                        get_template_part('template-parts/content-event', null, array(
                            'is_featured'      => ($event_index === 0),
                            'is_deadline_soon' => $deadline_soon,
                        ));

                        $event_index++;
                    endwhile; ?>
                </div>

                <div class="text-center mt-10 md:mt-14 scroll-fade-in">
                    <a href="<?php echo get_post_type_archive_link('event'); ?>" class="inline-flex items-center justify-center bg-green-600 hover:bg-green-700 text-white font-semibold px-8 py-3 rounded-xl transition-all duration-200 hover:shadow-lg hover:-translate-y-0.5">
                        <?php _e('すべてのイベントを見る', 'okitech'); ?>
                    </a>
                </div>
            <?php else : ?>
                <div class="text-center max-w-md mx-auto">
                    <p class="text-gray-500 mb-2"><?php _e('現在開催予定のイベントはありません。', 'okitech'); ?></p>
                    <p class="text-gray-400 text-sm mb-6"><?php _e('Discordに参加すると、次回イベントの情報をいち早くお届けします。', 'okitech'); ?></p>
                    <a href="https://discord.gg/KDBynzKzUA" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center bg-green-600 hover:bg-green-700 text-white font-semibold px-8 py-3 rounded-xl transition-colors duration-200">
                        <?php _e('Discordに参加する', 'okitech'); ?>
                    </a>
                </div>
            <?php endif;
            wp_reset_postdata();
            ?>
        </div>
    </section>

    <!-- 4. 3つの安心ポイント -->
    <?php get_template_part('template-parts/front-safety-points'); ?>

    <!-- 5. 参加3ステップ -->
    <?php get_template_part('template-parts/front-steps'); ?>

    <!-- 6. 参加者の声 -->
    <?php get_template_part('template-parts/front-testimonials'); ?>

    <!-- 7. ミニFAQ -->
    <?php get_template_part('template-parts/front-faq'); ?>

    <!-- 8. 最終CTA -->
    <?php get_template_part('template-parts/front-cta'); ?>

</main>

<?php
get_footer();