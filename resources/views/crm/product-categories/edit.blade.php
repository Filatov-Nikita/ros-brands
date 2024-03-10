@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <x-edit-toolbar resource_name="product-categories" resource="{{ $product_category->id }}" />
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">{{ $product_category->name }}</h2>
    </div>
    <form method="POST" action="{{ route('product-categories.update', [ 'product_category' => $product_category->id ]) }}">
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
          value="{{ $product_category->name }}"
        />

        @include('crm.product-categories.parts.category-checkboxes', [
          'categories' => $categories,
          'checked' => optional($parent)->id,
          'disabled' => $product_category->id,
        ])
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">
          Отправить
        </button>
      </div>
    </form>
  </div>
@stop

@section('css')
  {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

@stop
