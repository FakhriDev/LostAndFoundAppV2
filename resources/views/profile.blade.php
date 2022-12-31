
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
                                                <h5>Profile</h5>

                                            </div>
                                            <div class="card-block">
                                                <h4 class="sub-title">View Profile</h4>
                                            
                                                    <div class="form-group row">
                                                        <div class="col-sm-2">
                                                            <label><b>Name</b></label><br>
                                                            <label>{{Auth::user()->name}}</label>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <label><b>Contact</b></label><br>
                                                            <label>{{Auth::user()->contact}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6">
                                                            <label><b>E-mail</b></label><br>
                                                            {{Auth::user()->email}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6">
                                                            
                                                        </div>
                                                    </div>
                                    
                                                
                                                <h4 class="sub-title">Edit Profile</h4>
                                                <form method="post" action="/updateuser" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    <div class="form-group row">
                                                        <div class="col-sm-6">
                                                            <label><b>Name</b></label>
                                                            <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}"
                                                            placeholder="">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label><b>Contact</b></label>
                                                            <input type="text" class="form-control" name="contact" value="{{Auth::user()->contact}}"
                                                            placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6">
                                                            <label><b>E-Mail</b></label>
                                                            <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}"
                                                            placeholder="">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label><b>Password</b></label>
                                                            <input type="password" class="form-control" name="password" 
                                                            placeholder="Input password to create new password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6">
                                                            <label><b>Photo</b></label>
                                                            <input name="photo" type="file" class="form-control form-control-lg" id="colFormLabelLg"  value=""  title ="">
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
                                   