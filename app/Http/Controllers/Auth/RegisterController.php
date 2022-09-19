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
     * Register api
     * @property App\Http\Requests\Auth\RegisterRequest
     * @package App\Repository\Auth\AuthRepository
     * @return Illuminate\Http\Response
     */
    public function register(RegisterRequest $request){
        $success = $this->authRepository->register($request->all());
        return $this->sendResponse($success, 'User register successfully.');
    }

    /**
     * Login api
     * @property App\Http\Requests\Auth\LoginRequest
     * @package App\Repository\Auth\AuthRepository
     * @return Illuminate\Http\Response
     */
    public function login(LoginRequest $request){
        if($success = $this->authRepository->login($request->all())){
            return $this->sendResponse($success, 'User login successfully.');
        }
        return $this->sendErrorUnauthorised();
    }
}
