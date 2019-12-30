$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
    $('.editProduct').click(function () {

        var id = $(this).data('id');
        $('.idProduct').val(id);
        $.ajax({
            url :  'kids-now/health/health/' + id+'/edit',
            dataType : 'json',
            type :'get',
            success: function (data) {
                $('.frist_name').val(data.product.frist_name);
                $('.last_name').val(data.product.last_name);
                $('.sick').val(data.product.sick);
                $('.growth_height').val(data.product.growth_height);
                $('.growth_weight').val(data.product.growth_weight);
                $('.medicine').val(data.product.medicine);
                $('.incident').val(data.product.incident);
                $('.imageThum').attr('src','image/' + data.product.image);




            }

        });
        $('#updateProduct').on('submit',function (event) {
            event.preventDefault();
            $.ajax({
                url: 'kids-now/health/health/'+id ,
                data: new FormData(this),
                contentType: false,
                processData: false,
                cache: false,
                type: 'post',
                success:function (data) {
                    toastr.success(data.result, 'Thông báo', {timeOut: 5000});
                    $('#edit').modal('hide');
                    location.reload();
                },

            })
        })


    });







// delete product




});







// delete product




