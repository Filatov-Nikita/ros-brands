@extends('adminlte::page')

@section('title', 'Бренды')

@section('content_header')
  <x-rejected-delete-action>
    Бренд уже используется в других записях.
  </x-rejected-delete-action>
  <h1>Бренды</h1>
@stop

@section('content')
<div class="mb-4">
  <a class="btn btn-primary" href="{{ route('brands.create') }}">Создать</a>
</div>
<table class="table" id="brand-list-table" style="width:100%">
  <thead>
      <tr>
        <th>Название</th>
        <th>ID на сайте планета</th>
        <th>Видимость</th>
        <th>Действия</th>
      </tr>
  </thead>
  <tbody>
    @foreach ($brands as $brand)
      <tr>
        <th>
          <a href="{{ route('brands.show', [ 'brand' => $brand->id ]) }}">
            {{ $brand->name }}
          </a>
        </th>
        <th>{{ $brand->planeta_mall_id }}</th>
        <th>{{ $brand->visible ? 'Да' : 'Нет' }}</th>
        <th>
          <div class="btn-group">
            <a class="btn btn-default mr-2" href="{{ route('brands.edit', [ 'brand' => $brand->id ]) }}" alt="изменить">
              <i class="fas fa-edit"></i>
            </a>
            <x-adminlte-modal id="modal-destory-{{ $brand->id }}" title="Вы уверены, что хотите удалить запись?" theme="danger">
              <x-slot name="footerSlot">
                <x-adminlte-button label="Отмена" data-dismiss="modal"/>
                <form method="POST" action="{{ route('brands.destroy', [ 'brand' => $brand->id ]) }}">
                  @method('DELETE')
                  @csrf
                  <x-adminlte-button theme="danger" label="Удалить навсегда" type="submit" alt="удалить" />
                </form>
              </x-slot>
            </x-adminlte-modal>
            <x-adminlte-button icon="fas fa-trash" data-toggle="modal" data-target="#modal-destory-{{ $brand->id }}" />
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
    $('#brand-list-table').DataTable(
      {
        language: {
          url: '//cdn.datatables.net/plug-ins/2.0.2/i18n/ru.json',
        }
      }
    );
  </script>
@stop
