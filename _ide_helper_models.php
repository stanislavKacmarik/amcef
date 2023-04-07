<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Todo
 *
 * @property int $id
 * @property int $author_id
 * @property string|null $name
 * @property string|null $description
 * @property int $category_id
 * @property \App\TodoStatusEnum $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User $author
 * @property-read \App\Models\TodoCategory $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $sharedUsers
 * @property-read int|null $shared_users_count
 * @method static \Database\Factories\TodoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Todo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Todo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Todo onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Todo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Todo whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Todo whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Todo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Todo whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Todo whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Todo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Todo whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Todo whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Todo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Todo withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Todo withoutTrashed()
 * @mixin \Eloquent
 */
	class IdeHelperTodo {}
}

namespace App\Models{
/**
 * App\Models\TodoCategory
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Todo> $todos
 * @property-read int|null $todos_count
 * @method static \Database\Factories\TodoCategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|TodoCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TodoCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TodoCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|TodoCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TodoCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TodoCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TodoCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperTodoCategory {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Todo> $sharedTodos
 * @property-read int|null $shared_todos_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Todo> $todos
 * @property-read int|null $todos_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperUser {}
}

