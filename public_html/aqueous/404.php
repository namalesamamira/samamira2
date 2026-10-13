<?php
http_response_code(404);

$site_name = "Aqueous";
$url = "https://aqueous.mobi/";
$title = "Page Not Found | Aqueous";
$description = "The page you requested could not be found. Visit the Aqueous homepage.";
$image = "img/grill.png";

include "includes/head.php";
?>
<body class="bg-brand-dark text-zinc-100 font-sans selection:bg-brand-gold selection:text-black">
    <main class="min-h-screen flex flex-col items-center justify-center px-6 text-center">
        <a href="/" aria-label="Aqueous homepage" class="mb-12">
            <img src="/img/logo.png" alt="Aqueous" class="h-10 w-auto">
        </a>
        <p class="text-brand-gold uppercase tracking-[0.3em] text-sm font-bold mb-4">404</p>
        <h1 class="text-4xl md:text-6xl font-black font-serif mb-5">Page not found</h1>
        <p class="text-zinc-300 text-lg max-w-lg mb-10">
            Sorry, we couldn’t find the page you’re looking for. Please head back to our homepage.
        </p>
        <a href="/" class="bg-brand-gold hover:bg-amber-400 text-brand-dark px-8 py-4 rounded-xl font-extrabold transition">
            Go to homepage
        </a>
    </main>
</body>
</html>
