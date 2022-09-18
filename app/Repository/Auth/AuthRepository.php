<?php
namespace App\Repository\Auth;

use App\Models\User;
use App\Repository\BaseRepository;
use Illuminate\Support\Facades\Auth;

class AuthRepository extends BaseRepository implements AuthInterface{

    public function register($attribute = [])
    {
        $attribute['password'] = bcrypt($attribute['password']);
        $user = $this->model->create($attribute);
        $success['token'] =  $user->createToken('MyApp');
        $success['name'] =  $user->name;
        return $success;
    }

    public function login($attribute = [])
    {
        if(Auth::attempt(['email' => $attribute['email'], 'password' => $attribute['password']])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            $success['name'] =  $user->name;
            return $this->sendResponse($success, 'User login successfully.');
        }
        else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }

    public function getModel()
    {
        return User::class;
    }
}
