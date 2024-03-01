<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use ReturnTypeWillChange;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::paginate(4);
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {

        $categories = $this->index()->getData()['categories'];

        return view('category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validateData = $request->validated();

        try {

            Category::create($validateData);
            return to_route('category.create')->with('Mensaje', 'Registro Creado Correctamente');

        } catch (\Throwable $e) {

            return to_route('category.create')->withErrors(['error' => 'Error Interno!!!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): View
    {
        dd($category->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $category->update($request->toArray());
        return to_route('category.create')->with('Mensaje', 'Registro Editado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return to_route('category.create');
    }
}
