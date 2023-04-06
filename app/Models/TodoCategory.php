<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperTodoCategory
 */
class TodoCategory extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function todos()
    {
        return $this->hasMany(Todo::class, 'todo_category_id');
    }
}
