<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightLog extends Model
{
    use HasFactory;
    
    protected $fillable = [ 'user_id', 'date', 'weight', 'calories', 'exercise_time', 'exercise_content', ];

    public function scopeFilterByDate($query, $start_date, $end_date)
    {
        if ($start_date){
            $query->where('date', '>=', $start_date);
        }
        if ($end_date){
            $query->where('date', '<=', $end_date);
        }
        return $query;
    }
}
