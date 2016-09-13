app.directive('modalAddBoard', function (){
    return {
        restrict: 'E',
        templateUrl: 'http://localhost/trello/tablero/modalAddBoard'
    }
});

app.directive('modalEditBoard', function (){
    return {
        restrict: 'E',
        templateUrl: 'http://localhost/trello/tablero/modalEditBoard'
    }
});

app.directive('modalDeleteBoard', function (){
   return {
       restrict: 'E',
       templateUrl: 'http://localhost/trello/tablero/modalDeleteBoard'
   } 
});

app.directive('searchBar', function (){
   return {
       restrict: 'E',
       templateUrl: 'http://localhost/trello/utilidades/searchBar'
   } 
});