<?php

namespace App\Models;

use App\Models\wallet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class withdrawal extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function wallet()
    {
        return $this->belongsTo(wallet::class, 'rekening','rekening');
    }
}
