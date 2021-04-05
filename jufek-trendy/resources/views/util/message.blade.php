@if ($message = Session::get('success'))

<div class="alert alert-success" role="alert">
  <strong>{{ $message }}</strong>
  <button type="button" class="btn-close" data-dismiss="alert" aria-label="close"></button>
</div>
@elseif ($message = Session::get('eliminate'))

<div class="alert alert-danger" role="alert">
  <strong>{{ $message }}</strong> 
  <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
</div>
@endif