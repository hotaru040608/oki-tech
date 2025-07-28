<?php
/**
 * Aboutページテンプレート
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
                    <?php _e('OkiTechについて', 'okitech'); ?>
                </h1>
                <p class="text-xl md:text-2xl text-gray-600 leading-relaxed max-w-3xl mx-auto">
                    <?php _e('沖縄で、新しいことを始める仲間と出会おう', 'okitech'); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- メインコンテンツ -->
    <div class="container mx-auto px-4 py-20">
        
        <?php while (have_posts()) : the_post(); ?>
            
            <!-- ビジョンセクション -->
            <section class="mb-24">
                <div class="max-w-6xl mx-auto">
                    <div class="grid lg:grid-cols-2 gap-16 items-center">
                        <div>
                            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-8">
                                <?php _e('私たちの想い', 'okitech'); ?>
                            </h2>
                            <div class="prose prose-lg text-gray-700 space-y-6">
                                <p class="text-lg leading-relaxed">
                                    沖縄の「OkiTech」は、AIやSNS、プログラミングに興味がある人なら誰でも参加できる、
                                    やさしくて安心できる学べる場所です。
                                </p>
                                <p class="text-lg leading-relaxed">
                                    初めての人向けのやさしい勉強会から、みんなで話し合う交流会まで。
                                    沖縄ののんびりした雰囲気の中で、楽しく新しいことを学び、友達を作れます。
                                </p>
                                <p class="text-lg leading-relaxed">
                                    ひとりで来ても大丈夫。途中から参加してもOK。無料のイベントもあります。
                                    移住者も学生も、みんなで一緒に沖縄の新しい学びの場を作っていきましょう。
                                </p>
                            </div>
                        </div>
                        <div class="relative">
                            <div class="bg-green-600 rounded-3xl p-10 text-white shadow-2xl">
                                <h3 class="text-2xl font-bold mb-6"><?php _e('OkiTechの3つの特徴', 'okitech'); ?></h3>
                                <ul class="space-y-5">
                                    <li class="flex items-start">
                                        <span class="bg-white text-green-600 rounded-full w-8 h-8 flex items-center justify-center text-sm font-bold mr-4 mt-0.5 shadow-md">1</span>
                                        <span class="text-lg"><?php _e('初心者でも安心して参加できる', 'okitech'); ?></span>
                                    </li>
                                    <li class="flex items-start">
                                        <span class="bg-white text-green-600 rounded-full w-8 h-8 flex items-center justify-center text-sm font-bold mr-4 mt-0.5 shadow-md">2</span>
                                        <span class="text-lg"><?php _e('沖縄のリラックスした雰囲気', 'okitech'); ?></span>
                                    </li>
                                    <li class="flex items-start">
                                        <span class="bg-white text-green-600 rounded-full w-8 h-8 flex items-center justify-center text-sm font-bold mr-4 mt-0.5 shadow-md">3</span>
                                        <span class="text-lg"><?php _e('みんなで一緒に成長できる', 'okitech'); ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 活動内容セクション -->
            <section class="mb-24 bg-gray-50 py-20 rounded-3xl">
                <div class="max-w-6xl mx-auto px-4">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-16 text-center">
                        <?php _e('活動内容', 'okitech'); ?>
                    </h2>
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
                        <!-- 勉強会 -->
                        <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                                <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-4"><?php _e('勉強会', 'okitech'); ?></h3>
                            <p class="text-gray-600 leading-relaxed">
                                <?php _e('AI、SNS、プログラミングなど、初心者向けのやさしい勉強会を開催しています。', 'okitech'); ?>
                            </p>
                        </div>

                        <!-- 交流会 -->
                        <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                                <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-4"><?php _e('交流会', 'okitech'); ?></h3>
                            <p class="text-gray-600 leading-relaxed">
                                <?php _e('みんなで話し合う交流会で、新しい友達を作り、情報交換を楽しみましょう。', 'okitech'); ?>
                            </p>
                        </div>

                        <!-- ワークショップ -->
                        <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                                <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-4"><?php _e('ワークショップ', 'okitech'); ?></h3>
                            <p class="text-gray-600 leading-relaxed">
                                <?php _e('実際に手を動かして学べるワークショップで、実践的なスキルを身につけましょう。', 'okitech'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 参加者の声セクション -->
            <section class="mb-24">
                <div class="max-w-6xl mx-auto">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-16 text-center">
                        <?php _e('参加者の声', 'okitech'); ?>
                    </h2>
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
                        <!-- 声1 -->
                        <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="flex items-center mb-6">
                                <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center mr-4">
                                    <span class="text-green-600 font-bold text-lg">A</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 text-lg"><?php _e('移住者・30代', 'okitech'); ?></h4>
                                    <p class="text-sm text-gray-600"><?php _e('プログラミング初心者', 'okitech'); ?></p>
                                </div>
                            </div>
                            <p class="text-gray-700 italic leading-relaxed">
                                "<?php _e('沖縄に移住してから、新しいことを始めたいと思っていました。OkiTechでプログラミングを学び始めて、同じ志を持つ仲間と出会えて本当に嬉しいです。', 'okitech'); ?>"
                            </p>
                        </div>

                        <!-- 声2 -->
                        <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="flex items-center mb-6">
                                <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center mr-4">
                                    <span class="text-green-600 font-bold text-lg">B</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 text-lg"><?php _e('学生・20代', 'okitech'); ?></h4>
                                    <p class="text-sm text-gray-600"><?php _e('AIに興味あり', 'okitech'); ?></p>
                                </div>
                            </div>
                            <p class="text-gray-700 italic leading-relaxed">
                                "<?php _e('AIについて詳しく知りたいと思っていましたが、どこで学べばいいかわかりませんでした。OkiTechの勉強会で基礎から教えてもらえて、とても分かりやすかったです。', 'okitech'); ?>"
                            </p>
                        </div>

                        <!-- 声3 -->
                        <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="flex items-center mb-6">
                                <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center mr-4">
                                    <span class="text-green-600 font-bold text-lg">C</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 text-lg"><?php _e('リモートワーカー・40代', 'okitech'); ?></h4>
                                    <p class="text-sm text-gray-600"><?php _e('SNS活用中', 'okitech'); ?></p>
                                </div>
                            </div>
                            <p class="text-gray-700 italic leading-relaxed">
                                "<?php _e('リモートワークで沖縄に住んでいますが、なかなか地元の人と知り合う機会がありませんでした。OkiTechの交流会で素敵な仲間と出会えて、沖縄での生活がもっと楽しくなりました。', 'okitech'); ?>"
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 参加方法セクション -->
            <section class="mb-24 bg-orange-50 py-20 rounded-3xl">
                <div class="max-w-5xl mx-auto text-center px-4">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-16">
                        <?php _e('参加方法', 'okitech'); ?>
                    </h2>
                    <div class="grid md:grid-cols-4 gap-10">
                        <!-- ステップ1 -->
                        <div class="text-center">
                            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                                <span class="text-3xl font-bold text-green-600">1</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-4"><?php _e('Discordに参加', 'okitech'); ?></h3>
                            <p class="text-gray-600 leading-relaxed"><?php _e('まずはオンラインでみんなのやりとりを見てみてください', 'okitech'); ?></p>
                        </div>

                        <!-- ステップ2 -->
                        <div class="text-center">
                            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                                <span class="text-3xl font-bold text-green-600">2</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-4"><?php _e('イベントをチェック', 'okitech'); ?></h3>
                            <p class="text-gray-600 leading-relaxed"><?php _e('興味のあるイベントを見つけてください', 'okitech'); ?></p>
                        </div>

                        <!-- ステップ3 -->
                        <div class="text-center">
                            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                                <span class="text-3xl font-bold text-green-600">3</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-4"><?php _e('気軽に参加', 'okitech'); ?></h3>
                            <p class="text-gray-600 leading-relaxed"><?php _e('ひとりでも大丈夫。まずは見に来てください', 'okitech'); ?></p>
                        </div>

                        <!-- ステップ4 -->
                        <div class="text-center">
                            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                                <span class="text-3xl font-bold text-green-600">4</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-4"><?php _e('仲間とつながる', 'okitech'); ?></h3>
                            <p class="text-gray-600 leading-relaxed"><?php _e('新しい友達を作って、一緒に学びましょう', 'okitech'); ?></p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Discord参加促進セクション（CTAとして機能） -->
            <section class="bg-green-600 text-white py-20 rounded-3xl shadow-2xl">
                <div class="max-w-5xl mx-auto text-center px-4">
                    <div class="mb-12">
                        <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto mb-8 shadow-xl">
                            <svg class="w-12 h-12 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515a.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0a12.64 12.64 0 0 0-.617-1.25a.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057a19.9 19.9 0 0 0 5.993 3.03a.078.078 0 0 0 .084-.028a14.09 14.09 0 0 0 1.226-1.994a.076.076 0 0 0-.041-.106a13.107 13.107 0 0 1-1.872-.892a.077.077 0 0 1-.008-.128a10.2 10.2 0 0 0 .372-.292a.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127a12.299 12.299 0 0 1-1.873.892a.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028a19.839 19.839 0 0 0 6.002-3.03a.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.956-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.955-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.946 2.418-2.157 2.418z"/>
                            </svg>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold mb-6">
                            <?php _e('まずはDiscordで気軽に話してみませんか？', 'okitech'); ?>
                        </h2>
                        <p class="text-xl mb-12 opacity-90 max-w-3xl mx-auto">
                            <?php _e('イベントの前に、オンラインでみんなとつながってみてください。質問や相談も気軽にできます。', 'okitech'); ?>
                        </p>
                    </div>
                    <div class="grid md:grid-cols-3 gap-8 mb-12">
                        <div class="bg-white bg-opacity-10 rounded-2xl p-8 backdrop-blur-sm">
                            <div class="w-14 h-14 bg-white bg-opacity-20 rounded-xl flex items-center justify-center mx-auto mb-6">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                            </div>
                            <h3 class="font-bold text-white mb-3 text-lg"><?php _e('気軽に質問', 'okitech'); ?></h3>
                            <p class="text-white text-opacity-90"><?php _e('初心者でも安心して質問できます', 'okitech'); ?></p>
                        </div>
                        <div class="bg-white bg-opacity-10 rounded-2xl p-8 backdrop-blur-sm">
                            <div class="w-14 h-14 bg-white bg-opacity-20 rounded-xl flex items-center justify-center mx-auto mb-6">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <h3 class="font-bold text-white mb-3 text-lg"><?php _e('仲間と交流', 'okitech'); ?></h3>
                            <p class="text-white text-opacity-90"><?php _e('同じ興味を持つ仲間と出会えます', 'okitech'); ?></p>
                        </div>
                        <div class="bg-white bg-opacity-10 rounded-2xl p-8 backdrop-blur-sm">
                            <div class="w-14 h-14 bg-white bg-opacity-20 rounded-xl flex items-center justify-center mx-auto mb-6">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <h3 class="font-bold text-white mb-3 text-lg"><?php _e('最新情報', 'okitech'); ?></h3>
                            <p class="text-white text-opacity-90"><?php _e('イベント情報をいち早くゲット', 'okitech'); ?></p>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-6 justify-center">
                        <a href="https://discord.gg/KDBynzKzUA" target="_blank" rel="noopener noreferrer" class="btn-primary bg-white text-green-600 hover:bg-gray-100 text-lg px-10 py-4 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 inline-flex items-center justify-center">
                            <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515a.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0a12.64 12.64 0 0 0-.617-1.25a.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057a19.9 19.9 0 0 0 5.993 3.03a.078.078 0 0 0 .084-.028a14.09 14.09 0 0 0 1.226-1.994a.076.076 0 0 0-.041-.106a13.107 13.107 0 0 1-1.872-.892a.077.077 0 0 1-.008-.128a10.2 10.2 0 0 0 .372-.292a.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127a12.299 12.299 0 0 1-1.873.892a.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028a19.839 19.839 0 0 0 6.002-3.03a.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.956-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.955-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.946 2.418-2.157 2.418z"/>
                            </svg>
                            <?php _e('Discordに参加する', 'okitech'); ?>
                        </a>
                        <a href="<?php echo get_post_type_archive_link('event'); ?>" class="btn-secondary bg-transparent border-2 border-white text-white hover:bg-white hover:text-green-600 text-lg px-10 py-4 rounded-xl transition-all duration-300">
                            <?php _e('イベントをチェック', 'okitech'); ?>
                        </a>
                    </div>
                </div>
            </section>

        <?php endwhile; ?>
        
    </div>
</main>

<?php
get_footer();
?> 