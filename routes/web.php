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

Route::get('/', [
	'uses' => 'RuleController@welcome',
	'as' => 'welcome'
]);

Route::post('/rule', [
	'uses' => 'RuleController@getRule',
	'as' => 'get_rule'
]);

Route::post('/custom-rule', [
	'uses' => 'RuleController@getCustomRule',
	'as' => 'get_custom_rule'
]);

Route::get('/create-rule', [
	'uses' => 'RuleController@createRule',
	'as' => 'create_rule'
]);

Route::post('/create-rule-submit', [
	'uses' => 'RuleController@createRuleSubmit',
	'as' => 'create_rule_submit'
]);
