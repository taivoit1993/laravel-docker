<?php
namespace App\Http\Controllers;

class ParentController extends Controller{
    /**
     * success response method
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result,$message){
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];


        return response()->json($response, 200);
    }

    /**
     * error response method
     *
     * @return \Illuminate\\Http\Response
     */
    public function sendError($error, $errorMessage = [], $code = 404){
        $response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }

    public function sendErrorUnauthorised($code=401){
        $response = [
            'success' => false,
            'message' => "Unauthorised"
        ];
        return response()->json($response, $code);
    }
}
