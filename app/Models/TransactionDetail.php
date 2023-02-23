<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    public function transactionHeader()
    {
        return $this->belongsTo(TransactionHeader::class, 'transaction_id', 'transaction_id');
    }
    public function game()
    {
        return $this->hasOne(Game::class, 'id', 'game_id');
    }
}
