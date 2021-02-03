
{!! $images->links() !!}

<div id="content_library" class="row filterable-content">


@forelse( $images as $image)

<div class="col-sm-6 col-xl-3 filter-item all web illustrator">
    <div class="gal-box">
        <a  class="image-popup" >


            <img  id="confirmed_photo_library" src="{{url('')}}/uploads/posts/{{$image->file_name}}"  val="{{$image->file_name}}" class="img-fluid" alt="work-thumbnail">
        </a>
        <div class="gall-info">
            <h4 class="font-16 mt-0">{{$image->title}}</h4>

           <!--
            <a href="javascript: void(0);" class="gal-like-btn"><i class="mdi mdi-delete-outline text-danger"></i></a>
            -->


        </div> <!-- gallery info -->
    </div> <!-- end gal-box -->
</div> <!-- end col -->

@empty


<div class="gall-info">

            <h4 class="font-16 mt-0">No Uploaded Images</h4>

</div> <!-- gallery info -->

@endforelse



</div>


{!! $images->links() !!}
