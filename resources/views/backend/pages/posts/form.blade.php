
<div class="form-body">

	<div class="row">

		@include('backend.includes.errors')

		<div class="col-xl-12">
			<div class="card-box">
				<div class="col-xl-12">
					<ul class="nav nav-pills navtab-bg nav-justified">
						<li  class="nav-item">
							<a href="#basic_data" data-toggle="tab" aria-expanded="true" class="nav-link active">
								{{__('backend.basic_data')}}
							</a>
						</li>

						@if( $_GET['main_category'] == 'markets' )

						<li class="nav-item">
							<a href="#market_data" data-toggle="tab" aria-expanded="false" class="nav-link">
								{{__('backend.market_data')}}
							</a>
                        </li>

                        <li class="nav-item">
							<a href="#market_offers" data-toggle="tab" aria-expanded="false" class="nav-link">
								{{__('backend.market_offers')}}
							</a>
                        </li>


                        <li class="nav-item">
							<a href="#market_products" data-toggle="tab" aria-expanded="false" class="nav-link">
								{{__('backend.market_products')}}
							</a>
						</li>

						@endif

						<li class="nav-item">
							<a href="#meta_data" data-toggle="tab" aria-expanded="false" class="nav-link">
								Meta Data
							</a>
						</li>

					</ul>

				</div>


				<div class="tab-content">
					<div class="tab-pane show active" id="basic_data">


						<div class="col-md-12">

							<div class="form-group">

								<div  class="col-lg-4">
									<div id="open_images_library" class="mt-3">
										<div id="choose_photo" >
											@if( isset( $data->photo) )
											<input id="open_library"  data-toggle="modal" data-target="#full-width-modal" name='photo_confirmed' type="text" class="dropify" data-default-file="{{url('')}}/uploads/posts/{{$data->photo}}"  />
											@else
											<input id="open_library"  data-toggle="modal" data-target="#full-width-modal" name='photo_confirmed' type="text" class="dropify" data-default-file=""  />
											@endif
										</div>
										{!! Form::hidden('photo', null , [ 'required'=>'required' , 'id'=>'photo']) !!}
									</div>
								</div>

							</div>

							@if( isset( $_GET['website'] )  || isset($data->website) )

							@if( isset( $_GET['website'] ) )
							{!! Form::hidden( 'website', $_GET['website']   ) !!}
							@elseif( isset($data->website) )
							{!! Form::hidden( 'website', $data->website   ) !!}
							@endif

							@else

<!--

<div class="col-md-12">
    <div class="form-group">
      <label for="projectinput1"> Website </label>

      {!! Form::select('website', ['Security'=>'Security','Services'=>'Services'] , null , ['placeholder' => '----' ,'class' => 'form-control' ] ) !!}

    </div>
  </div>

-->

@endif


@if( isset( $_GET['main_category'] )  || isset($data->main_category) )

@if( isset( $_GET['main_category'] ) )
{!! Form::hidden( 'main_category', $_GET['main_category']   ) !!}
@elseif( isset($data->main_category) )
{!! Form::hidden( 'main_category', $data->main_category   ) !!}
@endif

@else

<!--
<div class="col-md-12">
    <div class="form-group">
      <label for="projectinput1"> Main Category </label>

      {!! Form::select('main_category', ['Security'=>'Security','Services'=>'Services'] , null , ['placeholder' => '----' ,'class' => 'form-control' , 'required'=>'required' ] ) !!}

    </div>
  </div>
-->

@endif


@if( isset( $_GET['category'] )  || isset($data->category) )

@if( isset( $_GET['category'] ) )
{!! Form::hidden( 'category', $_GET['category']   ) !!}
@elseif( isset($data->category) )
{!! Form::hidden( 'category', $data->category   ) !!}
@endif

@else

<div class="col-md-12">
	<div class="form-group">
		<label for="projectinput1"> {{__('backend.category')}}  </label>

		{!! Form::select('category', ['Projects'=>'Projects','Services'=>'Services','Careers'=>'Careers','Gallery'=>'Gallery'] , null , ['placeholder' => '----' ,'class' => 'form-control' , 'required'=>'required' ] ) !!}

	</div>
