<?php
/**
 * 参加3ステップ
 *
 * @package OkiTech
 */
?>

<section class="steps-section py-20 md:py-28">
    <div class="container mx-auto px-4">
        <div class="text-center mb-14 md:mb-20 scroll-fade-in">
            <div class="section-label justify-center">
                <?php _e('How to Join', 'okitech'); ?>
            </div>
            <h2 class="section-title">
                <?php _e('参加はかんたん3ステップ', 'okitech'); ?>
            </h2>
        </div>

        <div class="max-w-4xl mx-auto grid md:grid-cols-3 gap-10 md:gap-14 scroll-stagger">
            <!-- ステップ 1 -->
            <div class="step-item scroll-scale-in">
                <div class="relative">
                    <div class="step-number">1</div>
                    <div class="step-connector hidden md:block"></div>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2"><?php _e('イベントを探す', 'okitech'); ?></h3>
                <p class="text-gray-500 text-sm leading-relaxed"><?php _e('気になるテーマや日程で選ぶだけ。', 'okitech'); ?></p>
            </div>

            <!-- ステップ 2 -->
            <div class="step-item scroll-scale-in">
                <div class="relative">
                    <div class="step-number">2</div>
                    <div class="step-connector hidden md:block"></div>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2"><?php _e('申し込む', 'okitech'); ?></h3>
                <p class="text-gray-500 text-sm leading-relaxed"><?php _e('名前とメールだけ。30秒で完了します。', 'okitech'); ?></p>
            </div>

            <!-- ステップ 3 -->
            <div class="step-item scroll-scale-in">
                <div class="relative">
                    <div class="step-number">3</div>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2"><?php _e('参加する', 'okitech'); ?></h3>
                <p class="text-gray-500 text-sm leading-relaxed"><?php _e('会場でもオンラインでもOK。', 'okitech'); ?></p>
            </div>
        </div>

        <div class="text-center mt-12 md:mt-16 scroll-fade-in">
            <a href="<?php echo get_post_type_archive_link('event'); ?>" class="btn-primary">
                <?php _e('イベントを探す', 'okitech'); ?>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>
    </div>
</section>
