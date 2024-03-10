@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <x-card-toolbar resource_name="product-categories" resource="{{ $category->id }}" />
@stop

@section('content')
  <div class="card col col-6">
    <div class="card-header">
      <h1>Категория товара</h1>
    </div>
    <table class="table table-striped">
      <tbody>
        <tr>
          <th>ID</th>
          <th>{{ $category->id }}</th>
        </tr>
        <tr>
          <th>Название</th>
          <th>{{ $category->name }}</th>
        </tr>
        @if($parent)
          <tr>
            <th>Родитель</th>
            <th>{{ $parent->name }}</th>
          </tr>
        @endif
      </tbody>
    </table>
  </div>
@stop

@section('css')
  {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

@stop
