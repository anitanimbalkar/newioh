<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Xjqgridcomponent extends Controller {
	public function action_index()
	{
		$content     = View::factory('components/xjqgridcomponent');
		
		$height = $this->request->post("height");
		$width = $this->request->post("width");	
		$name = $this->request->post("name");
		$label = $this->request->post("label");
		if($this->request->post("usetemplate") == ''){
			$useTemplate = 'false';
			$data = '';
		}else{
			$useTemplate = $this->request->post("usetemplate");
			$data = $this->request->post("data");
		}
		$content->bind('useTemplate',$useTemplate); 
		$content->bind('data',$data); 
		$tablename = $this->request->post("tablename");
		$content->bind('tablename',$tablename); 
		$columnnames=$this->request->post("columnnames");		
        $columns = $this->request->post('columninfo');
		$whereclause = $this->request->post('whereclause');
		$groupby = $this->request->post('groupby');
		$editbtnenable = $this->request->post('editbtnenable');
		$savebtnenable = $this->request->post('savebtnenable');
		$deletebtnenable = $this->request->post('deletebtnenable');
		$sortname = $this->request->post('sortname');

		$group_name = $this->request->post('group_name');
		$flag = $this->request->post('flag');

		$sortorder = $this->request->post('sortorder');
		$formcolmodel = $this->request->post('formcolmodel');
		$datatype = $this->request->post('datatype');
		if($this->request->post('search'))
		{
			if($this->request->post('search') == "true")
			{
				$array_columnnames = explode(',', $columnnames);
				if($this->request->post('previousvaluessearch') != "") 
				{
					$count=0;
					$whereclauseNew="";
					foreach($array_columnnames as $data)
					{
						if($count == 0)
							$whereclauseNew = $whereclauseNew."[$data,like,%".$this->request->post('previousvaluessearch')."%]".$whereclause;
						else
							$whereclauseNew = $whereclauseNew."(or)[$data,like,%".$this->request->post('previousvaluessearch')."%]".$whereclause;
						$count++;
					}
					$whereclause=urlencode($whereclauseNew);
				}
				else
				{
					$whereclause=$whereclause;
				}
		}
		}
	   // echo( $formcolmodel);
	    
		
		//request
		$content->bind('name',$name);
		
		$content->bind('columnnames',$columnnames); 
		$content->bind('colurl',$colurl);
		$content->bind('label',$label); 
		$content->bind('columns',$columns);
		$content->bind('whereclause',$whereclause);
		$content->bind('groupby',$groupby);
		$content->bind('height',$height);
		$content->bind('width',$width);
		$content->bind('editbtnenable',$editbtnenable);
		$content->bind('deletebtnenable',$deletebtnenable);
		$content->bind('savebtnenable',$savebtnenable);
		$content->bind('sortname',$sortname);
		$content->bind('sortorder',$sortorder);
		$content->bind('formcolmodel',$formcolmodel);
		$content->bind('datatype',$datatype);
		$content->bind('group_name',$group_name);
		$content->bind('flag',$flag);

		
		
		$this->response->body($content);
	}
}
