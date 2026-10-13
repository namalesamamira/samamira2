<?php if (empty($hide_contact_section)): ?>
<section id="quote" class="relative pt-[104px] pb-24 px-6 border-t border-zinc-800 scroll-mt-28 overflow-hidden">
    <div class="absolute inset-0 -z-10 bg-cover bg-center bg-no-repeat will-change-transform" style="background-image: linear-gradient(rgba(10,10,10,0.72), rgba(10,10,10,0.86)), url('img/Contact Us Pic.jpg'); transform: translate3d(0, 0, 0) scale(1.12);"></div>
    <div class="max-w-6xl mx-auto bg-brand-card/60 border border-zinc-700/70 rounded-3xl shadow-2xl relative overflow-hidden backdrop-blur-sm">
        <div class="absolute -right-20 -bottom-20 w-64 h-64 bg-brand-gold/5 blur-[100px] rounded-full pointer-events-none"></div>

        <div class="relative z-10 p-8 md:p-12">

            <div class="grid grid-cols-1 lg:grid-cols-10 gap-10">
            <aside class="lg:col-span-3 lg:pr-8 lg:border-r border-zinc-800/90">
                <h2 class="text-2xl md:text-3xl font-extrabold mb-3 font-serif">Contacts</h2>
                <p class="text-zinc-400 text-sm md:text-base mb-8">
                    Whatsapp the number below, we will respond with a text or call to set up a meeting either in person or online.
