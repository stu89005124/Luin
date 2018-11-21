<?php

namespace App\Http\Controllers\Luin;

use App\Http\Controllers\Controller;
use App\Luin;
use App\Reserve;
use App\Tent;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SignupController extends Controller
{
    public function index(Request $data)
    {
        $reserve = $data->area;
        // foreach ($reserve as $order){
        //     print_r($order);         
        // }
        // exit;

        $oMembertype = new Luin();
        $oMembertype->sex = $data->sex;
        $oMembertype->name = $data->name;
        $oMembertype->mail = $data->mail;
        $oMembertype->telephone = $data->telephone;
        $oMembertype->cellphone = $data->cellphone;
        $oMembertype->save();
        
        
        foreach ($reserve as $order) {
            $oReservetype = new Reserve();
            $oReservetype->tentid = 1;
            $oReservetype->memberid = 1;
            $oReservetype->quality = $order['quality'];
            $oReservetype->price = $order['totalprice']; 
            $oReservetype->startdate = $order['reservedate'][0];
            $oReservetype->enddate = $order['reservedate'][1];
            $oReservetype->save();
        }
        unset($order);
    }

    public function tentlist()
    {
        $tentlist = Tent::all();
        return $tentlist;
        // $oTentlist = new Tent();
    }
}
