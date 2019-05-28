<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransactionModel;

class TransactionController extends Controller
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
        $data = TransactionModel::all();

        return response($data);
    }

    public function getDataById($id){
        $find = TransactionModel::where('transaction_id', $id)->first();

        if ($find) {
            $data = TransactionModel::where('transaction_id', $id)->get();

            return response($data);
        }

        else {
            return response('Data Tidak Ditemukan'); 
        }
    }

    public function addData(Request $request){
        $data = new TransactionModel();

        $validate = $this->validate($request, [
            'i_code' => 'required',
            'c_id' => 'required|numeric',
            's_id' => 'required|numeric',
            'i_total' => 'required|numeric',
            'p_tax' => 'required|numeric',
            'surcharge' => 'required|numeric',
        ]);

        $data->invoice_code = $request->input('i_code');
        $data->customer_id = $request->input('c_id');
        $data->service_id = $request->input('s_id');
        $data->invoice_total = $request->input('i_total');
        $data->payment_tax = $request->input('p_tax');
        $data->surcharge = $request->input('surcharge');

        $data->save();

        return response('Berhasil Tambah Data');
    } 

    public function updateData(Request $request, $id){
        $validate = $this->validate($request, [
            'i_code' => 'required',
            'c_id' => 'required|numeric',
            's_id' => 'required|numeric',
            'i_total' => 'required|numeric',
            'p_tax' => 'required|numeric',
            'surcharge' => 'required|numeric',
        ]);

        $data = TransactionModel::where('transaction_id', $id)->first();
        if ($data) {
            $data->invoice_code = $request->input('i_code');
            $data->customer_id = $request->input('c_id');
            $data->service_id = $request->input('s_id');
            $data->invoice_total = $request->input('i_total');
            $data->payment_tax = $request->input('p_tax');
            $data->surcharge = $request->input('surcharge');

            $data->save();

            return response('Berhasil Update Data');
        }
        else {
            return response('Data Tidak Ditemukan'); 
        }
    }

    public function deleteData($id) {
        $data = TransactionModel::where('transaction_id', $id)->first();

        if ($data) {
           $data->delete();

           return 'Berhasil Hapus Data';
        }
        else {
            return 'Data Tidak Ditemukan'; 
        }

    }
}
