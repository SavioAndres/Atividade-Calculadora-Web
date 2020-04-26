var app = angular.module("app", []);

app.controller("index", function($http, $scope) {
    $http.get("http://localhost/api").then(function(response) {
        $scope.index = response.data;
    });
});

app.controller("calculadora", ["$http", "$scope", function($http, $scope) {
    $scope.number1 = "";
    $scope.number2 = "";
    $scope.resultado = "0";
    
    $scope.calcular = function(operacao_) {
		$http({
			method: 'POST' ,
			url: 'http://localhost/api',
			data: { operacao: operacao_, number1: $scope.number1, number2: $scope.number2 }
		}).then(function success(response) {
            $scope.resultado = response.data.resultado;
            //$scope.historico = response.data;
		}, function unsuccess(response) {
            console.log(response);
		});
	}
}]);