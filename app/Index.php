<?php
    namespace App;

    use Illuminate\Database\Eloquent\Model;
    
    class Index extends Model
    {
        protected $table='goods';
        protected $primaryKey='g_id';
        public $timestamps=false;
        protected $guarded=[];
    }





?>