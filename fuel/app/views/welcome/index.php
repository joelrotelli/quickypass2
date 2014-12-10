<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" ng-app="quickyPass"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="assets/tools/angular-xeditable/css/xeditable.css">
        <link rel="stylesheet" href="assets/css/main.css">

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

        <script src="assets/js/lib/angular.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.0.3/angular-sanitize.js"></script>
        <script src="assets/js/angular-xeditable/js/xeditable.js"></script>

    </head>
    <body ng-controller="ClientsListCtrl">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">QuickyPass</a>
        </div>
      </div>
    </div>

    <div id="wrap">

      <div id-"main" class="container">

        <br />
        <form class="form-horizontal" role="form">
           <div class="form-group">
               <input ng-model="query" type="text" class="form-control" placeholder="Rechercher un client...">
               <input type="hidden" ng-model="orderProp" value="name">
           </div>
        </form>
        <hr>
        <div class="panel-group" id="accordion">
          <div class="panel panel-default" ng-repeat="client in filteredClient = (clients | filter: query | orderBy:orderProp)">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{client.id}}">
                  <span editable-text="client.name" e-form="textBtnForm">
                    {{ client.name || 'empty' }}
                  </span>

                    <span class="glyphicon glyphicon-pencil pull-right" ng-click="textBtnForm.$show()" ng-hide="textBtnForm.$visible"></span>
                    <span class="clearfix"></span>
                </a>
              </h4>
            </div>

            <div id="collapse{{client.id}}" class="panel-collapse collapse " ng-class="{'collapse': filteredClient.length != 1, 'in': filteredClient.length == 1}">
              <div class="panel-body" ng-hide="!client.projects.length">

              <div class="panel-group" id="accordion2">
                <div class="panel panel-defaut" ng-repeat='project in filteredProject = (client.projects | filter: query | orderBy:orderProp)'>
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion2" href="#collapse2{{client.id}}">{{project.name}}</a></h4>
                  </div>

                  <div id="collapse2{{client.id}}" class="panel-collapse collapse" ng-class="{'collapse': filteredProject.length != 1, 'in': filteredProject.length == 1}">
                    <div class="panel-body">
                      <div ng-repeat="access in project.access">
                            <h5 class="access-title">{{access.title}}</h5>
                            <div class="access-desc" ng-bind-html="access.desc"></div>

                          </div>
                    </div>
                  </div>

                </div>
              </div>

              </div>
            </div>
          </div>
        </div>

      </div> <!-- /container -->
    </div>

    <footer>
      <p>&copy; QuickyPass 2013 - Powered by AngularJS, FuelPHP and <a href="http://www.joel-rotelli.info" target="_blank">Joël ROTELLI</a></p>
    </footer>


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script src="assets/js/vendor/bootstrap.min.js"></script>

        <script src="assets/js/main.js"></script>
    </body>
</html>
