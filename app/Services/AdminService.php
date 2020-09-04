<?php


namespace App\Services;


use App\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminService extends DefaultService
{
    public function __construct()
    {
        $this->resourceName = Admin::class;
    }

    public function save(array $resourceData)
    {
        $resourceData['password'] = Hash::make($resourceData['password']);
        return parent::save($resourceData);
    }

    public function verifyLoginInfo(string $login, string $password): ?object
    {
        $admin = DB::table('admins')
            ->where('login', $login)
            ->first();

        if (isset($admin->password)) {
            return Hash::check($password, $admin->password) ? $admin : null;
        }

        return $admin;
    }
}
