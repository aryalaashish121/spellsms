<?php

namespace App\Imports;

use App\Models\Contact;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContactImportUpload implements ToModel, WithHeadingRow
{
   public function model(array $row)
   {
       return new Contact([
           'name'=>$row['name'] ?? $row['Name'] ?? null,
           'mobile'=>$row['mobile'] ?? $row['Mobile'] ?? $row['phone'] ?? 0,
           'email'=>$row['email'] ?? $row['Email'] ?? "N/A",
           'company'=>$row['company'] ?? $row['Company'] ?? "N/A",
           'note'=>$row['note'] ?? $row['Note'] ?? "N/A",
           'address'=>$row['address'] ?? $row['Address'] ?? "N/A",
           
       ]);
   }
   public function headingRow(): int
   {
       return 1;
   }
}
