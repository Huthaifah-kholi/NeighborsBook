
 var myApp = angular.module('monthApp', [], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<<');
        $interpolateProvider.endSymbol('>>');
    });



myApp.controller('monthCtrl', function($scope) {
    $scope.months = [
      {value:'01',name:'Jan' },
      {value:'02',name:'Feb' }, 
      {value:'03',name:'Mar' }, 
      {value:'04',name:'Apr' }, 
      {value:'05',name:'May' }, 
      {value:'06',name:'Jun' }, 
      {value:'07',name:'Jul' }, 
      {value:'08',name:'Aug' }, 
      {value:'09',name:'Sep' }, 
      {value:'10',name:'Oct' }, 
      {value:'11',name:'Nov' }, 
      {value:'12',name:'Dec' }
        
    ];
});


myApp.filter('makeRange', function() {

        return function(input) {
            var lowBound, highBound;
            switch (input.length) {
            case 1:
                lowBound = 0;
                highBound = parseInt(input[0]) - 1;
                break;
            case 2:
                lowBound = parseInt(input[0]);
                highBound = parseInt(input[1]);
                break;
            default:
                return input;
            }
            
            var result = [];
            for (var i = lowBound; i <= highBound; i++)
                result.push(i);
            return result;
        };
    });

