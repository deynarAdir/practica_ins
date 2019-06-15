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
      <div class="col-md-6 col-sm-6 col-xs-12">
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
          @if(session('success'))
            <div class="col-lg-12">
                <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <a class="alert-link" href="#">Mensaje: </a> {{ session('success') }}
                </div>
            </div>
          @endif
          <div class="x_content">
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Categoria</th>
                  <th>Acciones</th>
                  <th>Estado</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($articulos as $a)
                <tr>
                  <th>{{ $a->id }}</th>
                  <td>{{ $a->nombre }}</td>
                  <td>{{ $a->categoria->nombre }}</td>
                  <td>
                  	<button type="button" class="btn btn-warning btn-xs edit-modal modal-ml"
	                    data-id="{{ $a->id }}"
	                    data-nombre="{{ $a->nombre}}"
                      data-categoria_id="{{ $a->categoria->id }}">
	                    Editar
	                </button>
	                <button type="button" class="btn {{ $a->estado?'btn-danger':'btn-success' }} btn-xs delete-modal modal-ml"
	                    data-id="{{ $a->id }}"
	                    data-estado="{{ $a->estado }}">
	                    {{ $a->estado? 'Desactivar':'Activar' }}
	                </button>
                  </td>
                  <td>
                  	@if($a->estado == 1)
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
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
              <h5>Agregar Comando</h5>
          </div>
          <div class="x_content ">
              {!! Form::open(['route' => 'articulos.store', 'method' => 'POST']) !!}
                <div class="form-group {{ $errors->has('nombre')? 'has-error':'' }}">
                  {!! Form::label('nombre','Nombre de Articulo') !!}
                  {!! Form::text('nombre',null,[
                    'class' => 'form-control',
                    'placeholder' => 'Introduzca nombre de la categoria',
                    'value' => "{{ old('nombre') }}"
                    ]) !!}
                  @if($errors->has('nombre'))
                    <span class="help-block text-danger text-center">
                      <strong>{{ $errors->first('nombre') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('categoria_id')? 'has-error':'' }}">
                  {!! Form::label('categoria','Escoja una categoria') !!}
                  {!! Form::select('categoria_id',$categorias,null,[
                    'class' => 'form-control'
                    ]) !!}
                </div>
                <div class="text-center">
                  {!! Form::reset('Limpiar',['class' => 'btn btn-white']) !!}
                  {!! Form::submit('Agregar',['class' => 'btn btn-primary']) !!}
                </div>
          {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

{{-- Modal edit --}}
<div class="modal inmodal" id="modal-edit" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Editar Articulo</h4>
            </div>
            {!! Form::open(['method' => 'put','id' => 'form-editar']) !!}
              <div class="modal-body">
                <div class="form-group">
                  {!! Form::label('nombre','Nombre de Categoria') !!}
                  {!! Form::text('nombre',null,[
                    'id' => 'nombre-2',
                    'class' => 'form-control',
                    'required'
                    ])!!}
                </div>
                <div class="form-group {{ $errors->has('categoria_id')? 'has-error':'' }}">
                  {!! Form::label('categoria','Escoja una categoria') !!}
                  {!! Form::select('categoria_id',[''=>''],null,[
                    'class' => 'form-control',
                    'id' => 'categoria_id-2'
                    ]) !!}
                </div>
                <div class="modal-footer">
                  {!! Form::button('Cancelar',[
                    'class' => 'btn btn-white',
                    'data-dismiss' => 'modal'
                    ])!!}
                  {!! Form::submit('Editar',[
                    'class' => 'btn btn-primary'
                    ]) !!}
                </div>
            </div>
            {!! Form::close() !!}
            {{-- <form method="POST" action=""  role="form" id="form-update">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="_descript">Descripcion:</label> 
                        <input type="text" placeholder="descripcion" class="form-control entrada" id="_descript" name="chat_description" required>
                    </div>
                    <div class="form-group">
                        <label for="_verify">Token de verificacion de facebook:</label> 
                        <input type="text" placeholder="Introduzca token de verificacion" class="form-control entrada" id="_verify" name="facebook_veryfi_token" required>
                    </div>
                    <div class="form-group">
                        <label for="_acces">Token de acceso a facebook:</label> 
                        <input type="text" placeholder="Introduzca token de acceso" class="form-control entrada" id="_acces" name="facebook_access_token" required>
                    </div>
                    <div class="form-group">
                        <label for="_saludo">Saludo:</label> 
                        <input type="text" placeholder="Introduzca saludo" class="form-control entrada" id="_saludo" name="cha_greetings" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary edit">Aceptar</button>
                </div>
            </form> --}}
        </div>
    </div>
</div>

{{-- Modal Delete --}}

<div class="modal" id="modal-delete" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-body text-center">
                <h3 id="titulo-modal"></h3>
            </div>

            {!! Form::open(['method' => 'put','id' => 'form-eliminar']) !!}
              <div class="modal-footer">
                  {!! Form::button('Cancelar',[
                    'class' => 'btn btn-white',
                    'data-dismiss' => 'modal'
                    ])!!}
                  {!! Form::submit(null,[
                    'id' => 'boton-desactivar'
                    ]) !!}
              </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@section('scripts')

<script>
  $('.edit-modal').click(function() {
    let action = "{{ url('articulos') }}/" + $(this).data('id');
    let resultado;
    let categoria_id = $(this).data('categoria_id');
    let uno = {!! $cate !!};
    for(let i=0;i<uno.length; i++){
      console.log(uno[i].id);
      console.log(categoria_id)
      if(uno[i].id == categoria_id){
        resultado += `<option value="${uno[i].id}" selected>${uno[i].nombre}</option>`;
      }else{
        resultado += `<option value="${uno[i].id}">${uno[i].nombre}</option>`;
      }
    }
    $('#categoria_id-2').html(resultado);
    $('#nombre-2').val($(this).data('nombre'));
    $("#form-editar").attr("action", action);
    $('#modal-edit').modal('show');
  });

  $('.delete-modal').click(function() {
    var estado = $(this).data('estado');
    let action;
    if(estado){
      action = "{{ url('articulo/desactivar') }}/" + $(this).data('id');
      $('#titulo-modal').text('¿Esta seguro de desactivar este articulo?');
      $('#boton-desactivar').val('Desactivar');
      $('#boton-desactivar').attr('class','btn btn-danger');
    }else{
      action = "{{ url('articulo/activar') }}/" + $(this).data('id');
      $('#titulo-modal').text('¿Esta seguro de activar este Articulo?');
      $('#boton-desactivar').val('Activar');
      $('#boton-desactivar').attr('class','btn btn-success');
    }
    $("#form-eliminar").attr("action", action);
    $('#modal-delete').modal('show');
    
  });
</script>

@endsection
