<style>
    .daterangepicker.dropdown-menu {
        max-width: none;
        background-color: #999;
        border: 0;
        z-index: 10000;
        -webkit-box-shadow: none;
        box-shadow: none;
    }
    .daterangepicker {
        position: absolute;
        left: 0;
        margin-top: 5px;
        width: auto;
        padding: 0;
        top : 350px !important;
    }

    .daterangepicker .daterangepicker_input {
        position: relative;
    }
    .daterangepicker .daterangepicker_input input {
        padding-left: 11px;
        padding-right: 34px;
    }
    .daterangepicker .daterangepicker_input i {
        position: absolute;
        right: 11px;
        top: auto;
        bottom: 2px;
        color: #999;
        font-size: 24px;
    }
    .daterangepicker .calendar-time {
        text-align: center;
        margin: 12px 0;
    }
    .daterangepicker .weekend {
        color:red;
    }
    .daterangepicker .available {
        padding:5px;
        cursor: pointer;
    }

</style>
<div id="formsurvey" class="formsurvey p-3">
    <form action="#" method="post" accept-charset="utf-8" id="form" name="form" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="edNama" aria-describedby="nama" placeholder="Nama" >
            <small id="namaHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label for="Email1">Email address</label>
            <input type="email" class="form-control" id="edEmail" aria-describedby="emailHelp" placeholder="Alamat email" >
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label for="Telpon">Telpon / HP</label>
            <input type="text" class="form-control" id="edTelpon" placeholder="No Telpon" >
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="text" class="form-control tanggal" id="edtanggal" placeholder="DD-MM-YY" >
        </div>
        <div class="form-group">
            <label for="Jam">Jam</label>
            <select class="form-control jam" id="edjam">
                <option value="08:00">08:00</option>
                <option value="09:00">09:00</option>
                <option value="10:00">10:00</option>
                <option value="11:00">11:00</option>
                <option value="12:00">12:00</option>
                <option value="13:00">13:00</option>
                <option value="14:00">14:00</option>
                <option value="15:00">15:00</option>
                <option value="16:00">16:00</option>
                <option value="17:00">17:00</option>
            </select>
        </div>
        <!--        <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                        
                    </label>
                </div>-->
        <button class="btn btn-primary" onclick="formsubmit();">Submit</button>
    </form>
</div>
<script src="<?php echo base_url() ?>resource/scriptmedia/js/vendor/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>resource/scriptmedia/js/vendor/daterangepicker.js" type="text/javascript"></script>

<script>
            var xtanggal = '';
            $('.tanggal').daterangepicker({
                singleDatePicker: true,
                autoApply: true,
                autoUpdateInput: true,
                locale: {
                    format: 'DD-MM-YYYY'
                }
            }, function (start, end, label) {
                 xtanggal = start.format('DD-MM-YYYY');
                 $('#edtanggal').val(xtanggal);
            });
            
            $("#form").submit(function (e) {
                e.preventDefault();
            });

</script>