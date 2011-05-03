<HTML>
<HEAD>
<?php
    $server = "javasaurcom.fatcowmysql.com";
	$username = "musicweb";
	$password = "password";
	$db = "musicweb";
	$conn = mysql_connect($server, $username, $password, $db);
	mysql_select_db($db);
    if(! empty( $_POST )){
        if($_GET['cid'] == ""){
            $chartQuery = "INSERT INTO charts (title, description) VALUES (\"".$_POST['webTitle']."\", \"".$_POST['description']."\")";
            mysql_query($chartQuery);
            $cid = mysql_insert_id();
            print "<script>";
            print "window.location=\"index.php?cid=".$cid."\";";
            print "</script>";
        }else{
            $cid = $_GET['cid'];
        }
    }
$nodeHeight = 50;
$nodeWidth = 40;
$nodesX =  20;
$nodesY = 10;
?>

<link href="skin/jplayer.blue.monday.css" rel="stylesheet" type="text/css" />
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

<script type="text/javascript" src="js/jquery.jplayer.min.js"></script>
<title>Music Web</title>
<?php $width = 60;?>
<style>
body{
    font-family:"helvetica", "arial", sans-serif;
    font-size:.8em;
    width:100%;
}
#logo{
    background-image:url('musicweb.jpg');
    width:246px;
    height: 194px;
    background-repeat:no-repeat;
}
h2{
    position:absolute;
    top:5px;
    left:300px;
    color:#888;
    font-weight:bold;   
}
#description{
    color:#333;
    font-weight:bold;
    position:absolute;
    top:35px;
    left:300px;
}
#player{
    position:absolute;
    top:65px;
    left:300px;

}
#drunkwalk{

    position:absolute;
    top:15px;
    left:740px;

}
#saveWeb{
    position:absolute;
    top:60px;
    left:740px;
}
.button{
    font-weight:bold;
    font-size:1.2em;
    padding:7px;
    background:#eee;
    border:3px solid #888;
    -moz-border-radius: 15px;
    border-radius: 15px;
}
.button a{
    color: #4b8d40;
}
.draggable{
    position:absolute;
    width:<?php print $nodeWidth; ?>px;
    height:<?php print $nodeHeight; ?>px;
    padding:10px;
    background:#ccc;
    font-size:.8em;
    color:#000;
    z-index:10;
    -moz-border-radius: 15px;
    border-radius: 15px;
}
.dot{
    width:5px;
    height:5px;
    background:#000;
    position:absolute;
}
#null{
    background:#fff;
    border:3px dashed #ccc;
}
#artistSearch{
    position:absolute;top:100px;
    height:300px;
    width:500px;
    border:5px solid black;
    -moz-border-radius: 15px;
    border-radius: 15px;
    background:#fff;
    font-size:1.2em;
    font-weight:bold;
    margin:30px;
    padding:30px;
    left:-250px;
    margin-left:50%;

}
#url{
    display:none;
}
#title{
    display:none;
}

#artistSearchButton{
    height:30px;
    font-size:1.3em;

}
#artistSearchName{
    height:30px;
    width:320px;
    font-size:1.3em;
    color:#777;
}
#canvasHolder{
	position:absolute;
	z-index:-1;
	width: 2000px;
	height:1000px;
	border:1px solid black;
}
#canvasHolder canvas{
}
<?php
$size = 80;

for ($j = 1; $j < 20; $j=$j+1){
    if($j < 10){
        $top = $size*$j+150;
        print ".y".$j."{top:".$top."px;}\n";
    }
        $oddleft = $size*$j;
        $evenleft = $size*$j + $size/2;

        print ".x".$j.".even{left:".$evenleft."px;} ";
        print ".x".$j.".odd{left:".$oddleft."px;} ";
}

?>
</style>
<script type="text/javascript">
	$(function() {
		$( ".draggable" ).draggable({
            stop: function(event, ui){deleteNode($(this).attr('id'));},
            revert: true
        });
	});


