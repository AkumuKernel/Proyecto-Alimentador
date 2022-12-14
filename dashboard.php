<?php include "includes/header.php"; ?>

	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/styles.css" />
  
<div class="chart"></div>

 <div id="wrapper">
      <div class="content-area">
        <div class="container-fluid">
          <div class="main">
            <div class="row sparkboxes mt-4 mb-4">
              <div class="col-md-4">
                <div class="box box1">
                  <div id="spark1"></div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="box box2">
                  <div id="spark2"></div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="box box3">
                  <div id="spark3"></div>
                </div>
              </div>
            </div>

            <div class="row mt-5 mb-4">
              <div class="col-md-6">
                <div class="box">
                  <div id="bar"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="box">
                  <div id="donut"></div>
                </div>
              </div>
            </div>

            <div class="row mt-4 mb-4">
              <div class="col-md-6">
                <div class="box">
                  <div id="area"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="box">
                  <div id="line"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.slim.min.js"></script>
    <script src="dist/apexcharts.js"></script>
   
    <script>
		Apex.grid = {
		  padding: {
			right: 0,
			left: 0
		  }
		}

		Apex.dataLabels = {
		  enabled: false
		}

		var randomizeArray = function (arg) {
		  var array = arg.slice();
		  var currentIndex = array.length, temporaryValue, randomIndex;

		  while (0 !== currentIndex) {

			randomIndex = Math.floor(Math.random() * currentIndex);
			currentIndex -= 1;

			temporaryValue = array[currentIndex];
			array[currentIndex] = array[randomIndex];
			array[randomIndex] = temporaryValue;
		  }

		  return array;
		}

		// data for the sparklines that appear below header area
		
		<?php 
			$comida = array();
			$flujo = array();
			$temp = array();

			$query = mysqli_query($db,"SELECT AVG(peso) as peso, date_format(fecha, '%Y-%m-%d') AS fecha FROM comida WHERE token = '".$_SESSION["username"]["token"]."' AND fecha > NOW() - INTERVAL 30 DAY AND fecha < NOW() + INTERVAL 1 DAY GROUP BY date_format(fecha, '%Y-%m%-d%')");
			while($row = mysqli_fetch_assoc($query)){
				$comida[] = $row;
			}
			$query = mysqli_query($db,"SELECT COUNT(*) as flujo, date_format(fecha, '%Y-%m-%d') AS fecha FROM flujo WHERE token = '".$_SESSION["username"]["token"]."' AND fecha > NOW() - INTERVAL 30 DAY AND fecha < NOW() + INTERVAL 1 DAY GROUP BY date_format(fecha, '%Y-%m%-d%')");
			
			while($row = mysqli_fetch_assoc($query)){
				$flujo[] = $row;
			}
			$query = mysqli_query($db,"SELECT AVG(temp) AS temp, date_format(fecha, '%Y-%m-%d') AS fecha FROM temperatura WHERE token = '".$_SESSION["username"]["token"]."' AND fecha > NOW() - INTERVAL 30 DAY AND fecha < NOW() + INTERVAL 1 DAY GROUP BY date_format(fecha, '%Y-%m%-d%')");
			
			while($row = mysqli_fetch_assoc($query)){
				$temp[] = $row;
			}						
	
		?>
		//var sparklineData1 = <?php echo json_encode($comida) ?>;
		//var sparklineData2 = <?php echo json_encode($flujo) ?>;
		//var sparklineData3 = <?php echo json_encode($temp) ?>;
		var sparklineData = [47, 45, 54, 38, 56, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46];

		// the default colorPalette for this dashboard
		//var colorPalette = ['#01BFD6', '#5564BE', '#F7A600', '#EDCD24', '#F74F58'];
		var colorPalette = ['#00D8B6','#008FFB',  '#FEB019', '#FF4560', '#775DD0']

		var spark1 = {
		  chart: {
			id: 'sparkline1',
			group: 'sparklines',
			type: 'area',
			height: 160,
			sparkline: {
			  enabled: true
			},
		  },
		  stroke: {
			curve: 'straight'
		  },
		  fill: {
			opacity: 1,
		  },
		  series: [{
			name: 'Alimentaci??n',
			//data: sparklineData1["peso"]
			data: randomizeArray(sparklineData)
		  }],
		  //labels: sparklineData1["fecha"],
		  labels: [...Array(24).keys()].map(n => `2018-09-0${n+1}`),
		  yaxis: {
			min: 0
		  },
		  xaxis: {
			type: 'datetime',
		  },
		  colors: ['#00D8B6'],
		  title: {
			text: 'X Promedio',
			offsetX: 30,
			style: {
			  fontSize: '24px',
			  cssClass: 'apexcharts-yaxis-title'
			}
		  },
		  subtitle: {
			text: 'Alimentaci??n',
			offsetX: 30,
			style: {
			  fontSize: '14px',
			  cssClass: 'apexcharts-yaxis-title'
			}
		  }
		}

		var spark2 = {
		  chart: {
			id: 'sparkline2',
			group: 'sparklines',
			type: 'area',
			height: 160,
			sparkline: {
			  enabled: true
			},
		  },
		  stroke: {
			curve: 'straight'
		  },
		  fill: {
			opacity: 1,
		  },
		  series: [{
			name: 'Hidrataci??n',
			//data: sparklineData2["flujo"]
			data: randomizeArray(sparklineData)
		  }],
		  //labels: sparklineData2["fecha"],
		  labels: [...Array(24).keys()].map(n => `2018-09-0${n+1}`),
		  yaxis: {
			min: 0
		  },
		  xaxis: {
			type: 'datetime',
		  },
		  colors: ['#008FFB'],
		  title: {
			text: 'X veces',
			offsetX: 30,
			style: {
			  fontSize: '24px',
			  cssClass: 'apexcharts-yaxis-title'
			}
		  },
		  subtitle: {
			text: 'Hidrataci??n',
			offsetX: 30,
			style: {
			  fontSize: '14px',
			  cssClass: 'apexcharts-yaxis-title'
			}
		  }
		}

		var spark3 = {
		  chart: {
			id: 'sparkline3',
			group: 'sparklines',
			type: 'area',
			height: 160,
			sparkline: {
			  enabled: true
			},
		  },
		  stroke: {
			curve: 'straight'
		  },
		  fill: {
			opacity: 1,
		  },
		  series: [{
			name: 'Temperatura',
			//data: sparklineData3["temp"]
			data: randomizeArray(sparklineData)
		  }],
		  //labels: sparklineData3["fecha"],
		  labels: [...Array(24).keys()].map(n => `2018-09-0${n+1}`),
		  xaxis: {
			type: 'datetime',
		  },
		  yaxis: {
			min: 0
		  },
		  colors: ['#FEB019'],
		  //colors: ['#5564BE'],
		  title: {
			text: 'X[??C] promedio',
			offsetX: 30,
			style: {
			  fontSize: '24px',
			  cssClass: 'apexcharts-yaxis-title'
			}
		  },
		  subtitle: {
			text: 'Temperatura',
			offsetX: 30,
			style: {
			  fontSize: '14px',
			  cssClass: 'apexcharts-yaxis-title'
			}
		  }
		}
		
		new ApexCharts(document.querySelector("#spark1"), spark1).render();
		new ApexCharts(document.querySelector("#spark2"), spark2).render();
		new ApexCharts(document.querySelector("#spark3"), spark3).render();

		var optionsArea = {
		  chart: {
			height: 340,
			type: 'area',
			zoom: {
			  enabled: false
			},
		  },
		  stroke: {
			curve: 'straight'
		  },
		  colors: colorPalette,
		  series: [
			{
			  name: "Comida",
			  data: [{
				x: 0,
				y: 0
			  }, {
				x: 4,
				y: 5
			  }, {
				x: 5,
				y: 3
			  }, {
				x: 9,
				y: 8
			  }, {
				x: 14,
				y: 4
			  }, {
				x: 18,
				y: 5
			  }, {
				x: 25,
				y: 0
			  }]
			},
			{
			  name: "Hidrataci??n",
			  data: [{
				x: 0,
				y: 0
			  }, {
				x: 4,
				y: 6
			  }, {
				x: 5,
				y: 4
			  }, {
				x: 14,
				y: 8
			  }, {
				x: 18,
				y: 5.5
			  }, {
				x: 21,
				y: 6
			  }, {
				x: 25,
				y: 0
			  }]
			},
			{
			  name: "Temperatura",
			  data: [{
				x: 0,
				y: 0
			  }, {
				x: 2,
				y: 5
			  }, {
				x: 5,
				y: 4
			  }, {
				x: 10,
				y: 11
			  }, {
				x: 14,
				y: 4
			  }, {
				x: 18,
				y: 8
			  }, {
				x: 25,
				y: 0
			  }]
			}
		  ],
		  fill: {
			opacity: 1,
		  },
		  title: {
			text: 'Analisis diario de la mascota',
			align: 'left',
			style: {
			  fontSize: '18px'
			}
		  },
		  markers: {
			size: 0,
			style: 'hollow',
			hover: {
			  opacity: 5,
			}
		  },
		  tooltip: {
			intersect: true,
			shared: false,
		  },
		  xaxis: {
			tooltip: {
			  enabled: false
			},
			labels: {
			  show: false
			},
			axisTicks: {
			  show: false
			}
		  },
		  yaxis: {
			tickAmount: 4,
			max: 12,
			axisBorder: {
			  show: false
			},
			axisTicks: {
			  show: false
			},
			labels: {
			  style: {
				colors: '#78909c'
			  }
			}
		  },
		  legend: {
			show: false
		  }
		}

		var chartArea = new ApexCharts(document.querySelector('#area'), optionsArea);
		chartArea.render();

		var optionsBar = {
		  chart: {
			type: 'bar',
			height: 380,
			width: '100%',
			stacked: true,
		  },
		  plotOptions: {
			bar: {
			  columnWidth: '45%',
			}
		  },
		  colors: colorPalette,
		  series: [{
			name: "Comida",
			/*data: sparklineData1[peso],*/
			data: [42, 52, 16, 55, 59, 51, 45, 32, 26, 33, 44, 51, 42, 56],
		  }, {
			name: "Agua",
			/* data: sparklineData2[flujo], */
			data: [6, 12, 4, 7, 5, 3, 6, 4, 3, 3, 5, 6, 7, 4],
		  }],
		  /*labels: sparklineData1[fecha],*/
		  labels: [10,11,12,13,14,15,16,17,18,19,20,21,22,23],
		  xaxis: {
			labels: {
			  show: false
			},
			axisBorder: {
			  show: false
			},
			axisTicks: {
			  show: false
			},
		  },
		  yaxis: {
			axisBorder: {
			  show: false
			},
			axisTicks: {
			  show: false
			},
			labels: {
			  style: {
				colors: '#78909c'
			  }
			}
		  },
		  title: {
			text: 'Consumo semanal',
			align: 'left',
			style: {
			  fontSize: '18px'
			}
		  }

		}

		var chartBar = new ApexCharts(document.querySelector('#bar'), optionsBar);
		chartBar.render();


		var optionDonut = {
		  chart: {
			  type: 'donut',
			  width: '100%',
			  height: 400
		  },
		  dataLabels: {
			enabled: false,
		  },
		  plotOptions: {
			pie: {
			  customScale: 0.8,
			  donut: {
				size: '75%',
			  },
			  offsetY: 20,
			},
			stroke: {
			  colors: undefined
			}
		  },
		  colors: colorPalette,
		  title: {
			text: 'Interacciones Diarias',
			style: {
			  fontSize: '18px'
			}
		  },
		   /*
		  <?php
		   $series = [];
		   $query = mysqli_query($db ,"SELECT COUNT(*) AS count FROM comida WHERE date_format(fecha, '%Y-%m-%d') = date_format(NOW(), '%Y-%m-%d') AND token = '".$_SESSION["username"]["token"]."'");
		   
		   while($row = mysqli_fetch_assoc($query)){
				$series[0] = $row['count'];
			}
		   
		   $query = mysqli_query($db ,"SELECT COUNT(*) AS count FROM flujo WHERE date_format(fecha, '%Y-%m-%d') = date_format(NOW(), '%Y-%m-%d') AND token = '".$_SESSION["username"]["token"]."'");
		   
		   while($row = mysqli_fetch_assoc($query)){
				$series[1] = $row['count'];
			}
			
		   $query = mysqli_query($db ,"SELECT COUNT(*) AS count FROM temperatura WHERE date_format(fecha, '%Y-%m-%d') = date_format(NOW(), '%Y-%m-%d') AND token = '".$_SESSION["username"]["token"]."'");
		   
		   while($row = mysqli_fetch_assoc($query)){
				$series[2] = $row['count'];
			}
			
		   $query = mysqli_query($db ,"SELECT COUNT(*) AS count FROM humedad WHERE date_format(fecha, '%Y-%m-%d') = date_format(NOW(), '%Y-%m-%d') AND token = '".$_SESSION["username"]["token"]."'");
		   
		   while($row = mysqli_fetch_assoc($query)){
				$series[3] = $row['count'];
			}
		  ?>
		  series: <?php echo json_encode($series) ?>,
		   */
		  series: [21, 23, 19, 14],
		  labels: ['Comida', 'Agua', 'Temperatura', 'Humedad'],
		  legend: {
			position: 'left',
			offsetY: 80
		  }
		}

		var donut = new ApexCharts(
		  document.querySelector("#donut"),
		  optionDonut
		)
		donut.render();


		function trigoSeries(cnt, strength) {
		  var data = [];
		  for (var i = 0; i < cnt; i++) {
			  data.push((Math.sin(i / strength) * (i / strength) + i / strength+1) * (strength*2));
		  }

		  return data;
		}



		var optionsLine = {
		  chart: {
			height: 340,
			type: 'line',
			zoom: {
			  enabled: false
			}
		  },
		  plotOptions: {
			stroke: {
			  width: 4,
			  curve: 'smooth'
			},
		  },
		  colors: colorPalette,
		  series: [
			{
			  name: "Alimentaci??n",
			  /* 
			  <?php
			  $query = mysqli_query($db,"SELECT peso FROM comida WHERE token = '".$_SESSION["username"]["token"]."' AND fecha > NOW() - INTERVAL 1 DAY AND fecha < NOW()");
			  $alimentacion = [];
			  
			  while($row = mysqli_fetch_assoc($query)){
				$alimentacion[] = $row;
			  }
			  
			  ?>
			  data: <?php echo json_encode($alimentacion); ?>
			  */
			  data: trigoSeries(52, 20)
			},
			{
			  name: "Hidrataci??n",
			  
			  /*<?php
			  $query = mysqli_query($db,"SELECT flujo FROM flujo WHERE token = '".$_SESSION["username"]["token"]."' AND fecha > NOW() - INTERVAL 1 DAY AND fecha < NOW()");
			  $hidratacion = [];
			  
			  while($row = mysqli_fetch_assoc($query)){
				$hidratacion[] = $row;
			  }
			  ?>
			  data: <?php echo json_encode($hidratacion); ?>
			  */
			  data: trigoSeries(52, 27)
			},
		  ],
		  title: {
			floating: false,
			text: 'Alimentaci??n e Hidrataci??n Diaria',
			align: 'left',
			style: {
			  fontSize: '18px'
			}
		  },
		  subtitle: {
			text: '',
			align: 'center',
			margin: 30,
			offsetY: 40,
			style: {
			  color: '#222',
			  fontSize: '24px',
			}
		  },
		  markers: {
			size: 0
		  },

		  grid: {

		  },
		  xaxis: {
			labels: {
			  show: false
			},
			axisTicks: {
			  show: false
			},
			tooltip: {
			  enabled: false
			}
		  },
		  yaxis: {
			tickAmount: 2,
			labels: {
			  show: false
			},
			axisBorder: {
			  show: false,
			},
			axisTicks: {
			  show: false
			},
			min: 0,
		  },
		  legend: {
			position: 'top',
			horizontalAlign: 'left',
			offsetY: -20,
			offsetX: -30
		  }

		}

		var chartLine = new ApexCharts(document.querySelector('#line'), optionsLine);

		// a small hack to extend height in website sample dashboard
		chartLine.render().then(function () {
		  var ifr = document.querySelector("#wrapper");
		  if (ifr.contentDocument) {
			ifr.style.height = ifr.contentDocument.body.scrollHeight + 20 + 'px';
		  }
		});


		// on smaller screen, change the legends position for donut
		var mobileDonut = function() {
		  if($(window).width() < 768) {
			donut.updateOptions({
			  plotOptions: {
				pie: {
				  offsetY: -15,
				}
			  },
			  legend: {
				position: 'bottom'
			  }
			}, false, false)
		  }
		  else {
			donut.updateOptions({
			  plotOptions: {
				pie: {
				  offsetY: 20,
				}
			  },
			  legend: {
				position: 'left'
			  }
			}, false, false)
		  }
		}

		$(window).resize(function() {
		  mobileDonut()
		});

    </script>

<?php include "includes/footer.php"; ?>
