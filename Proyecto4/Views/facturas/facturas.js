//aqui va a estar el codigo de usuarios.model.js

function init() {
  $("#frm_facturas").on("submit", function (e) {
    guardaryeditar(e);
  });
}

$().ready(() => {
  todos();
});

var todos = () => {
  var html = "";
  $.get("../../Controllers/facturas.controller.php?op=todos", (res) => {
    console.log(res);
    res = JSON.parse(res);
    $.each(res, (index, valor) => {
      html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.cliente}</td>
                <td>${valor.fecha}</td>
                <td>${valor.total}</td>
                <td>${valor.estado}</td>
            <td>
            <button class='btn btn-success' onclick='editar(${
              valor.id_factura
            })'>Editar</button>
            <button class='btn btn-danger' onclick='eliminar(${
              valor.id_factura
            })'>Eliminar</button>
            <button class='btn btn-info' onclick='ver(${
              valor.id_factura
            })'>Ver</button>
            </td></tr>
                `;
    });
    $("#tabla_clientes").html(html);
  });
};

var guardaryeditar = (e) => {
  e.preventDefault();
  var dato = new FormData($("#frm_facturas")[0]);
  var ruta = "";
  var id_factura = document.getElementById("id_factura").value;
  if (id_factura > 0) {
    ruta = "../../Controllers/facturas.controller.php?op=actualizar";
  } else {
    ruta = "../../Controllers/facturas.controller.php?op=insertar";
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
        Swal.fire("facturas", "Registrado con éxito", "success");
        todos();
        limpia_Cajas();
      } else {
        Swal.fire("facturas", "Error al guardo, intente mas tarde", "error");
      }
    },
  });
};

var cargaclientes = () => {
  return new Promise((resolve, reject) => {
    $.post("../../Controllers/clientes.controller.php?op=todos")
      .then((res) => {
        res = JSON.parse(res);
        var html = "";
        $.each(res, (index, val) => {
          html += `<option value="${val.id_cliente}"> ${val.nombre}</option>`;
        });
        $("#id_cliente").html(html);
        resolve();
      })
      .catch((error) => {
        reject(error);
      });
  });
};


var editar = async (id_factura) => {
  await cargaclientes();
  $.post(
    "../../Controllers/facturas.controller.php?op=uno",
    { id_factura: id_factura },
    (res) => {
      console.log(res);
      res = JSON.parse(res);
      $("#id_factura").val(res.id_factura);
      $("#id_cliente").val(res.id_cliente);
      document.getElementById("total").value = res.total;
      document.getElementById("estado").value = res.estado;
      //document.getElementById("PaisId").value = res.clientesId;
      $("#nombre").val(res.nombre);
    }
  );
  $("#modal_factura").modal("show");
}


var eliminar = (id_factura) => {
  Swal.fire({
    title: "clientes",
    text: "Esta seguro de eliminar la factura",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(
        "../../Controllers/facturas.controller.php?op=eliminar",
        { id_factura: id_factura },
        (res) => {
          res = JSON.parse(res);
          if (res === "ok") {
            Swal.fire("facturas", "cliente Eliminado", "success");
            todos();
          } else {
            Swal.fire("Error", res, "error");
          }
        }
      );
    }
  });

  limpia_Cajas();
};

var limpia_Cajas = () => {
  document.getElementById("id_factura").value = "";
  document.getElementById("id_cliente").value = "";
  document.getElementById("total").value = "";
  document.getElementById("estado").value = "";
  $("#modal_factura").modal("hide");
};
init();
