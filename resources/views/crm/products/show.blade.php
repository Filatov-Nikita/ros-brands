@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <x-card-toolbar resource_name="products" resource="{{ $product->id }}" />
@stop

@section('content')
  <div class="row">
    <div class="col col-6">
      <div class="card">
        <div class="card-header">
          <h1>Товар</h1>
        </div>
        <table class="table table-striped">
          <tbody>
            <tr>
              <th>ID</th>
              <th>{{ $product->id }}</th>
            </tr>
            <tr>
              <th>Бренд</th>
              <th>{{ $brand->name }}</th>
            </tr>
            <tr>
              <th>Название</th>
              <th>{{ $product->name }}</th>
            </tr>
            <tr>
              <th>Состав</th>
              <th>{{ $product->consist }}</th>
            </tr>
            <tr>
              <th>Цена</th>
              <th>{{ $product->price }}</th>
            </tr>
            <tr>
              <th>Категория</th>
              <th>{{ $category->name }}</th>
            </tr>
            <tr>
              <th>Видимость</th>
              <th>{{ $product->visible ? 'Да' : 'Нет' }}</th>
            </tr>
            <tr>
              <th>Приоритет</th>
              <th>{{ $product->priority }}</th>
            </tr>
            <tr>
              <th>Описание</th>
              <th>{{ $product->description }}</th>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col col-6">
      <div class="card">
        <div class="card-header">
          Миниатюра
        </div>
        <div class="card-body">
          @if($thumbnail)
            <div class="mb-3">
              <img style="width: 180px; height: auto" width="{{ $thumbnail->width }}" height="{{ $thumbnail->height }}" src="{{ $thumbnail->url }}" />
            </div>
            <form action="{{ route('products.thumb.update', [ 'product' => $product->id ]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <x-adminlte-input-file
                name="thumb_file"
                legend="Открыть"
                placeholder="Выберите файл"
              >
                <x-slot name="bottomSlot">
                    <span class="text-sm text-gray">Максимум 1мб</span>
                </x-slot>
              </x-adminlte-input-file>
              <button class="btn btn-primary" type="submit">Редактировать</button>
            </form>
          @else
          <form action="{{ route('products.thumb.store', [ 'product' => $product->id ]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-adminlte-input-file
              name="thumb_file"
              legend="Открыть"
              placeholder="Выберите файл"
            >
              <x-slot name="bottomSlot">
                  <span class="text-sm text-gray">Максимум 1мб</span>
              </x-slot>
            </x-adminlte-input-file>
            <button class="btn btn-primary" type="submit">Загрузить</button>
          </form>
          @endif
        </div>
      </div>
      @foreach($images as $image)
        <div class="card">
          <div class="card-body">
            <div class="mb-2">
              <img style="width: 180px; height: auto" width="{{ $image->width }}" height="{{ $image->height }}" src="{{ $image->url }}" />
            </div>
            <form class="mb-4" action="{{ route('products.image.update', [ 'product' => $product->id, 'image' => $image->id ]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <x-adminlte-input-file
                name="image_file"
                legend="Открыть"
                placeholder="Выберите файл"
              >
                <x-slot name="bottomSlot">
                    <span class="text-sm text-gray">Максимум 1мб</span>
                </x-slot>
              </x-adminlte-input-file>
              <button class="btn btn-primary" type="submit">Редактировать</button>
            </form>
            <form method="POST" action="{{ route('products.image.remove', [ 'product' => $product->id, 'image' => $image->id ]) }}">
              @method('DELETE')
              @csrf
              <button class="btn btn-danger" type="submit" alt="удалить">
                удалить
              </button>
            </form>
          </div>
        </div>
      @endforeach
      @if(count($images) < 4)
        <div class="card">
          <div class="card-header">
            Загрузить изображение
          </div>
          <div class="card-body">
            <form action="{{ route('products.image.store', [ 'product' => $product->id ]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <x-adminlte-input-file
                name="image_file"
                legend="Открыть"
                placeholder="Выберите файл"
              >
                <x-slot name="bottomSlot">
                    <span class="text-sm text-gray">Максимум 1мб</span>
                </x-slot>
              </x-adminlte-input-file>

              <button class="btn btn-primary" type="submit">Загрузить</button>
            </form>
          </div>
        </div>
      @endif
    </div>
  </div>
@stop
