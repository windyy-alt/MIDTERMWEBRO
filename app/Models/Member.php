<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'email', 'phone'];


    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}