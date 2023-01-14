<script type="text/javascript">
    /**
     | ------------------------------------------------------------------------------------------------------------------
     | Packgon common application action / trigger / layout /Dynamic UI
     | @author  sarawutt.b
     | @since   2016/03/02 14:22:35
     | @license Pakgon Ltd ,Company
     | ------------------------------------------------------------------------------------------------------------------
     | ------------------------------------------------------------------------------------------------------------------
     */

    var _modalTitle = '<?php echo __('Are you sure process the action ?'); ?>';
    var _modalMessageTitle = '<?php echo __('Application process status.'); ?>';
    var _appMessageTitle = '<?php echo __('Application process status.'); ?>';
    var _modalConfirmMessage = '<?php echo __('Are you sure process the action ?'); ?>';
    var _formDisabledOption = $('#formDisabledOption').val();
    /**
     *
     * @var _currentController as a string of cakePHP current controller
     * @var _currentAction as a string of cakePHP current action
     * @var _currentURI as a string of cakePHP current URI
     */
    var _currentController = '<?php echo $this->request->getParam('controller'); ?>';
    var _currentAction = '<?php echo $this->request->getParam('action'); ?>';
    var _currentURI = '<?php echo \Cake\Routing\Router::url($this->request->getRequestTarget(), true); ?>';


    /**
     * Custom configure for jQuery Validation plugin
     */
