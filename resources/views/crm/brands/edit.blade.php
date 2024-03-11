@extends('adminlte::page')

@section('title', 'Баннеры | Редактировать | ' . $brand->name)

@section('content_header')
  <x-edit-toolbar resource_name="brands" resource="{{ $brand->id }}" />
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">Бренд: {{ $brand->name }}</h2>
    </div>
    <form method="POST" action="{{ route('brands.update', [ 'brand' => $brand->id ]) }}">
      @csrf
      @method('PUT')
      <div class="card-body">
        <x-adminlte-input
          required
          name="name"
          id="name"
          label="Название"
          type="text"
          enable-old-support
          value="{{ $brand->name }}"
        />
        <x-adminlte-input
          required
          name="planeta_mall_id"
          id="planeta_mall_id"
          label="ID на сайте планета"
          type="text"
          enable-old-support
          value="{{ $brand->planeta_mall_id }}"
        />
        <x-adminlte-select
          name="visible"
          label="Видимость"
          enable-old-support
          value="{{ $brand->visible }}"
        >
          <option value="1" @selected($brand->visible === 1)>Да</option>
          <option value="0" @selected($brand->visible === 0)>Нет</option>
        </x-adminlte-select>
        <div class="form-group">
          <label>Привязка к ТРЦ</label>
          <div class="form-group">
            @foreach($malls as $mall)
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  name="malls[]"
                  id="mall-{{ $mall->id }}"
                  value="{{ $mall->id }}"
                  @checked($binded_malls->contains($mall->id))
                >
                <label class="form-check-label" for="mall-{{ $mall->id }}">
                  {{ $mall->name }}
                </label>
              </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">
          Отправить
        </button>
      </div>
    </form>
  </div>
@stop