//<![CDATA[
$(document).ready(function(){

	$("#jquery_jplayer_1").jPlayer({
		ready: function () {
			$(this).jPlayer("setMedia", {
				mp3: "protomen_hoperidesalone.mp3"
			}).jPlayer("pause");
		},
		ended: function (event) {
			$(this).jPlayer("play");
		},
		swfPath: "js",
		supplied: "mp3"
	});
	var canvas = document.getElementById("webCanvas");
	if (canvas.getContext){
		var ctx = canvas.getContext("2d");
        ctx.beginPath();
		ctx.strokeStyle = "#555";
        ctx.lineWidth = 3;
		var ypos = 0;
		for(var i = 0; i < <?php print $nodesY ?>; i=i+1){
			ypos = (i+.5)*<?php print $nodeHeight; ?>+30*i+40;
			ctx.moveTo(0, ypos);
			ctx.lineTo(2000, ypos);
			ctx.stroke();
		}
		var slope = (20+<?php print $nodeHeight; ?>)/(20+<?php print $nodeWidth; ?>);
		ctx.moveTo(100, 75);
		ctx.lineTo(425, 745);
		ctx.stroke();
		ctx.moveTo(100, 255);
		ctx.lineTo(345, 745);
		ctx.stroke();
		ctx.moveTo(100, 415);
		ctx.lineTo(265, 745);
		ctx.stroke();
		ctx.moveTo(100, 575);
		ctx.lineTo(185, 745);
		ctx.stroke();
		ctx.moveTo(165, 65);
		ctx.lineTo(505, 745);
		ctx.stroke();
		ctx.moveTo(245, 65);
		ctx.lineTo(585, 745);
		ctx.stroke();
		ctx.moveTo(325, 65);
		ctx.lineTo(665, 745);
		ctx.stroke();
		ctx.moveTo(405, 65);
		ctx.lineTo(745, 745);
		ctx.stroke();
		ctx.moveTo(485, 65);
		ctx.lineTo(825, 745);
		ctx.stroke();
		ctx.moveTo(565, 65);
		ctx.lineTo(905, 745);
		ctx.stroke();
		ctx.moveTo(645, 65);
		ctx.lineTo(985, 745);
		ctx.stroke();
		ctx.moveTo(725, 65);
		ctx.lineTo(1065, 745);
		ctx.stroke();
		ctx.moveTo(805, 65);
		ctx.lineTo(1145, 745);
		ctx.stroke();
        ctx.moveTo(885, 65);
        ctx.lineTo(1225, 745);
		ctx.stroke();
        ctx.moveTo(965, 65);
        ctx.lineTo(1305, 745);
		ctx.stroke();
        ctx.moveTo(1045, 65);
        ctx.lineTo(1385, 745);
		ctx.stroke();
ctx.moveTo(1125, 65);
        ctx.lineTo(1465, 745);
		ctx.stroke();
ctx.moveTo(1205, 65);
        ctx.lineTo(1545, 745);
		ctx.stroke();
ctx.moveTo(1285, 65);
        ctx.lineTo(1625, 745);
		ctx.stroke();
;
		ctx.stroke();
		ctx.moveTo(185, 65);
		ctx.lineTo(105, 225);
		ctx.stroke();
		ctx.moveTo(265, 65);
		ctx.lineTo(105, 385);
		ctx.stroke();
		ctx.moveTo(345, 65);
		ctx.lineTo(105, 545);
		ctx.stroke();
		ctx.moveTo(425, 65);
		ctx.lineTo(105, 745);
		ctx.stroke();
		ctx.moveTo(505, 65);
		ctx.lineTo(185, 745);
		ctx.stroke();
		ctx.moveTo(585, 65);
		ctx.lineTo(265, 745);
		ctx.stroke();
		ctx.moveTo(665, 65);
		ctx.lineTo(345, 745);
		ctx.stroke();
		ctx.moveTo(745, 65);
		ctx.lineTo(425, 745);
		ctx.stroke();
		ctx.moveTo(825, 65);
		ctx.lineTo(505, 745);
		ctx.stroke();
		ctx.moveTo(905, 65);
		ctx.lineTo(585, 745);
		ctx.stroke();
		ctx.moveTo(985, 65);
		ctx.lineTo(665, 745);
		ctx.stroke();
		ctx.moveTo(1065, 65);
		ctx.lineTo(745, 745);
		ctx.stroke();
		ctx.moveTo(1145, 65);
		ctx.lineTo(825, 745);
		ctx.stroke();
		ctx.moveTo(1225, 65);
		ctx.lineTo(905, 745);
		ctx.stroke();
		ctx.moveTo(1305, 65);
		ctx.lineTo(985, 745);
		ctx.stroke();
		ctx.moveTo(1385, 65);
		ctx.lineTo(1065, 745);
		ctx.stroke();
	}
});
//]]>
</script>
</HEAD>
<BODY>
<script>
//Declaring global variables
var conn1 = new Array();
var conn2 = new Array();
var nodes = new Array();
var nodeInfo = new Array();
function getCoordsFromClass(theClass){
    var myclass = theClass.split(/\s+/);
    var coords = new Array();
    for(var i in myclass){
        if(myclass[i].indexOf('x') == '0'){
            //This is the coord that indicates the x pos
            coords[0] = myclass[i].substr(1);
        }
        if(myclass[i].indexOf('y') == '0'){
            //This is the coord that indicates the y pos
            coords[1] = myclass[i].substr(1);
        }
    }
    return coords;
}

