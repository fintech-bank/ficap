@extends("layouts.app")

@section("content")
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">Ma Caution</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column mb-5">
                        <div class="fw-bold fs-4">Type de caution</div>
                        <div class="">{!! $user->type_caution_label !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")

@endsection
