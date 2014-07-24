customDirectives = angular.module('customDirectives', []);
customDirectives.directive('customTabs', function () {
    return {
        restrict: 'A',
        require: '?ngModel',
        scope:{
            ngModel: '='
        },
        template: '\
            <ul class="nav nav-tabs">\
                <li ng-class="{active: item.active}" ng-repeat="item in ngModel"><a href="#{{contentBaseId}}-{{$index}}" ng-click="toggleActive($index)">{{item.title}}</a></li>\
            </ul>\
            <div class="tab-content">\
              <div class="tab-pane" ng-class="{active: item.active}" id="{{contentBaseId}}-{{$index}}" ng-repeat="item in ngModel">{{item.content}}</div>\
            </div>',
        link: function(scope, el, attrs){
            scope.contentBaseId = attrs.tabsBaseId;
        
            scope.toggleActive = function(ind){
                angular.forEach(scope.ngModel, function(value, key){
                    if (key == ind)
                    {
                        scope.ngModel[key].active = !scope.ngModel[key].active;
                        $("#" + scope.panelBaseId + "-" + ind).tab('show');
                    }
                    else
                        scope.ngModel[key].active = false;
                });
            }
        }
    };
});

angular.module('CustomComponents', ['customDirectives']);

function CustomDirectivesController($scope, $http)
{
    getTabs = function(data)
    {
        $scope.tabsData = data.tabs;
    };
    
    $scope.loadTabs = function(num)
    {
        $http.jsonp("tabs/tab-" + num + ".js");
    }
    
    $scope.tabsData = [];
}
