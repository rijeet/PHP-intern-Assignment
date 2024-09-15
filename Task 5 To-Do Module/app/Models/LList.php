<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LList extends Model
{
    use HasFactory;

   
    protected $table = 'lists';

   
    protected $fillable = ['name', 'date'];

   
    public function tasks()
    {
        return $this->hasMany(Task::class, 'list_id'); 
    }
}
