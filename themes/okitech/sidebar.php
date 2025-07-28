<?php
/**
 * サイドバーテンプレート
 *
 * @package OkiTech
 */

if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>

<aside id="secondary" class="widget-area lg:ml-8">
    <div class="sticky top-8 space-y-6">
        
        <!-- 動的ウィジェットエリア -->
        <?php dynamic_sidebar('sidebar-1'); ?>
        
    </div>
</aside> 