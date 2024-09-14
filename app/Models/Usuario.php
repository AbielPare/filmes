<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model implements Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'admin'
    ];


    function getAuthIdentifierName()
    {
        return 'id';
    }

    function getAuthIdentifier()
    {
        return $this->id;
    }

    function getAuthPassword()
    {
        return $this->password;
    }

    function getAuthPasswordName()
    {
        
    }
    function getRememberToken()
    {

    }
    function setRememberToken($value)
    {

    }
    function getRememberTokenName()
    {

    }


    public function getIsAdminAttribute()
    {
        return $this->admin; // Ou o nome do campo correto no seu banco de dados
    }

}

