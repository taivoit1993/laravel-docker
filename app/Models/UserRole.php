<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model{
  protected $table = 'users_roles';
   /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
      'user_id',
      'role_id',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
      
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
     
  ];

  public function roles(){
    return $this->belongsToMany(Role::class,'role_id');
  }
}