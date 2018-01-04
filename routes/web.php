<?php

Auth::routes();
///Route::get('/', 'HomeController@index')->name('');
Route::get('/', 'Users\Users@index')->name('');

// **************** Clients *****************************

// Clients  Add
Route::get('/clients/add', 'Client\Client@add');
Route::post('/clients/store','Client\Client@store');
// Clients  edit
Route::get('/clients/edit/{id}', ['as'=>'clients.edit','uses'=>'Client\Client@edit']);     // use like this when url send from view
Route::post('/clients/update/{id}','Client\Client@update');
// Clients  View
Route::get('/clients', 'Client\Client@index');
Route::get('/get-data-clients', ['as'=>'get.data','uses'=>'Client\Client@getData']);
// profile
Route::get('/client/profile/{id}', ['as'=>'client.profile','uses'=>'Client\Client@profile']);

// **************** User , Client And Employee *****************************

//   Check User Email
Route::POST('/check_email', ['as'=>'check_email','uses'=>'Users\Users@check_email']);
//  Delete User
Route::delete('/users_delete/{id}', ['as'=>'users_delete','uses'=>'Users\Users@destroy']);
// Change user Status
Route::post('/change_user_status/', ['as'=>'change_user_status','uses'=>'Users\Users@change_status']);

// **************** Users *****************************

// User  Add
Route::get('/users/add', 'Users\Users@add');
Route::post('/users/store','Users\Users@store');
// User  edit
Route::get('/users/edit/{id}', ['as'=>'users.edit','uses'=>'Users\Users@edit']);     // use like this when url send from view
Route::post('/users/update/{id}','Users\Users@update');
// User  View
Route::get('/users', 'Users\Users@index');
Route::get('/get-data-users', ['as'=>'get.users_data','uses'=>'Users\Users@getData']);

// **************** Skills *****************************

//skills Add
Route::get('/skills/add', 'Skills\Skills@add');
Route::post('/skills/store','Skills\Skills@store');
// skills  edit
Route::get('/skills/edit/{id}', ['as'=>'skills.edit','uses'=>'Skills\Skills@edit']);     // use like this when url send from view
Route::post('/skills/update/{id}','Skills\Skills@update');
// skills  View
Route::get('/skills', 'Skills\Skills@index');
Route::get('/get-data-skills', ['as'=>'get.skills_data','uses'=>'Skills\Skills@getData']);
//skills delete
Route::delete('/skills_delete/{id}', ['as'=>'skills_delete','uses'=>'Skills\Skills@destroy']);
// Change skills Status
Route::post('/skills_status/', ['as'=>'skills_status','uses'=>'Skills\Skills@change_status']);
Route::POST('/check_skill_name', ['as'=>'check_skill_name','uses'=>'Skills\Skills@check_skill_name']);

// ****************  Projects  *****************************

//   Add
Route::get('/projects/add', 'Projects\Projects@add');
Route::post('/projects/store','Projects\Projects@store');
//   edit
Route::get('/projects/edit/{id}', ['as'=>'projects.edit','uses'=>'Projects\Projects@edit']);     // use like this when url send from view
Route::post('/projects/update/{id}','Projects\Projects@update');
//   View
Route::get('/projects', 'Projects\Projects@index');
Route::get('/get-data-projects', ['as'=>'get.projects_data','uses'=>'Projects\Projects@getData']);
//get data for single employee and client
Route::get('/get-data-getData_me/{id}', ['as'=>'get.projects_data_me','uses'=>'Projects\Projects@getData_me']);
Route::get('/get-data-getData_for_cl/{id}', ['as'=>'get.getData_for_cl','uses'=>'Projects\Projects@getData_for_cl']);
//   delete
Route::delete('/projects_delete/{id}', ['as'=>'projects_delete','uses'=>'Projects\Projects@destroy']);
//   Change Status
Route::post('/projects_status/', ['as'=>'projects_status','uses'=>'Projects\Projects@change_status']);
Route::post('/projects_pay_status/', ['as'=>'projects_pay_status','uses'=>'Projects\Projects@change_payment_status']);
Route::POST('/check_projects_name', ['as'=>'check_projects_name','uses'=>'Projects\Projects@check_Projects_name']);


// **************** Employee *******************************
//add
Route::get('/employee/add', 'Employee\Employee@add');
Route::post('/employee/store','Employee\Employee@store');
//   edit
Route::get('/employee/edit/{id}', ['as'=>'employee.edit','uses'=>'Employee\Employee@edit']);     // use like this when url send from view
Route::post('/employee/update/{id}','Employee\Employee@update');
//   View
Route::get('/employee', 'Employee\Employee@index');
Route::get('/get-data-employee', ['as'=>'get.employee_data','uses'=>'Employee\Employee@getData']);
// profile
Route::get('/employee/profile/{id}', ['as'=>'employee.profile','uses'=>'Employee\Employee@profile']);



