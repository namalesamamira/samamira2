<header class="fixed top-0 left-0 right-0 z-50 bg-brand-dark/40 backdrop-blur-md border-b border-zinc-800" id="top">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <div class="text-2xl font-black tracking-widest text-transparent bg-clip-text bg-gradient-to-r from-brand-gold via-amber-200 to-white">
            <a href="#top" class="inline-flex items-center gap-3" onclick="window.scrollTo({top: 0, behavior: 'smooth'});">
                <img src="img/logo.png" alt="Aqueous" style="height:30px; width:auto">
            </a>
        </div>
        <div class="menuwrapper <?php echo (!empty($hide_header_nav) ? 'hidden' : ''); ?>">
            <nav aria-label="Primary Navigation">
                <a href="#services">Bar Services</a>
                <a href="#gallery">Catering</a>
                <a href="#basics">The Basics</a>
                <a href="#hospitality">Full Service Event Management</a>
                <a href="#quote">Contact Us</a>
            </nav>
        </div>
    </div>
</header>
