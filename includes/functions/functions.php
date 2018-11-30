<?php


/*
    ======================================================================
    ==  this function select items in database [take a parameter] V1.0  ==
    ==  $select = item i want to select it                              ==
    ==  $from   = place that i will select from it                      ==
    ==  $value  = value i select depend on it                           ==
    ======================================================================

  */

   function selectItem($select , $from , $values = null , $condition = null , $getAll = true){

   	global $connect;

   if($condition === null){
	   $statment = $connect->prepare("SELECT $select FROM $from");
       $statment->execute();

   }else{
       $statment = $connect->prepare("SELECT $select FROM $from WHERE $condition");
       $statment->execute($values);
   }

   if($getAll){
       $res = $statment->fetchAll();
   }else{
       $res = $statment->fetch();
   }
   	return $res;

   }
  /*
    ======================================================================
    ==  this function check items in database [take a parameter] V1.0   == 
    ==  $select = item i want to select it                              ==
    ==  $from   = place that i will select from it                      ==
    ==  $value  = value i select depend on it                           ==
    ======================================================================

  */

   function checkItem($select , $from , $value){

   	global $connect;
   	$statment = $connect->prepare("SELECT $select FROM $from WHERE $select = ?");
   	$statment->execute(array($value));
   	$count = $statment->rowCount();

   	return $count;

   }




   /*
    ======================================================================================
    ==  this function use to redirect a user to specific page V1.0              		== 
    ==  $msg          = page message                                             		==
    ==  $re_msg       = redirect message                                    		    ==
    ==  $distination  = url of page that direct to it                   				==
    ==  $time         = amount of time that spend before direct                 		==
    ==  $class        = the class that make a syle on the message based on framework    ==
    ======================================================================================

  */

    function redirect($msg , $re_msg = 'you will redirect to ' , $distination = 'index page' , $time = 3 , $class = ''){

    	echo "<div class= ' " . $class . " ' >"  . $msg    . "</div>";

    	if(isset($_SERVER['HTTP_REFERE']) && $_SERVER['HTTP_REFERE']!= ''){
    		$distination = 'previous page';
    		$url = $_SERVER['HTTP_REFERE'];
    	}else{
    		$url = 'index.php';
    	}

    	echo "<div class= ' " . "alert alert-success" . " ' >"  . $re_msg . $distination . " after " . $time . "s" . "</div>";

    	header("refresh:$time;url=$url");
    	exit();

    }

    /*
    ======================================================================
    ==  this function count items in database [take a parameter] V1.0   == 
    ==  $item      = item i want to count it                            ==
    ==  $place     = place that i will select from it                   ==
    ==  $condition = my condition i count depend on it                  ==
    ======================================================================

  */

    function countItem($item,$place,$condition = null){

    	global $connect;

    	if($condition === null){
    		$statment_2 = $connect->prepare("SELECT COUNT($item) FROM $place");

    	}else{
    		$statment_2 = $connect->prepare("SELECT COUNT($item) FROM $place WHERE $condition");
    	}

    	$statment_2->execute();

    	return $statment_2->fetchColumn();

    }

    /*
    =============================================================================================
    ==  this function get latest specific record/coulumn in database [take a parameter] V1.0   == 
    ==  $select = item i want to select it                                                     ==
    ==  $from   = place that i will select from it                     						   ==
    ==  $value  = value i select depend on it                           					   ==
    =============================================================================================

  */

    function latestItem($select,$from,$limit,$order){

    	global $connect;
    	$statment_3 = $connect->prepare("SELECT $select FROM $from ORDER BY $order DESC LIMIT $limit");

    	$statment_3->execute();
     	$data = $statment_3->fetchAll();

     	return $data;

    }


?>
