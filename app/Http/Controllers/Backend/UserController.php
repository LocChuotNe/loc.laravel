<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Image;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as ImageIntervention;

use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{

    protected $userService;
    protected $userRepository;

    public function __construct(
        UserService $userService,
        UserRepository $userRepository,
        ){
        $this->userService = $userService;
        $this->userRepository = $userRepository;
    }

    public function index(Request $request) {
        $users = $this->userService->with(['image'])->paginate(15);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'data' => $users
            ]);
        }

        $config['seo'] = config('apps.user');
        $config['method'] = 'create';
        $template = 'backend.user.index';
        return view('backend.dashboard.layout', compact(
            'template',
            'users',
            'config'
        ));
    }

    public function create(Request $request) {
        $users = $this->userService->with(['image'])->paginate(15);

        $template = 'backend.user.store';
        $config['seo'] = config('apps.user');
        return view('backend.dashboard.layout', compact(
            'template',
            'config',
        ));
    }

    public function store(StoreUserRequest $request){
        $user = $this->userService->create($request);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => (bool) $user,
                'message' => $user ? 'Thêm mới bản ghi thành công' : 'Thêm mới bản ghi không thành công',
                'data' => $user
            ], $user ? 201 : 400);
        }return $user
            ? redirect()->route('user.index')->with('success', 'Thêm mới bản ghi thành công')
            : redirect()->route('user.create')->with('error', 'Thêm mới bản ghi không thành công');
    }

    public function edit($id){
        $user = $this->userRepository->findById($id);
        // dd($user);
        $users = $this->userService->with(['image'])->paginate(15);

        $template = 'backend.user.store';
        $config['seo'] = config('apps.user');
        $config['method'] = 'edit';
        return view('backend.dashboard.layout', compact(
            'template',
            'config',
            'user'
        ));
    }
}
