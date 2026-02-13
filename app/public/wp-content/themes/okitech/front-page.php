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
    <section class="py-20 md:py-28">
        <div class="container mx-auto px-4">
            <div class="text-center mb-14 md:mb-20 scroll-fade-in">
                <div class="section-label justify-center">
                    <?php _e('Events', 'okitech'); ?>
                </div>
                <h2 class="section-title">
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

                <div class="text-center mt-12 md:mt-16 scroll-fade-in">
                    <a href="<?php echo get_post_type_archive_link('event'); ?>" class="btn-primary">
                        <?php _e('すべてのイベントを見る', 'okitech'); ?>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            <?php else : ?>
                <div class="text-center max-w-md mx-auto scroll-fade-in">
                    <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <p class="text-gray-500 mb-2 font-medium"><?php _e('現在開催予定のイベントはありません。', 'okitech'); ?></p>
                    <p class="text-gray-400 text-sm mb-8"><?php _e('Discordに参加すると、次回イベントの情報をいち早くお届けします。', 'okitech'); ?></p>
                    <a href="https://discord.gg/KDBynzKzUA" target="_blank" rel="noopener noreferrer" class="btn-primary">
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
