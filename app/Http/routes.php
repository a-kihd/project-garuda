<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'ProjectsController@index');
//Route::get('projects/paging', 'ProjectsController@paging');



/*
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

*/

Route::model('tasks', 'Task');
Route::model('projects', 'Project');
//Route::model('workers', 'Worker');

Route::resource('projects', 'ProjectsController');
Route::resource('projects.tasks', 'TasksController');
//Route::resource('projects.tasks.workers', 'WorkersController');

Route::bind('projects', function($value, $route) {
	return App\Project::whereSlug($value)->first();
});

Route::bind('tasks', function($value, $route) {
	return App\Task::whereSlug($value)->first();
});