function drawLine(x1, y1, x2, y2){
//Not that great -- should be replaced with javascript that draws lines in <canvas>
    x1 = x1*80+15;x2 = x2*80+15;
    if(parseInt(y1)%2 == 0){
        x1 = x1+45;
    }
    if(parseInt(y2)%2 == 0){
        x2 = x2+45;
    }
    y1 = y1*80-15;y2 = y2*80-15;
	var canvas = document.getElementById("webCanvas");
	if (canvas.getContext){
		var ctx = canvas.getContext("2d");
        ctx.beginPath();
		ctx.strokeStyle = "#000";
		ctx.lineWidth = 10;
		ctx.moveTo(x1, y1);
		ctx.lineTo(x2, y2);
		ctx.stroke();
		}
}

</script>
<div id="logo"></div>
<div id="drunkwalk" class="button"><a href="javascript:playTheWeb(conn1[0], 5)">Listen To The Web</a></div>
<div id="saveWeb" class="button"><a href="javascript:save()">Save The Web</a></div>
<div id="player">
		<div id="jquery_jplayer_1" class="jp-jplayer"></div>

		<div class="jp-audio">
			<div class="jp-type-single">
				<div id="jp_interface_1" class="jp-interface">
					<ul class="jp-controls">
						<li><a href="#" class="jp-play" tabindex="1">play</a></li>
						<li><a href="#" class="jp-pause" tabindex="1">pause</a></li>
						<li><a href="#" class="jp-stop" tabindex="1">stop</a></li>
						<li><a href="#" class="jp-mute" tabindex="1">mute</a></li>
						<li><a href="#" class="jp-unmute" tabindex="1">unmute</a></li>
					</ul>
					<div class="jp-progress">
						<div class="jp-seek-bar">
							<div class="jp-play-bar"></div>
						</div>
					</div>
					<div class="jp-volume-bar">
						<div class="jp-volume-bar-value"></div>
					</div>
					<div class="jp-current-time"></div>
					<div class="jp-duration"></div>
				</div>
				<div id="jp_playlist_1" class="jp-playlist">
					<ul>
						<li id="songInfo">Double-Click on a band to get started!</li>
					</ul>
				</div>
			</div>
		</div>
</div>
<div id="canvasHolder"><canvas id="webCanvas" 	width=1990 height=990></canvas></div>
<div id="web">

