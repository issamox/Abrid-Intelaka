$(document).ready(function () {
    $('.uploadFile').on('change', function () {
        let formData = new FormData($(this).closest('form')[0]);
        formData.append('table', $(this).data('table'));
        formData.append('memberId', $(this).data('memberid'));
        formData.append('fileName', $(this).data('filename'));

        let _that = $(this);
        $.ajax({
            url: '/candidate/upload/',
            method: 'POST',
            processData: false,
            contentType: false,
            data: formData,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (response) {
                Swal.fire({
                    title: "Good job!",
                    text: response.message,
                    icon: "success"
                });

                // Show the next element and set the href attribute
                _that.next().show().find('a').first().attr("href", response.path);

                // Show the 'checkedFile' element
                _that.parent().find('.checkedFile').show();

                // Disable the file input
                _that.prop("disabled", true);
            },
            error: function (xhr, status, error) {
                let jsonResponse = JSON.parse(xhr.responseText);
                Swal.fire({
                    title: "Error",
                    text: jsonResponse.message,
                    icon: "error"
                });
            }
        });
    });

    $('.fileEdit').on('click',function (e){
        e.preventDefault();
        $(this).parents('form').find('.uploadFile').prop("disabled", false).click();
    });

    $('.showTargetSection').on('change',function (){
        $('.candidateTypeSection[data-target="'+ $(this).val() +'"]').removeClass('hide').siblings().addClass('hide');
    });

    $("#candidateHasLocal").on('change',function (){
        if ( $(this).val() == 'Oui' ){
            $(this).parent().next().removeClass('hide');
        }else {
            $(this).parent().next().addClass('hide');
            $('.typeLocal').addClass('hide');
        }
    });


    $("#candidateTypeLocal").on('change',function (){
        $('.typeLocal').addClass('hide');
        $('.typeLocal[data-target="'+ $(this).val() +'"]').removeClass('hide');
    });
});

