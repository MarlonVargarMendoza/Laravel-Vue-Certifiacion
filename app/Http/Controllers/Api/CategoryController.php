<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{

    public function index ()
    {

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

    public function show($category)// FORMA CORRECTA DE MANEJO DE ERRORES
    {
        try {
            $store = Category::find($category);
    
            if ($store) {
                return response()->json(['Mensaje' => 'Registro Encontrado Correctamente', 'data' => $store], 200);
            } else {
                return response()->json(['Mensaje' => 'Registro no encontrado.'], 404);
            }
    
        } catch (\Throwable $e) {
            Log::error('Error al obtener el registro: ' . $e->getMessage());
            return response()->json(['Mensaje' => 'Error Interno, comuniquese con soporte'], 500);
        }
    }

    public function update(Request $request, Category $category)
    {
        try {

            $category->update($request->toArray());
            return response()->json(['Mensaje' => 'Exitooo!! Registro Editado Correctamente']);

        } catch (\Exception $e) {
            return response()->json(['Mensaje' => 'Error interno.'], 500);
        }
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return response()->json(['Mensaje' => 'Exitooo!! Registro Eliminado Correctamente']);

        } catch (\Throwable $th) {
            return response()->json(['Mensaje' => 'Error!! Registro No Encontrado']);
        }
    }

    public function categories($title)
    {
        $categoriy = Category::where('title', $title)->get();

        if ($categoriy->isNotEmpty()) {
            return response()->json(['Registro Encontrado' => $categoriy]);
        } else {
            return response()->json(['Respuesta' => 'No hay coincidencias']);
        }
    }
}
