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

//Route::get('/test', "working");

Route::get('/', 'ConceptNodeController@getSearchPage');
Route::get('concept_node/view/{id}', 'ConceptNodeController@fetchConceptNodeView');

Route::get('/add_concept_node', function () {
	return view('add_concept_node');
});

Route::get('/sign_up', function () {
    return view('sign_up');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/login_sign_up', function () {
    return view('login_sign_up');
});


Route::get('/editor', function () {
    return view('editor');
});

Route::get('/add_super_user', function () {
    return view('add_super_user');
});

Route::get('/add_admin', function () {
    return view('add_admin');
});

Route::get('/profile', 'UserController@getProfileView');


Route::get('/concept_nodes/view/{id}', 'ConceptNodeController@getConceptNodeView');
Route::get('concept_nodes', 'ConceptNodeController@fetchConceptNodes');
Route::get('concept_nodes/create_view', 'ConceptNodeController@getCreateView');  //todo
Route::post('concept_nodes/create', 'ConceptNodeController@create');
Route::post('concept_nodes/create_from_view', 'ConceptNodeController@createFromView');
Route::get('concept_nodes/user/added_view', 'ConceptNodeController@getAddedView');
Route::get('concept_nodes/edit_concept_node_view/{id}', 'ConceptNodeController@getEditConceptNodeView');
Route::post('concept_nodes/edit_from_view/{id}', 'ConceptNodeController@editConceptNodeFromView');
Route::get('concept_nodes/search/user', 'ConceptNodeController@searchConceptNodesByUser');
Route::get('concept_nodes/search/{keyword}', 'ConceptNodeController@searchConceptNodes');
Route::get('concept_nodes/search/', 'ConceptNodeController@fetchConceptNodes');
Route::get('concept_nodes/{id}', 'ConceptNodeController@fetchConceptNode');
Route::get('concept_nodes/concept_node_submissions/{id}', 'ConceptNodeController@getConceptNodeSubmission');

Route::get('dependencies/get_add_dependency_view/{id}', 'DependencyController@getAddDependencyView');
Route::post('dependencies/get_add_dependency_view/{id}/{dependencyId}', 'DependencyController@addDependency');

Route::get("/*", function() {
    ob_start();
    require(path("public")."testFile.php");
    return ob_get_clean();
});

Route::post('code/test/{nodeId}', 'CodeController@test');

Route::post('code/submit/{nodeId}', 'CodeController@submit');

Route::post('user', 'UserController@create');
Route::post('user/login', 'UserController@check');
Route::post('user/logout', 'UserController@logout');
Route::post('user/promote_to_admin/{email}', 'UserController@promoteToAdmin');
Route::post('user/promote_to_super_user/{email}', 'UserController@promoteToSuperUser');



// tasks
Route::post('tasks', 'TaskController@create');
Route::get('tasks', 'TaskController@fetchAll');
Route::get('task/concept_node/{concept_node_id}', 'TaskController@getTasksForConceptNode');
Route::get('tasks/{id}', 'TaskController@fetch');
Route::get('tasks/get_add_task_view/{conceptNodeId}', 'TaskController@getAddTaskView');
Route::post('tasks/tasks/create_from_view/{conceptNodeId}', 'TaskController@createFromView');
Route::get('tasks/{id}/get_view', 'TaskController@fetchView');
Route::get('tasks/all_tasks/view/{conceptNodeId}', 'TaskController@getAllTasksViewForConceptNode');
Route::get('tasks/edit_view/{id}', 'TaskController@getEditView');
Route::post('tasks/edit_from_view/{id}', 'TaskController@editFromView');
Route::get('tasks/submissions/{id}', 'TaskController@fetchTaskSubmission');


Auth::routes();

