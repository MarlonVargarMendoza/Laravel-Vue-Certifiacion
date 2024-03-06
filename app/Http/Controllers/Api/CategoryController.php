<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function index () {

        $category = Category::get();
        return response()->json($category);
    }

    public function store(StoreRequest $request)
    {

        $validateData = $request->validated();

        try {
            Category::create($validateData);
            return response()->json(['Mensaje' => 'Exitooo!! Registro Creado Correctamente']);

        } catch (\Throwable $e) {

            return response()->json(['Mensaje' => 'Error Interno!!!']);
        }
    }

    public function show(Category $category)
    {
        return response()->json($category);
    }

    public function update(Request $request, Category $category)
    {
        try {

            $category->update($request->toArray());
            return response()->json(['Mensaje' => 'Exitooo!! Registro Editado Correctamente']);

        } catch (\Throwable $th) {
            
            return response()->json(['Mensaje' => 'Error Interno!!!']);
        }
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['Mensaje' => 'Exitooo!! Registro Eliminado Correctamente']);
    }

    public function categories($title)
    {
        $categoriy = Category::where('title', $title)->get();

        if ($categoriy->isNotEmpty()) {
            return response()->json($categoriy);
        } else {
            return response()->json(['Respuesta' => 'No hay coincidencias']);
        }
    }
}
