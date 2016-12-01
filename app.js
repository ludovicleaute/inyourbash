var app = angular.module("questionnaire", []);
app.controller("myCtrl", function($scope) {
    $scope.questions = [
	{
		question: "De quel pays venez-vous ?",
		options: ["Syrie", "Turquie", "Iraq", "Israel","Egypte","autre"]
	},
	{
		question: "Quels sont les problemes qui vous touchent le plus ?",
		options: ["Alimentation", "Hygienne", "Accès à l'eau", "Education"],
	},
	{
		question: "Avez vous de la famille dans un autre pays ?",
		options: ["Oui", "Non"],
	},
	];
});
