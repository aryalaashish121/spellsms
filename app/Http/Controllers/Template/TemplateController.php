<?php

namespace App\Http\Controllers\Template;

use App\Components\Core\ResponseHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\TemplateStoreRequest;
use App\Models\Template;
use Exception;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    use ResponseHelpers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates = Template::all();
        return $this->respondOk($templates);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TemplateStoreRequest $request)
    {

        $data = $request->validated();
        //validations

        try {
            $store_template = Template::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'parent_id' => auth()->user()->id,
            ]);

            return $this->respondCreated($store_template, "Template added successfully");
        } catch (Exception $err) {
            return $this->respondWithError($err->getMessage());
        }
        //store

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Template::findOrFail($id);
        try {
            $data->delete();
            return $this->respondDeleted("Deleted Successfully");
        } catch (Exception $err) {
            return $this->respondWithError($err->getMessage());
        }
    }
}
