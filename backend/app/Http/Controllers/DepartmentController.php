<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller{

    public function index(){
        $departments = Department::all();
        
        if ($departments->isEmpty()) {
            return response()->json(['message' => 'No hay departamentos en la base de datos.'], 404);
        }
        return response()->json($departments, 200);
    }

    public function store(Request $request){
        $department = new Department();        
        $department->name = $request->department_name;

        try {
            $department->save();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al agregar el departamento.'], 500);
        }
        return response()->json(['message' => 'Departamento agregado correctamente'], 201);
    }

    public function show(string $id){
        $department = Department::find($id);

        if ($department === null) {
            return response()->json(['message' => 'Departamento no encontrado'], 404);
        }
        return response()->json($department, 200);
    }

    public function update(Request $request, string $id){
        $department = Department::find($id);

        if ($department === null) {
            return response()->json(['message' => 'Departamento no encontrado'], 404);
        }
        
        $department->name = $request->department_name;
        try {
            $department->save();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar el departamento'], 500);
        }
        return response()->json(['message' => 'Departamento actualizado correctamente'], 200);
    }

    public function destroy(string $id){
        $department = Department::find($id);

        if ($department === null) {
            return response()->json(['message' => 'Departamento no encontrado'], 404);
        }

        try {
            $department->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar el producto'], 500);
        }
        return response()->json(['message' => 'Producto eliminado correctamente'], 200);
    }
}
