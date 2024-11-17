<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Claim extends Model
{
    protected $fillable = [
        "cpt_code_combo_id",
        "provider_id",
        "patient_id",
        "progress_note_id",
        "date_of_service",
        "status_id",
    ];

    public function provider(): HasOne
    {
        return $this->hasOne(Provider::class);
    }

    public function patient(): HasOne
    {
        return $this->hasOne(Patient::class);
    }

    public function progressNote(): HasMany
    {
        return $this->hasMany(ProgressNote::class);
    }

    public function cptCodeCombo(): HasOne
    {
        return $this->hasOne(CptCodeCombo::class);
    }

    public function status(): HasOne
    {
        return $this->hasOne(ClaimStatus::class);
    }
}
