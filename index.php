<html>
<head>
    <title>İl ilçe PDO</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-12"><h1>PHP PDO ve MySQL ile İl, İlçe, Mahalle, Posta Kodu Seçme</h1><hr></div>

        <div class="col-md-3">
            <label for="konum_il">İl</label>
            <select name="konum_il" id="konum_il" class="form-control">
                <option value="">Seçin...</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="konum_ilce">İlçe</label>
            <select name="konum_ilce" id="konum_ilce" class="form-control" disabled="disabled">
                <option value="">Seçin...</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="konum_mahalle">Mahalle</label>
            <select name="konum_mahalle" id="konum_mahalle" class="form-control" disabled="disabled">
                <option value="">Seçin...</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="konum_postakodu">Posta Kodu</label>
            <select name="konum_postakodu" id="konum_postakodu" class="form-control" disabled="disabled">
                <option value="">Seçin...</option>
            </select>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){
        ajaxFunc("konum_il", "", "#konum_il");

        $("#konum_il").on("change", function(){

            $("#konum_ilce").attr("disabled", false).html("<option value=''>Seçin..</option>");
            console.log($(this).val());
            ajaxFunc("konum_ilce", $(this).val(), "#konum_ilce");

        });

        $("#konum_ilce").on("change", function(){

            $("#konum_mahalle").attr("disabled", false).html("<option value=''>Seçin..</option>");
            console.log($(this).val());
            ajaxFunc("konum_mahalle", $(this).val(), "#konum_mahalle");

        });

        $("#konum_mahalle").on("change", function(){

            $("#konum_postakodu").attr("disabled", false).html("<option value=''>Seçin..</option>");
            console.log($(this).val());
            ajaxFunc("konum_postakodu", $(this).val(), "#konum_postakodu");

        });

        function ajaxFunc(action, name, id ){
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {action:action, name:name},
                success: function(sonuc){
                    $.each($.parseJSON(sonuc), function(index, value){
                        var row="";
                        row +='<option value="'+value+'">'+value+'</option>';
                        $(id).append(row);
                    });
                }});
        }
    });
</script>
</body>
</html>
