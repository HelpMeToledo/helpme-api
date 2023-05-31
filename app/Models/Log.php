<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $guarded = ['id']; 

    public function criarLog($usuario, $situacao, $request)
    {
        $input = $request->all();

        if (array_key_exists("password", $input)) $input['password'] = bcrypt($input['password']);
        
        $info_log = [
            "situacao" => $situacao,
            "http_verbo" => $request->method(),
            "http_url" => $request->fullUrl(),
            "id_user" => $usuario,
            "ip_address" => $request->ip(),
            "request_body" => json_encode($input)
        ];

        $log = $this->create($info_log);

        return $log;
    }
}
