<!--
    ISSET Valiable of Elemment

    - $maxFileUpload = จำนวนไฟล์ที่สามารถอัพโหลดได้สูงสุด

-->
<?php
if (isset($maxFileUpload)) {
    if (is_numeric($maxFileUpload) === false) {
        $maxFileUpload = 'Infinity';
    }
} else {
    $maxFileUpload = 'Infinity';
}
$maxFileUpload = 52428800; // 50 megabyte
?>

<button type="button" class="btn default" style="font-size:17px;" id='btn-add-row-file'><i class="fa fa-plus"></i>
    <?php echo __('Add files...'); ?> 
</button>
<label class="required" style="font-size:15px;"> <?php echo __('File support'); ?>  <?php echo " *  .JPG, .JPEG, .PNG"; ?> </label>



<table class="table table-striped table-hover" cellpadding="1" cellspacing="1" id="table-for-add-file">
    <thead class = "flip-content">
        <tr>
            <th width="10%" class="text-center"><?php echo __('File Upload'); ?></th>
            <th width="65%"><?php echo __('File Name'); ?></th>
            <th width="15%" class="text-center"><?php echo __('File Size'); ?></th>
            <th width="10%" class="text-center"><?php echo __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody id="showfile"></tbody>
</table>
<input type="hidden" id="cntRow" value="" />
<!--</div>-->
<!--</form>-->


<script type="text/javascript">
    var all_file_now = 0;
    var row = 0;
    var cntRow = $('#cntRow').val();
    if (cntRow != 0 || cntRow != "") {
        row = parseInt(cntRow);
    }


    $('#btn-add-row-file').click(function () {
        $("#table-for-add-file").append('<input class="multi_file non_select_file" id="imageFile_' + row + '" name="data[file_attaches][]" type="file" class="imageFile" style="display:none;" onchange="getFileUpload(' + row + ')" /> ');
        $('#imageFile_' + row).trigger('click');
    });

    function getFileUpload(getrow) {

        $('body').on('change', '#imageFile_' + row, function (evt) {

            var files = evt.target.files;
            var file = files[0];
            var typeFile = [
                // 'application/msword',
                // 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                // 'application/vnd.ms-excel',
                // 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                // 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 
                // 'application/vnd.ms-powerpoint',
                // 'application/pdf',
                'image/jpeg',
                'image/jpg',
                'image/png',
                // 'image/gif',
                // 'image/bmp',
                // 'video/mp4'
            ];
            // console.log(file.type);
            if (jQuery.inArray(file.type, typeFile) < 0) {
                // alert("รองรับไฟล์ .gif,.jpg,.png,.pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.mp4");
                alert("รองรับไฟล์ .JPG, .JPEG, .PNG");

                $('#imageFile_' + row).remove();
            } else {
                var max_file_size = '<?php echo $maxFileUpload; ?>';
                all_file_now = all_file_now + file.size;
                // console.log('max_file_size = ' + max_file_size );
                // console.log('all_file_now = ' + all_file_now);
                if (all_file_now < max_file_size) {
                    $("#showfile").append(
                            '<tr id="row_' + row + '" class="file-upload">/n\
                    <td class=" text-center"><img src="" id="preview_' + row + '" style="max-width: 180px;"></td>/n\
                    <td>' + file.name + '</td>/n\
                    <td class="text-center">' + Math.round((file.size / 1024) * 100) / 100 + ' KB</td>/n\
                    <td class=" text-center"><button type="button" id="btnCancelImage" class="btn btn-danger del-row" data-row-id="' + row + '"><i class="fa fa-ban" ></i></button></td>/n\
                </tr>');

                    var imgId = 'preview_' + row;
                    if (file) {
                        if (file.type == 'image/jpeg' || file.type == 'image/png') {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                document.getElementById(imgId).src = e.target.result;
                            };
                            reader.readAsDataURL(file);
                        } else if (file.type === 'application/pdf') {
                            $('#preview_' + row).attr('src', '/img/pdf-icon.png');
                        } else if (file.type === 'application/msword' || file.type === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
                            $('#preview_' + row).attr('src', '/img/ms-word-icon.png');
                        } else if (file.type === 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
                            $('#preview_' + row).attr('src', '/img/excel-icon.png');
                        } else {
                            $('#preview_' + row).attr('src', '/img/other_file.png');
                        }
                        $('#imageFile_' + row).removeClass('non_select_file');
                    }
                } else {
                    alert("cannot be uploaded. max file size in is 50 MB (52,428,800 bytes)");
                    $('#imageFile_' + row).remove();
                }
            }
            row++;
            $('#cntRow').val(row);
        });
    }




    $('form').submit(function (e) {
//        e.preventDefault();
        $('.non_select_file').remove();
    });

    $(document).on('click', '.del-row', function () {
        var rowid = $(this).data('row-id');
        var namerow = "#row_" + rowid;
        var fileInputRow = "#imageFile_" + rowid;
        $(namerow).remove();
        $(fileInputRow).remove();
    });


</script>
<style type="text/css">
    #table-for-add-file th{
        font-weight: bold;
        color: #3c8dbc;

    }
    #table-for-add-file th i{
        font-size: 22px;
    }

    #table-for-add-file th{
      font-size: 17px;
    }
    #btnCancelImage:hover{
        background-color: #d34444 !important;
        border-color: #d34444 !important;
    }
    #showfile td{
      font-size: 17px;
    }

</style>









