var app = angular.module('modTableros', []);
app.controller('tablerosCtrl', ['$http', principal]);

function principal($http) {
    var vm = this;
    vm.datos = {};

    vm.listarTableros = function () {
        $http.get("http://localhost/trello/tablero/getBoards")
                .success(
                        function (respuesta) {
                            vm.tableros = respuesta;
                        }
                );
    }

    vm.frmCrearTablero = function () {
        $("#modalAddBoard").modal("show");
    }

    vm.crearTablero = function () {
        $http.post("http://localhost/trello/tablero/postBoard", vm.datos)
                .then(
                        function (respuesta) {
                            $("#modalAddBoard").modal("hide");
                            vm.datos.nombreTablero = '';
                            vm.listarTableros();
                        }
                );
    }

    vm.leerDatosTablero = function (idTablero) {
        vm.tituloModal = 'Editar tablero';
        $http.post("http://localhost/trello/tablero/getIdBoard", {idTablero: idTablero})
                .success(
                        function (respuesta) {
                            vm.nombreTablero = respuesta[0]["nombreTablero"];
                            vm.idTablero = idTablero;
                            $("#modalEditBoard").modal("show");
                        }
                );
    }

    vm.editarTablero = function () {
        $http.put("http://localhost/trello/tablero/putBoard", {idTablero: vm.idTablero, nombreTablero: vm.nombreTablero})
                .then(
                        function (respuesta) {
                            $("#modalEditBoard").modal("hide");
                            vm.listarTableros();
                        }
                );
    }

    vm.eliminarTablero = function (idTablero) {

        if (idTablero !== null) {
            vm.idTablero = idTablero;
            $("#modalDeleteBoard").modal("show");
        } else {
            $("#modalDeleteBoard").modal("hide");
            $http.post("http://localhost/trello/tablero/deleteBoard", {idTablero: vm.idTablero})
                    .success(
                            function (respuesta) {
                                $("#modalDeleteBoard").modal("hide");
                                vm.listarTableros();
                            }
                    ).error(
                    function (respuesta) {
                        console.log(respuesta);
                    }
            );
        }
    }

    vm.listarTableros();
}