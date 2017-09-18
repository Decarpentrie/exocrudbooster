<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminLogementController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "logement";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"typeOfLogement","name"=>"fk_type_logement","join"=>"type_logement,type"];
			$this->col[] = ["label"=>"Superficie","name"=>"superficie"];
			$this->col[] = ["label"=>"Adresse","name"=>"adresse"];
			$this->col[] = ["label"=>"Description","name"=>"description"];
			$this->col[] = ["label"=>"Tarif","name"=>"tarif"];
			$this->col[] = ["label"=>"etage","name"=>"etage"];
			$this->col[] = ["label"=>"nbPiece","name"=>"piece"];
			$this->col[] = ["label"=>"modaliter","name"=>"fk_modalite","join"=>"modalite,type"];
			$this->col[] = ["label"=>"energie","name"=>"fk_classe_energetique","join"=>"classe_energetique,classe"];
			$this->col[] = ["label"=>"ges","name"=>"fk_ges","join"=>"GES,classe"];
			$this->col[] = ["label"=>"meubler","name"=>"fk_meubler","join"=>"meubler,oui/non"];
			$this->col[] = ["label"=>"vehicule","name"=>"fk_emplacement_vehicule","join"=>"emplacement_vehicule,type"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Adresse','name'=>'adresse','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Superficie','name'=>'superficie','type'=>'textarea','validation'=>'required|string|min:3|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Description','name'=>'description','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Tarif','name'=>'tarif','type'=>'textarea','validation'=>'required|string|min:3|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'nombre d\'étage','name'=>'etage','type'=>'textarea','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-9'];
			$this->form[] = ['label'=>'nombre de piece','name'=>'piece','type'=>'textarea','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-9'];
			$this->form[] = ['label'=>'meubler','name'=>'fk_meubler','type'=>'radio','validation'=>'required','width'=>'col-sm-9','datatable'=>'meubler,oui/non'];
			$this->form[] = ['label'=>'modaliter','name'=>'fk_modalite','type'=>'radio','validation'=>'required','width'=>'col-sm-9','datatable'=>'modalite,type'];
			$this->form[] = ['label'=>'Type de logement','name'=>'fk_type_logement','type'=>'radio','validation'=>'required|','width'=>'col-sm-9','datatable'=>'type_logement,type'];
			$this->form[] = ['label'=>'ges','name'=>'fk_ges','type'=>'radio','validation'=>'required','width'=>'col-sm-9','datatable'=>'GES,classe'];
			$this->form[] = ['label'=>'classe energetique','name'=>'fk_classe_energetique','type'=>'radio','validation'=>'required','width'=>'col-sm-9','datatable'=>'classe_energetique,classe'];
			$this->form[] = ['label'=>'Emplacement vehicule','name'=>'fk_emplacement_vehicule','type'=>'radio','validation'=>'required','width'=>'col-sm-9','datatable'=>'emplacement_vehicule,type'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Adresse','name'=>'adresse','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Superficie','name'=>'superficie','type'=>'textarea','validation'=>'required|string|min:3|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Description','name'=>'description','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tarif','name'=>'tarif','type'=>'textarea','validation'=>'required|string|min:3|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'nombre d\'étage','name'=>'etage','type'=>'textarea','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'nombre de piece','name'=>'piece','type'=>'textarea','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'meubler','name'=>'fk_meubler','type'=>'radio','validation'=>'required','width'=>'col-sm-9','datatable'=>'meubler,oui/non'];
			//$this->form[] = ['label'=>'modaliter','name'=>'fk_modalite','type'=>'radio','validation'=>'required','width'=>'col-sm-9','datatable'=>'modalite,type'];
			//$this->form[] = ['label'=>'Type de logement','name'=>'fk_type_logement','type'=>'radio','validation'=>'required|','width'=>'col-sm-9','datatable'=>'type_logement,type'];
			//$this->form[] = ['label'=>'ges','name'=>'fk_ges','type'=>'radio','validation'=>'required','width'=>'col-sm-9','datatable'=>'GES,classe'];
			//$this->form[] = ['label'=>'classe energetique','name'=>'fk_classe_energetique','type'=>'radio','validation'=>'required','width'=>'col-sm-9','datatable'=>'classe_energetique,classe'];
			//$this->form[] = ['label'=>'Emplacement vehicule','name'=>'fk_emplacement_vehicule','type'=>'radio','validation'=>'required','width'=>'col-sm-9'];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }

	    //By the way, you can still create your own method in here... :) 

	 //    public function getIndex() {
  	
  //  			if(!CRUDBooster::isView()) CRUDBooster::denyAccess();
    
  //  			$data = [];
  //  			$data['page_title'] = 'Products Data';
  // 			$data['result'] = DB::table('products')->orderby('id','desc')->paginate(10);
  //  			$this->cbView('your_custom_view_index',$data);
		// }


	}