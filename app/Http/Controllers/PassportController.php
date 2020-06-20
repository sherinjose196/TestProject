<?php

namespace App\Http\Controllers;

use App\User;
use App\Loan;
use App\Address;
use App\Employee;
use Auth;
use DB;
use Illuminate\Http\Request;

class PassportController extends Controller
{
    /**
     * Handles Registration Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = $user->createToken('TutsForWeb')->accessToken;

        return response()->json(['token' => $token], 200);
    }

    /**
     * Handles Login Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($credentials)) {
			$userde = Employee::where('email',$request->email)->get();
            $token = auth()->user()->createToken('TutsForWeb')->accessToken;
            return response()->json(['token' => $token,'details' => $userde] ,200);
        } else {
            return response()->json(['error' => 'UnAuthorised'], 401);
        }
    }
public function loans(Request $request)
    {

        $loan = Loan::where('emp_id', Auth::user()->id)->get();
        return response()->json($loan);
    }
public function add_address(Request $request)
    {
		
           DB::table('address')->insert(
              ['adress' =>$request->adress , 'emp_id' => Auth::user()->id]
);

            return response()->json(['message'=>'Added Successfully ','success'=>1]);

    }
public function add_image(Request $request){

    
    $fileName = "user.jpg";
    $path = $request->file('image')->move(public_path("/"),$fileName);
    $emp =Employee::find(Auth::user()->id);
	
    $emp->filename = $fileName;
    $emp->save;

      return response()->json(['message'=>'Upload Successfully ','success'=>1]);

}
    /**
     * Returns Authenticated User Details
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function details()
    {
        return response()->json(['user' => auth()->user()], 200);
    }
}