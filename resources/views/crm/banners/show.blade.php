@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <div>
    <a href="{{ route('banners.index') }}">К списку</a>
  </div>
@stop

@section('content')
  <div class="card col col-6">
    <div class="card-header">
      <h1>Баннер #{{ $banner->id }}</h1>
    </div>
    <table class="table table-striped">
      <tbody>
        <tr>
          <th>ID</th>
          <th>{{ $banner->id }}</th>
        </tr>
        <tr>
          <th>Url</th>
          <th>
            @if($banner->href)
              <a href="{{ $banner->href }}">
                {{ $banner->href }}
              </a>
            @else
              <span>-</span>
            @endif
          </th>
        </tr>
        <tr>
          <th>Заголовок</th>
          <th>{{ $banner->title ?? '-' }}</th>
        </tr>
        <tr>
          <th>Видимость</th>
          <th>{{ $banner->visible ? 'Да' : 'Нет' }}</th>
        </tr>
        <tr>
          <th>Приоритет</th>
          <th>{{ $banner->priority }}</th>
        </tr>
      </tbody>
    </table>
  </div>
@stop

@section('css')
  {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

@stop
