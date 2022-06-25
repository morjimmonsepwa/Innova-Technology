<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_group extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasOne(User::class,'id','id_user');
    }

    public static function diferentes($id){
       return user::whereNotIn('id',
            function ($query) use ($id){
                $query->select('id_user')
                ->from('detail_groups')
                ->where('id_group',$id)
                ->get();
            }
        )->get();
    }

}
