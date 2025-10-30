<?php
namespace App\Models\Api;
use App\Core\Model;

class ClimaTempoApi extends Model {
    
    private $cep;

    public function setCep($cep) 
    {
        $this->cep = $cep;
    }

    public function getClimaTempo()
    {
        // $curl =curl_init();
        // curl_setopt_array($curl, [
        //     CURLOPT_URL => "viacep.com.br/ws/" . $this->cep . "/json/",
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_CUSTOMREQUEST => 'GET'                
        // ]);

        // $response = curl_exec($curl);
        // curl_close($curl);

        // $response = json_decode($response);

        // return $response;

    }
    

}
