<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user()
    {
        return $this->hasone(User::class, 'id', 'user_id')->withDefault();
    }
    public function company()
    {
        return $this->hasone(Company::class, 'id', 'company_id')->withDefault();
    }
}
