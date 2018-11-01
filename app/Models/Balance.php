<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Balance extends Model
{
    public function deposit($value){
      DB::beginTransaction();

      //Recebe o saldo atual do usuário antes do depósito
      //$totalBefore += $this->amount ? $this->amount : 0;

      //Atualiza o valor do saldo do usuário
      //$this->amount += number_format(intval($value), '2', ',', '');
      $this->amount += intval($value);

      //Salva no banco de dados
      $deposit = $this->save();

      if($deposit){
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
}
