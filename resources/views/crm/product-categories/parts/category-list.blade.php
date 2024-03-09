<ul class="list-group">
  @foreach($categories as $category)
    <li class="list-group-item">
      <div class="row justify-content-between">
        <div>{{ $category['name'] }}</div>
        <div class="row">
          <a class="btn btn-default mr-2" href="{{ route('product-categories.edit', [ 'product_category' => $category['id'] ]) }}" alt="изменить">
            <i class="fas fa-edit"></i>
          </a>
          <x-adminlte-modal id="modal-destory-{{ $category['id'] }}" title="Вы уверены, что хотите удалить запись?" theme="danger">
            <x-slot name="footerSlot">
              <x-adminlte-button label="Отмена" data-dismiss="modal"/>
              <form method="POST" action="{{ route('product-categories.destroy', [ 'product_category' => $category['id'] ]) }}">
                @method('DELETE')
                @csrf
                <x-adminlte-button theme="danger" label="Удалить навсегда" type="submit" alt="удалить" />
              </form>
            </x-slot>
          </x-adminlte-modal>
          <x-adminlte-button icon="fas fa-trash" data-toggle="modal" data-target="#modal-destory-{{ $category['id'] }}" />
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
