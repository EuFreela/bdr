<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use Cookie;
use App\User;
use App\Model\SystemMessageModel;

class BDRController extends Controller
{
    private $multiple_3;
    private $multiple_5;
    private $multiple_3and5;


    function __construct()
    {
        $this->multiple_3 = array();
        $this->multiple_5 = array();
        $this->multiple_3and5 = array();
    }

    /*
    |--------------------------------------------------------------------------
    | GETTERS
    |--------------------------------------------------------------------------
    | @BDR.
    */
    public function index()
    {
        $this->calcFizzBuzz();

        return view('fizzbuzz.fizzbuzz')
        ->with(
            [
                'multiple_3' => $this->multiple_3,
                'multiple_5' => $this->multiple_5,
                'multiple_3and5' => $this->multiple_3and5
            ]);
    }

    public function getUserList()
    {
        return view('users.user-list')
        ->with([
            'user' => User::all()
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | FACTORY
    |--------------------------------------------------------------------------
    | @BDR.
    */
    public function Refactor()
    {
        return view('refactor.refactor');
    }    

        
    public function setRefactor()
    {
        session(['loggedin' => 'true']);
        Cookie::make('loggedin', 'true', 5);
        return redirect()->back()
        ->with('success',SystemMessageModel::where('code','=',7)->first()->name);       
    }

    public function eraseRefactor()
    {
        Session::forget('loggedin');
        Cookie::queue(Cookie::forget('loggedin')); 
        return redirect()->back()
        ->with('success',SystemMessageModel::where('code','=',8)->first()->name);     
    }

    public function navegateRefactor()
    {
        if(Session::has('loggedin') or Cookie::has('loggedin'))
            return Redirect::to('http://www.google.com')->cookie('loggedin');        
        return redirect()->back()
        ->with('success',SystemMessageModel::where('code','=',9)->first()->name);
    }

    
    /*
    |--------------------------------------------------------------------------
    | PRIVATE
    |--------------------------------------------------------------------------
    | @BDR.
    */
    private function calcFizzBuzz()
    {
        for($i=1; $i<100; $i++): 
            
            switch ($i) {
                case ($i%3) == 0:
                    $this->multiple_3[] = 'Fizz';
                    break;
                case ($i%5) == 0:
                    $this->multiple_5[] = 'Buzz';
                    break;
                case (($i%5) == 0) && (($i%3) == 0):
                    $this->multiple_3and5[] = 'FizzBuzz';
                    break;                
            }
        endfor;
    }

}
