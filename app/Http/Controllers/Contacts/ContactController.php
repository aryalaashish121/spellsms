<?php

namespace App\Http\Controllers\Contacts;

use App\Components\Core\ResponseHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactStoreRequest;
use App\Models\Contacts;
use Exception;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    use ResponseHelpers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $contacts = Contacts::with('group')->get();
            return $this->respondOk($contacts);
        } catch (\Exception $err) {
            return $this->respondWithError($err->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactStoreRequest $request)
    {
        $data = $request->validated();

        try {
            $store_contact = Contacts::create([
                'parent_id' => auth()->user()->id,
                'name' => $data['name'],
                'mobile' => $data['mobile'],
                'email' => $data['email'],
                'company' => $data['company'],
                'address' => $data['address'],
                'note' => $data['note'],
                'contact_group_id' => $data['contact_group_id'],
            ]);
            return $this->respondCreated($store_contact, "Contact added successfully");
        } catch (\Exception $err) {
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
        $data = Contacts::findOrFail($id);
        try {
            $data->delete();
            return $this->respondDeleted("Deleted Successfully");
        } catch (Exception $err) {
            return $this->respondWithError($err->getMessage());
        }
    }
}
