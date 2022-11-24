<?php

namespace App\Models;

use App\Events\WeeklyTodoReportCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyTodoReport extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    protected $dispatchesEvents=[
      'created' => WeeklyTodoReportCreated::class
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
