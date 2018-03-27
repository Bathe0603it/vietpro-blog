@extends('backend.master')



@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="sub-header">Danh sách bài viết</h1>
    @include('errors.alert')
    <a href="{{asset('admin/post/add')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Thêm</a>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr class="bg-primary">
            <th>#</th>
            <th>Tên bài viết</th>
            <th>Danh mục</th>
            <th>Ảnh đại diện</th>
            <th>Ngày tạo</th>
            <th>Ngày sửa</th>
            <th style="width:16%">Tùy chọn</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $val)
           <tr>
            <td>{{$val->post_id}}</td>
            <td>{{$val->post_name}}</td>
            <td>{{$val->cat_name}}</td>
            <td><img width="150px" class="img-thumbnail" src="{{asset('public/upload/featured/'.$val->post_img)}}"></td>
            <td>{{$val->post_created}}</td>
            <td>{{$val->post_updated}}</td>
            <td>
              <a href="{{asset('admin/post/edit/'.$val->post_id)}}" class="btn btn-warning ">Sửa</a>
              <a onclick="return confirm('Bạn có thật lòng muốn xóa!?')" href="{{asset('admin/post/del/'.$val->post_id)}}" class="btn btn-danger ">Xóa</a>
            </td>
          </tr>
          @endforeach
         
          
        </tbody>
      </table>
      {{$data->links()}}
    </div>
  </div>
  @endsection