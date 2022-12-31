
    @extends('layouts.app')
    @section('content')
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <!-- Input Grid card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Edit Ads</h5>

                                            </div>
                                            <div class="card-block">

                                                <h4 class="sub-title">Edit Ads</h4>
                                                <form method="post" action="/saveEditPost" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="id" value="{{ $products->id }}">
                                                    <div class="form-group row">
                                                        <div class="col-sm-6">
                                                            <label><b>Type Ads</b></label>
                                                                <select name="type" class="form-control">
                                                                    @foreach ($types as $type)
                                                                    <option value="{{$type->id}}"{{$type->type == $type->id  ? 'selected' : ''}}>{{$type->type}}</option>   
                                                                    @endforeach    
                                                                </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label><b>Name Ads</b></label>
                                                            <input type="text" class="form-control" name="product_name" value="{{ $products->product_name }}"
                                                            placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6">
                                                            <label><b>Description</b></label>
                                                            <input type="text" class="form-control" name="product_description" value="{{$products->product_description}}"
                                                            placeholder="">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label><b>Categories</b></label>
                                                            <select name="category" class="form-control">
                                                                @foreach ($categories as $category)
                                                                <option value="{{$category->id}}"{{$category->category_name == $category->id  ? 'selected' : ''}}>{{$category->category_name}}</option>   
                                                                @endforeach    
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6">
                                                            <label><b>Question for Claimer</b></label>
                                                            <input name="question" type="text" class="form-control form-control-lg" id="colFormLabelLg"  value="{{$products->question}}"  title ="">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label><b>Image</b></label>
                                                            <input type="file" class="form-control" name="product_image"  >
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6">
                                                        <button type="submit" class="btn btn-primary"><i class="icofont icofont-user-alt-5"></i>Update Profile</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- Input Grid card end -->
                                    </div>
        @endsection
                                   