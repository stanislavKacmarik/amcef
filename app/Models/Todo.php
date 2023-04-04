<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperTodo
 */
class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class,'author_id');
    }

}
