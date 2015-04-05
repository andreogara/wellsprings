<section>
<table class="table">
<thead><tr><td>Train Line</td><td>Route</td><td>Run Number</td><td>Operator ID</td></tr></thead>
<tbody>
        <tr ng-repeat="train in data | offset: currentPage*pageSize | limitTo:pageSize | orderBy: order" ng-if="train.trainLine != '' && train.trainLine != 'TRAIN_LINE' && data.length > 0">
            <td>{{ train.trainLine }}</td><td>{{ train.route }}</td><td>{{ train.runNumber }}</td><td>{{ train.operatorId }}</td>
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
</tfoot>
</table>

</section>