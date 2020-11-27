@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table>
                        <tr>
                            <td><b>{{ __('Тип приза') }}</b></td>
                            <td><b>{{ __('Количество') }}</b></td>
                            <td><b>{{ __('Статус') }}</b></td>
                            <td><b>{{ __('Действия') }}</b></td>
                        </tr>
                        @foreach($prizes as $prize)
                            <tr>
                                <td>{{$prize->prizeItem->kind}}</td>
                                <td>{{$prize->count}}</td>
                                <td>{{$prize->prize()->getStatus()}}</td>
                                <td>{!! $prize->prize()->getActions() !!}</td>
                            </tr>
                        @endforeach
                    </table>

                    <form action="{{route('get_prize')}}" method="get">
                        <button type="submit" class="btn btn-primary">
                            {{__('Забрать приз')}}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
