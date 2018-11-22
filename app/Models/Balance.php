<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Balance extends Model
{
  protected $fillable = [
    'user_id','avaiable_amount',
  ];

    public function deposit($value){
      DB::beginTransaction();

      //Recebe o saldo atual do usuário antes do depósito
      $totalBefore = $this->amount ? $this->amount : 0;

      //Atualiza o valor do saldo do usuário
      //$this->amount += number_format(intval($value), '2', ',', '');
      $this->amount += intval($value);
      $this->avaiable_amount += intval($value);

      //Salva no banco de dados
      $deposit = $this->save();

      $historic = auth()->user()->historics()->create(
        [
          'type' => 'I',
          'amount' => $value,
          'amount_before' => $totalBefore,
          'amount_after' => $this->amount,
          'date' => date('Y-m-d'),
          'time' => date('H:i:s'),
        ]
      );

      if($deposit && $historic){
        DB::commit();
        return [
          'success' => true,
          'message' => 'Depósito feito com sucesso'
        ];
      }else{
        DB::rollback();
        return [
          'success' => false,
          'message' => 'Falha ao fazer o depósito, tente novamente'
        ];
      }

    }

    public function withdraw($value){
      DB::beginTransaction();

      $totalBefore = $this->amount;

      $this->amount -= intval($value);
      $this->avaiable_amount -= intval($value);

      $withdraw = $this->save();

      $historic = auth()->user()->historics()->create(
        [
          'type' => 'O',
          'amount' => $value,
          'amount_before' => $totalBefore,
          'amount_after' => $this->amount,
          'date' => date('Y-m-d'),
          'time' => date('H:i:s'),
        ]
      );

      if($withdraw && $historic){
        DB::commit();
        return [
          'success' => true,
          'message' => 'Saque realizado com sucesso'
        ];
      }else{
        DB::rollback();
        return [
          'success' => false,
          'message' => 'Falha ao fazer o saque, tente novamente'
        ];
      }
    }
}
