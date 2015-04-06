<section>
<table class="table">
<thead><tr><td>Train Line</td><td>Route</td><td>Run Number</td><td>Operator ID</td></tr></thead>
<tbody>
        <tr ng-repeat="train in data | offset: currentPage*pageSize | limitTo:pageSize | orderBy: order" ng-if="train.trainLine != '' && train.trainLine != 'TRAIN_LINE' && data.length > 0">
            <td><input type="hidden" name="id" value="{{data.indexOf(train)}}"/><a href="#" editable-text="train.trainLine">{{ train.trainLine }}</a></td><td><a href="#" editable-text="train.route">{{ train.route }}</a></td><td><a href="#" editable-text="train.runNumber">{{ train.runNumber }}</a></td><td><a href="#" editable-text="train.operatorId">{{ train.operatorId }}</a></td>
        </tr>
</tbody>
<tfoot>
<tr><td>
<div>
  <button ng-disabled="currentPage == 0" ng-click="currentPage=currentPage-1">
          Previous
      </button>
      {{currentPage+1}}/{{numberOfPages()}}
      <button ng-disabled="currentPage >= data.length/pageSize - 1" ng-click="currentPage=currentPage+1">
          Next
      </button>
      </div>
      </td></tr>
      <tr><td>
        <form class="form-inline" role="form" action="refresh.php" method="post">
                  <div class="form-group">
                     <input type="text" class="form-control" name="trainLine" placeholder="Train Line"/></td>
                     <td><input type="text" class="form-control" name="route" placeholder="Route"/></td>
                     <td><input type="text" class="form-control" name="runNumber" placeholder="Run Number"/></td>
                     <td><input type="text" class="form-control" name="operatorId" placeholder="Operator ID"/></td>
                  </div>
        </tr><tr><td><button type="submit" class="btn btn-default" name="submit">Add Record</button>
                </form>
      </td></tr>
</tfoot>
</table>

</section>