//  ****************  Tasks  ********************************

//   Add
Route::get('/tasks/add', 'Tasks\Tasks@add');
Route::post('/tasks/store','Tasks\Tasks@store');

//   edit
Route::get('/tasks/edit/{id}', ['as'=>'tasks.edit','uses'=>'Tasks\Tasks@edit']);     // use like this when url send from view
Route::post('/tasks/update/{id}','Tasks\Tasks@update');
//   View
Route::get('/tasks', 'Tasks\Tasks@index');
Route::get('/get-data-tasks', ['as'=>'get.tasks_data','uses'=>'Tasks\Tasks@getData']);
//   delete
Route::delete('/tasks_delete/{id}', ['as'=>'tasks_delete','uses'=>'Tasks\Tasks@destroy']);
//   Change Status
Route::post('/tasks_status/', ['as'=>'tasks_status','uses'=>'Tasks\Tasks@change_status']);
Route::post('/tasks_pay_status/', ['as'=>'tasks_pay_status','uses'=>'Tasks\Tasks@change_payment_status']);
Route::POST('/check_tasks_name', ['as'=>'check_tasks_name','uses'=>'Tasks\Tasks@check_tasks_name']);


// **************** Leaves *******************************

Route::get('/leave/apply', 'Leave\Leave@add');
Route::post('/leave/store','Leave\Leave@store');
//  edit
Route::get('/leave/edit/{id}', ['as'=>'leave.edit','uses'=>'Leave\Leave@edit']);     // use like this when url send from view
Route::post('/leave/update/{id}','Leave\Leave@update');
//   View
Route::get('/leave', 'Leave\Leave@index');
Route::get('/get-data-leave', ['as'=>'get.leave_data','uses'=>'Leave\Leave@getData']);
// approve
Route::post('/approve_leave','Leave\Leave@approve_leave');
// delete
Route::delete('/leave_delete/{id}', ['as'=>'leave_delete','uses'=>'Leave\Leave@destroy']);

// **************** Salary *******************************

Route::get('/salary/new_transaction', 'Salary\Salary@add');
Route::post('/salary/store','Salary\Salary@store');
//  edit
Route::get('/salary/edit/{id}', ['as'=>'salary.edit','uses'=>'Salary\Salary@edit']);     // use like this when url send from view
Route::post('/salary/update/{id}','Salary\Salary@update');
//   View salary transactions
Route::get('/salary/transactions', 'Salary\Salary@index');
Route::get('/get-data-salary', ['as'=>'get.salary_data','uses'=>'Salary\Salary@getData']);
// view Employees Increment Due
Route::get('/salary/increment_due', 'Salary\Salary@increment_due');
Route::get('/get-data-increment_due_data', ['as'=>'get.increment_due_data','uses'=>'Salary\Salary@increment_due_data']);
// delete
Route::delete('salary/destroy/{id}', ['as'=>'destroy','uses'=>'Salary\Salary@destroy']);
// change status
//   Change Status
Route::post('salary/change_status', ['as'=>'change_status','uses'=>'Salary\Salary@change_status']);
Route::post('salary/increase_salary', ['as'=>'increase_salary','uses'=>'Salary\Salary@increase_salary']);

//    Settings
// update Logo
Route::get('settings/logo', 'Settings\Setting@logo');
Route::post('/settings/update/{id}','Settings\Setting@update');



// ****************  Milestones  *****************************

//   Add
Route::get('/milestones/add', 'Milestones\Milestones@add');
Route::post('/milestones/store','Milestones\Milestones@store');
//   edit
Route::get('/milestones/edit/{id}', ['as'=>'milestones.edit','uses'=>'Milestones\Milestones@edit']);     // use like this when url send from view
Route::post('/milestones/update/{id}','Milestones\Milestones@update');
//   View
Route::get('/milestones', 'Milestones\Milestones@index');
Route::get('/get-data-milestones', ['as'=>'get.milestones_data','uses'=>'Milestones\Milestones@getData']);
//get data for single employee and client
Route::get('/get-data-getData_me/{id}', ['as'=>'get.milestones_data_me','uses'=>'Milestones\Milestones@getData_me']);
Route::get('/get-data-getData_for_cl/{id}', ['as'=>'get.getData_for_cl','uses'=>'Milestones\Milestones@getData_for_cl']);
//   delete
Route::delete('/milestones_delete/{id}', ['as'=>'milestones_delete','uses'=>'Milestones\Milestones@destroy']);
//   Change Status
Route::post('/milestones_status/', ['as'=>'milestones_status','uses'=>'Milestones\Milestones@change_status']);
Route::post('/milestones_pay_status/', ['as'=>'milestones_pay_status','uses'=>'Milestones\Milestones@change_payment_status']);
Route::POST('/check_milestones_name', ['as'=>'check_milestones_name','uses'=>'Milestones\Milestones@check_Milestones_name']);

