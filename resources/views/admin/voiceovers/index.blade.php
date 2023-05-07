@extends('layouts.admin')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Voiceovers</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Voiceovers</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section classs="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Voiceovers</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div style="margin-left: 19px; margin-top: 10px; margin-bottom: 5px;">
                <a class="btn btn-primary btn-sm" href="{{ route('admin.voiceovers.create') }}">
                    📁 Create voiceover
                </a>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr >
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 20%">
                            Title
                        </th>
                        <th style="width: 30%">
                            Animes count
                        </th>
                        <th>
                        </th>
                        <th style="width: 8%" class="text-center">
                        </th>
                        <th style="width: 20%">
                        </th>
                    </tr>

                    </thead>
                        <tbody>
                        @foreach($voiceovers as $voiceover)
                            <tr id="block_{{ $voiceover->id }}">
                                <td>
                                    {{ $voiceover->id }}
                                </td>
                                <td>
                                    <a>
                                        {{ $voiceover->title }}
                                    </a>
                                    <br/>
                                    <small>
                                        Created {{ $voiceover->created_at }}
                                    </small>
                                </td>
                                <td>
                                    <ul class="list-inline">
                                        {{ $voiceover->animes->count() }}
                                    </ul>
                                </td>
                                <td class="project_progress">

                                </td>
                                <td class="project-state">
                                </td>
                                <td class="project-actions text-right" style="font-size: 12px;">
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.voiceovers.edit', $voiceover->id) }}">
                                        ✏ Edit
                                    </a>
                                    <form class="form_delete_anime" id="{{ $voiceover->id }}" style="display: inline;">
                                        <input type="submit" class="btn btn-danger btn-sm" value="🗑️ Delete">
                                    </form>

                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                </table>
            </div>
            <br>
            <div class="pagination_bootstrap" style="margin-left: 15px;">
                {{ $voiceovers->withQueryString()->links('vendor.pagination.bootstrap-4') }}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
@section('script')
    <script>
        $(".form_delete_anime").on("submit", function(e){
            e.preventDefault();
            const id = $(this).attr('id');
            const animeCount = $('.anime-count').text();
            let url = '{{ route("admin.anime.destroy", ":id") }}';
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                method: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data){
                    $('#block_'+id).fadeOut();
                    $('.anime-count').text(animeCount - 1);
                }
            });
        });
    </script>
@endsection
