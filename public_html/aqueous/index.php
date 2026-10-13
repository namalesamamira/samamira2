<!doctype html>
<html lang="en" class="scroll-smooth">
<?php
$site_name = "Aqueous";
$url = "https://aqueous.mobi/";
$title = "Mobile Bar, Catering & Event Management in Kenya | Aqueous";
$description = "Aqueous provides mobile bar services, food catering and full-service event management in Kenya for weddings, private parties and corporate events.";
$image = "https://aqueous.mobi/img/grill.png";

include "includes/head.php";
?>
<body class="bg-brand-dark text-zinc-100 font-sans selection:bg-brand-gold selection:text-black">
    <?php include "includes/header.php";?>

    <section class="relative min-h-screen flex items-center justify-center pt-24 pb-16 px-6 overflow-hidden">
        <img src="img/grill.png" alt="aqueous.mobi" aria-hidden="true" class="absolute inset-0 h-full w-full object-cover z-0">
        <video class="absolute inset-0 h-full w-full object-cover z-0" poster="img/grill.png" aria-hidden="true" autoplay muted loop playsinline>
            <source src="img/video.mp4" type="video/mp4">
            <source src="img/video.webm" type="video/webm">
        </video>
        <div class="absolute inset-0 bg-gradient-to-b from-black/35 via-black/50 to-black/90 z-10"></div>
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-brand-gold/10 blur-[120px] rounded-full pointer-events-none z-20"></div>

        <div class="max-w-5xl mx-auto text-center relative z-30 drop-shadow-[0_8px_30px_rgba(0,0,0,0.75)]">
            <h1 class="text-5xl md:text-8xl font-black tracking-tight mb-8 leading-none text-white font-serif">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-gold to-white">Aqueous</span>
                <span class="mt-3">is a full service hospitality company </span>
            </h1>
            <p class="text-lg md:text-xl text-zinc-200 max-w-2xl mx-auto font-light mb-10">
                that specializes in food catering, bar services and event architecture.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="quote.php" class="bg-brand-gold hover:bg-amber-400 text-brand-dark px-8 py-4 rounded-xl font-extrabold text-base transition shadow-xl shadow-sky-500/20 hover:shadow-amber-500/20">
                    Share Event Details, receive a Quote
                </a>
                <!-- <a href="#gallery" class="bg-zinc-800/80 hover:bg-zinc-800 text-white border border-zinc-700 px-8 py-4 rounded-xl font-bold text-base transition">
                    View Bar &amp; Food
                </a> -->
            </div>
        </div>
    </section>

    <section id="stats" class="border-y border-zinc-800 bg-brand-card/50 py-16 px-6 scroll-mt-28">
        <div class="max-w-5xl mx-auto text-center">
            <p class="text-xl md:text-2xl leading-relaxed text-zinc-100 font-light">
                Aqueous’ unique selling point is that with 15+ years of experience we can advise you on how events normally transpire and you can make your decisions from an informed standpoint.
            </p>
        </div>
    </section>

    <section id="services" class="relative w-full overflow-hidden border-t border-zinc-800/80 scroll-mt-28 min-h-[640px]">
        <div class="parallax-bg absolute inset-0 w-full h-[120%] scale-110 bg-cover bg-center bg-no-repeat will-change-transform" style="background-image: linear-gradient(rgba(0,0,0,0.25), rgba(0,0,0,0.25)), url('https://images.unsplash.com/photo-1511795409834-ef04bbd61622?auto=format&fit=crop&w=1800&q=80');"></div>

        <div class="relative z-10 max-w-7xl mx-auto py-24 px-6">
            <div class="text-center mb-16">
                <p class="text-brand-gold uppercase tracking-widest text-xs font-bold mb-3">Bar Services</p>
                <h2 class="text-3xl md:text-5xl font-extrabold font-serif">Experience convenience in your event planning</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-brand-card/80 border border-zinc-800 p-8 rounded-3xl hover:border-brand-gold/50 transition group backdrop-blur-sm">
                    <div class="w-12 h-12 bg-amber-500/10 rounded-2xl flex items-center justify-center text-brand-gold font-black text-xl mb-6 group-hover:scale-110 transition">01</div>
                    <h3 class="text-2xl font-bold mb-3 text-white">Bar Services</h3>
                    <p class="text-white leading-relaxed font-light">Custom mobile bars stocked with premium beverages, expert mixologists, and bespoke drink menus designed for your crowd.</p>
                </div>
                <div class="bg-brand-card/80 border border-zinc-800 p-8 rounded-3xl hover:border-brand-gold/50 transition group backdrop-blur-sm">
                    <div class="w-12 h-12 bg-amber-500/10 rounded-2xl flex items-center justify-center text-brand-gold font-black text-xl mb-6 group-hover:scale-110 transition">02</div>
                    <h3 class="text-2xl font-bold mb-3 text-white">Gourmet Food</h3>
                    <p class="text-white leading-relaxed font-light">Catering to suit your event style prepared by our culinary team.  Explore our menu styles; see that they suit your needs.</p>
                </div>
                <div class="bg-brand-card/80 border border-zinc-800 p-8 rounded-3xl hover:border-brand-gold/50 transition group backdrop-blur-sm">
                    <div class="w-12 h-12 bg-amber-500/10 rounded-2xl flex items-center justify-center text-brand-gold font-black text-xl mb-6 group-hover:scale-110 transition">03</div>
                    <h3 class="text-2xl font-bold mb-3 text-white">Event Management</h3>
                    <p class="text-white leading-relaxed font-light">
                        Meticulous end to end event management.  We chaperone every detail so that you can enjoy your event.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="gallery" class="py-24 px-6 max-w-7xl mx-auto scroll-mt-28">
        <div class="text-center mb-16">
            <p class="text-brand-gold uppercase tracking-widest text-xs font-bold mb-3">Catering</p>
            <h2 class="text-3xl md:text-5xl font-extrabold mb-4 font-serif">Craft Cocktails &amp; Gourmet Bites</h2>
            <p class="text-zinc-400 max-w-xl mx-auto">
                Aqueous offers a healthy range of cuisines styles that are suited to corporate events, private parties & weddings. Choose between:
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="group rounded-3xl overflow-hidden border border-zinc-800 bg-brand-card aspect-[4/5] min-h-[200px] relative">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('img/Food Service Pic.jpg');"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-950/40 to-transparent"></div>
                <div class="relative p-8 z-10 flex h-full items-end">
                    <div class="w-full min-h-[130px] pt-2">
                        <!-- <span class="text-brand-gold text-xs font-bold uppercase tracking-wider">Plated Meals</span> -->
                        <h3 class="text-2xl font-bold text-white mt-1">Food Service</h3>
                        <p class="text-white mt-2 font-light">Aqueous Culinary offers you a range of menu styles to suit your event. Feel free to combine food concepts to make your event a success.</p>
                    </div>
                </div>
            </div>

            <div class="group rounded-3xl overflow-hidden border border-zinc-800 bg-brand-card aspect-[4/5] min-h-[200px] relative">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('img/Canapes Pic.jpg');"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-950/40 to-transparent"></div>
                <div class="relative p-8 z-10 flex h-full items-end">
                    <div class="w-full min-h-[130px] pt-2">
                        <!-- <span class="text-brand-gold text-xs font-bold uppercase tracking-wider">Canapes</span> -->
                        <h3 class="text-2xl font-bold text-white mt-1">Canapes</h3>
                        <p class="text-white mt-2 font-light">Perfect for corporate cocktail parties and social meetups over a light bite and drinks.</p>
                    </div>
                </div>
            </div>

            <div class="group rounded-3xl overflow-hidden border border-zinc-800 bg-brand-card aspect-[4/5] min-h-[200px] relative">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('img/Wok u Like Pic 1.jpg');"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-950/40 to-transparent"></div>
                <div class="relative p-8 z-10 flex h-full items-end">
                    <div class="w-full min-h-[130px] pt-2">
                        <!-- <span class="text-brand-gold text-xs font-bold uppercase tracking-wider">Canapes</span> -->
                        <h3 class="text-2xl font-bold text-white mt-1">Wok u' Like</h3>
                        <p class="text-white mt-2 font-light">Gourmet Oriental Cuisine cooked on a live station. Designed for the late night food option at weddings,
