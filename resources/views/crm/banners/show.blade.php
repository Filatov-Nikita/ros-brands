@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <div>
    <a href="{{ route('banners.index') }}">К списку</a>
  </div>
@stop

@section('content')
  <div class="row">
    <div class="col col-6">
      <div class="card">
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
    </div>
    <div class="col col-6">
      <div class="card">
        <div class="card-header">
          Изображение
        </div>
        <div class="card-body">
          @if($image)
            <div class="mb-3">
              <img style="width: 220px; height: auto" width="{{ $image->width }}" height="{{ $image->height }}" src="{{ $image->url }}" />
            </div>
            <form action="{{ route('banners.image.update', [ 'banner' => $banner->id ]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="custom-file">
                <input name="image_file" type="file" class="custom-file-input" id="image-file">
                <label class="custom-file-label" for="image-file">Выберите файл</label>
              </div>
              <button class="btn btn-primary mt-3" type="submit">Редактировать</button>
            </form>
          @else
          <form action="{{ route('banners.image.store', [ 'banner' => $banner->id ]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="custom-file">
              <input name="image_file" type="file" class="custom-file-input" id="image-file">
              <label class="custom-file-label" for="image-file">Выберите файл</label>
            </div>
            <button class="btn btn-primary mt-3" type="submit">Загрузить</button>
          </form>
          @endif
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          Изображение (телефон)
        </div>
        <div class="card-body">
          @if($image_mobile)
            <div class="mb-3">
              <img style="width: 220px; height: auto" width="{{ $image_mobile->width }}" height="{{ $image_mobile->height }}" src="{{ $image_mobile->url }}" />
            </div>
            <form action="{{ route('banners.image-mobile.update', [ 'banner' => $banner->id ]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="custom-file">
                <input name="image_mobile_file" type="file" class="custom-file-input" id="image-mobile-file">
                <label class="custom-file-label" for="image-mobile-file">Выберите файл</label>
              </div>
              <button class="btn btn-primary mt-3" type="submit">Редактировать</button>
            </form>
          @else
          <form action="{{ route('banners.image-mobile.store', [ 'banner' => $banner->id ]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="custom-file">
              <input name="image_mobile_file" type="file" class="custom-file-input" id="image-mobile-file">
              <label class="custom-file-label" for="image-mobile-file">Выберите файл</label>
            </div>
            <button class="btn btn-primary mt-3" type="submit">Загрузить</button>
          </form>
          @endif
        </div>
      </div>
  </div>
@stop

@section('css')
  {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

@stop
