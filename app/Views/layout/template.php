<?php

?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title><?= $title; ?></title>
</head>

<body>

    <?= $this->renderSection('content'); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <script>
        function previewImg(_gambar, _label, _preview, ) {
            const gambar = document.querySelector(_gambar);
            const gambarLabel = document.querySelector(_label);
            const imgPreview = document.querySelector(_preview);

            gambarLabel.textContent = gambar.files[0].name;

            const fileGambar = new FileReader();
            fileGambar.readAsDataURL(gambar.files[0]);

            fileGambar.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>

    <!-- Dropdown Logic -->
    <script>
        $(document).ready(function() {
            $('#kurir').change(getLayanan);
            $('#kota').change(getLayanan);
            $('#layanan-kurir').on('change', '#layanan-kurir-selected', getBiaya);
        });

        function getLayanan() {
            $('#layanan-kurir').html('');
            $('#biaya_kurir_text').val("Rp. 0");
            $('#biaya_kurir_value').val(0);

            var kurir = $('#kurir').val();
            var kota = $('#kota').val();
            $.ajax({
                url: '<?php echo base_url("kurir/requestCost"); ?>',
                type: 'post',
                dataType: 'json',
                data: {
                    'key': 'a93c1d9454cfef95ee973c56bae97e3d',
                    'origin': '22',
                    'destination': kota,
                    'weight': '1',
                    'courier': kurir
                },
                success: function(response) {
                    if (response.rajaongkir.status.code == 200) {
                        let costs = response.rajaongkir.results[0].costs;
                        console.log(costs);

                        var start = `<label class="col-3 col-form-label" for="layanan-kurir-selected">Layanan</label>
                                            <div class="col-9 input-group">
                                                <select class="custom-select" id="layanan-kurir-selected" name="layanan-kurir-selected">`;
                        var end = `</select> </div>`;
                        var option;
                        $.each(costs, function(i, data) {
                            let cost = data.cost[0].value;
                            let estimasi = data.cost[0].etd;
                            let layanan = data.service;
                            option += `<option value="` + cost + `">` + layanan + ` (` + estimasi + ` hari)</option>`
                        });

                        let biaya = costs[0].cost[0].value;
                        $('#biaya_kurir_text').val("Rp. " + formatNumber(biaya));
                        $('#biaya_kurir_value').val(biaya);

                        $('#layanan-kurir').html(start + option + end);

                    }
                }
            })
        }

        function getBiaya() {
            var biaya = $('#layanan-kurir-selected').val();
            $('#biaya_kurir_text').val("Rp. " + formatNumber(biaya));
            $('#biaya_kurir_value').val(biaya);
        }

        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }
    </script>
</body>

</html>