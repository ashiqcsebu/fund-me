<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Charts\MyChart;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        return view('home');
    }

    public function dashboard()
    {
//        $chart = new MyChart;
//        $chart->labels(['One', 'Two', 'Three', 'Four']);
//        $chart->dataset('My dataset', 'line', [1, 2, 3, 4]);
        return view('admin.dashboard');
    }

    public function edit_profile(Request $request)
    {
      $ac = User::find($request->input('id'));
      $ac->name = $request->input('name');
      $ac->email =$request->input('email');
      $ac->ic=$request->input('ic');
      $ac->phone =$request->input('phone');
      $ac->address = $request->input('address');
      if($request->input('password')!=Null){
        $ac->password = Hash::make($request->input('password'));
      }
      $ac->save();
      return redirect('/edit-profile')->with('status','Profile Successfully Updated');
    }


    public function add_user(Request $request)
    {
         User::create([
            'name' => $request->input('name'),
            'email' =>$request->input('email'),
            'ic' => $request->input('ic'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'role' => $request->input('role'),
            'university_id' => $request->input('university_id'),
            'user_status' =>'1',
            'password' => Hash::make($request->input('password')),
        ]);
        // //add mail testing
        //    $to_name = $request->input('name');
        //    $to_email =$request->input('email');
        //    $data = array('name'=>$to_name , 'email'=>$to_email ,"password" =>$request->input('password'));
        //    \Mail::send('email_template.user_registration', $data, function($message) use ($to_name, $to_email) {
        //        $message->to($to_email, $to_name)
        //            ->subject('User Registration Notification');
        //        $message->from('zrsfms2019@gmail.com','User Registration Confirmation');
        //    });
           //end mail testing

          return redirect('/user-list')->with('status','User Successfully Created');

    }

    public function activate_user($id)
    {
      $ac = User::find($id);
      if($ac->user_status == '0'){
          $ac->user_status = '1';
          $ac->save();
          return redirect('/user-list')->with('status','User Successfully Activated');
      }
      else{
        $ac->user_status = '0';
        $ac->save();
        return redirect('/user-list')->with('status','User Successfully Inactivated');
      }
    }

    public function del_user($id)
    {

      $ban = User::find($id);
      $ban->delete();
      return redirect('/user-list')->with('status','User Successfully Deleted');

    }
}
