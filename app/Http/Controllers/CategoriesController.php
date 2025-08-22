<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Http\Requests;
use App\Http\Services\CategoriesService;
use App\Http\Requests\CategoriesRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{

    private $categoriesService;

    public function __construct(CategoriesService $categoriesService)
    {
        $this->categoriesService = $categoriesService;
    }
    public function index(): View{
        $categories = $this->categoriesService->all();
        return view('categories.index', compact('categories'));
    }
    public function create(): View{
        return view('categories.create');
    }
    public function store(CategoriesRequest $request): RedirectResponse{
        $created = $this->categoriesService->create($request->all());
        Session::flash($created ['status'], $created ['message']);
        return redirect()->back();  
    }
    public function edit(int $category_id):View {
        $categories = $this->categoriesService->findById($category_id);
        return view ('categories.edit', compact('categories'));
    }
    public function update(CategoriesRequest $request, int $id): RedirectResponse{
        $updated = $this->categoriesService->update($request->all(),$id);
        Session::flash($updated ['status'], $updated ['message']);
        return redirect()->back();
    }
    public function delete(CategoriesRequest $request): RedirectResponse {
        $deleted = $this->categoriesService->delete($request->id);
        Session::flash($deleted ['status'], $deleted ['message']);
        return redirect()->back();
    }

}