<?php

namespace App\Exports;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $users =  User::select( 
        'id',
        'parent_id',
        'company_name',
        'name',
        'slug',
        'login_id',
        'email',
        'phone',
        'address',
        'status',
        )->get();
        
        return $users;

    }

    public function headings(): array {
        return [
            'id',
            'parent_id',
            'company_name',
            'name',
            'slug',
            'login_id',
            'email',
            'phone',
            'address',
            'status',
        ];
    }
}
