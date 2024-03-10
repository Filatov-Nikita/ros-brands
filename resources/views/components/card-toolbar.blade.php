@props([
  'resource_name',
  'resource',
])

@php
  $listHref = route($resource_name . '.index');
  $editHref = route($resource_name . '.edit', [ $resource ]);
  $removeHref = route($resource_name . '.destroy', [ $resource ]);
@endphp

<div class="d-flex justify-content-between">
  <a href="{{ $listHref }}">К списку</a>
  <div class="ml-4">
    <a href="{{ $editHref }}" class="btn btn-primary">
      Редактировать
    </a>
    <x-adminlte-button class="ml-2" label="Удалить" theme="danger" data-toggle="modal" data-target="#modal-destory" />
    <x-adminlte-modal id="modal-destory" title="Вы уверены, что хотите удалить запись?" theme="danger">
      <x-slot name="footerSlot">
        <x-adminlte-button label="Отмена" data-dismiss="modal"/>
        <form method="POST" action="{{ $removeHref }}">
          @method('DELETE')
          @csrf
          <x-adminlte-button theme="danger" label="Удалить навсегда" type="submit" alt="удалить" />
        </form>
      </x-slot>
    </x-adminlte-modal>
  </div>
</div>
