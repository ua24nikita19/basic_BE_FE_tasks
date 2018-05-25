<?php

namespace App\Http\Controllers;
use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\employee;
use App\employeeModel;

class abzagencyController extends Controller
{
    public function index(){

        $employees = new employeeModel();
        $employeesCollection = $employees->getRecords();
        $empls = $employees->createTree($employeesCollection);

        echo $employees->renderTemplate(__DIR__.'/template/template.php', ['empls'=>$empls]);

        return view('welcome', ['employeesCollection'=>$employeesCollection]);
    }

    public function find(Request $request)
    {
        $employees = new employeeModel();
        $result = $request->session()->all();
        $token = $result['_token'];

        if ($request->ajax()) {
            if ($request->getMethod() == 'GET') {

                $param = isset($_GET['param']) ? trim($_GET['param']) : '';

                if ($param != '') {
                    $employeesCollection = $employees->where('full_name', 'like', "$param")
                        ->orWhere('position', 'like', "$param")
                        ->orWhere('employment_date', 'like', "%$param%")
                        ->orWhere('salary', 'like', "%$param%")->get();

                    return view('all', ['employeesCollection' => $employeesCollection, 'token' => $token]);
                }
            }
        }
        $employeesCollection = $employees->getRecords();
        return view('all', ['employeesCollection' => $employeesCollection, 'token' => $token]);
    }

    public function all(Request $request){
        $result = $request->session()->all();
        $token = $result['_token'];
        $employees = new employeeModel();
        $employeesCollection = $employees->getRecords();

        return view('all', ['employeesCollection'=>$employeesCollection,'token'=>$token]);
    }

    public function sortFullName(Request $request){
        $result = $request->session()->all();
        $token = $result['_token'];
        $employees = new employeeModel();
        $employeesCollection = $employees->getOrderByRecords('full_name');
        return view('all', ['employeesCollection'=>$employeesCollection,'token'=>$token]);
    }
    public function sortPosition(Request $request){
        $result = $request->session()->all();
        $token = $result['_token'];
        $employees = new employeeModel();
        $employeesCollection = $employees->getOrderByRecords('position');
        return view('all', ['employeesCollection'=>$employeesCollection,'token'=>$token]);
    }
    public function sortEmploymentDate(Request $request){
        $result = $request->session()->all();
        $token = $result['_token'];
        $employees = new employeeModel();
        $employeesCollection = $employees->getOrderByRecords('employment_date');
        return view('all', ['employeesCollection'=>$employeesCollection,'token'=>$token]);
    }
    public function sortSalary(Request $request){
        $result = $request->session()->all();
        $token = $result['_token'];
        $employees = new employeeModel();
        $employeesCollection = $employees->getOrderByRecords('salary');
        return view('all', ['employeesCollection'=>$employeesCollection,'token'=>$token]);
    }

    public function search(Request $request) {
        $param = $_POST['search'];
        $result = $request->session()->all();
        $token = $result['_token'];
        $employees = new employeeModel();

        $employeesCollection = $employees->where('full_name','like', "$param")
                                ->orWhere('position','like', "$param")
                                ->orWhere('employment_date','like', "%$param%")
                                ->orWhere('salary','like',"%$param%")->get();

        return view('all', ['employeesCollection'=>$employeesCollection,'token'=>$token]);
    }
}
