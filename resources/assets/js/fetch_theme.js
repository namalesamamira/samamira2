class Theme {
    constructor() {
        this.fetch_theme();
    }
    fetch() {
        var cookieString = document.cookie;
        var theme_cookie_set = false;

        //if cookie has darkmode on, set bode.darkmode
        var cookie_array = cookieString.split(";");
        for (var i = 0; i < cookie_array.length; i++) {
            var darkmode_array = cookie_array[i].split("=");
            if (darkmode_array[0].trim() === "dark_mode") {
                theme_cookie_set = true;
                if (darkmode_array[1].trim() === "true") {
                    document.querySelector("body").classList.add("dark_mode");
                }
            }
        }
        if (theme_cookie_set == false) {
            //if i have not set the theme manually, let the OS set it
            const prefersDarkScheme = window.matchMedia(
                "(prefers-color-scheme: dark)",
            );

            if (prefersDarkScheme.matches) {
                document.querySelector("body").classList.add("dark_mode");
            } else {
                // document.querySelector('body').classList.remove("dark_mode");
            }
        }
    }
}
