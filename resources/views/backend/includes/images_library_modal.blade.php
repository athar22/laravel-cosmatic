<div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-full">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="full-width-modalLabel">
                                                        {{__('backend.images_library')}} </h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">

                                                <div class="col-xl-12">
                                <div class="card-box">

                                <div class="col-xl-4">
                                    <ul class="nav nav-pills navtab-bg nav-justified">
                                        <li class="nav-item">
                                            <a href="#home1" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                                 {{__('backend.gallery')}}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#profile1" data-toggle="tab" aria-expanded="false" class="nav-link ">
                                            {{__('backend.add_new')}}
                                            </a>
                                        </li>   <img  src="{{url('')}}/assets/admin/images/animated-loader.gif" id="imageLoading" >

                                    </ul>

</div>
<div class="tab-content">
<div class="tab-pane  show active" id="home1">

<p id="images_library_div" ></p>

</div>
<div class="tab-pane" id="profile1">

<input type="hidden" id="file_name"/>
<div class="row">

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">{{__('backend.title')}}</label>
                                                                <input id="title_library" name="title_library" type="text" class="form-control" id="field-1" placeholder="{{__('backend.title')}}">
                                                            </div>

<div style="display:none;" id="rq_title" class="alert alert-danger" role="alert">
  يجب ادخال عنوان للصورة
</div>
                                                        </div>

</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<div id="choose_new_photo"  class="mt-3">

<input id="image_library" name="image_library" accept="image/*" type="file" class="dropify" data-default-file=""  />

</div>





                                                            </div>
                                                        </div>
                                                    </div>

</div>

                                    </div>
                                </div> <!-- end card-box-->
                            </div> <!-- end col -->




                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">{{__('backend.close')}}</button>

                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->


<script src="{{url('')}}/assets/admin/js/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">

$('#image_library').change(function () {

if ($(this).val() != '') {

if ( $('#title_library').val() != '') {
upload(this);
} else {
var drEvent = $('#image_library').dropify();
drEvent = drEvent.data('dropify');
drEvent.resetPreview();
drEvent.clearElement();
$("#rq_title").show();
}

}
});




$(document).on('click','#confirmed_photo_library',function(e)
{
e.preventDefault();
$("#confirmed_photo_library").val();
$("#photo").val($(this).attr("val"));
$("#choose_photo").html('<img width="308px" id="open_library"  data-toggle="modal" data-target="#full-width-modal" name="photo_confirmed" type="text" class="dropify" src="'+ $(this).attr("src") + '"/>');
$('#full-width-modal').modal('toggle');
});




    function upload(img) {
        var form_data = new FormData();
        form_data.append('file', img.files[0]);
        form_data.append('title', $('#title_library').val() );
        form_data.append('_token', '{{csrf_token()}}');
        $('#imageLoading').css('display', 'block');
        $.ajax({
            url: "{{url('')}}/{{config('settings.BackendPath')}}/upload_images_library",
            data: form_data,
            type: 'POST',
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.fail) {
                    alert(data.errors['file']);
                }
                else {

                    //if image uploaded close library modal //data['path']
                    $("#photo").val(data['filename']);
                    $("#choose_photo").html('<img width="308px" id="open_library"  data-toggle="modal" data-target="#full-width-modal" name="photo_confirmed" type="text" class="dropify" src="'+ data['path'] + '"/>');

//clear choosed image and title
var drEvent = $('#image_library').dropify();
drEvent = drEvent.data('dropify');
drEvent.resetPreview();
drEvent.clearElement();
$('#title_library').val('');
//clear choosed image and title

//close modal

                    $('#full-width-modal').modal('toggle');


                }
                $('#imageLoading').css('display', 'none');
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    }



$(document).on('click','#open_images_library',function(e)
{
e.preventDefault();

$.ajax({
 beforeSend: function(){
     $('#imageLoading').show();
 },
 complete: function(){
     $('#imageLoading').hide();
 },
 success:function(){
 $('#images_library_div').load('{{URL::to(config("settings.BackendPath")."/images/library")}}');
 }
 });

});



//pagination  to library */
$(document).on('click','.pagination a',function(e)
{
   e.preventDefault();

   var pageid = $(this).attr('href').split('page=')[1];
   $.ajax({
    url:'{{URL::to(config("settings.BackendPath")."/images/library_ajax")}}',
    data:{'page':pageid
	},
    dataType:'json',
    type:'get',
    beforeSend: function(){
        $('#imageLoading').show();
    },
    complete: function(){
        $('#imageLoading').hide();

    },
    success:function(data){
    $('#images_library_div').html(data);
    }
    });

});

</script>
