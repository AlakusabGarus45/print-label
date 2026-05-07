<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Retail;
use Barryvdh\DomPDF\Facade\Pdf;
use App\MOdels\BarcodeTest;
use Carbon\Carbon;

class CartoonLabelController extends Controller
{
    public function index(){
        return view('index');
    }

    public function viewCompany(){
        $companies = Company::all();
        return view('company.show',compact('companies'));
    }
    public function addCompany(){
        return view('company.add');
    }
    public function storeCompany(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);
        $company = new Company();
        $company->name = $request->name;
        $company->address = $request->address;
        $company->save();
        return redirect()->back()->with('success', "Company Added");
    }
    public function viewRetail(){
        $retails = Retail::all();
        return view('retail.show',compact('retails'));
    }
    public function addRetail(){
        return view('retail.add');
    }
    public function storeRetail(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'contact' => 'required'
        ]);

        $retail = new Retail();
        $retail->name = $request->name;
        $retail->address = $request->address;
        $retail->contact = $request->contact;
        $retail->save();

        return redirect()->back()->with('success', 'Retail Added');
    }
    public function printLabel(){
        $companies = Company::all();
        $retails = Retail::all();
        return view('label.form',compact('companies','retails'));
    }

public function print(Request $request)
{
    $from = Company::where('id',$request->from)->first();
    $to = Retail::where('id',$request->to)->first();
    $cartoonNo = (int) $request->cartoon_no;
    $date = Carbon::now();

    return view('label.print', compact('from', 'to', 'cartoonNo','date'));
}

public function getModel(Request $request)
{
    $device = BarcodeTest::where('imei', $request->imei)->first();

    return response()->json([
        'model_name' => $device->model_name ?? null
    ]);
}
}
