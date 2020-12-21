<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\mailRequest;
use App\Mail\sendMail;
use Illuminate\Support\Facades\Mail;

class mailController extends Controller
{
    //
    public function index(){
        return view('form');
    }
    public function confirm( mailRequest $request){
        $validate = $request->validated();
        $request->session()->put('inquiry' , $validate);
        
        return redirect(route('show'));
    }
    public function show( Request $request){
        $showDate = $request->session()->get('inquiry');
        
        if(!isset( $showDate )){
            return redirect(route('top'));
        }
        $message = view('mailBox' , $showDate ); 
        
        return view('show' , [ 'message' => $message ]);
    }
    public function inquiry( Request $request){
        $inquiryData = $request->session()->get('inquiry');
        
        if(!isset( $inquiryData )){
        return redirect(route('top'));
        }
        
        $request->session()->forget('inquiry');
        
        Mail::to( $inquiryData['email'] )->send(new sendMail($inquiryData));
        
        return redirect(route('send'))->with( 'send_inquiry' , true ) ;
    }

    public function send( Request $request){
        $sendData = $request->session()->get( 'send_inquiry' );
        if(!isset( $sendData )){
        return redirect(route('top'));
        }
        return view('send');
    }

}
