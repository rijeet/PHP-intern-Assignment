<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    
    protected $fillable = ['list_id', 'task', 'completed'];

    
    public function list()
    {
        return $this->belongsTo(LList::class, 'list_id');
    }
}

