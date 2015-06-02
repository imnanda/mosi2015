<?php
include "fungsi.php";
include "db_connect.php";
$sql = "SELECT * FROM t_suhu";
$sql2 = "SELECT * FROM t_kelembaban";
$kelembaban = getdata($sql2);
$suhu = getData($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Forms</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
    <!--[if lte IE 8]>
    <script language="javascript" type="text/javascript" src="vendors/flot/excanvas.min.js"></script><![endif]-->
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>

    <![endif]-->
    <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load('visualization', '1.1', {packages: ['line']});
        google.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable();
            data.addColumn('number', 'Grafik Suhu Kulkas');
            data.addColumn('number', 'Beku');
            data.addColumn('number', 'Dingin');
            data.addColumn('number', 'Sejuk');
            data.addColumn('number', 'Normal');
            data.addColumn('number', 'panas');

            data.addRows([
                [1, 0, 0, 0, 0, 0],
                [2, 1, 0, 0, 0, 0],
                [3, 0, 0, 0, 0, 0],
                [4, 0, 1, 0, 0, 0],
                [5, 0, 0, 0, 0, 0],
                [6, 0, 0, 1, 0, 0],
                [7, 0, 0, 0, 0, 0],
                [8, 0, 0, 0, 1, 0],
                [9, 0, 0, 0, 0, 0],
                [10, 0, 0, 0, 0, 1],
                [11, 0, 0, 0, 0, 0],
                [12, 0, 0, 0, 0, 0],
                [13, 0, 0, 0, 0, 0],
                [14, 0, 0, 0, 0, 0],
                [15, 0, 0, 0, 0, 0]

            ]);

            var options = {
                chart: {
                    title: ' ',
                    subtitle: ' '
                },
                width: 900,
                height: 500,
                axes: {
                    x: {
                        0: {side: 'top'}
                    }
                }
            };

            var chart = new google.charts.Line(document.getElementById('line_top_x'));

            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.load('visualization', '1.1', {packages: ['line']});
        google.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable();
            data.addColumn('number', 'Grafik Kelembaban Kulkas');
            data.addColumn('number', 'Dry');
            data.addColumn('number', 'Moist');
            data.addColumn('number', 'Wet');


            data.addRows([
                [1, 1, 0, 0],
                [2, 1, 0, 0],
                [3, 1, 0, 0],
                [4, 0, 0, 0],
                [5, 0, 1, 0],
                [6, 0, 0, 0],
                [7, 0, 0, 1],
                [8, 0, 0, 1],
                [9, 0, 0, 1],
                [10, 0, 0, 0]
            ]);

            var options = {
                chart: {
                    title: ' ',
                    subtitle: ' '
                },
                width: 900,
                height: 500,
                axes: {
                    x: {
                        0: {side: 'top'}
                    }
                }
            };

            var chart = new google.charts.Line(document.getElementById('line_top_x2'));

            chart.draw(data, options);
        }
    </script>


</head>

