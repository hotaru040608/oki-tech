<?php
/**
 * ブログページ用CTAセクション
 *
 * @package OkiTech
 */
?>

<section class="final-cta-section py-20 md:py-28 mt-16 scroll-fade-in">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-2xl mx-auto">
            <h2 class="cta-title mb-5">
                <?php _e('一緒に学びませんか？', 'okitech'); ?>
            </h2>
            <p class="cta-subtitle mb-10">
                <?php _e('イベントに参加して、沖縄の仲間とつながりましょう。', 'okitech'); ?>
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?php echo get_post_type_archive_link('event'); ?>" class="btn-cta-primary">
                    <?php _e('イベントを見る', 'okitech'); ?>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
                <a href="<?php echo esc_url(home_url('/about/')); ?>" class="btn-cta-secondary">
                    <?php _e('OkiTechについて', 'okitech'); ?>
                </a>
            </div>
        </div>
    </div>
</section>
