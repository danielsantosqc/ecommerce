<?php 

namespace Ecommerce;
use Rain\Tpl;

class Page {

	private $tpl;
	private $options = [];
	private $defaults =["data"=> [] ];


    // cria o começo da pagina
	public function __construct($opts = array()){

		$this->options = array_merge($this->defaults, $opts);

		$config = array(
					"tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]."/views/",
					"cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
					"debug"         => false 
				   );

		Tpl::configure( $config );

		$this->tpl = new Tpl;
		
		$this->setData($this->options["data"]);

		$this-> tpl-> draw("header");
	}

	private function setData($data = array()){

		foreach ($data as $key => $value) {
			$this-> tpl->assign($key, $value);
		}
	}

	// cria o corpo da pagina
	public function setTpl($name, $data = array(), $returnHTML = false){

		$this->setData($data);

		return $this -> tpl-> draw($name, $returnHTML);

	}


	// cria o pe da pagina
	public function __destruct(){

		$this->tpl->draw("footer");
	}
}

 ?>