//    $.validator.setDefaults({
//        ignore: ':hidden:not(select),*:not([name])',
//        errorElement: 'span',
//        errorClass: 'help-block',
//        errorPlacement: function (error, element) {
//            if (element.parent('.input-group').length || element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
//                error.insertBefore(element.parent());
//            } else if (element.prop('type') == 'text') {
//                error.insertAfter(element);
//            } else if (element.is('select')) {
//                error.insertAfter(element.siblings(".chosen-container"));
//            } else {
//                error.insertAfter(element);
//            }
//        },
//        highlight: function (element, errorClass, validClass) {
//            if (element.type === "radio") {
//                this.findByName(element.name).addClass(errorClass).removeClass(validClass);
//            } else if (element.type === "text") {
//                $(element).closest('div').removeClass('has-success has-feedback').addClass('has-error');
//            } else {
//                $(element).closest('div').removeClass('has-success has-feedback').addClass('has-error');
//            }
//        },
//        unhighlight: function (element, errorClass, validClass) {
//            if (element.type === "radio") {
//                this.findByName(element.name).removeClass(errorClass);
//            } else if (element.type === "text") {
//                $(element).closest('div').removeClass('has-error has-feedback');
//            } else {
//                $(element).closest('div').removeClass('has-error has-feedback');
//            }
//        }
//    });

    $.validator.setDefaults({
        ignore: ':hidden:not(select),*:not([name])',
        errorElement: 'div',
        errorClass: 'invalid-feedback lead',
        errorPlacement: function (error, element) {
            if (element.parent('.input-group').length || element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
                error.insertBefore(element.parent());
            } else if (element.prop('type') == 'text') {
                error.insertAfter(element);
            } else if (element.is('select')) {
                error.insertAfter(element.siblings(".select2-container"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {

            if (element.type === "radio") {
                this.findByName(element.name).addClass(errorClass).removeClass(validClass);
            } else {
                //$(element).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                //$(element).closest('.form-group').find('i.fa').remove();
                //$(element).closest('.form-group').append('<i class="fa fa-exclamation fa-lg form-control-feedback"></i>');
            }
        },
        unhighlight: function (element, errorClass, validClass) {
            if (element.type === "radio") {
                this.findByName(element.name).removeClass(errorClass).addClass(validClass);
            } else {
                //$(element).closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
                //$(element).closest('.form-group').find('i.fa').remove();
                //$(element).closest('.form-group').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
            }
        }
    });

    $(function () {

        /**
         Fixed display select menu on the android device
         */
        var nua = navigator.userAgent
        var isAndroid = (nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 && nua.indexOf('AppleWebKit') > -1 && nua.indexOf('Chrome') === -1)
        if (isAndroid) {
            $('select.form-control').removeClass('form-control').css('width', '100%')
        }

        var _ajaxProgress = null;
        //remove cakephp default confirmation generate by postLink to false
        $('.action-delete').attr('onclick', false);
        /**
         *
         * Function remove trigger whern chosen select validation change value
         * @author  sarawutt.b
         * @return boolean
         */
        $('select').change(function () {
            var self = $(this).closest('div');
            var _value = $(this).val();
            if ((_value != '') || (_value != undefined)) {
                //self.removeClass('has-error has-feedback').addClass('has-success');
                self.removeClass('has-error has-feedback');
                self.find('span.help-block').remove();
            }
            return true;
        });


        /**
         * Dynamic set current menu to active class
         * @author  sarawutt.b
         * @since   2016/05/25
         */
        var url = window.location;
        $('ul.sidebar-menu li.treeview ul.treeview-menu li a[href="' + this.location.pathname + '"]').parents('li').addClass('active');
        $('nav>ul>li>a[href="' + this.location.pathname + '"]').parents('li').addClass('active');

        //build cake generate code to bootstrap style
        // if (!$('div.input:not(.simple), div.text:not(.simple)').hasClass('form-group')) {
        //     $('div.input:not(.simple), div.text:not(.simple)').addClass('form-group');
        // }
        // if (!$('input[type="text"]:not(.simple),select:not(.simple)').hasClass('form-control')) {
        //     $('input[type="text"]:not(.simple),select:not(.simple)').addClass('form-control');
        // }
        // if (!$('input[type="date"]:not(.simple),select:not(.simple)').hasClass('form-control')) {
        //     $('input[type="date"]:not(.simple),select:not(.simple)').addClass('form-control');
        // }
//        $("#UserPicturePath").removeClass('form-control');
//        $('input[type="file"]').removeClass('form-control');
        /**
         * Generate placeholder to each input not has class simple
         * @author  Sarawutt.b
         * @since   2016/04/01 10:00
         */
        $('input[type="text"]:not(.simple),input[type="email"]:not(.simple),input[type="tel"]:not(.simple),input[type="password"]:not(.simple)').each(function () {
            $this = $(this);
            $label = $('label[for="' + $this.attr('id') + '"]');
            if ($('input#' + $this.attr('id')).attr('placeholder') == undefined) {
                $('input#' + $this.attr('id')).attr('placeholder', $label.text());
            }

            /**
             *
             * Add red star for input , textarea , select when thay has class required
             * @author  sarawutt.b
             * @returns void
             */
            // if ($this.hasClass('required')) {
            //     $label.html($label.text() + '<span class="red-star">*</span>')
            // }
        });
        /**
         * Generate placeholder to each input not has class simple
         * @author  Sarawutt.b
         * @since   2016/07/23 20:30
         */
        $('textarea:not(.simple)').each(function () {
            $this = $(this);
            $label = $('label[for="' + $this.attr('id') + '"]');
            if ($('textarea#' + $this.attr('id')).attr('placeholder') == undefined) {
                $('textarea#' + $this.attr('id')).attr('placeholder', $label.text());
            }
        });

        //Select2
        //Adding by sarawutt.b
        $('select:not(.simple)').select2({
            theme: 'bootstrap4'
        });
        $('input[type="text"].select2-input').attr('name', 'select-search[]');
        $('input[type="text"].select2-focusser').attr('name', 'select-searchx[]');
        $('input[type="text"].select2-offscreen').attr('name', 'select-searchy[]');
        $('input[type="submit"]:not(.simple)').addClass('btn btn-primary');
        $('input[type="reset"]:not(.simple)').addClass('btn btn-default');
        $('form').attr('role', 'form');

//         /**
//          *
//          * Function make bootstrap thai date B.E. Format
//          * @author  Vorrarit.L
//          * @return  void
//          */
//         thdatepickers = $('input[type="text"].thdatepicker:not(.simple),input[type="text"].th-datepicker:not(.simple),input[type="text"].datepicker:not(.simple)');
//         for (var i = 0; i < thdatepickers.length; i++) {
//             var dp = $(thdatepickers[i]);
//             var dpCopy = dp.clone();
//             dp.prop('type', 'hidden');
//             dpCopy.prop('name', 'thdp_' + dp.prop('name'));
//             dpCopy.prop('id', 'thdp_' + dp.prop('id'));
//             dpCopy.attr('data-provide', 'datepicker');
//             dpCopy.attr('data-date-format', 'dd/mm/yyyy');
//             dpCopy.attr('data-date-language', 'th-th');
//             dpCopy.removeClass('thdatepicker');
//             dpCopy.addClass('thdp_thdatepicker');
//             dpCopy.insertAfter(dp);
//             dpCopy.wrap('<div class="input-group"></div>').before('<div class="input-group-addon"><i class="fa fa-calendar"></i></div>');
//             if (dp.val() != '') {
// //                console.log(dp.val());
// //                console.log(moment('2018-02-23').format('YYYY'));
// //                console.log(moment("12-25-1995", "MM-DD-YYYY").format('YY-MM-DD'));
// //                console.log(moment("12/25/2018", "MM-DD-YYYY").format('YYYY'));
// //                console.log(moment(dp.val(), "DD/MM/YY").format('YYYY'));
// //                console.log(dp.val());
// //                return false;
//                 dpCopy.val(moment(dp.val(), "DD/MM/YY").format("DD/MM") + "/" + (moment(dp.val(), "DD/MM/YY").format("YYYY") * 1 + 543));
//             }
//             dpCopy.datepicker({toggleActive: false, autoclose: true}).on('changeDate', (function (e) {
//                 // console.log(e.target);
//                 //console.log('changeDate ' + e.target.value);
//                 if (e.target.value != '') {
//                     this.val(moment(e.date).format('YYYY-MM-DD'));
//                 } else {
//                     this.val('');
//                 }
//             }).bind(dp)).on('hide', (function (e) {
//                 // console.log(e.target);
//                 //console.log('hide ' + e.target.value);
//                 if (e.target.value != '') {
//                     this.val(moment(e.date).format('YYYY-MM-DD'));
//                 } else {
//                     this.val('');
//                 }
//             }).bind(dp)).on('show', (function (e) {
//                 e.stopPropagation();
//             }));
//         }
//
//         /**
//          *
//          * Function set minDate to seccond datepicker input (where has class datepicker-end | datetimepicker-end)
//          * @author  sarawutt.b
//          * @returns void
//          */
//         $('.datepicker-start,.datetimepicker-start').on('dp.change', function (selected) {
//             $(".datepicker-end,.datetimepicker-end").data("DateTimePicker").setMinDate(selected.date);
//         });
//
//         if ($(".datepicker-end,.datetimepicker-end").length > 0) {
//             $(".datepicker-end,.datetimepicker-end").datetimepicker().data("DateTimePicker").setMinDate($('.datepicker-start,.datetimepicker-start').val());
//         }


        //$("div.index table, div.related table,div.view-related table.table-view-related,.table-view-related,.table-short-information").addClass('table table-bordered table-striped');//.find('tr:first').css('background-color', '#CFCFCF');
        $("table.table-form-view").addClass('table table-striped');

        var tmpController = $(location).attr('pathname').split('/');
        var url = $(location).attr('protocol') + '//' + $(location).attr('host') + '/' + tmpController[1] + '/add';
        //Generate addindig button on index page display on above table
        $('div.index h1').wrap('<div class="row"><div class="col-md-8"></div><div class="col-md-4"><a href="' + url + '" class="btn btn-success pull-right btn-add-item"><i class="fa fa-plus"></i><?php echo __('Add'); ?></a></div></div>');
        //Generate delete action to modal style
        $("td.actions:not(.simple)").each(function () {
            $(this).find('span.glyphicon-search').parent('a').attr('title', '<?php echo __('View more infomation'); ?>');
            $(this).find('span.glyphicon-edit').parent('a').attr('title', '<?php echo __('Edit'); ?>');
            $(this).find('span.glyphicon-remove').parent('a').addClass('action-delete').attr('onclick', false).attr('title', '<?php echo __('Delete'); ?>');
        });

        //index page has show delete button ask for confirm before delete
        //if actor click to confirm then delete data where condition correcly in the database
        $(".action-delete").on('click', function () {
            $this = $(this);
            // alert("action-delete");
            console.log("action-delete");

            $form = $this.prev();
            var post = {_method:$form.find('input[name="_method"]').val(),_csrfToken: $form.find('input[name="_csrfToken"]').val()};
            console.log(post);
            confirmModal('<?php echo __('Are you sure for delete ?'); ?>', function (result) {
                $("section.content div.alert").remove();
                console.log(result);
                if (result == true) {
                    toastr.clear();
                    var url = $(location).attr('protocol') + '//' + $(location).attr('host') + $this.prev().attr('action') + '.json';
                    console.log(url);
                    $.post(url,post, function (data, status) {
                        console.log(data);
                        $("section.content div.alert").remove();
                        toastr.clear();
                        try {
                            var tmpJson = $.parseJSON(data);
                        } catch (error) {
                            var tmpJson = {message: $.trim($(data).filter('p').text()), class: 'success'};
                        }

                        var msg = tmpJson.message || '<?php echo __('Successfully'); ?>';
                        var bclass = tmpJson.class || 'info';
                        var resultStatus = tmpJson.status || 'OK';
                        if (resultStatus == 'OK') {
                            if ($this.hasClass('btnGroupMenu')) {
                                $this.parent().parent().parent().parent().parent().remove();
                            } else {
                                $this.closest('tr').remove();
                            }
                            toasNotification(msg, bclass);
                            return true;
                        } else {
                            toasNotification(msg, bclass);
                            return true;
                        }
                        return;
                    });
                } else {
                    return false;
                }
                ;
            });
        });
        //Remove action link code generate by cakephp
        //$("div.actions").remove();
        //$("div.related").remove();
        $("div.form div.submit").find('input[type="submit"]').after('<input type="button" class="btn btn-default btn-back" name="btn-back" value="<?php echo __('Back'); ?>" onclick="window.history.back();"/>');
        //$("div.view table").after('<div class="submit"><input type="button" class="btn btn-default btn-back" name="btn-back" value="<?php echo __('Back'); ?>" onclick="window.history.back();"/></div>');
        /*
         * We are gonna initialize all checkbox and radio inputs to
         * iCheck plugin in.
         * You can find the documentation at http://fronteed.com/iCheck/
         */
        $("input[type='checkbox']:not(.simple), input[type='radio']:not(.simple)").iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });

        /**
         * select2 empty select defaul option in cascade select fillter
         * @author sarawutt.b
         */
        $(".empty-select2").select2({
            placeholder: '<?php echo __($this->Bootstrap->getTextEmptySelect()); ?>',
            data: {id: "", text: ""}
        });

        //making for notification application message
        var appMessage = '<div class="ui-widget"><div class="ui-state-highlight ui-corner-all" style="margin: 0 0 20px 0; padding: 0 .7em;"> <p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><strong>Appication Message : </strong> ' + $("#appMessageMessage").text() + '</p></div></div>';
        $("#appMessageMessage").html(appMessage);

        //making for notification error message
        var errorMessage = '<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="margin: 0 0 20px 0; padding: 0 .7em;"> <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> <strong>ERROR Message : </strong> ' + $("#errorMessageMessage").text() + '</p></div></div>';
        $("#errorMessageMessageHTML").html(errorMessage);
        $("a.confirmButton").click(function (link) {
            link.preventDefault();
            var theHREF = $(this).attr("href");
            _modalTitle = ($(this).attr("data-confirm-title") || $(this).attr("btitle")) || _modalTitle;
            var theMESSAGE = ($(this).attr("data-confirm-message") || $(this).attr("rel")) || _modalConfirmMessage;
            var theICON = '<span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 0 0;"></span>';
            $('#confirmDialog').html('<P>' + theICON + theMESSAGE + '</P>');
            $("#confirmDialog").dialog('option', 'buttons', {
                '<?php echo __('OK'); ?>': function () {
                    window.location.href = theHREF;
                },
                '<?php echo __('Cancel'); ?>': function () {
                    $(this).dialog("close");
                }
            });
            $("#confirmDialog").dialog("open");
        });
        $("input.confirmButton,input[type='submit'].confirmButton").click(function (theINPUT) {
            theINPUT.preventDefault();


            var theFORM = $(theINPUT.target).closest("form");
            _modalTitle = ($(this).attr("data-confirm-title") || $(this).attr("btitle")) || _modalTitle;
            var theMESSAGE = ($(this).attr("data-confirm-message") || $(this).attr("rel")) || _modalConfirmMessage;
            var theICON = '<span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 0 0;"></span>';
            $('#confirmDialog').html('<P>' + theICON + theMESSAGE + '</P>');
            $("#confirmDialog").dialog('option', 'buttons', {
                '<?php echo __('OK'); ?>': function () {
                    theFORM.submit();
                },
                '<?php echo __('Cancel'); ?>': function () {
                    $(this).dialog("close");
                }
            });
            $("#confirmDialog").dialog("open");
        });
        $("button.confirmButton,input[type='button'].confirmButton").click(function (theINPUT) {
            theINPUT.preventDefault();
            console.log('submit click');
            var theFORM = $(theINPUT.target).closest("form");
            _modalTitle = ($(this).attr("data-confirm-title") || $(this).attr("btitle")) || _modalTitle;
            var theMESSAGE = ($(this).attr("data-confirm-message") || $(this).attr("rel")) || _modalConfirmMessage;
            var action = $(this).attr('action');
            var theICON = '<span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 0 0;"></span>';
            $('#confirmDialog').html('<P>' + theICON + theMESSAGE + '</P>');
            $("#confirmDialog").dialog('option', 'buttons', {
                '<?php echo __('OK'); ?>': function () {
                    location = action;
                },
                '<?php echo __('Cancel'); ?>': function () {
                    $(this).dialog("close");
                }
            });
            $("#confirmDialog").dialog("open");
        });


        /**
         *
         * Modal Confirm Dialog if the input is submit and has class confirmModal
         * @author  Sarawutt.b
         * @param   object theINPUT
         * @returns string HTML format
         */
        $("input:submit.confirmModal,button:submit.confirmModal").click(function (theINPUT) {
            theINPUT.preventDefault();
            var title = ($(this).attr("data-confirm-title") || $(this).attr("btitle")) || _modalTitle;
            var theFORM = $(theINPUT.target).closest("form");
            var theMESSAGE = ($(this).attr("data-confirm-message") || $(this).attr("rel")) || _modalConfirmMessage;
            if (!theFORM.valid()) {
                return false;
            } else {
                $(".modal-title").text(title);
                confirmModal(theMESSAGE, function (result) {
                    if (result == true) {
                        console.log('form data');
                        console.log(theFORM);
                        console.log('form valid');
                        console.log(theFORM.valid());
                        theFORM.trigger('submit');
                        return true;
                    } else {
                        return false;
                    }
                });
            }
        });

        /**
         *
         * Modal Confirm Dialog if the input is a link and has class confirmModal
         * @author  Sarawutt.b
         * @param   object link
         * @returns string HTML format
         */
        $("a.confirmModal").click(function (link) {
            link.preventDefault();
            var title = ($(this).attr("data-confirm-title") || $(this).attr('btitle')) || _modalTitle;
            var theHREF = $(this).attr("href");
            var theMESSAGE = ($(this).attr("data-confirm-message") || $(this).attr("rel")) || _modalConfirmMessage;
            $(".modal-title").text(title);
            confirmModal(theMESSAGE, function (result) {
                if (result == true) {
                    window.location.href = theHREF;
                    return true;
                } else {
                    return false;
                }
            });
        });

        /**
         *
         * Modal Confirm Dialog if the input is button and has class confirmModal
         * @author  Sarawutt.b
         * @param   object theINPUT
         * @returns string HTML format
         */
        $("input[type='button'].confirmModal,button[type='button'].confirmModal").click(function (theINPUT) {
            theINPUT.preventDefault();
            var title = ($(this).attr("data-confirm-title") || $(this).attr('btitle')) || _modalTitle;
            var theFORM = $(theINPUT.target).closest("form");
            var theMESSAGE = ($(this).attr("data-confirm-message") || $(this).attr("rel")) || _modalConfirmMessage;
            var action = $(this).attr('action');
            $(".modal-title").text(title);
            confirmModal(theMESSAGE, function (result) {
                if (result == true) {
                    location = action;
                    return true;
                } else {
                    return false;
                }
            });
        });


    }); //End Jquery Syntax

    /**
     *
     * Function Modal confirm display Modal dialog Confirmation
     * @author   Sarawutt.b
     * @param   {type} confirmMsg as string of confirm message
     * @param   {type} object function
     * @returns boolean true if confirm and false in otherwise
     */
    function confirmModal(confirmMsg, callback) {
        if ($.trim($(".modal-title").text()) == '') {
            $(".modal-title").text(_modalTitle);
        }
        $('#loading-indicator').hide();
        confirmMsg = confirmMsg || '<?php echo __('Please confirm for your process action.'); ?>';

        if (typeof callback == 'function') {
            $("#largeModalBodyText,#ConfirmModalBodyText").text(confirmMsg);
            $("#ConfirmModal").modal({show: true, backdrop: false, keyboard: false});
            $("#btnConfirm").click(function () {
                $("#ConfirmModal").modal({show: false});
                if (callback) {
                    callback(true);
                }
            });
            $("#btnClose").click(function () {
                $("#ConfirmModal").modal({show: false});
                if (callback) {
                    callback(false);
                }
            });
        } else {
            return true;
        }
        //callback = callback || callback();

        //console.log(callback);

    }

    window.confirm = confirmModal;

    /**
     * Function make notification bueaties flash top display
     * @author  Sarawutt.b
     * @param   string title of flash name
     * @param   string msg of display notification
     * @param   string mode (success | error | warning)
     * @returns void
     */
    function buildTopNotification(title, msg, mode) {
        return '<div class="box box-' + mode + '"><div class="box-header with-border"><h3 class="box-title">' + title + '</h3></div><div class="box-body">' + msg + '</div></div>';
    }

    /**
     * Function make notification bueaties flash top display
     * @author  Sarawutt.b
     * @param   string msg of display notification
     * @param   string mode (success | error | warning)
     * @returns void
     */
    function buildTopAlertMessage(msg, mode) {
        return '<div class="alert alert-' + mode + '"><button type="button"class="close"data-dismiss="alert">&times;</button><span id="info-message">' + msg + '</span></div>';
    }

    /**
     * Function make notification bueaties dialog as center display
     * @author  Sarawutt.b
     * @param   string message of display notification
     * @returns void
     */
    function AppMessage(message) {
        $("#appMessage").html(message);
        $("#appMessage").dialog("open");
    }

    /**
     * Function make notification bueaties dialog as center display
     * @author  Sarawutt.b
     * @param   string confirmMsg of display notification with modal body section
     * @param   string modalTitle of display notification with modal title section
     * @returns void and display alert modal style
     */
    function modalMessage(confirmMsg, modalTitle) {
        $('#loading-indicator').hide();
        modalTitle = modalTitle || _modalMessageTitle;
        confirmMsg = confirmMsg || '<?php echo __('Your process running to the statis.'); ?>';
        $(".modal-title").text(modalTitle);
        $("#largeModalBodyText,#ConfirmModalBodyText").text(confirmMsg);
        $("#largeModal").modal('show');
    }

    /**
     * Function make notification bueaties flash top display
     * @author  Sarawutt.b
     * @param   string message of display notification
     * @returns void
     */
    function TopAppMessage(message) {
        var appMessage = '<div class="ui-widget"><div class="ui-state-highlight ui-corner-all" style="margin: 0 0 20px 0; padding: 0 .7em;"> <p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><strong>Appication Message : </strong> ' + message + '</p></div></div>';
        $("#confirmDialog").html(appMessage);
    }

    /**
     * Function make notification bueaties flash top display(Error style)
     * @author  Sarawutt.b
     * @param   string message of display notification
     * @returns void
     */
    function TopAppError(message) {
        var errorMessage = '<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="margin: 0 0 20px 0; padding: 0 .7em;"> <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> <strong>ERROR Message : </strong> ' + message + '</p></div></div>';
        $("#confirmDialog").html(errorMessage);
    }

    /**
     * Function ajax get District from master data
     * @author  Sarawutt.b
     * @param   parameter with dinamic province_id jQuery dinamic selecter get params
     * @since   2016/04/26 11:16:22
     * @returns display district filter by province
     */
    function getDistrict() {
        $.post("/Utils/findDistrict/" + $("#ProvinceId").val(), function (data) {
            $("#DistrictId").html(data);
            getSubDistrict();
        });
    }

    /**
     * Function ajax get Sub-district from master data
     * @author  Sarawutt.b
     * @param   parameter with dinamic District jQuery dinamic selecter get params
     * @since   2016/04/26 11:16:22
     * @returns display district filter by district
     */
    function getSubDistrict() {
        $.post("/Utils/findSubDistrict/" + $("#DistrictId").val(), function (data) {
            $("#SubDistrictId").html(data);
            getZipcode();
        });
    }

    /**
     * Function ajax get zipcode from master data
     * @author  Sarawutt.b
     * @param   parameter with dinamic Sub-district jQuery dinamic selecter get params
     * @since   2016/04/26 11:16:22
     * @returns display district filter by Sub-district
     */
    function getZipcode() {
        $.post("/Utils/findZipcode/" + $("#SubDistrictId").val(), function (data) {
            $("#zipCode").val(data);
            updateChosen();
        });
    }

    /**
     * Function find options list of system action with selected system controller id
     * @author  Sarawutt.b
     * @since   2016/04/26 11:16:22
     * @returns display system action filter by controller id
     */
    function getSystemActionListBySystemControllerId() {
        $.getJSON('/Utilities/findActionsByControllersId/' + $("#sysControllerId").val() + '.json', function (result) {
            var data2 = [];
            $.each(result.results, function (k, item) {
                data2.push({id: item.id, text: item.text});
            });

            $("#SysActionId").select2({
                placeholder: '<?php echo __('System Actions'); ?>',
                data: data2
            });
            console.log((data2.length === 0));
            $("#SysActionId").attr('disabled', (data2.length === 0));
        });
    }

    /**
     * Function update selecte list build to chosen after re created with ajax content
     * @author  Sarawutt.b
     * @since   2016/04/26 11:16:22
     * @returns display district filter by Sub-district
     */
    function updateChosen() {
        $(".chosen-select").trigger("chosen:updated");
    }

    /**
     * Number.prototype.format(n, x)
     *
     * @param integer n: length of decimal
     * @param integer x: length of sections
     */
    Number.prototype.format = function (n, x) {
        var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
        return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
    };

    /**
     * Converts number into currency format
     * @param {number} number   Number that should be converted.
     * @param {string} [decimalSeparator]    Decimal separator, defaults to '.'.
     * @param {string} [thousandsSeparator]    Thousands separator, defaults to ','.
     * @param {int} [nDecimalDigits]    Number of decimal digits, defaults to `2`.
     * @return {string} Formatted string (e.g. numberToCurrency(12345.67) returns '12,345.67')
     */
    function numberToCurrency(number, decimalSeparator, thousandsSeparator, nDecimalDigits) {
        decimalSeparator = decimalSeparator || '.';
        thousandsSeparator = thousandsSeparator || ',';
        nDecimalDigits = nDecimalDigits == null ? 2 : nDecimalDigits;

        var fixed = number.toFixed(nDecimalDigits), //limit/add decimal digits
            parts = new RegExp('^(-?\\d{1,3})((?:\\d{3})+)(\\.(\\d{' + nDecimalDigits + '}))?$').exec(fixed); //separate begin [$1], middle [$2] and decimal digits [$4]

        if (parts) { //number >= 1000 || number <= -1000
            return parts[1] + parts[2].replace(/\d{3}/g, thousandsSeparator + '$&') + (parts[4] ? decimalSeparator + parts[4] : '');
        } else {
            return fixed.replace('.', decimalSeparator);
        }
    }

    /**
     *
     * Function find department fillter by organization code
     * @author sarawutt.b
     */
    function findDepartmentByOrganizationCode() {
        $.getJSON('/Utilities/findDepartmentByOrganizationCode/' + $('#masterOrganization').val() + '.json', function (result) {
            var data2 = [];
            $.each(result.results, function (k, item) {
                data2.push({id: item.id, text: item.text});
            });

            $("#masterDepartment").select2({
                placeholder: '<?php echo __('Master Department'); ?>',
                placeholderOption: '<?php echo __('Master Department'); ?>',
                data: data2
            });
            if (_formDisabledOption == 9) {
                $("#masterDepartment").val('');
            }
            $("#masterDepartment").attr('disabled', ((data2.length === 0) || (_formDisabledOption == 1)));
            findSectionByDepartmentCode();
        });

    }

    /**
     *
     * Function find master section by department fillter code
     * @author sarawutt.b
     */
    function findSectionByDepartmentCode() {
        $.getJSON('/Utilities/findSectionByDepartmentCode/' + $('#masterDepartment').val() + '.json', function (result) {
            var data2 = [];
            $.each(result.results, function (k, item) {
                data2.push({id: item.id, text: item.text});
            });
            $("#masterSection").select2({
                placeholder: '<?php echo __('Master Section'); ?>',
                placeholderOption: '<?php echo __('Master Section'); ?>',
                data: data2
            });
            if (_formDisabledOption == 9) {
                $("#masterSection").val('');
            }
            $("#masterSection").attr('disabled', ((data2.length === 0) || (_formDisabledOption == 1)));
        });
    }

    /**
     *
     * Function find province by country code
     * @author sarawutt.b
     */
    function findProvinceByCountryCode() {
        $.getJSON('/Utilities/findProvinceByCountryCode/' + $('#countryCode').val() + '.json', function (result) {
            var data2 = [];
            $.each(result.results, function (k, item) {
                data2.push({id: item.id, text: item.text});
            });

            $("#provinceCode").select2({
                placeholder: '<?php echo __('Master Province'); ?>',
                data: data2
            });
            if (_formDisabledOption == 9) {
                $("#provinceCode").val('');
            }
            $("#provinceCode").attr('disabled', ((data2.length === 0) || (_formDisabledOption == 1)));
            findDistrictByProvinceCode();
        });
    }

    /**
     *
     * Function find district by province code
     * @author sarawutt.b
     */
    function findDistrictByProvinceCode() {
        $.getJSON('/Utilities/findDistrictByProvinceCode/' + $('#provinceCode').val() + '.json', function (result) {
            var data2 = [];
            $.each(result.results, function (k, item) {
                data2.push({id: item.id, text: item.text});
            });

            $("#districtCode").select2({
                placeholder: '<?php echo __('Master District'); ?>',
                data: data2
            });
            $("#districtCode").attr('disabled', ((data2.length === 0) || (_formDisabledOption == 1)));
        });
    }

    function renderGraph(obj, labels, series, option) {

        var elem = '#' + obj;
        var arr_labels = JSON.parse(labels);
        var arr_series = JSON.parse(series);

        var labelsHeight = arr_labels.length * 40;
        var containerHeight = $(elem).parent().outerHeight();
        var count = 1;
        if (arr_series.length == 1) {
            //---r001DG
            var aSeries = arr_series[0];
            var vDS = true;

            $.each(arr_series, function (l, av) {
                $.each(av, function (i, v) {
                    // count = count+v;
                    if (v > count) {
                        count = v
                    }
                });
            });

        } else {
            //---r001MG
            var aSeries = arr_series;
            var vDS = false;

            $.each(arr_series, function (l, av) {
                count = count + av[0];
            });
        }
        new Chartist.Bar(elem, {
            labels: arr_labels,
            series: aSeries
        }, {

            reverseData: true,
            horizontalBars: true,
            distributeSeries: vDS,
            axisX: {
                scaleMinSpace: count,
                //labelInterpolationFnc: function(value){return value;}
                type: Chartist.AutoScaleAxis,
                onlyInteger: true,

            },
            axisY: {
                offset: 130,
            },
            //height: '400px',
            height: Math.max(labelsHeight, containerHeight) + 'px',
            high: count //max vlue x
        });

    }
</script>