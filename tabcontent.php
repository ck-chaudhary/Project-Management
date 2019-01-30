<html>
<title>
</title>

<head>
<script>
function showproject(str) {

	console.log("in this function " + str.value);
  if (str.value=="") {
    document.getElementById("myProject").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("myProject").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","retrieving_project.php?q="+str.value,true);
  xmlhttp.send();
}

function showproject1(str) {

	console.log("in this  function " + str.value);
  if (str.value=="") {
    document.getElementById("project_run").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("project_run").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","retrieving_project1.php?q="+str.value,true);
  xmlhttp.send();
}
</script>

</head>

</html>


<div class="tab-content">
        <div id="nfeed" class="tab-pane fade in active">
	<div style="position:relative;overflow-y:scroll;width:100%;height:100%;">
	   <?php include 'images.php';?>
	  <!FOR PROJECTS IN PUBLIC DISPLAY ALL IN BUNCH OF THREE>
          <h2>Lastest Publications</h2>
	  <div class="col-md-3">
	  <ul class="nav nav-pills nav-stacked">
	    <li class="active"><a data-toggle="tab" href="#home">Paper</a></li>
	  <?php //include_once 'newsfeed.php';?>
	    
	    
	    	    <?php 
	    include 'connect.php';

              $sql = "SELECT p_id,name FROM project where status=1";
              $result = $connection->query($sql);
              ?>
              
              
              
  
   <?php 

            while( $row = mysqli_fetch_array($result)):;
            


            ?>
                <!tr>
                    <!td><?php // echo $row[0]; ?><!/td>
                    <!td><?php //echo $row[1]; ?><!/td>                  

                <a href="#home"><input type="button" onclick="showproject1(this)" name="<?php echo $row[1]; ?>" value="<?php echo $row[1]; ?>"></a>

                </tr>
                </br>
                
                 <?php endwhile; ?>
               
       
        
       
	  
	  </ul>
		</div>
		<div class="col-md-9">
		<div class="tab-content">
		  <div id="project_run" class="tab-pane fade in active"><p class="highbox2">No Project Selected</p>
		  
	    </div>
	    
	    </div></div>
        </div></div>
        <div id="myP" class="tab-pane fade">
          <?php
	    
	     if (logged_in()==true)
	    {?>
       <div class="col-md-3">
	  <ul class="nav nav-pills nav-stacked">
	  <!NUMBER INCREASES WITH THE TOTAL NUMBER OF THE PROJECTS>
	    <li class="active"><a data-toggle="tab" href="#home">Title of the project</a></li>
	    
	    	<?php 
	    	$titles=fetchProjectAll($_SESSION['user_id'],$user_data['role']);
	    	
	    	if(sizeof($titles)>0)
	    	{
	    	$title =array();
	    	foreach ($titles as $t)
	    	{
	    		foreach ($t as $key=>$value)
	    		{
	    			if($key =='name')
	    			{
	    				$title[]=$value;
	    			}
	    		}
	    	}
	    	
	    	
	    	
	    
	    
	    if (sizeof($title) > 0)
	    {
	    
	    	$c=0;
	    	foreach ($title as $t)
	    	{
	    		
	    		?>
	    			
                     <a href="#home"><input type="button" onclick="showproject(this)" id="title_selected" name="<?php echo $t; ?>" value="<?php echo $t; ?>"></a>



                
	    		<?php 
	    		
	    		
	    		
	    	}
	    	
	    }}
	    
	    ?>
	    
	   
	  </ul>
		</div>
		<div class="col-md-9">
		<div class="tab-content">
		  <div id="myProject" class="tab-pane fade in active"><p class="highbox2">No Project Selected</p>
		  </div>
	      </div></div>
	       <?php 
          }
        else 
        {
        	echo "<h2 class=\"bigbox3\"> You need to login to view it<h2><br>";
        }?>       
        </div>
       
        
      	<div id="newP" class="tab-pane fade">
      	<?php if(logged_in()==true && $user_data['role']==1)
        {?>
	  <br>
  	  <form action="new_project_insert.php" method="post">
	  <div class="col-sm-12">
	    <div class="col-sm-6" style="background-color:#d3d3d3;">
	      <table class="table">
	        <tr>
	          <td><p class="rightbox">AIM</p></td>
	          <td><p><input type="text" name="paim" class="textbox btn-group-justified"></p></td>
	        </tr>
	        <tr>
	          <td><p class="rightbox">TITLE</p></td>
	          <td><p><input type="text" name="ptitle" class="textbox btn-group-justified"></p></td>
	        </tr>
	        <tr>
	          <td><p class="rightbox">FIELD ASSOCIATED</p></td>
	          <td><p><input type="text" name="pfield" class="textbox btn-group-justified"></p></td>
	        </tr>
	        <tr>
	          <td><p class="rightbox">DEPARTMENT</p></td>
	          <td><p><input type="text" name="pdept" class="textbox btn-group-justified"></p></td>
	        </tr>
	      </table>
	      <h3 class="bigbox2">Association</h3>
	      
	      <div class="panel-group">
		<div class="panel panel-default">
                  <div class="panel-heading" id= "advisors">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" href="#collapse1">Add X Advisors</a>
                      
                      <input type ="number" class="textbox" id="no">
                      <input type="button" value ="Go" class="bigbox2" onclick="loadN()"> 
                     
                        <script type="text/javascript">
	            function loadN()
	            {
					var n=document.getElementById("no").value;
					var html1 = "";
					for(var i = 1; i <= n; i++) {
						html1 = html1 + "<tr><td><p>USER NAME"+ i +" : </p></td><td><p><input type=\"text\" class=\"textbox btn-group-justified\" name=\"adv"+i+"\" placeholder=\"Advisor User Name Required\"></p></td></tr>";
					}
					document.getElementById("html1advisor").innerHTML = html1;
	            }
	            </script>
                    </h4>
                  </div>
                  <div id="collapse1" class="panel-collapse collapse">
	            <!FOR X NUMBER OF ADVISORS, THE COLLAPSE WILL INCREASE>
	           
                    <div class="panel-body"><table id="html1advisor"></table></div>
	          </div>
	        </div>
	      </div>
	      <div class="panel-group">
	        <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" href="#collapse2">Add Y Students</a>
                      
                      <input type ="number" class="textbox" id="ns">
                      <input type="button" value ="Go" class="bigbox2" onclick="loadS()"> 
                     
                        <script type="text/javascript">
	            function loadS()
	            {
					var n=document.getElementById("ns").value;
					var html1 = "";
					for(var i = 1; i <= n; i++) {
						html1 = html1 + "<tr><td><p>USER NAME"+ i +" : </p></td><td><p><input type=\"text\" class=\"textbox btn-group-justified\" name=\"stu"+i+"\" placeholder=\"Student User Name Required\"></p></td></tr>";
					}
					document.getElementById("html1student").innerHTML = html1;
	            }
	            </script>
                      
                    </h4>
                  </div>
                  <div id="collapse2" class="panel-collapse collapse">
  	            <!FOR Y NUMBER OF STUDENTS, THE COLLAPSE WILL INCREASE>
                    <div class="panel-body"><table id="html1student"></table></div>
	          </div>
	        </div>
	      </div>
	    </div>
	    <div class="col-sm-6">
	      <div class="form-group">
	        <!Look Here><textarea class="form-control" rows="22" id="pabstract" placeholder="Jot down a Basic Idea/Abstract of the Project. Automatically sent to all group members."></textarea>
	      </div>
	      <div class="panel-group">
		<div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" href="#collapse3">Add Z Investors</a>
                    </h4>
                  </div>
                  <div id="collapse3" class="panel-collapse collapse">
	            <!FOR X NUMBER OF ADVISORS, THE COLLAPSE WILL INCREASE>
                    <div class="panel-body"><table><tr><td><p class="bigbox3">USER NAME</p></td><td><p><input type="text" class="textbox btn-group-justified" name="invZ" placeholder="Organization Name"></p></td></tr></table></div>
	          </div>
	        </div>
	      </div>

	    </div>
	  </div>
	  <div class="col-sm-12">
	    <div class="col-sm-9">
	     <div class="form-group">
	       <!Now Here><textarea class="form-control" rows="10" id="psketch" placeholder="Sketch Pad"></textarea>
	      </div> 
	    </div>
	    <div class="col-sm-3" style="background-color:#d9d9d9;">
	      <div class="form-group">
	        <textarea class="form-control" rows="8" id="pref" placeholder="Quick References"></textarea>
	      </div> 
	      <input type="submit" class="bigox2">	
	    </div>
	  </form>
	  <?php  }
	  else 
	  {
	  	echo "<h2 class=\"bigbox3\">Restricted to advisors only</h2<br>";
	  }?>
	  </div>
	  
	</div>
