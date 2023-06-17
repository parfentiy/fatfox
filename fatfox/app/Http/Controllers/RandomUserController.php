<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RandomUser;
use Illuminate\Support\Facades\DB;

class RandomUserController extends Controller
{
    //
    public function showRelatives() {
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