<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">Admin Panel</a>

            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i
                                class="icon-user"></i> Vincent Gabriel <i class="caret"></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a tabindex="-1" href="#">Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a tabindex="-1" href="login.html">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav">
                    <li class="active">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Settings <b class="caret"></b>
                        </a>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3" id="sidebar">
            <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                <li class="active">
                    <a href="form.html"><i class="icon-chevron-right"></i> Dashboard</a>
                </li>
                <li>
                    <a href="tables.html"><i class="icon-chevron-right"></i> Setting</a>
                </li>
            </ul>
        </div>
        <!--/span-->
        <div class="span9" id="content">
            <!-- morris stacked chart -->
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Fuzzy Logic</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span6">
                            <form class="form-horizontal">
                                <fieldset>
                                    <legend>Interval Suhu</legend>
                                    <?php
                                    $i = 1;
                                    foreach ($suhu as $row) {
                                        ?>
                                        <div class="control-group">
                                            <label class="control-label"><?php echo $row['nama_suhu'] ?></label>

                                            <div class="controls">
                                                <span class="uneditable-input"><?php echo $row['suhu1'] ?></span>
                                                <span class="uneditable-input"><?php echo $row['suhu2'] ?></span>
                                            </div>
                                        </div>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </fieldset>
                            </form>

                        </div>
                        <div class="span6">
                            <form class="form-horizontal" action="" method="post">
                                <fieldset>
                                    <legend>Interval Kelembaban</legend>
                                    <?php
                                    $i = 1;
                                    foreach ($kelembaban as $row) {
                                        ?>
                                        <div class="control-group">
                                            <label class="control-label"><?php echo $row['nama_kelembaban'] ?></label>

                                            <div class="controls">
                                                <span class="uneditable-input"><?php echo $row['kelembaban1'] ?></span>
                                                <span class="uneditable-input"><?php echo $row['kelembaban2'] ?></span>
                                            </div>
                                        </div>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </fieldset>
                                <fieldset>
                                    <legend>Input Suhu</legend>
                                    <div class="control-group">
                                        <label class="control-label">Suhu</label>

                                        <div class="controls">
                                            <input class="input-mini" id="focusedInput" type="text" value=""
                                                   name="inputsuhu">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Kelembaban</label>

                                        <div class="controls">
                                            <input class="input-mini" id="focusedInput" type="text" value=""
                                                   name="inputkelembaban">
                                        </div>
                                    </div>
                                </fieldset>

                        </div>
                        <button type="submit" class="btn btn-primary">Hitung</button>
                        <button type="reset" class="btn">Cancel</button>
                        </form>
                        <div id="line_top_x"></div>
                        <div class="form-actions"></div>
                        <div id="line_top_x2"></div>

                        <form class="form-horizontal">
                            <fieldset>
                                <legend>Hasil Perhitungan Suhu</legend>

                                <div class="control-group">
                                    <?php
                                    $inputsuhu = $_POST['inputsuhu'];
                                    $inputkelembaban = $_POST['inputkelembaban'];
                                    $i = 1;
                                    foreach ($suhu as $row) {
                                        $tengah = ($row['suhu2'] / 2);
                                        if (($inputsuhu <= $row['suhu1'])) {
                                            $hasilsuhu1 = 0;
                                        } elseif (($row['suhu1'] <= $inputsuhu) and ($inputsuhu <= $tengah)) {
                                            $hasilsuhu1 = ($inputsuhu - $row['suhu1']) / ($tengah - $row['suhu1']);
                                        } elseif (($tengah <= $inputsuhu) and ($inputsuhu <= $row['suhu2'])) {
                                            $hasilsuhu1 = (($row['suhu2'] - $inputsuhu) / ($row['suhu2'] - $tengah));
                                        } else {
                                            $hasilsuhu1 = 0;
                                            //var_dump($hasilsuhu1);

                                        }
                                        ?>
                                        <label class="control-label"><?php echo $row['nama_suhu'] ?></label>
                                        <div class="controls">
                                            <span class="uneditable-input"><?php echo $hasilsuhu1 ?></span>
                                        </div>
                                        <br>
                                    <?php
                                    }
                                    $i++;
                                    ?>
                                </div>
                            </fieldset>
                        </form>
                        <form class="form-horizontal">
                            <fieldset>
                                <legend>Hasil Perhitungan Kelembaban</legend>

                                <div class="control-group">
                                    <?php
                                    $inputkelembaban = $_POST['inputkelembaban'];
                                    $i = 1;
                                    foreach ($kelembaban as $row) {
                                        $tengah2 = ($row['kelembaban2']/2);
                                        if($inputkelembaban <= $row['kelembaban1'])
                                        {
                                            $hasilkelembaban = 0;
                                        }
                                        elseif (($row['kelembaban1']<= $inputkelembaban) and ($inputkelembaban <= $tengah2))
                                        {
                                            $hasilkelembaban = ($inputsuhu - $row['kelembaban1']) / ($tengah2 - $row['kelembaban1']);
                                        }
                                        elseif (($tengah2 <= $inputkelembaban) and ($inputkelembaban <= $row['kelembaban2']))
                                        {
                                            $hasilkelembaban = (($row['kelembaban2'] - $inputkelembaban)/($row['kelembaban2'] - $tengah2));
                                        }
                                        else
                                        {
                                            $hasilkelembaban = 0;
                                        }
                                        ?>
                                        <label class="control-label"><?php echo $row['nama_kelembaban'] ?></label>
                                        <div class="controls">
                                            <span class="uneditable-input"><?php echo $hasilkelembaban ?></span>
                                        </div>
                                        <br>
                                    <?php
                                    }
                                    $i++;
                                    ?>
                                </div>
                            </fieldset>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<footer>
    <p align="center">&copy; MOSI KELOMPOK</p>
</footer>
</div>
<!--/.fluid-container-->
<link href="vendors/datepicker.css" rel="stylesheet" media="screen">
<link href="vendors/uniform.default.css" rel="stylesheet" media="screen">
<link href="vendors/chosen.min.css" rel="stylesheet" media="screen">

<link href="vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">

<script src="vendors/jquery-1.9.1.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="vendors/jquery.uniform.min.js"></script>
<script src="vendors/chosen.jquery.min.js"></script>
<script src="vendors/bootstrap-datepicker.js"></script>

<script src="vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
<script src="vendors/wysiwyg/bootstrap-wysihtml5.js"></script>

<script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

<script type="text/javascript" src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="assets/form-validation.js"></script>

<script src="assets/scripts.js"></script>
<script>

    jQuery(document).ready(function () {
        FormValidation.init();
    });


    $(function () {
        $(".datepicker").datepicker();
        $(".uniform_on").uniform();
        $(".chzn-select").chosen();
        $('.textarea').wysihtml5();

        $('#rootwizard').bootstrapWizard({
            onTabShow: function (tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index + 1;
                var $percent = ($current / $total) * 100;
                $('#rootwizard').find('.bar').css({width: $percent + '%'});

                if ($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show();
                    $('#rootwizard').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }
            }
        });
        $('#rootwizard .finish').click(function () {
            alert('Finished!, Starting over!');
            $('#rootwizard').find("a[href*='tab1']").trigger('click');
        });
    });
</script>
</body>

</html>