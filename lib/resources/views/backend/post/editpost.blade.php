@extends('backend.master')



@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="sub-header">Sửa bài viết</h1>
    <div class="row">
        <form method="post" enctype="multipart/form-data">
            <div class="row" style="margin-bottom:40px">
                <div class="col-xs-8">
                    <div class="form-group" >
                        <label>Tiêu đề</label>
                        <input required type="text" name="name" class="form-control" value="{{$data->post_name}}">
                    </div>
                    <div class="form-group" >
                        <label>Mô tả ngắn</label>
                        <input required type="text" name="sum" class="form-control" value="{{$data->post_sum}}">
                    </div>
                    <div class="form-group" >
                        <label>Ảnh dại diện</label>
                        <input type="file" name="img" class="form-control hidden img_hidden">
                        <img width="300px" class="thumbnail" src="{{asset('public/upload/featured/'.$data->post_img)}}">
                    </div>
                    <div class="form-group" >
                        <label>Nội dung</label>
                        <textarea required name="content" class="ckeditor">{{$data->post_content}}</textarea>
                    </div>
                    <div class="form-group" >
                        <label>Danh mục</label>

                        <select required name="cat" class="form-control">
                            @foreach($catalog as $value)
                                @if($value->cat_id == $data->post_cat)
                                    <option value="{{$value->cat_id}}" selected="" >{{$value->cat_name}}</option>
                                @else
                                    <option value="{{$value->cat_id}}">{{$value->cat_name}}</option>
                                @endif
                                
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" >
                        <label>Bài viết nổi bật</label><br>
                        @if($data->post_featured == 1)
                            Có: <input type="radio" checked name="featured" value="1">
                            Không: <input type="radio"  name="featured" value="0">
                        @else
                            Có: <input type="radio"  name="featured" value="1">
                            Không: <input type="radio" checked name="featured" value="0">
                        @endif
                    </div>
                    {{csrf_field()}}
                    <input type="submit" name="submit" value="Edit" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.thumbnail').click(function(){
            $('.img_hidden').click();
        });
    });
</script>
@endsection