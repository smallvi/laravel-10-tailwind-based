<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.create')->only(['create', 'store']);
        $this->middleware('can:admin.read')->only(['index', 'show']);
        $this->middleware('can:admin.update')->only(['edit', 'update']);
    }

    public function index()
    {
        $admins = User::query()->admin()->paginate(15);
        // dd($admins);
        return view('admin.admins.index',compact('admins'));
    }
}
