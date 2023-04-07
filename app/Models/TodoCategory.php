<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperTodoCategory
 */
class TodoCategory extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function todos(): HasMany
    {
        return $this->hasMany(Todo::class, 'todo_category_id');
    }
}