currently enjoyed as a feature station in all types of events.
<!-- Best enjoyed as 2-3 appetisers followed by the main feature

It's advisable to run this service outdoors. -->
</p>
                    </div>
                </div>
            </div>

            <div class="group rounded-3xl overflow-hidden border border-zinc-800 bg-brand-card aspect-[4/5] min-h-[200px] relative">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('img/Tikka Pic.jpg');"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-950/40 to-transparent"></div>
                <div class="relative p-8 z-10 flex h-full items-end">
                    <div class="w-full min-h-[130px] pt-2">
                        <!-- <span class="text-brand-gold text-xs font-bold uppercase tracking-wider">BBQ Buffet</span> -->
                        <h3 class="text-2xl font-bold text-white mt-1">BBQ</h3>
                        <p class="text-white mt-2 font-light">The perfect option for an afternoon get together with your key players</p>
                    </div>
                </div>
            </div>

            <div class="group rounded-3xl overflow-hidden border border-zinc-800 bg-brand-card aspect-[4/5] min-h-[200px] relative">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('img/taco.jpg');"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-950/40 to-transparent"></div>
                <div class="relative p-8 z-10 flex h-full items-end">
                    <div class="w-full min-h-[130px] pt-2">
                        <!-- <span class="text-brand-gold text-xs font-bold uppercase tracking-wider">African Taco Experience</span> -->
                        <h3 class="text-2xl font-bold text-white mt-1">Tacos</h3>
                        <p class="text-white mt-2 font-light">Mexican street food with an African touch. <br> This service became so popular we had to design an identity for it</p>
                    </div>
                </div>
            </div>

            <div class="group rounded-3xl overflow-hidden border border-zinc-800 bg-brand-card aspect-[4/5] min-h-[200px] relative">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('img/Bar Services Pic 3.jpg');"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-950/40 to-transparent"></div>
                <div class="relative p-8 z-10 flex h-full items-end">
                    <div class="w-full min-h-[130px] pt-2">
                        <!-- <span class="text-brand-gold text-xs font-bold uppercase tracking-wider">Gourmet Asian Live Cooking</span> -->
                        <h3 class="text-2xl font-bold text-white mt-1">Bar Services</h3>
                        <p class="text-white mt-2 font-light">Fully serviced, World Class mixology, brought to you.

