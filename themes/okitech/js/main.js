/**
 * OkiTech Theme JavaScript
 * 
 * @package OkiTech
 */

(function($) {
    'use strict';

    // DOM読み込み完了後に実行
    $(document).ready(function() {
        
        // モバイルメニューの切り替え
        $('.menu-toggle').on('click', function() {
            const menu = $('#primary-menu');
            const button = $(this);
            const isExpanded = button.attr('aria-expanded') === 'true';
            
            // メニューの表示/非表示を切り替え
            menu.toggleClass('hidden');
            menu.toggleClass('block');
            
            // ボタンのaria-expanded属性を更新
            button.attr('aria-expanded', !isExpanded);
            
            // メニューが表示されている場合は、モバイル用のスタイルを適用
            if (!menu.hasClass('hidden')) {
                menu.addClass('absolute top-full left-0 w-full bg-white shadow-lg border-t border-gray-200 py-4 space-y-4');
                menu.find('li').addClass('block px-4');
                menu.find('a').addClass('block py-2');
            } else {
                menu.removeClass('absolute top-full left-0 w-full bg-white shadow-lg border-t border-gray-200 py-4 space-y-4');
                menu.find('li').removeClass('block px-4');
                menu.find('a').removeClass('block py-2');
            }
        });
        
        // メニュー外をクリックした時にメニューを閉じる
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.main-navigation').length) {
                $('#primary-menu').addClass('hidden').removeClass('block absolute top-full left-0 w-full bg-white shadow-lg border-t border-gray-200 py-4 space-y-4');
                $('.menu-toggle').attr('aria-expanded', 'false');
            }
        });
        
        // スムーススクロール（アンカーリンク用）
        $('a[href^="#"]').on('click', function(e) {
            const target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 800);
            }
        });
        
        // スクロール時のヘッダー背景変更
        $(window).on('scroll', function() {
            const header = $('.site-header');
            if ($(window).scrollTop() > 50) {
                header.addClass('bg-white/95 backdrop-blur-sm');
            } else {
                header.removeClass('bg-white/95 backdrop-blur-sm');
            }
        });
        
        // イベントカードのホバーエフェクト
        $('.event-card').on('mouseenter', function() {
            $(this).addClass('transform scale-105');
        }).on('mouseleave', function() {
            $(this).removeClass('transform scale-105');
        });
        
        // 画像の遅延読み込み（Lazy Loading）
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });
            
            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }
        
        // フォームのバリデーション
        $('form').on('submit', function(e) {
            const requiredFields = $(this).find('[required]');
            let isValid = true;
            
            requiredFields.each(function() {
                if (!$(this).val().trim()) {
                    isValid = false;
                    $(this).addClass('border-red-500');
                } else {
                    $(this).removeClass('border-red-500');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                alert('必須項目を入力してください。');
            }
        });
        
        // 検索フォームの改善
        $('.search-form input[type="search"]').on('focus', function() {
            $(this).parent().addClass('ring-2 ring-green-500');
        }).on('blur', function() {
            $(this).parent().removeClass('ring-2 ring-green-500');
        });
        
        // ページトップに戻るボタン
        const backToTop = $('<button>', {
            class: 'fixed bottom-8 right-8 bg-green-600 text-white p-3 rounded-full shadow-lg hover:bg-green-700 transition-all duration-300 opacity-0 pointer-events-none',
            html: '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>'
        });
        
        $('body').append(backToTop);
        
        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 300) {
                backToTop.addClass('opacity-100 pointer-events-auto');
            } else {
                backToTop.removeClass('opacity-100 pointer-events-auto');
            }
        });
        
        backToTop.on('click', function() {
            $('html, body').animate({
                scrollTop: 0
            }, 800);
        });
        
    });
    
})(jQuery); 