</div>

@endif


<div class="col-md-12">
	<div class="form-group">
		<label for="projectinput1"> {{__('backend.title')}} </label>

		{!! Form::text('title', null , ['class' => 'form-control' , 'required'=>'required', 'placeholder'=> __('backend.title')] ) !!}

	</div>
</div>

@if( isset( $_GET['category'] )  && $_GET['category'] == 'videos' )
<!--
<div class="col-md-12">
	<div class="form-group">
		<label for="projectinput1"> {{__('backend.video_code')}} </label>

		{!! Form::text('video', null , ['class' => 'form-control' , 'required'=>'required', 'placeholder'=> __('backend.video_code')] ) !!}

	</div>
</div>
-->
@endif



<div class="col-md-12">
	<div class="form-group">
		<label for="projectinput1"> {{__('backend.intro')}}  </label>
		{!! Form::textarea('intro' , null , ['id'=>'editor' ,  'rows' => '2' , 'class' => 'form-control' , 'placeholder'=> __('backend.intro')] ) !!}

	</div>
</div>



<div class="col-md-12">
	<div class="form-group">


{!! Form::textarea('content' , null , ['id'=>'editor' ,  'rows' => '3' , 'class' => 'summernote' , 'placeholder'=> 'Body'] ) !!}


	</div>
</div>


<div class="col-md-12">
	<div class="form-group">
    <label for="projectinput1">{{__('backend.keywords')}} </label>

    {!! Form::text('meta_keywords', null , ['class' => 'form-control' , 'required'=>'required', 'placeholder'=> 'Add comma , Between words'] )  !!}

	</div>
</div>



</div>



</div>


<div class="tab-pane" id="meta_data">

	<div class="col-md-12">
		<div class="form-group">

			<div class="form-group mb-3">
				<label for="product-meta-title">Meta title</label>

				{!! Form::text('meta_title', null , ['class' => 'form-control' , 'placeholder'=> 'Meta title'] ) !!}


			</div>



			<div class="form-group mb-0">
				<label for="product-meta-description">Meta Description </label>


				{!! Form::textarea('meta_description', null , ['class' => 'form-control' , 'rows' => '2' ,  'placeholder'=> 'Short Description' ] ) !!}


            </div>



        </div>




	</div>
</div>


@if( $_GET['main_category'] == 'markets' )

