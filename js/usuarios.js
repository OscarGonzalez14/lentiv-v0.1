function init(){
  listar_usuarios_lenti();
  ocultar_btn_editar_usuario();
}
$("#nuevo_usuario").draggable({
    handle: ".modal-header"
}); 

function mayus(e) {
  e.value = e.value.toUpperCase();
  }

//Funciones para ocultar botones editar_usuario
function ocultar_btn_editar_usuario(){
  document.getElementById("editar_usuario").style.display = "none";
}

function hidden_btn_guardar_usuario(){
  document.getElementById("guardar_usuario").style.display = "none";
}

function ver_btn_editar_usuario(){
  document.getElementById("editar_usuario").style.display = "block";
}

function ver_btn_guardar_usuario(){
  document.getElementById("guardar_usuario").style.display = "block";
}

//GENERANDO CODIGO PARA EMPLEADOS DE LENTI
function get_codigo_usuario(){
  $.ajax({
    url:"../ajax/usuarios.php?op=get_codigo_usuario",
    method:"POST",
    data:{},
    cache:false,
    dataType:"json",
      success:function(data){
      console.log(data);
      $("#codigo_user").val(data.correlativo);  
      }
    });
}

///LIMPIAR CAMPOS DE MODAL CREAR NUEVO USUARIO
$(document).on('click', '#nuevo_usuario_lenti', function(){
   let elements = document.getElementsByClassName("clear_input");

    for(i=0;i<elements.length;i++){
      let id_element = elements[i].id;
      document.getElementById(id_element).value="";
    }
});


function guardar_usuario(){
  let codigo = $("#codigo_user").val();
  let nombre = $("#nombre").val();
  let telefono = $("#telefono").val();
  let direccion = $("#direccion").val();
  let correo = $("#correo").val();
  let dui = $("#dui").val();
  let nit = $("#nit").val();
  let usuario = $("#usuario").val();
  let pass = $("#pass").val();
  let nick = $("#nick").val();
  let isss = $("#isss").val();
  let afp = $("#afp").val();
  let cuenta = $("#cuenta").val();
  let estado = $("#estado").val();
  let fecha_ingreso = $("#fecha").val();
  let depto = $("#depto").val();
  let id_user = $("#id_user").val();
  
  if(codigo !="" && fecha_ingreso !="" && nombre!="" && depto !="" && estado !=""){
    $.ajax({
      url:"../ajax/usuarios.php?op=guardar_usuario",
      method:"POST",
      data:{codigo:codigo,nombre:nombre,telefono:telefono,direccion:direccion,correo:correo,dui:dui,nit:nit,usuario:usuario,pass:pass,nick:nick,isss:isss,afp:afp,cuenta:cuenta,estado:estado,fecha_ingreso:fecha_ingreso,depto:depto,id_user:id_user},
      cache:false,
      dataType: "json",
      error:function(x,y,z){
        d_pacole.log(x);
        console.log(y);
        console.log(z);
      },
      success:function(data){
        console.log(data);
        if(data=='error'){
          Swal.fire('Usuario ya existe','','error')
          return false;
        }else if (data=='ok'){
          Swal.fire('El usuario ha sido creado','','success')
          $("#datatable_usuarios").DataTable().ajax.reload();
          setTimeout("explode();", 2000);
        }else{
          Swal.fire('Modificación ha sido un éxito','','success')
          $("#datatable_usuarios").DataTable().ajax.reload();
          setTimeout("explode();", 2000);
        }
      }
    });
  }
  Swal.fire('Debe llenar todos los campos','','error')
}


///LISTAR usuarios del sistema
  function listar_usuarios_lenti(){

    $("#datatable_usuarios").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      dom: 'Bfrtip',
      "buttons": [ "excel"],
      "searching": true,
      "iDisplayLength": 15,//Por cada 15 registros hace una paginación
      "ajax":
      {
        url: "../ajax/usuarios.php?op=listar_usuarios_lenti",
        type : "post",
        dataType : "json",        
        error: function(e){
          //console.log(e.responseText);  
        } 
      },
      "language": {
        "sSearch": "Buscar:"
      }
    }).buttons().container().appendTo('#dt_usuarios_wrapper .col-md-6:eq(0)');

  }


  ///CAMBIAR TITULO DE MODAL
  function editar_usuario(){

  ver_btn_editar_usuario();
  hidden_btn_guardar_usuario();

  titulo.textContent="EDITAR USUARIO";
  var element= document.getElementById("titulo");
    element.classList.add("bg-secondary");

    var elements= document.getElementById("editar_usuario");
    elements.classList.add("bg-success");
}

//VISUALIZAR DATOS DEL USUARIO A MODIFICAR
function ver_datos_usuarios(id_user,codigo){

  $('#titulo').html('EDITAR USUARIO');

  $.ajax({
    url:'../ajax/usuarios.php?op=ver_datos_usuario',
    method:"POST",
    data:{id_user:id_user,codigo:codigo},
    cache:false,
    dataType:"json",
    success:function(data){
      console.log(data)
        $("#id_user").val(data.id_usuario);
        $("#codigo_user").val(data.codigo_emp);
        $("#codigo_user").attr('disabled', 'disabled');
        $("#nombre").val(data.nombre);
        $("#telefono").val(data.telefono);
        $("#direccion").val(data.direccion);
        $("#correo").val(data.correo);
        $("#dui").val(data.dui);
        $("#nit").val(data.nit);
        $("#usuario").val(data.usuario);
        $("#pass").val(data.pass);
        $("#nick").val(data.nick);
        $("#isss").val(data.isss);
        $("#afp").val(data.afp);
        $("#cuenta").val(data.cuenta_bancaria);
        $("#estado").val(data.estado);
        $("#fecha").val(data.fecha_ingreso);
        $("#depto").val(data.departamento);

    }
  });
}

init();