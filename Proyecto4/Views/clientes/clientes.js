//aqui va a estar el codigo de usuarios.model.js

function init(){
    $("#frm_clientes").on("submit", function(e){
        guardaryeditar(e);
    });
}


$().ready(()=>{
    todos();
});

var todos = () =>{
    var html = "";
    $.get("../../Controllers/clientes.controller.php?op=todos", (res) => {
      res = JSON.parse(res);
      $.each(res, (index, valor) => {
       
        html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.nombre}</td>
                <td>${valor.direccion}</td>
                <td>${valor.telefono}</td>
                <td>${valor.correo}</td>
            <td>
            <button class='btn btn-success' onclick='editar(${
              valor.id_cliente
            })'>Editar</button>
            <button class='btn btn-danger' onclick='eliminar(${
              valor.id_cliente
            })'>Eliminar</button>
            <button class='btn btn-info' onclick='ver(${
              valor.id_cliente
            })'>Ver</button>
            </td></tr>
                `;
      });
      $("#tabla_clientes").html(html);
    });
  };

  var guardaryeditar=(e)=>{
    e.preventDefault();
    var dato = new FormData($("#frm_clientes")[0]);
    var ruta = '';
    var id_cliente = document.getElementById("id_cliente").value
    if(id_cliente > 0){
     ruta = "../../Controllers/clientes.controller.php?op=actualizar"
    }else{
        ruta = "../../Controllers/clientes.controller.php?op=insertar"
    }
    $.ajax({
        url: ruta,
        type: "POST",
        data: dato,
        contentType: false,
        processData: false,
        success: function (res) {
          res = JSON.parse(res);
          if (res == "ok") {
            Swal.fire("cliente", "Registrado con éxito" , "success");
            todos();
            limpia_Cajas();
          } else {
            Swal.fire("usuarios", "Error al guardo, intente mas rtarde", "error");
          }
        },
      });
  }

  var editar = (id_cliente)=>{
  
    $.post(
      "../../Controllers/clientes.controller.php?op=uno",
      { id_cliente: id_cliente },
      (res) => {
        res = JSON.parse(res);
        $("#id_cliente").val(res.id_cliente);
        $("#nombre").val(res.nombre);
        $("#direccion").val(res.direccion);
        $("#telefono").val(res.telefono);
        $("#correo").val(res.correo);
        
    
      }
    );
    $("#Modal_clientes").modal("show");
  }
  
  var telefono_repetido = () => {
    var telefono = $("#telefono").val();
    var usuarios = new Usuarios_Model(
      "",
      "",
      "",
      telefono,
      "",
      "telefono_repetido"
    );
    usuarios.telefono_repetido();
  };
  var correo_repetido = () => {
    var correo = $("#correo").val();
    var usuarios = new Usuarios_Model(
      "",
      "",
      "",
      "",
      correo,
      "correo_repetido"
    );
    usuarios.correo_repetido();
  };

  var eliminar = (id_cliente)=>{
    Swal.fire({
        title: "clientes",
        text: "Esta seguro de eliminar el cliente",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Eliminar",
      }).then((result) => {
        if (result.isConfirmed) {
          $.post(
            "../../Controllers/clientes.controller.php?op=eliminar",
            { id_cliente: id_cliente },
            (res) => {
              res = JSON.parse(res);
              if (res === "ok") {
                Swal.fire("cliente", "cliente Eliminado", "success");
                todos();
              } else {
                Swal.fire("Error", res, "error");
              }
            }
          );
        }
      });
  
      limpia_Cajas();
}

  var limpia_Cajas = ()=>{
    document.getElementById("id_cliente").value = "";
    document.getElementById("nombre").value = "";
    document.getElementById("direccion").value = "";
    document.getElementById("telefono").value = "";
    document.getElementById("correo").value = "";
    $("#Modal_clientes").modal("hide");
  
  }
  init();