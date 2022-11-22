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
                        <div class="btn-group me-2">
                            <button class="btn btn-sm btn-icon btn-secondary" id="go_previous"><i class="fa-solid fa-arrow-left"></i> </button>
                            <button class="btn btn-sm btn-icon btn-secondary" id="go_next"><i class="fa-solid fa-arrow-right"></i> </button>
                        </div>

                        <div class="btn-group me-2">
                            <button class="btn btn-sm btn-icon btn-secondary" id="zoom_in"><i class="fa-solid fa-magnifying-glass-plus"></i> </button>
                            <button class="btn btn-sm btn-icon btn-secondary" id="zoom_out"><i class="fa-solid fa-magnifying-glass-minus"></i> </button>
                        </div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>
    <script type="text/javascript">
        let myState = {
            pdf: null,
            currentPage: 1,
            zoom: 1
        }

        pdfjsLib.getDocument('{{ $document }}').then((pdf) => {
            myState.pdf = pdf;
            render();
        });

        function render() {
            myState.pdf.getPage(myState.currentPage).then((page) => {

                let canvas = document.getElementById("pdf_renderer");
                let ctx = canvas.getContext('2d');

                let viewport = page.getViewport(myState.zoom);

                canvas.width = viewport.width;
                canvas.height = viewport.height;

                page.render({
                    canvasContext: ctx,
                    viewport: viewport
                });
            });
        }

        document.getElementById('go_previous')
            .addEventListener('click', (e) => {
                if(myState.pdf == null|| myState.currentPage === 1)
                    return;

                myState.currentPage -= 1;
                document.getElementById("current_page").value = myState.currentPage;
                render();
            });

        document.getElementById('go_next')
            .addEventListener('click', (e) => {
                if(myState.pdf == null || myState.currentPage > myState.pdf._pdfInfo.numPages)
                    return;

                myState.currentPage += 1;
                document.getElementById("current_page").value = myState.currentPage;
                render();
            });

        document.getElementById('current_page')
            .addEventListener('keypress', (e) => {
                if(myState.pdf == null) return;

                // Get key code
                let code = (e.keyCode ? e.keyCode : e.which);

                // If key code matches that of the Enter key
                if(code === 13) {
                    let desiredPage = document.getElementById('current_page').valueAsNumber;

                    if(desiredPage >= 1 && desiredPage <= myState.pdf._pdfInfo.numPages) {
                        myState.currentPage = desiredPage;
                        document.getElementById("current_page").value = desiredPage;
                        render();
                    }
                }
            });

        document.getElementById('zoom_in')
            .addEventListener('click', (e) => {
                if(myState.pdf == null) return;
                myState.zoom += 0.5;

                render();
            });

        document.getElementById('zoom_out')
            .addEventListener('click', (e) => {
                if(myState.pdf == null) return;
                myState.zoom -= 0.5;

                render();
            });
    </script>
@endsection
