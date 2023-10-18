// -------------------------------------------------------------------------------------------------------------------------------------------
// Dashboard 1 : Chart Init Js

// -------------------------------------------------------------------------------------------------------------------------------------------
$(function () {
  
  var sname = new Array();
  var total = new Array();
  var cld = new Array();
  var colorFondo = new Array();
  var total_r = $('.visit-total').text().split('\n');
  var total_c = $('.visit-closed').text().split('\n');
  const out = total_r.map(str => str.trim());
  const close = total_c.map(str => str.trim());
  var o = Math.round, r = Math.random, s = 255;
  for( var i = 0; i < out.length; i++ ){
    if ( out[ i ] ){
      total.push( parseInt(out[ i ]) );
      //max += parseInt(out[ i ]);
      colorFondo.push('rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + r().toFixed(1) + ')');
    }
    if(close[ i ]){
      cld.push( parseInt(close[ i ]) );
    }
    sname.push( $('#w'+i).text() );
  }
    /*console.log(cld);
    var s = $('.note-title').text().split('\n                ');
    const output = s.map(str => str.trim());
    var sistema = new Array();
    for( var i = 0, j = output.length; i < j; i++ ){
        if ( output[ i ] ){
          sistema.push( output[ i ] );
      }
    }
    total_1 = $('.badge').text();*/
    //console.log(sistema);
    "use strict";
    // -----------------------------------------------------------------------
    // Sales overview
    // -----------------------------------------------------------------------
  
    var options_Sales_Overview = {
      series: [
        {
          name: "Earning ",
          data: [0, 150, 110, 240, 200, 200, 300, 200, 380, 300, 400, 380],
        },
        {
          name: "Expense ",
          data: [0, 100, 70, 100, 240, 180, 220, 140, 250, 210, 340, 320],
        },
        {
          name: "Sales ",
          data: [0, 50, 30, 60, 180, 120, 180, 80, 190, 150, 240, 240],
        },
      ],
      chart: {
        height: 345,
        type: "area",
        stacked: true,
        fontFamily: "Montserrat,sans-serif",
        zoom: {
          enabled: false,
        },
        toolbar: {
          show: false,
        },
      },
      colors: ["#e9edf2", "#398bf7", "#7460ee"],
      dataLabels: {
        enabled: false,
      },
      stroke: {
        show: false,
      },
      fill: {
        type: "solid",
        colors: ["#e9edf2", "#398bf7", "#7460ee"],
        opacity: 1,
      },
      markers: {
        size: 3,
        strokeColors: "#fff",
        strokeWidth: 0,
        colors: ["#e9edf2", "#398bf7", "#7460ee"],
      },
      grid: {
        borderColor: "rgba(0,0,0,.1)",
      },
      xaxis: {
        categories: [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec",
        ],
        labels: {
          style: {
            colors: [
              "#a1aab2",
              "#a1aab2",
              "#a1aab2",
              "#a1aab2",
              "#a1aab2",
              "#a1aab2",
              "#a1aab2",
              "#a1aab2",
              "#a1aab2",
              "#a1aab2",
              "#a1aab2",
              "#a1aab2",
              "#a1aab2",
            ],
          },
        },
      },
      yaxis: {
        labels: {
          style: {
            colors: [
              "#a1aab2",
              "#a1aab2",
              "#a1aab2",
              "#a1aab2",
              "#a1aab2",
              "#a1aab2",
              "#a1aab2",
            ],
          },
        },
      },
      legend: {
        show: false,
      },
      tooltip: {
        theme: "dark",
        marker: {
          show: true,
        },
      },
    };
  
    var chart_line_overview = new ApexCharts(
      document.querySelector("#Sales-Overview"),
      options_Sales_Overview
    );
    chart_line_overview.render();
  
    // -----------------------------------------------------------------------
    // Visitor
    // -----------------------------------------------------------------------
  
    var option_Visit_Separation = {
      series: total,
      labels: sname,
      chart: {
        type: "donut",
        fontFamily: "Montserrat,sans-serif",
        height: 225,
        offsetY: 30,
        width: "100%",
      },
      dataLabels: {
        enabled: false,
      },
      stroke: {
        width: 0,
      },
      plotOptions: {
        pie: {
          expandOnClick: true,
          donut: {
            size: "80",
            labels: {
              show: true,
              name: {
                show: true,
                offsetY: 10,
              },
              value: {
                show: false,
              },
              total: {
                show: true,
                color: "#000",
                fontFamily: "Montserrat,sans-serif",
                fontSize: "26px",
                fontWeight: 600,
                label: "Sistema",
              },
            },
          },
        },
      },
      colors: colorFondo,
      tooltip: {
        show: true,
        fillSeriesColor: false,
      },
      legend: {
        show: false,
      },
      responsive: [
        {
          breakpoint: 1025,
          options: {
            chart: {
              height: 220,
              width: 220,
            },
          },
        },
        {
          breakpoint: 769,
          options: {
            chart: {
              height: 250,
              width: 250,
            },
          },
        },
      ],
    };
  
    var chart_pie_donut_status = new ApexCharts(
      document.querySelector("#Visit-Separation"),
      option_Visit_Separation
    );
    chart_pie_donut_status.render();
  
    // -----------------------------------------------------------------------
    // Website Visitor
    // -----------------------------------------------------------------------
    var option_Website_visit = {
      series: [
        {
          name: "Activos",
          data: total,
        },
        {
          name: "Implementados",
          data: cld,
        },
      ],
      chart: {
        fontFamily: "Montserrat,sans-serif",
        height: 400,
        type: "area",
        toolbar: {
          show: false,
        },
      },
      grid: {
        show: true,
        borderColor: "rgba(0,0,0,.1)",
        xaxis: {
          lines: {
            show: true,
          },
        },
        yaxis: {
          lines: {
            show: true,
          },
        },
      },
      colors: ["#eb52d7", "#a858d4"],
      fill: {
        type: "gradient",
        opacity: 0.5,
        gradient: {
          shade: "light",
          type: "vertical",
          shadeIntensity: 0.5,
          gradientToColors: undefined, // optional, if not defined - uses the shades of same color in series
          inverseColors: true,
          opacityFrom: 0.5,
          opacityTo: 0.3,
          stops: [0, 50, 100],
          colorStops: [],
        },
      },
      dataLabels: {
        enabled: false,
      },
      stroke: {
        curve: "smooth",
        width: 2,
      },
      markers: {
        size: 3,
        strokeColors: "transparent",
      },
      xaxis: {
        categories: sname,
        labels: {
          style: {
            colors: [
              "#a1aab2",
              "#a1aab2",
              "#a1aab2",
              "#a1aab2",
              "#a1aab2",
              "#a1aab2",
              "#a1aab2",
              "#a1aab2",
            ],
          },
        },
        axisBorder: {
          color: "rgba(0,0,0,0.5)",
        },
      },
      yaxis: {
        labels: {
          style: {
            colors: [
              "#a1aab2",
              "#a1aab2",
              "#a1aab2",
              "#a1aab2",
              "#a1aab2",
              "#a1aab2",
              "#a1aab2",
            ],
          },
        },
      },
      tooltip: {
        x: {
          format: "dd/MM/yy HH:mm",
        },
        theme: "dark",
      },
      legend: {
        show: false,
      },
    };
  
    var chart_area_spline = new ApexCharts(
      document.querySelector("#Website-Visit"),
      option_Website_visit
    );
    chart_area_spline.render();
  });