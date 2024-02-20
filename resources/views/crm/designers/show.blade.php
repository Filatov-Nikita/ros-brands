@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <div>
    <a href="{{ route('designers.index') }}">К списку</a>
  </div>
@stop

@section('content')
  <div class="row">
    <div class="col col-6">
      <div class="card">
        <div class="card-header">
          <h1>Стилист {{ $designer->name }}</h1>
        </div>
        <table class="table table-striped">
          <tbody>
            <tr>
              <th>ID</th>
              <th>{{ $designer->id }}</th>
            </tr>
            <tr>
              <th>Название</th>
              <th>{{ $designer->name }}</th>
            </tr>
            <tr>
              <th>Короткое описание</th>
              <th>{{ $designer->position }}</th>
            </tr>
            <tr>
              <th>Описание</th>
              <th>{{ $designer->description }}</th>
            </tr>
            <tr>
              <th>Видимость</th>
              <th>{{ $designer->visible ? 'Да' : 'Нет' }}</th>
            </tr>
            <tr>
              <th>Приоритет</th>
              <th>{{ $designer->priority }}</th>
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
              <img style="width: 180px; height: auto" width="{{ $image->width }}" height="{{ $image->height }}" src="{{ $image->url }}" />
            </div>
            <form action="{{ route('designers.image.update', [ 'designer' => $designer->id ]) }}" method="POST" enctype="multipart/form-data">
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
          @else
          <form action="{{ route('designers.image.store', [ 'designer' => $designer->id ]) }}" method="POST" enctype="multipart/form-data">
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
          @endif
        </div>
      </div>
    </div>
  </div>
@stop
