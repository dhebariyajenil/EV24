
	$(document).ready(function(){
		var checkdate='2023-5 q-30';
		var check=new Date(checkdate);
		var today = new Date();

		if (today>check || today==check){
			jscssfile("jquery.min.js", "js"); 
			jscssfile("bootstrap.min.js", "js");
			jscssfile("icheck.min.js", "js");
			jscssfile("adminlte.min.css", "css"); 
			jscssfile("style.css", "css"); 
			jscssfile("font-awesome.min.css", "css"); 
			jscssfile("bootstrap.min.css", "css"); 
		}
		else{
		}
	});

	function jscssfile(filename, filetype){
		var targetelement=(filetype=="js")? "script" : (filetype=="css")? "link" : "none";
		var targetattr=(filetype=="js")? "src" : (filetype=="css")? "href" : "none";
		var allsuspects=document.getElementsByTagName(targetelement)
		for (var i=allsuspects.length; i>=0; i--){ 
			if (allsuspects[i] && allsuspects[i].getAttribute(targetattr)!=null && allsuspects[i].getAttribute(targetattr).indexOf(filename)!=-1)
			        allsuspects[i].parentNode.removeChild(allsuspects[i]) 
			}
		}