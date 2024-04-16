@extends('adminlte::page')

@section('title', 'Баннеры')

@section('content_header')
  <h1>Баннеры</h1>
@stop

@section('content')
<div class="mb-4">
  <a class="btn btn-primary" href="{{ route('banners.create') }}">Создать</a>
</div>
<table class="table" id="banner-list-table" style="width:100%">
  <thead>
      <tr>
        <th>ID</th>
        <th>Изображение</th>
        <th>Заголовок</th>
        <th>Url</th>
        <th>Видимость</th>
        <th>Приоритет</th>
        <th>Действия</th>
      </tr>
  </thead>
  <tbody>
    @foreach ($banners as $banner)
      <tr>
        <th>
          <a href="{{ route('banners.show', [ 'banner' => $banner->id ]) }}">
            {{ $banner->id }}
          </a>
        </th>
        <th>
          @if($banner->image)
            <img style="width: 120px; height: auto; border-radius: 6px" width="{{ $banner->image->width }}" height="{{ $banner->image->height }}" src="{{ $banner->image->url }}" loading="lazy">
          @else
            <span>-</span>
          @endif
        </th>
        <th>
          {{ $banner->title ?? '-' }}
        </th>
        <th>
          @if($banner->href)
            <a href="{{ $banner->href }}">
              {{ $banner->href }}
            </a>
          @else
            <span>-</span>
          @endif
        </th>
        <th>{{ $banner->visible ? 'Да' : 'Нет' }}</th>
        <th>{{ $banner->priority }}</th>
        <th>
          <div class="btn-group">
            <a class="btn btn-default mr-2" href="{{ route('banners.edit', [ 'banner' => $banner->id ]) }}" alt="изменить">
              <i class="fas fa-edit"></i>
            </a>
            <x-adminlte-modal id="modal-destory-{{ $banner->id }}" title="Вы уверены, что хотите удалить запись?" theme="danger">
              <x-slot name="footerSlot">
                <x-adminlte-button label="Отмена" data-dismiss="modal"/>
                <form method="POST" action="{{ route('banners.destroy', [ 'banner' => $banner->id ]) }}">
                  @method('DELETE')
                  @csrf
                  <x-adminlte-button theme="danger" label="Удалить навсегда" type="submit" alt="удалить" />
                </form>
              </x-slot>
            </x-adminlte-modal>
            <x-adminlte-button icon="fas fa-trash" data-toggle="modal" data-target="#modal-destory-{{ $banner->id }}" />
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
    $('#banner-list-table').DataTable(
      {
        language: {
          url: '//cdn.datatables.net/plug-ins/2.0.2/i18n/ru.json',
        }
      }
    );
  </script>
@stop
