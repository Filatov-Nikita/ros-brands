@extends('adminlte::page')

@section('title', 'Стилисты')

@section('content_header')
  <x-rejected-delete-action>
    Стилист уже используется в других записях.
  </x-rejected-delete-action>
  <h1>Стилисты</h1>
@stop

@section('content')
<div class="mb-4">
  <a class="btn btn-primary" href="{{ route('designers.create') }}">Создать</a>
</div>
<table class="table" id="designer-list-table" style="width:100%">
  <thead>
      <tr>
        <th>ID</th>
        <th>Изображение</th>
        <th>Название</th>
        <th>Видимость</th>
        <th>Приоритет</th>
        <th>Действия</th>
      </tr>
  </thead>
  <tbody>
    @foreach ($designers as $designer)
      <tr>
        <th>{{ $designer->id }}</th>
        <th>
          @if($designer->image)
            <img style="width: 120px; height: auto; border-radius: 6px" width="{{ $designer->image->width }}" height="{{ $designer->image->height }}" src="{{ $designer->image->url }}" loading="lazy">
          @else
            <span>-</span>
          @endif
        </th>
        <th>
          <a href="{{ route('designers.show', [ 'designer' => $designer->id ]) }}">
            {{ $designer->name }}
          </a>
        </th>
        <th>{{ $designer->visible ? 'Да' : 'Нет' }}</th>
        <th>{{ $designer->priority }}</th>
        <th>
          <div class="btn-group">
            <a class="btn btn-default mr-2" href="{{ route('designers.edit', [ 'designer' => $designer->id ]) }}" alt="изменить">
              <i class="fas fa-edit"></i>
            </a>
            <x-adminlte-modal id="modal-destory-{{ $designer->id }}" title="Вы уверены, что хотите удалить запись?" theme="danger">
              <x-slot name="footerSlot">
                <x-adminlte-button label="Отмена" data-dismiss="modal"/>
                <form method="POST" action="{{ route('designers.destroy', [ 'designer' => $designer->id ]) }}">
                  @method('DELETE')
                  @csrf
                  <x-adminlte-button theme="danger" label="Удалить навсегда" type="submit" alt="удалить" />
                </form>
              </x-slot>
            </x-adminlte-modal>
            <x-adminlte-button icon="fas fa-trash" data-toggle="modal" data-target="#modal-destory-{{ $designer->id }}" />
          </div>
        </th>
      </tr>
    @endforeach
  </tbody>
</table>
<div class="pb-4"></div>
@stop

@section('js')
  <script>
    $('#designer-list-table').DataTable(
      {
        language: {
          url: '//cdn.datatables.net/plug-ins/2.0.2/i18n/ru.json',
        }
      }
    );
  </script>
@stop
