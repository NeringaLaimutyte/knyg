<?php
include_once 'configuration/config.php';
include_once 'models/Vartotojas.php';
include_once 'controllers/Vartotojas.php';
include 'log.php';
logas($_SERVER['REQUEST_URI']);
session_start();
if (!isset($_SESSION['user']) || !$_SESSION['user']->getRoles()[2]) {
    header("location: index.php");
    die();
}//*/

$dat1 = $_SESSION['data1'];
$dat2 = $_SESSION['data2'];
$day= preg_split("/[\s\/]+/", $dat1);
print_r($day);
echo $dat2;
include 'meniu_sandelis.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <script type="text/javascript">
            window.onload = function () {
                var chart = new CanvasJS.Chart("chartContainer",
                        {
                            title: {
                                text: "Bendras knygų kiekio kitimas"
                            },
                            axisX: {
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
                                        {x: new Date(<?php echo json_encode($day[2], JSON_NUMERIC_CHECK); ?>, <?php echo json_encode($day[1], JSON_NUMERIC_CHECK); ?>, <?php echo json_encode($day[0], JSON_NUMERIC_CHECK); ?>), y: 26},
                                        {x: new Date(<?php echo json_encode($day[2], JSON_NUMERIC_CHECK); ?>, <?php echo json_encode($day[1], JSON_NUMERIC_CHECK); ?>, <?php echo json_encode($day[0]+1, JSON_NUMERIC_CHECK); ?>), y: 38},
                                        {x: new Date(<?php echo json_encode($day[2], JSON_NUMERIC_CHECK); ?>, <?php echo json_encode($day[1], JSON_NUMERIC_CHECK); ?>, <?php echo json_encode($day[0]+2, JSON_NUMERIC_CHECK); ?>), y: 43},
                                        {x: new Date(<?php echo json_encode($day[2], JSON_NUMERIC_CHECK); ?>, <?php echo json_encode($day[1], JSON_NUMERIC_CHECK); ?>, <?php echo json_encode($day[0]+3, JSON_NUMERIC_CHECK); ?>), y: 29},
                                        {x: new Date(<?php echo json_encode($day[2], JSON_NUMERIC_CHECK); ?>, <?php echo json_encode($day[1], JSON_NUMERIC_CHECK); ?>, <?php echo json_encode($day[0]+4, JSON_NUMERIC_CHECK); ?>), y: 41},
                                        {x: new Date(<?php echo json_encode($day[2], JSON_NUMERIC_CHECK); ?>, <?php echo json_encode($day[1], JSON_NUMERIC_CHECK); ?>, <?php echo json_encode($day[0]+5, JSON_NUMERIC_CHECK); ?>), y: 54},
                                        {x: new Date(<?php echo json_encode($day[2], JSON_NUMERIC_CHECK); ?>, <?php echo json_encode($day[1], JSON_NUMERIC_CHECK); ?>, <?php echo json_encode($day[0]+6, JSON_NUMERIC_CHECK); ?>), y: 66},
                                        {x: new Date(<?php echo json_encode($day[2], JSON_NUMERIC_CHECK); ?>, <?php echo json_encode($day[1], JSON_NUMERIC_CHECK); ?>, <?php echo json_encode($day[0]+7, JSON_NUMERIC_CHECK); ?>), y: 60},
                                        {x: new Date(<?php echo json_encode($day[2], JSON_NUMERIC_CHECK); ?>, <?php echo json_encode($day[1], JSON_NUMERIC_CHECK); ?>, <?php echo json_encode($day[0]+8, JSON_NUMERIC_CHECK); ?>), y: 53},
                                        {x: new Date(<?php echo json_encode($day[2], JSON_NUMERIC_CHECK); ?>, <?php echo json_encode($day[1], JSON_NUMERIC_CHECK); ?>, <?php echo json_encode($day[0]+9, JSON_NUMERIC_CHECK); ?>), y: 60}

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
