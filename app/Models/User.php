<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail

{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
      * Relationship between user and animes
      *
      * @return Illuminate\Database\Eloquent\Model Every anime seen by that user, with that anime info included
      */
    public function animes() {
        return $this->belongsToMany(Anime::class,'watches')->withPivot('watchStatus','score','favourite');
    }

    /**
      * Relationship between user and mangas
      *
      * @return Illuminate\Database\Eloquent\Model Every manga seen by that user, with that manga info included
      */
    public function mangas() {
        return $this->belongsToMany(Manga::class,'reades')->withPivot('readStatus','score','favourite');
    }

        /**
      * Relationship between user and messages
      *
      * @return Illuminate\Database\Eloquent\Model Every message sent by that user, with that recipient info added
            */
    public function messages_sent() {
         return $this->belongsToMany(User::class, 'messages', 'emisor', 'recipient')
                ->withPivot('message','created_at','id'); // or to fetch accepted value
    }

            /**
      * Relationship between user and messages
      *
      * @return Illuminate\Database\Eloquent\Model Every message recieved by that user, with that emisor info added
            */
    public function messages_recieved() {
         return $this->belongsToMany(User::class, 'messages', 'recipient', 'emisor')
                ->withPivot('message','created_at','id'); // or to fetch accepted value
    }


    /**
     * Relationship between users
     *
     * @param boolean $confirmado Value that define if you want to get accepted or not accepted friendships
     * @return Illuminate\Database\Eloquent\Model Every friendship the user has started
     */
    function friendsOfMine($confirmado)
    {
        if($confirmado == true) {
                 return $this->belongsToMany(User::class, 'friends', 'user1_id', 'user2_id')
                 ->wherePivot('confirmation_date','<>',null)
                ->withPivot('user1_id','confirmation_date'); // or to fetch accepted value
        } else {
                return $this->belongsToMany(User::class, 'friends', 'user1_id', 'user2_id')
                 ->wherePivot('confirmation_date','=',null)
                ->withPivot('user1_id','confirmation_date'); // or to fetch accepted value
        }

    }

       /**
     * Relationship between users
     *
     * @param boolean $confirmado Value that define if you want to get accepted or not accepted friendships
     * @return Illuminate\Database\Eloquent\Model Every friendship the user was invited to
     */
    function friendOf($confirmado)
    {
      if($confirmado == true) {
                 return $this->belongsToMany(User::class, 'friends', 'user2_id', 'user1_id')
                 ->wherePivot('confirmation_date','<>',null)
                ->withPivot('user2_id','confirmation_date'); // or to fetch accepted value
        } else {
                return $this->belongsToMany(User::class, 'friends', 'user2_id', 'user1_id')
                 ->wherePivot('confirmation_date','=',null)
                ->withPivot('user2_id','confirmation_date'); // or to fetch accepted value
        }
    }


    /**
     * Functions that allows you to call $user->friends relationship
     *
     * @return void
     */
    public function getFriendsAttribute()
    {
        if ( ! array_key_exists('friends', $this->relations)) $this->loadFriends();

        return $this->getRelation('friends');
    }

    protected function loadFriends()
    {
        if ( ! array_key_exists('friends', $this->relations))
        {
            $friends = $this->mergeFriends();

            $this->setRelation('friends', $friends);
        }
    }

    protected function mergeFriends()
    {
        return $this->friendsOfMine->merge($this->friendOf);
    }
}
