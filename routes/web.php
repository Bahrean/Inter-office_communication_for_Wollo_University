<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CollageDeanController;
use App\Http\Controllers\CollageRegistralController;
use App\Http\Controllers\DepartmentHeadController;
use App\Http\Controllers\StuffController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CollegePostController;
use App\Livewire\Chat\Chat;
use App\Livewire\Chat\Index;
use App\Livewire\Chat\ChatBox;
use App\Livewire\Users;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name(
        'profile.edit'
    );
    Route::patch('/profile', [ProfileController::class, 'update'])->name(
        'profile.update'
    );
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name(
        'profile.destroy'
    );
});

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/chat', Index::class)->name('chat.index');
    Route::get('/chat/{query}', Chat::class)->name('chat');

    Route::get('/users', Users::class)->name('users');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [
        AdminController::class,
        'AdminDashboard',
    ])->name('admin.dashboard');
    Route::get('/admin/profile', [
        AdminController::class,
        'AdminProfile',
    ])->name('admin.profile');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name(
        'admin.logout'
    );
    Route::post('/admin/profile/store', [
        AdminController::class,
        'AdminProfileStore',
    ])->name('admin.profile.store');
    Route::get('/admin/change/password', [
        AdminController::class,
        'AdminChangePassword',
    ])->name('admin.change.password');
    Route::get('/admin/chat', [AdminController::class, 'AdminChat'])->name(
        'admin.chat'
    );
    Route::get('/admin/posts', [AdminController::class, 'AdminPosts'])->name(
        'admin.posts'
    );
    Route::post('/admin/update/password', [
        AdminController::class,
        'AdminUpdatePassword',
    ])->name('admin.update.password');
    Route::get('/admin/addmember', [
        AdminController::class,
        'AdminAddMember',
    ])->name('admin.addmember');
    Route::get('/admin/showmember', [
        AdminController::class,
        'AdminShowMember',
    ])->name('admin.showmember');
    Route::post('/admin/store', [AdminController::class, 'AdminStore'])->name(
        'admin.store'
    );
    Route::get('/admin/editmember{id}', [
        AdminController::class,
        'AdminEditMember',
    ])->name('admin.editmember');
    Route::post('/admin/updatemember', [
        AdminController::class,
        'AdminUpdateMember',
    ])->name('admin.updatemember');
    Route::get('/admin/deletemember{id}', [
        AdminController::class,
        'AdminDeleteMember',
    ])->name('admin.deletemember');
    Route::get('/admin/posts2', [PostController::class, 'AdminPosts2'])->name(
        'admin.posts2'
    );
    Route::get('/admin/postcomment{post}', [
        PostController::class,
        'AdminPostComment',
    ])->name('admin.post.comment');
    Route::get('/admin/addpost', [PostController::class, 'AdminAddPost'])->name(
        'admin.addpost'
    );
    Route::get('/admin/editpost', [
        PostController::class,
        'AdminEditPost',
    ])->name('admin.editpost');
    Route::get('/admin/deletepost', [
        PostController::class,
        'AdminDeletePost',
    ])->name('admin.deletepost');
    Route::post('/admin/post/store', [
        PostController::class,
        'AdminPostStore',
    ])->name('admin.post.store');
    Route::post('/admin/statuschange{id}', [
        AdminController::class,
        'AdminStatusChange',
    ])->name('admin.statuschange');
});

Route::middleware(['auth', 'role:collage_dean'])->group(function () {
    Route::get('/collagedean/dashboard', [
        CollageDeanController::class,
        'CollageDeanDashboard',
    ])->name('collagedean.dashboard');
    Route::get('/collagedean/profile', [
        CollageDeanController::class,
        'CollageDeanProfile',
    ])->name('collagedean.profile');
    Route::get('/collagedean/chat', [
        CollageDeanController::class,
        'CollagedeanChat',
    ])->name('collagedean.chat');
    Route::get('/collagedean/logout', [
        CollageDeanController::class,
        'CollagedeanLogout',
    ])->name('collagedean.logout');
    Route::post('/collagedean/profile/store', [
        CollageDeanController::class,
        'CollagedeanProfileStore',
    ])->name('collagedean.profile.store');
    Route::get('/collagedean/change/password', [
        CollageDeanController::class,
        'CollagedeanChangePassword',
    ])->name('collagedean.change.password');
    Route::post('/collagedean/update/password', [
        CollageDeanController::class,
        'CollagedeanUpdatePassword',
    ])->name('collagedean.update.password');
    Route::get('/collagedean/posts', [
        CollageDeanController::class,
        'CollagedeanPosts',
    ])->name('collagedean.posts');
});

