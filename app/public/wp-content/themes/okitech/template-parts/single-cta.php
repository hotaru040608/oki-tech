<?php
/**
 * ブログ記事ページ用CTAセクション
 *
 * @package OkiTech
 */
?>

<section class="single-cta-section bg-gradient-to-r from-green-50 to-blue-50 py-12 mt-8">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            
            <!-- メインCTA -->
            <div class="cta-main text-center mb-8">
                <h3 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">
                    この記事はいかがでしたか？
                </h3>
                <p class="text-lg text-gray-600 mb-6">
                    沖縄でAI・プログラミングを学びたい方は、ぜひOkiTechの講座をご検討ください。
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="<?php echo esc_url(home_url('/events/')); ?>" 
                       class="btn-primary text-lg px-8 py-4 inline-flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        関連イベントを見る
                    </a>
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" 
                       class="btn-secondary text-lg px-8 py-4 inline-flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        お問い合わせ
                    </a>
                </div>
            </div>
            
            <!-- 関連記事・サービス -->
            <div class="cta-related grid md:grid-cols-2 gap-6">
                <div class="cta-card bg-white rounded-lg p-6 shadow-md">
                    <div class="text-green-600 mb-4">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-3">関連記事</h4>
                    <p class="text-gray-600 mb-4">AI・プログラミングに関する最新情報をお届けします。</p>
                    <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="text-green-600 hover:text-green-700 font-semibold">
                        記事一覧を見る →
                    </a>
                </div>
                
                <div class="cta-card bg-white rounded-lg p-6 shadow-md">
                    <div class="text-orange-500 mb-4">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-3">コミュニティ参加</h4>
                    <p class="text-gray-600 mb-4">沖縄のITコミュニティに参加して、仲間と一緒に学びましょう。</p>
                    <a href="<?php echo esc_url(home_url('/about/')); ?>" class="text-orange-500 hover:text-orange-600 font-semibold">
                        詳しく見る →
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</section> 