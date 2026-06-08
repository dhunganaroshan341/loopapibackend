<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\RoleService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function __construct(protected CategoryService $service, protected RoleService $roleService)
    {
        $this->middleware('auth:sanctum');
    }

    public function index(Request $request): JsonResponse
    {
        $user = $request->user();
        $list = $this->service->listForUser($user, $request->get('per_page', 15));
        return response()->json($list);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = $this->service->createForUser($request->user(), $data);
        return response()->json($category, 201);
    }

    public function show(Request $request, int $id): JsonResponse
    {
        $category = $this->service->find($id);
        if (! $category) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $user = $request->user();
        if (! $this->roleService->isAdmin($user) && $category->user_id !== $user->id) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        return response()->json($category);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $category = $this->service->find($id);
        if (! $category) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $user = $request->user();
        if (! $this->roleService->isAdmin($user)) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $updated = $this->service->update($category, $data);
        return response()->json($updated);
    }

    public function destroy(Request $request, int $id): JsonResponse
    {
        $category = $this->service->find($id);
        if (! $category) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $user = $request->user();
        if (! $this->roleService->isAdmin($user)) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $this->service->delete($category);
        return response()->json(null, 204);
    }
}
