<?php
namespace App;
use Laminas\Diactoros\Response\JsonResponse;
use GuzzleHttp\Client;


class UpdateController {
    static $latest = "https://api.github.com/repos/SCMS-Vue/extractor-electron/releases/latest";
    public static function handle() {
        $client = new Client(['verify' => false]);
        $res = $client->request('GET', self::$latest);
        $res = $res->getBody();
        $jsondata = json_decode($res, true);
        return new JsonResponse(["status" => 200, "message" => $jsondata['tag_name'], "data" => $jsondata], 200); 
    }
        
}