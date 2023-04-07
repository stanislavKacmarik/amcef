<?php

namespace App\Repository;

use App\Models\Todo;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Ramsey\Collection\Collection;

class TodoRepository
{


    /**
     * @param array{'category_id': string, 'status': string, 'visibility': string, 'deleted':bool } $filter
     * @param int $userId
     * @return LengthAwarePaginator
     */
    public function getWithAdvancedFilter(array $filter, int $userId): LengthAwarePaginator
    {
        return Todo::with(['category', 'author'])
            ->when($filter['category_id'], function (Builder $q) use ($filter) {
                return $q->where('category_id', $filter['category_id']);
            })
            ->when($filter['status'], function (Builder $q) use ($filter) {
                return $q->where('status', $filter['status']);
            })
            ->when($filter['visibility'] == 'only_mine', function (Builder $q) use ($userId) {
                return $q->where('author_id', $userId);
            })
            ->when($filter['visibility'] == 'only_shared', function (Builder $q) use ($userId) {
                return $q->whereHas('sharedUsers', function (Builder $q) use ($userId) {
                    $q->where('users.id', $userId);
                });
            })
            ->when($filter['visibility'] == 'all', function (Builder $q) use ($userId) {
                return $q->where(function (Builder $q) use ($userId) {
                    $q->whereHas('sharedUsers', function (Builder $q) use ($userId) {
                        $q->where('users.id', $userId);
                    })->orWhere('author_id', $userId);
                });
            })
            ->when($filter['deleted'], function (Builder $q) {
                $q->withTrashed();
            })
            ->orderBy('id','DESC')
            ->paginate(10);
    }
}