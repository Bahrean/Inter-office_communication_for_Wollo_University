@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content" style="padding-left:15px;margin-top:25px">

<nav class="page-breadcrumb" >
    <ol class="breadcrumb">
      
       <a href="{{route('admin.addmember')}}" class="btn btn-outline-success">Add new member</a>

    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h6 class="card-title" style="color:yellow;font-size:20px">All Members</h6>

<div class="table-responsive">
  <table id="dataTableExample" class="table">
    <thead>
      <tr style="background-color:#003f00;">
            <th style="font-size:17px;color:white;font-weight:bold;">Id</th>
            <th style="font-size:17px;color:white;font-weight:bold;">Name</th>
            <th style="font-size:17px;color:white;font-weight:bold;">Username</th>
            <th style="font-size:17px;color:white;font-weight:bold;">Email</th>
            <th style="font-size:17px;color:white;font-weight:bold;">Role</th>
            <th style="font-size:17px;color:white;font-weight:bold;">Photo</th>
            <th style="font-size:17px;color:white;font-weight:bold;">Image</th>
            <th style="font-size:17px;color:white;font-weight:bold;">Phone</th>
            <th style="font-size:17px;color:white;font-weight:bold;">Address</th>
            <th style="font-size:17px;color:white;font-weight:bold;">Password</th>
            <th style="font-size:17px;color:white;font-weight:bold;">Status</th>
            <th colspan="2" style="font-size:17px;color:white;font-weight:bold;">Operations</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($types as $key=>$items)
            <tr>
            <td>{{$key+1}}</td>
            <td>{{$items->name}}</td>
            <td>{{$items->username}}</td>
            <td>{{$items->email}}</td>
            <td>{{$items->role}}</td>
            <td> <img class="wd-100 rounded-circle" src="{{(!empty($items->photo))?url('upload/admin_image/'.$items->photo):url('upload/no_image.jpg')}}" alt="profile"></td>
           
            <td>{{$items->photo}}</td>
            <td>{{$items->phone}}</td>
            <td>{{$items->address}}</td>
            <td>{{$items->password}}</td>
            
            <td>
                <form action="{{route('admin.statuschange',$items->id)}}" method="POST">
                @csrf
                    @if($items->status==='inactive')
                        <input class="btn btn-danger" type="submit" value="{{$items->status}}">
                    @endif
                    @if($items->status==='active')
                        <input class="btn btn-outline-success" type="submit" value="{{$items->status}}">
                    @endif
                </form>  
            </td>

            <td>
                <a href="{{route('admin.editmember',$items->id)}}" class="btn btn-outline-warning">Edit</a>
            </td>
            <td>
              <a href="{{route('admin.deletemember',$items->id)}}"  class="btn btn-outline-danger" id="delete">Delete</a>
            </td>
    
        </tr>
        @endforeach
  

    </tbody>
  </table>
</div>
</div>
</div>
    </div>
</div>


</div>




@endsection

