<head>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta charset="utf-8">
    <title><?php echo $title;?></title>
    <meta name='description' content="<?php echo $description;?>" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- <link href='css/style.min.css?v=1' media='all' type='text/css' rel='stylesheet'> -->
    <link rel="canonical" href="<?php echo $url;?>"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="css/tailwind.css" media="all" type="text/css" rel="stylesheet">

    <!-- Mobile Menu Styles -->
    <style>
        @keyframes slideInMenu {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .mobilemenu {
            display: none;
            position: fixed;
            top: 40%;
            right: 20px;
            transform: translateY(-50%);
            cursor: pointer;
            width: 32px;
            height: 32px;
            background: transparent;
            border: none;
            z-index: 10001;
            padding: 0;
        }
        .mobilemenu::before {
            content: '';
            position: absolute;
            width: 24px;
            height: 2px;
            background: white;
            top: 8px;
            left: 4px;
            box-shadow: 0 8px 0 white, 0 16px 0 white;
            transition: all 0.3s ease;
        }
        .mobilemenu.close-icon::before {
            width: 24px;
            height: 2px;
            top: 15px;
            box-shadow: none;
            transform: rotate(45deg);
        }
        .mobilemenu.close-icon::after {
            content: '';
            position: absolute;
            width: 24px;
            height: 2px;
            background: white;
            top: 15px;
            left: 4px;
            transform: rotate(-45deg);
        }
        .menuwrapper {
            position: relative;
        }
        .menuwrapper::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: opacity 0.3s ease, visibility 0.3s ease;
            z-index: 9998;
        }
        .menuwrapper.open::after {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }
        .menuwrapper nav {
            position: fixed;
            top: 0;
            right: 0;
            width: 100%;
            max-width: 320px;
            height: 100vh;
            background: linear-gradient(135deg, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 0.7) 100%);
            backdrop-filter: blur(8px);
            padding-top: 80px;
            padding-right: 20px;
            padding-left: 20px;
            overflow-y: auto;
            transform: translateX(100%);
            transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            z-index: 9999;
            display: flex !important;
            flex-direction: column;
            gap: 0;
        }
        .menuwrapper nav a {
            display: block;
            padding: 16px 0;
            color: #e4e4e7;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            border-bottom: 1px solid rgba(244, 63, 94, 0.1);
            transition: color 0.2s ease;
            opacity: 0;
        }
        .menuwrapper.open nav a {
            animation: slideInMenu 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
        }
        .menuwrapper.open nav a:nth-child(1) {
            animation-delay: 0.1s;
        }
        .menuwrapper.open nav a:nth-child(2) {
            animation-delay: 0.2s;
        }
        .menuwrapper.open nav a:nth-child(3) {
            animation-delay: 0.3s;
        }
        .menuwrapper.open nav a:nth-child(4) {
            animation-delay: 0.4s;
        }
        .menuwrapper.open nav a:nth-child(5) {
            animation-delay: 0.5s;
        }
        .menuwrapper nav a:hover {
            color: #fcd34d;
        }
        .menuwrapper.open nav {
            transform: translateX(0);
        }
        @media only screen and (max-width: 768px) {
            .menuwrapper .mobilemenu {
                display: block;
            }
            .menuwrapper nav {
                display: none !important;
            }
            .menuwrapper.open nav {
                display: flex !important;
            }
        }
        @media only screen and (min-width: 769px) {
            .menuwrapper .mobilemenu {
                display: none !important;
            }
            .menuwrapper nav {
                position: static !important;
                width: auto !important;
                max-width: none !important;
                height: auto !important;
                background: none !important;
                backdrop-filter: none !important;
                padding: 0 !important;
                overflow-y: visible !important;
                transform: none !important;
                transition: none !important;
                display: flex !important;
                flex-direction: row !important;
                gap: 2rem !important;
                z-index: auto !important;
            }
            .menuwrapper nav a {
                padding: 0 !important;
                color: #a1a1a6 !important;
                border-bottom: none !important;
                font-size: 0.875rem !important;
                opacity: 1 !important;
                transition: color 0.2s ease;
            }
            .menuwrapper nav a:hover {
                color: #fcd34d !important;
            }
            .menuwrapper::after {
                display: none !important;
            }
        }
        @media only screen and (max-width: 450px) {
            .menuwrapper nav {
                max-width: 100%;
                padding-top: 60px;
            }
        }

        /* Testimonial Expansion Styles */
        [data-testimonial-text] {
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: -webkit-line-clamp 0.3s ease;
        }

        [data-testimonial-article] {
            transition: cursor 0.2s ease;
        }

        [data-testimonial-article]:hover [data-testimonial-text] {
            text-decoration: underline;
            text-decoration-color: rgba(56, 189, 248, 0.5);
            text-underline-offset: 4px;
        }

        [data-testimonial-modal-overlay] {
            animation: fadeIn 0.3s ease-out;
        }

        [data-testimonial-modal-overlay].hidden {
            animation: fadeOut 0.3s ease-out;
        }

        [data-testimonial-modal-container] {
            animation: slideUp 0.3s ease-out;
        }

        [data-testimonial-modal-container].hidden {
            animation: slideDown 0.3s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideDown {
            from {
                opacity: 1;
                transform: translateY(0);
            }
            to {
                opacity: 0;
                transform: translateY(20px);
            }
        }
    </style>

    <!-- Open Graph data -->
    <meta property="og:title" content="<?php echo $title;?>" />
    <meta property="og:url" content="<?php echo $url;?>" />
    <meta property="og:image" content="<?php echo $image;?>" />
    <meta property="og:description" content="<?php echo $description;?>" />
    <meta property="og:site_name" content="<?php echo $site_name;?>" />
    <meta property="og:type" content="website" />

    <!-- X (formerly Twitter) Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@AQUEOUSKenya">
    <meta name="twitter:creator" content="@AQUEOUSKenya">
    <meta name="twitter:title" content="<?php echo $title;?>">
    <meta name="twitter:description" content="<?php echo $description;?>">
    <meta name="twitter:image" content="<?php echo $image;?>">

    <!-- favicons-->
    <link rel="icon" type="image/png" href="img/favicons/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="img/favicons/favicon.svg" />
    <link rel="shortcut icon" href="img/favicons/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="Aqueous" />
    <link rel="manifest" href="img/favicons/site.webmanifest" />

    <!-- Analytics -->
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-7EHWY3FHZW"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-7EHWY3FHZW');
    </script>
</head>
