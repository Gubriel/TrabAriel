@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Lista de Reservas
                        <a href="{{ url('reserva/create') }}" class="btn btn-success btn-sm float-end">
                            Nova Reserva
                        </a>
                    </div>
                    <div class="card-body">
                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">
                                {{ Session::get('mensagem_sucesso') }}
                            </div>
                        @endif
                        <table class="table table-sm table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Equipamento</th>
                                    <th>Local</th>
                                    <th>Cliente</th>
                                    <th>Data</th>
                                    <th>Horario</th>
                                    <th>Data de Devolução</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($reservas as $reserva)
                                    <tr>
                                        <td>{{ $reserva->id }}</td>
                                        <td>{{ $reserva->equipamento->nome }}</td>
                                        <td>{{ $reserva->local->nome }}</td>
                                        <td>{{ $reserva->cliente->nome }}</td>
                                        <td>{{ $reserva->data }}</td>
                                        <td>{{ $reserva->horario }}</td>
                                        <td>{{ $reserva->devolucao }}</td>
                                        <td>
                                            <a href="{{ url('reserva/' . $reserva->id) }}" class="btn btn-primary btn-sm">
                                                Editar
                                            </a>
                                            {!! Form::open(['method' => 'DELETE', 'url' => 'reserva/' . $reserva->id, 'style' => 'display:inline']) !!}
                                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">
                                            Não há itens para listar!
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="pagination justify-content-center">
                            {{ $reservas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
