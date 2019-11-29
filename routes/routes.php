<?php

/* Roles */
Route::get('roles', 'Tonacastelan\Roles\Controllers\RoleController@index')->name('roles.index');
Route::get('roles/create', 'Tonacastelan\Roles\Controllers\RoleController@create')->name('roles.create');
Route::post('roles', 'Tonacastelan\Roles\Controllers\RoleController@store')->name('roles.store');
Route::get('roles/{id}', 'Tonacastelan\Roles\Controllers\RoleController@show')->name('roles.show');
Route::get('roles/{role}/edit', 'Tonacastelan\Roles\Controllers\RoleController@edit')->name('roles.edit');
Route::put('roles/{role}', 'Tonacastelan\Roles\Controllers\RoleController@update')->name('roles.update');
Route::delete('roles/{role}', 'Tonacastelan\Roles\Controllers\RoleController@destroy')->name('roles.destroy');

/* Permissions */
Route::get('permissions', 'Tonacastelan\Roles\Controllers\PermissionController@index')->name('permissions.index');
Route::get('permissions/create', 'Tonacastelan\Roles\Controllers\PermissionController@create')->name('permissions.create');
Route::post('permissions', 'Tonacastelan\Roles\Controllers\PermissionController@store')->name('permissions.store');
Route::get('permissions/{id}', 'Tonacastelan\Roles\Controllers\PermissionController@show')->name('permissions.show');
Route::get('permissions/{role}/edit', 'Tonacastelan\Roles\Controllers\PermissionController@edit')->name('permissions.edit');
Route::put('permissions/{role}', 'Tonacastelan\Roles\Controllers\PermissionController@update')->name('permissions.update');
Route::delete('permissions/{role}', 'Tonacastelan\Roles\Controllers\PermissionController@destroy')->name('permissions.destroy');