<div class="tab-pane" id="market_data">

	<div class="col-md-12">
		<div class="form-group">

			<div class="form-group mb-12">
				<label for="product-meta-title">{{__('backend.category')}}</label>

				<div class="custom-control custom-checkbox">
					<input value="restaurants"  name="services[]" type="checkbox" class="custom-control-input" id="customCheck1" @if( isset($data->services) && in_array('restaurants' , json_decode($data->services, true))) checked @endif>
					<label class="custom-control-label" for="customCheck1">{{__('backend.restaurants')}}</label>
				</div>


				<div class="custom-control custom-checkbox">
					<input  value="supermarket" name="services[]" type="checkbox" class="custom-control-input" id="customCheck2" @if( isset($data->services) && in_array('supermarket' , json_decode($data->services, true))) checked @endif>
					<label class="custom-control-label" for="customCheck2">{{__('backend.supermarket')}}</label>
				</div>
				<div class="custom-control custom-checkbox">
					<input value="poultry" name="services[]" type="checkbox" class="custom-control-input" id="customCheck3" @if( isset($data->services) && in_array('poultry' , json_decode($data->services, true))) checked @endif>
					<label class="custom-control-label" for="customCheck3"> {{__('backend.poultry')}} </label>
				</div>
				<div class="custom-control custom-checkbox">
					<input value="dairy" name="services[]" type="checkbox" class="custom-control-input" id="customCheck4" @if( isset($data->services) && in_array('dairy' , json_decode($data->services, true))) checked @endif>
					<label class="custom-control-label" for="customCheck4">  {{__('backend.dairy')}} </label>
				</div>
				<div class="custom-control custom-checkbox">
					<input value="clothes" name="services[]" type="checkbox" class="custom-control-input" id="customCheck5" @if( isset($data->services) && in_array('clothes' , json_decode($data->services, true))) checked @endif>
					<label class="custom-control-label" for="customCheck5">  {{__('backend.clothes')}} </label>
				</div>
				<div class="custom-control custom-checkbox">
					<input value="shoes" name="services[]" type="checkbox" class="custom-control-input" id="customCheck6" @if( isset($data->services) && in_array('shoes' , json_decode($data->services, true))) checked @endif>
					<label class="custom-control-label" for="customCheck6">  {{__('backend.shoes')}}  </label>
				</div>
				<div class="custom-control custom-checkbox">
					<input value="cafes" name="services[]" type="checkbox" class="custom-control-input" id="customCheck7" @if( isset($data->services) && in_array('cafes' , json_decode($data->services, true))) checked @endif>
					<label class="custom-control-label" for="customCheck7"> {{__('backend.cafes')}}  </label>
				</div>


			</div>





		</div>
	</div>


	<div class="row">
		<div class="col-md-12">
			<label for="product-meta-keywords">{{__('backend.address')}}</label>
			{!! Form::text('address', null , ['class' => 'form-control' ,  'placeholder'=>__('backend.address')] )  !!}
		</div>
	</div>
</br>
<div class="row">
	<div class="col-md-12">
		<label for="product-meta-keywords">{{__('backend.map_location')}}</label>
		{!! Form::text('location_map', null , ['class' => 'form-control' ,  'placeholder'=>__('backend.address')] )  !!}
	</div>
</div>


</br>

<div class="row">

	<div class="col-md-4">
		<label for="product-meta-keywords">{{__('backend.tel_numbers')}}</label>
		{!! Form::text('contact_numbers', null , ['class' => 'form-control' , 'placeholder'=> 'Add comma , Between Numbers'] )  !!}
	</div>



	<div class="col-md-4">
		<label for="product-meta-keywords">{{__('backend.tel_sales')}}</label>
		{!! Form::text('sales_numbers', null , ['class' => 'form-control' ,  'placeholder'=> 'Add comma , Between Numbers'] )  !!}
	</div>


	<div class="col-md-4">
		<label for="product-meta-keywords">{{__('backend.tel_complaints')}}</label>
		{!! Form::text('complaints_numbers', null , ['class' => 'form-control' , 'placeholder'=> 'Add comma , Between Numbers'] )  !!}
	</div>

</div>

</br>
<div class="row">

	<div class="col-md-6">
		<label for="product-meta-keywords">{{__('backend.website')}}</label>
		{!! Form::text('post_website', null , ['class' => 'form-control' , 'placeholder'=> __('backend.website')] )  !!}
	</div>

	<div class="col-md-6">

		<label for="product-meta-keywords">{{__('backend.email')}}</label>
		{!! Form::text('email', null , ['class' => 'form-control' , 'placeholder'=> __('backend.website')] )  !!}

	</div>

</div>

</br>
<div class="row">

	<div class="col-md-4">
		<label for="product-meta-keywords">Facebook</label>
		{!! Form::text('facebook', null , ['class' => 'form-control' , 'placeholder'=> 'Facebook url'] )  !!}
	</div>

	<div class="col-md-4">
		<label for="product-meta-keywords">Youtube</label>
		{!! Form::text('youtube', null , ['class' => 'form-control' , 'placeholder'=> 'Youtube url'] )  !!}
	</div>

	<div class="col-md-4">
		<label for="product-meta-keywords">Instagram</label>
		{!! Form::text('instagram', null , ['class' => 'form-control' , 'placeholder'=> 'Instagram url'] )  !!}
	</div>

    <div class="col-md-4">
		<label for="product-meta-keywords">Twitter</label>
		{!! Form::text('twitter', null , ['class' => 'form-control' , 'placeholder'=> 'Twitter url'] )  !!}
	</div>

