@php
  $_level = isset($level) ? $level : 0;
  $_checked = old('parent_cat', $checked ?? null);
  $_disabled = $disabled ?? null;
@endphp
@if($_level === 0)
  <div class="form-group">
    <label>Родительская категория</label>
    <div class="form-group">
      <div class="form-check">
        <input
          class="form-check-input"
          type="radio"
          name="cat_parent"
          id="empty"
          value=""
          @checked($_checked === null)
        >
        <label class="form-check-label" for="empty">
          Нет родительской категории
        </label>
      </div>
    </div>
@endif
<div class="form-group">
  @foreach($categories as $category)
    <div class="form-check">
      <input
        class="form-check-input"
        type="radio"
        name="cat_parent"
        id="cat-{{ $category['id'] }}"
        value="{{ $category['id'] }}"
        @checked($_checked === $category['id'])
        @disabled($_disabled === $category['id'])
      >
      <label class="form-check-label" for="cat-{{ $category['id'] }}">
        {{ $category['name'] }}
      </label>
      @if(count($category['children']) > 0)
        @include('crm.product-categories.parts.category-checkboxes', [
          'categories' => $category['children'],
          'level' => $_level + 1,
          'checked' => $_checked,
          'disabled' => $_disabled,
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
