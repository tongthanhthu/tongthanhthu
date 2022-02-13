 @extends('admin.layout.index')
@section('content')  
         <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                         @if(count($errors) > 0)
                         <div class="alert alert-danger">
                             @foreach($errors->all() as $err)
                             {{$err}}<br>
                             @endforeach
                         </div>
                         @endif
                         @if(session('thongbao'))
                         <div class="alert alert-danger">
                             {{session('thongbao')}}
                         </div>
                         @endif
                        <form action="{{route('suasp',$product->id)}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group" >
                                <label>loại sản phẩm</label>
                                    
                                <select class="form-control " name="loaisanpham" id="LoaiSanPham">
                                @foreach($producttype as $type) 
                                    <option
                                    @if($product->Product_type->id == $type->id)
                                    {{"selected"}}
                                    @endif
                                     value="{{$type->id}}">{{$type->name}}</option>
                                  
                                 @endforeach
                                </select>
                                 
                            </div>
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input class="form-control" name="name" placeholder="Nhập Tên sản phẩm" value="{{$product->name}}" />
                            </div>
                            
                            <div class="form-group">
                                <label>mô tả</label>
                                <textarea name="mota"  class="form-control ckeditor" rows="2" >{{$product->description}}</textarea>
                            </div>

                             <div class="form-group">
                                <label>nhập giá</label>
                                <input type="number" name="unit_price" value="{{$product->unit_price}}">
                            </div>
                            <div class="form-group">
                                <label>nhập giá khuyến mại</label>
                                <input type="number" name="promotion_price"value="{{$product->promotion_price}}">
                            </div>
                            <div class="form-group">
                                <label>Hình Ảnh</label>
                                <p><img width="290spx" height="250px" src="source/image/product/{{$product->image}}"></p>
                                <input type="file" name="Hinh" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Mới</label>
                                <label class="radio-inline">
                                    <input name="new" value="0" checked="" type="radio">Không
                                </label>
                                <label class="radio-inline">
                                    <input name="new" value="1" type="radio">Có
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">sửa</button>
                            <button type="reset" class="btn btn-default">Làm Mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
 @endsection
