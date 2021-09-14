<?php

namespace App\Http\Controllers\Authorization;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class RoleController extends Controller
{
   
    public function index(Request $request){

        $roles = Role::orderBy('created_at','desc')->get();
        return response()->json([
            'success'=>true,
            'message'=>"Roles fetched successfully",
            'data'=>$roles
        ]);
    }

    public function store(Request $request){

        $request->validate([
            'name'=> ['required','unique:roles,name']
        ]);

        $role = Role::create([
            'name'=>$request->name,
        ]
        );
        return response()->json([
            'success'=>true,
            'message'=>"Role updated successfully",
            'data'=>$role
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name'=> ['required','unique:roles,name,except'.$id]
        ]);
        $role = Role::where('id',$id)->update([
            'name'=>$request->name
        ]);

        return response()->json([
            'success'=>true,
            'message'=>"Role updated successfully"
        ]);
    }

    public function destroy($id){
        $role = Role::findOrFail($id);
        try{
            $role->delete();
            return response()->json([
                'success'=>true,
                'message'=>'Deleted successfully'
            ]);
        }catch(Exception $err){
            return response()->json([
                'success'=>true,
                'message'=>$err->getMessage()
            ]);
        }
    }
}
