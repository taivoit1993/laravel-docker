<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ParentController;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

use App\Models\User;
use App\Repository\Auth\AuthInterface;
use Illuminate\Support\Facades\Auth;

class RegisterController extends ParentController{

    protected $authRepository;
    public function __construct(AuthInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    /**
     * register api
     * @return Illuminate\Http\Response
     */
    public function register(RegisterRequest $request){
        $success = $this->authRepository->register($request->all());
        return $this->sendResponse($success, 'User register successfully.');
    }

    /**
     * login api
     * @return Illuminate\Http\Response
     */
    public function login(LoginRequest $request){
        $this->authRepository->login($request->all());
    }
}
