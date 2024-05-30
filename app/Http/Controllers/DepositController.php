<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\User;
use App\Notifications\DepositSuccessful;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use App\Events\UserRegistration;
use App\Events\UserDeposit;

class DepositController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }    
    
    public function deposit(Request $request){
        $deposit = Deposit::create([
            'user_id' =>Auth::user()->id,
            'amount'  => $request->amount
        ]);
        User::find(Auth::user()->id)->notify(new DepositSuccessful($deposit->amount));
        event (new UserDeposit(Auth::user()->name,$deposit->amount));
        return redirect()->back()->with('status','Your deposit was successful!');
    }
}
