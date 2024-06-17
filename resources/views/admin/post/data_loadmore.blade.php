@foreach($posts as $val)
<tr id="post">
    <input type="hidden" name="id" id="id" value="{{$val->id}}" >
    <td class="thumb"><img src="data/product/{{$val->img}}"></td>
    <td>
        <div class="name"><a href="{{route('post.edit',[$val->id])}}" >{{$val->name}}</a></div>
        <div class="slug">{{$val->slug}}</div>
    </td>
    <td>{{number_format($val->price).' '.$val->unit}} 
        <div class="slug" style="color:red">{{$val->sale?'sale: '.$val->sale.'%':''}}</div>
    </td>
    <td>{{$val->category_id ? $val->category->name : ''}}</td>
    <td>
        <label class="container"><input <?php if($val->hot == 'true'){echo "checked";} ?> type="checkbox" id='hot_post' ><span class="checkmark"></span></label>
    </td>
    <td>
        <label class="container"><input <?php if($val->status == 'true'){echo "checked";} ?> type="checkbox" id='status_post' ><span class="checkmark"></span></label>
    </td>
    <td>{{date_format($val->updated_at,"d/m/Y")}}</td>
    <td>{{$val->User->yourname}}</td>
    <td style="display: flex;">
        <a href="{{route('post_up', [$val->id])}}" class="mr-3"><i class="fas fa-arrow-up" aria-hidden="true"></i></a> 
        <a href="{{route('post.edit',[$val->id])}}" class="mr-2"><i class="fas fa-edit" aria-hidden="true"></i></a>
        <form action="{{route('post.destroy', [$val->id])}}" method="POST">
          @method('DELETE')
          @csrf
          <button class="button_none" onclick="return confirm('Bạn muốn xóa bản ghi ?')"><i class="fas fa-trash-alt"></i></button>
        </form>
    </td>
</tr>
@endforeach