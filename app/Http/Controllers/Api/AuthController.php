<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    private $userRepository;

    /**
     * Create a new AuthController instance.
     *
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository) {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
        $this->userRepository = $userRepository;
    }

    /**
     * Validate login details and get a JWT via given credentials.
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request){
        $token = "";
        try {
            if (!$token = $this->userRepository->login($request)) {
                return $this->errorResponse("unauthorized", 401);
            }
        }catch (\Exception $e){
              $this->errorResponse("", $e->getCode());
        }

        return $this->createNewToken($token);
    }

    /**
     * Register a User.
     *
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request) {

        $user = $this->userRepository->create($request);

        return $this->successResponse($user, 200);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout() {

        auth()->logout();

        return $this->successResponse([]);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
