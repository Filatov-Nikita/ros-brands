@extends('adminlte::page')

@section('title', 'Спецпредложения | Редактировать | ' . $promotion->name)

@section('content_header')
  <x-edit-toolbar resource_name="promotions" resource="{{ $promotion->id }}" />
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">Спецпредложение: {{ $promotion->name }}</h2>
    </div>
    <form method="POST" action="{{ route('promotions.update', [ 'promotion' => $promotion->id ]) }}">
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
          value="{{ $promotion->name }}"
        />

        <x-adminlte-input
          required
          name="title"
          id="title"
          label="Заголовок"
          type="text"
          enable-old-support
          value="{{ $promotion->title }}"
        />

        <x-adminlte-textarea
          required
          label="Описание"
          id="description"
          name="description"
          rows="5"
          enable-old-support
        >
          {{ $promotion->description }}
        </x-adminlte-textarea>

        <x-adminlte-select
          name="visible"
          label="Видимость"
          enable-old-support
        >
          <option value="1" @selected($promotion->visible === 1)>Да</option>
          <option value="0" @selected($promotion->visible === 0)>Нет</option>
        </x-adminlte-select>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">
          Отправить
        </button>
      </div>
    </form>
  </div>
@stop
