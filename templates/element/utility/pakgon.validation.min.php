<script type="text/javascript">
    $.validator.setDefaults({
        ignore: ':hidden:not(select),*:not([name])',
        errorElement: 'div',
        errorClass: 'invalid-feedback lead',
        errorPlacement: function (error, element) {
            console.log(error);
            console.log(element);
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
</script>