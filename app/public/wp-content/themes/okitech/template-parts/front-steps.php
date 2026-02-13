<?php
/**
 * 参加3ステップ
 *
 * @package OkiTech
 */
?>

<section class="py-16 md:py-24">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 md:mb-16 scroll-fade-in">
            <p class="text-green-600 font-semibold text-sm tracking-widest uppercase mb-3">
                <?php _e('How to Join', 'okitech'); ?>
            </p>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
                <?php _e('参加はかんたん3ステップ', 'okitech'); ?>
            </h2>
        </div>

        <div class="max-w-3xl mx-auto grid md:grid-cols-3 gap-8 md:gap-12 scroll-stagger">
            <div class="text-center scroll-scale-in">
                <div class="w-16 h-16 bg-green-600 text-white rounded-full flex items-center justify-center mx-auto mb-5 text-xl font-bold shadow-lg" style="box-shadow: 0 4px 14px rgba(5, 150, 105, 0.4);">1</div>
                <h3 class="text-lg font-bold text-gray-900 mb-2"><?php _e('イベントを探す', 'okitech'); ?></h3>
                <p class="text-gray-500 text-sm leading-relaxed"><?php _e('気になるテーマや日程で選ぶだけ。', 'okitech'); ?></p>
            </div>

            <div class="text-center scroll-scale-in">
                <div class="w-16 h-16 bg-green-600 text-white rounded-full flex items-center justify-center mx-auto mb-5 text-xl font-bold shadow-lg" style="box-shadow: 0 4px 14px rgba(5, 150, 105, 0.4);">2</div>
                <h3 class="text-lg font-bold text-gray-900 mb-2"><?php _e('申し込む', 'okitech'); ?></h3>
                <p class="text-gray-500 text-sm leading-relaxed"><?php _e('名前とメールだけ。30秒で完了します。', 'okitech'); ?></p>
            </div>

            <div class="text-center scroll-scale-in">
                <div class="w-16 h-16 bg-green-600 text-white rounded-full flex items-center justify-center mx-auto mb-5 text-xl font-bold shadow-lg" style="box-shadow: 0 4px 14px rgba(5, 150, 105, 0.4);">3</div>
                <h3 class="text-lg font-bold text-gray-900 mb-2"><?php _e('参加する', 'okitech'); ?></h3>
                <p class="text-gray-500 text-sm leading-relaxed"><?php _e('会場でもオンラインでもOK。', 'okitech'); ?></p>
            </div>
        </div>

        <div class="text-center mt-10 md:mt-14 scroll-fade-in">
            <a href="<?php echo get_post_type_archive_link('event'); ?>" class="inline-flex items-center justify-center bg-green-600 hover:bg-green-700 text-white font-semibold px-8 py-3 rounded-xl transition-all duration-200 hover:shadow-lg hover:-translate-y-0.5">
                <?php _e('イベントを探す', 'okitech'); ?>
            </a>
        </div>
    </div>
</section>