This service is the bedrock of this company.
</p>
                    </div>
                </div>
            </div>

            <div class="group rounded-3xl overflow-hidden border border-zinc-800 bg-brand-card aspect-[4/5] min-h-[200px] relative">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('img/Just drinks pic.jpg');"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-950/40 to-transparent"></div>
                <div class="relative p-8 z-10 flex h-full items-end">
                    <div class="w-full min-h-[130px] pt-2">
                        <!-- <span class="text-brand-gold text-xs font-bold uppercase tracking-wider">Gourmet Asian Live Cooking</span> -->
                        <h3 class="text-2xl font-bold text-white mt-1">Just Drinks</h3>
                        <p class="text-white mt-2 font-light">When the event requires just liquid and some ice, we can deliver for you.
</p>
                    </div>
                </div>
            </div>

            <div class="group rounded-3xl overflow-hidden border border-zinc-800 bg-brand-card aspect-[4/5] min-h-[200px] relative">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('img/Shawarma Pic 1.jpg');"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-950/40 to-transparent"></div>
                <div class="relative p-8 z-10 flex h-full items-end">
                    <div class="w-full min-h-[130px] pt-2">
                        <h3 class="text-2xl font-bold text-white mt-1">Shawarma Service</h3>
                        <p class="text-white mt-2 font-light">Undefeated. Simple &amp; tasty, perfect for kids parties, late night dining &amp; general appeasement</p>
                    </div>
                </div>
            </div>

            

            <div class="group rounded-3xl overflow-hidden border border-zinc-800 bg-brand-card aspect-[4/5] min-h-[200px] relative">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('img/lock.jpg');"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-950/40 to-transparent"></div>
                <div class="relative p-8 z-10 flex h-full items-end">
                    <div class="w-full min-h-[130px] pt-2">
                        <!-- <span class="text-brand-gold text-xs font-bold uppercase tracking-wider">Gourmet Asian Live Cooking</span> -->
                        <h3 class="text-2xl font-bold text-white mt-1">End to End Event Mgt.</h3>
                        <p class="text-white mt-2 font-light">
                            
                            When the pressure of managing a full event clashes with your
