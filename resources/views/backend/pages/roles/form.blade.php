
<div class="form-body">

@include('backend.includes.errors')

<h4 class="form-section"><i class="la la-commenting"></i> {{__('backend.basic_information')}}</h4>

<div class="row">

  <div class="col-md-3">
    <div class="form-group">
      <label for="projectinput1"> {{__('backend.title')}} </label>

      {!! Form::text('title', null , ['class' => 'form-control' , 'placeholder'=> __('backend.title')] ) !!}

    </div>
  </div>


</div>

<h4 class="form-section"><i class="la la-commenting"></i>  {{__('backend.permissions')}}    </h4>

<div class="row">

@foreach ($permissions->where('parent_id' , 0 ) as $permission)

<div class="form-group  col-md-12">

<h4 class="form-section"><i class="{{$permission->icon}}"></i>     <input @if ( isset($data->id) && $data->permissions->contains('id' , $permission->id)) checked @endif name='permissions[]' value='{{$permission->id}}' type="checkbox"  class="icheck" data-checkbox="icheckbox_square-purple">  {{__('backend.'.$permission->name)}} </h4>

</div>

@foreach ( $permissions->where('parent_id' , $permission->id ) as $list_permission)

<div class="form-group  col-md-3">
<label>

<input @if ( isset($data->id) && $data->permissions->contains('id' , $list_permission->id)) checked @endif name='permissions[]' value='{{$list_permission->id}}' type="checkbox"  class="icheck" data-checkbox="icheckbox_square-purple">  {{__('backend.'.$list_permission->name)}}

</label>
</div>

@endforeach

@endforeach

 </div>

</div>

<div class="form-actions">

<button type="submit" class="btn btn-primary">
  <i class="la la-check-square-o"></i> {{ __('backend.save')}}
</button>
</div>
