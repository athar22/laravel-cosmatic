@if($message = Session::get('msg'))

<div class="alert alert-primary" role="alert">
 <strong>{{ $message }}</strong>
</div>


@endif
