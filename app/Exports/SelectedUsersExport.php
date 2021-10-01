<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SelectedUsersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    public function collection()
    {
        return User::select('name','phone','company_name','email','login_id','address')->get();
    }
    public function headings(): array
    {
        return [
            'Name',
            'Mobile',
            'Company Name',
            'email',
            'login id',
            'address',
        ];
    }
}
