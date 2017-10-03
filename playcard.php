<!DOCTYPE html>
<html>
<head>
	<title>quiz up</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="css/playcard.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Kalam" rel="stylesheet">
</head>
<script>
	var score=0;
				var t=0;
				time();
				function time()
				{
					var id = setInterval(frame,1000);
					function frame()
					{
						t++;
						document.getElementById("timer").innerHTML=t;
						if(t>1000)
						{
							clearInterval(id);
							window.location.href="log-in.php";
					    }
                    }
 				}
			    function show1(z)
				{
					show();
					function show(){
						var x= new XMLHttpRequest();
				        x.onreadystatechange = function() 
				        {
				            if (this.readyState == 4 && this.status == 200)
				             { 
								data = this.responseText.split ( "[BRK]" );
								document.getElementById("option1").innerHTML = data[1];
								document.getElementById("option2").innerHTML = data[2];
								document.getElementById("option3").innerHTML = data[3];
					 			document.getElementById("option4").innerHTML = data[4];
					 			document.getElementById("box").innerHTML = data[0];
					            var k=data[5];
					 			check(k);
				            }
				        };
				        x.open("GET","data.php?",true);
				        x.send();
				    }

			    	function check(k)
			    	{  console.log(z);
			    		console.log(k);
			    		if(z==k)
			    			score=score+10;
			    		document.getElementById("score").innerHTML=score;
					}
    			}
</script>
<body class="background" onload = "show1();">
	<div class="row">
		<nav><a href=""><i class="fa fa-arrow-left back"></i></a>Quiz Play</nav>
				<div class="col-mid-12 questionDisplay">
					<div class="score" id = "score">SCORE<br>
					100</div>
					<div class="time" id = "timer">TIME<br>
					20s</div>
					<div class="box" id= "box"></div>
				</div>
		</div>
		<div class="row">
				<div class="col-mid-12 optionsDisplay">
					<div class="col-mid-6 AB">
						<div class="A" id = "option1" onclick="show1(this.id)"></div>
					</div>
						<div class="col-mid-6 AB"> 
						<div class="B" id = "option2" onclick="show1(this.id)"></div> 
					</div>
					<div class="col-mid-6 CD">
						<div class="C" id  = "option3" onclick="show1(this.id)"></div> 
					</div>
					<div class="col-mid-6 CD">
						<div class="D" id = "option4" onclick="show1(this.id)"></div> 
					</div>
				</div>
		</div>
</body>
</html>