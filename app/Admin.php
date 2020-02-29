<?php
    namespace App;

    use Illuminate\Database\Eloquent\Model;
    
    class Admin extends Model
    {
        protected $table='user';
        protected $primaryKey='uid';
        public $timestamps=false;
        protected $guarded=[];
    }





?>