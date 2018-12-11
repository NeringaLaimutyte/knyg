<?php
include_once 'configuration/config.php';
include_once 'models/Vartotojas.php';
include_once 'controllers/Vartotojas.php';
include 'log.php';
logas($_SERVER['REQUEST_URI']);
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if (!isset($_SESSION['user']) || !$_SESSION['user']->getRoles()[2]) {
    header("location: index.php");
    die();
}//*/

//$dat1=$_REQUEST['data1'];
//$dat2=$_REQUEST['data2'];
//echo $dat2;
?>
<!DOCTYPE HTML>
<html>
<head>  
<script type="text/javascript">
window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer",
    {
      title:{
        text: "Bendras knygų kiekio kitimas"
    },
    axisX:{
        title: "laikas",
        gridThickness: 2
    },
    axisY: {
        title: "knygų kiekis"
    },
    data: [
    {        
        type: "area",
        dataPoints: [//array
        { x: new Date(2012, 01, 1), y: 26},
        { x: new Date(2012, 01, 3), y: 38},
        { x: new Date(2012, 01, 5), y: 43},
        { x: new Date(2012, 01, 7), y: 29},
        { x: new Date(2012, 01, 11), y: 41},
        { x: new Date(2012, 01, 13), y: 54},
        { x: new Date(2012, 01, 20), y: 66},
        { x: new Date(2012, 01, 21), y: 60},
        { x: new Date(2012, 01, 25), y: 53},
        { x: new Date(2012, 01, 27), y: 60}

        ]
    }
    ]
});

    chart.render();
}
</script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
<body>
<div id="chartContainer" style="height: 300px; width: 100%;">
</div>
</body>
</html>
