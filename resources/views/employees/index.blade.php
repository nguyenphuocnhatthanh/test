@extends('layout')

@section('content')
    <div>

    </div>
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>{!! sort_employees_by('last_name', 'Last Name') !!}</th>
            <th>{!! sort_employees_by('first_name', 'First Name') !!}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
            @if($employee != null)
                <tr>
                    <td>{{$employee->first_name}}</td>
                    <td>{{$employee->last_name}}</td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>


  {{--  {!! $employees->appends(['sort' => Request::get('sort'), 'order' => Request::get('order')])->render() !!}--}}
@stop
@section('footer')
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#example').dataTable( {
            paging: true,
            scrollY: 400,
            columnDefs: [ {
                targets: [ 0],
                orderData: [ 0, 1 ]
            } ]
        } );
    } );
</script>
@endsection