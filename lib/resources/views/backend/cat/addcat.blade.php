@extends('backend.master')



@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="sub-header">Thêm danh mục</h1>

  <div class="row">
    @include('errors.alert')
      <form class="form-inline" method="post">
          <div class="form-group">
            <input type="text" autofocus name="name" required class="form-control" placeholder="Tên danh mục">
          </div>
          {{csrf_field()}}
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Thêm Mới</button>
          </div>
      </form>
  </div>
</div>
@endsection