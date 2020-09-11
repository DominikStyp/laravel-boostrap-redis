@extends('layout')
@section('content')
    <div style="width:500px">

        <form class="form-horizontal">
            <fieldset>

                <!-- Form Name -->
                <legend>Sum numbers</legend>

                <!-- Text input-->
                <div class="form-group">
                    <div class="col-lg-5">
                        <input id="n1" name="textinput" type="text" placeholder="Number 1" class="form-control input-md">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <div class="col-lg-5">
                        <input id="n2" name="textinput" type="text" placeholder="Number 2" class="form-control input-md">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-10">
                        <button id="sumBut" name="button1id" class="btn btn-success">Sum numbers</button>
                    </div>
                </div>

            </fieldset>
        </form>
    </div>

    <div id="modalOK" class="modal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sum of numbers</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Sum of numbers is: <b id="sumRes"></b></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="modalError" class="modal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color:red">Error</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="errorText" style="color:red"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        jQuery(function($){
            $("#sumBut").click(function(evt){
                evt.preventDefault();
                let n1 = parseInt($("#n1").val());
                let n2 = parseInt($("#n2").val());
                if(!Number.isInteger(n1)){
                    $("#modalError #errorText").text("Number 1 is not a numeric value");
                    $("#modalError").modal('show');
                    return;
                }
                if(!Number.isInteger(n2)){
                    $("#modalError #errorText").text("Number 2 is not a numeric value");
                    $("#modalError").modal('show');
                    return;
                }
                $("#sumRes").text(parseInt(n1) + parseInt(n2));
                $("#modalOK").modal('show');
            });
        });
    </script>
@stop
