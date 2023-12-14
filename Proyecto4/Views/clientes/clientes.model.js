class Usuarios_Model {
    constructor(
      id_cliente,
      nombre,
      direccion,
      telefono,
      correo,
      Ruta
    ) {
      this.id_cliente = id_cliente;
      this.nombre = nombre;
      this.direccion = direccion;
      this.telefono = telefono;
      this.correo = correo;
      this.Ruta = Ruta;
    }

    telefono_repetido() {
        var telefono = this.telefono;
        $.post(
          "../../Controllers/clientes.controller.php?op=telefono_repetido",
          { telefono: telefono },
          (res) => {
            res = JSON.parse(res);
            if (parseInt(res.telefono_repetido) > 0) {
              $("#TelefonoRepetido").removeClass("d-none");
              $("#TelefonoRepetido").html(
                "el telefono ingresa, ya exite en la base de datos"
              );
              $("button").prop("disabled", true);
            } else {
              $("#TelefonoRepetido").addClass("d-none");
              $("button").prop("disabled", false);
            }
          }
        );
      }
    
      correo_repetido() {
        var correo = this.correo;
        $.post(
          "../../Controllers/clientes.controller.php?op=correo_repetido",
          { correo: correo },
          (res) => {
            res = JSON.parse(res);
            if (parseInt(res.correo_repetido) > 0) {
              $("#CorreoRepetido").removeClass("d-none");
              $("#CorreoRepetido").html(
                "El correo ingresado, ya exite en la base de datos"
              );
              $("button").prop("disabled", true);
            } else {
              $("#CorreoRepetido").addClass("d-none");
              $("button").prop("disabled", false);
            }
          }
        );
      }
} 