        <?php

        use Illuminate\Support\Facades\Route;
        use App\Http\Controllers\Admin\LoginController;
        use App\Http\Controllers\Admin\DashboardController;
        use App\Http\Controllers\Admin\Admin_panel_settingsController;
        use App\Http\Controllers\Admin\TreasuriesController;



define('PAGINATION_COUNT',12);

Route ::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'auth:admin'],function(){
//    Route::get('logout',function(){
//     auth()->logout();
//    });
        Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');
        Route::get('logout',[LoginController::class,'logout'])->name('admin.logout');
        Route::get('/adminpanelsetting/index',[Admin_panel_settingsController::class,'index'])->name('admin.adminpanelsetting.index');
        Route::get('/adminpanelsetting/edit',[Admin_panel_settingsController::class,'edit'])->name('admin.adminpanelsetting.edit');
        Route::post('/adminpanelsetting/update',[Admin_panel_settingsController::class,'update'])->name('admin.adminpanelsetting.update');

 /*    Start Treasuries Routes    */

        Route::get('/treasuries/index', [TreasuriesController::class, 'index'])->name('admin.treasuries.index');
        Route::get('/treasuries/create', [TreasuriesController::class, 'create'])->name('admin.treasuries.create');
        Route::post('/treasuries/store', [TreasuriesController::class, 'store'])->name('admin.treasuries.store');
        Route::get('/treasuries/edit/{id}', [TreasuriesController::class, 'edit'])->name('admin.treasuries.edit');
        Route::post('/treasuries/update/{id}', [TreasuriesController::class, 'update'])->name('admin.treasuries.update');
        Route::post('/treasuries/ajax_search', [TreasuriesController::class, 'ajax_search'])->name('admin.treasuries.ajax_search');
        Route::get('/treasuries/details/{id}', [TreasuriesController::class, 'details'])->name('admin.treasuries.details');
        Route::get('/treasuries/Add_treasuries_delivery/{id}', [TreasuriesController::class, 'Add_treasuries_delivery'])->name('admin.treasuries.Add_treasuries_delivery');
        Route::post('/treasuries/store_treasuries_delivery/{id}', [TreasuriesController::class, 'store_treasuries_delivery'])->name('admin.treasuries.store_treasuries_delivery');
        Route::get('/treasuries/delete_treasuries_delivery/{id}', [TreasuriesController::class, 'delete_treasuries_delivery'])->name('admin.treasuries.delete_treasuries_delivery');


/*   End Treasuries Routes    */

});

        Route ::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'guest:admin'],function(){
        Route::get('login',[LoginController::class,'show_login_view'])->name('admin.showlogin');
        Route::post('login',[LoginController::class,'login'])->name('admin.login');
        
    });