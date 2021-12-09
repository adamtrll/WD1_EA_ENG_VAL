<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts() {
        return $this->hasMany(Post::class, 'author_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function followers() {
        return $this->belongsToMany(User::class, 'followers', 'followed_id', 'follower_id')
            ->withTimestamps();
    }

    public function followings() {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'followed_id')
        ->withPivot(['rating'])
        ->withTimestamps();
    }

    public function isFollowing(User $user) {
        return $this->followings()->where('followed_id', $user->id)->count() > 0;
    }

    public function getAvatarAttribute() {
        $gravatarHash = md5($this->email);
        return "https://gravatar.com/avatar/{$gravatarHash}?d=identicon&s=500";
    }
}
