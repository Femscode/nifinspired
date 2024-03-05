<?php
namespace App\Http\Traits;
use App\Models\Transaction;
trait TransactionTrait {
    public function index() {
      //
    }
    public function create_transaction($title, $details, $type, $amount,$user) {
        Transaction::create([
            'user_id' => $user->id,
            'title' => $title,
            'service_type' => $type,
            'description' => $details,
            'amount' => $amount,
        ]);
        if($type == 'debit') {
            $user->balance -= $amount;
            $user->spent += $amount;
            $user->save();
        }
        else {
            $user->balance += $amount;
            $user->save();
        }
       
    }
}