</div>

</div>







<div class="tab-pane" id="market_offers">

@if( isset($data) && isset($data->offers) )


<div class="container-fluid">
<div class="row">
@foreach($data->offers as $offer)
 <div class="col-lg-6 col-xl-3">
	<div class="card">
		<img class="card-img-top img-fluid" src="{{url('')}}/uploads/offers/{{$offer->post_id}}/{{$offer->offer_photo}}" alt="">
		<div class="card-body">
			<a href="{{url('')}}/{{config('settings.BackendPath')}}/upload/offers/delete/{{$offer->id}}" class="btn btn-danger waves-effect waves-light">Delete</a>
		</div>
	</div>
</div>
@endforeach
</div><!-- end col -->
</div>
<!-- end row -->

<hr>

@endif



<div  class="row">

	<div class="col-md-4">
		<label for="product-meta-keywords"> {{__('backend.offer_title')}}  </label>
		{!! Form::text('offer_title[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.offer_title')] )  !!}
	</div>

	<div class="col-md-4">
		<label for="product-meta-keywords"> {{__('backend.offer_photo')}}  </label>
		{!! Form::file('offer_photo[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.offer_photo')] )  !!}
    </div>

</div>

<button id='repeat_offers_div' class="btn btn-success">  {{ __('backend.add_new') }} </button>

</div>


<div class="tab-pane" id="market_products">

@if( isset($data) && isset($data->products) )


<div class="container-fluid">
<div class="row">
@foreach($data->products as $product)
 <div class="col-lg-6 col-xl-3">
	<div class="card">
        {{ $product->product_title }}
		<img class="card-img-top img-fluid" src="{{url('')}}/uploads/products/{{$product->post_id}}/{{$product->product_photo}}" alt="">
		<div class="card-body">
			<a href="{{url('')}}/{{config('settings.BackendPath')}}/upload/products/delete/{{$product->id}}" class="btn btn-danger waves-effect waves-light">Delete</a>
		</div>
	</div>
</div>
@endforeach
</div><!-- end col -->
</div>
<!-- end row -->

<hr>

@endif


<div  class="row">

	<div class="col-md-4">
		<label for="product-meta-keywords"> {{__('backend.product_title')}}  </label>
		{!! Form::text('product_title[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.product_title')] )  !!}
    </div>

    <div class="col-md-2">
		<label for="product-meta-keywords"> {{__('backend.product_price')}}  </label>
		{!! Form::text('product_price[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.product_price')] )  !!}
    </div>

	<div class="col-md-2">
		<label for="product-meta-keywords"> {{__('backend.product_photo')}}  </label>
		{!! Form::file('product_photo[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.product_photo')] )  !!}
    </div>



    <div class="col-md-12">
        <label for="product-meta-keywords"> {{__('backend.product_description')}}  </label>

        {!! Form::textarea('product_description[]' , null , ['id'=>'product_description' ,  'rows' => '3' , 'class' => 'summernote' , 'placeholder'=> __('backend.product_description')] ) !!}


    </div>



</div>



<button id='repeat_products_div' class="btn btn-success">  {{ __('backend.add_new') }} </button>




</div>




<script>
$(function () {
    $("#repeat_offers_div").on('click', function (e) {
        e.preventDefault();
        var $self = $(this);
        $self.before($self.prev('div').clone());
        //$self.remove();
    });
});

$(function () {
    $("#repeat_products_div").on('click', function (e) {
        e.preventDefault();
        var $self = $(this);
        $self.before($self.prev('div').clone());
        //$self.remove();
    });
});
</script>

@endif


</div>

<div class="form-group mb-3">
	<div class="form-actions">
		<button type="submit" class="btn btn-primary">
			<i class="la la-check-square-o"></i> {{ __('backend.save')}}
		</button>
	</div>
</div>


</div>



</div>




</div>

