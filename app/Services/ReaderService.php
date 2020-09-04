<?php


namespace App\Services;

use App\Reader;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ReaderService extends DefaultService
{
    public function __construct()
    {
        $this->resourceName = Reader::class;
    }

    public function save(array $resourceData)
    {
        $resourceData['password'] = Hash::make($resourceData['password']);
        return parent::save($resourceData);
    }

    public function verifyLoginInfo(string $login, string $password): ?object
    {
        $readers = DB::table('readers')
            ->where('login', $login)
            ->first();

        if (isset($readers->password)) {
            return Hash::check($password, $readers->password) ? $readers : null;
        }

        return $readers;
    }
}