<?php
for ($i = 1; $i < 20; $i=$i+1){
    for ($j = 1; $j < 10; $j=$j+1){
        if($j%2 == 0){
            print "<div class=\"node draggable even x".$i." y".$j."\" id=\"null\"><div id=\"name\"></div><div id=\"url\"></div><div id=\"title\"></div></div>";
        }else{
            print "<div class=\"node draggable odd x".$i." y".$j."\" id=\"null\"><div id=\"name\"></div><div id=\"url\"></div><div id=\"title\"></div></div>";
        }
    }
}
	
?>
<script>
function coordsToPix(coordx, coordy){
	//If is even
	var pixels = new Array();
	var height = <?php print $nodeHeight; ?>;
	var width = <?php print $nodeWidth; ?>;
	
	pixels[0] = width*(coordx+.5)+width*15;
	pixels[1] = height*(coordy+.5)+height*15;
	if(coordy%2 == 0){
			pixels[0] = pixels[0]+(width/2);
	}
	return pixels;
}

</script>

<?php
function coordsToPix($coordx, $coordy, $size){
    $pixels = array();
    $pixels[0] = $size*$coordx;
    $pixels[1] = $size*$coordy;
    $pixels[0] = ($coordx%2 == 0) ? $pixels[0] + $size/2 : $pixels[0];
    return $pixels;

}
if(! empty( $_POST )){
        $chartQuery = "UPDATE charts SET title=\"".$_POST['webTitle']."\", description= \"".$_POST['description']."\" WHERE cid=".$cid.";";

        mysql_query($chartQuery);
		$deleteQuery1 = "DELETE FROM node WHERE cid=".$cid.";";
		mysql_query($deleteQuery1);
	    $deleteQuery3 = "DELETE FROM connection WHERE cid=".$cid.";";
		mysql_query($delteQuery3);
        $eid = explode(';', $_POST['eid']);
        $name = explode(';', $_POST['name']);
        $url = explode(';', $_POST['url']);
        $title = explode(';', $_POST['title']);
        $conn1 = explode(';', $_POST['conn1']);
        $conn2 = explode(';', $_POST['conn2']);
        $xcoords = explode(';', $_POST['xcoords']);
        $ycoords = explode(';', $_POST['ycoords']);
        foreach($conn1 as $i => $conn){
			if($conn1[$i] != ""){
				$connQuery1 = "INSERT INTO connection (nid1, nid2, cid) VALUES (\"".$conn1[$i]."\", \"".$conn2[$i]."\", ".$cid.");";
				//$chart = mysql_query($query);
				$connQuery2 = "INSERT INTO connection (nid1, nid2, cid) VALUES (\"".$conn2[$i]."\", \"".$conn1[$i]."\", ".$cid.");";
				mysql_query($connQuery1);
				mysql_query($connQuery2);
			}
        }
		foreach($eid as $i => $value){
			if($eid[$i] != ""){
				$artistQuery = "INSERT INTO artist (name, songname, songfile, echonestID) VALUES(\"".$name[$i]."\", \"".$title[$i]."\", \"".$url[$i]."\", \"".$eid[$i]."\");";
				mysql_query($artistQuery);
				$aid = mysql_insert_id();
				$nodeQuery = "INSERT INTO node (aid, cid, xcoord, ycoord) VALUES (".$aid.", ".$cid.", ".$xcoords[$i].", ".$ycoords[$i].");";
				mysql_query($nodeQuery);
			}
		}
    }

    if($_GET['cid'] != ""){
        $query = "SELECT * FROM charts WHERE cid=".$_GET['cid'].";";
        $chart = mysql_query($query);
	    $nodequery = "SELECT * FROM artist LEFT JOIN node ON node.aid = artist.aid WHERE node.cid=".$_GET['cid'].";";

        $noderesult = mysql_query($nodequery);
        $chart = mysql_fetch_assoc($chart);

        print "<h2 id=\"webTitle\"contenteditable=\"true\">".$chart['title']."</h2>\n";
        print "<div id=\"description\" contenteditable=\"true\">".$chart['description']."</div>\n";
        print "<script>";
        //Ridiculous workaround, because of some ridiculous bug, cannot get class from id with jquery
        print "var echoID = new Array();";
        print "var coordsList = new Array();";
        while($node = mysql_fetch_assoc($noderesult)){
            print "var node".$node['nid']." = new Array(".$node['nid'].",'".$node['name']."', '".$node['image']."', '".$node['songfile']."', '".$node['echonestID']."');\n";
            //print "nodes[".$node['nid']."] = node".$node['nid'].";\n";
            print "$(document).ready(function(){\n";
            print "$('.x".$node['xcoord'].".y".$node['ycoord']."').attr('id', '".$node['echonestID']."');";
            print "$('#".$node['echonestID']." #name').html(\"".$node['name']."\");\n";
            print "$('#".$node['echonestID']." #url').html(\"".$node['songfile']."\");\n";
            print "$('#".$node['echonestID']." #title').html(\"".$node['songname']."\");\n";
            print "});\n";
			print "echoID.push(\"".$node['echonestID']."\");";
            print "coordsList.push(\"x".$node['xcoord']." y".$node['ycoord']."\");";
        }

    $connectionQuery = "SELECT * FROM connection WHERE cid=".$_GET['cid'].";";

    $connectionResult = mysql_query($connectionQuery);
    print "var coords1 = new Array();";
    print "var coords2 = new Array();";
    print "var myclass = \"\";\n";
    while($connection = mysql_fetch_assoc($connectionResult)){
         print "conn1.push(\"".$connection['nid1']."\");\n";
         print "conn2.push(\"".$connection['nid2']."\");\n";
         print "for(var i in echoID){\nif(echoID[i] == \"".$connection['nid1']."\"){\ncoords1 = getCoordsFromClass(coordsList[i]);\n}if(echoID[i] == \"".$connection['nid2']."\"){\ncoords2 = getCoordsFromClass(coordsList[i]);\n}\n}";
         print "drawLine(coords1[0], coords1[1], coords2[0], coords2[1]);\n";

    }

print "</script>";

}else{
?>
       <h2 id="webTitle" contenteditable="true">Playlists are so last decade.</h2>
       <div id="description" contenteditable="true">Explore the connected world of music, play a web, not a list.</div>
    <div id="darkBackground"></div>
        <div id="artistSearch">Welcome to the Music Web. <br>Just enter your favorite artist to start listening!:<p>
            <input type="text" id="artistSearchName"><p>

            <input type="button" id="artistSearchButton" value="Go!" onclick="createNode()">
        </div>
    <script>
        $("#artistSearch").attr('style', 'z-index:100;');
</script>
<?php
}
?>
<script>
function getNewCoords(xCoord, yCoord){
    xCoord = parseInt(xCoord);
    yCoord = parseInt(yCoord);
    var xSurr = new Array();
    var ySurr = new Array();
    var coord = new Array();
    var surrounding = new Array();
    if(yCoord%2==1){
        xSurr[0] = xCoord-1;ySurr[0] = yCoord - 1;xSurr[1] = xCoord-1;ySurr[1] = yCoord;xSurr[2] = xCoord-1;ySurr[2] = yCoord+1;xSurr[3] = xCoord+1;
        ySurr[3] = yCoord;xSurr[4] = xCoord;ySurr[4] = yCoord+1;xSurr[5] = xCoord;ySurr[5] = yCoord-1;
    }else{
        xSurr[0] = xCoord-1;ySurr[0] = yCoord; xSurr[1] = xCoord;ySurr[1] = yCoord+1;xSurr[2] = xCoord; ySurr[2] = yCoord-1;xSurr[3] = xCoord+1; ySurr[3] = yCoord-1;
        xSurr[4] = xCoord+1;ySurr[4] = yCoord;xSurr[5] = xCoord+1;ySurr[5] = yCoord+1;
    }
    
    for(var i = 0; i < 6; i++){
        var attrID = $('.x'+xSurr[i]+'.y'+ySurr[i]).attr('id');
        if(attrID == 'null'){
            //This node is unclaimed!
            var returncoords = new Array();
            returncoords[0] = xSurr[i]; returncoords[1] = ySurr[i];
            return returncoords;
        }
    }
    alert("No coordinates found");
    return -1;
}


