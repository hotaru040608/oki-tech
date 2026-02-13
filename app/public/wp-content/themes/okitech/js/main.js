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
        
        // IntersectionObserver を使った機能
        if ('IntersectionObserver' in window) {
            // スクロールアニメーション
            var scrollObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        scrollObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.15 });

            document.querySelectorAll('.scroll-fade-in, .scroll-fade-in-left, .scroll-fade-in-right, .scroll-scale-in').forEach(function(el) {
                scrollObserver.observe(el);
            });

            // 画像の遅延読み込み（Lazy Loading）
            var imageObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(function(img) {
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

        // カウントダウンタイマー
        var countdownEl = document.getElementById('hero-countdown');
        if (countdownEl) {
            var targetDate = countdownEl.getAttribute('data-target');
            if (targetDate) {
                var target = new Date(targetDate).getTime();

                function updateCountdown() {
                    var now = new Date().getTime();
                    var diff = target - now;

                    if (diff <= 0) {
                        countdownEl.innerHTML = '<p class="text-gray-500 text-sm">このイベントは開始しました</p>';
                        return;
                    }

                    var days = Math.floor(diff / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((diff % (1000 * 60)) / 1000);

                    // 24時間以内なら緊急スタイル
                    var isUrgent = diff < 24 * 60 * 60 * 1000;
                    countdownEl.className = 'countdown-timer' + (isUrgent ? ' countdown-urgent' : '');

                    countdownEl.innerHTML =
                        '<div class="countdown-unit"><span class="countdown-number">' + days + '</span><span class="countdown-label">日</span></div>' +
                        '<div class="countdown-unit"><span class="countdown-number">' + String(hours).padStart(2, '0') + '</span><span class="countdown-label">時間</span></div>' +
                        '<div class="countdown-unit"><span class="countdown-number">' + String(minutes).padStart(2, '0') + '</span><span class="countdown-label">分</span></div>' +
                        '<div class="countdown-unit"><span class="countdown-number">' + String(seconds).padStart(2, '0') + '</span><span class="countdown-label">秒</span></div>';
                }

                updateCountdown();
                setInterval(updateCountdown, 1000);
            }
        }

        // 数字カウントアップアニメーション
        if ('IntersectionObserver' in window) {
            var countUpObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var el = entry.target;
                        var target = parseInt(el.getAttribute('data-count'), 10);
                        var suffix = el.getAttribute('data-suffix') || '';
                        var prefix = el.getAttribute('data-prefix') || '';
                        var duration = 1500;
                        var start = 0;
                        var startTime = null;

                        // prefers-reduced-motion チェック
                        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                            el.textContent = prefix + target + suffix;
                            countUpObserver.unobserve(el);
                            return;
                        }

                        function animateCount(timestamp) {
                            if (!startTime) startTime = timestamp;
                            var progress = Math.min((timestamp - startTime) / duration, 1);
                            // easeOutQuad
                            var eased = 1 - (1 - progress) * (1 - progress);
                            var current = Math.floor(eased * target);
                            el.textContent = prefix + current + suffix;
                            if (progress < 1) {
                                requestAnimationFrame(animateCount);
                            } else {
                                el.textContent = prefix + target + suffix;
                            }
                        }

                        requestAnimationFrame(animateCount);
                        countUpObserver.unobserve(el);
                    }
                });
            }, { threshold: 0.3 });

            document.querySelectorAll('[data-count]').forEach(function(el) {
                countUpObserver.observe(el);
            });
        }

    });

})(jQuery);