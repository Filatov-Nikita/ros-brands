@if(session('alert-cannot-delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ $slot }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
