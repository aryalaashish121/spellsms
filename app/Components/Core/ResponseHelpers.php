<?php

namespace App\Components\Core;

Trait  ResponseHelpers
{
    protected $statusCode;
    protected $response = [];

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function buildResponse($success, $message, $data = null)
    {
        $this->response = ["message" => $message, "success" => $success, "data" => $data];
        return $this;
    }

    public function respondWithError($message = null)
    {
        return response()->json(
            ['success' => false, 'message' => $message]
        );
    }

    /**
     * Returns a Unauthorized response.
     *
     * @param  string  $message
     * @return \Illuminate\Http\Response
     */
    public function respondUnauthorized($message = 'Unauthorized action.')
    {
        return $this->setStatusCode(403)
            ->respondWithError($message);
    }

     /**
     * Returns a 200 response.
     *
     * @param  object  $message = null
     * @return \Illuminate\Http\Response
     */
    public function respondSuccess($message = null, $additional_data = [])
    {
        // $message = is_null($message) ? __('messages.success') : $message;
        $data = ['success' => true, 'message' => $message];

        if (!empty($additional_data)) {
            $data = array_merge($data, $additional_data);
        }

        return response()->json($data, $this->getStatusCode() ?? 200);
    }

    /**
     * Returns a 200 response.
     *
     * @param  array  $data
     * @return \Illuminate\Http\Response
     */
    public function respond()
    {
        return response()->json($this->response, $this->getStatusCode() ?? 200);
    }


    public function respondOk($data, $additional_data = [])
    {
        return $this->buildResponse(true, "Data Found Successfully", $data)->respond();
    }

    public function respondNotFound($data = null, $additional_data = [])
    {
        return $this->setStatusCode(404)->buildResponse(false, "Data Not Found", $data)->respond();
    }

    public function respondError($error, $additional_data = [])
    {
        $response = ["message" => "Validator Error", "success" => false, "data" => null, "error" => $error];

        if(!empty($additional_data))
            $response = array_merge($response, $additional_data);
        
        return $this->setStatusCode(400)->respond($response);
    }

    public function respondCreated($data = null, $message = "Added Sucessfully.")
    {
        return $this->setStatusCode(201)->buildResponse(true, $message, $data)->respond();
    }

    public function respondUpdated($message = "Resource Updated")
    {
        return $this->setStatusCode(200)->buildResponse(true, $message, null)->respond();
    }

    public function respondBadRequest($message = "Bad request")
    {
        return $this->setStatusCode(400)->buildResponse(false, $message)->respond();
    }

    public function respondDeleted($message = "Resource deleted.")
    {
        return $this->setStatusCode(200)->buildResponse(true, $message)->respond();
    }
}