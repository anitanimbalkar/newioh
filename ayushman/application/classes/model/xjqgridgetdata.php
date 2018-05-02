<?php defined('SYSPATH') or die('No direct script access.');
class Model_Xjqgridgetdata extends kohana_Ayushmanorm {
    protected $_table_name = 'patientemr';
    public function getdata($page,$limit,$sidx,$sord,$table,$columns,$whereclause,$groupby){


        $modelnm = "Model_".ucwords(trim($table));
        $objmodel = new $modelnm;

        $count= $this->getdatafrmdb("count_all",$objmodel,$whereclause,$groupby, '','','','');


        if(!$sidx) $sidx =1;
        if( $count > 0 && $limit > 0)
        {
            $total_pages = ceil($count/$limit);
        }
        else
        {
            $total_pages = 0;
        }

        if ($page > $total_pages)
            $page=$total_pages;
        $start = $limit*$page - $limit;

        if($start <0) $start = 0;

        $result= $this->getdatafrmdb("find_all",$objmodel,$whereclause,$groupby,$sidx, $sord , $start , $limit);

        header("Content-type: text/xml;charset=utf-8");
        $s = "<?xml version='1.0' encoding='utf-8'?>";
        $s .=  "<rows>";
        $s .= "<page>".$page."</page>";
        $s .= "<total>".$total_pages."</total>";
        $s .= "<records>".$count."</records>";


        //echo $columns;
        if(!(strpos($columns, ',') === false ))
        {
            $colarr = explode (",",$columns);

        }
        foreach($result as $res) {

            for ($i=0;$i<sizeof($colarr);$i++  )
            {

                if(!(strpos($colarr[$i],'[') === false))
                {
                    $columntext = substr(trim( $colarr[$i]),1);
                    $coltext = substr(trim($columntext), 0, -1);

                    if(!(strpos($coltext,'{') === false))
                    {
                        $arrcoltext = explode('{',$coltext );
                        if(!(strpos($arrcoltext[0],'(') === false))
                        {
                            $imagesrc = substr(trim($arrcoltext[0]),1);
                            $imagesrc = substr(trim($imagesrc),0,-1);
                            $displaynm = "&lt;image height='20' style='position:centre' src=".$imagesrc."/&gt;";
                        }
                        else
                            $displaynm = $arrcoltext[0];
                        $url =  substr(trim($arrcoltext[1]), 0, -1);
                        //echo $url;
                    }
                    else
                        $url = $coltext;


                    if(!(strpos($url, '&') === false ))
                    {
                        $url = str_replace('&','&amp;',$url );
                    }
                    //echo "after = ".$url;
                    if(!(strpos($url, '<') === false ))
                    {
                        $urlparts = explode ("<",$url);
                        $urlfirstpart = $urlparts[0];
                        ///ayushman/cviewemr/index/?puid=<appointmentid>&docud=<docid>&role=pat
                        $urltext = $urlfirstpart;
                        //echo $urltext;
                        for($j=1;$j<sizeof($urlparts);$j++)
                        {
                            $urlval = explode( ">", $urlparts[$j]);
                            $urltext = $urltext. $res->$urlval[0].$urlval[1];
                        }
                    }
                    else
                    {
                        $urltext = $url ;
                    }
                    if(!(empty ($url)))
                        $s .= "<cell>&lt;a href= ". $urltext."  style='color: #0000FF;;font:bold;'&gt; ". $displaynm  ." &lt;/a&gt;</cell>";
                }
                else
                {
                    if($i===0)
                        $s .= "<row id='". $res->$colarr[$i]."'>";
                    $s .= "<cell>". $res->$colarr[$i]."</cell>";
                }

            }
            $s .= "</row>";
        }

        $s .= "</rows>";

        return $s;

    }
    public function getjsondata($page,$limit,$sidx,$sord,$table,$columns,$whereclause,$groupby){


        $modelnm = "Model_".ucwords(trim($table));
        $objmodel = new $modelnm;

        $count= $this->getdatafrmdb("count_all",$objmodel,$whereclause,$groupby, '','','','');
        $limit=$count;

        if(!$sidx) $sidx =1;
        if( $count > 0 && $limit > 0)
        {
            $total_pages = ceil($count/$limit);
        }
        else
        {
            $total_pages = 0;
        }

        if ($page > $total_pages)
            $page=$total_pages;
        $start = $limit*$page - $limit;

        if($start <0) $start = 0;

        $result= $this->getdatafrmdb("find_all",$objmodel,$whereclause,$groupby,$sidx, $sord , $start , $limit);
        //echo $columns;
        if(!(strpos($columns, ',') === false ))
        {
            $colarr = explode (",",$columns);

        }
        $res1 = array();
        array_push($res1,$colarr);
        foreach($result as $res) {
            $s = array();
            for ($i=0;$i<sizeof($colarr);$i++  )
            {
                array_push($s,$res->$colarr[$i]);
            }
            array_push($res1,$s);
        }
        return $res1;

    }
    public function exportdata($page,$limit,$sidx,$sord,$table,$columns,$whereclause,$groupby){
        $modelnm = "Model_".ucwords(trim($table));
        $objmodel = new $modelnm;

        $count= $this->getdatafrmdb("count_all",$objmodel,$whereclause,$groupby, '','','','');
        $limit=$count;

        if(!$sidx) $sidx =1;
        if( $count > 0 && $limit > 0)
        {
            $total_pages = ceil($count/$limit);
        }
        else
        {
            $total_pages = 0;
        }

        if ($page > $total_pages)
            $page=$total_pages;
        $start = $limit*$page - $limit;

        if($start <0) $start = 0;

        $result= $this->getdatafrmdb("find_all",$objmodel,$whereclause,$groupby,$sidx, $sord , $start , $limit);
        //echo $columns;
        if(!(strpos($columns, ',') === false ))
        {
            $colarr = explode (",",$columns);

        }
        $res1 = array();
        array_push($res1,$colarr);
        foreach($result as $res) {
            $s = array();
            for ($i=0;$i<sizeof($colarr);$i++  )
            {
                array_push($s,$res->$colarr[$i]);
            }
            array_push($res1,$s);
        }
        return $res1;

    }
    public function getfootablejsondata($page,$limit,$sidx,$sord,$table,$columns,$whereclause,$groupby){
        $modelnm = "Model_".ucwords(trim($table));
        $objmodel = new $modelnm;
        $count= $this->getdatafrmdb("count_all",$objmodel,$whereclause,$groupby, '','','','');
        $limit=$count;
        if(!$sidx) $sidx =1;
        if( $count > 0 && $limit > 0)
            {$total_pages = ceil($count/$limit);}
        else
            {$total_pages = 0;}

        if ($page > $total_pages)
            $page=$total_pages;
        $start = $limit*$page - $limit;

        if($start <0) $start = 0;

        $result= $this->getdatafrmdb("find_all",$objmodel,$whereclause,$groupby,$sidx, $sord , $start , $limit);
        $res1 = array();
        foreach($result as $res) {
            $s =  (object) array($res->_object );
            foreach ( $s as $s1){
                array_push($res1,$s1);
            }
        }
        return $res1;
    }
    public function getdatafrmdb($query,$objmodel,$whereclause,$groupby,$sidx, $sord , $start , $limit)
    {
        if(!(empty( $whereclause)))
        {
            //echo $whereclause;
            if(!(strpos($whereclause, ']') === false ))
            {
                $wherearr = explode("]", $whereclause);

                for($k=0;$k<sizeof($wherearr)-1;$k++ )
                {
                    //echo " ".$k."=". $wherearr[$k];
                    //[doctorname,like,doctorsa](or)[doctorid,=,3]
                    if(!(strpos($wherearr[$k], '(or)') === false ))
                    {
                        //	echo "got or". $wherearr[$k];

                        $wharr = explode(")", $wherearr[$k]);
                        $where = explode(",", substr(trim($wharr[1]),1));

                        $wherec = $where[0];
                        $whereopr = $where[1];
                        $wvalue =$where[2] ;

                        $objmodel->or_where($wherec ,$whereopr ,$wvalue );
                    }
                    else
                    {
                        //	echo "and condition";


                        $where = explode(",", substr(trim($wherearr[$k]),1));
                        $wherec = $where[0];
                        $whereopr = $where[1];
                        $wvalue =$where[2] ;
                        $objmodel->where($wherec ,$whereopr ,$wvalue );
                    }
                }
                //die();
                if(strcmp($query,'find_all')==0)
                {
                    $objmodel->ORDER_BY ($sidx, $sord)->LIMIT( $limit)->offset($start);
                    if( !(empty($groupby) ))
                        $result = $objmodel ->group_by($groupby)-> $query();
                    else
                        $result = $objmodel -> $query();

                }
                else if(strcmp($query,'count_all')==0)
                {
                    if( !(empty($groupby) ))
                        $result = $objmodel ->group_by($groupby)-> $query();
                    else
                        $result = $objmodel -> $query();

                }
                //$result = $objmodel ->where('patientid','=','34')->where('appointmentid','>=','3')->find_all();
            }
        }
        else
        {
            if(strcmp($query,'find_all')==0)//order_by('idcolnm',asc/desc),limit()
            {
                $objmodel->ORDER_BY ($sidx, $sord)->LIMIT( $limit)->offset($start);
                if( !(empty($groupby) ))
                    $result = $objmodel ->group_by($groupby)-> $query();
                else
                    $result = $objmodel -> $query();
            }
            else if(strcmp($query,'count_all')==0)
            {
                if( !(empty($groupby) ))
                    $result = $objmodel ->group_by($groupby)-> $query();
                else
                    $result = $objmodel -> $query();
            }

        }
        return $result;
    }
}
