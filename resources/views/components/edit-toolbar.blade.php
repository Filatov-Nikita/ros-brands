@props([
  'resource_name',
  'resource',
])

@php
  $listHref = route($resource_name . '.index');
  $cardHref = route($resource_name . '.show', [ $resource ]);
@endphp

<div class="d-flex justify-content-between">
  <a href="{{ $listHref }}">К списку</a>
  <div class="ml-4">
    <a href="{{ $cardHref }}" class="btn btn-primary">
      В карточку
    </a>
  </div>
</div>
