
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
                                                        <h5>My Request</h5>
                                                        
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover">
                                                                <thead>
                                                                <tr>
                                                                    <th>Item</th>
                                                                    <th>Question</th>
                                                                    <th>Answer</th>
                                                                    <th>Contact</th>
                                                                    <th class="text-right">Status</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($claims as $claim) 
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-inline-block align-middle">
                                                                            <img src="{{url('/files/product_images/') }}/{{$claim->product->product_image}}" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                                            <div class="d-inline-block">
                                                                                <h6>{{$claim->product->product_name}}</h6>
                                                                                <p class="text-muted m-b-0">Graphics Designer</p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>{{$claim->product->question}}</td>
                                                                    <td>{{$claim->answer}}</td>
                                                                    <td>{{$claim->status}}</td>
                                                                    @if(($claim->status) ==='Approved')
                                                                    <td class="text-right">
                                                                        <label class="label label-success">{{$claim->inti->contact}}</label>
                                                                    </td>
                                                                    @else
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
                                   