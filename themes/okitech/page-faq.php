<?php
/**
 * FAQページテンプレート
 *
 * @package OkiTech
 */

get_header();
?>

<main id="primary" class="site-main">
    
    <!-- ヒーローセクション -->
    <section class="bg-green-50 py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-5xl md:text-6xl font-bold text-gray-800 mb-8">
                    <?php _e('よくある質問', 'okitech'); ?>
                </h1>
                <p class="text-xl md:text-2xl text-gray-600 leading-relaxed max-w-3xl mx-auto">
                    <?php _e('OkiTechへの参加について、よくある質問にお答えします', 'okitech'); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- FAQコンテンツ -->
    <div class="container mx-auto px-4 py-20">
        <div class="max-w-4xl mx-auto">
            
            <!-- 参加について -->
            <section class="mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">
                    <span class="bg-green-100 text-green-600 px-4 py-2 rounded-full text-2xl mr-3">Q</span>
                    <?php _e('参加について', 'okitech'); ?>
                </h2>
                
                <div class="space-y-6">
                    <!-- FAQ 1 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <button class="faq-toggle w-full px-8 py-6 text-left hover:bg-gray-50 transition-colors focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-inset">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-gray-800">
                                    <?php _e('プログラミング初心者でも参加できますか？', 'okitech'); ?>
                                </h3>
                                <svg class="w-6 h-6 text-green-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-content hidden px-8 pb-6">
                            <div class="prose prose-lg text-gray-700">
                                <p class="mb-4">
                                    <?php _e('もちろんです！OkiTechは初心者の方に特化したコミュニティです。', 'okitech'); ?>
                                </p>
                                <ul class="list-disc pl-6 space-y-2">
                                    <li><?php _e('プログラミング未経験の方も大歓迎', 'okitech'); ?></li>
                                    <li><?php _e('基礎から丁寧に教えます', 'okitech'); ?></li>
                                    <li><?php _e('同じレベルの仲間と一緒に学べます', 'okitech'); ?></li>
                                    <li><?php _e('質問は何度でもOKです', 'okitech'); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <button class="faq-toggle w-full px-8 py-6 text-left hover:bg-gray-50 transition-colors focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-inset">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-gray-800">
                                    <?php _e('何を持参すればいいですか？', 'okitech'); ?>
                                </h3>
                                <svg class="w-6 h-6 text-green-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-content hidden px-8 pb-6">
                            <div class="prose prose-lg text-gray-700">
                                <p class="mb-4">
                                    <?php _e('基本的には手ぶらで参加できますが、あると便利なものをご紹介します。', 'okitech'); ?>
                                </p>
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div>
                                        <h4 class="font-semibold text-green-600 mb-2"><?php _e('必須', 'okitech'); ?></h4>
                                        <ul class="list-disc pl-4 space-y-1 text-sm">
                                            <li><?php _e('筆記用具（メモ用）', 'okitech'); ?></li>
                                            <li><?php _e('飲み物', 'okitech'); ?></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-orange-600 mb-2"><?php _e('あると便利', 'okitech'); ?></h4>
                                        <ul class="list-disc pl-4 space-y-1 text-sm">
                                            <li><?php _e('ノートパソコン（貸出あり）', 'okitech'); ?></li>
                                            <li><?php _e('スマートフォン', 'okitech'); ?></li>
                                            <li><?php _e('名刺（なくてもOK）', 'okitech'); ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <button class="faq-toggle w-full px-8 py-6 text-left hover:bg-gray-50 transition-colors focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-inset">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-gray-800">
                                    <?php _e('服装はどうすればいいですか？', 'okitech'); ?>
                                </h3>
                                <svg class="w-6 h-6 text-green-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-content hidden px-8 pb-6">
                            <div class="prose prose-lg text-gray-700">
                                <p class="mb-4">
                                    <?php _e('特に決まりはありません。リラックスできる服装でお越しください。', 'okitech'); ?>
                                </p>
                                <div class="bg-green-50 p-4 rounded-lg">
                                    <h4 class="font-semibold text-green-800 mb-2"><?php _e('おすすめの服装', 'okitech'); ?></h4>
                                    <ul class="list-disc pl-4 space-y-1 text-sm text-green-700">
                                        <li><?php _e('カジュアルな服装（Tシャツ、ジーンズなど）', 'okitech'); ?></li>
                                        <li><?php _e('動きやすい服装', 'okitech'); ?></li>
                                        <li><?php _e('温度調節しやすい服装', 'okitech'); ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <button class="faq-toggle w-full px-8 py-6 text-left hover:bg-gray-50 transition-colors focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-inset">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-gray-800">
                                    <?php _e('ひとりで参加しても大丈夫ですか？', 'okitech'); ?>
                                </h3>
                                <svg class="w-6 h-6 text-green-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-content hidden px-8 pb-6">
                            <div class="prose prose-lg text-gray-700">
                                <p class="mb-4">
                                    <?php _e('大丈夫です！むしろ、ひとりで参加される方が多いです。', 'okitech'); ?>
                                </p>
                                <ul class="list-disc pl-6 space-y-2">
                                    <li><?php _e('参加者の約8割が初回はひとりで参加', 'okitech'); ?></li>
                                    <li><?php _e('スタッフが丁寧にサポートします', 'okitech'); ?></li>
                                    <li><?php _e('同じ境遇の仲間とすぐに仲良くなれます', 'okitech'); ?></li>
                                    <li><?php _e('途中から参加してもOKです', 'okitech'); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- イベントについて -->
            <section class="mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">
                    <span class="bg-orange-100 text-orange-600 px-4 py-2 rounded-full text-2xl mr-3">Q</span>
                    <?php _e('イベントについて', 'okitech'); ?>
                </h2>
                
                <div class="space-y-6">
                    <!-- FAQ 5 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <button class="faq-toggle w-full px-8 py-6 text-left hover:bg-gray-50 transition-colors focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-inset">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-gray-800">
                                    <?php _e('参加費はかかりますか？', 'okitech'); ?>
                                </h3>
                                <svg class="w-6 h-6 text-orange-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-content hidden px-8 pb-6">
                            <div class="prose prose-lg text-gray-700">
                                <p class="mb-4">
                                    <?php _e('無料のイベントもあります！ただし、一部のワークショップでは材料費がかかる場合があります。', 'okitech'); ?>
                                </p>
                                <div class="bg-green-50 p-4 rounded-lg">
                                    <h4 class="font-semibold text-green-800 mb-2"><?php _e('無料で参加できるイベント', 'okitech'); ?></h4>
                                    <ul class="list-disc pl-4 space-y-1 text-sm text-green-700">
                                        <li><?php _e('勉強会', 'okitech'); ?></li>
                                        <li><?php _e('交流会', 'okitech'); ?></li>
                                        <li><?php _e('Discordでのオンライン交流', 'okitech'); ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 6 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <button class="faq-toggle w-full px-8 py-6 text-left hover:bg-gray-50 transition-colors focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-inset">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-gray-800">
                                    <?php _e('イベントの予約は必要ですか？', 'okitech'); ?>
                                </h3>
                                <svg class="w-6 h-6 text-orange-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-content hidden px-8 pb-6">
                            <div class="prose prose-lg text-gray-700">
                                <p class="mb-4">
                                    <?php _e('はい、事前予約をお願いしています。定員制のため、確実に参加するためにご予約ください。', 'okitech'); ?>
                                </p>
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div>
                                        <h4 class="font-semibold text-green-600 mb-2"><?php _e('予約方法', 'okitech'); ?></h4>
                                        <ul class="list-disc pl-4 space-y-1 text-sm">
                                            <li><?php _e('各イベントページから申し込み', 'okitech'); ?></li>
                                            <li><?php _e('Discordで直接連絡', 'okitech'); ?></li>
                                            <li><?php _e('メールでの申し込み', 'okitech'); ?></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-orange-600 mb-2"><?php _e('注意事項', 'okitech'); ?></h4>
                                        <ul class="list-disc pl-4 space-y-1 text-sm">
                                            <li><?php _e('定員に達した場合、キャンセル待ち', 'okitech'); ?></li>
                                            <li><?php _e('キャンセルは前日まで', 'okitech'); ?></li>
                                            <li><?php _e('当日参加も可能（定員に余裕がある場合）', 'okitech'); ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 7 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <button class="faq-toggle w-full px-8 py-6 text-left hover:bg-gray-50 transition-colors focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-inset">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-gray-800">
                                    <?php _e('途中から参加・途中退席は可能ですか？', 'okitech'); ?>
                                </h3>
                                <svg class="w-6 h-6 text-orange-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-content hidden px-8 pb-6">
                            <div class="prose prose-lg text-gray-700">
                                <p class="mb-4">
                                    <?php _e('はい、可能です。ご都合に合わせて参加してください。', 'okitech'); ?>
                                </p>
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div>
                                        <h4 class="font-semibold text-green-600 mb-2"><?php _e('途中参加', 'okitech'); ?></h4>
                                        <ul class="list-disc pl-4 space-y-1 text-sm">
                                            <li><?php _e('いつでも参加可能', 'okitech'); ?></li>
                                            <li><?php _e('スタッフが状況を説明', 'okitech'); ?></li>
                                            <li><?php _e('他の参加者がサポート', 'okitech'); ?></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-orange-600 mb-2"><?php _e('途中退席', 'okitech'); ?></h4>
                                        <ul class="list-disc pl-4 space-y-1 text-sm">
                                            <li><?php _e('気軽に退席可能', 'okitech'); ?></li>
                                            <li><?php _e('スタッフに一声かけてください', 'okitech'); ?></li>
                                            <li><?php _e('次回の参加も大歓迎', 'okitech'); ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 会場・アクセスについて -->
            <section class="mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">
                    <span class="bg-blue-100 text-blue-600 px-4 py-2 rounded-full text-2xl mr-3">Q</span>
                    <?php _e('会場・アクセスについて', 'okitech'); ?>
                </h2>
                
                <div class="space-y-6">
                    <!-- FAQ 8 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <button class="faq-toggle w-full px-8 py-6 text-left hover:bg-gray-50 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-inset">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-gray-800">
                                    <?php _e('駐車場はありますか？', 'okitech'); ?>
                                </h3>
                                <svg class="w-6 h-6 text-blue-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-content hidden px-8 pb-6">
                            <div class="prose prose-lg text-gray-700">
                                <p class="mb-4">
                                    <?php _e('会場によって異なります。詳しくは各イベントページでご確認ください。', 'okitech'); ?>
                                </p>
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div>
                                        <h4 class="font-semibold text-green-600 mb-2"><?php _e('駐車場がある会場', 'okitech'); ?></h4>
                                        <ul class="list-disc pl-4 space-y-1 text-sm">
                                            <li><?php _e('コワーキングスペース', 'okitech'); ?></li>
                                            <li><?php _e('公民館', 'okitech'); ?></li>
                                            <li><?php _e('商業施設内', 'okitech'); ?></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-orange-600 mb-2"><?php _e('駐車場がない会場', 'okitech'); ?></h4>
                                        <ul class="list-disc pl-4 space-y-1 text-sm">
                                            <li><?php _e('近隣の有料駐車場をご利用', 'okitech'); ?></li>
                                            <li><?php _e('公共交通機関のご利用をお勧め', 'okitech'); ?></li>
                                            <li><?php _e('事前にアクセス方法をご確認', 'okitech'); ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 9 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <button class="faq-toggle w-full px-8 py-6 text-left hover:bg-gray-50 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-inset">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-gray-800">
                                    <?php _e('子供連れでも参加できますか？', 'okitech'); ?>
                                </h3>
                                <svg class="w-6 h-6 text-blue-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-content hidden px-8 pb-6">
                            <div class="prose prose-lg text-gray-700">
                                <p class="mb-4">
                                    <?php _e('イベントによって異なります。子供向けのイベントも開催しています。', 'okitech'); ?>
                                </p>
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div>
                                        <h4 class="font-semibold text-green-600 mb-2"><?php _e('子供連れOKのイベント', 'okitech'); ?></h4>
                                        <ul class="list-disc pl-4 space-y-1 text-sm">
                                            <li><?php _e('家族向けワークショップ', 'okitech'); ?></li>
                                            <li><?php _e('子供向けプログラミング教室', 'okitech'); ?></li>
                                            <li><?php _e('交流会（事前にご相談ください）', 'okitech'); ?></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-orange-600 mb-2"><?php _e('注意事項', 'okitech'); ?></h4>
                                        <ul class="list-disc pl-4 space-y-1 text-sm">
                                            <li><?php _e('事前にスタッフにご相談ください', 'okitech'); ?></li>
                                            <li><?php _e('他の参加者にご配慮をお願いします', 'okitech'); ?></li>
                                            <li><?php _e('託児サービスはありません', 'okitech'); ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- その他の質問 -->
            <section class="mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">
                    <span class="bg-purple-100 text-purple-600 px-4 py-2 rounded-full text-2xl mr-3">Q</span>
                    <?php _e('その他の質問', 'okitech'); ?>
                </h2>
                
                <div class="space-y-6">
                    <!-- FAQ 10 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <button class="faq-toggle w-full px-8 py-6 text-left hover:bg-gray-50 transition-colors focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-inset">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-gray-800">
                                    <?php _e('イベントを主催したい場合はどうすればいいですか？', 'okitech'); ?>
                                </h3>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-content hidden px-8 pb-6">
                            <div class="prose prose-lg text-gray-700">
                                <p class="mb-4">
                                    <?php _e('大歓迎です！OkiTechはみんなで作るコミュニティです。', 'okitech'); ?>
                                </p>
                                <div class="bg-green-50 p-4 rounded-lg">
                                    <h4 class="font-semibold text-green-800 mb-2"><?php _e('主催方法', 'okitech'); ?></h4>
                                    <ul class="list-disc pl-4 space-y-1 text-sm text-green-700">
                                        <li><?php _e('Discordでスタッフにご相談', 'okitech'); ?></li>
                                        <li><?php _e('メールで企画書を送付', 'okitech'); ?></li>
                                        <li><?php _e('既存のイベントでアイデアを共有', 'okitech'); ?></li>
                                    </ul>
                                </div>
                                <p class="mt-4">
                                    <?php _e('初心者の方でも、興味のあるテーマがあれば主催できます。スタッフがサポートいたします。', 'okitech'); ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 11 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <button class="faq-toggle w-full px-8 py-6 text-left hover:bg-gray-50 transition-colors focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-inset">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-gray-800">
                                    <?php _e('質問が解決しませんでした。どうすればいいですか？', 'okitech'); ?>
                                </h3>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-content hidden px-8 pb-6">
                            <div class="prose prose-lg text-gray-700">
                                <p class="mb-4">
                                    <?php _e('お気軽にお問い合わせください。スタッフが丁寧にお答えします。', 'okitech'); ?>
                                </p>
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div>
                                        <h4 class="font-semibold text-green-600 mb-2"><?php _e('お問い合わせ方法', 'okitech'); ?></h4>
                                        <ul class="list-disc pl-4 space-y-1 text-sm">
                                            <li><?php _e('Discordで直接質問', 'okitech'); ?></li>
                                            <li><?php _e('お問い合わせフォーム', 'okitech'); ?></li>
                                            <li><?php _e('メール: info@okitech.jp', 'okitech'); ?></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-orange-600 mb-2"><?php _e('回答時間', 'okitech'); ?></h4>
                                        <ul class="list-disc pl-4 space-y-1 text-sm">
                                            <li><?php _e('Discord: 即座に回答', 'okitech'); ?></li>
                                            <li><?php _e('メール: 24時間以内', 'okitech'); ?></li>
                                            <li><?php _e('緊急時は電話対応', 'okitech'); ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- お問い合わせセクション -->
            <section class="bg-gradient-to-r from-green-600 to-orange-500 text-white py-16 rounded-3xl text-center">
                <h2 class="text-3xl font-bold mb-6">
                    <?php _e('まだ質問がありますか？', 'okitech'); ?>
                </h2>
                <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                    <?php _e('このページに載っていない質問や、詳しく知りたいことがあれば、お気軽にお問い合わせください。', 'okitech'); ?>
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="https://discord.gg/KDBynzKzUA" target="_blank" rel="noopener noreferrer" class="btn-primary bg-white text-green-600 hover:bg-gray-100 text-lg px-8 py-4 rounded-xl inline-flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515a.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0a12.64 12.64 0 0 0-.617-1.25a.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057a19.9 19.9 0 0 0 5.993 3.03a.078.078 0 0 0 .084-.028a14.09 14.09 0 0 0 1.226-1.994a.076.076 0 0 0-.041-.106a13.107 13.107 0 0 1-1.872-.892a.077.077 0 0 1-.008-.128a10.2 10.2 0 0 0 .372-.292a.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127a12.299 12.299 0 0 1-1.873.892a.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028a19.839 19.839 0 0 0 6.002-3.03a.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.956-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.955-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.946 2.418-2.157 2.418z"/>
                        </svg>
                        <?php _e('Discordで質問する', 'okitech'); ?>
                    </a>
                    <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="btn-secondary bg-transparent border-2 border-white text-white hover:bg-white hover:text-green-600 text-lg px-8 py-4 rounded-xl transition-all duration-300">
                        <?php _e('お問い合わせフォーム', 'okitech'); ?>
                    </a>
                </div>
            </section>
            
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const faqToggles = document.querySelectorAll('.faq-toggle');
    
    faqToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const icon = this.querySelector('svg');
            
            // 他のFAQを閉じる
            faqToggles.forEach(otherToggle => {
                if (otherToggle !== this) {
                    const otherContent = otherToggle.nextElementSibling;
                    const otherIcon = otherToggle.querySelector('svg');
                    otherContent.classList.add('hidden');
                    otherIcon.classList.remove('rotate-180');
                }
            });
            
            // 現在のFAQを開閉
            content.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        });
    });
});
</script>

<?php
get_footer();
?> 