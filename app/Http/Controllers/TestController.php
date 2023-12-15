<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function showData()
    {
        $allData =  DB::table('tests')->paginate(15);
        // dd($allData);
        return view('allData', ['allData' => $allData]);
    }

    public function singleuserdata(string $id)
    {
        $singleData =  DB::table('tests')->where('id', $id)->get();
        return view('showSingleUserData', ['singleData' => $singleData]);
    }

    public function addData(TestRequest $request)
    {
        // dd($request->all());
        $data = DB::table('tests')
            ->insert([
                'name' => $request->name,
                'email' => $request->email,
                'state' => $request->state,
                'phone_no' => $request->phone_no,
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ]);

        if ($data) {
            return redirect()->route('data');
        }
        else {
            echo 'Data Not Added'; 
        }
    }

    public function deleteData(string $id)
    {
        $data = DB::table('tests')
            ->where('id', $id)
            ->delete();

        if ($data) {
            return redirect()->route('data');
        }
    }

    public function updatePage(string $id) 
    {
        $updatePage = DB::table('tests')->find($id);
            return view('updatedData', ['data' => $updatePage]);
    
    }

    public function updatedData(TestRequest $request, string $id)
    {
        $upadtedData = DB::table('tests')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'state' => $request->state,
                'phone_no' => $request->phone_no,
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ]);
        if ($upadtedData) {
            return redirect()->route('data');
        } else {
            echo "Data Not Updated";
        }
        
    }
}
