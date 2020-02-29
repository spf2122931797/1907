<?php
    namespace App;

    use Illuminate\Database\Eloquent\Model;
    
    class UserModel extends Model
    {
        protected $table='use';
        protected $primaryKey='uid';
        public $timestamps=false;
        protected $guarded=[];
    }





?>