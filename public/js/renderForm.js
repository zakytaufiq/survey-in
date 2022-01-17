$(document).ready(function () {
    // fasos

    if (typeof Storage !== "undefined") {
        if (sessionStorage.getItem("jmlFasos") === null) {
            sessionStorage.setItem("jmlFasos", 0);
        }
        if (sessionStorage.getItem("jmlLampiran") === null) {
            sessionStorage.setItem("jmlLampiran", 0);
        }
    } else {
        alert("Browser yang Anda gunakan tidak mendukung Web Storage");
    }
    console.log(sessionStorage.getItem("jmlFasos"));
    console.log(sessionStorage.getItem("jmlLampiran"));
    var x = 1;
    var y = 1;
    let renderFasos = () => {
        $(".form-fasos").append(`
                <div class="single-form-fasos mt-3">
                <div class="d-flex flex-wrap mb-3">
                    <div class="col-12 col-sm-6 mt-sm-1">
                        <label for="" class="form-label d-block mb-1 fw-bold">Jenis Fasilitas
                            Sosial(Fasos)</label>
                        <select class="form-select form-select border-primary" autocomplete="off"
                            style="border-radius: .5em;" aria-label=".form-select example" name="addmore[${x}][jenis_fasos_id]"
                            value="{{ old('jenis_fasos_id') }}">
                            <option value="" selected disabled>-Pilih fasos-</option>
                        </select>
                    </div>

                    <div class="d-flex col-sm-6 justify-content-evenly">
                        <div class="kolom-data col-5">
                            <label for="" class="ms-2">Panjang :</label>
                            <div class="input-group">
                                <input type="text" class="form-control border-primary"
                                    style="border-radius: .5em;" aria-label="Username"
                                    aria-describedby="basic-addon1" name="addmore[${x}][panjang]"
                                    value="">
                                <span class="input-group-text border-0 bg-white" id="basic-addon1">m</span>
                            </div>
                        </div>

                        <div class="kolom-data col-5">
                            <label for="" class="ms-2">Lebar :</label>
                            <div class="input-group">
                                <input type="text" class="form-control border-primary"
                                    style="border-radius: .5em;" aria-label="Username"
                                    aria-describedby="basic-addon1" name="addmore[${x}][lebar]"
                                    value="">
                                <span class="input-group-text border-0 bg-white" id="basic-addon1">m</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-3">
                                <label for="input-koordinat-fasos" class="form-label d-block fw-bold">Koordinat
                                    Fasos</label>
                                <div class="col-12 d-flex koordinat-lokasi-fasos" id="koordinat-lokasi-fasos">
                                    <button type="button" id="koordinat-fasos"
                                        class="lokasi btn btn-primary d-flex align-items-center me-2 border-0 koordinat-fasos"
                                        style="border-radius: .5em; background: #3F4FC8;"><i
                                            class="fas fa-map-marker-alt m-0 pe-1"></i>Lokasi</button>
                                    <input type="text"
                                        class="lokasi-fasos form-control border-primary "
                                        style="border-radius: .5em;" id="input-koordinat-fasos"
                                        name="addmore[${x}][koordinat_fasos]" value="">
                                </div>
                            </div>

                

                <div class="col-12">
                    <input type="file" name="addmore[${x}][foto]" class="imageFasos btn btn-primary border-0" style="border-radius: .5em; background: #3F4FC8;" id="fasos-${x}">
                    <label for="fasos-${x}">
                    <div class="img-keterangan mt-2 p-2 text-sm-center"
                        style="border: 3px dashed #3F4FC8; width: 10em; border-radius: .5em;">
                        <img src="/img/kartu-empat.png" class="imageFasosView" style="width: 9em;">
                    </div>
                </label>
                </div>
                <button type="button" id="close" class="btn btn-primary border-0 mt-3"
                style="border-radius: .5em; background: #3F4FC8;">Exit Fasos</button>
                </div>
        `);
        x++;
    };
    let renderLampiran = () => {
        $(".form-lampiran").append(`
            <div class="single-form-lampiran">
                    <label for="" class="fw-bold">Keterangan</label>
                    <div class="input-group mb-3">
                        <select class="form-select form-select border-primary @error('addmoreLampiran[${y}][jenis_lampiran_id]') is-invalid @enderror" autocomplete="off"
                            style="border-radius: .5em;" aria-label=".form-select example"
                            name="addmoreLampiran[${y}][jenis_lampiran_id]" value="">
                            <option value="" selected disabled>-Pilih kategori-</option>
                            @foreach ($lampiran as $item)
                                <option value="{{ $item->id }}">{{ $item->jenis }}</option>
                            @endforeach
                        </select>
                       
                    </div>

                    <div class="col-12">
                            <input type="file" name="addmoreLampiran[${y}][foto]"
                            class="imageLampiran btn btn-primary border-0 @error('addmoreLampiran[${y}][foto]') is-invalid @enderror"
                            style="border-radius: .5em; background: #3F4FC8;" id="lampiran-${y}">
                            <label for="lampiran-${y}">
                        <div class="img-keterangan mt-2 p-2 text-sm-center"
                            style="border: 3px dashed #3F4FC8; width: 10em; border-radius: .5em;">
                            <img src="/img/kartu-empat.png" id="imageLampiran" style="width: 9em;">
                        </div>
                        </label>
                    </div>
                    <button type="button" id="closeLampiran" class="btn btn-primary border-0 mt-3"
                        style="border-radius: .5em; background: #3F4FC8;">Exit Lampiran</button>
                </div>
        `);
        y++;
    };
    function onReloadWindow() {
        $(".form-lampiran").empty();
        $(".form-fasos").empty();
        for (
            let index = 0;
            index < sessionStorage.getItem("jmlFasos");
            index++
        ) {
            renderFasos();
        }
        for (
            let index = 0;
            index < sessionStorage.getItem("jmlLampiran");
            index++
        ) {
            renderLampiran();
        }
    }
    onReloadWindow();

    var i = sessionStorage.getItem("jmlFasos");
    var j = sessionStorage.getItem("jmlLampiran");
    $("#addLampiran").click(function () {
        j = sessionStorage.getItem("jmlLampiran");
        j++;
        sessionStorage.setItem("jmlLampiran", j);
        $("jmlLampiran").val(j);
        console.log(sessionStorage.getItem("jmlFasos"));
        console.log(sessionStorage.getItem("jmlLampiran"));
        renderLampiran();
    });
    $("#add").click(function () {
        i = sessionStorage.getItem("jmlFasos");
        i++;
        sessionStorage.setItem("jmlFasos", i);
        $("jmlFasos").val(i);
        console.log(sessionStorage.getItem("jmlFasos"));
        console.log(sessionStorage.getItem("jmlLampiran"));
        renderFasos();
    });

    $(document).on("click", "#closeLampiran", function () {
        $(this).parents(".single-form-lampiran").remove();
        if (j > 0) {
            j--;
            sessionStorage.setItem("jmlLampiran", j);
        }
        console.log(sessionStorage.getItem("jmlFasos"));
        console.log(sessionStorage.getItem("jmlLampiran"));
    });
    $(document).on("click", "#close", function () {
        $(this).parents(".single-form-fasos").remove();
        if (i > 0) {
            i--;
            sessionStorage.setItem("jmlFasos", i);
        }
        console.log(sessionStorage.getItem("jmlFasos"));
        console.log(sessionStorage.getItem("jmlLampiran"));
    });
});