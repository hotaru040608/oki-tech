<?php
/**
 * 参加者の声
 *
 * @package OkiTech
 */
?>

<section class="py-20 md:py-28 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-14 md:mb-20 scroll-fade-in">
            <div class="section-label justify-center">
                <?php _e('Voices', 'okitech'); ?>
            </div>
            <h2 class="section-title">
                <?php _e('参加者の声', 'okitech'); ?>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 max-w-5xl mx-auto scroll-stagger">

            <!-- 移住者・30代 -->
            <div class="testimonial-card scroll-fade-in">
                <div class="testimonial-quote-icon">"</div>
                <p class="testimonial-text">
                    <?php _e('移住したばかりで知り合いゼロでしたが、思い切って参加してよかった。初心者の私にも丁寧に教えてくれて、今では毎回楽しみです。', 'okitech'); ?>
                </p>
                <div class="testimonial-author">
                    <img src="https://images.unsplash.com/photo-1676195645570-24cc20713810?auto=format&fit=crop&w=150&h=150&q=80" alt="参加者の写真" class="w-11 h-11 rounded-full object-cover border-2 border-green-100">
                    <div>
                        <p class="font-semibold text-gray-900 text-sm"><?php _e('Aさん・30代女性', 'okitech'); ?></p>
                        <p class="text-gray-400 text-xs"><?php _e('県外からの移住者・プログラミング初心者', 'okitech'); ?></p>
                    </div>
                </div>
            </div>

            <!-- 学生・20代 -->
            <div class="testimonial-card scroll-fade-in">
                <div class="testimonial-quote-icon">"</div>
                <p class="testimonial-text">
                    <?php _e('AIに興味はあったけど独学は挫折。勉強会は基礎からやさしく教えてくれるので、一人で悩まなくていいのが最高です。', 'okitech'); ?>
                </p>
                <div class="testimonial-author">
                    <img src="https://images.unsplash.com/photo-1750044010283-bcfab7777e26?auto=format&fit=crop&w=150&h=150&q=80" alt="参加者の写真" class="w-11 h-11 rounded-full object-cover border-2 border-blue-100">
                    <div>
                        <p class="font-semibold text-gray-900 text-sm"><?php _e('Bさん・20代男性', 'okitech'); ?></p>
                        <p class="text-gray-400 text-xs"><?php _e('大学生・AI勉強会に参加', 'okitech'); ?></p>
                    </div>
                </div>
            </div>

            <!-- リモートワーカー・40代 -->
            <div class="testimonial-card scroll-fade-in">
                <div class="testimonial-quote-icon">"</div>
                <p class="testimonial-text">
                    <?php _e('リモートワークだと出会いが少ないですが、OkiTechのおかげで沖縄に仲間ができました。オンライン参加できるのも助かります。', 'okitech'); ?>
                </p>
                <div class="testimonial-author">
                    <img src="https://images.unsplash.com/photo-1758600431229-191932ccee81?auto=format&fit=crop&w=150&h=150&q=80" alt="参加者の写真" class="w-11 h-11 rounded-full object-cover border-2 border-orange-100">
                    <div>
                        <p class="font-semibold text-gray-900 text-sm"><?php _e('Cさん・40代男性', 'okitech'); ?></p>
                        <p class="text-gray-400 text-xs"><?php _e('リモートワーカー・オンラインで参加', 'okitech'); ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
