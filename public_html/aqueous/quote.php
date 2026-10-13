<!doctype html>
<html lang="en" class="scroll-smooth">
<?php
$site_name = "Aqueous";
$url = "https://aqueous.example/quote.php";
$title = "Aqueous | Event Quote";
$description = "Complete the Aqueous event briefing sheet for a detailed quote.";
$image = "img/grill.png";
$hide_header_nav = true;
$hide_contact_section = true;
$hide_quote2_section = true;

include "includes/head.php";
?>
<body class="bg-brand-dark text-zinc-100 font-sans selection:bg-brand-gold selection:text-black">
    <header class="fixed top-0 left-0 right-0 z-50 bg-brand-dark/40 backdrop-blur-md border-b border-zinc-800" id="top">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-2xl font-black tracking-widest text-transparent bg-clip-text bg-gradient-to-r from-brand-gold via-amber-200 to-white">
                <a href="index.php" class="inline-flex items-center gap-3 scroll-smooth">
                    <img src="img/logo.png" alt="Aqueous logo" style="height:30px; width:auto">
                </a>
            </div>
        </div>
    </header>

    <section class="relative pt-36 pb-16 px-6 overflow-hidden border-b border-zinc-800">
        <div class="absolute inset-0 bg-gradient-to-b from-zinc-900 to-brand-dark"></div>
        <div class="absolute top-1/3 left-1/2 -translate-x-1/2 w-[520px] h-[520px] bg-brand-gold/10 blur-[140px] rounded-full pointer-events-none"></div>
        <div class="max-w-5xl mx-auto relative z-10 text-center">
            <p class="text-brand-gold uppercase tracking-[0.24em] text-xs font-bold mb-4">Aqueous Event Details</p>
            <h1 class="text-4xl md:text-6xl font-black font-serif mb-5">Event Briefing Sheet</h1>
            <p class="text-zinc-300 max-w-3xl mx-auto text-base md:text-lg">Provide detailed information about your Aqueous event requirements.</p>
        </div>
    </section>

    <main class="py-16 px-6">
        <form id="quote-form" method="post" action="includes/process.php">
        <input type="hidden" name="page_url" value="<?php echo htmlspecialchars((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], ENT_QUOTES, 'UTF-8'); ?>">
        <input type="text" name="website" value="" tabindex="-1" autocomplete="off" aria-hidden="true" style="position:absolute; left:-9999px;">
        <div class="max-w-3xl mx-auto">
            <section class="bg-brand-card border border-zinc-800 rounded-3xl p-8 md:p-10">
                <h2 class="text-2xl md:text-3xl font-extrabold font-serif mb-8">Aqueous Event Briefing Sheet</h2>

                <div class="space-y-6">
                    <div>
                        <label for="aqueous-date" class="block text-xs uppercase tracking-widest text-zinc-400 font-bold mb-2">Date of Event</label>
                        <input id="aqueous-date" name="aqueous_date" type="date" class="w-full bg-zinc-900 border border-zinc-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-brand-gold transition">
                    </div>

                    <div>
                        <label for="aqueous-location" class="block text-xs uppercase tracking-widest text-zinc-400 font-bold mb-2">Location</label>
                        <input id="aqueous-location" name="aqueous_location" type="text" class="w-full bg-zinc-900 border border-zinc-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-brand-gold transition">
                    </div>

                    <div>
                        <label for="aqueous-occasion" class="block text-xs uppercase tracking-widest text-zinc-400 font-bold mb-2">The Occasion</label>
                        <input id="aqueous-occasion" name="aqueous_occasion" type="text" class="w-full bg-zinc-900 border border-zinc-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-brand-gold transition">
                    </div>

                    <div>
                        <label for="aqueous-timings" class="block text-xs uppercase tracking-widest text-zinc-400 font-bold mb-2">Timings</label>
                        <input id="aqueous-timings" name="aqueous_timings" type="text" placeholder="e.g. 5:00 PM - 11:00 PM" class="w-full bg-zinc-900 border border-zinc-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-brand-gold transition">
                    </div>

                    <div>
                        <label for="aqueous-pax" class="block text-xs uppercase tracking-widest text-zinc-400 font-bold mb-2">Pax</label>
                        <input id="aqueous-pax" name="aqueous_pax" type="number" min="1" class="w-full bg-zinc-900 border border-zinc-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-brand-gold transition">
                    </div>

                    <div>
                        <label for="aqueous-food-style" class="block text-xs uppercase tracking-widest text-zinc-400 font-bold mb-2">Food Style</label>
                        <input id="aqueous-food-style" name="aqueous_food_style" type="text" class="w-full bg-zinc-900 border border-zinc-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-brand-gold transition">
                    </div>

                    <div>
                        <label for="aqueous-drinks-style" class="block text-xs uppercase tracking-widest text-zinc-400 font-bold mb-2">Drinks Style</label>
                        <p class="text-zinc-500 text-sm mb-2">e.g. we want 3 types of cocktails and a full bar / full bar no cocktails / wine and beer bar only with soft drinks</p>
                        <textarea id="aqueous-drinks-style" name="aqueous_drinks_style" rows="3" class="w-full bg-zinc-900 border border-zinc-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-brand-gold transition"></textarea>
                    </div>

                    <div>
                        <label for="aqueous-special-considerations" class="block text-xs uppercase tracking-widest text-zinc-400 font-bold mb-2">Any Special Considerations We Need To Know About To Make This Event A Success?</label>
                        <p class="text-zinc-500 text-sm mb-2">Please be exhaustive.</p>
                        <textarea id="aqueous-special-considerations" name="aqueous_special_considerations" rows="4" class="w-full bg-zinc-900 border border-zinc-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-brand-gold transition"></textarea>
                    </div>

                    <div>
                        <label for="basics-email" class="block text-xs uppercase tracking-widest text-zinc-400 font-bold mb-2">Your Preferred email Contact</label>
                        <input required id="basics-email" name="basics_email" type="text" placeholder="e.g. you@example.com" class="w-full bg-zinc-900 border border-zinc-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-brand-gold transition">
                    </div>

                    <div>
                        <label for="aqueous-whatsapp" class="block text-xs uppercase tracking-widest text-zinc-400 font-bold mb-2">Your WhatsApp #</label>
                        <input id="aqueous-whatsapp" name="aqueous_whatsapp" type="text" placeholder="e.g. +254 7xx xxx xxx" class="w-full bg-zinc-900 border border-zinc-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-brand-gold transition">
                    </div>

                    <div>
                        <label for="aqueous-phone" class="block text-xs uppercase tracking-widest text-zinc-400 font-bold mb-2">Your Preferred Telephone # for Calls</label>
                        <input id="aqueous-phone" name="aqueous_phone" type="text" class="w-full bg-zinc-900 border border-zinc-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-brand-gold transition">
                    </div>
                </div>
            </section>
            <div id="form-message" class="hidden rounded-xl border px-4 py-3 text-sm mt-6" aria-live="polite"></div>
        </div>
        </form>

        <div class="max-w-3xl mx-auto mt-12 flex flex-col md:flex-row justify-center gap-6">
            <button type="submit" form="quote-form" class="inline-flex items-center justify-center bg-brand-gold hover:bg-amber-400 text-brand-dark px-8 py-4 rounded-xl font-extrabold text-base transition shadow-xl hover:shadow-amber-500/20 shadow-sky-500/20">
                Submit Form
            </button>
            <a href="basics.php" class="inline-flex items-center justify-center bg-zinc-700 hover:bg-zinc-600 text-white px-8 py-4 rounded-xl font-bold text-base transition shadow-xl shadow-zinc-600/20">
                Back to Event Basics
            </a>
            <a href="img/AQUEOUS EVENT INFORMATION SHEET - Sample.xls" class="inline-flex items-center justify-center bg-zinc-700 hover:bg-zinc-600 text-white px-8 py-4 rounded-xl font-bold text-base transition shadow-xl shadow-zinc-600/20">
                See a sample event brief here
            </a>
        </div>
    </main>

    <?php include "includes/footer.php"; ?>
</body>
</html>
