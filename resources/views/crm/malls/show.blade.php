@extends('adminlte::page')

@section('title', 'Моллы | ' . $mall->name . ' - ' . $mall->city)

@section('content_header')
  <x-card-toolbar resource_name="malls" resource="{{ $mall->id }}" />
@stop

@section('content')
  <div class="row">
    <div class="col col-6">
      <div class="card">
        <div class="card-header">
          <h1>Молл: {{ $mall->name }} - {{ $mall->city }}</h1>
        </div>
        <table class="table table-striped">
          <tbody>
            <tr>
              <th>ID</th>
              <th>{{ $mall->id }}</th>
            </tr>
            <tr>
              <th>Название</th>
              <th>{{ $mall->name }}</th>
            </tr>
            <tr>
              <th>Город</th>
              <th>{{ $mall->city }}</th>
            </tr>
            <tr>
              <th>Сайт</th>
              <th>
                <a href="{{ $mall->site_href }}" target="_blank">
                  {{ $mall->site_href }}
                </a>
              </th>
            </tr>
            <tr>
              <th>Город</th>
              <th>{{ $mall->city }}</th>
            </tr>
            <tr>
              <th>Видимость</th>
              <th>{{ $mall->visible ? 'Да' : 'Нет' }}</th>
            </tr>
            <tr>
              <th>Приоритет</th>
              <th>{{ $mall->priority }}</th>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col col-6">
      <div class="card">
        <div class="card-header">
          Логотип ТРЦ
        </div>
        <div class="card-body">
          @if($logotype)
            <div class="mb-3">
              <img style="width: 180px; height: auto" width="{{ $logotype->width }}" height="{{ $logotype->height }}" src="{{ $logotype->url }}" />
            </div>
            <form action="{{ route('malls.image.update', [ 'mall' => $mall->id ]) }}" method="POST" enctype="multipart/form-data">
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
            <form action="{{ route('malls.image.store', [ 'mall' => $mall->id ]) }}" method="POST" enctype="multipart/form-data">
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
    </div>
  </div>
@stop
