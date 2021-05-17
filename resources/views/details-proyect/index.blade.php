@extends('layouts.app')

@section('template_title')
    Details Proyect
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Details Proyect') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('details-proyects.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Proyect Id</th>
										<th>Technologie Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detailsProyects as $detailsProyect)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $detailsProyect->proyect_id }}</td>
											<td>{{ $detailsProyect->technologie_id }}</td>

                                            <td>
                                                <form action="{{ route('details-proyects.destroy',$detailsProyect->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('details-proyects.show',$detailsProyect->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('details-proyects.edit',$detailsProyect->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $detailsProyects->links() !!}
            </div>
        </div>
    </div>
@endsection
