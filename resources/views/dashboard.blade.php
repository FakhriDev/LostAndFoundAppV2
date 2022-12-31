
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
                                                        <h5>Claim Request</h5>
                                                        
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover">
                                                                <thead>
                                                                <tr>
                                                                    <th>Item</th>
                                                                    <th>User Request</th>
                                                                    <th>Question</th>
                                                                    <th>Answer</th>
                                                                    <th class="text-right">Status</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($claims as $resource)
                                                                <tr>
                                                                    <td>
                                                                        
                                                                        <div class="d-inline-block align-middle">
                                                                            <img src="{{url('/files/product_images/') }}/{{$resource->product->product_image}}" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                                            <div class="d-inline-block">
                                                                                <h6>{{$resource->product->product_name}}</h6>
                                                                                <p class="text-muted m-b-0">Graphics Designer</p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>{{$resource->User->name}}</td>
                                                                    <td>{{$resource->product->question}}</td>
                                                                    <td>{{$resource->answer}}</td>
                                                                    @if(($resource->status) ==='Process' && ($resource->product->status) == "Process")
                                                                    <td class="text-right">
                                                                        <div>
                                                                            <form action="approve{{$resource->product_id}}" method="post" enctype="multipart/form-data">
                                                                                {{ csrf_field() }}
                                                                                <input type="hidden" name="id" value="{{$resource->id}}">
                                                                                <button class="btn waves-effect waves-light btn-success">Approved</button>
                                                                            </form>
                                                                            <form action="cancelled{{$resource->product_id}}" method="post" enctype="multipart/form-data">
                                                                                {{ csrf_field() }}
                                                                            <button class="btn waves-effect waves-light btn-danger">Cancelled</button>
                                                                            </form>
                                                                        </div>
                                                                    </td>
                                                                    @elseif(($resource->status) ==='Process' && ($resource->product->status) == "Approved")
                                                                    <td class="text-right">
                                                                        <div>
                                                                            <form action="delete{{$resource->id}}" method="post" enctype="multipart/form-data">
                                                                                {{ csrf_field() }}
                                                                                <input type="hidden" name="id" value="{{$resource->id}}">
                                                                                <button class="btn waves-effect waves-light btn-danger">Delete</button>
                                                                            </form>
                                                                        </div>
                                                                    </td>
                                                                    @else
                                                                    <td class="text-right">
                                                                        <div>
                                                                            <label class="label label-success">{{$resource->status}}</label>

                                                                        </div>
                                                                    </td>
                                                                    @endif
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
                                   