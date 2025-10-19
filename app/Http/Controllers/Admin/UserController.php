<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\User;

final class UserController
{
    //
    public function users(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $users = User::all();

        return view('admin.user.index', ['users' => $users]);
    }
}
