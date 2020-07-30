<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
     * Checks a Permission
     *
     * @param  String permission Slug of a permission (i.e: manage_user)
     * @return Boolean true if has permission, otherwise false
     */
    public function userCan($permission = null)
    {
        return !is_null($permission) && $this->checkPermission($permission);
    }

    /**
     * Check if the permission matches with any permission user has
     *
     * @param  String permission slug of a permission
     * @return Boolean true if permission exists, otherwise false
     */
    protected function checkPermission($perm)
    {
        $permissions = $this->getAllPernissionsFormUser();
        //dd($permissions);
        $permissionArray = is_array($perm) ? $perm : [$perm];

        return count(array_intersect($permissions, $permissionArray));
    }

    /**
     * Get all permission slugs from all permissions of user role
     *
     * @return Array of permission slugs
     */
    protected function getAllPernissionsFormUser()
    {
        return array_column($this->getPermissoesUserLoggedIn()->toArray(), 'nome');
    }

    /**
     * Get all permission slugs from all permissions loggedIn
     *
     * @return Array of permission slugs and role name
     */
    public function getPermissoesUserLoggedIn()
    {
        return DB::table('users')
        ->join('perfis', 'users.perfil_id', '=', 'perfis.id')
        ->join('perfil_permissao', 'perfis.id', '=', 'perfil_permissao.perfil_id')
        ->join('permissoes', 'perfil_permissao.permissao_id', '=', 'permissoes.id')
        ->select('perfis.nome', 'permissoes.nome')->where('users.id', '=', auth()->user()->id)
        ->distinct()
        ->get();
    }
}
