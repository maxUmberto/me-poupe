<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
  protected $fillable = [
    'name', 'symbol', 'amount',
  ];

  public function createCategory($dados){
    DB::beginTransaction();

    $this->name = $dados['category-name'];
    $this->user_id = auth()->user()->id;
    $this->symbol = 'fa fa-dollar';
    $this->amount = '0';

    $category = $this->save();

    if($category){
      DB::commit();
      return [
        'success' => true,
        'message' => 'Categoria criada com sucesso'
      ];
    }else{
      DB::rollback();
      return [
        'success' => false,
        'message' => 'Falha ao criar a categoria, tente novamente'
      ];
    }
  }
}
