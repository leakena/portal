

$('input[name=file]').change(function () {

    if(this.files[0].size > 5000000){
        swal({
            title: "You cannot upload file bigger than 5M",
            type: "warning"
        });
        $(this).val('');
    }

});