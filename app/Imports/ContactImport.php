<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContactImport implements ToModel, WithHeadingRow
{
 /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
        public function model(array $row)
        {
            return [
               'mobile'
            ];
        }
    
        public function headingRow(): int
        {
            return 1;
        }
  
}
