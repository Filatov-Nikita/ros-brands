@extends('adminlte::page')

@section('title', 'Категории товаров')

@section('content_header')
  <x-rejected-delete-action>
    Категория уже используется в других записях.
  </x-rejected-delete-action>
  <h1>Категории товаров</h1>
@stop

@section('content')
  <div class="mb-4">
    <a class="btn btn-primary" href="{{ route('product-categories.create') }}">Создать</a>
  </div>
  @include('crm.product-categories.parts.category-list', [
    'categories' => $categories,
  ])
  <div class="pb-4"></div>
@stop
