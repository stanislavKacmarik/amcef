<?php

namespace App\Models;

use App\TodoStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin IdeHelperTodo
 */
class Todo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'status'
    ];

    protected $casts = [
        'status' => TodoStatusEnum::class
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function sharedUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'todo_user_share');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(TodoCategory::class, 'category_id');
    }

}
