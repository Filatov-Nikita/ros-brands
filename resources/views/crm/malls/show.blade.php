@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <div>
    <a href="{{ route('malls.index') }}">К списку</a>
  </div>
@stop

@section('content')
  <div class="row">
    <div class="col col-6">
      <div class="card">
        <div class="card-header">
          <h1>ТРЦ {{ $mall->name }} - {{ $mall->city }}</h1>
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
          @endif
          <form action="{{ route('malls.attach_logotype', [ 'mall' => $mall->id ]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="custom-file">
              <input name="logotype_file" type="file" class="custom-file-input" id="logo-file">
              <label class="custom-file-label" for="logo-file">Выберите файл</label>
            </div>
            <button class="btn btn-primary mt-3" type="submit">Загрузить</button>
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
    $('#mall-list-table').DataTable();
    // new DataTable('', {
    //     order: [[3, 'desc']]
    // });
  </script>
@stop
