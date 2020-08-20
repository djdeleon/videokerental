<?php

namespace App\Http\Controllers\Courier;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfirmReturnFileController extends Controller
{
    public function create(User $user)
    {
        $currentDate = Carbon::now('Asia/Manila');

        return view('users.qrcodereturn.anotherCreateFile', compact('currentDate', 'user'));
    }

    // public function store(Request $request, User $user)
    // {
    //     $data = request()->validate([
    //         'qr_password' => 'required',
    //     ], [
    //         'qr_password.required' => 'The QR Code is required.',
    //     ]);

    //     if ($request->qr_password === $user->qr_code->qr_password) {
    //         $user->qr_code()->update($data);
    
    //         $status = request()->validate([
    //             'is_paid'          => '',
    //             'qrcode_issued_at' => '',
    //         ]);
            
    //         $user->qr_code()->update($data);
            
    //         $user->update($status);
            
    //         return redirect('/courier/customers')->with('success', 'Customer ' . $user->first_name . ' payment done successfully.');
    //     } else {
    //         return redirect('/courier/customers/' . $user->id . '/access/qrerror');
    //     }
    // }

    public function update(Request $request, User $user)
    {
        $data = request()->validate([
            'is_paid'           => '',
            'qr_password'       => 'required',
            'qrcode_issued_at'  => ''
        ], [
            'qr_password.required' => 'The QR Code is required.',
        ]);

        $qr = User::with('another_reservation')
            ->join('another_reservations', 'another_reservations.user_id', '=', 'users.id')
            ->select('another_reservations.qr_password', 'users.id')
            ->get();

        foreach ($qr as $qr_pasword) {
            $qr_pasword;
        }

        $qr_password = $qr_pasword->qr_password;

        if ($request->qr_password === $qr_password) {
    
            $user->another_reservation()->where('is_paid', 'Half Payment')->update($data);

            return redirect('/courier/customers')->with('success', 'Customer ' . $user->first_name . ' payment done successfully.');
        } else {
            return redirect('/courier/customers/' . $user->id . '/access/qrerror');
        }
    }

    public function anotherChoice(User $user)
    {
        return view('courier.qrcode.choice', compact('user'));
    }
}
