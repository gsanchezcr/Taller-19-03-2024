<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller{

    public function index(){
        $employees = Employee::all();
        
        if ($employees->isEmpty()) {
            return response()->json(['message' => 'No hay empleados en la base de datos.'], 404);
        }
        return response()->json($employees, 200);
    }

    public function store(Request $request){
        $employee = new Employee();        
        $employee->name = $request->employee_name;
        $employee->lastname = $request->employee_lastname;
        $employee->card = $request->employee_card;
        $employee->name = $request->employee_name;
        $employee->name = $request->employee_name;

        try {
            $employee->save();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al agregar el empleado.'], 500);
        }
        return response()->json(['message' => 'Empleado agregado correctamente'], 201);
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
