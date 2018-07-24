<?php

namespace App\Repositories;

use App\User;
use App\Filters\UserFilters;
use Carbon\Carbon;

class UserRepository
{
    public function model()
    {
        return app(User::class);
    }

    public function users(User $user, UserFilters $filters) {
        $items = $user->users()->filter($filters)->paginate();
        $items->transform(function ($item) use ($filters) {
            return $filters->transform($item);
        });
        return $items;
    }

    public function user($id, UserFilters $filters = null) {
        $q = $this->model();
        if ($filters) {
            $q = $q->filter($filters);
        }
        return $filters ? $filters->transform($q->findOrFail($id)) : $q->findOrFail($id);
    }

    public function userByEmail(string $email) {
        return $this->model()->where('email', $email)->first();
    }

    public function delete($id) {
        return $this->model()->where('id', $id)->delete();
    }

    public function create(array $opts):User
	{
        return $this->model()->create($opts);
    }

    public function update($id, $opts = []) {
        $item = $this->model()->findOrFail($id);
        $item->fill($opts);
        $item->save();
        return $item;
    }

    public function count(UserFilters $filters)
    {
        return $this->model()->filter($filters)->select('id', DB::raw('count(*) as total'))->count();
    }
}