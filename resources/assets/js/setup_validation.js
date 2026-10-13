class Setup_validation {
    constructor() {}
    form(form) {
        console.log("Setup_validation.form", form);
        //TODO: recieve selected form
        //TODO: recieve validate settings
        var $object = form;
        if (form.length) {
            //if form exists
            form.validate({
                errorClass: "error",
                errorElement: "div",
            });
            // if (isset(rules)) {
            //     form.validate.rules = {email: {
            //             required: true,
            //             email: true
            //     }};

            // }
        }
    }
}
