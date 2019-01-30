<title>_Project Management_</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="col-sm-9">
    <div class="col-sm-8"><p><h1 class="bigbox3"><!INSTITUTE/ORGANIZATION NAME HERE>Indian Institute of Information Technology - Guwahati</h1><p>
       <nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="http://www.iiitg.ac.in">IIITG</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li><a href="index.php">HOME</a></li>
	      <li class="dropdown">
	        <a class="dropdown-toggle" data-toggle="dropdown" href="#">PROJECTS
	        <span class="caret"></span></a>
	        <ul class="dropdown-menu">
	          <li><button type="button" class="textbox btn-group-justified" data-toggle="modal" data-target="#">ON GOING</button></li>
	          <li><button type="button" class="textbox btn-group-justified" data-toggle="modal" data-target="#">COMPLETED</button></li>
	          <li><button type="button" class="textbox btn-group-justified" data-toggle="modal" data-target="#">UPCOMMING</button></li>
		      <li><button type="button" class="textbox btn-group-justified" data-toggle="modal" data-target="#">OBSOLETE</button></li>
	        </ul>
	      </li>
	    </ul>
			<div id="about_us" class="modal fade" role="dialog">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title bigbox2 btn-group-justified">Project Created By</h4>
			      </div>
			      <div class="modal-body">
			      <table class="table"><tr><td>Abhinav Jha</td></tr><tr><td>Chandan Kumar Chaudhary</td></tr><tr><td>Kaustav Goswami</td></tr></table>
			    </div>
			    <div class="modal-footer">
			    <button type="button" class="btn btn-group-justified" data-dismiss="modal">Close</button>
			  </div>
			</div>
		       </div>
		    </div>

			<div id="dbinfo" class="modal fade" role="dialog">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title bigbox2 btn-group-justified">Database Information</h4>
			      </div>
			      <div class="modal-body">
			      <table class="table"><tr><td>Created in MySQL</td></tr><tr><td>Database Name: Project</td></tr><tr><td>Project Databse Management System | v.0.3b</td></tr></table>
			    </div>
			    <div class="modal-footer">
			    <button type="button" class="btn btn-group-justified" data-dismiss="modal">Close</button>
			  </div>
			</div>
		       </div>
		    </div>
	    <form class="navbar-form navbar-left" action="/action_page.php">
   	     <div class="input-group">
       	      <input type="text" class="form-control" placeholder="Search">
              <div class="input-group-btn">
	        <button class="btn btn-default" type="submit">
		  <i class="glyphicon glyphicon-search"></i>
		</button>
	      </div>
	    </div>
	    </form> 
	      <ul class="nav navbar-nav navbar-right">
	        <li class="dropdown">
	          <a class="dropdown-toggle" data-toggle="dropdown" href="#">ABOUT US
	          <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><button type="button" class="textbox btn-group-justified" data-toggle="modal" data-target="#about_us">ORIGINAL AUTHORS</button></li>
		    <li><button type="button" class="textbox btn-group-justified" data-toggle="modal" data-target="#dbinfo">DATABASE INFORMATION</button></li>
	          </ul>
	        </li>
	      </ul>
	    </ul>
	  </div>
	</nav> 
    </div>