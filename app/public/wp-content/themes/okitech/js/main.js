/**
 * OkiTech Theme JavaScript
 *
 * @package OkiTech
 */

(function($) {
    'use strict';

    $(document).ready(function() {

        // ─── ヘッダースクロール効果 ───
        var header = document.querySelector('.site-header');
        var lastScroll = 0;

        function handleHeaderScroll() {
            var currentScroll = window.pageYOffset;

            if (currentScroll > 20) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }

            lastScroll = currentScroll;
        }

        window.addEventListener('scroll', handleHeaderScroll, { passive: true });
        handleHeaderScroll();

        // ─── モバイルメニュー ───
        var menuToggle = document.querySelector('.menu-toggle');
        var primaryMenu = document.getElementById('primary-menu');

        if (menuToggle && primaryMenu) {
            menuToggle.addEventListener('click', function() {
                var isExpanded = this.getAttribute('aria-expanded') === 'true';
                this.setAttribute('aria-expanded', !isExpanded);

                if (primaryMenu.classList.contains('hidden')) {
                    primaryMenu.classList.remove('hidden');
                    primaryMenu.classList.add('block', 'absolute', 'top-full', 'left-0', 'w-full', 'bg-white', 'shadow-xl', 'border-t', 'border-gray-100', 'py-4', 'space-y-1');
                    primaryMenu.style.backdropFilter = 'blur(20px)';
                    primaryMenu.querySelectorAll('li').forEach(function(li) {
                        li.classList.add('px-4');
                    });
                    primaryMenu.querySelectorAll('a').forEach(function(a) {
                        a.classList.add('block', 'py-3', 'px-2', 'rounded-lg', 'hover:bg-gray-50', 'transition-colors');
                    });
                } else {
                    primaryMenu.classList.add('hidden');
                    primaryMenu.classList.remove('block', 'absolute', 'top-full', 'left-0', 'w-full', 'bg-white', 'shadow-xl', 'border-t', 'border-gray-100', 'py-4', 'space-y-1');
                    primaryMenu.style.backdropFilter = '';
                    primaryMenu.querySelectorAll('li').forEach(function(li) {
                        li.classList.remove('px-4');
                    });
                    primaryMenu.querySelectorAll('a').forEach(function(a) {
                        a.classList.remove('block', 'py-3', 'px-2', 'rounded-lg', 'hover:bg-gray-50', 'transition-colors');
                    });
                }
            });

            // メニュー外クリックで閉じる
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.main-navigation')) {
                    primaryMenu.classList.add('hidden');
                    primaryMenu.classList.remove('block', 'absolute', 'top-full', 'left-0', 'w-full', 'bg-white', 'shadow-xl', 'border-t', 'border-gray-100', 'py-4', 'space-y-1');
                    if (menuToggle) menuToggle.setAttribute('aria-expanded', 'false');
                }
            });
        }

        // ─── スムーススクロール ───
        document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
            anchor.addEventListener('click', function(e) {
                var target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    e.preventDefault();
                    var offset = header ? header.offsetHeight + 20 : 100;
                    var top = target.getBoundingClientRect().top + window.pageYOffset - offset;
                    window.scrollTo({ top: top, behavior: 'smooth' });
                }
            });
        });

        // ─── IntersectionObserver: スクロールアニメーション ───
        if ('IntersectionObserver' in window) {
            var scrollObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        scrollObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

            document.querySelectorAll('.scroll-fade-in, .scroll-fade-in-left, .scroll-fade-in-right, .scroll-scale-in').forEach(function(el) {
                scrollObserver.observe(el);
            });

            // 画像の遅延読み込み
            var imageObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var img = entry.target;
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                            img.classList.remove('lazy');
                        }
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(function(img) {
                imageObserver.observe(img);
            });
        }

        // ─── カウントダウンタイマー ───
        var countdownEl = document.getElementById('hero-countdown');
        if (countdownEl) {
            var targetDate = countdownEl.getAttribute('data-target');
            if (targetDate) {
                var target = new Date(targetDate).getTime();

                function updateCountdown() {
                    var now = new Date().getTime();
                    var diff = target - now;

                    if (diff <= 0) {
                        countdownEl.innerHTML = '<p class="text-white/60 text-sm">このイベントは開始しました</p>';
                        return;
                    }

                    var days = Math.floor(diff / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((diff % (1000 * 60)) / 1000);

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

        // ─── 数字カウントアップアニメーション ───
        if ('IntersectionObserver' in window) {
            var countUpObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var el = entry.target;
                        var targetVal = parseInt(el.getAttribute('data-count'), 10);
                        var suffix = el.getAttribute('data-suffix') || '';
                        var prefix = el.getAttribute('data-prefix') || '';
                        var duration = 1800;
                        var startTime = null;

                        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                            el.textContent = prefix + targetVal + suffix;
                            countUpObserver.unobserve(el);
                            return;
                        }

                        function animateCount(timestamp) {
                            if (!startTime) startTime = timestamp;
                            var progress = Math.min((timestamp - startTime) / duration, 1);
                            var eased = 1 - Math.pow(1 - progress, 3);
                            var current = Math.floor(eased * targetVal);
                            el.textContent = prefix + current + suffix;
                            if (progress < 1) {
                                requestAnimationFrame(animateCount);
                            } else {
                                el.textContent = prefix + targetVal + suffix;
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

        // ─── バックトゥトップボタン ───
        var backToTop = document.createElement('button');
        backToTop.className = 'back-to-top';
        backToTop.setAttribute('aria-label', 'ページトップに戻る');
        backToTop.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>';
        document.body.appendChild(backToTop);

        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 400) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        }, { passive: true });

        backToTop.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // ─── フォームバリデーション ───
        document.querySelectorAll('form').forEach(function(form) {
            form.addEventListener('submit', function(e) {
                var requiredFields = form.querySelectorAll('[required]');
                var isValid = true;

                requiredFields.forEach(function(field) {
                    if (!field.value.trim()) {
                        isValid = false;
                        field.style.borderColor = '#ef4444';
                        field.style.boxShadow = '0 0 0 3px rgba(239,68,68,0.1)';
                    } else {
                        field.style.borderColor = '';
                        field.style.boxShadow = '';
                    }
                });

                if (!isValid) {
                    e.preventDefault();
                }
            });
        });

        // ─── 検索フォームのフォーカスエフェクト ───
        document.querySelectorAll('.search-form input[type="search"]').forEach(function(input) {
            input.addEventListener('focus', function() {
                this.parentElement.style.boxShadow = '0 0 0 3px rgba(5, 150, 105, 0.15)';
                this.parentElement.style.borderColor = '#059669';
            });
            input.addEventListener('blur', function() {
                this.parentElement.style.boxShadow = '';
                this.parentElement.style.borderColor = '';
            });
        });

        // ─── パララックス効果（ヒーロー背景） ───
        var heroSection = document.querySelector('.hero-section');
        if (heroSection && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            var shapes = heroSection.querySelectorAll('.hero-floating-shape');

            window.addEventListener('scroll', function() {
                var scrollY = window.pageYOffset;
                var heroHeight = heroSection.offsetHeight;

                if (scrollY < heroHeight) {
                    var progress = scrollY / heroHeight;

                    shapes.forEach(function(shape, i) {
                        var speed = 0.3 + (i * 0.15);
                        shape.style.transform = 'translateY(' + (scrollY * speed) + 'px)';
                    });
                }
            }, { passive: true });
        }

    });

})(jQuery);
