<script type="text/javascript">
    // ถ้าจะใช้ modal confirm ต้องเอาตัวนี้มาด้วย
   $('.action-delete').attr('onclick', false);

   $(".action-delete").on('click', function () {
            $this = $(this);
            $form = $this.prev();
            var post = {_method:$form.find('input[name="_method"]').val(),_csrfToken: $form.find('input[name="_csrfToken"]').val()};
            // console.log(post);
            confirmModal('<?php echo __('Are you sure for delete ?'); ?>', function (result) {
                $("section.content div.alert").remove();
                console.log(result);
                if (result == true) {
                    toastr.clear();
                    // ลิงค์ที่มันวิ่งไป
                    var url = $(location).attr('protocol') + '//' + $(location).attr('host') + $this.prev().attr('action');
                    console.log(url);
                    // สั่งให้มันวิ่งไปลิงค์นี้
                    window.location.href = url;
                } else {
                    return false;
                }
            });
    });

    var modalTitle = '<?php echo __('Please confirm'); ?>';

    function confirmModal(confirmMsg, callback) {
        if ($.trim($(".modal-title").text()) == '') {
            $(".modal-title").text(modalTitle);

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
    }
</script>