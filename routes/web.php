<?php

use Illuminate\Support\Facades\Route;

Route::get('/',                                 ['as' => 'frontend.index',      'uses' => 'Frontend\IndexController@index']);


// Authentication Routes...
// Route::get('/login',                            ['as' => 'show_login_form',        'uses' => 'Frontend\Auth\LoginController@showLoginForm']);
// Route::post('login',                            ['as' => 'login',                  'uses' => 'Frontend\Auth\LoginController@login']);
// Route::post('logout',                           ['as' => 'frontend.logout',                 'uses' => 'Frontend\Auth\LoginController@logout']);
// Route::get('register',                          ['as' => 'show_register_form',     'uses' => 'Frontend\Auth\RegisterController@showRegistrationForm']);
// Route::post('register',                         ['as' => 'register',               'uses' => 'Frontend\Auth\RegisterController@register']);
// Route::get('password/reset',                    ['as' => 'password.request',                'uses' => 'Frontend\Auth\ForgotPasswordController@showLinkRequestForm']);
// Route::post('password/email',                   ['as' => 'password.email',                  'uses' => 'Frontend\Auth\ForgotPasswordController@sendResetLinkEmail']);
// Route::get('password/reset/{token}',            ['as' => 'password.reset',                  'uses' => 'Frontend\Auth\ResetPasswordController@showResetForm']);
// Route::post('password/reset',                   ['as' => 'password.update',                 'uses' => 'Frontend\Auth\ResetPasswordController@reset']);
// Route::get('email/verify',                      ['as' => 'verification.notice',             'uses' => 'Frontend\Auth\VerificationController@show']);
// Route::get('/email/verify/{id}/{hash}',         ['as' => 'verification.verify',             'uses' => 'Frontend\Auth\VerificationController@verify']);
// Route::post('email/resend',                     ['as' => 'verification.resend',             'uses' => 'Frontend\Auth\VerificationController@resend']);


// Route::group(['prefix' => 'admin'], function () {
//     Route::get('/login',                            ['as' => 'backend.show_login_form',        'uses' => 'Backend\Auth\LoginController@showLoginForm']);
//     Route::post('login',                            ['as' => 'backend.login',                  'uses' => 'Backend\Auth\LoginController@login']);
//     Route::post('logout',                           ['as' => 'backend.logout',                 'uses' => 'Backend\Auth\LoginController@logout']);
//     Route::get('password/reset',                    ['as' => 'backend.password.request',       'uses' => 'Backend\Auth\ForgotPasswordController@showLinkRequestForm']);
//     Route::post('password/email',                   ['as' => 'backend.password.email',         'uses' => 'Backend\Auth\ForgotPasswordController@sendResetLinkEmail']);
//     Route::get('password/reset/{token}',            ['as' => 'backend.password.reset',         'uses' => 'Backend\Auth\ResetPasswordController@showResetForm']);
//     Route::post('password/reset',                   ['as' => 'backend.password.update',        'uses' => 'Backend\Auth\ResetPasswordController@reset']);
//     Route::get('email/verify',                      ['as' => 'backend.verification.notice',    'uses' => 'Backend\Auth\VerificationController@show']);
//     Route::get('/email/verify/{id}/{hash}',         ['as' => 'backend.verification.verify',    'uses' => 'Backend\Auth\VerificationController@verify']);
//     Route::post('email/resend',                     ['as' => 'backend.verification.resend',    'uses' => 'Frontend\Auth\VerificationController@resend']);
// });


Route::get('/contact-us',                           ['as' => 'frontend.contact',           'uses' => 'Frontend\IndexController@contact']);
Route::post('/contact-us',                           ['as' => 'frontend.do_contact',   'uses' => 'Frontend\IndexController@do_contact']);


// Route::get('/{page}',                           ['as' => 'page.show',           'uses' => 'Frontend\IndexController@page_show']);

Route::get('/{post}',                           ['as' => 'post.show',           'uses' => 'Frontend\IndexController@post_show']);
Route::post('/{post}',                           ['as' => 'post.add.comment',   'uses' => 'Frontend\IndexController@store_comment']);
