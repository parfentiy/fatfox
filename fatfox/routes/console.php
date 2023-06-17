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
    if ($thousands > 10) {
        $decades = (int) round($thousands / 10, 0);
        $remain = $thousands % 10;
        $total = 0;
        for ($y = 1; $y < $decades; $y++) {
            for ($i = 1; $i <= 10; $i++) {
                $total++;
                echo "Загрузка " . $total . "-й тысячи записей" . '<br>';
                dispatch(new DownloadUsers(1000));
            }
        }
        for ($i = 1; $i <= $remain; $i++) {
            $total++;
            echo "Загрузка " . $total . "-й тысячи записей" . '<br>';
            dispatch(new DownloadUsers(1000));
        }
    } else {
        for ($i = 1; $i <= $thousands; $i++) {
            echo "Загрузка " . $i . "-й тысячи записей" . '<br>';
            dispatch(new DownloadUsers(1000));
        }
    }
});
