@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading"></div>
            <div class="panel-body">
                <div class="table-responsive">

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <tr>
                            <th class="th_center">
                              ID
                            </th>
                            <th class="th_center">
                              ユーザーネーム
                            </th>

                            <th class="th_center">
                              権限
                            </th>

                            <th class="th_center"></th>
                        </tr>

                        @if( !$users->isEmpty() )
                            @foreach( $users as $user )
                            @if( $user->role == 1 )
                            @else
                                <tr>
                                    <td class="td_center">{{ $user->id }}</td>
                                    <td class="td_center">{{ $user->name }}</td>
                                    <td class="td_center">
                                      @if( $user->role > 1 && $user->role < 5)
                                      管理者
                                      @else
                                      ユーザー
                                      @endif
                                    </td>


                                    <td class="td_center">
                                      @if( $user->role > 4)
                                        <a class="deleteButton" href="{{action('UserController@deleteAccount')}}/{{ $user -> id}}" onclick="confirm('本当に削除してよろしいでしょうか？');" title="削除">
                                            <i class="fa fa-trash ">削除</i>

                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        @endif

                    </table>

                </div>

            </div>
        </div>
    </div>
</div>
<!-- /. ROW  -->

@endsection
