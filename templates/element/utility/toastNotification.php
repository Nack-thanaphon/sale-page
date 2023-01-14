<script type="text/javascript">

    alertI(1)
    /**
     * 
     * Function make for toast notification
     * @author sarawutt.b
     * @param {type} message as a string of notification message
     * @param {type} type as a string type of notification
     * @returns {undefined} 
     */
    function toasNotification(message, type) {
        var notiFicationType = (type) ? type : 'success';
        setTimeout(function () {
            notification(message, notiFicationType);
        }, 100);
    }

    /**
     * Notification for success style
     * @author sarawutt.b
     * @param string message of notification
     * @returns void
     */
    function notiInfo(message) {
        toasNotification(message, 'info');
    }

    /**
     * Notification for success style
     * @author sarawutt.b
     * @param string message of notification
     * @returns void
     */
    function notiSuccess(message) {
        toasNotification(message, 'success');
    }


    /**
     * Notification for warning style
     * @author sarawutt.b
     * @param string message of notification
     * @returns void
     */
    function notiWarning(message) {
        toasNotification(message, 'warning');
    }

    /**
     * Notification for error style
     * @author sarawutt.b
     * @param string message of notification
     * @returns void
     */
    function notiError(message) {
        toasNotification(message, 'error');
    }

    function notification(message, type) {
        if (message == "") {
            return false;
        }

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "positionClass": "toast-top-center",
            "progressBar": false,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        if (type == "info") {
            toastr.info(message);
        } else if (type == "success") {
            toastr.success(message);
        } else if (type == "warning") {
            toastr.warning(message);
        } else if (type == "error") {
            toastr.error(message);
        }
    }

</script>