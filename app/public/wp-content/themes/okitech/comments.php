<?php
/**
 * コメントテンプレート
 *
 * @package OkiTech
 */

// パスワード保護された投稿の場合は表示しない
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area mt-12 pt-8 border-t border-gray-200">

    <?php if (have_comments()) : ?>
        
        <!-- コメント一覧 -->
        <div class="comments-list mb-8">
            <h3 class="comments-title text-2xl font-bold text-gray-800 mb-6">
                <?php
                $comments_number = get_comments_number();
                if ($comments_number === '1') {
                    printf(__('1件のコメント', 'okitech'));
                } else {
                    printf(
                        _nx(
                            '%1$s件のコメント',
                            '%1$s件のコメント',
                            $comments_number,
                            'comments title',
                            'okitech'
                        ),
                        number_format_i18n($comments_number)
                    );
                }
                ?>
            </h3>

            <ol class="comment-list space-y-6">
                <?php
                wp_list_comments(array(
                    'style'       => 'ol',
                    'short_ping'  => true,
                    'avatar_size' => 60,
                    'callback'    => 'okitech_comment_callback',
                ));
                ?>
            </ol>
        </div>

        <!-- コメントナビゲーション -->
        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav class="comment-navigation flex justify-between items-center py-4 border-t border-gray-200">
                <div class="nav-previous">
                    <?php previous_comments_link(__('← 前のコメント', 'okitech')); ?>
                </div>
                <div class="nav-next">
                    <?php next_comments_link(__('次のコメント →', 'okitech')); ?>
                </div>
            </nav>
        <?php endif; ?>

    <?php endif; ?>

    <!-- コメントが閉じられている場合のメッセージ -->
    <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        <div class="comment-respond bg-yellow-50 border border-yellow-200 rounded-lg p-6 mb-8">
            <p class="text-yellow-800 font-medium">
                <?php _e('コメントは閉じられています。', 'okitech'); ?>
            </p>
        </div>
    <?php endif; ?>

    <!-- コメントフォーム -->
    <?php if (comments_open()) : ?>
        <div class="comment-respond bg-gray-50 rounded-lg p-6">
            <h3 class="comment-reply-title text-xl font-bold text-gray-800 mb-6">
                <?php _e('コメントを書く', 'okitech'); ?>
            </h3>
            
            <?php
            comment_form(array(
                'title_reply'          => '',
                'title_reply_to'       => __('%s に返信', 'okitech'),
                'cancel_reply_link'    => __('返信をキャンセル', 'okitech'),
                'label_submit'         => __('コメントを投稿', 'okitech'),
                'comment_field'        => '<div class="comment-form-comment mb-6">
                                            <label for="comment" class="block text-sm font-medium text-gray-700 mb-2">' . __('コメント', 'okitech') . ' <span class="text-red-500">*</span></label>
                                            <textarea id="comment" name="comment" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent resize-vertical" rows="5" placeholder="' . __('コメントを入力してください...', 'okitech') . '" required></textarea>
                                          </div>',
                'comment_notes_before' => '<div class="comment-notes bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                                            <p class="text-blue-800 text-sm">
                                                ' . __('メールアドレスが公開されることはありません。必須項目は * でマークされています。', 'okitech') . '
                                            </p>
                                          </div>',
                'fields'               => array(
                    'author' => '<div class="comment-form-author mb-4">
                                    <label for="author" class="block text-sm font-medium text-gray-700 mb-2">' . __('お名前', 'okitech') . ' <span class="text-red-500">*</span></label>
                                    <input id="author" name="author" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="' . __('お名前を入力してください', 'okitech') . '" required />
                                </div>',
                    'email'  => '<div class="comment-form-email mb-4">
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">' . __('メールアドレス', 'okitech') . ' <span class="text-red-500">*</span></label>
                                    <input id="email" name="email" type="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="' . __('example@email.com', 'okitech') . '" required />
                                </div>',
                    'url'    => '<div class="comment-form-url mb-6">
                                    <label for="url" class="block text-sm font-medium text-gray-700 mb-2">' . __('ウェブサイト', 'okitech') . '</label>
                                    <input id="url" name="url" type="url" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="' . __('https://example.com', 'okitech') . '" />
                                </div>',
                ),
                'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s bg-green-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-green-700 transition-colors cursor-pointer" value="%4$s" />',
                'submit_field'         => '<div class="form-submit">%1$s %2$s</div>',
            ));
            ?>
        </div>
    <?php endif; ?>

</div> 