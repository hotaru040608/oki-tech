<?php
/**
 * ブログページ用CTAセクション
 *
 * @package OkiTech
 */
?>

<section class="blog-cta-section bg-gradient-to-r from-green-50 to-blue-50 py-16 mt-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            
            <!-- メインCTA -->
            <div class="cta-main mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">
                    沖縄の最新情報をお届け
                </h2>
                <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
                    沖縄の地域コミュニティ、イベント、技術情報など、最新の情報を定期的に配信しています。
                    メールマガジンに登録して、見逃しを防ぎましょう。
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" 
                       class="btn-primary text-lg px-8 py-4 inline-flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        メールマガジン登録
                    </a>
                    <a href="<?php echo esc_url(home_url('/events/')); ?>" 
                       class="btn-secondary text-lg px-8 py-4 inline-flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        イベント一覧
                    </a>
                </div>
            </div>
            
            <!-- サブCTA -->
            <div class="cta-sub grid md:grid-cols-3 gap-8 mt-12">
                <div class="cta-card bg-white rounded-lg p-6 shadow-md">
                    <div class="text-green-600 mb-4">
                        <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">コミュニティ参加</h3>
                    <p class="text-gray-600 mb-4">沖縄の地域コミュニティに参加して、新しい仲間と出会いましょう。</p>
                    <a href="<?php echo esc_url(home_url('/about/')); ?>" class="text-green-600 hover:text-green-700 font-semibold">
                        詳しく見る →
                    </a>
                </div>
                
                <div class="cta-card bg-white rounded-lg p-6 shadow-md">
                    <div class="text-orange-500 mb-4">
                        <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">技術情報</h3>
                    <p class="text-gray-600 mb-4">最新の技術トレンドや沖縄のIT事情について詳しく解説します。</p>
                    <a href="<?php echo esc_url(home_url('/category/tech/')); ?>" class="text-orange-500 hover:text-orange-600 font-semibold">
                        記事を見る →
                    </a>
                </div>
                
                <div class="cta-card bg-white rounded-lg p-6 shadow-md">
                    <div class="text-blue-500 mb-4">
                        <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">イベント開催</h3>
                    <p class="text-gray-600 mb-4">あなたのイベントを開催しませんか？私たちがサポートします。</p>
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="text-blue-500 hover:text-blue-600 font-semibold">
                        お問い合わせ →
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</section> 