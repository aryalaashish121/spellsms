<?php

namespace App\Http\Controllers\Contacts;

use App\Components\Core\ResponseHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactStoreRequest;
use App\Imports\ContactImportUpload;
use App\Models\Contact;
use App\Models\Contacts;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

    public function update(ContactStoreRequest $request, $id){
        $data = $request->validated();
        try {
            $store_contact = Contacts::where('id',$id)->update([
                'name' => $data['name'],
                'mobile' => $data['mobile'],
                'email' => $data['email'],
                'company' => $data['company'],
                'address' => $data['address'],
                'note' => $data['note'],
                'contact_group_id' => $data['contact_group_id'],
            ]);
            return $this->respondUpdated("Contact updated successfully");
        } catch (\Exception $err) {
            return $this->respondWithError($err->getMessage());
        }
    }

    public function uploadFromFile(Request $request){
        try {
            $data = Excel::toArray(new ContactImportUpload(),$request->file('excel_numbers'));
        foreach($data as $contact){
            foreach($contact as $data){
                $data['contact_group_id']=$request->contact_group_id;
                $data['parent_id'] = auth()->user()->id;
                Contacts::create($data);
            }
        }
            return $this->respondCreated("Contact uploaded successfully");
        } catch (\Exception $err) {
            return $this->respondWithError($err->getMessage());
        }
    }

    public function getContactById($id)
    {
        try{
            $contact = Contacts::where('id',$id)->first();
            if(!$contact){
                return $this->respondNotFound();
            }
            return $this->respondOk($contact);
        }catch(\Exception $err){
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
        $data = Contacts::findOrFail($id);
        try {
            $data->delete();
            return $this->respondDeleted("Deleted Successfully");
        } catch (Exception $err) {
            return $this->respondWithError($err->getMessage());
        }
    }
}
