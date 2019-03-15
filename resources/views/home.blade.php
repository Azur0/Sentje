@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Contacts</div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tbody>
                            @foreach ($friends as $friend)
                                <tr>
                                    <td>
                                        <span style="vertical-align: middle;">{{ $friend->user_id1 . ' ' . $friend->user1->name }}</span><span class="float-right"><a href=""><i class="fas fa-plus-square" style="font-size: 30px; vertical-align: middle;"></i></a></span>
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