<br>

                </p>

                <div class="space-y-6 text-sm">
                    <div>
                        <p class="text-xs uppercase tracking-widest text-zinc-500 font-bold mb-2">Phone</p>
                        <a href="tel:+254721986873" class="text-zinc-100 hover:text-brand-gold transition">+254 721 986873</a>
                    </div>

                    <div>
                        <p class="text-xs uppercase tracking-widest text-zinc-500 font-bold mb-2">Emails</p>
                        <a href="mailto:brian@aqueous.mobi" class="block text-zinc-100 hover:text-brand-gold transition">brian@aqueous.mobi</a>
                        <a href="mailto:carol@aqueous.mobi" class="block text-zinc-100 hover:text-brand-gold transition mt-1">Carol@aqueous.mobi</a>
                    </div>

                    <div>
                        <p class="text-xs uppercase tracking-widest text-zinc-500 font-bold mb-2">Socials</p>
                        <div class="flex flex-wrap gap-3">
                            <a href="https://www.instagram.com/aqueouskenya" target="_blank" rel="noopener noreferrer" aria-label="Instagram" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-zinc-700 text-zinc-200 hover:border-brand-gold hover:text-brand-gold transition">
                                <svg alt="Instagram" viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor" aria-hidden="true">
                                    <path d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2zm0 1.8A3.95 3.95 0 0 0 3.8 7.75v8.5a3.95 3.95 0 0 0 3.95 3.95h8.5a3.95 3.95 0 0 0 3.95-3.95v-8.5a3.95 3.95 0 0 0-3.95-3.95h-8.5zm8.9 1.45a1.2 1.2 0 1 1 0 2.4 1.2 1.2 0 0 1 0-2.4zM12 7a5 5 0 1 1 0 10 5 5 0 0 1 0-10zm0 1.8a3.2 3.2 0 1 0 0 6.4 3.2 3.2 0 0 0 0-6.4z"></path>
                                </svg>
                            </a>
                            <a href="https://www.facebook.com/AQUEOUS-235584860117/timeline/" target="_blank" rel="noopener noreferrer" aria-label="Facebook" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-zinc-700 text-zinc-200 hover:border-brand-gold hover:text-brand-gold transition">
                                <svg alt="Facebook" viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor" aria-hidden="true">
                                    <path d="M13.5 22v-8h2.7l.4-3.1h-3.1V8.9c0-.9.3-1.5 1.6-1.5h1.7V4.6c-.3 0-1.3-.1-2.5-.1-2.5 0-4.1 1.5-4.1 4.3v2.1H8.5V14h2.2v8h2.8z"></path>
                                </svg>
                            </a>
                            <a href="https://x.com/AQUEOUSKenya" target="_blank" rel="noopener noreferrer" aria-label="X" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-zinc-700 text-zinc-200 hover:border-brand-gold hover:text-brand-gold transition">
                                <svg alt="X" viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor" aria-hidden="true">
                                    <path d="M6.4 8.7a1.8 1.8 0 1 1 0-3.6 1.8 1.8 0 0 1 0 3.6zM4.9 19V10.3h3V19h-3zm4.8 0V10.3h2.9v1.2h.1c.4-.8 1.4-1.6 2.9-1.6 3.1 0 3.6 2 3.6 4.7V19h-3v-3.9c0-.9 0-2.2-1.4-2.2s-1.6 1-1.6 2.1V19H9.7z"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="lg:col-span-7">
                <div class="mb-10">
                    <h2 class="text-3xl md:text-4xl font-extrabold mb-3 font-serif">Reach Us</h2>
                    <p class="text-zinc-400 md:text-base">
                        Fill out your enquiry form below and we will get in touch with you.
                    </p>
                </div>

                <form id="quote-form" class="space-y-6" method="post" action="includes/process.php">
                    <input type="hidden" name="page_url" value="<?php echo htmlspecialchars((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], ENT_QUOTES, 'UTF-8'); ?>">
                    <input type="text" name="website" value="" tabindex="-1" autocomplete="off" aria-hidden="true" style="position:absolute; left:-9999px;">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-xs uppercase tracking-wider text-zinc-400 font-bold mb-2">Your Name</label>
                            <input id="name" name="name" type="text" required placeholder="e.g. Sarah Mwangi" data-error-field="name" class="w-full bg-zinc-900 border border-zinc-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-brand-gold transition">
                            <p class="mt-2 text-xs text-red-300 hidden" data-error-message="name"></p>
                        </div>
                        <div>
                            <label for="email" class="block text-xs uppercase tracking-wider text-zinc-400 font-bold mb-2">Email Address</label>
                            <input id="email" name="email" type="email" required placeholder="you@example.com" data-error-field="email" class="w-full bg-zinc-900 border border-zinc-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-brand-gold transition">
                            <p class="mt-2 text-xs text-red-300 hidden" data-error-message="email"></p>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="phone" class="block text-xs uppercase tracking-wider text-zinc-400 font-bold mb-2">Phone Number / WhatsApp</label>
                            <input id="phone" name="phone" type="text" required placeholder="+254 700 000000" data-error-field="phone" class="w-full bg-zinc-900 border border-zinc-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-brand-gold transition">
                            <p class="mt-2 text-xs text-red-300 hidden" data-error-message="phone"></p>
                        </div>
                        <div>
                            <label for="subject" class="block text-xs uppercase tracking-wider text-zinc-400 font-bold mb-2">Subject</label>
                            <input id="subject" name="subject" type="text" class="w-full bg-zinc-900 border border-zinc-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-brand-gold transition">
                        </div>
                    </div>
                    <div>
                        <label for="message" class="block text-xs uppercase tracking-wider text-zinc-400 font-bold mb-2">Message</label>
                        <textarea id="message" name="message" rows="4" required data-error-field="message" class="w-full bg-zinc-900 border border-zinc-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-brand-gold transition"></textarea>
                        <p class="mt-2 text-xs text-red-300 hidden" data-error-message="message"></p>
                    </div>
                    <div id="form-message" class="hidden rounded-xl border px-4 py-3 text-sm" aria-live="polite"></div>
                    <div class="flex flex-col sm:flex-row gap-4 pt-2">
                        <button type="submit" class="flex-1 bg-brand-gold hover:bg-amber-400 text-brand-dark font-extrabold py-4 rounded-xl transition shadow-xl shadow-sky-500/20 hover:shadow-amber-500/20 text-center disabled:opacity-70 disabled:cursor-not-allowed">
                            Send General Enquiry
                        </button>
                        <a href="https://wa.me/254721986873" target="_blank" rel="noopener noreferrer" class="flex-1 bg-emerald-600 hover:bg-emerald-500 text-white font-bold py-4 rounded-xl transition text-center flex items-center justify-center gap-2">
                            Chat on WhatsApp Directly
                        </a>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    </section>
