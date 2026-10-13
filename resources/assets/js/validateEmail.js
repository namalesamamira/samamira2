class Validate_email {
    constructor(email) {
        this.email = email;
    }
    validateEmail() {
        var re =
            /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        return re.test(this.email);
    }
}
