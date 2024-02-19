@php
  $_level = isset($level) ? $level : 0;
  $_checked = old('product_category_id', $checked ?? null);
@endphp
@if($_level === 0)
  <div class="form-group">
    <label>Категория товара</label>
@endif
<div class="form-group">
  @foreach($categories as $category)
    <div class="form-check">
      <input
        class="form-check-input"
        type="radio"
        name="product_category_id"
        id="cat-{{ $category['id'] }}"
        value="{{ $category['id'] }}"
        @checked($_checked == $category['id'])
      >
      <label class="form-check-label" for="cat-{{ $category['id'] }}">
        {{ $category['name'] }}
      </label>
      @if(count($category['children']) > 0)
        @include('crm.products.parts.category-list-form', [
          'categories' => $category['children'],
          'level' => $_level + 1,
          'checked' => $_checked,
        ])
      @endif
    </div>
  @endforeach
</div>
@if($_level === 0)
    @error('product_category_id')
      <div class="invalid-feedback d-block">
        {{ $errors->first('product_category_id') }}
      </div>
    @enderror
  </div>
@endif
