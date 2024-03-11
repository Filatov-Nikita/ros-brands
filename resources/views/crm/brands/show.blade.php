@extends('adminlte::page')

@section('title', 'Бренды | ' . $brand->name)

@section('content_header')
  <x-card-toolbar resource_name="brands" resource="{{ $brand->id }}" />
@stop

@section('content')
  <div class="row">
    <div class="col col-6">
      <div class="card">
        <div class="card-header">
          <h1>Бренд: {{ $brand->name }}</h1>
        </div>
        <table class="table table-striped">
          <tbody>
            <tr>
              <th>ID</th>
              <th>{{ $brand->id }}</th>
            </tr>
            <tr>
              <th>Название</th>
              <th>{{ $brand->name }}</th>
            </tr>
            <tr>
              <th>ID на сайте планета</th>
              <th>{{ $brand->planeta_mall_id }}</th>
            </tr>
            <tr>
              <th>Видимость</th>
              <th>{{ $brand->visible ? 'Да' : 'Нет' }}</th>
            </tr>
            <tr>
              <th>Есть в ТРЦ:</th>
              <th>
                <ul class="list-group">
                  @forelse($malls as $mall)
                    <li class="list-group-item">{{ $mall->name }} - {{ $mall->city }}</li>
                  @empty
                    <p class="text-danger">Не привязан ни к одному ТРЦ</p>
                  @endforelse
                </ul>
              </th>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col col-6">
      <div class="card">
        <div class="card-header">
          Логотип бренда
        </div>
        <div class="card-body">
          @if($logotype)
            <div class="mb-3">
              <img style="width: 180px; height: auto" width="{{ $logotype->width }}" height="{{ $logotype->height }}" src="{{ $logotype->url }}" />
            </div>
            <form action="{{ route('brands.image.update', [ 'brand' => $brand->id ]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <x-adminlte-input-file
                name="logotype_file"
                legend="Открыть"
                placeholder="Выберите файл"
              >
                <x-slot name="bottomSlot">
                    <span class="text-sm text-gray">Максимум 512кб</span>
                </x-slot>
              </x-adminlte-input-file>
              <button class="btn btn-primary" type="submit">Редактировать</button>
            </form>
          @else
            <form action="{{ route('brands.image.store', [ 'brand' => $brand->id ]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <x-adminlte-input-file
                name="logotype_file"
                legend="Открыть"
                placeholder="Выберите файл"
              >
                <x-slot name="bottomSlot">
                    <span class="text-sm text-gray">Максимум 512кб</span>
                </x-slot>
              </x-adminlte-input-file>
              <button class="btn btn-primary" type="submit">Загрузить</button>
            </form>
          @endif
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          Промоакции
        </div>
        <div class="card-body">
          <form action="{{ route('brands.attach_promotions', [ 'brand' => $brand->id ]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div id="promo-group" class="form-group">
              <label>Промоакции</label>
              <select id="promotion-select"  class="form-control" name="promotion_ids[]" multiple="multiple">
                @foreach($promotions as $promotion)
                  <option value="{{ $promotion->id }}" @selected($brand->promotions->contains($promotion->id))>
                    {{ $promotion->name }}
                  </option>
                @endforeach
              </select>
            </div>
            <button class="btn btn-primary mt-3" type="submit">Привязать акции</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@stop

@section('css')
  <style>
    #promo-group .select2-selection--multiple .select2-selection__choice {
      color: #000000;
    }
  </style>
@stop

@section('js')
  <script>
    $('#promotion-select').select2({
      placeholder: 'Выберите акции'
    });
  </script>
@stop
