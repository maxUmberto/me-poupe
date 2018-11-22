<?php

namespace App;

use App\Models\Category;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Models\Balance;
use App\Models\Historic;
use DB;

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

    public function balance(){
      return $this->hasOne(Balance::class);
    }

    public function historics(){
      return $this->hasMany(Historic::class);
    }

    public function categories(){
      return $this->hasMany(Category::class);
    }

    public function editProfile($data){
      $user = auth()->user();
      DB::beginTransaction();

      //$data = $data->all();

      $update = $user->update($data->all());

      if($update){
        DB::commit();
        return [
          'success' => true,
          'message' => 'Perfil atualizado com sucesso'
        ];
      }else{
        DB::rollback();
        return [
          'success' => true,
          'message' => 'Erro ao atualizar perfil'
        ];
      }
    }
}
