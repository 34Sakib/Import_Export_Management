<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopBarSetting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'phone',
        'opening_hours',
        'is_active'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get validation rules for the model.
     *
     * @return array
     */
    public static function rules()
    {
        return [
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'opening_hours' => 'required|string|max:255',
            'is_active' => 'boolean'
        ];
    }
}
