<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:40',Rule::unique('users')->ignore($user->id)],
            'bio' => ['nullable','string','max:240'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'gender' => ["sometimes","nullable",Rule::in(['male','female','non binary','other'])]
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            //$user->updateProfilePhoto($input['photo']);

            $image = $input['photo'];

                    $url = 'https://s3.us-east-2.amazonaws.com/proyectobigchungus/';

                    if(($user->profile_photo_path != null && strpos($user->profile_photo_path,'https://picsum.photos/500/500') === false)) {
                        Storage::disk('s3')->delete("images/perfiles/".substr($user->profile_photo_path,72));
                    }

                    $extension = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
                    $image_name = strval($user->id) . '.' . $extension;
                    $image->storeAs('images/perfiles',$image_name,'s3');
                    
                    //Storage::disk('s3')->put("/images/".$image_name,File::get($image));
                    $user->profile_photo_path = $url .  'images/perfiles/' .$image_name;

                    $user->save();
                
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);

        } else {
            
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'biography' => $input['bio']?$input['bio']:null,
                'gender' => $input['gender']?$input['gender']:null,
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
