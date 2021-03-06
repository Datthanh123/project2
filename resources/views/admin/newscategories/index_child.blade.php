@foreach($childs as $child)
  <tr>
      <td><i class="fas fa-arrow-right"></i> {{$child->id}}</td>
      <td><i class="fas fa-arrow-right"></i> {{$child->cate_name}}</td>
      <td><i class="fas fa-arrow-right"></i> {{$child->cate_slug}}</td>
      <td><i class="fas fa-arrow-right"></i> {{$child->cate_parent}}</td>
      <td>
        <a href="{{ route('newscategories.edit', $child->id) }}" class="btn btn_primary">Edit</a>
      </td>
      <td>
        <form action="{{ route('newscategories.destroy', $child->id)}}" method="post">
          @csrf
          @method('DELETE')
          <button class="btn btn_danger" type="submit">Delete</button>
        </form>
      </td>
  </tr>
      @if(count($child->childs))
        @include('admin.newscategories.index_child', ['childs' => $child->childs])
      @endif
@endforeach
 