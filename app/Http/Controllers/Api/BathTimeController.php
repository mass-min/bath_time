<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BathTimeController extends Controller
{
    public function search(Request $request)
    {
        $params = $request->all();
        $from = $params['from'];
        $to = $params['to'];
        // 希望日時
        $desirableTimeFrom = Carbon::createFromFormat('Y-m-d H:i:s', $from);
        $desirableTimeTo = Carbon::createFromFormat('Y-m-d H:i:s', $to);
        // 既に予約が入っている日時
        $reservedTimeFrom = Carbon::createFromFormat('Y-m-d H:i:s', '2019-03-31 21:30:00');
        $reservedTimeTo = Carbon::createFromFormat('Y-m-d H:i:s', '2019-03-31 21:59:59');

        if ($desirableTimeFrom > $desirableTimeTo) {
            return response()->json(['message' => 'Invalid date span.', 500]);
        }
        if ($desirableTimeFrom > $reservedTimeTo || $desirableTimeTo < $reservedTimeFrom) {
            return response()->json([
                'data' => [
                    'available' => true,
                ]
            ]);
        } else {
            return response()->json([
                'data' => [
                    'available' => false,
                ]
            ]);
        }
    }
}