$('.node').click(function(){
//TODO: Fix this.
    var theSong = $(this).children('#url').html();
$('#songInfo').html($(this).children('#title').html());

$("#jquery_jplayer_1").jPlayer("setMedia", {
				    mp3: theSong
			    }).jPlayer("play");
    //getSong(enID);
});

$('.node').dblclick(function(){
    var enID = $(this).attr('id');
    var myclass = new Array();
    var myclass = $(this).attr('class').split(/\s+/);
    
    $.getJSON('http://developer.echonest.com/api/v4/artist/similar?api_key=SNPTOEM7JQD9EGMF2&id='+enID+'&format=json&results=10&start=0', function(data) {
    var rand = Math.floor(Math.random()*9);
    var artistName = data.response.artists[rand].name;
    var xcoord = -1;
    var ycoord = -1;

    $.each( myclass, function(index, item){
        if(item.indexOf('x') == '0'){
            //This is the coord that indicates the x pos
            xcoord = item.substr(1);
        }
        if(item.indexOf('y') == '0'){
            //This is the coord that indicates the y pos
            ycoord = item.substr(1);
        }
    });

    var newCoords = new Array();
    newCoords = getNewCoords(xcoord, ycoord);

    $('.x'+newCoords[0]+'.y'+newCoords[1]+' #name').html(artistName);
    $('.x'+newCoords[0]+'.y'+newCoords[1]).attr('id', data.response.artists[rand].id);
    drawLine(newCoords[0], newCoords[1], xcoord, ycoord);

    //creates connection in the array, for the "music path" later
    conn1.push(enID);
    conn2.push(data.response.artists[rand].id);
    conn1.push(data.response.artists[rand].id);
    conn2.push(enID);
    var song = new Array();
    song  = getSong(data.response.artists[rand].id, newCoords);
	});
});


