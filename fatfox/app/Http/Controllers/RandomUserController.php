<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RandomUser;
use Illuminate\Support\Facades\DB;

class RandomUserController extends Controller
{
    //
    public function download($thousands) {
        \Artisan::call('download ' . $thousands);
    }
    public function showRelatives() {
        // fixme - скорость можно и так измерять, но SQL запросы все-таки проще и быстрее отлаживать в отдельном
        // интерфейсе. PhpMyAdmin, HeidiSQL, DataGrip от Intellij (входит в PhpStorm и Intellij IDEA)
        // Почему скорость прыгает от 260 до 50 мс - MySQL кэширует запрос, из-за чего последующие выходят быстрее
        // Для отладки можно использовать SQL_NO_CACHE в запросе
        // Точно сказать не могу - нет доступа к базе.
        $t1 = microtime(true);

        $relatives = \DB::table('random_users')
            ->select('name_last', 'l_city', DB::raw('COUNT(*) as `count`'))
            ->groupBy('name_last', 'l_city')
            ->having('count', '>', 1)
            ->get();

        return view('show_relatives', [
            'relatives' => $relatives,
            'start_time' => $t1,
            'total_in_db' => \DB::table('random_users')->count(),
        ]);
    }

}
