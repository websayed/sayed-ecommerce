@extends('admin.admin_master')
@section('admin_content')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <p class="alert-success">
                    <?php

                    $message = Session::get('message');
                    if($message)
                    {
                        echo $message;
                        Session::put('message',null);
                    }
                    ?>
                </p>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th style="width: 10%;">ID</th>
                        <th style="width: 60%;">Colors Name</th>
                        <th style="width: 10%;">Status</th>
                        <th style="width: 20%;">Actions</th>
                    </tr>
                    </thead>
                    @foreach($colors as $color)
                        <tbody>
                        <tr>
                            <td>{{$color->id}}</td>
                            <td>
                                @foreach(Json_decode($color->color) as $colors)
                                    <ul class="span3">
                                        {{$colors}}
                                    </ul>
                                @endforeach
                            </td>
                            <td class="center">
                                @if($color->status==1)
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-danger">Deactive</span>
                                @endif
                            </td>
                            <td class="row">
                                <div class="span3"></div>
                                <div class="span2">
                                    @if($color->status==1)
                                        <a href="{{url('/color-status'.$color->id)}}" class="btn btn-success" >
                                            <i class="halflings-icon white thumbs-down"></i>
                                        </a>
                                    @else
                                        <a href="{{url('/color-status'.$color->id)}}" class="btn btn-danger" >
                                            <i class="halflings-icon white thumbs-up"></i>
                                        </a>
                                    @endif
                                </div>
                                <div class="span2">
                                    <a class="btn btn-info" href="{{url('/colors/'.$color->id.'/edit')}}">
                                        <i class="halflings-icon white edit"></i>
                                    </a></div>
                                <div class="span2">
                                    <form action="{{url('/colors/'.$color->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="halflings-icon white trash"></i></button>
                                    </form>

                                </div>
                                <div class="span3"></div>
                            </td>
                        </tr>


                        </tbody>
                    @endforeach
                </table>
            </div>
        </div><!--/span-->

    </div><!--/row-->

@endsection
