setTimeout(function() {
    $('#hidden').fadeOut('fast');
}, 5000); // <-- time in milliseconds

$(document).ready(function(){
    $('#changepassword').change(function(){
        if ($(this).is(":checked")) {
            $(".pass").removeAttr('disabled');
        }else{
            $(".pass").attr('disabled','');
        }
    });
});

// change category lang
$(document).ready(function(){
    $("#parent").change(function(){
        var id = $(this).val();
        // alert(id);
        $.get("ajax/change_cate_lang/"+id,function(data){
            $("#list_parent").html(data);
        });
    });
});
// change category lang

// upload images
function readURL(input) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('.image-upload-wrap').hide();
      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();
      $('.image-title').html(input.files[0].name);
    };
    reader.readAsDataURL(input.files[0]);
        } else {
    removeUpload();
    }
}
// upload images

// change tỉnh thành quận huyện
$(document).ready(function(){
    $("select#province").change(function(){
        var id = $(this).val();
        // alert(id);
        $.get("ajax/change_province/"+id,function(data){
            $("#district").html(data);
        });
        $.get("ajax/change_province_lang/"+id,function(data1){
            $("#list_province").html(data1);
        });
    });
});
$(document).ready(function(){
    $("select#district").change(function(){
        var id = $(this).val();
        $.get("ajax/change_district/"+id,function(data){
            $("#ward").html(data);
        });
        $.get("ajax/change_district_lang/"+id,function(data){
            $("#list_district").html(data);
        });
    });
});
$(document).ready(function(){
    $("select#ward").change(function(){
        var id = $(this).val();
        $.get("ajax/change_ward_lang/"+id,function(data){
            $("#list_ward").html(data);
        });
    });
});

// change sort by category
$(document).ready(function(){
    $("select#sort_by").change(function(){
        var sort_by = $(this).val();
        $.get("ajax/change_SortBy/"+sort_by,function(data){
            $("#parent").html(data);
        });
    });

    $("select#parent").change(function(){
        var id = $(this).val();
        // alert(id);
        $.get("ajax/change_parent/"+id,function(data){
            $("#load_category").html(data);
        });
    });

    $("input#view").blur(function(){
        var view = $(this).val();
        var id = $(this).parents('#category').find('input[name="id"]').val();
        // alert(id);
        $.get("ajax/update_category_view/"+id+"/"+view,function(data){
            // $("#load_category").html(data);
        });
    });

    $("input#menu_view").blur(function(){
        var view = $(this).val();
        var id = $(this).parents('#menu').find('input[name="id"]').val();
        // alert(id);
        $.get("ajax/update_menu_view/"+id+"/"+view,function(data){
            // $("#load_category").html(data);
        });
    });
});

// sản phẩm
$(document).ready(function(){
    $("button#del_img_detail").click(function(){
        var id = $(this).parents('#detail_img').find('input[id="id_img_detail"]').val();
        // alert(id);
        $.ajax({
            url: 'ajax/del_img_detail/'+id,
            type: 'GET',
            cache: false,
            data: {
                "id":id
            },
        });
    });
}); // xóa ảnh trong db
$(document).ready(function(){
    $("button#del_section").click(function(){
        var id = $(this).parents('#section').find('input[id="id_section"]').val();
        // alert(id);
        $.ajax({
            url: 'ajax/del_section/'+id,
            type: 'GET',
            cache: false,
            data: {
                "id":id
            },
        });
    });
}); // xóa ảnh trong db


$(document).ready(function(){
    $("input#status").click(function(){
        var status = $(this).is(':checked');
        var id = $(this).parents('#category').find('input[id="id"]').val();
        // alert(id);
        $.ajax({
            url:  'ajax/update_status_category/'+id+'/'+status, type: 'GET', cache: false, data: {
            },
        });
    });
}); // update status

$(document).ready(function(){
    $("input#status_post").click(function(){
        var status = $(this).is(':checked');
        var id = $(this).parents('#post').find('input[id="id"]').val();
        // alert(status);
        $.ajax({
            url:  'ajax/update_status_post/'+id+'/'+status, type: 'GET', cache: false, data: {
            },
        });
    });
}); // update status

$(document).ready(function(){
    $("input#hot_post").click(function(){
        var hot = $(this).is(':checked');
        var id = $(this).parents('#post').find('input[id="id"]').val();
        // alert(status);
        $.ajax({
            url:  'ajax/update_hot_post/'+id+'/'+hot, type: 'GET', cache: false, data: {
            },
        });
    });
}); // update hot


$("select#category").change(function(){
    var id = $(this).val();
    // alert(id);
    $.get("ajax/change_category/"+id,function(data){
        $("#loadcustom").html(data);
    });
});