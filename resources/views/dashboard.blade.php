@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <br/><br/><br/>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0">Rekam Medis</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- List rekam medis -->
                        <div class="row">
                            <div class="col-md-7 rekamMedis_box">
                                <table class="table table-striped">
                                @if(!$rekamMedis->isEmpty())
                                    @foreach ($rekamMedis as $rm)

                                    <?php
                                        //waktu cek
                                        $waktuCek = carbon\Carbon::parse($rm->updated_at);
                                        $waktuCek->timezone = new DateTimeZone('Asia/Jakarta');
                                    ?>

                                    <tr>
                                        <td>
                                            <div class="col-md-10">
                                                <p class="rm-n-dokter inlineBlock">dr. {{ $rm->name }}</p>
                                                <a href="/rekamMedis/view/{{ $rm->id }}" style="float: right;">
                                                    <img alt="Image placeholder" src="{{ asset('OneMedical') }}/img/icon/11.png">
                                                </a>
                                                <p class="rm-n-tgl">{{ $waktuCek->isoFormat('MMM Do YY') }} | {{ $waktuCek->isoFormat('HH:mm') }}</p>  <!--Sesuia dengan waktu di jakarta-->
                                                <hr style="margin: 5px;" />
                                               Kesimpulan: {{ $rm->kesimpulan }}
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        {{ $rekamMedis->onEachSide(2)->links() }}
                                    </tr>
                                @else
                                    <img class="img-center" alt="Image placeholder" src="{{ asset('OneMedical') }}/img/no_result.png">
                                @endif
                                </table>
                            </div>

                            <div class="col-md-4 date_box">
                                <h3>Date</h3>
                                <h1 class="text-center date_lg">{{ $today->isoFormat('D') }}</h1>
                                <h4  class="text-center">{{$today->format('F')}} {{ $today->isoFormat('YYYY') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br/>
        @if(auth()->user()->jenis_user =='2')         <!--Jika ia adalah dokter-->
        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0">Pelayanan Pasien</h2>
                                <div class="row">
                                    <div class="col-md-3" style="margin-left: 100px;">
                                        <img src="{{ asset('OneMedical/img/icon/pp_1.png') }}" class="pp_img"/>
                                        <br/>
                                        <a href="" class="link-pp">Menambah Rekam Medis</a>
                                    </div>
                                    <div class="col-md-3">
                                        <img src="{{ asset('OneMedical/img/icon/pp_2.png') }}" class="pp_img"/>
                                        <br/>
                                        <a href="" class="link-pp">Melihat Rekam Medis</a>
                                    </div>
                                    <div class="col-md-3">
                                        <img src="{{ asset('OneMedical/img/icon/pp_3.png') }}" class="pp_img"/>
                                        <br/>
                                        <a href="" class="link-pp">Mengubah Rekam Medis</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
        </div>

        <br/>

        @endif

        <br/>

        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0 inlineBlock">Grafik Kesehatan</h2>
                                <a href="{{ route('catatanKesehatan') }}" class="btn btn-md btn-primary btn-selengkapnya">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    <!--Cek apakah data ada atau gak-->
                    @if(!$CK_ALL->isEmpty())
                        @if(sizeof($CatatanKesehatan)>0)
                        <div class="row">
                            <div class="col-md-10 box-gk">
                                <div class="card-body">

                                    <h1 class="inlineBlock">Catatan Massa Tubuh</h1>
                                                                        <br/><br/>
                                    <!-- Chart -->
                                    <div class="chart chart-height">
                                        <!-- Chart wrapper -->
                                        <canvas id="chart-MT" class="chart-canvas"></canvas>
                                    </div>
                                    <a href="{{ route('catatanKesehatan') }}" class="link-ct">View Data</a>

                                </div>
                            </div>
                        </div>
                        @endif
                        <br/>

                        <div class="row">
                            @if(sizeof($CatatanKesehatan2)>0)
                            <div class="col-md-10 box-gk">
                                <h2 class="inlineBlock">Catatan Gula Darah</h2>
                                
                                <br/><br/>
                                <!-- Chart -->
                                <div class="chart chart-height-2">
                                    <!-- Chart wrapper -->
                                    <canvas id="chart-GD" class="chart-canvas"></canvas>
                                </div>

                                <a href="{{ route('catatanKesehatan') }}" class="link-ct">View Data</a>

                            </div>
                            @endif
                        </div>

                        <br/>
                        
                        @if(sizeof($CatatanKesehatan3)>0)
                        <div class="row">
                            <div class="col-md-10 box-gk">
                                <h2 class="inlineBlock">Catatan Tekanan Darah</h2>
                                
                                <br/><br/>
                                <!-- Chart -->
                                <div class="chart chart-height-2">
                                    <!-- Chart wrapper -->
                                    <canvas id="chart-TD" class="chart-canvas"></canvas>
                                </div>

                                <a href="{{ route('catatanKesehatan') }}" class="link-ct">View Data</a>
                            </div>
                        </div>
                        @endif

                        <br/>

                        @if(sizeof($CatatanKesehatan4)>0)
                        <div class="row">
                            <div class="col-md-10 box-gk">
                                <div class="card-body">
                                    <h1 class="inlineBlock">Catatan Kolestrol</h1>
                                                                        <br/><br/>
                                    <!-- Chart -->
                                    <div class="chart chart-height">
                                        <!-- Chart wrapper -->
                                        <canvas id="chart-K" class="chart-canvas"></canvas>
                                    </div>

                                    <a href="{{ route('catatanKesehatan') }}" class="link-ct">View Data</a>

                                </div>
                            </div>
                        </div>
                        @endif

                        <br/>
                    @else
                        <img class="img-center" alt="Image placeholder" src="{{ asset('OneMedical') }}/img/nothing_to_see.png">
                    @endif
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script type="text/javascript">
        //
        // Charts
        //

        'use strict';

        var Charts = (function() {

            // Variable

            var $toggle = $('[data-toggle="chart"]');
            var mode = 'light';//(themeMode) ? themeMode : 'light';
            var fonts = {
                base: 'Open Sans'
            }

            // Colors
            var colors = {
                gray: {
                    100: '#f6f9fc',
                    200: '#e9ecef',
                    300: '#dee2e6',
                    400: '#ced4da',
                    500: '#adb5bd',
                    600: '#8898aa',
                    700: '#525f7f',
                    800: '#32325d',
                    900: '#212529'
                },
                theme: {
                    'default': '#172b4d',
                    'primary': '#5e72e4',
                    'secondary': '#f4f5f7',
                    'info': '#11cdef',
                    'success': '#2dce89',
                    'danger': '#f5365c',
                    'warning': '#fb6340'
                },
                black: '#12263F',
                white: '#FFFFFF',
                transparent: 'transparent',
            };


            // Methods

            // Chart.js global options
            function chartOptions() {

                // Options
                var options = {
                    defaults: {
                        global: {
                            responsive: true,
                            maintainAspectRatio: false,
                            defaultColor: (mode == 'dark') ? colors.gray[700] : colors.gray[600],
                            defaultFontColor: (mode == 'dark') ? colors.gray[700] : colors.gray[600],
                            defaultFontFamily: fonts.base,
                            defaultFontSize: 13,
                            layout: {
                                padding: 0
                            },
                            legend: {
                                display: false,
                                position: 'bottom',
                                labels: {
                                    usePointStyle: true,
                                    padding: 16
                                }
                            },
                            elements: {
                                point: {
                                    radius: 0,
                                    backgroundColor: colors.theme['primary']
                                },
                                line: {
                                    tension: .4,
                                    borderWidth: 4,
                                    borderColor: colors.theme['primary'],
                                    backgroundColor: colors.transparent,
                                    borderCapStyle: 'rounded'
                                },
                                rectangle: {
                                    backgroundColor: colors.theme['warning']
                                },
                                arc: {
                                    backgroundColor: colors.theme['primary'],
                                    borderColor: (mode == 'dark') ? colors.gray[800] : colors.white,
                                    borderWidth: 4
                                }
                            },
                            tooltips: {
                                enabled: false,
                                mode: 'index',
                                intersect: false,
                                custom: function(model) {

                                    // Get tooltip
                                    var $tooltip = $('#chart-tooltip');

                                    // Create tooltip on first render
                                    if (!$tooltip.length) {
                                        $tooltip = $('<div id="chart-tooltip" class="popover bs-popover-top" role="tooltip"></div>');

                                        // Append to body
                                        $('body').append($tooltip);
                                    }

                                    // Hide if no tooltip
                                    if (model.opacity === 0) {
                                        $tooltip.css('display', 'none');
                                        return;
                                    }

                                    function getBody(bodyItem) {
                                        return bodyItem.lines;
                                    }

                                    // Fill with content
                                    if (model.body) {
                                        var titleLines = model.title || [];
                                        var bodyLines = model.body.map(getBody);
                                        var html = '';

                                        // Add arrow
                                        html += '<div class="arrow"></div>';

                                        // Add header
                                        titleLines.forEach(function(title) {
                                            html += '<h3 class="popover-header text-center">' + title + '</h3>';
                                        });

                                        // Add body
                                        bodyLines.forEach(function(body, i) {
                                            var colors = model.labelColors[i];
                                            var styles = 'background-color: ' + colors.backgroundColor;
                                            var indicator = '<span class="badge badge-dot"><i class="bg-primary"></i></span>';
                                            var align = (bodyLines.length > 1) ? 'justify-content-left' : 'justify-content-center';
                                            html += '<div class="popover-body d-flex align-items-center ' + align + '">' + indicator + body + '</div>';
                                        });

                                        $tooltip.html(html);
                                    }

                                    // Get tooltip position
                                    var $canvas = $(this._chart.canvas);

                                    var canvasWidth = $canvas.outerWidth();
                                    var canvasHeight = $canvas.outerHeight();

                                    var canvasTop = $canvas.offset().top;
                                    var canvasLeft = $canvas.offset().left;

                                    var tooltipWidth = $tooltip.outerWidth();
                                    var tooltipHeight = $tooltip.outerHeight();

                                    var top = canvasTop + model.caretY - tooltipHeight - 16;
                                    var left = canvasLeft + model.caretX - tooltipWidth / 2;

                                    // Display tooltip
                                    $tooltip.css({
                                        'top': top + 'px',
                                        'left': left + 'px',
                                        'display': 'block',
                                        'z-index': '100'
                                    });

                                },
                                callbacks: {
                                    label: function(item, data) {
                                        var label = data.datasets[item.datasetIndex].label || '';
                                        var yLabel = item.yLabel;
                                        var content = '';

                                        if (data.datasets.length > 1) {
                                            content += '<span class="badge badge-primary mr-auto">' + label + '</span>';
                                        }

                                        content += '<span class="popover-body-value">' + yLabel + '</span>' ;
                                        return content;
                                    }
                                }
                            }
                        },
                        doughnut: {
                            cutoutPercentage: 83,
                            tooltips: {
                                callbacks: {
                                    title: function(item, data) {
                                        var title = data.labels[item[0].index];
                                        return title;
                                    },
                                    label: function(item, data) {
                                        var value = data.datasets[0].data[item.index];
                                        var content = '';

                                        content += '<span class="popover-body-value">' + value + '</span>';
                                        return content;
                                    }
                                }
                            },
                            legendCallback: function(chart) {
                                var data = chart.data;
                                var content = '';

                                data.labels.forEach(function(label, index) {
                                    var bgColor = data.datasets[0].backgroundColor[index];

                                    content += '<span class="chart-legend-item">';
                                    content += '<i class="chart-legend-indicator" style="background-color: ' + bgColor + '"></i>';
                                    content += label;
                                    content += '</span>';
                                });

                                return content;
                            }
                        }
                    }
                }

                // yAxes
                Chart.scaleService.updateScaleDefaults('linear', {
                    gridLines: {
                        borderDash: [2],
                        borderDashOffset: [2],
                        color: (mode == 'dark') ? colors.gray[900] : colors.gray[300],
                        drawBorder: false,
                        drawTicks: false,
                        lineWidth: 0,
                        zeroLineWidth: 0,
                        zeroLineColor: (mode == 'dark') ? colors.gray[900] : colors.gray[300],
                        zeroLineBorderDash: [2],
                        zeroLineBorderDashOffset: [2]
                    },
                    ticks: {
                        beginAtZero: true,
                        padding: 10,
                        callback: function(value) {
                            if (!(value % 10)) {
                                return value
                            }
                        }
                    }
                });

                // xAxes
                Chart.scaleService.updateScaleDefaults('category', {
                    gridLines: {
                        drawBorder: false,
                        drawOnChartArea: false,
                        drawTicks: false
                    },
                    ticks: {
                        padding: 20
                    },
                    maxBarThickness: 10
                });

                return options;

            }

            // Parse global options
            function parseOptions(parent, options) {
                for (var item in options) {
                    if (typeof options[item] !== 'object') {
                        parent[item] = options[item];
                    } else {
                        parseOptions(parent[item], options[item]);
                    }
                }
            }

            // Push options
            function pushOptions(parent, options) {
                for (var item in options) {
                    if (Array.isArray(options[item])) {
                        options[item].forEach(function(data) {
                            parent[item].push(data);
                        });
                    } else {
                        pushOptions(parent[item], options[item]);
                    }
                }
            }

            // Pop options
            function popOptions(parent, options) {
                for (var item in options) {
                    if (Array.isArray(options[item])) {
                        options[item].forEach(function(data) {
                            parent[item].pop();
                        });
                    } else {
                        popOptions(parent[item], options[item]);
                    }
                }
            }

            // Toggle options
            function toggleOptions(elem) {
                var options = elem.data('add');
                var $target = $(elem.data('target'));
                var $chart = $target.data('chart');

                if (elem.is(':checked')) {

                    // Add options
                    pushOptions($chart, options);

                    // Update chart
                    $chart.update();
                } else {

                    // Remove options
                    popOptions($chart, options);

                    // Update chart
                    $chart.update();
                }
            }

            // Update options
            function updateOptions(elem) {
                var options = elem.data('update');
                var $target = $(elem.data('target'));
                var $chart = $target.data('chart');

                // Parse options
                parseOptions($chart, options);

                // Toggle ticks
                toggleTicks(elem, $chart);

                // Update chart
                $chart.update();
            }

            // Toggle ticks
            function toggleTicks(elem, $chart) {

                if (elem.data('prefix') !== undefined || elem.data('prefix') !== undefined) {
                    var prefix = elem.data('prefix') ? elem.data('prefix') : '';
                    var suffix = elem.data('suffix') ? elem.data('suffix') : '';

                    // Update ticks
                    $chart.options.scales.yAxes[0].ticks.callback = function(value) {
                        if (!(value % 10)) {
                            return prefix + value + suffix;
                        }
                    }

                    // Update tooltips
                    $chart.options.tooltips.callbacks.label = function(item, data) {
                        var label = data.datasets[item.datasetIndex].label || '';
                        var yLabel = item.yLabel;
                        var content = '';

                        if (data.datasets.length > 1) {
                            content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                        }

                        content += '<span class="popover-body-value">' + prefix + yLabel + suffix + '</span>';
                        return content;
                    }

                }
            }


            // Events

            // Parse global options
            if (window.Chart) {
                parseOptions(Chart, chartOptions());
            }

            // Toggle options
            $toggle.on({
                'change': function() {
                    var $this = $(this);

                    if ($this.is('[data-add]')) {
                        toggleOptions($this);
                    }
                },
                'click': function() {
                    var $this = $(this);

                    if ($this.is('[data-update]')) {
                        updateOptions($this);
                    }
                }
            });


            // Return

            return {
                colors: colors,
                fonts: fonts,
                mode: mode
            };

        })();


        //
        // Charts
        //

        'use strict';

        //
        // Massa Tubuh
        //
        var MT = <?php echo $CatatanKesehatanx; ?>;
        var tgl1 = <?php echo $tgl_ck1; ?>;

        //buat array tanggalnya
        var i;
        var date_MT = [];
        for (i = 0; i < 8; i++) {
            if(i>=0 && i<tgl1.length){
                date_MT[i] = GetFormattedDate(tgl1[i].updated_at);
            }else{
                date_MT[i] = " ";
            }
          
        } 
        //-------------------------------------------------------------

        console.log(date_MT);

        var MassaTubuh = (function() {

            // Variables

            var $chart = $('#chart-MT');


            // Methods

            function init($chart) {

                var MassaTubuh = new Chart($chart, {
                    type: 'bar',
                    options: {
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    color: Charts.colors.gray[900],
                                    zeroLineColor: Charts.colors.gray[900]
                                },
                                ticks: {
                                    callback: function(value) {
                                        if (!(value % 10)) {
                                            return value + ' Kg';
                                        }
                                    }
                                }
                            }]
                        },
                        tooltips: {
                            callbacks: {
                                label: function(item, data) {
                                    var label = data.datasets[item.datasetIndex].label || '';
                                    var yLabel = item.yLabel;
                                    var content = '';

                                    if (data.datasets.length > 1) {
                                        content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                    }

                                    content += '<span class="popover-body-value">' + yLabel + ' Kg</span>';
                                    return content;
                                }
                            }
                        }
                    },
                    data: {
                        labels: date_MT,
                        datasets: [{
                            label: 'Performance',
                            data: MT
                        }]
                    }
                });

                // Save to jQuery object

                $chart.data('chart', MassaTubuh);

            };


            // Events

            if ($chart.length) {
                init($chart);
            }

        })();




        //
        // Gula Darah
        //
        var GD = <?php echo $CatatanKesehatan2x; ?>;
        var tgl2 = <?php echo $tgl_ck2; ?>;

        //buat array tanggalnya
        var i;
        var date_GD = [];
        for (i = 0; i < 8; i++) {
            if(i>=0 && i<tgl2.length){
                date_GD[i] = GetFormattedDate(tgl2[i].updated_at);
            }else{
                date_GD[i] = " ";
            }
          
        } 

        var GulaDarah = (function() {

            // Variables

            var $chart = $('#chart-GD');


            // Methods

            function init($chart) {

                var GulaDarah = new Chart($chart, {
                     type: 'bar',
                    options: {
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    color: Charts.colors.gray[900],
                                    zeroLineColor: Charts.colors.gray[900]
                                },
                                ticks: {
                                    callback: function(value) {
                                        if (!(value % 10)) {
                                            return value + ' mg/dL';
                                        }
                                    }
                                }
                            }]
                        },
                        tooltips: {
                            callbacks: {
                                label: function(item, data) {
                                    var label = data.datasets[item.datasetIndex].label || '';
                                    var yLabel = item.yLabel;
                                    var content = '';

                                    if (data.datasets.length > 1) {
                                        content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                    }

                                    content += '<span class="popover-body-value">' + yLabel + ' mg/dL</span>';
                                    return content;
                                }
                            }
                        }
                    },
                    data: {
                        labels: date_GD,
                        datasets: [{
                            label: 'Performance',
                            data: GD
                        }]
                    }
                });

                // Save to jQuery object

                $chart.data('chart', GulaDarah);

            };


            // Events

            if ($chart.length) {
                init($chart);
            }

        })();




        //
        // Tekanan Darah
        //
        var TD1 = <?php echo $CatatanKesehatan3x; ?>;
        var TD2 = <?php echo $CatatanKesehatan32x; ?>;

        var tgl3 = <?php echo $tgl_ck3; ?>;

        //buat array tanggalnya
        var i;
        var date_TD = [];
        for (i = 0; i < 8; i++) {
            if(i>=0 && i<tgl3.length){
                date_TD[i] = GetFormattedDate(tgl3[i].updated_at);
            }else{
                date_TD[i] = " ";
            }
          
        } 

        var TekananDarah = (function() {

            // Variables

            var $chart = $('#chart-TD');


            // Methods

            function init($chart) {

                var TekananDarah = new Chart($chart, {
                     type: 'bar',
                    options: {
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    color: Charts.colors.gray[900],
                                    zeroLineColor: Charts.colors.gray[900]
                                },
                                ticks: {
                                    callback: function(value) {
                                        if (!(value % 10)) {
                                            return value + ' mmHg';
                                        }
                                    }
                                }
                            }]
                        },
                        tooltips: {
                            callbacks: {
                                label: function(item, data) {
                                    var label = data.datasets[item.datasetIndex].label || '';
                                    var yLabel = item.yLabel;
                                    var content = '';

                                    if (data.datasets.length > 1) {
                                        content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                    }

                                    content += '<span class="popover-body-value">' + yLabel + ' mmHg</span>';
                                    return content;
                                }
                            }
                        }
                    },
                    data: {
                        labels: date_TD,
                        datasets: 
                        [
                          {
                            label: 'Sistol',
                            data: TD1,
                            backgroundColor: 'rgba(0, 129, 214, 0.8)',
                          },
                          {
                            label: 'Diastol',
                            data: TD2,
                            type: 'bar',
                            backgroundColor: 'rgba(0,129, 218, 0.8)',
                          }
                        ]
                    }
                });

                // Save to jQuery object

                $chart.data('chart', TekananDarah);

            };


            // Events

            if ($chart.length) {
                init($chart);
            }

        })();



        //
        // Kolestrol
        //
        var K = <?php echo $CatatanKesehatan4x; ?>;
        var tgl4 = <?php echo $tgl_ck4; ?>;

        //buat array tanggalnya
        var i;
        var date_K = [];
        for (i = 0; i < 8; i++) {
            if(i>=0 && i<tgl4.length){
                date_K[i] = GetFormattedDate(tgl4[i].updated_at);
            }else{
                date_K[i] = " ";
            }
          
        } 

        var Kolestrol = (function() {

            // Variables

            var $chart = $('#chart-K');


            // Methods

            function init($chart) {

                var Kolestrol = new Chart($chart, {
                    type: 'bar',
                    options: {
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    color: Charts.colors.gray[900],
                                    zeroLineColor: Charts.colors.gray[900]
                                },
                                ticks: {
                                    callback: function(value) {
                                        if (!(value % 10)) {
                                            return value + ' mg/dL';
                                        }
                                    }
                                }
                            }]
                        },
                        tooltips: {
                            callbacks: {
                                label: function(item, data) {
                                    var label = data.datasets[item.datasetIndex].label || '';
                                    var yLabel = item.yLabel;
                                    var content = '';

                                    if (data.datasets.length > 1) {
                                        content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                    }

                                    content += '<span class="popover-body-value">' + yLabel + ' mg/dL</span>';
                                    return content;
                                }
                            }
                        }
                    },
                    data: {
                        labels: date_K,
                        datasets: [{
                            label: 'Performance',
                            data: K
                        }]
                    }
                });

                // Save to jQuery object

                $chart.data('chart', Kolestrol);

            };


            // Events

            if ($chart.length) {
                init($chart);
            }

        })();





        //function get date formated
        function GetFormattedDate(dateTime) {

            var today = new Date(dateTime).toLocaleString("en-US", {timeZone: "Asia/Jakarta"}); //timezone
            today = new Date(today);

            var dd = today.getDate();
            var mm = today.getMonth() + 1; //January is 0!

            var yyyy = today.getFullYear();
            if (dd < 10) {
              dd = '0' + dd;
            } 
            if (mm < 10) {
              mm = '0' + mm;
            } 

            return dd + '-' + mm + '-' + yyyy;

        }

    </script>
@endpush