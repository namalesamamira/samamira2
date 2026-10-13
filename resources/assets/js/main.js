var form = jQuery("#get_started_form");
var login_form_object = jQuery("#login_form");
function onSubmit(token) {
    if (form.valid()) {
        form.submit();
    } else {
        console.log("form not valid");
    }
}

jQuery.noConflict();
jQuery(document).ready(function () {
    var $object = jQuery("#particles-js"); //to check if it exists
    if ($object.length) {
        particlesJS.load("particles-js", "js/particles.json", function () {
            // console.log('callback - particles.js config loaded');
        });
    }

    var $object = jQuery(".delete"); //to check if it exists
    if ($object.length) {
        jQuery(document).on("click", ".delete", function (event) {
            event.preventDefault();
            if (
                confirm(
                    "Are you sure you want to delete " +
                        "\n" +
                        '"' +
                        this.getAttribute("data-title") +
                        '"',
                ) == true
            ) {
                // window.location.href = this.href+"?";
                var dataString =
                    "data-id=" +
                    this.getAttribute("data-id") +
                    "&_token=" +
                    this.getAttribute("data-token");
                jQuery.ajax({
                    type: "POST",
                    url: this.href,
                    data: dataString,
                    success: function (data) {
                        data = JSON.parse(data);
                        window.location.href =
                            window.location.protocol +
                            "//" +
                            window.location.host +
                            "/content";
                    },
                });
            } else {
                // alert("You canceled!");
            }
        });
    }

    var $object = jQuery("#ai"); //to check if it exists
    if ($object.length) {
        $object.select2({
            tags: true,
            ajax: {
                url: "https://catfact.ninja/facts",
                dataType: "json",
            },
        });
    }

    //https://github.com/SortableJS/Sortable
    var $object = jQuery("#attachments"); //to check if it exists
    if ($object.length) {
        $object.sortable({
            items: ".dz-preview",
            cursor: "move",
            opacity: 0.5,
            containment: ".dropzone",
            distance: 20,
            tolerance: "pointer",
            animation: 150,
            swapThreshold: 1,
            onEnd: function (evt) {
                console.log("end sort");
                var queue = attachments.files;
                console.log(queue);
                var newQueue = [];
                var new_file_input = "";
                jQuery(
                    ".dropzone .dz-preview .dz-filename [data-dz-name]",
                ).each(function (count, el) {
                    var name = el.innerHTML;
                    queue.forEach(function (file) {
                        if (file.name === name) {
                            newQueue.push(file);
                            new_file_input =
                                new_file_input + file.server_name + ",";
                        }
                    });
                });

                new_file_input = new_file_input.slice(0, -1); //remove last comma
                document.getElementById("file_input").value = new_file_input;
                attachments.files = newQueue;
                console.log(newQueue);
                console.log(new_file_input);
            },
            onStart: function (/**Event*/ evt) {
                console.log("sorting");
                evt.oldIndex; // element index within parent
            },
        });
    }

    var $object = jQuery(".dashboard_opener"); //to check if it exists
    if ($object.length) {
        $object.on("click", function () {
            jQuery(".side_dashboard").toggleClass("open");
        });
    }

    form.validate({
        //jquery and validate need to be ready by now
        errorClass: "error",
        errorElement: "div",
    });

    login_form_object.validate({
        //jquery and validate need to be ready by now
        errorClass: "error",
        errorElement: "div",
    });

    //     var $object = jQuery('.speakers_slider');//to check if it exists

    //     if($object.length) {
    //         jQuery('.speakers_slider').slick({
    //             infinite: false,
    //             slidesToShow: 3,
    //             slidesToScroll: 3,
    //             responsive: [
    //                 {
    //                 breakpoint: 900,
    //                 settings: {
    //                     slidesToShow: 1,
    //                     slidesToScroll: 1
    //                 }
    //             }]
    //         });
    //     }
    //     //TODO: refactor to external file
    //     jQuery('#opendashboard').click(function(){
    //         if (jQuery('.dashboard').hasClass('open')) {//if is open remove open class
    //             jQuery('.dashboard').removeClass('open');
    //             jQuery('#opendashboard').addClass('isclosed');
    //             jQuery('#opendashboard').removeClass('isopen');
    //         }else{
    //             jQuery('.dashboard').addClass('open');
    //             jQuery('#opendashboard').removeClass('isclosed');
    //             jQuery('#opendashboard').addClass('isopen');
    //         }
    //     });

    //     jQuery('.slick_slider').slick({
    //         infinite: true
    //     });

    //TODO: make into a class
    jQuery("a.scrollLink").click(function (event) {
        event.preventDefault();
        // resetmenus();
        jQuery("a.scrollLink").removeClass("current"); // removes from all matchnif objects
        jQuery(this).addClass("current");
        jQuery("html, body").animate(
            { scrollTop: jQuery(jQuery(this).attr("href")).offset().top },
            500,
        ); //TODO: let speed be dynamic. Use multi line code
    });

    // jQuery( "button" ).click(function( event ) {
    //     var body_object = document.querySelector("button");
    //     body_object.classList.add("loading");
    //     body_object.disabled=true;
    //     console.log(this.classList.contains("login_button"));
    //     // body_object.closest('form').submit();
    //     if (this.classList.contains("login_button")===true) {
    //         document.getElementById('login_form').submit();
    //     }
    //     if (this.classList.contains("get_started_button")===true) {
    //         document.getElementById('get_started_form').submit();
    //     }
    // });
});
let Scrolled1 = new Scroll_toggler(50);
let Main_Menu = new Mobile_menu();
// let setup_validation = new Setup_validation(jQuery('form'));
