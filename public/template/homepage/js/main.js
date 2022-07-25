$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url)
{
    if(confirm('Xoá mà không thể khôi phục, Bạn có chắc? ')){
        $.ajax({
            type:'DELETE',
            datatype:'JSON', 
            data: { id },
            url: url,
            success: function(result){
                if( result.error === false){
                    alert(result.message)
                    location.reload();
                }else{
                    alert('Xoá lỗi, xin vui lòng thử lại');
                }
            }
        }) 
    }
}

    $("#khoa").change(function(){
        let id_khoa = $("#khoa").val();
        console.log(id_khoa)
        $.ajax({
            type: 'post',
            datatype: 'JSON',
            data: {id_khoa},
            url: '/admin/lops/getGVbyKhoa',
            success: function (result){
                console.log(result);
                let GVSelectBox =  $('#GVSelectBox').find('option').remove().end();
                    if (result) {
                        for(i = 0; i< result.length; i++){
                            GVSelectBox.append('<option value="'+ result[i].id_gv +'">'+ result[i].ten_gv+'</option>');
                        }
                    } else {
                        alert('Xin vui lòng thử lại');
                    }
            }
        })
    })

// $('#provinceSelectBox').change(function () {
//     let province_id =  $('#provinceSelectBox').val()
//     $.ajax({
//         type: 'post',
//         datatype: 'JSON',
//         data: {province_id},
//         url: '/administrator/district/getDistrictOfProvince',
//         success: function (result){
//             let districtSelectBox =  $('#districtSelectBox').find('option').remove().end();
//                 if (result) {
//                     for(i = 0; i< result.length; i++){
//                         districtSelectBox.append('<option value="'+ result[i].district_id +'">'+ result[i].district_name+'</option>');
//                     }
//                 } else {
//                     alert('Xin vui lòng thử lại');
//                 }
//         }
//     })
// });