work schedule, we step in to guide, plan and execute.

<!-- This service is available for corporate staff parties, milestone celebrations &
intrepid events. -->

                        </p>
                    </div>
                </div>
            </div>            
        </div>
    </section>

    <section id="basics" class="relative overflow-hidden py-24 px-6 scroll-mt-28">
        <div class="parallax-bg absolute bg-cover bg-center bg-no-repeat will-change-transform" aria-hidden="true" style="inset: -60px 0; background-image: url('img/basic_bg.jpeg');"></div>
        <div class="relative z-10 max-w-5xl mx-auto rounded-3xl border border-zinc-800 bg-brand-card/60 backdrop-blur-md p-8 md:p-12">
            <p class="text-brand-gold uppercase tracking-widest text-xs font-bold mb-3">Event Accessories</p>
            <h2 class="text-3xl md:text-5xl font-extrabold font-serif mb-6">
                The Basics is your event rental solution
            </h2>
            <p class="text-lg text-zinc-300 leading-relaxed mb-4">
                We supply the small things you can't do without at your event — and some big things too. From glassware and ice to furniture, chafing dishes, and mobile bars, The Basics has you covered. Choose what you need and let us help you complete your event setup.
            </p>
            
            <div class="mt-10 border-t border-zinc-800 pt-8 scroll-mt-28 flex flex-col sm:flex-row gap-4">
                <a href="basics.php" class="inline-block bg-brand-gold hover:bg-amber-400 text-brand-dark px-8 py-4 rounded-xl font-extrabold text-base transition shadow-xl shadow-sky-500/20 hover:shadow-amber-500/20">
                    Explore Event Rentals
                </a>
                <a href="img/The Basics Brochure.pdf" download class="inline-block bg-zinc-800 hover:bg-zinc-700 text-brand-gold border border-zinc-700 px-8 py-4 rounded-xl font-extrabold text-base transition shadow-xl">
                    Download Brochure
                </a>
            </div>
        </div>
    </section>

    <section id="hospitality" class="py-24 px-6 max-w-5xl mx-auto scroll-mt-28">
        <div class="rounded-3xl border border-zinc-800 bg-brand-card p-8 md:p-12">
            <p class="text-brand-gold uppercase tracking-widest text-xs font-bold mb-3">Full Service Event Management</p>
            <h2 class="text-3xl md:text-5xl font-extrabold font-serif mb-6">
                This service is designed for busy professionals and international firms who need one point of contact to bring their full event, conference or celebration to life.
            </h2>
            <p class="text-lg text-zinc-300 leading-relaxed mb-4">                
                
