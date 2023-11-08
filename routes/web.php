<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;


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

Route::get('/config-clear', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return '<h1>Configurations cleared</h1>';
});
Route::middleware('auth:api')->get('api/userAuthCheck', function (Request $request) {
    return $request->user();
});
Auth::routes();
Route::get('javascript', array('as'=>'setUrl', 'uses'=>'AdapterController@javascript'));
//File Upload //

Route::post('customFileUpload', array('as' => 'custom.fileUpload', 'uses' => 'FileUploadController@fileUpload'));
Route::post('customFileUnlink', array('as' => 'custom.fileUnlink', 'uses' => 'FileUploadController@fileUnlink'));
Route::get('multipleFileUnlink', array('as' => 'custom.multipleFileUnlink', 'uses' => 'FileUploadController@multipleFileUnlink'));
// Front end //
Route::group(['namespace' => 'web'], function (){
    //leadvas
    Route::get('demo', array('as' => 'demo', 'uses' => 'HomeController@demo'));
	// Route::group(['middleware' => 'userAutoLogin'], function () {
        Route::get('login', array('as' => 'login', 'uses' => 'HomeController@getLogin'));
	    Route::post('loginAction', array('as'=>'loginAction', 'uses'=>'HomeController@loginAction'));
    // });
    //old
    Route::get('memberAdd', array('access' => ['resource|leads.create'], 'uses' => 'LeadController@add'));
    Route::post('memberAdd', array('access' => ['resource|leads.create'], 'uses' => 'LeadController@storeAdd'));

    Route::get('/', array('as'=>'home', 'uses'=>'HomeController@index'));
    // how it works
    Route::get('/how-work', array('as'=>'how_work', 'uses'=>'WorkController@index'));
    // contact
    Route::get('/contact-us', array('as'=>'contact', 'uses'=>'ContactController@index'));
    // about us
    Route::get('/about-us', array('as'=>'aboutUs', 'uses'=>'AboutUsController@index'));
    // user account
    Route::get('user_account', array('as'=>'user_account', 'uses'=>'UserAccountController@index'));
    Route::post('user_accountAction', array('as'=>'user_accountAction', 'uses'=>'UserAccountController@user_accountAction'));
    //email verify
    Route::get('/email-message', array('as'=>'emailMessage', 'uses'=>'UserAccountController@emailMessage'));
    Route::get('/set-password/{token}', array('as'=>'setPassword', 'uses'=>'UserAccountController@setPassword'));
    Route::post('/save-password', array('as'=>'savePassword', 'uses'=>'UserAccountController@savePassword'));
    //user log in
    Route::post('/save-password', array('as'=>'savePassword', 'uses'=>'UserAccountController@savePassword'));
     // Place Order
     Route::get('placeorder', array('as'=>'placeorder', 'uses'=>'PlaceOrderController@index'));
});
    ## Create registration
    Route::get('/registration/create', 'RegistrationController@create')->name('registration.create');
    Route::post('/registration/store', 'RegistrationController@store')->name('registration.store');
    // EMAIL VERIFICATION
Route::get('accountVerification/{user_token}', array('as'=>'accountVerification','uses'=>'AccountVerifyController@accountVerification'));
Route::post('accountVerificationAction', array('as'=>'accountVerificationAction','uses'=>'AccountVerifyController@accountVerificationAction'));

Route::get('jwtTokenToUserInfo', array('as'=>'jwtTokenToUserInfo','uses'=>'JwtTokenInfoController@jwtTokenToUserInfo'));