<?php

namespace App\Http\Controllers\Authorization;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::orderBy('created_at','desc')->get();
        return response()->json([
            'success'=>true,
            'message'=>"All permissions fetched successfully",
            'data'=>$permissions
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required','unique:permissions,name'],
        ]);

        try{
            $permission = Permission::create([
                'name'=>$request->name
            ]);
            return response()->json([
                'success'=>true,
                'message'=>'Created successfully',
                'data'=>$permission
            ]);
        }catch(Exception $err){
            return response()->json([
                'success'=>false,
                'message'=>'Could not create permission',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::where('id',$id)->first();
        return response()->json([
            'success'=>true,
            'message'=>'Fetched successfully',
            'data'=>$permission
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>['required','unique:permissions,name,except,'.$id],
        ]);

        try{
            $permission = Permission::where('id',$id)->update([
                'name'=>$request->name
            ]);
            return response()->json([
                'success'=>true,
                'message'=>'Created successfully',
                'data'=>$permission
            ]);
        }catch(Exception $err){
            return response()->json([
                'success'=>false,
                'message'=>'Could not create permission',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
