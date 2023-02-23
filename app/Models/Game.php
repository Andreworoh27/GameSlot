<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    public function gamegenre()
    {
        return $this->belongsTo(GameGenre::class);
    }
    public function transactionDetail()
    {
        return $this->belongsTo(TransactionDetail::class);
    }
}
