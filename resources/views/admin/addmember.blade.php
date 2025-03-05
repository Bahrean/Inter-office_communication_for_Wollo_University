@extends('admin.admin_dashboard')
@section('admin')

<style>
    .form-label{
        color:white;
        font-weight:bold;
        font-size:15px;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content" style="margin-top:28px;">

<div class="row profile-body">
  <!-- left wrapper start -->

  <!-- left wrapper end -->
  <!-- middle wrapper start -->
  <div class="col-md-8 col-xl-8 middle-wrapper">
    <div class="row">
    <div class="card">
              <div class="card-body">

								<h6 class="card-title" style="color:green;font-size:28px">Add new member</h6>

								<form class="forms-sample" method="POST" action="{{route('admin.store')}}" enctype='multipart/form-data'>
								@csrf	
          
									<div class="mb-3">
										<label for="exampleInputEmail1" class="form-label">Name</label>
										<input type="text" class="form-control" name="name" @error('name') is-invaliid @enderror  placeholder="name">
                                        @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
										<label for="exampleInputEmail1" class="form-label">Email</label>
										<input type="text" class="form-control" name="email" @error('email') is-invaliid @enderror  placeholder="email">
      
                                        @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
										<label for="exampleInputEmail1" class="form-label">Password</label>
										<input type="text" class="form-control" name="password" @error('password') is-invaliid @enderror  placeholder="password">
                                        @error('password')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
										<label for="exampleInputEmail1" class="form-label">Username</label>
										<input type="text" class="form-control" name="username" @error('username') is-invaliid @enderror  placeholder="Username">
                                        @error('username')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
										<label for="exampleInputEmail1" class="form-label">Gender</label>
							
                                        <select class="form-control" name="gender" @error('gender') is-invaliid @enderror>
                                            <option selected disabled="">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                    
                                        </select>
                                        @error('gender')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
										<label for="exampleInputEmail1" class="form-label">Photo</label>
										
                                        <input class="form-control" name="photo" type="file" @error('photo') is-invaliid @enderror  placeholder="photo" id="image">
                                        @error('photo')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
										<label for="exampleInputEmail1" class="form-label">Phone</label>
										<input type="text" class="form-control" name="phone" @error('phone') is-invaliid @enderror  placeholder="phone">
                                        @error('phone')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
										<label for="exampleInputEmail1" class="form-label">Collage</label>
										<input type="text" class="form-control" name="collage" @error('collage') is-invaliid @enderror  placeholder="collage">
                                        @error('collage')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
										<label for="exampleInputEmail1" class="form-label">Department</label>
										<input type="text" class="form-control" name="department" @error('department') is-invaliid @enderror  placeholder="department">
                                        @error('department')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
										<label for="exampleInputEmail1" class="form-label">Address</label>
										<input type="text" class="form-control" name="address" @error('address') is-invaliid @enderror  placeholder="address">
                                        @error('address')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
										<label for="exampleInputEmail1" class="form-label">Role</label>
										<!-- <input type="text" class="form-control" name="role" @error('role') is-invaliid @enderror  placeholder="role"> -->

                                        <select class="form-control" name="role" @error('role') is-invaliid @enderror>
                                            <option selected disabled="">Select Role</option>
                                            <option value="admin">admin</option>
                                            <option value="collage_dean">collage_dean</option>
                                            <option value="collage_registral">collage_registral</option>
                                            <option value="department_head">department_head</option>
                                            <option value="stuff">stuff</option>
                                        </select>

                                        @error('role')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
										<label for="exampleInputEmail1" class="form-label">Status</label>
							
                                        <select class="form-control" name="status" @error('status') is-invaliid @enderror>
                                            <option selected disabled="">Select Status</option>
                                            <option value="male">Active</option>
                                            <option value="female">Inactive</option>
                                    
                                        </select>
                                        @error('status')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>


									<button type="submit" class="btn btn-primary me-2" style="font-size:20px;">Add member</button>
		
								</form>

              </div>
            </div>
    
    </div>
  </div>
  <!-- middle wrapper end -->
  <!-- right wrapper start -->

  <!-- right wrapper end -->
</div>

    </div>


@endsection