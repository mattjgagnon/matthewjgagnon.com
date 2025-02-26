<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $nextRelease = Carbon::now('America/New_York')
            ->next('Saturday')->setTime(17, 0, 0);

        // If today is Saturday and past 5 PM, move to the next Saturday
        if (Carbon::now('America/New_York')->greaterThanOrEqualTo($nextRelease)) {
            $nextRelease->addWeek();
        }

        return view('home', [
            'nextReleaseDate' => $nextRelease->format('l, F j, Y \a\t g:i A T'),
            'nextReleaseTimestamp' => $nextRelease->timestamp
        ]);
    }
}
