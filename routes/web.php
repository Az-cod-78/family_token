<?php

use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
Route::get('/clear', function () {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
});

Route::get('cron', 'CronController@cron')->name('cron');









Route::get('/import', function(){
    $file = fopen(public_path().'/ft_editable.csv', 'r');
    $header = fgetcsv($file);
    while ($row = fgetcsv($file)) {
        $data = array_combine($header, $row);
        //Check if username already exists
        $user = DB::table('users')->where('username', $data['username'])->first();
        if(!$user){
            DB::table('users')->insert([
                'firstname' => $data['firstname'],
                'username' => $data['username'],
                'email' => $data['email'],
                'mobile' => $data['mobile'],
                'country_code' => $data['country_code'],
                'deposit_wallet' => $data['deposit_wallet'],
                'phone_of_sponsor' => $data['phone_of_sponsor'],
                'address' => $data['address'],
                'password' => Hash::make('12345678')
            ]);
        }
    }
    fclose($file);
    return 'Import Successful';
});





// User Support Ticket
Route::controller('TicketController')->prefix('ticket')->name('ticket.')->group(function () {
    Route::get('/', 'supportTicket')->name('index');
    Route::get('new', 'openSupportTicket')->name('open');
    Route::post('create', 'storeSupportTicket')->name('store');
    Route::get('view/{ticket}', 'viewTicket')->name('view');
    Route::post('reply/{ticket}', 'replyTicket')->name('reply');
    Route::post('close/{ticket}', 'closeTicket')->name('close');
    Route::get('download/{ticket}', 'ticketDownload')->name('download');
});

Route::get('app/deposit/confirm/{hash}', 'Gateway\PaymentController@appDepositConfirm')->name('deposit.app.confirm');

Route::controller('SiteController')->group(function () {

    Route::post('/add/device/token', 'getDeviceToken')->name('add.device.token');
    
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact', 'contactSubmit');
    Route::get('/change/{lang?}', 'changeLanguage')->name('lang');

    Route::get('cookie-policy', 'cookiePolicy')->name('cookie.policy');

    Route::get('/cookie/accept', 'cookieAccept')->name('cookie.accept');

    Route::get('blogs', 'blogs')->name('blogs');
    Route::get('blog/{slug}/{id}', 'blogDetails')->name('blog.details');

    Route::get('policy/{slug}/{id}', 'policyPages')->name('policy.pages');

    Route::get('plan', 'plan')->name('plan');
    Route::post('planCalculator', 'planCalculator')->name('planCalculator');

    Route::post('/subscribe', 'subscribe')->name('subscribe');

    Route::get('placeholder-image/{size}', 'placeholderImage')->name('placeholder.image');
    Route::post('/planCalculator', 'planCalculator')->name('planCalculator');

    Route::get('/{slug}', 'pages')->name('pages');
    Route::get('/', 'index')->name('home');
    
});