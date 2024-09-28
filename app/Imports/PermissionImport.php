<?php

namespace App\Imports;

use Spatie\Permission\Models\Permission;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PermissionImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Insert the actual data rows into the database, skipping the header
        return new Permission([
            'name'       => $row['name'],       // Match this with your Excel column header
            'group_name' => $row['group_name'], // Match this with your Excel column header
        ]);
    }
}

