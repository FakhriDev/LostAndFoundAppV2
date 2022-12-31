
    @extends('layouts.app')
    @section('content')
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <!-- task, page, download counter  start -->
                                            <!--  sale analytics start -->
                                            <!--  project and team member start -->
                                            <div class="col-md-12">
                                                <div class="card table-card">
                                                    <div class="card-header">
                                                        <h5>My Ads</h5>
                                                        
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover">
                                                                <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Category</th>
                                                                    <th>Description</th>
                                                                    <th>Question</th>
                                                                    <th class="text-right">Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($products as $product) 
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-inline-block align-middle">
                                                                            <img src="{{url('/files/product_images/') }}/{{$product->product_image}}" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                                            <div class="d-inline-block">
                                                                                <h6>{{$product->product_name}}</h6>
                                                                                <p class="text-muted m-b-0">Graphics Designer</p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>{{$product->Category->category_name}}</td>
                                                                    <td>{{$product->product_description}}</td>
                                                                    <td>{{$product->question}}</td>
                                                                    
                                                                    <td class="text-right">
                                                                        <a href="editads{{$product['id']}}" class="btn waves-effect waves-light btn-primary btn-icon"><i class="ti-pencil"></i></a>
                                                                        <a href="/details{{$product['id']}}" class="btn waves-effect waves-light btn-info btn-icon"><i class="ti-eye"></i></a>
                                                                        <a href="/delete/{{$product['id']}}" class="btn waves-effect waves-light btn-danger btn-icon"><i class="ti-trash"></i></a>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--  project and team member end -->
                                        </div>
                                    </div>
        @endsection
                                   