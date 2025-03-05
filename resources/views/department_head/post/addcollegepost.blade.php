@extends('department_head.department_head_dashboard')
@section('department_head')

<style>
    .form-label {
        color: white;
        font-weight: bold;
        font-size: 15px;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content" style="margin-top: 28px;">
    <div class="row profile-body">
        <!-- Middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        @php
                            $id = Auth::user()->id;
                            $profileData = App\Models\User::find($id);
                        @endphp

                        <h6 class="card-title" style="color: green; font-size: 28px;">Add New Post</h6>

                        <form class="forms-sample" method="POST" action="{{ route('departmenthead.post.collegestore') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="heading" class="form-label">Heading</label>
                                <input type="text" class="form-control @error('heading') is-invalid @enderror" 
                                       name="heading" id="heading" placeholder="Enter the post heading">
                                @error('heading')
                                    <span class="text-danger">{{ $message }}</span>
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
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                          name="description" id="description" rows="4" placeholder="Enter a description"></textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="like" class="form-label">Likes</label>
                                <input type="number" class="form-control @error('like') is-invalid @enderror" 
                                       name="like" id="like" placeholder="Enter the number of likes">
                                @error('like')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="dislike" class="form-label">Dislikes</label>
                                <input type="number" class="form-control @error('dislike') is-invalid @enderror" 
                                       name="dislike" id="dislike" placeholder="Enter the number of dislikes">
                                @error('dislike')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="comment" class="form-label">Comments</label>
                                <textarea class="form-control @error('comment') is-invalid @enderror" 
                                          name="comment" id="comment" rows="2" placeholder="Enter comments"></textarea>
                                @error('comment')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="posted_by_name" class="form-label"></label>
                                <input type="hidden" class="form-control @error('posted_by_name') is-invalid @enderror" 
                                       name="posted_by_name" id="posted_by_name" value="{{ $profileData->name }}" readonly>
                                @error('posted_by_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="posted_by_email" class="form-label"></label>
                                <input type="hidden" class="form-control @error('posted_by_email') is-invalid @enderror" 
                                       name="posted_by_email" id="posted_by_email" value="{{ $profileData->email }}" readonly>
                                @error('posted_by_email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="posted_by_photo" class="form-label"></label>
                                <input type="hidden" 
                                    name="posted_by_photo" 
                                    id="posted_by_photo" 
                                    value="{{ $profileData->photo }}">
                     
                            </div>
                          
                            <div class="mb-3">
                                <label for="posted_by_department" class="form-label"></label>
                                <input type="hidden" class="form-control @error('posted_by_department') is-invalid @enderror" 
                                       name="posted_by_department" id="posted_by_department" value="{{ $profileData->department }}" readonly>
                                @error('posted_by_department')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="posted_by_collage" class="form-label"></label>
                                <input type="hidden" class="form-control @error('posted_by_collage') is-invalid @enderror" 
                                       name="posted_by_collage" id="posted_by_collage" value="{{ $profileData->collage }}" readonly>
                                @error('posted_by_collage')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-primary me-2" style="font-size: 20px;">Add Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Middle wrapper end -->
    </div>
</div>

<script type="text/javascript">
      $(document).ready(function () {
        $('#image').change(function (e) {
          var reader =new FileReader();
          reader.onload =function(e){
            $('#showImage').attr('src',e.target.result);
          }
          reader.readAsDataURL(e.target.files['0']);
        });
      });
    </script>

@endsection
