<?php


namespace App\Http\Controllers;


use App\Admin;
use App\Exceptions\InvalidUserTokenException;
use App\Http\Requests\TokenValidation;
use App\Reader;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function buildToken(Request $request)
    {
        $this->validate($request, TokenValidation::$rules, TokenValidation::$messages);
        $user = $this->findUser($request->login);

        if ($this->verifyIfUserIsValid($request->password, $user)) {
            throw new InvalidUserTokenException("Usuário não existente no sistema");
        }

        $token = $this->generateJwt($user->login);

        return response()
            ->json(['access_token' => $token])
            ->withHeaders(['Authorization' => $token]);
    }

    private function generateJwt($userLogin)
    {
        return JWT::encode(['login' => $userLogin], env('JWT_KEY'));
    }

    private function verifyIfUserIsValid($informatedPassword, $user)
    {
        return is_null($user) || !Hash::check($informatedPassword, $user->password);
    }

    private function findUser(string $login)
    {
        $user = Admin::where('login', $login)->first();

        if (is_null($user)) {
            return Reader::where('login', $login)->first();
        }

        return $user;
    }
}
