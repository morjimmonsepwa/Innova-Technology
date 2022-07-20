// // Set new default font family and font color to mimic Bootstrap's default styling
// Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
// Chart.defaults.global.defaultFontColor = '#858796';

// // Pie Chart Example
// var ctx = document.getElementById("myPieChart");
// var myPieChart = new Chart(ctx, {
//   type: 'pie',
//   data: {
//     labels: ["Abierto", "Proceso", "Cerrado"],
//     datasets: [{
//       data: [55, 30, 15],
//       backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
//       hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
//       hoverBorderColor: "rgba(234, 236, 244, 1)",
//     }],
//   },
//   options: {
//     maintainAspectRatio: false,
//     tooltips: {
//       backgroundColor: "rgb(255,255,255)",
//       bodyFontColor: "#858796",
//       borderColor: '#dddfeb',
//       borderWidth: 1,
//       xPadding: 15,
//       yPadding: 15,
//       displayColors: false,
//       caretPadding: 10,
//     },
//     legend: {
//       display: false
//     },
//     cutoutPercentage: 80,
//   },
// });

am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartdiv");

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);

// Create chart
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
var chart = root.container.children.push(
  am5percent.PieChart.new(root, {
    endAngle: 270
  })
);

// Create series
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
var series = chart.series.push(
  am5percent.PieSeries.new(root, {
    valueField: "value",
    categoryField: "category",
    endAngle: 270
  })
);

series.states.create("hidden", {
  endAngle: -90
});

// Set data
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
series.data.setAll([{
  category: "Lithuania",
  value: 501.9
}, {
  category: "Czechia",
  value: 301.9
}, {
  category: "Ireland",
  value: 201.1
}, {
  category: "Germany",
  value: 165.8
}, {
  category: "Australia",
  value: 139.9
}, {
  category: "Austria",
  value: 128.3
}, {
  category: "UK",
  value: 99
}]);

series.appear(1000, 100);

}); // end am5.ready()
