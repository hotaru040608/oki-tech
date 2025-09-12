<?php
/**
 * 投稿が見つからない場合のテンプレート
 *
 * @package OkiTech
 */
?>

<section class="no-results not-found text-center py-16">
    <div class="container mx-auto px-4">
        
        <!-- アイコン -->
        <div class="mb-8">
            <svg class="w-24 h-24 mx-auto text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
            </svg>
        </div>
        
        <!-- タイトル -->
        <header class="page-header mb-6">
            <h1 class="page-title text-3xl font-bold text-gray-800 mb-4">
                <?php _e('投稿が見つかりませんでした', 'okitech'); ?>
            </h1>
        </header>

        <!-- メッセージ -->
        <div class="page-content prose prose-lg mx-auto max-w-2xl">
            <?php if (is_search()) : ?>
                
                <p class="text-gray-600 mb-8">
                    <?php _e('申し訳ございませんが、検索条件に一致する投稿が見つかりませんでした。', 'okitech'); ?>
                </p>
                
                <div class="search-form mb-8">
                    <?php get_search_form(); ?>
                </div>
                
            <?php elseif (is_home() && current_user_can('publish_posts')) : ?>
                
                <p class="text-gray-600 mb-8">
                    <?php _e('最初の投稿を作成する準備ができましたか？', 'okitech'); ?>
                </p>
                
                <a href="<?php echo esc_url(admin_url('post-new.php')); ?>" class="btn-primary">
                    <?php _e('最初の投稿を作成', 'okitech'); ?>
                </a>
                
            <?php else : ?>
                
                <p class="text-gray-600 mb-8">
                    <?php _e('お探しのものを見つけることができませんでした。検索をお試しください。', 'okitech'); ?>
                </p>
                
                <div class="search-form mb-8">
                    <?php get_search_form(); ?>
                </div>
                
            <?php endif; ?>
        </div>
        
        <!-- ナビゲーション -->
        <div class="mt-12">
            <h3 class="text-lg font-semibold mb-4"><?php _e('他のページを探す', 'okitech'); ?></h3>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-secondary">
                    <?php _e('ホームに戻る', 'okitech'); ?>
                </a>
                <a href="<?php echo get_post_type_archive_link('event'); ?>" class="btn-primary">
                    <?php _e('イベント一覧', 'okitech'); ?>
                </a>
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="btn-primary">
                    <?php _e('ブログ一覧', 'okitech'); ?>
                </a>
            </div>
        </div>
        
    </div>
</section> 