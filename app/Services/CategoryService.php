<?php

namespace App\Services;

use App\Models\Category;
use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;

class CategoryService
{
    public function listForUser(User $user, int $perPage = 15): Paginator
    {
        return Category::when(! app(RoleService::class)->isAdmin($user), function ($q) use ($user) {
            $q->where('user_id', $user->id);
        })->paginate($perPage);
    }

    public function createForUser(User $user, array $data): Category
    {
        $data['user_id'] = $user->id;
        return Category::create($data);
    }

    public function find(int $id): ?Category
    {
        return Category::find($id);
    }

    public function update(Category $category, array $data): Category
    {
        $category->fill($data);
        $category->save();
        return $category;
    }

    public function delete(Category $category): void
    {
        $category->delete();
    }
}
