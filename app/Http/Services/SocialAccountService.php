<?php

namespace App\Http\Services;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\{User, Profile, Social};
use Carbon\Carbon;
use Str;

class SocialAccountService
{
    public function findOrCreate(ProviderUser $providerUser, $provider)
    {
        $account = Social::whereProvider($provider)
                   ->whereProviderId($providerUser->getId())
                   ->first();

        if ($account) {
            return $account->user;
        } else {

        $user = User::whereEmail($providerUser->getEmail())->first();

        if (! $user) {
            $user = User::create([  
                'email' => $providerUser->getEmail(),
                'name'  => $providerUser->getName(),
                'password' => bcrypt(Str::random(40)),
                'email_verified_at' => Carbon::createFromFormat(config('app.date_format') . ' ' . config('app.time_format'), now())->format('Y-m-d H:i:s'),
            ]);
            $profile = new Profile();
            $user->profile()->save($profile);
        }

        $user->accounts()->create([
            'provider_id'   => $providerUser->getId(),
            'provider' => $provider,
        ]);
        return $user;
        }
    }
}
