@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <div>
    <a href="{{ route('looks.index') }}">К списку</a>
  </div>
@stop

@section('content')
  <div class="row">
    <div class="col col-6">
      <div class="card">
        <div class="card-header">
          <h1>Образ {{ $look->name }}</h1>
        </div>
        <table class="table table-striped">
          <tbody>
            <tr>
              <th>ID</th>
              <th>{{ $look->id }}</th>
            </tr>
            <tr>
              <th>Название</th>
              <th>{{ $look->name }}</th>
            </tr>
            <tr>
              <th>Категория</th>
              <th>
                <a href="{{ route('look-categories.show', [ 'look_category' => $look->look_category->id ]) }}">
                  {{ $look->look_category->name }}
                </a>
              </th>
            </tr>
            <tr>
              <th>Цвет</th>
              <th>
                <a href="{{ route('look-colors.show', [ 'look_color' => $look->look_color->id ]) }}">
                  {{ $look->look_color->name }}
                </a>
              </th>
            </tr>
            @isset($look->designer)
              <tr>
                <th>Стилист</th>
                <th>
                  <a href="{{ route('designers.show', [ 'designer' => $look->designer->id ]) }}">
                    {{ $look->designer->name }}
                  </a>
                </th>
              </tr>
            @endisset
            <tr>
              <th>Стили образа</th>
              <th>
                @isset($look->look_styles)
                  <ul class="list-group">
                    @foreach($look->look_styles as $style)
                      <li class="list-group-item">
                        <a href="{{ route('look-styles.show', [ 'look_style' => $style->id ]) }}">
                          {{ $style->name }}
                        </a>
                      </li>
                    @endforeach
                  </ul>
                @endisset
                @empty($look->look_styles)
                  <p>Стили не привязаны</p>
                @endempty
              </th>
            </tr>
            <tr>
              <th>Видимость</th>
              <th>{{ $look->visible ? 'Да' : 'Нет' }}</th>
            </tr>
            <tr>
              <th>Приоритет</th>
              <th>{{ $look->priority }}</th>
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
            <form action="{{ route('looks.thumb.update', [ 'look' => $look->id ]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="custom-file">
                <input name="thumb_file" type="file" class="custom-file-input" id="thumb-file">
                <label class="custom-file-label" for="thumb-file">Выберите файл</label>
              </div>
              <button class="btn btn-primary mt-3" type="submit">Редактировать</button>
            </form>
          @else
          <form action="{{ route('looks.thumb.store', [ 'look' => $look->id ]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="custom-file">
              <input name="thumb_file" type="file" class="custom-file-input" id="thumb-file">
              <label class="custom-file-label" for="thumb-file">Выберите файл</label>
            </div>
            <button class="btn btn-primary mt-3" type="submit">Загрузить</button>
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
            <form class="mb-4" action="{{ route('looks.image.update', [ 'look' => $look->id, 'image' => $image->id ]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="custom-file">
                <input name="image_file" type="file" class="custom-file-input">
                <label class="custom-file-label">Выберите файл</label>
              </div>
              <button class="btn btn-primary mt-2" type="submit">Редактировать</button>
            </form>
            <form method="POST" action="{{ route('looks.image.remove', [ 'look' => $look->id, 'image' => $image->id ]) }}">
              @method('DELETE')
              @csrf
              <button class="btn btn-danger" type="submit" alt="удалить">
                удалить
              </button>
            </form>
          </div>
        </div>
      @endforeach
      @if($can_upload_assets)
        <div class="card">
          <div class="card-header">
            Загрузить изображение
          </div>
          <div class="card-body">
            <form action="{{ route('looks.image.store', [ 'look' => $look->id ]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="custom-file">
                <input name="image_file" type="file" class="custom-file-input" id="image_file">
                <label class="custom-file-label" for="image_file">Выберите файл</label>
              </div>
              <button class="btn btn-primary mt-3" type="submit">Загрузить</button>
            </form>
          </div>
        </div>
      @endif
      @if($video)
        <div class="card">
          <div class="card-header">
            Видео
          </div>
          <div class="card-body">
            <div class="mb-3">
              <video style="width: 100%; height: auto" controls src="{{ $video->url }}"></video>
            </div>
            <form class="mb-4" action="{{ route('looks.video.update', [ 'look' => $look->id ]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="custom-file">
                <input name="video_file" type="file" class="custom-file-input" id="video_file">
                <label class="custom-file-label" for="video_file">Выберите файл</label>
              </div>
              <button class="btn btn-primary mt-3" type="submit">Редактировать</button>
            </form>
            <form method="POST" action="{{ route('looks.video.remove', [ 'look' => $look->id ]) }}">
              @method('DELETE')
              @csrf
              <button class="btn btn-danger" type="submit" alt="удалить">
                удалить
              </button>
            </form>
          </div>
        </div>
      @elseif($can_upload_assets)
        <div class="card">
          <div class="card-header">
            Видео
          </div>
          <div class="card-body">
            <form action="{{ route('looks.video.store', [ 'look' => $look->id ]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="custom-file">
                <input name="video_file" type="file" class="custom-file-input" id="video_file">
                <label class="custom-file-label" for="video_file">Выберите файл</label>
              </div>
              <button class="btn btn-primary mt-3" type="submit">Загрузить</button>
            </form>
          </div>
        </div>
      @endif
    </div>
    <div class="col col-12">
      <div class="card">
        <div class="card-header">
          <h1>Привязать товары к образу</h1>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('looks.attach_products', [ 'look' =>  $look->id]) }}">
            @csrf
            <table class="table" id="product-list-table" style="width:100%">
              <thead>
                  <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Бренд</th>
                    <th>Категория</th>
                    <th>Выбрать</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                  <tr>
                    <th>{{ $product->id }}</th>
                    <th>
                      <a href="{{ route('products.show', [ 'product' => $product->id ]) }}">
                        {{ $product->name }}
                      </a>
                    </th>
                    <th>{{ $product->price }}</th>
                    <th>{{ $product->brand->name }}</th>
                    <th>{{ $product->product_category->name }}</th>
                    <th>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="look_product_ids[]" value="{{ $product->id }}" @checked($look->products->contains($product->id))>
                      </div>
                    </th>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <button class="btn btn-primary" type="submit">
              Привязать
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@stop

@section('css')
  {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
  <script>
    $('#product-list-table').DataTable();
  </script>
@stop
