<?php

class Paginas extends Controlador{

    public function __construct() {
        
        //desde aqui cargaremos los modelos
        $this->usuarioModelo = $this->cargaModelo("Usuario");
    }

    public function index(){

     $usuarios = $this->usuarioModelo->Mostrar();
      $datos = [
        'usuarios' => $usuarios

      ];
        $this->cargaVista('inicio',$datos);
    }

    public function articulo(){

      $this->cargaVista('articulo');

    }

    public function agregar(){

      if($_SERVER["REQUEST_METHOD"] == 'POST'){

        $datos = [

          'nombre' => trim($_POST["nombre"]),
          'email' => trim($_POST["email"]),
          'telefono' => trim($_POST["tlf"])
        ];

        if($this->usuarioModelo->agregarUsuario($datos)){

          redireccionar('/paginas');
        }else{

          die("hubo un error");

      }
    }else{

        $datos = [

          'nombre' => '',
          'email' => '',
          'telefono' => ''
        ];

        $this->cargaVista('agregar',$datos);
      }
    }

    public function editar($id){

     if($_SERVER["REQUEST_METHOD"] == 'POST'){

        $datos = [

          'id_usuario' =>$id,
          'nombre' => trim($_POST["nombre"]),
          'email' => trim($_POST["email"]),
          'telefono' => trim($_POST["tlf"])
        ];

        if($this->usuarioModelo->editarUsuario($datos)){

          redireccionar('/paginas');
        }else{

          die("hubo un error");

      }
    }else{

        $usuario = $this->usuarioModelo->obtenerUsuario($id);

        $datos = [

          'id_usuario' =>$usuario->id_usuario,
          'nombre' => $usuario->nombre,
          'email' => $usuario->email,
          'tlf' => $usuario->tlf
        ];

        $this->cargaVista('editar',$datos);
      }
    } 

    public function eliminar($id){

      if(isset($_POST["elimina"])){

          if(isset($id)){

            $datos = [

            'id_socio' => $id

            ];

          if($this->usuarioModelo->Eliminar($id)){

            $this->CargaVista('Eliminar',$datos);

            }

          }else{

            http_response_code(404);
            die("404 NOT FOUND");
        }

          redireccionar('/paginas');
      }

          $this->CargaVista('Eliminar');

      }

    }

