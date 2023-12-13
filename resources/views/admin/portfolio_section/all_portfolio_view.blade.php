@extends('admin.admin_master')
@section('m-content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Manage All PortfoliosS</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Portfolio Name</th>
                                <th>Portfolio Title</th>
                                <th>Portfolio Image</th>
                                <th>Actions</th>
                            </tr>
                            </thead>


                            <tbody>
                        {{-- @php($serialNo = 1) --}}
                        @foreach ($all_portfolios as $key => $portfolio)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$portfolio->p_name}}</td>
                                <td>{{$portfolio->p_title}}</td>
                                <td> <img src="{{ url($portfolio->p_image) }}" alt="portfolio_image" style="width: 50px; height:50px"> </td>
                                <td>
                                    <a href="{{route('edit.portfolio', $portfolio->id)}}" class="btn btn-primary waves-effect waves-light" title="Edit Portfolio"><i class="fas fa-edit"></i></a>
                                    <a href="{{route('delete.portfolio', $portfolio->id)}}" class="btn btn-danger waves-effect waves-light" id="delete" title="Delete Portfolio"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach  
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
</div>

@endsection