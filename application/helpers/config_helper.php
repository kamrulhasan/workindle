<?php  if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );


    function get_services()
    {
        $ci =& get_instance();
        $ci->db->select('*');		
		$ci->db->from('services');
		$ci->db->order_by('orderd', 'ASC');
		$query=$ci->db->get();
		$res=$query->result();
		if($res) return $res;
		else return false;
    }


    function get_site_config($type = 'home')
    {
        $ci =& get_instance();
        $ci->db->select('*');
        $ci->db->where('type', $type);	
		$ci->db->from('site_configs');
		$query=$ci->db->get();
		$res=$query->row();
		if($res) return $res;
		else return false;
    }

    /**
     * @param string $video_link\
     * @param return string|null
     */
    function get_video_id($video_link)
    {
        $videoId ='';
        if($video_link){
            $arr= explode("/", $video_link);
            $lastIndex = count($arr) -1;
            if(isset($arr[$lastIndex]) && is_numeric($arr[$lastIndex])){
                $videoId=$arr[$lastIndex];
            }                            
        }
        return $videoId;
    }
	
    /**
     * @param int $category_id
     * @param string $cageName 
     */
    function get_reg_id($id, $cateName) 
    {
        if($cateName == "" || $id == ""){
            return false;
        }

        if($id < 10){
			$id = "000".$id;
		}else if($id < 100){
			$id = "00".$id;	
		}else if($id < 1000){
			$id = "0".$id;	
		} else {
			$id = $id;
		}

        return $cateName.$id;
    }
	


