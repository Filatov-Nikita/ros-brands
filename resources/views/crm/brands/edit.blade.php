@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <div class="mb-3">
    <a class="" href="{{ route('brands.index') }}">К списку</a>
  </div>
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">{{ $brand->name }}</h2>
    </div>
    <form method="POST" action="{{ route('brands.update', [ 'brand' => $brand->id ]) }}">
      @csrf
      @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label for="name">Название</label>
          <input required class="form-control" id="name" name="name" type="text" value="{{ $brand->name }}" />
        </div>
        <div class="form-group">
          <label for="planeta_mall_id">Код</label>
          <input required class="form-control" id="planeta_mall_id" name="planeta_mall_id" type="text" value="{{ $brand->planeta_mall_id }}" />
        </div>
        <div class="form-group">
          <label>Видимость</label>
          <select class="form-control" name="visible">
            <option {{ $brand->visible === 1 ? 'selected' : '' }} value="1">Да</option>
            <option {{ $brand->visible === 0 ? 'selected' : '' }} value="0">Нет</option>
          </select>
        </div>
        <div class="form-group">
          @foreach($malls as $mall)
            <div class="form-check">
              <input
                id="mall-{{ $mall->id }}"
                class="form-check-input"
                type="checkbox" name="malls[]"
                value="{{ $mall->id }}"
                {{ $binded_malls->contains($mall->id) ? 'checked' : '' }}
              >
              <label class="form-check-label" for="mall-{{ $mall->id }}">{{ $mall->name }}</label>
            </div>
          @endforeach
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

@section('css')
  {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

@stop
