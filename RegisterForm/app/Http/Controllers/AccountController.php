<?php


namespace App\Http\Controllers;


use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysqli;


class AccountController extends Controller
{
    private $dbConnection ;


    public function getDBName()
    {
        return $this->dbConnection = session()->get('Database');
    }
    public function login(Request $request){
        $id = "";
            $eData = file_get_contents("php://input");
            $dData = json_decode($eData,true);
            $user = $request["user"];
            $pass = $dData["pass"];
            if($user !="" && $pass != ""){
             $a =    DB::connection($this->getDBName())->select('CALL `stp_CheckUsers`(?,?)',array($user,$pass) );
                $result = "";
                foreach ($a as $item){
                    $result = $item->cnt;
                    if($result>0){
                        $result = "1";
                    }else{
                        $result = "0";
                    }
                    $id = $item->id;
                }
            }else{
                $result = "";
            }
            if($result =="1"){
                $iss ="localhost";
                $iat =time();
                $nbf =$iat +10;
                $exp =$iat +30;
                $aud ="myusers";
                $user_arr_data=array(
                    "id" =>$id,
                    "user" =>$user,
                    "pass" =>$pass
                );
                $payload_info = array(
                    "iss"=>$iss,
                    "iat"=>$iat,
                    "nbf"=>$nbf,
                    "exp"=>$exp,
                    "aud"=>$aud,
                    "data"=> $user_arr_data
                );
                $secret_key = "testKey115";
                $token =  JWT::encode($payload_info,$secret_key,"HS256");
                $response[] = array("result"=> $result,"token"=>$token);
            }else{
                $response[] = array("result"=> $result);
            }
            echo(json_encode($response));
    }


    public function register(Request $request){
            $eData = file_get_contents("php://input");
            $dData = json_decode($eData,true);
            $user = $dData["user"];
            $pass = $dData["pass"];
            $name = $dData["name"];
            if($user !="" && $pass != "" && $name != ""){
                $a =    DB::connection($this->getDBName())->select('CALL `stp_CreateUsers`(?,?,?)',array($user,$pass,$name) );
                $result = "";
                foreach ($a as $item){
                    $result = $item->Success;
                    $id = $item->id;
                }
            }else{
                $result = "";
            }
            $response[] = array("result"=> $result);
            echo(json_encode($response));
    }
}
