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

  public function editCategory($data, $id){
    $this->name = $data['category-name'];
    $this->user_id = auth()->user()->id;
    $this->symbol = 'fa fa-dollar';
    $this->amount = '0';

    $category = $this->where('id', $id)->update(['name' => $this->name]);

    if($category){
      DB::commit();
      return [
        'success' => true,
        'message' => 'Categoria atualizada com sucesso'
      ];
    }else{
      DB::rollback();
      return [
        'success' => false,
        'message' => 'Falha ao atualizar a categoria, tente novamente'
      ];
    }
  }

  public function deposit($value, $id){
    $balance = auth()->user()->balance;
    $category = auth()->user()->categories()->where('id',$id)->first();

    if($value > $balance->avaiable_amount){
      return [
        'success' => false,
        'message' => 'Valor superior ao saldo disponível',
      ];
    }

    DB::beginTransaction();

    $balance->avaiable_amount -= intval($value);

    $category->amount += intval($value);

    $balance = $balance->save();
    $category = $category->save();

    if($balance && $category){
      DB::commit();
      return [
        'success' => true,
        'message' => 'Depósito feito com sucesso',
      ];
    }else{
      DB::rollback();
      return [
        'success' => false,
        'message' => 'Falha ao fazer o depósito, tente novamente'
      ];
    }
  }

  public function withdraw($value, $id){
    $balance = auth()->user()->balance;
    $category = auth()->user()->categories()->where('id',$id)->first();

    if($value > $category->amount){
      return [
        'success' => false,
        'message' => 'Valor superior ao saldo disponível da categoria',
      ];
    }

    DB::beginTransaction();

    $balance->avaiable_amount += intval($value);

    $category->amount -= intval($value);

    $balance = $balance->save();
    $category = $category->save();

    if($balance && $category){
      DB::commit();
      return [
        'success' => true,
        'message' => 'Saque realizado com sucesso',
      ];
    }else{
      DB::rollback();
      return [
        'success' => false,
        'message' => 'Falha ao realizar o saque, tente novamente'
      ];
    }
  }
}
