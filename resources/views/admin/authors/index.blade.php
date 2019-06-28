@extends('layouts.backend.app')
@section('title','Authors')
@push('css')
	<link href="{{asset('assets/brackend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@endpush
@section('content')
	<div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>
                                    All Authors <span class="badge bg-cyan">{{ $authors->count() }}</span>
                                </h2>
                            </div>
                            <div class="col-sm-6">
                                {{--<a href="{{route('admin.category.create')}}" class="btn btn-info btn-sm weves-effect pull-right">
                                    <i class="material-icons">add</i>
                                    <span>Add New Author</span>
                                </a>--}}
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Posts</th>
                                        <th>Fovorite Posts</th>
                                        <th>Comments</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Posts</th>
                                        <th>Fovorite Posts</th>
                                        <th>Comments</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($authors as $key=>$author)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $author->name }}</td>
                                        <td><span class="badge bg-primary">{{$author->posts_count }}</span></td>
                                        <td><span class="badge bg-pink">{{$author->favorite_posts_count }}</span></td>
                                        <td><span class="badge bg-info">{{$author->comments_count }}</span></td>
                                        <td>{{ $author->created_at->diffForHumans() }}</td>
                                        <td>
                                            {{--<a href="{{route('admin.category.edit',$category->id)}}" class="btn btn-primary btn-sm weves-effect">
                                                <i class="material-icons">edit</i>
                                            </a>--}}
                                            <button type="button" class="btn btn-danger btn-sm weves-effect" onclick="deleteAuthor({{ $author->id }})">
                                                <i class="material-icons">delete</i>
                                            </button>
                                            <form id="delete-form-{{ $author->id }}" action="{{route('admin.author.destroy',$author->id)}}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
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
        <!-- #END# Exportable Table -->
    </div>
@endsection
@push('js')
	<script src="{{asset('assets/brackend/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/brackend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('assets/brackend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/brackend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{asset('assets/brackend/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{asset('assets/brackend/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/brackend/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/brackend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/brackend/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/brackend/js/pages/tables/jquery-datatable.js')}}"></script>
    <script src="{{asset('sweetalert/sweetalert2.all.min.js')}}"></script>

    <script type="text/javascript">
        function deleteAuthor(id){
            const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
              },
              buttonsStyling: false,
            })

            swalWithBootstrapButtons.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Yes, delete it!',
              cancelButtonText: 'No, cancel!',
              reverseButtons: true
            }).then((result) => {
              if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
              } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
              ) {
                swalWithBootstrapButtons.fire(
                  'Cancelled',
                  'Your Data is safe :)',
                  'error'
                )
              }
            })
        }
    </script>
@endpush