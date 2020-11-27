<?php

namespace App\Http\Controllers;

use App\Models\PrizeItem;
use App\Models\UserPrize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function get_prize()
    {
        $kinds = config('app.prizes.kinds');
        $user_prize = null;

        while (is_null($user_prize)) {
            if (count($kinds) <= 0) {
                abort(500);
            }
            $rand_pos = array_rand($kinds);
            $item = PrizeItem::where('kind', $kinds[$rand_pos])->where('count', '>', 0)->limit(1)->first();
            if (is_null($item)) {
                abort(500);
            } else {
                $user_prize = $item->prize()->newPrize();
                if (is_null($user_prize)) {
                    unset($kinds[$rand_pos]);
                }
            }
        }

        $user_prize->save();

        return redirect(route('home'));
    }


    public function refuse_prize($id) {
        $prize = UserPrize::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $prize->delete();

        return redirect(route('home'));
    }

    public function exchange_prize($id) {
        $prize = UserPrize::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $prize->prize()->exchange();

        return redirect(route('home'));
    }
}
