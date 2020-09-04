<?php


namespace App\Http\Controllers;


use App\Services\AdminService;
use App\Services\ReaderService;
use Illuminate\Http\Request;

class LoginController
{
    /**
     * @var AdminService
     */
    private $adminService;

    /**
     * @var ReaderService
     */
    private $readerService;

    /**
     * LoginController constructor.
     * @param AdminService $adminService
     * @param ReaderService $readerService
     */
    public function __construct()
    {
        $this->adminService = new AdminService();
        $this->readerService = new ReaderService();
    }

    public function verifyAdminCredentials(Request $request)
    {
        $admin = $this->adminService->verifyLoginInfo(
            $request->login, $request->password);

        if (is_null($admin)) {
            return [
                'status' => 'ERROR',
                'message' => 'Dados incorretos'
            ];
        }

        return [
            'status' => 'SUCCESS',
            'id' => $admin->id
        ];
    }

    public function verifyReaderCredentials(Request $request)
    {
        $reader = $this->readerService->verifyLoginInfo(
            $request->login, $request->password);

        if (is_null($reader)) {
            return [
                'status' => 'ERROR',
                'message' => 'Dados incorretos'
            ];
        }

        return [
            'status' => 'SUCCESS',
            'id' => $reader->id
        ];
    }
}
