$(document).ready(function(){
    // incializamos el modal de respuesta
    if($("#modal-success") != null){
        $("#modal-success").dialog({
          autoOpen: true,
        show: {
              effect: "bounce",
              duration: 500
            },
        hide: {
              effect: "clip",
              duration: 500
            },
         position: { 
                    my: "center", 
                    at: "center", 
                    of: window 
            },
        width: screen.width * 0.35,
        resizable:false
    });
    }

    // pre view fotos
     $("#imagen_revista").change(function(e) {
      for (var i = 0; i < e.originalEvent.target.files.length; i++) {
          var file = e.originalEvent.target.files[i];
          
          var img = document.createElement("img");
          console.log(img);
          var reader = new FileReader();
          reader.onloadend = function() {
               img.src = reader.result;
          }
          reader.readAsDataURL(file);
          $(img).addClass('imgCatalogo');
          $("#previewImg").replaceWith(img);
      }
  });
});
function cancelChanges(id_catalogo){
        if(confirm("Esta seguro que quiere deshacer todos los cambos ?")){
            var eliminadas = $("#form-activa-"+id_catalogo+ " input[name='eliminadas']").val();
            var activadas = $("#form-activa-"+id_catalogo+ " input[name='activadas']").val();
            var desactivadas = $("#form-activa-"+id_catalogo+ " input[name='desactivadas']").val();

            // hacemos un replace de las comillas asi las mando para la bd para aqui sin comillas
            activadas = activadas.replace(/'/g, "");
            desactivadas = desactivadas.replace(/'/g, "");
            eliminadas = eliminadas.replace(/'/g, "");


            //separo los valores id_revista
            activadas = activadas.split(",");
            desactivadas = desactivadas.split(",");
            var arrBack = eliminadas.split(",");

            // obtengo los id guardados en el hidden de eliminadas y revierto cambios
            for(var cont =0 ;cont < arrBack.length; cont++){
                if(arrBack[cont] != ""){
                    $("#rdel-"+arrBack[cont]).attr("disabled",false); 
                    $("#rch-"+arrBack[cont]).attr("disabled",false);
                    $("#rview-"+arrBack[cont]).attr("disabled",false);
                    $("#rdel-"+arrBack[cont]).parent("div").css({
                        'opacity': '1',
                        'background-color': '#FFF',
                        'border-radius':'0px'
                    });   
                }
                
            }
            // ahora revierto el botton toggle si se guardaron como activadas regresamso a desactivar y viceversa

            for(var i =0 ;i < activadas.length; i++){
                if(activadas[i] != ""){
                 $("#rch-"+activadas[i]).prop("checked",false);   
                }
                
            }

            for(var i =0 ;i < desactivadas.length; i++){
                if(desactivadas[i] != ""){
                  $("#rch-"+desactivadas[i]).prop("checked",true);  
                }
                
            }
                

            $("#form-activa-"+id_catalogo+ " input[name='eliminadas']").val("");
            $("#form-activa-"+id_catalogo+ " input[name='activadas']").val("");
            $("#form-activa-"+id_catalogo+ " input[name='desactivadas']").val("");
        }
}

function pastDeleted(id_catalogo,id_revista, quien){
        //primero pregunto
        if(confirm("Estas seguro de querer eliminar esta revista?")){
            //obtengo el valor anterior
            var idsRevistas = $("#form-activa-"+id_catalogo+ " input[name='eliminadas']").val();
            //guardo el nuevo valor
            idsRevistas += id_revista + ",";
            //aplico estilso y deshabilito funciones que indica que sera eliminado
            $("#form-activa-"+id_catalogo+ " input[name='eliminadas']").val(idsRevistas);
            $(quien).parent("div").css({
                'opacity': '0.45',
                'background-color': '#F4EBEB',
                'border-radius':'5px'
            });
            $(quien).attr("disabled",true); 
            $("#rch-"+id_revista).attr("disabled",true);
            $("#rview-"+id_revista).attr("disabled",true);
        }       
}

function pastActivated(id_catalogo,id_revista,quien){
        // al dar click en lso toggle button revisa si estan activos o inactivos y lso agregara al hidden correspondiente
        if($(quien).is(":checked")){
            //obtengo valor anterior
            var idsRevistas = $("#form-activa-"+id_catalogo+ " input[name='activadas']").val();
            //concatetno el nuevo
            idsRevistas += id_revista + ",";
            //agrego
            $("#form-activa-"+id_catalogo+ " input[name='activadas']").val(idsRevistas);
            idsRevistas = "";
        }else{
            var idsRevistas = $("#form-activa-"+id_catalogo+ " input[name='desactivadas']").val();
            idsRevistas += id_revista + ",";
            $("#form-activa-"+id_catalogo+ " input[name='desactivadas']").val(idsRevistas);
            idsRevistas = "";
        }
}

function showEdition(who){
    $("#cat-"+who).slideToggle(400);
}

function openModal(cual,porcentaje){
    var tamano = porcentaje / 100;
    $( "#modal-"+cual).dialog({
    autoOpen: false,
        show: {
              effect: "clip",
              duration: 500
            },
        hide: {
              effect: "drop",
              duration: 500
            },
         position: { 
              my: "center", 
              at: "center", 
              of: window 
        },
    width: screen.width * tamano,
    resizable:false
    });

        $("#modal-"+cual).dialog("open");    
}

function validaFormulario(){
        var nombre = $("#nombre").val();
        var correo = $("#correo").val();
        var contrasena = $("#contrasena").val();
        var nContrasena = $("#recontrasena").val();
        if(nombre == "" || correo == ""  || contrasena  == "" || recontrasena == "" ){
            alert("Asegurese de llenar todos los campos");
            return false;
        }
        if(contrasena != nContrasena){
            alert("Las contraseñas no coincided");
            return false;
        }
        return true;
}