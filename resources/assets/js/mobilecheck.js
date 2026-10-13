class Mobile_check {
    constructor() {
        this.isMobile = {
            Android: function () {
                return navigator.userAgent.match(/Android/i);
            },
            BlackBerry: function () {
                return navigator.userAgent.match(/BlackBerry/i);
            },
            iOS: function () {
                return navigator.userAgent.match(/iPhone|iPad|iPod/i);
            },
            Opera: function () {
                return navigator.userAgent.match(/Opera Mini/i);
            },
            Windows: function () {
                return navigator.userAgent.match(/IEMobile/i);
            },
            any: function () {
                return (
                    this.isMobile.Android() ||
                    this.isMobile.BlackBerry() ||
                    this.isMobile.iOS() ||
                    this.isMobile.Opera() ||
                    this.isMobile.Windows()
                );
            },
        };

        //use
        if (this.isMobile.any()) {
            var body_object = document.querySelector("body");
            body_object.classList.add("mobile");
        }

        if (this.isMobile.Opera()) {
            var body_object = document.querySelector("body");
            body_object.classList.add("opera");
        }
    }
}