<?php endif; ?>

<?php if (empty($hide_quote2_section)): ?>
<section id="quote2" class="relative py-24 px-6 overflow-hidden bg-gradient-to-br from-zinc-800 to-zinc-950">
    <div class="absolute inset-0 -z-10"></div>
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-3xl md:text-5xl font-extrabold font-serif mb-6">Ready to Plan Your Event?</h2>
        <p class="text-lg text-zinc-300 mb-10">Share your event details with us and receive a customized quote tailored to your needs.</p>
        <a href="quote.php" class="inline-block bg-brand-gold hover:bg-amber-400 text-brand-dark px-8 py-4 rounded-xl font-extrabold text-base transition shadow-xl shadow-sky-500/20 hover:shadow-amber-500/20">
            Share Event Details, receive a Quote
        </a>
    </div>
</section>
<?php endif; ?>
    
<footer class="py-6 px-4 text-center">
<?php
// TODO: read site name from env file.
$footerSiteName = isset($site_name) ? $site_name : 'Aqueous';
?>
    <small class="block text-zinc-400 text-sm tracking-wide">&copy; <?php echo date("Y"); ?> <?php echo htmlspecialchars($footerSiteName); ?>. All rights reserved.</small>
</footer>
<script src='js/jquery.min.js'></script>
<script src='js/jquery.validate.min.js'></script>
<script src='js/main.js'></script>
<script>
    (function () {
        const quoteSection = document.getElementById('quote');
        const quoteBackground = quoteSection ? quoteSection.querySelector('.absolute.inset-0') : null;

        if (quoteSection && quoteBackground) {
            const updateParallax = function () {
                const rect = quoteSection.getBoundingClientRect();
                const progress = (window.innerHeight - rect.top) / (window.innerHeight + rect.height);
                const offset = ((progress * 220) - 80);
                quoteBackground.style.transform = 'translate3d(0, ' + offset + 'px, 0) scale(1.35)';
            };

            updateParallax();
            window.addEventListener('scroll', updateParallax, { passive: true });
            window.addEventListener('resize', updateParallax);
        }

        const form = document.getElementById('quote-form');
        const formMessage = document.getElementById('form-message');

        if (form) {
            form.addEventListener('submit', async function (event) {
                event.preventDefault();

                const submitButton = form.querySelector('button[type="submit"]') || document.querySelector('button[type="submit"][form="' + form.id + '"]');
                const submitButtonText = submitButton ? submitButton.textContent : '';
                const formData = new FormData(form);

                if (submitButton) {
                    submitButton.disabled = true;
                    submitButton.textContent = 'Sending...';
                }

                formMessage.className = 'hidden rounded-xl border px-4 py-3 text-sm';
                formMessage.textContent = '';

                try {
                    const response = await fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    const result = await response.json();

                    const allFields = form.querySelectorAll('[data-error-field]');
                    allFields.forEach(function (field) {
                        const fieldName = field.getAttribute('data-error-field');
                        const errorNode = form.querySelector('[data-error-message="' + fieldName + '"]');
                        const hasError = result.errors && result.errors[fieldName];

                        field.classList.toggle('border-red-500', hasError);
                        field.classList.toggle('focus:border-red-500', hasError);
                        field.classList.toggle('border-zinc-700', !hasError);
                        field.setAttribute('aria-invalid', hasError ? 'true' : 'false');

                        if (errorNode) {
                            if (hasError) {
                                errorNode.textContent = result.errors[fieldName];
                                errorNode.classList.remove('hidden');
                            } else {
                                errorNode.textContent = '';
                                errorNode.classList.add('hidden');
                            }
                        }
                    });

                    if (!response.ok || !result.success) {
                        const message = result.message || 'There was a problem sending your message.';
                        formMessage.className = 'rounded-xl border border-red-500/50 bg-red-500/10 px-4 py-3 text-sm text-red-200';
                        formMessage.textContent = message;
                        return;
                    }

                    form.reset();
                    formMessage.className = 'rounded-xl border border-emerald-500/50 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-200';
                    formMessage.textContent = result.message || 'Your message was sent successfully.';
                } catch (error) {
                    formMessage.className = 'rounded-xl border border-red-500/50 bg-red-500/10 px-4 py-3 text-sm text-red-200';
                    formMessage.textContent = 'There was a network problem. Please try again or contact us directly.';
                } finally {
                    if (submitButton) {
                        submitButton.disabled = false;
                        submitButton.textContent = submitButtonText;
                    }
                }
            });
        }

        // Handle WhatsApp prefill with form data
        const whatsappLink = document.querySelector('a[href*="wa.me"]');
        if (whatsappLink) {
            whatsappLink.addEventListener('click', function (event) {
                const name = document.getElementById('name').value.trim();
                const email = document.getElementById('email').value.trim();
                const subject = document.getElementById('subject').value.trim();
                const message = document.getElementById('message').value.trim();

                if (name || email || subject || message) {
                    let whatsappMessage = 'Hi Aqueous!\n\n';
                    if (name) whatsappMessage += 'Name: ' + name + '\n';
                    if (email) whatsappMessage += 'Email: ' + email + '\n';
                    if (subject) whatsappMessage += 'Subject: ' + subject + '\n';
                    if (message) whatsappMessage += '\nMessage:\n' + message + '\n';
                    
                    const encodedMessage = encodeURIComponent(whatsappMessage);
                    this.href = 'https://wa.me/254721986873?text=' + encodedMessage;
                }
            });
        }

        const sliders = document.querySelectorAll('[data-card-slider]');

        sliders.forEach(function (slider) {
            const slides = slider.querySelectorAll('.slider-slide');
            let activeIndex = 0;
            let timer = null;
            const autoDuration = 5600;
            const clickDuration = 1400;

            function applyTransitionDuration(duration) {
                slides.forEach(function (slide) {
                    slide.style.transitionDuration = duration + 'ms';
                });
            }

            function showSlide(index) {
                slides.forEach(function (slide, slideIndex) {
                    const isActive = slideIndex === index;
                    slide.classList.toggle('opacity-100', isActive);
                    slide.classList.toggle('opacity-0', !isActive);
                });
            }

            function nextSlide(step) {
                activeIndex = (activeIndex + step + slides.length) % slides.length;
                showSlide(activeIndex);
            }

            function restartTimer() {
                applyTransitionDuration(autoDuration);
                clearInterval(timer);
                timer = setInterval(function () {
                    nextSlide(1);
                }, autoDuration);
            }

            slider.addEventListener('mouseenter', function () {
                clearInterval(timer);
            });

            slider.addEventListener('mouseleave', function () {
                restartTimer();
            });

            slider.querySelectorAll('[data-direction]').forEach(function (button) {
                button.addEventListener('click', function () {
                    const direction = button.getAttribute('data-direction') === 'next' ? 1 : -1;
                    applyTransitionDuration(clickDuration);
                    nextSlide(direction);
                    clearInterval(timer);
                    setTimeout(function () {
                        restartTimer();
                    }, clickDuration + 100);
                });
            });

            restartTimer();
        });

        const testimonialSliders = document.querySelectorAll('[data-testimonials-slider]');

        testimonialSliders.forEach(function (slider) {
            const track = slider.querySelector('[data-testimonial-track]');
            const slides = track ? track.children : [];
            const dotsContainer = slider.querySelector('[data-testimonial-dots]');
            const prevButton = slider.querySelector('[data-testimonial-nav="prev"]');
            const nextButton = slider.querySelector('[data-testimonial-nav="next"]');
            
            const modalOverlay = document.querySelector('[data-testimonial-modal-overlay]');
            const modalContainer = document.querySelector('[data-testimonial-modal-container]');
            const modalCloseBtn = document.querySelector('[data-testimonial-close]');
            const modalNextBtn = document.querySelector('[data-testimonial-next-btn]');
            const modalText = document.querySelector('[data-testimonial-modal-text]');
            const modalAuthor = document.querySelector('[data-testimonial-modal-author]');
            const modalImage = document.querySelector('[data-testimonial-modal-image]');

            const autoDuration = 6200;
            const motionDuration = 700;
            let currentIndex = 0;
            let autoTimer = null;
            let isAnimating = false;
            let isModalOpen = false;

            if (!track || !slides.length) {
                return;
            }

            const slidesArray = Array.prototype.slice.call(slides);
            const testimonialData = [];

            // Extract and store full testimonial data
            slidesArray.forEach(function (slide, index) {
                const textEl = slide.querySelector('[data-testimonial-text]');
                const authorEl = slide.querySelector('[data-testimonial-author]');

                if (textEl && authorEl) {
                    testimonialData[index] = {
                        fullText: textEl.innerHTML.trim(),
                        author: authorEl.innerHTML,
                        element: slide
                    };
                }
            });

            const tallestSlideHeight = slidesArray.reduce(function (maxHeight, slide) {
                return Math.max(maxHeight, slide.offsetHeight);
            }, 0);

            track.style.display = 'block';
            track.style.position = 'relative';
            track.style.transform = 'none';
            track.style.height = tallestSlideHeight + 'px';

            slidesArray.forEach(function (slide, index) {
                slide.style.position = 'absolute';
                slide.style.inset = '0';
                slide.style.width = '100%';
                slide.style.transition = 'opacity ' + motionDuration + 'ms ease, transform ' + motionDuration + 'ms ease';

                if (index === 0) {
                    slide.style.opacity = '1';
                    slide.style.transform = 'translateX(0px)';
                    slide.style.pointerEvents = 'auto';
                    slide.style.zIndex = '2';
                } else {
                    slide.style.opacity = '0';
                    slide.style.transform = 'translateX(200px)';
                    slide.style.pointerEvents = 'none';
                    slide.style.zIndex = '1';
                }
            });

            function openModal(index) {
                if (index < 0 || index >= testimonialData.length) return;

                const data = testimonialData[index];
                modalText.innerHTML = data.fullText;
                modalAuthor.innerHTML = data.author;

                modalOverlay.classList.remove('hidden');
                modalContainer.classList.remove('hidden');
                isModalOpen = true;

                // Pause auto-slider when modal is open
                clearInterval(autoTimer);
                slider.style.pointerEvents = 'none';
                document.body.style.overflow = 'hidden';
            }

            function closeModal() {
                modalOverlay.classList.add('hidden');
                modalContainer.classList.add('hidden');
                isModalOpen = false;

                // Resume auto-slider when modal is closed
                document.body.style.overflow = '';
                slider.style.pointerEvents = 'auto';
                restartAuto();
            }

            function render() {
                if (dotsContainer) {
                    const dots = dotsContainer.querySelectorAll('button');
                    dots.forEach(function (dot, index) {
                        const isActive = index === currentIndex;
                        dot.classList.toggle('bg-brand-gold', isActive);
                        dot.classList.toggle('w-6', isActive);
                        dot.classList.toggle('bg-zinc-600', !isActive);
                        dot.setAttribute('aria-current', isActive ? 'true' : 'false');
                    });
                }
            }

            function goTo(index) {
                if (isAnimating) {
                    return;
                }

                const nextIndex = (index + slides.length) % slides.length;

                if (nextIndex === currentIndex) {
                    return;
                }

                isAnimating = true;

                const outgoingSlide = slides[currentIndex];
                const incomingSlide = slides[nextIndex];

                incomingSlide.style.opacity = '0';
                incomingSlide.style.transform = 'translateX(200px)';
                incomingSlide.style.pointerEvents = 'none';
                incomingSlide.style.zIndex = '3';
                outgoingSlide.style.opacity = '1';
                outgoingSlide.style.transform = 'translateX(0px)';
                outgoingSlide.style.pointerEvents = 'none';
                outgoingSlide.style.zIndex = '2';

                incomingSlide.offsetHeight;

                incomingSlide.style.opacity = '1';
                incomingSlide.style.transform = 'translateX(0px)';
                outgoingSlide.style.opacity = '0';
                outgoingSlide.style.transform = 'translateX(-200px)';

                currentIndex = nextIndex;
                render();

                setTimeout(function () {
                    slidesArray.forEach(function (slide, activeIndex) {
                        const isActive = activeIndex === currentIndex;
                        slide.style.pointerEvents = isActive ? 'auto' : 'none';
                        slide.style.zIndex = isActive ? '2' : '1';

                        if (!isActive) {
                            slide.style.opacity = '0';
                            slide.style.transform = 'translateX(200px)';
                        }
                    });

                    isAnimating = false;
                }, motionDuration);
            }

            function restartAuto() {
                clearInterval(autoTimer);
                if (!isModalOpen) {
                    autoTimer = setInterval(function () {
                        goTo(currentIndex + 1);
                    }, autoDuration);
                }
            }

            // Add click handler to testimonial articles
            slidesArray.forEach(function (slide, index) {
                slide.style.cursor = 'pointer';
                slide.addEventListener('click', function () {
                    if (!isModalOpen) {
                        openModal(index);
                    }
                });
            });

            if (dotsContainer) {
                Array.prototype.forEach.call(slides, function (_, index) {
                    const dot = document.createElement('button');
                    dot.type = 'button';
                    dot.className = 'h-2 w-2 rounded-full transition-all bg-zinc-600';
                    dot.setAttribute('aria-label', 'Go to testimonial ' + (index + 1));
                    dot.addEventListener('click', function () {
                        goTo(index);
                        restartAuto();
                    });
                    dotsContainer.appendChild(dot);
                });
            }

            if (prevButton) {
                prevButton.addEventListener('click', function () {
                    goTo(currentIndex - 1);
                    restartAuto();
                });
            }

            if (nextButton) {
                nextButton.addEventListener('click', function () {
                    goTo(currentIndex + 1);
                    restartAuto();
                });
            }

            // Modal close button
            if (modalCloseBtn) {
                modalCloseBtn.addEventListener('click', closeModal);
            }

            // Modal next button
            if (modalNextBtn) {
                modalNextBtn.addEventListener('click', function () {
                    const nextIndex = (currentIndex + 1) % slides.length;
                    goTo(nextIndex);
                    // Update modal content
                    setTimeout(function () {
                        openModal(nextIndex);
                    }, motionDuration);
                });
            }

            // Close modal when clicking overlay
            if (modalOverlay) {
                modalOverlay.addEventListener('click', closeModal);
            }

            // Prevent closing when clicking on modal content
            if (modalContainer) {
                const modal = modalContainer.querySelector('[data-testimonial-modal]');
                if (modal) {
                    modal.addEventListener('click', function (e) {
                        e.stopPropagation();
                    });
                }
            }

            slider.addEventListener('mouseenter', function () {
                clearInterval(autoTimer);
            });

            slider.addEventListener('mouseleave', function () {
                if (!isModalOpen) {
                    restartAuto();
                }
            });

            render();
            restartAuto();
        });
    })();
</script>
