<div class="form-group">
  @foreach($categories as $category)
    @if($current_cat->id !== $category['id'])
      <div class="form-check">
        <input
          class="form-check-input"
          type="radio"
          name="cat_parent"
          id="cat-{{ $category['id'] }}"
          value="{{ $category['id'] }}"
          {{ optional($parent_cat)->id === $category['id'] ? 'checked' : '' }}
        >
        <label class="form-check-label" for="cat-{{ $category['id'] }}">
          {{ $category['name'] }}
        </label>
        @if(count($category['children']) > 0)
          @include('crm.product-categories.parts.category-checkboxes-edit', [
            'categories' => $category['children'],
            'current_cat' => $current_cat,
            'parent_cat' => $parent,
          ])
        @endif
      </div>
    @endif
  @endforeach
</div>