Route::middleware(['auth', 'role:collage_registral'])->group(function () {
    Route::get('/collageregistral/dashboard', [
        CollageRegistralController::class,
        'CollageRegistralDashboard',
    ])->name('collageregistral.dashboard');
    Route::get('/collageregistral/profile', [
        CollageRegistralController::class,
        'CollageRegistralProfile',
    ])->name('collageregistral.profile');
    Route::get('/collageregistral/chat', [
        CollageRegistralController::class,
        'CollageRegistralChat',
    ])->name('collageregistral.chat');
    Route::get('/collageregistral/logout', [
        CollageRegistralController::class,
        'CollageRegistralLogout',
    ])->name('collageregistral.logout');
    Route::post('/collageregistral/profile/store', [
        CollageRegistralController::class,
        'CollageRegistralProfileStore',
    ])->name('collageregistral.profile.store');
    Route::get('/collageregistral/change/password', [
        CollageRegistralController::class,
        'CollageRegistralChangePassword',
    ])->name('collageregistral.change.password');
    Route::post('/collageregistral/update/password', [
        CollageRegistralController::class,
        'CollageRegistralUpdatePassword',
    ])->name('collageregistral.update.password');
    Route::get('/collageregistral/posts', [
        CollageRegistralController::class,
        'CollageRegistralPosts',
    ])->name('collageregistral.posts');
});

Route::middleware(['auth', 'role:department_head'])->group(function () {
    Route::get('/departmenthead/dashboard', [
        DepartmentHeadController::class,
        'DepartmentHeadDashboard',
    ])->name('departmenthead.dashboard');
    Route::get('/departmenthead/profile', [
        DepartmentHeadController::class,
        'DepartmentHeadProfile',
    ])->name('departmenthead.profile');
    Route::get('/departmenthead/chat', [
        DepartmentHeadController::class,
        'DepartmentHeadChat',
    ])->name('departmenthead.chat');
    Route::get('/departmenthead/logout', [
        DepartmentHeadController::class,
        'DepartmentHeadLogout',
    ])->name('departmenthead.logout');
    Route::post('/departmenthead/profile/store', [
        DepartmentHeadController::class,
        'DepartmentHeadProfileStore',
    ])->name('departmenthead.profile.store');
    Route::get('/departmenthead/change/password', [
        DepartmentHeadController::class,
        'DepartmentHeadChangePassword',
    ])->name('departmenthead.change.password');
    Route::post('/departmenthead/update/password', [
        DepartmentHeadController::class,
        'DepartmentHeadUpdatePassword',
    ])->name('departmenthead.update.password');
    Route::get('/departmenthead/posts', [
        DepartmentHeadController::class,
        'DepartmentHeadPosts',
    ])->name('departmenthead.posts');
    Route::get('/departmenthead/collageposts', [
        CollegePostController::class,
        'DepartmentHeadCollagePosts',
    ])->name('departmenthead.collageposts');
    Route::get('/departmenthead/addcollegepost', [
        CollegePostController::class,
        'DepartmentHeadAddCollegePost',
    ])->name('departmenthead.addcollegepost');
    Route::post('/departmenthead/post/collegestore', [
        CollegePostController::class,
        'CollegePostStore',
    ])->name('departmenthead.post.collegestore');
});

Route::middleware(['auth', 'role:stuff'])->group(function () {
    Route::get('/stuff/dashboard', [
        StuffController::class,
        'StuffDashboard',
    ])->name('stuff.dashboard');
    Route::get('/stuff/profile', [
        StuffController::class,
        'StuffProfile',
    ])->name('stuff.profile');
    Route::get('/stuff/chat', [StuffController::class, 'StuffChat'])->name(
        'stuff.chat'
    );
    Route::get('/stuff/logout', [StuffController::class, 'StuffLogout'])->name(
        'stuff.logout'
    );
    Route::post('/stuff/profile/store', [
        StuffController::class,
        'StuffProfileStore',
    ])->name('stuff.profile.store');
    Route::get('/stuff/change/password', [
        StuffController::class,
        'StuffChangePassword',
    ])->name('stuff.change.password');
    Route::post('/stuff/update/password', [
        StuffController::class,
        'StuffUpdatePassword',
    ])->name('stuff.update.password');
    Route::get('/stuff/posts', [PostController::class, 'StuffPosts'])->name(
        'stuff.posts'
    );
    Route::get('/stuff/collageposts', [
        CollegePostController::class,
        'StuffCollagePosts',
    ])->name('stuff.collageposts');
});
