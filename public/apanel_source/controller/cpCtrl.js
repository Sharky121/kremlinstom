angular.module('app').controller('cpCtrl',['$scope', '$rootScope', '$http',function($scope,$rootScope,$http){
	$scope.promise = $http.post('apanel/model/cpinfo').then(
		function (response){
			$scope.menuTitles = response.data.menu;
		},
		function (error){
			console.log(error.status)
		});
}]);
	