Aqueous has relationships with the best in the business in logistics, audio visual, security & hotels. To top it all off, we carefully navigate service delivery in African cities and small towns so that you don’t have to.
<br>
If you are hosting an intricate / nuanced event, email brian@aqueous.mobi to book an online meeting to discuss your event flow and requirements.

            </p>
            
            <div id="management" class="mt-10 border-t border-zinc-800 pt-8 scroll-mt-28">
                <a href="quote.php" class="inline-block bg-brand-gold hover:bg-amber-400 text-brand-dark px-8 py-4 rounded-xl font-extrabold text-base transition shadow-xl shadow-sky-500/20 hover:shadow-amber-500/20">Tell Us About Your Event</a>
            </div>
        </div>
    </section>

    <section id="testimonials" class="py-24 px-6 max-w-6xl mx-auto scroll-mt-28">
        <div class="text-center mb-12">
            <p class="text-brand-gold uppercase tracking-widest text-xs font-bold mb-3">Client Voices</p>
            <h2 class="text-3xl md:text-5xl font-extrabold mb-4 font-serif">Testimonials From Memorable Events</h2>
            <p class="text-zinc-400 max-w-2xl mx-auto">Real feedback from clients who trusted Aqueous with their celebrations, launches, and corporate experiences.</p>
        </div>

        <div class="relative" data-testimonials-slider>
            <div class="overflow-hidden rounded-3xl border border-zinc-800 bg-brand-card shadow-2xl cursor-pointer">
                <div class="flex transition-transform duration-700 ease-out" data-testimonial-track>
                    <article class="min-w-full p-8 md:p-12" data-testimonial-article>
                        <div class="flex flex-col md:flex-row items-center md:items-start gap-6 md:gap-8">
                            <!-- <img src="img/the-50-logo-white.svg" alt="the50.com" class="w-24 h-24 md:w-28 md:h-28 rounded-full object-contain border-2 border-brand-gold/40 shrink-0"> -->
                            <div class="text-center md:text-left">
                                <p class="text-xl text-zinc-100 leading-relaxed font-light" data-testimonial-text>
                                    We have worked with Aqueous over the years across a wide range of events 
                                    and experiences, where they have provided comprehensive catering solutions 
                                    covering both food and bar services, end to end. Our work together has spanned 
                                    different types and scales of events, from corporate and private engagements 
                                    to large-scale live experiences, including major events such as Solfest, 
                                    amongst others. What has consistently stood out to us is the quality of their 
                                    food and their ability to understand the audience they are catering for. 
                                    <br><br>
                                    Aqueous does not approach catering simply as the provision of food and 
                                    beverage; they understand that it is an important part of the overall guest 
                                    experience. Their team is able to take a brief, understand the event concept, 
                                    the audience, the environment and the desired experience, and translate this 
                                    into a culinary offering that feels considered and appropriate. Whether this 
                                    requires a particular style of menu, service format, bar experience or a more 
                                    bespoke food concept, they are able to develop solutions that align with the 
                                    overall event. They have consistently demonstrated strong operational 
                                    capability, flexibility and reliability, all of which are critical when 
                                    delivering live events. Their teams understand the importance of timing, 
                                    presentation, service standards and the ability to adapt when requirements 
                                    change. From menu development and food preparation to bar management, service 
                                    and on-site execution, Aqueous has proven capable of managing the full 
                                    catering experience while maintaining quality across the different 
                                    touchpoints.
                                </p>
                                <p class="mt-5 text-brand-gold font-bold uppercase tracking-wider text-sm" data-testimonial-author><b>Zaheeda Suleman</b> - CEO Be Experience</p>
                            </div>
                        </div>
                    </article>

                    <article class="min-w-full p-8 md:p-12" data-testimonial-article>
                        <div class="flex flex-col md:flex-row items-center md:items-start gap-6 md:gap-8">
                            <!-- <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=280&q=80" alt="Portrait of Zaheeda Suleman" class="w-24 h-24 md:w-28 md:h-28 rounded-full object-cover border-2 border-brand-gold/40 shrink-0"> -->
                            <div class="text-center md:text-left">
                                <p class="text-xl text-zinc-100 leading-relaxed font-light" data-testimonial-text>
                                    For years, Aqeous has been our go-to for crafting bespoke cocktails centred around the rums of Barbados - which are still niche spirits in the local market. Their drinks and bar service have played a major part in the popularity of our rum products and our events in Kenya.
                                </p>
                                <p class="mt-5 text-brand-gold font-bold uppercase tracking-wider text-sm" data-testimonial-author>Jovan Reid</p>
                            </div>
                        </div>
                    </article>

                    <article class="min-w-full p-8 md:p-12" data-testimonial-article>
                        <div class="flex flex-col md:flex-row items-center md:items-start gap-6 md:gap-8">
                            <!-- <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=280&q=80" alt="Portrait of Zaheeda Suleman" class="w-24 h-24 md:w-28 md:h-28 rounded-full object-cover border-2 border-brand-gold/40 shrink-0"> -->
                            <div class="text-center md:text-left">
                                <p class="text-xl text-zinc-100 leading-relaxed font-light" data-testimonial-text>
                                    Being at the top of your game is not easy in the food and beverage industry. Nor are events.
                                     But for Aqueous, no event scope is impossible to execute with professionalism, sophistication, a smile and going the extra mile - to make your event an unforgettable gastronomic experience.
                                    Always happy to customise their services, to design and execute bespoke drinks and food, to suit your event, Aqueous truly is in a league of its own. 
                                    As a team, a brand and an experience.
                                    <br><br>
                                    I have personally worked with them for over 15 years spanning across large private and corporate events - but more special than that, they are our team for food and beverage out in the deep Kenyan bush every year to support our annual Rhino Charge team catering. 
                                    <br><br>
                                    We camp together with very little (actually no infrastructure) out in the middle of nowhere, and yet, every meal and every drink is prepared with precision. 
                                    <br><br>
                                    Tasty, impeccable presentation, and always leaving a lasting impression on everyone.
                                    They truly are incredible and we are so grateful for them. 
                                    <br><br>
                                    Asante Aqueous!

                                </p>
                                <p class="mt-5 text-brand-gold font-bold uppercase tracking-wider text-sm" data-testimonial-author>Crista Jappinen</p>
                            </div>
                        </div>
                    </article>

                </div>
            </div>

            <button type="button" class="absolute left-0 md:-left-6 top-1/2 -translate-y-1/2 z-10 h-11 w-11 rounded-full border border-zinc-600 bg-zinc-900/50 text-white text-2xl leading-none transition hover:border-brand-gold hover:text-brand-gold" data-testimonial-nav="prev" aria-label="Previous testimonial">&#8249;</button>
            <button type="button" class="absolute right-0 md:-right-6 top-1/2 -translate-y-1/2 z-10 h-11 w-11 rounded-full border border-zinc-600 bg-zinc-900/50 text-white text-2xl leading-none transition hover:border-brand-gold hover:text-brand-gold" data-testimonial-nav="next" aria-label="Next testimonial">&#8250;</button>

            <div class="mt-6 flex items-center justify-center gap-2" data-testimonial-dots></div>
        </div>
    </section>

    <!-- Testimonial Modal -->
    <div class="fixed inset-0 bg-black/80 backdrop-blur-sm z-40 hidden transition-opacity duration-300" data-testimonial-modal-overlay></div>
    <div class="fixed inset-0 z-50 hidden overflow-y-auto" data-testimonial-modal-container>
        <div class="flex items-center justify-center min-h-screen px-4 py-8">
            <div class="bg-brand-card border border-zinc-700 rounded-3xl shadow-2xl max-w-2xl w-full relative" data-testimonial-modal>
                <button type="button" class="absolute top-6 right-6 text-zinc-400 hover:text-white transition z-10 text-3xl leading-none w-8 h-8 flex items-center justify-center" data-testimonial-close aria-label="Close testimonial">×</button>
                
                <div class="p-8 md:p-12">
                    <p class="text-lg text-zinc-100 leading-relaxed font-light mb-6" data-testimonial-modal-text></p>
                    <p class="text-brand-gold font-bold uppercase tracking-wider text-sm text-left mb-8" data-testimonial-modal-author></p>
                    
                    <button type="button" class="w-full bg-brand-gold hover:bg-amber-400 text-brand-dark px-6 py-3 rounded-lg font-bold transition" data-testimonial-next-btn>Next Testimonial →</button>
                </div>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php";?>

    <script>
        (function () {
            const backgrounds = document.querySelectorAll('.parallax-bg');
            const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
            let framePending = false;

            if (!backgrounds.length) return;

            const updateParallax = function () {
                framePending = false;
                backgrounds.forEach(function (parallaxBg) {
                    if (reducedMotion.matches) {
                        parallaxBg.style.transform = 'none';
                        return;
                    }

                    const rect = parallaxBg.parentElement.getBoundingClientRect();
                    const progress = Math.max(0, Math.min(1, (window.innerHeight - rect.top) / (window.innerHeight + rect.height)));
                    const offset = ((progress * 90) - 30);
                    parallaxBg.style.transform = 'translate3d(0, ' + offset + 'px, 0) scale(1.15)';
                });
            };

            const scheduleParallax = function () {
                if (framePending) return;
                framePending = true;
                window.requestAnimationFrame(updateParallax);
            };

            updateParallax();
            window.addEventListener('scroll', scheduleParallax, { passive: true });
            window.addEventListener('resize', scheduleParallax);
            reducedMotion.addEventListener('change', scheduleParallax);
        })();
    </script>
</body>
</html>