<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Provider extends Model
{
    protected $table = "providers";

    protected $fillable = [
        "fname",
        "lname",
        "address",
        "practice_id",
        "npi_number",
    ];

    public function practice(): HasOne
    {
        return $this->hasOne(Practice::class, 'practice_id', 'id');
    }
}