function playTheWeb(startENID, plays){
    if(plays > 0){
        var surroundingNodes = new Array();
        for(var i = 0; i < conn1.length; i=i+1){
            if(conn1[i] == startENID){
                surroundingNodes.push(conn2[i]);
            }
        }
        //Just uses the first surrounding node to start with, can expand later
        var mp3 = $('#'+surroundingNodes[0]+' #url').html();

        playTheWeb(surroundingNodes[0], plays-1);
    }
    
}

function save(){

	if(getParam('cid' == 0)){
		//cid doesn't exist yet -- user needs to define some parameters
        $('#titleForm').css('display:inline;');
        
	}


    var conn1Str = conn1.join(";");
    var conn2Str = conn2.join(";");
    var eid = "";
	var artistName = "";
    var songTitle = "";
    var songFile = "";
    var xcoords = "";
    var ycoords = "";

    $('.node:not(#null)').each(function(index) {
        eid = $(this).attr('id')+";"+eid;
        artistName = $(this).children('#name').html()+";"+artistName;
        songFile = $(this).children('#url').html()+";"+songFile;
        songTitle = $(this).children('#title').html()+";"+songTitle;
        coords = getCoordsFromClass($(this).attr('class'));
        xcoords = coords[0] + ";" + xcoords;
        ycoords = coords[1] + ";" + ycoords;
      });
    $('#conn1Form').val(conn1Str);
    $('#conn2Form').val(conn2Str);
    $('#nameForm').val(artistName);
	$('#titleForm').val(songTitle);
    $('#urlForm').val(songFile);
    $('#eidForm').val(eid);
    $('#xcoordsForm').val(xcoords);
    $('#ycoordsForm').val(ycoords);
    $('#webTitleForm').val($('#webTitle').html());
    $('#descriptionForm').val($('#description').html());
    $('#saveWebForm').submit();
}

