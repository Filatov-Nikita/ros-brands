<ul class="list-group">
  @foreach($categories as $category)
    <li class="list-group-item">
      <div class="row justify-content-between">
        <div>{{ $category['name'] }}</div>
        <div class="row">
          <a class="btn btn-default mr-2" href="{{ route('product-categories.edit', [ 'product_category' => $category['id'] ]) }}" alt="изменить">
            <i class="fas fa-edit"></i>
          </a>
          <form method="POST" action="{{ route('product-categories.destroy', [ 'product_category' => $category['id'] ]) }}">
            @method('DELETE')
            @csrf
            <button class="btn btn-default bg-dander" type="submit" alt="удалить">
              <i class="fas fa-trash"></i>
            </button>
          </form>
        </div>
      </div>
      @if(count($category['children']) > 0)
        <div class="mt-2">
          @include('crm.product-categories.parts.category-list', [
            'categories' => $category['children']
          ])
        </div>
      @endif
    </li>
  @endforeach
</ul>
