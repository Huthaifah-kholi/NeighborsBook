
 var years = angular.module('yearApp', [], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<<');
        $interpolateProvider.endSymbol('>>');
    });



years.controller('yearCtrl', function($scope) {
    $scope.y1 = [
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