function getCoordsFromClass(theClass){
    var myclass = theClass.split(/\s+/);
    var coords = new Array();
    for(var i in myclass){
        if(myclass[i].indexOf('x') == '0'){
            //This is the coord that indicates the x pos
            coords[0] = myclass[i].substr(1);
        }
        if(myclass[i].indexOf('y') == '0'){
            //This is the coord that indicates the y pos
            coords[1] = myclass[i].substr(1);
        }
    }
    return coords;
}

function getSong(echoNestID, newCoords){
		$.getJSON('http://developer.echonest.com/api/v4/artist/audio?api_key=SNPTOEM7JQD9EGMF2&id='+echoNestID+'&format=json&results=1&start=0', function(data) {
        var song = new Array();
        song[0] = data.response.audio[0].url;
        song[1] = data.response.audio[0].title;
        $("#songInfo").html(song[1]);
        $("#jquery_jplayer_1").jPlayer("setMedia", {
				    mp3: song[0]
			    }).jPlayer("play");
        $('.x'+newCoords[0]+'.y'+newCoords[1]+' #url').html(song[0]);
        $('.x'+newCoords[0]+'.y'+newCoords[1]+' #title').html(song[1]);
        //var theTitle = $('.x'+newCoords[0]+'.y'+newCoords[1]+' #title').html();

    });
}

function deleteNode(echonestID){
	$('#'+echonestID).html("<div id=\"name\"></div><div id=\"title\"></div><div id=\"url\"></div>"); 
	$('#'+echonestID).attr('id', 'null');
	for(var i in conn1){
		if((conn1[i] == echonestID) || conn2[i] == echonestID){
			conn1.splice(i, 1, "");
			conn2.splice(i, 1, "");
		}
	}
	return
}
//Creates node based on user search -- not same as dbclick or creating a node from database
function createNode(){
    $('#artistSearch').attr('style', 'display:none;');
    var artistID = "";
    var nodeInfo = new Array();
    var artistName = $('#artistSearchName').val();
	$('.x2.y2 #name').html(artistName);
    nodeInfo = $.getJSON('http://developer.echonest.com/api/v4/artist/search?api_key=SNPTOEM7JQD9EGMF2&format=json&name='+artistName+'&results=1', function(data) {
		$('.x2.y2').attr('id', data.response.artists[0].id);
        var song = new Array();
		defaultCoords = new Array(2, 2);
        song = getSong(data.response.artists[0].id, defaultCoords);
        nodeInfo[0] = data.response.artists[0].name;
        nodeInfo[1] = data.response.artists[0].id;
        //TODO: Need to fix this so it will work in Chrome -- problem with song being undefined
        if(song === undefined){
            song[0] = "";
        }
        nodeInfo[2] = song[0];
        nodeInfo[3] = song[1];
        return nodeInfo;
});

    return nodeInfo;
}


function getParam(name){
    //name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
    //var regexS = "[\\?&]"+name+"=([^&#]*)";
    //var regex = new RegExp( regexS );
    var url = document.location.href;
    if(url.indexOf("?cid=") == -1){
        return 0;
    }
    return 1;
}

</script>

</div>
<form method="post" action="index.php?cid=<?php print $_GET['cid']; ?>" name="saveWeb" id="saveWebForm">
<input type="hidden" name="conn1" id="conn1Form">
<input type="hidden" name="conn2" id="conn2Form">
<input type="hidden" name="eid" id="eidForm">
<!--Band's name-->
<input type="hidden" name="name" id="nameForm">
<input type="hidden" name="url" id="urlForm">
<input type="hidden" name="title" id="titleForm">
<input type="hidden" name="xcoords" id="xcoordsForm">
<input type="hidden" name="ycoords" id="ycoordsForm">
<input type="hidden" name="webTitle" id="webTitleForm">
<input type="hidden" name="description" id="descriptionForm">
</form>
<div id="titleForm" style="width:400px;height:300px;position:absolute;left:50px;padding:-200px;display:none;">
<input type="text" name="titleForm">
<input type="text" name="descriptionForm">
</div>
</BODY>
</HTML>
