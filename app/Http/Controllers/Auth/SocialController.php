<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Services\SocialAccountService;

class SocialController extends Controller
{
    private $service;

    public function __construct(SocialAccountService $service)
    {
        $this->service = $service;
    }
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirect($provider)
    {
        // Получение поставщика OAuth из конфигурации services, 
        $providerKey = Config::get('services.'.$provider);
        // Если нет конфигурации 
        if (empty($providerKey)) {
            return redirect('/login')
                ->withError('No Such Provider Yet');
        }
        // Перенаправление пользователя к поставщику OAuth, 
        return Socialite::driver($provider)->stateless(true)->redirect();
    }

    /**
     * Obtain the user information from Provider.
     *
     * @return Response
     */
    public function callback($provider)
    {
        try {
            $user = Socialite::driver($provider)->stateless()->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }
        $authUser = $this->service->findOrCreate(
            $user,
            $provider
        );
        auth()->login($authUser, true);
        return redirect('home')->with('success', 'You have successfully registered! ');
    }
}
