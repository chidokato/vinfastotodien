@extends('admin.layout.main')
@section('content')
@include('admin.alert')
<?php use App\Models\Images; use App\Models\Option; ?>
<form method="POST" action="{{route('post.update', [$data->id])}}" enctype="multipart/form-data">
@csrf
@method('PUT')
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow fixed">
    <button type="button" id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"><i class="fa fa-bars"></i></button>
    <ul class="navbar-nav ">
        <li class="nav-item"> <a class="nav-link line-1" href="{{route('post.index')}}" ><i class="fa fa-chevron-left" aria-hidden="true"></i> <span class="mobile-hide">Quay lại</span> </a> </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link" target="_blank" href="{{asset('')}}" >
                <i class="fas fa-external-link-alt mr-2"></i> {{__('lang.home')}}
            </a>
        </li>
        <li class="nav-item mobile-hide">
            <button type="reset" class="btn-danger mr-2 form-control"><i class="fas fa-sync"></i> Làm mới</button>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item">
            <button type="submit" class="btn-success form-control"><i class="far fa-save"></i> Lưu lại</button>
        </li>
    </ul>
</nav>

<div class="d-sm-flex align-items-center justify-content-between mb-3 flex" style="height: 38px;">
    <h2 class="h3 mb-0 text-gray-800 line-1 size-1-3-rem">Thêm mới</h2>
</div>

<div class="row">
  <div class="col-xl-9 col-lg-9">

    <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tùy chỉnh</h6>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Tên sản phẩm</label>
                          <input value="{{$data->name}}" name="name" placeholder="..." type="text" class="form-control">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Slug</label>
                          <input value="{{$data->slug}}" name="slug" placeholder="..." type="text" class="form-control">
                      </div>
                  </div>
              </div>
              <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="">Danh mục</label>
                            <select name='category_id' class="form-control select2" id="category">
                              <?php addeditcat ($category,0,$str='',$data['category_id']); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row" id="loadcustom">
                    @foreach($option as $val)
                    <div class="col-md-2">
                        <div class="form-group">
                            @if($val->name == 'img_1')
                            <div style="display: flex;"><label>Mặt: <input type="file" name="img_1"></label> <img style="height:50px" src="data/product/knot/{{$data->img_1}}"></div>
                            @elseif($val->name == 'img_2')
                            <div style="display: flex; margin-bottom: 15px;"><label>Dây trên: <input type="file" name="img_1"></label> <img style="height:50px" src="data/product/knot/{{$data->img_1}}"></div>
                            <div style="display: flex; margin-bottom: 15px;"><label>Dây dưới: <input type="file" name="img_2"></label> <img style="height:50px" src="data/product/knot/{{$data->img_2}}"></div>
                            <div style="display: flex; margin-bottom: 15px;"><label>Dây cạnh mặt: <input type="file" name="img_3"></label> <img style="height:50px" src="data/product/knot/{{$data->img_3}}"></div>
                            @else
                            <label>{{$val->name}}: </label>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-10 customize">
                        <div class="form-group">
                            @foreach(Option::where('parent', $val->id)->get() as $key => $subO)
                            <label> <input <?php if($data[$val->sku] == $subO->name){ echo 'checked'; } ?> value="{{$subO->name}}" class="form-check-input" type="radio" name="{{$val->sku}}"> {{$subO->name}}</label>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    
        <div class="card shadow mb-2">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Nội dung</h6>
            </div>
            <div class="tab-content overflow">
                <div class="tab-pane active" id="vi">
                  <div class="card-body">
                      <div class="row">
                          
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Mô tả ngắn</label>
                                  <textarea rows="4" name="detail" class="form-control">{{$data->detail}}</textarea>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Mô tả sản phẩm</label>
                                  <textarea name="content" class="form-control" id="ckeditor">{{$data->content}}</textarea>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Thông số sản phẩm</label>
                                  <textarea name="parameter" class="form-control" id="ckeditor1">{{$data->parameter}}</textarea>
                              </div>
                          </div>
                          
                      </div>
                  </div>
                </div>
            </div>
        </div>
        @include('admin.layout.seo')
    </div>
    <div class="col-xl-3 col-lg-3">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tùy chọn</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Giá bán</label>
                            <div class="flex">
                                <input value="{{$data->price}}" name="price" placeholder="..." type="text" class="form-control">
                                <select name="unit" class="form-control">
                                    <option <?php if($data->unit == '¥'){echo 'selected';} ?> value="¥">JPY</option>
                                    <option <?php if($data->unit == '₫'){echo 'selected';} ?> value="₫">VNĐ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Khuyến mãi</label>
                            <input name="sale" value="{{$data->sale}}" placeholder="..." type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tồn kho</label>
                            <input name="quantity" value="{{$data->quantity}}" placeholder="..." type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> <input <?php if($data->genuine == 'on'){ echo 'checked'; } ?> type="checkbox" name="genuine"> Hàng chính hãng</label>
                        </div>
                    </div>
                      
                </div>
            </div>
        </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Ảnh đại diện</h6>
            </div>
            <div class="card-body">
                <div class="file-upload">
                    <div class="file-upload-content" onclick="$('.file-upload-input').trigger( 'click' )">
                        <img class="file-upload-image" src="{{ isset($data) ? 'data/news/'.$data->img : 'data/no_image.jpg' }}" />
                    </div>
                    <div class="image-upload-wrap">
                        <input name="img" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                    </div>
                </div>
            </div>

        </div>

        <div class="card shadow mb-2">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Chọn nhiều ảnh</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="file" name="imgdetail[]" multiple class="form-control">
                    <p>Nhấn giữ <i style="color: red">Ctrl</i> để chọn nhiều ảnh !</p>
                </div>
                <div class="row detail-img">
                    @foreach($images as $val)
                    <div class="col-md-4" id="detail_img">
                        <img src="data/product/detail/{{$val->img}}">
                        <button onClick="delete_row(this)" type="button" id="del_img_detail"> <i class="fa fa-times" aria-hidden="true"></i> </button>
                        <input type="hidden"  name="id_img_detail" id="id_img_detail" value="{{$val->id}}" />
                    </div>
                    @endforeach
                </div>
            </div>
        </div>


      </div>
</div>
</form>
<?php 
    function addeditcat ($data, $parent=0, $str='',$select=0)
    {
        foreach ($data as $value) {
            if ($value['parent'] == $parent) {
                if($select != 0 && $value['id'] == $select )
                { ?>
                    <option value="<?php echo $value['id']; ?>" selected> <?php echo $str.$value['name']; ?> </option>
                <?php } else { ?>
                    <option value="<?php echo $value['id']; ?>" > <?php echo $str.$value['name']; ?> </option>
                <?php }
                
                addeditcat ($data, $value['id'], $str.'___',$select);
            }
        }
    }
?>
<script>
    function addCode() {
        document.getElementById("add_to_me").insertAdjacentHTML("beforeend",
                '<div class="form-group d-flex align-items-center justify-content-between" id="section_list"><input class="form-control" type="text" name="name_section:vi[]" placeholder="Tiếng Việt"><input class="form-control" type="text" name="name_section:en[]" placeholder="Tiếng Anh"><input class="form-control" type="text" name="name_section:cn[]" placeholder="Tiếng Trung"><button type="button" onClick="delete_row(this)" class="form-control w100"><i class="fa fa-minus-circle" aria-hidden="true"></i></button></div>');
    }
    function delete_row(e) {
        e.parentElement.remove();
    }
</script>
@endsection