<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Cviebrock\EloquentSluggable\Sluggable;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'parent_id',
        'account_type',
        'company_name',
        'name',
        'slug',
        'login_id',
        'email',
        'password',
        'phone',
        'address',
        'status',
        'expire_password',
       
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

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
    return 'slug';
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function balance(){
        return $this->hasMany(UserBalance::class,'user_id','id');
    }

    public function parent(){
        return $this->hasOne(User::class,'id','parent_id');
    }

    public function userType(){
        return $this->hasMany(Role::class,'id','user_type');
    }

    public static function selfUsers(){
        return User::with('roles','parent')->where('parent_id',auth()->user()->id);
    }
    
    public static function getMyTree(){
        $allusers = User::get();
        $users = User::where('parent_id',12)->get();
        self::formatTree($users,$allusers);
        return $users;
     
    }

    private static function formatTree($users,$allusers){
        foreach($users as $user){
            $user->children = $allusers->where('parent_id',$user->id)->values();
            if($user->children->isNotEmpty()){
                self::formatTree($user->children,$allusers);
            }
        }
    }
}
