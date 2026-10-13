class Mobile_menu {
    constructor() {
        //TODO: free this from jquery
        jQuery(".menuwrapper").prepend("<div class='mobilemenu'></div>");
        jQuery(".mobilemenu").click(function () {
            if (jQuery(".menuwrapper").hasClass("open")) {
                //if is open remove open class
                jQuery(".menuwrapper").removeClass("open");
            } else {
                jQuery(".menuwrapper").addClass("open");
            }
        });
    }
}
