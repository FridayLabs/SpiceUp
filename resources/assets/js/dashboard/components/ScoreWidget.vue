<template>
    <div class="panel panel-default">
        <div class="panel-heading">SCORE Component</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-6">
                <a class="btn btn-primary btn-sm" href="#">
                <i class="glyphicon glyphicon-plus"></i>
                </a>
                </div>
                <div class="col-xs-6">
                <a class="btn btn-primary btn-sm" href="#">
                <i class="glyphicon glyphicon-plus"></i>
                </a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                <input class="form-control" value="0">
                </div>
                <div class="col-xs-6">
                <input class="form-control" value="0">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                <a class="btn btn-primary btn-sm" href="#">
                <i class="glyphicon glyphicon-minus"></i>
                </a>
                </div>
                <div class="col-xs-6">
                <a class="btn btn-primary btn-sm" href="#">
                <i class="glyphicon glyphicon-minus"></i>
                </a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">Team Home</div>
                <div class="col-xs-6">Team Away</div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                <table class="table table-bordered table-condensed">
                    <tr>
                        <td>12'</td>
                        <td>Team Home</td>
                        <td>Player #1</td>
                        <td>
                            <a href="#" class="btn bnt-warning btn-sm">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a href="#" class="btn bnt-danger btn-sm">
                                <i class="glyphicon glyphicon-remove"></i>
                            </a>
                        </td>
                    </tr>
                </table>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="[120,20]">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                        <i class="glyphicon glyphicon-map-marker"></i>
                        </button>
                      </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
