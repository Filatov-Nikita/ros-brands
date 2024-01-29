<div class="form-group">
  @foreach($categories as $category)
    <div class="form-check">
      <input
        class="form-check-input"
        type="radio"
        name="cat_parent"
        id="cat-{{ $category['id'] }}"
        value="{{ $category['id'] }}"
      >
      <label class="form-check-label" for="cat-{{ $category['id'] }}">
        {{ $category['name'] }}
      </label>
      @if(count($category['children']) > 0)
        @include('crm.product-categories.parts.category-checkboxes', [
          'categories' => $category['children']
        ])
      @endif
    </div>
  @endforeach
</div>
