<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Jobs\DownloadUsers;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('delete', function () {
    \App\Models\RandomUser::truncate();
})->purpose('Display an inspiring quote');

Artisan::command('download {thousands}', function ($thousands) {
    for ($i = 1; $i <= $thousands; $i++) {
        echo "Загрузка " . $i . "-й тысячи записей" . '<br>';
        dispatch(new DownloadUsers(1000));
    }
});
