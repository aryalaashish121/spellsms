<?php

namespace App\Http\Controllers;

use App\Components\Core\ResponseHelpers;
use App\Models\Route;
use Exception;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    use ResponseHelpers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $route = Route::all();
        return $this->respondOk($route);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $routedata = $request->validate([
            'route_id'=>['required','unique:routes,route_id'],
            'name'=>['required','unique:routes,name'],
        ]);

        try{
            $route = Route::create($routedata);
            if($route){
                return $this->respondCreated($route,"New route added successfully");
            }
            return $this->respondError("Failed to create");
        }catch(Exception $err){
            return $this->respondWithError($err->getMessage());
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $route = Route::findOrFail($id);
        $routedata = $request->validate([
            'route_id'=>['required','unique:routes,route_id,except,'.$id],
            'name'=>['required','unique:routes,name,except,'.$id],
        ]);
        try{
            $update = Route::where('id',$id)->update($routedata);
            return $this->respondUpdated("Route updated successfully");
        }catch(Exception $err){
            return $this->respondWithError($err->getMessage());
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
