<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PermissionExport;
use App\Imports\PermissionImport;

class RoleController extends Controller
{
    public function AllPermission()
    {
        $permissions = Permission::all();
        return view('backend.pages.permission.all_permission', compact('permissions'));
    }

    public function AddPermission()
    {
        return view('backend.pages.permission.add_permission');
    }

    public function StorePermission(Request $request)
    {
        $permission = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permission Create Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function EditPermission($id)
    {
        $permission = Permission::findOrFail($id);
        return view('backend.pages.permission.edit_permission', compact('permission'));
    }

    public function UpdatePermission(Request $request)
    {

        $per_id = $request->id;

        Permission::findOrFail($per_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification);
    }

    public function DeletePermission($id)
    {

        Permission::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Permission Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    //Import-Export Excel File
    public function ImportPermission()
    {
        return view('backend.pages.permission.import_permission');
    }

    public function Export()
    {
        return Excel::download(new PermissionExport, 'permission.xlsx');
    }

    public function Import(Request $request)
    {
        // Check if the file is uploaded and is an Excel file
        if ($request->hasFile('import_file') && $request->file('import_file')->isValid()) {

            // Validate that the file is an Excel file (.xlsx or .xls)
            $this->validate($request, [
                'import_file' => 'mimes:xlsx,xls|required'
            ]);

            // Try to import the file
            try {
                Excel::import(new PermissionImport, $request->file('import_file'));

                // Success notification
                return redirect()->route('all.permission')->with([
                    'message' => 'Permission Imported Successfully',
                    'alert-type' => 'success'
                ]);
            } catch (\Exception $e) {
                // If an error occurs, show a failure message
                return back()->with([
                    'message' => 'Error importing file. Please try again.',
                    'alert-type' => 'error'
                ]);
            }
        } else {
            // If no file is uploaded or the file is not valid, show an error
            return back()->with([
                'message' => 'Please upload a valid Excel file.',
                'alert-type' => 'error'
            ]);
        }
    }
}
