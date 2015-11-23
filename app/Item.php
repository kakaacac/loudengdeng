<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class Item extends Model {
	
	
	protected $fillable;
	
	//protected $fillable = ['taskname','description','deadline','important'];
	/*public function __construct($table){
		
		$this->setTable($table);
		
		parent::__construct();
	}*/
	
	public static function all($table = "null",$columns = array('*'))
	{
		$instance = new static;
		
		$instance->setTable($table);

		return $instance->newQuery()->get($columns);
	}

}
