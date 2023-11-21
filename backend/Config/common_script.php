<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    
<!-- dev URL -->
<!--<script src="https://rawgit.com/unconditional/jquery-table2excel/master/src/jquery.table2excel.js"></script>-->
<!--<script src="excel/dist/jquery.table2excel.js"></script>-->
<script>
    $(document).ready(function () {


        $("#myTable tr td div").css({
            "height": "50px",
            "overflow": "hidden"
        });
        $("#myTable tr td div").dblclick(function () {
            $("#myTable tr td div").css({
                "height": "50px",
                "overflow": "hidden"
            });

            $(this).css({
                "height": "auto",
                "overflow": "visible"
            });
        });
        var doubleclickeditem;
        $("#myTable tr td").dblclick(function () {
            $("#myTable tr td").removeAttr("contenteditable");
            $("#myTable tr td").css({"border": "none"})
            $(this).attr("contenteditable", 'true');
            $(this).css({"border": "thin solid red"})
            doubleclickeditem = $(this);
        });
        
         $('.printExcel').on('click', function(e){
            e.preventDefault();
            ResultsToTable();
        });

        // $(".printExcel").click(function () {
        //     $(function () {
                
        //         $("#myTable").table2excel({
        //             exclude: ".noExl",
        //             name: "Excel Document Name",
        //             filename: "myFileName" + new Date().toISOString().replace(/[\-\:\.]/g, ""),
        //             fileext: ".xls",
        //             exclude_img: true,
        //             exclude_links: true,
        //             exclude_inputs: true
        //         });
        //     });
        // });
    });
    
    function ResultsToTable(){    
        $("#myTable").table2excel({
            // exclude: ".noExl",
            name: "Results"
        });
    }
    
    function clickTo(path) {
        window.location.href = "" + path;
    }

    function onSelectChange(rowid, column, table, this_select) {
        var value = this_select.value;
        if (column == "client_approval") {
            $.post("../controller/UpdateDataV2.php",
                    {
                        id: rowid,
                        column: column,
                        tbname: table,
                        value: value
                    },
                    function (data, status) {
                        alert(status + data);
                    });
        }
    }
    
    $(document).ajaxStart(function() {
      $("body").prepend("<div class='ajax-loader' id='ajax-loader'><img src='<?php echo BASEPATH ?>img/ajax-loader.gif' class='img-responsive'/></div>");
      $("#ajax-loader").show();
      $("body").addClass("disabledbutton");
      
    });
    
    $(document).ajaxStop(function() {
      $(".ajax-loader").hide();
      $("body").removeClass("disabledbutton");
    });

    function requiredMessage(id,message){

    var div = $('#'+id).closest('div');
    $("#danger_"+id).remove();
    div.append("<div class='danger danger_"+id+"' id='danger_"+id+"'><label for='"+id+"' id='label_"+id+"'>"+message+"</label></div>");

    $('html, body').animate({
        'scrollTop' : $("#"+id).position().top
    });
    $('#label_'+id).trigger('click');

    }
    
    function createSlug(title,target_id){
        var slug = title.toLowerCase().replace(/[^a-zA-Z0-9]+/g,'-');
        $('#'+target_id).val(slug);
    }
    
</script>