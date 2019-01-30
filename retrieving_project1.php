<?php

include_once 'connect.php';
include_once 'functions.php';
$q = ($_GET['q']);



			
		        echo "
		        <br>
		        
		        <div class=\"jumbotron\"><h2><a href=#>\"$q\"</a></h2></div>
		        <br>
		        <table class=\"table\">
		        <tr>
		        <td><p class=\"highbox2\">Author</p></td> ";


		        	
		        $project=$q;
		        $p_details=get_project_details($project);
		        //print_r($p_details);
		        foreach($p_details as $key=>$value)
		        {
		        	if($key=='p_id')
		        		$p_id=$value;
		        		if($key=='field')
		        			$field=$value;
		        			if($key=='dept')
		        				$dept=$value;
		        }
		        $students=fetchstudent($p_id);
		        
		        // print_r($students);
		        $advisor=fetchadvisor($p_id);
		        
		        
		        if(sizeof($students)!=0){
		        foreach ($students as $student)
		        {
		        	foreach ($student as $key=>$value)
		        	{
		        		
		        		if($key=='name')
		        			echo "<td class=\"highbox\">".$value. "</td>";
		        			
		        	}
		        }
		        }
		        
		        if(sizeof($advisor)!=0){
		        foreach ($advisor as $ad)
		        {
		        	if(sizeof($ad)!=0){
		        	foreach ($ad as $key=>$value)
		        	{
		        		
		        		if($key=='name')
		        			echo "<td class=\"highbox\">".$value ."</td>";
		        			
		        	}
		        }
		        }
		        }
		        
		        
 echo "
		       
		        </tr>
		        
		        <tr>
		        <td><p class=\"highbox2\">Details</p></td>
		        <td><p class=\"highbox\"><!GET THE LINK></p></td>
		        </tr>
		        </table>
		        </div>";


?>






