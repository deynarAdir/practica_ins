@extends('layouts.app2')
@section('content')
<div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Tables <small>Some examples to get you started</small></h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Basic Tables <small>basic table subtitle</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Acciones</th>
                  <th>Estado</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($categorias as $c)
                <tr>
                  <th>{{ $c->id }}</th>
                  <td>{{ $c->nombre }}</td>
                  <td>
                  	<button type="button" class="btn btn-warning btn-xs edit-modal modal-ml"
	                    data-id="{{ $c->id }}"
	                    data-nombre="{{ $c->nombre}}">
	                    Editar
	                </button>
	                <button type="button" class="btn {{ $c->estado?'btn-danger':'btn-success' }} btn-xs delete-modal modal-ml"
	                    data-id="{{ $c->id }}"
	                    data-estado="{{ $c->estado }}">
	                    {{ $c->estado? 'Desactivar':'Activar' }}
	                </button>
                  </td>
                  <td>
                  	@if($c->estado == 1)
                      <div class="text-white">
                        <span class="badge bg-success">activo</span>
                      </div>
                    @else
                      <div class="text-white">
                        <span class="badge bg-danger">inactivo</span>
                      </div>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
