<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getData(){
        $data = UserModel::all();

        return response($data);
    }

    public function getDataById($id){
        $find = UserModel::where('customer_id', $id)->first();

        if ($find) {
            $data = UserModel::where('customer_id', $id)->get();

            return response($data);
        }

        else {
            return response('Data Tidak Ditemukan'); 
        }
    }

    public function addData(Request $request){
        $data = new UserModel();

        $validate = $this->validate($request, [
            'c_code' => 'required',
            'c_name' => 'required|string',
            'c_address' => 'required|string',
            'c_district' => 'required|string',
            'c_city' => 'required|string',
            'c_province' => 'required|string',
            'c_postalcode' => 'required',
            'c_email' => 'required|string',
            'c_pass' => 'required|string',
        ]);

        $data->customer_code = $request->input('c_code');
        $data->customer_name = $request->input('c_name');
        $data->customer_address = $request->input('c_address');
        $data->customer_district = $request->input('c_district');
        $data->customer_city = $request->input('c_city');
        $data->customer_province = $request->input('c_province');
        $data->customer_postalcode= $request->input('c_postalcode');
        $data->customer_email = $request->input('c_email');
        $data->customer_password = $request->input('c_pass');
        
        $data->save();

        return response('Berhasil Tambah Data');
    } 

    public function updateData(Request $request, $id){
        $validate = $this->validate($request, [
            'c_code' => 'required',
            'c_name' => 'required|string',
            'c_address' => 'required|string',
            'c_district' => 'required|string',
            'c_city' => 'required|string',
            'c_province' => 'required|string',
            'c_postalcode' => 'required',
            'c_email' => 'required|string',
            'c_pass' => 'required|string',
        ]);

        $data = UserModel::where('customer_id', $id)->first();
        if ($data) {
            $data->customer_code = $request->input('c_code');
            $data->customer_name = $request->input('c_name');
            $data->customer_address = $request->input('c_address');
            $data->customer_district = $request->input('c_district');
            $data->customer_city = $request->input('c_city');
            $data->customer_province = $request->input('c_province');
            $data->customer_postalcode= $request->input('c_postalcode');
            $data->customer_email = $request->input('c_email');
            $data->customer_password = $request->input('c_pass');

            $data->save();

            return response('Berhasil Update Data');
        }
        else {
            return response('Data Tidak Ditemukan'); 
        }
    }

    public function deleteData($id) {
        $data = UserModel::where('customer_id', $id)->first();

        if ($data) {
           $data->delete();

           return 'Berhasil Hapus Data';
        }
        else {
            return 'Data Tidak Ditemukan'; 
        }

    }
    
}
