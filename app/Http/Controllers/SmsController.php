<?php

namespace App\Http\Controllers;

use App\Carte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Twilio\Rest\Client;

class SmsController extends Controller
{

    public function index()
    {
        $cartes = Carte::all();

        return view('sms.index', compact('cartes'));
    }

    public function store(Request $request)
    {

        // $request = request()->validate([
        //     'message'  => 'required',
        //     'mobile' => '',
        // ]);
        // dd($request);


        $message = $request->input('message');
        $mobile = $request->input('mobile');
        $encodeMessage = urlencode($message);
        $postData = $request->all();
        $mobileNumber = implode('', $postData['mobile']);
        $arr = str_split($mobileNumber, 12);
        $mobiles = implode(',', $arr);
        print_r($mobiles);
        exit();
        // dd($mobiles);

        // foreach (implode('', $postData['mobile']) as $phone) {
        //     dd($phone);
        // }

        $sid    = env("TWILIO_SID");
        $token  =  env("TWILIO_TOKEN");
        $client = new Client($sid, $token);

        $messages = 'Rechargement reussi.';

        $client->messages->create($mobiles, [
            'from' => 'AQUALINES',
            'body' => $message
        ]);

        // if ($validator->passes()) {

        //     $numbers_in_arrays = explode(',', $request->input['mobile']);
        //     $message = $request->input('message');
        //     $count = 0;

        //     foreach ($numbers_in_arrays as $number) {
        //         dd($number);
        //         $count++;

        //         $sid    = env("TWILIO_SID");
        //         $token  =  env("TWILIO_TOKEN");
        //         $client = new Client($sid, $token);

        //         $messages = 'Rechargement reussi.';

        //         $client->messages->create($number, [
        //             'from' => 'AQUALINES',
        //             'body' => $message
        //         ]);
        //     }
        // }






        // $sid    = env("TWILIO_SID");
        // $token  =  env("TWILIO_TOKEN");
        // $client = new Client($sid, $token);

        // $messages = 'Rechargement reussi.';

        // $client->messages->create($mobiles, [
        //     'from' => 'AQUALINES',
        //     'body' => $message
        // ]);


        // $encodeMessage = urlencode($message);
        // $authkey = '';
        // $senderId = '';
        // $route = 4;
        // $postData =$request->all();

        // $mobileNumber = implode('', $postData['mobile']);

        // $arr = str_split($mobileNumber, 8);
        // $mobil =implode(",", $arr);
        // $mobiles = '+225'.$mobil;
        // print_r($mobiles);
        // exit();
        // $data = array(
        //     'authkey' => $authkey,
        //     'mobile' => $mobile,
        //     'encodeMessage' => $encodeMessage,
        //     'senderId' => $senderId,
        //     'route' => $route,
        // );
        // $url = "";

        Session::flash('success', 'Message envoyé avec succes!.');

        return back();
    }

    public function sendSms(Request $request)
    {
        $sid    = env("TWILIO_SID");
        $token  =  env("TWILIO_TOKEN");
        $client = new Client($sid, $token);


        $a = request()->validate([
            'numbers' => 'required',
            'message' => 'required'
        ]);

        $numbers = '+22508474872';
        $message = 'Bonjour';

        $client->messages->create($numbers, [
            'from' => 'AQUALINES',
            'body' => $message
        ]);

        return back();
    }
}
