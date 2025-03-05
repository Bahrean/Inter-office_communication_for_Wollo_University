<!DOCTYPE html>
<!--
Template Name: NobleUI - HTML Bootstrap 5 Admin Dashboard Template
Author: NobleUI
Website: https://www.nobleui.com
Portfolio: https://themeforest.net/user/nobleui/portfolio
Contact: nobleui123@gmail.com
Purchase: https://1.envato.market/nobleui_admin
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>Admin Panel For Wollo University Inter-Office Communication</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css')}}">
	<!-- core:css -->
	<link rel="stylesheet" href="{{asset('backend/assets/vendors/core/core.css')}}">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="{{asset('backend/assets/vendors/flatpickr/flatpickr.min.css')}}">
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{asset('backend/assets/fonts/feather-font/css/iconfont.css')}}">
	<link rel="stylesheet" href="{{asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
	<!-- endinject -->

    <!-- Layout styles -->  
        <link rel="stylesheet" href="{{asset('backend/assets/css/demo2/style.css')}}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.png')}}" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    </head>
<body>

        @php
                $id = Auth::user()->id;
                $profileData =App\Models\User::find($id);
        @endphp

	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->

            @include('admin.body.sidebar');
            <!-- partial -->
        
            <div class="page-wrapper" style="padding:0px;margin-top:0px">
                        
                <!-- partial:partials/_navbar.html -->
                <!-- @include('admin.body.header'); -->
                <!-- partial -->
                
    <div class=" align-items-start" style="width:100%;">
        <div style="width:100%;" class="posting_place">
            <div style="margin:15px 0px 0px 45px;padding:10px 0px 10px 40px " class="single_post">
            <h5 class="mb-2">Heading</h5>
            <div style="padding:10px">
                <img src="{{ asset('upload/wollo_university.jpg')}}" class="wd-70" alt="...">
            </div>
            
            <div style="justify-content: center;align-items: center;text-align:center;margin:0px 0px 40px 0px ">
                
                <p class="mb-2">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                
            </div>

            <form class="search-form flex-grow-1 me-2">
                <div class="input-group">
                    <input type="text" class="form-control rounded-pill" id="chatForm" placeholder="Type a comment">
                </div>
            </form>
        
            <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
            </div>

            </div>
            <from class="mb-3" >
                <a href="{{route('admin.profile')}}"><img  style="width:45px;height:45px;" class="wd-80 ht-80 rounded-circle" src="{{(!empty($profileData->photo))?url('upload/admin_image/'.$profileData->photo):url('upload/no_image.jpg')}}" alt=""></a>
                <span style="" class="tx-16 fw-bolder">{{$profileData->name}}</span>
            </form>
            <div style="margin:5px 0px 15px 00px;padding:10px 0px 30px 40px " class="single_post">
            <h5 class="mb-2">Heading</h5>
            <div style="padding:10px">
            <img src="{{ asset('upload/wollo_university.jpg')}}" class="wd-70" alt="...">
            </div>
            
            <div style="justify-content: center; 
    align-items: center;
    text-align:center; ">
                
                <p class="mb-2">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                
            </div>
            <h1> </h1>
            </div>
    
           
</div>

    </div>
      </div>
    </div>
 

    <!-- Buttons container -->
    <div class="action-buttons">
        <button type="button" class="btn btn-success" >New Post</button>
        <button type="button" class="btn btn-primary">Edit Post</button>
        <button type="button" class="btn btn-danger">Delete Posts</button>
    </div>
</div>

<style>
 
 .posting_place {
    margin:0px;
    background-image:
                linear-gradient(to right,rgb(19, 35, 70),#070d19);
    overflow-y: auto; 
    max-height: 5600px; 
    padding: 5px 15px; 
    border-radius: 8px; 
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); 
}
.single_post{
  
    background-color:#070d18;
    width: 65%;
}
.action-buttons {
    position: fixed;
    
    bottom: 22px;
    right: 20px;
    display: flex;
    gap: 10px;
}

.wd-70 {
    display: flex; /* Enable flexbox for the container */
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
    flex-direction: column;
    width: 85%; /* Set image width to 70% of the screen */
    max-height: 300px;/* Maintain aspect ratio */
}

.mb-2 {
    display: flex; /* Enable flexbox for the container */
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
    flex-direction: column;
    width: 85%;
}
</style>


                <!-- partial:partials/_footer.html -->
                <!-- partial -->
            
            </div>
        </div>

        <!-- core:js -->
        <script src="{{asset('backend/assets/vendors/core/core.js')}}"></script>
        <!-- endinject -->

        <!-- Plugin js for this page -->
    <script src="{{asset('backend/assets/vendors/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
        <!-- End plugin js for this page -->

        <!-- inject:js -->
        <script src="{{asset('backend/assets/vendors/feather-icons/feather.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/template.js')}}"></script>
        <!-- endinject -->

        <!-- Custom js for this page -->
    <script src="{{asset('backend/assets/js/dashboard-dark.js')}}"></script>

    
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>
	<!-- End custom js for this page -->

    <script src="{{asset('backend/assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('backend/assets/js/data-table.js')}}"></script>


</body>
</html>    

