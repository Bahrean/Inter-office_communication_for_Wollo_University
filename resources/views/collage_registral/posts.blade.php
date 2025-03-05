@extends('collage_registral.collage_registral_dashboard')
@section('collage_registral')

<div class="page-content">
    <div class="d-flex align-items-start">
        <img src="..." class="wd-100 wd-sm-200 me-3" alt="...">
        <div>
            <h5 class="mb-2">Media heading</h5>
            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
        </div>
    </div>
 

    <!-- Buttons container -->
    <div class="action-buttons">
        <button type="button" class="btn btn-success">New Post</button>
        <button type="button" class="btn btn-primary">Edit Post</button>
        <button type="button" class="btn btn-danger">Delete Posts</button>
    </div>
</div>

<style>
    .action-buttons {
        position: fixed;
        bottom: 50px;
        right: 20px;
        display: flex;
        gap: 10px;
    }
</style>

@endsection
