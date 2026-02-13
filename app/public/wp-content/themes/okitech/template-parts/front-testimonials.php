<?php
/**
 * 参加者の声
 *
 * @package OkiTech
 */
?>

<section class="py-16 md:py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 md:mb-16 scroll-fade-in">
            <p class="text-green-600 font-semibold text-sm tracking-widest uppercase mb-3">
                <?php _e('Voices', 'okitech'); ?>
            </p>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
                <?php _e('参加者の声', 'okitech'); ?>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto scroll-stagger">

            <!-- 移住者・30代 -->
            <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 scroll-fade-in">
                <p class="text-gray-600 leading-relaxed mb-6">
                    <?php _e('「移住したばかりで知り合いゼロでしたが、思い切って参加してよかった。初心者の私にも丁寧に教えてくれて、今では毎回楽しみです。」', 'okitech'); ?>
                </p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <span class="text-green-600 font-bold text-sm">A</span>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 text-sm"><?php _e('移住者・30代', 'okitech'); ?></p>
                        <p class="text-gray-400 text-xs"><?php _e('プログラミング初心者', 'okitech'); ?></p>
                    </div>
                </div>
            </div>

            <!-- 学生・20代 -->
            <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 scroll-fade-in">
                <p class="text-gray-600 leading-relaxed mb-6">
                    <?php _e('「AIに興味はあったけど独学は挫折。勉強会は基礎からやさしく教えてくれるので、一人で悩まなくていいのが最高です。」', 'okitech'); ?>
                </p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                        <span class="text-blue-600 font-bold text-sm">B</span>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 text-sm"><?php _e('学生・20代', 'okitech'); ?></p>
                        <p class="text-gray-400 text-xs"><?php _e('AI勉強会に参加', 'okitech'); ?></p>
                    </div>
                </div>
            </div>

            <!-- リモートワーカー・40代 -->
            <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 scroll-fade-in">
                <p class="text-gray-600 leading-relaxed mb-6">
                    <?php _e('「リモートワークだと出会いが少ないですが、OkiTechのおかげで沖縄に仲間ができました。オンライン参加できるのも助かります。」', 'okitech'); ?>
                </p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center">
                        <span class="text-orange-600 font-bold text-sm">C</span>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 text-sm"><?php _e('リモートワーカー・40代', 'okitech'); ?></p>
                        <p class="text-gray-400 text-xs"><?php _e('オンラインで参加', 'okitech'); ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>