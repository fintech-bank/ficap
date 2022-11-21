@extends("layouts.app")

@section("content")
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">Ma Caution</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <div class="fw-bold fs-4 mb-1">Type de caution</div>
                        <div class="">{!! $user->type_caution_label !!}</div>
                    </div>
                    <div class="separator my-5"></div>
                    <div class="d-flex flex-column">
                        <div class="fw-bold fs-4 mb-1">Etat de la caution</div>
                        <div class="">{!! $user->status_label !!}</div>
                    </div>
                    <div class="separator my-5"></div>
                    <div class="d-flex flex-column">
                        <div class="fw-bold fs-4 mb-1">Crédit impacté</div>
                        <a href="{{ route('credit') }}">{{ $user->loan->wallet->name_account_generic }}</a>
                        <div data-bs-toggle="tooltip" title="{!! $user->loan->status_explanation !!}">{!! $user->loan->status_label !!}</div>
                    </div>
                    <div class="separator my-5"></div>
                    <div class="d-flex flex-column">
                        <div class="fw-bold fs-4 mb-1">Lié à la personne</div>
                        <div class="d-flex flex-row">
                            <div class="symbol symbol-30px me-3">
                                <img src="{{ Gravatar::get($user->loan->customer->user->email) }}" alt="">
                            </div>
                            <div class="d-flex flex-column">
                                <div class="fw-bolder">{{ $user->loan->customer->info->full_name }}</div>
                                <div class="">{!!  $user->loan->customer->info->type_label  !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">Acte de cautionnement</h3>
                    <div class="card-toolbar">
                        <button type="button" class="btn btn-sm btn-success">
                            <i class="fa-solid fa-signature me-2"></i> Signer
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="caution_file">
                        <div id="canvas_container">
                            <canvas id="pdf_renderer"></canvas>
                        </div>
                        <div id="navigation_controls">
                            <button id="go_previous">Previous</button>
                            <input id="current_page" value="1" type="number"/>
                            <button id="go_next">Next</button>
                        </div>
                        <div id="zoom_controls">
                            <button id="zoom_in">+</button>
                            <button id="zoom_out">-</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.0.279/pdf.min.js"></script>
    <script type="text/javascript">
        let myState = {
            pdf: null,
            currentPage: 1,
            zoom: 1
        }

        pdfjsLib.getDocument('./my_document.pdf').then((pdf) => {
            myState.pdf = pdf;
            render();
        });
    </script>
@endsection
