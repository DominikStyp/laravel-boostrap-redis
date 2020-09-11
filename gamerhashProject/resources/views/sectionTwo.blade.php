@extends('layout')
@section('content')

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
                    <p id="errorText" style="color:red">Text can't be empty</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div style="width:500px">

        <form class="form-horizontal">
            <fieldset>

                <!-- Form Name -->
                <legend>Add text</legend>

                <!-- Text input-->
                <div class="form-group">
                    <div class="col-lg-5">
                        <input id="textInput" name="textinput" type="text" placeholder="Some text" class="form-control input-md">
                    </div>
                    <br />
                    <div class="col-lg-5">
                        <button id="addText" name="button1id" class="btn btn-success">Append text</button>
                        <button id="clear" name="button1id" class="btn btn-warning">Clear texts</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <div id="texts">

    </div>

    <script type="text/javascript">

        function getCard(text){
            return `
                <div class="card" style="margin-bottom:5px">
                  <div class="card-body">
                     ${text}
                  </div>
                </div>`;
        }

        function setComments(response){
            if(response.length < 3){
                return;
            }
            let decoded = JSON.parse(response);
            $("#texts").html('');
            decoded.forEach(text => {
                $("#texts").append(getCard(text));
            })
        }

        function clear(){
            $.post("/redis?clear=true", {}, response => {
                $("#texts").html('');
                console.log("Cleared!");
            });
        }

        function saveComment(){
            let text = $("#textInput").val();
            if(text.length < 1){
                $("#modalError").modal('show');
                return;
            }
            $.post("/redis", {
                text_key: text
            }, response => setComments(response)
            );
        }

        jQuery(function($){

            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

            $.get("/redis", function(response){
                setComments(response);
            });

            $("#clear").click(function(evt){
                evt.preventDefault();
                clear();
            });

            $("#addText").click(function(evt){
                evt.preventDefault();
                saveComment();
            });
        });
    </script>

@stop
