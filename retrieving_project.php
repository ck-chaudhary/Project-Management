<?php


include_once 'init.php';
$q = ($_GET['q']);


echo "
<br>
		    <div class=\"jumbotron\"><h2><a href=# id=\"title\">$q</a></h2></div>
		    <br>
		    <table class=\"table\">
		      <tr>
		        <td class=\"highbox2\">Authors</td>";
		        
			
		        	
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
				
				
		        if(sizeof($students)>0)
		        {
		        foreach ($students as $student)
		        {
		        	foreach ($student as $key=>$value)
		        	{
		        		
		        				if($key=='name') 
		        					echo "<td class=\"highbox\">".$value. "</td>";
		        			
		        	}
		        }}
		        
		        if(sizeof($advisor)>0)
		        {
		        foreach ($advisor as $ad)
		        {
		        	foreach ($ad as $key=>$value)
		        	{
		        		
		        		if($key=='name') 
		        			echo "<td class=\"highbox\">".$value ."</td>";
		        			
		        	}
		        }
		        }
		        
		        
		        echo "
		       
			<td>
			";
		        if($user_data['role']==1)
		        {
		        echo "
			<button type=\"button\" class=\"btn btn-info btn-group-justified btn-lg\" data-toggle=\"modal\" data-target=\"#addModal\">Add new Author</button>
			<div id=\"addModal\" class=\"modal fade\" role=\"dialog\">
			  <div class=\"modal-dialog\">
			    <div class=\"modal-content\">
			      <div class=\"modal-header\">
			        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
			        <h4 class=\"modal-title bigbox2\">Add a New Author</h4>
			      </div>
			      <div class=\"modal-body\">
			      <form action=\"edit.php?mode=author&project=$project\" method=\"post\"><input type=\"text\" name=\"nauthor\" class=\"textbox\"placeholder=\"User Name\"><input type=\"submit\" class=\"bigbox3\"></form>
			    </div>
			    <div class=\"modal-footer\">
			    <button type=\"button\" class=\"btn btn-group-justified\" data-dismiss=\"modal\">Close</button>
			  </div>
			</div>
		       </div>
		    </div></td>
";
		        }
		        echo "
		      </tr>
		      <tr>
		        <td class=\"highbox2\">Department Association</td>
			<td class=\"highbox\">$dept</td>
			
			<div id=\"dept\" class=\"modal fade\" role=\"dialog\">
			  <div class=\"modal-dialog\">
			    <div class=\"modal-content\">
			      <div class=\"modal-header\">
			        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
			        <h4 class=\"modal-title bigbox2\">New Department Name</h4>
			      </div>
			      <div class=\"modal-body\">
			      <form><input type=\"text\" name=\"ndept\" class=\"textbox\" placeholder=\"Department\"><input class=\"bigbox2\" type=\"submit\"></form>
			    </div>
			    <div class=\"modal-footer\">
			    <button type=\"button\" class=\"btn btn-group-justified\" data-dismiss=\"modal\">Close</button>
			  </div>
			</div>
		       </div>
		    </div><td>
		      </tr>
		      <tr>
		        <td class=\"highbox2\">Fields Associated</td>
			<td class=\"highbox\">$field</td>
			
			<div id=\"fieldModal\" class=\"modal fade\" role=\"dialog\">
			  <div class=\"modal-dialog\">
			    <div class=\"modal-content\">
			      <div class=\"modal-header\">
			        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
			        <h4 class=\"modal-title bigbox2\">New Field</h4>
			      </div>
			      <div class=\"modal-body\">
			      <form><input type=\"text\" name=\"nfield\" class=\"textbox\" placeholder=\"Field Name\"><input class=\"bigbox2\" type=\"submit\"></form>
			    </div>
			    <div class=\"modal-footer\">
			    <button type=\"button\" class=\"btn btn-group-justified\" data-dismiss=\"modal\">Close</button>
			  </div>
			</div>
		       </div>
		    </div> <td>
		      </tr> 
		      <tr>
		        <td class=\"highbox2\">Investors</td>
			<td class=\"highbox\"><!GET THE FIELD FROM THE DB></td>
			<td> <button type=\"button\" class=\"btn  btn-group-justified btn-info btn-lg\" data-toggle=\"modal\" data-target=\"#investModal\">Add new Investor</button>
			<div id=\"investModal\" class=\"modal fade\" role=\"dialog\">
			  <div class=\"modal-dialog\">
			    <div class=\"modal-content\">
			      <div class=\"modal-header\">
			        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
			        <h4 class=\"modal-title bigbox2\">New Investor</h4>
			      </div>
			      <div class=\"modal-body\">
			      <form action=\"edit.php?mode=invest\" method=\"post\"><input type=\"text\" name=\"ninvest\" class=\"textbox\" placeholder=\"Investor Name\"><input class=\"bigbox2\" type=\"submit\"></form>
			    </div>
			    <div class=\"modal-footer\">
			    <button type=\"button\" class=\"btn btn-group-justified\" data-dismiss=\"modal\">Close</button>
			  </div>
			</div>
		       </div>
		    </div><td>
		      </tr>
		        <td>
			</table><br><table class=\"table\"><tr><td><p class=\"rightbox\">Is it Completed?</p></td><td><p class=\"textbox\">Inform Your Adminstrator.</p></tr></td></table>
		<div class=\"jumbotron\"><h2>Abstract</h2><p><!GET THE ABSTRACT FROM !0!0!0!0!0!SOMEWHERE>Abstract Text Here</p></div>
	    
";


?>

