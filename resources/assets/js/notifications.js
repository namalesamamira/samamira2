class Notification {
    constructor() {}
    setupCloseNotification() {
        jQuery(".notification_messages .close").click(function () {
            jQuery(".notification_messages").slideUp(200);
        });
    }
}
