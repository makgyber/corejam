<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth']], function () {
    Route::get('/setpassword', 'SetPasswordController@create')->name('setpassword');
    Route::post('/setpassword','SetPasswordController@store')->name('setpassword.store');
}); 

Route::get('/qrcode', 'MemberController@qrCode')->name('member.qrcode');
Route::get('/registration', 'MemberController@selfRegister')->name('member.selfregister');
Route::post('/registration', 'MemberController@selfStore')->name('member.selfStore');
Route::get('/provinces', 'LocationsController@provinces');
            Route::get('/cities', 'LocationsController@cities');
            Route::get('/barangays', 'LocationsController@barangays');
            Route::get('/states', 'LocationsController@states');
            Route::get('/worldcities', 'LocationsController@worldCities');

Route::prefix('/cms')->group(function() {  
    Auth::routes();

    Route::group(['middleware' => ['get.menu', 'auth']], function () {
        
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::get('/stats', 'DashboardController@stats')->name('stats');

        Route::post('/avatar', 'AvatarController@store')->name('avatar');

        Route::group(['prefix' => 'messages'], function () {
            Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
            Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
            Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
            Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
            Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
        });

        //  Route::group(['middleware' => ['role:coordinator', 'auth']], function () {
            Route::get('/faq/{slug}', 'FaqController@show')->name('faq');
            Route::resource('targets', 'TargetController');
            Route::get('/targets/{target}/activities', 'ActivityController@index')->name('activities.index');
            Route::get('/targets/{target}/activities/create', 'ActivityController@index')->name('activities.create');
            Route::get('/targets/{target}/activities', 'ActivityController@index')->name('activities.index');
            Route::post('/targets/{target}/activities', 'ActivityController@store')->name('activities.store');
            Route::get('/targets/{target}/activities/create', 'ActivityController@create')->name('activities.create');
            Route::put('/targets/{target}/activities/{activity}', 'ActivityController@update')->name('activities.update');
            Route::delete('/targets/{target}/activities/{activity}', 'ActivityController@destroy')->name('activities.delete');
            Route::get('/targets/{target}/activities/{activity}/edit', 'ActivityController@edit')->name('activities.edit');
            
            Route::prefix('notifications')->group(function () {  
                Route::get('/alerts', function(){   return view('dashboard.notifications.alerts'); });
                Route::get('/badge', function(){    return view('dashboard.notifications.badge'); });
                Route::get('/modals', function(){   return view('dashboard.notifications.modals'); });
            });
            Route::resource('notes', 'NotesController');
            Route::prefix('/profile')->group(function(){
                Route::get('/', 'ProfileController@index')->name('profile.index');
                Route::get('/edit', 'ProfileController@edit')->name('profile.edit');
                Route::get('/show-change-password', 'ProfileController@showChangePassword')->name('profile.show-change-password');
                Route::post('/change-password', 'ProfileController@changePassword')->name('profile.change-password');
                Route::put('/', 'ProfileController@store')->name('profile.store');
            });
            
            
            Route::post('members/import', 'MemberController@import')->name('members.import');
            Route::resource('affiliations',  'AffiliationController');
            Route::resource('members',  'MemberController');

            Route::get('/provinces', 'LocationsController@provinces');
            Route::get('/cities', 'LocationsController@cities');
            Route::get('/barangays', 'LocationsController@barangays');
            Route::get('/states', 'LocationsController@states');
            Route::get('/worldcities', 'LocationsController@worldCities');
        // });


        Route::resource('resource/{table}/resource', 'ResourceController')->names([
            'index'     => 'resource.index',
            'create'    => 'resource.create',
            'store'     => 'resource.store',
            'show'      => 'resource.show',
            'edit'      => 'resource.edit',
            'update'    => 'resource.update',
            'destroy'   => 'resource.destroy'
        ]);



            Route::resource('bread',  'BreadController');   //create BREAD (resource)
            Route::get('coordinators/view-as/{id}', 'UsersController@impersonate')->name('impersonate');
            Route::get('coordinators/show-invite/{id}', 'UsersController@showInvite')->name('coordinators.show-invite');
            Route::post('coordinators/re-invite', 'UsersController@reInvite')->name('coordinators.re-invite');
            Route::post('coordinators/send-invite', 'UsersController@sendInvite')->name('coordinators.send-invite');
            Route::post('coordinators/import', 'UsersController@import')->name('coordinators.import');
            Route::get('coordinators/show-role/{id}', 'UsersController@showRole')->name('coordinators.show-role');
            Route::put('coordinators/assign-role/{id}', 'UsersController@assignRole')->name('coordinators.assign-role');
            Route::resource('coordinators',        'UsersController');
            Route::resource('users',        'UsersController');
            Route::resource('roles',        'RolesController');
            Route::resource('mail',        'MailController');
            Route::get('/objectives', 'ObjectivesController@index')->name('objectives.index');
            Route::get('/objectives/activities/{id}/edit', 'ObjectivesController@edit')->name('objectives.edit');
            Route::put('/objectives/activities/{id}', 'ObjectivesController@update')->name('objectives.update');

            Route::get('prepareSend/{id}',        'MailController@prepareSend')->name('prepareSend');
            Route::post('mailSend/{id}',        'MailController@send')->name('mailSend');
            Route::get('/roles/move/move-up',      'RolesController@moveUp')->name('roles.up');
            Route::get('/roles/move/move-down',    'RolesController@moveDown')->name('roles.down');
            Route::prefix('menu/element')->group(function () { 
                Route::get('/',             'MenuElementController@index')->name('menu.index');
                Route::get('/move-up',      'MenuElementController@moveUp')->name('menu.up');
                Route::get('/move-down',    'MenuElementController@moveDown')->name('menu.down');
                Route::get('/create',       'MenuElementController@create')->name('menu.create');
                Route::post('/store',       'MenuElementController@store')->name('menu.store');
                Route::get('/get-parents',  'MenuElementController@getParents');
                Route::get('/edit',         'MenuElementController@edit')->name('menu.edit');
                Route::post('/update',      'MenuElementController@update')->name('menu.update');
                Route::get('/show',         'MenuElementController@show')->name('menu.show');
                Route::get('/delete',       'MenuElementController@delete')->name('menu.delete');
            });
            Route::prefix('menu/menu')->group(function () { 
                Route::get('/',         'MenuController@index')->name('menu.menu.index');
                Route::get('/create',   'MenuController@create')->name('menu.menu.create');
                Route::post('/store',   'MenuController@store')->name('menu.menu.store');
                Route::get('/edit',     'MenuController@edit')->name('menu.menu.edit');
                Route::post('/update',  'MenuController@update')->name('menu.menu.update');
                Route::get('/delete',   'MenuController@delete')->name('menu.menu.delete');
            });
            Route::prefix('media')->group(function () {
                Route::get('/',                 'MediaController@index')->name('media.folder.index');
                Route::get('/folder/store',     'MediaController@folderAdd')->name('media.folder.add');
                Route::post('/folder/update',   'MediaController@folderUpdate')->name('media.folder.update');
                Route::get('/folder',           'MediaController@folder')->name('media.folder');
                Route::post('/folder/move',     'MediaController@folderMove')->name('media.folder.move');
                Route::post('/folder/delete',   'MediaController@folderDelete')->name('media.folder.delete');;

                Route::post('/file/store',      'MediaController@fileAdd')->name('media.file.add');
                Route::get('/file',             'MediaController@file');
                Route::post('/file/delete',     'MediaController@fileDelete')->name('media.file.delete');
                Route::post('/file/update',     'MediaController@fileUpdate')->name('media.file.update');
                Route::post('/file/move',       'MediaController@fileMove')->name('media.file.move');
                Route::post('/file/cropp',      'MediaController@cropp');
                Route::get('/file/copy',        'MediaController@fileCopy')->name('media.file.copy');
            });
        // });
    });
});

Route::get('invitation/{user}', 'SetPasswordController@invitation')->name('invitation');
Route::get('/', 'PageController@index')->name('index');
// Route::get('/{page}', 'PageController@page')->name('page');