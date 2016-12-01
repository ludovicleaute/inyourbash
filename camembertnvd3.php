<!DOCTYPE html>
<meta charset="utf-8">
<style>

.arc text {
  font: 10px sans-serif;
  text-anchor: middle;
}

.arc path {
  stroke: #fff;
}

</style>
<body>
<script src="//d3js.org/d3.v3.min.js"></script>

<?php

// 1 : on ouvre le fichier
$testJson = '{"ref1":{"name" : "UnixCorn","depart" : "DuNord","arrivee" : "arrives[i]","besoins" : {"Faim" : "3","Soif" : "3"}}}';
$monfichier = fopen('data.json', 'r');
//$fichiercsv = fopen('dataexemple.csv', 'r');

//$data = json_decode($monfichier);
$testdata = json_decode($testJson);
echo $testdata["ref1"]["name"];

//if (empty($data)) {
//  echo '$var vaut soit 0, vide, ou pas définie du tout';
//}

//
//echo 
//foreach ($testJson as $personne) {
//  echo ;
//}

fclose($monfichier);
//fclose($fichiercsv);

?>

<script>

var width = 960,
    height = 500,
    radius = Math.min(width, height) / 2;

var color = d3.scale.ordinal()
    .range(["#98abc5", "#8a89a6", "#7b6888", "#6b486b", "#a05d56", "#d0743c", "#ff8c00"]);

var arc = d3.svg.arc()
    .outerRadius(radius - 10)
    .innerRadius(0);

var labelArc = d3.svg.arc()
    .outerRadius(radius - 40)
    .innerRadius(radius - 40);

var pie = d3.layout.pie()
    .sort(null)
    .value(function(d) { return d.population; });

var svg = d3.select("body").append("svg")
    .attr("width", width)
    .attr("height", height)
  .append("g")
    .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");

d3.csv("data.csv", type, function(error, data) {
  if (error) throw error;

  var g = svg.selectAll(".arc")
      .data(pie(data))
    .enter().append("g")
      .attr("class", "arc");

  g.append("path")
      .attr("d", arc)
      .style("fill", function(d) { return color(d.data.age); });

  g.append("text")
      .attr("transform", function(d) { return "translate(" + labelArc.centroid(d) + ")"; })
      .attr("dy", ".35em")
      .text(function(d) { return d.data.age; });
});

function type(d) {
  d.population = +d.population;
  return d;
}

</script>
