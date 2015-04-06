var wellSprings = angular.module('wellSprings', ['ngAnimate', 'xeditable']);
wellSprings.run(function(editableOptions){
    editableOptions.theme = 'bs3';
});
//Initializing the data and populating the offline database
//Controller for the list Page
wellSprings.filter('offset', function(){
        return function(input, start) {
            start = +start; //parse to int
            return input.slice(start);
        };

});
wellSprings.controller("ListController", ['$scope', 'dataFactory', function ($scope, dataFactory){
    $scope.itemsPerPage = 5;
    $scope.currentPage = 0;
    $scope.pageSize = 5;
    $scope.order = "runNumber";
    $scope.data = null;
    if (dataFactory.getData()){
        dataFactory.getData().then(function(result){
            var data = result.data;
            var cleanData = function(data){
                var collection = [], cleanArray = [];
                $.each(data, function(index, value){
                    if($.inArray(value.runNumber, collection) === -1) {
                        collection.push(value.runNumber);
                        cleanArray.push(value);
                    }
                });
                return cleanArray;
            }
            return cleanData(data);
        }).then(function(result){
            $scope.data =  result;
            $scope.checked = true;
        });
    }
    $scope.numberOfPages=function(){
        return Math.ceil($scope.data.length/$scope.pageSize);
    }
    $scope.$watch('data', function() {
        console.log('It just changed bitch!!!' +$scope.data);
    });
}]);
wellSprings.factory("dataFactory", ['$http', '$log', '$q', function($http, $log, $q) {
    var deferred = $q.defer();
    return {
        getData : function(){
                var train = function(trainLine, route, runNumber, operatorId){
                    this.trainLine = trainLine;
                    this.route = route;
                    this.runNumber = runNumber;
                    this.operatorId = operatorId;
                }
                var trainArray = [];
            try{
                var data = JSON.parse($("#hidden").val());
                if (typeof data !== 'undefined' && data.length > 0){
                    for (var i = 0; i < data.length; i++){
                        var currentTrain = new train(data[i][0],data[i][1],data[i][2],data[i][3]);
                        trainArray.push(currentTrain);
                    }
                    deferred.resolve({
                        data: trainArray
                    });
                }
                return deferred.promise;
            }
            catch(err){
                console.log(err.message);
            }
        }

    }
}]);