<script src="<?=$metronic5_url?>7/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="<?=$metronic5_url?>7/demo/demo7/base/scripts.bundle.js" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Vendors -->
<script src="<?=$metronic5_url?>7/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
<!--end::Page Vendors -->

<!--begin::Page Scripts -->
<script src="<?=$base_assets; ?>confirm/jquery-confirm.min.js" type="text/javascript"></script>
<!--end::Page Scripts -->
<script>
    $(document).ready(function () {
        $("img").prop("draggable",false);
        $("#preventdef").click(function (e) {
            e.preventDefault();
        });
        $('.number').bind('keypress', function (event) {
            var regex = new RegExp("^[0-9]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });
        $('.alphanumeric').keypress(function (event) {
            var regex = new RegExp("^[a-zA-Z0-9]$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });
        function validateEmail(email) {
            var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }
        function validatenohp(nomor){
            var re = /^08[0-9]{9,}$/;
            return re.test(nomor)
        }
        $('.valuevalidate').bind('keyup keypress',function validatevalue() {
            var max = $(this).data('max-val');
            var min = $(this).data('min-val');
            var alertt = $(this).attr('allow-alert');
            var value = $(this).val();
            if (value > max) {
                if(alertt === "true") {
                    alert('angka tidak boleh lebih dari ' + max);
                }
                $(this).val(max);
            } else if (value < min) {
                if(alertt === "true") {
                    alert('angka tidak boleh kurang dari ' + min);
                }
                $(this).val(min);
            }
        });
        
        $('.lengthvalidate').bind('keyup keypress keydown',function validatelength() {
            var max = $(this).data('max-length');
            var value = $(this).val();
            var alertt = $(this).attr('allow-alert');
            if (value.length > max) {
                if(alertt === "true") {
                    alert('jumlah huruf tidak boleh lebih dari ' + max);
                }
                $(this).val(value.substring(0, max));
            }
        });
        function numberWithCommas(n) {
            var parts=n.toString().split(".");
            return parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",") + (parts[1] ? "." + parts[1] : "");
        }
        function animasinomor(tipe,selector,angkaawal,angkaakhir,durasi,komanomor) {
            if(tipe==="id"){
                selector = $('#'+selector);
            }else if(tipe==="class"){
                selector = $('.'+selector);
            }
            selector.each(function () {
                $(this).prop('Counter', angkaawal).animate({
                    Counter: angkaakhir
                }, {
                    duration: durasi,
                    easing: 'swing',
                    step: function (now) {
                        if(komanomor === "yes") {
                            $(this).text(numberWithCommas(Math.ceil(now)));
                        }else{
                            $(this).text(Math.ceil(now));
                        }
                    }
                });
            });
        }
        $('.ribuan').keyup(function (event) {
            if(event.which >= 37 && event.which <= 40) return;
            // format number
            $(this).val(function(index, value) {
                return value
                    .replace(/\D/g, "")
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                    ;
            });
            var id = $(this).data("id-selector");
            var classs =$(this).data("class-selector");
            var value = $(this).val();
            var noCommas = value.replace(/,/g, "");
            $('#'+id).val(noCommas);
            $('.'+classs).val(noCommas);
        });
        $('.validate-input').bind("blur keyup",function validate_input() {
            var value = $(this).val();
            var regexdata = $(this).data("regex");
            var regex;
            if(regexdata == null){
                regex = "";
            }else{
                regex = regexdata.toLowerCase();
            }
            var bungkus = $(this).data("div");
            if(bungkus == null){
                bungkus = "div";
            }
            var label = $(this).closest(bungkus).find("label");
            var errormsg = $(this).closest(bungkus).find("span");
            switch (regex) {
                case "email":
                    if (value && validateEmail(value)) {
                        $(this).removeClass("is-invalid");
                        $(this).addClass("is-valid");
                        label.removeClass("text-danger");
                        label.addClass("text-success");
                        errormsg.html("");
                    } else if(value && !validateEmail(value)){
                        label.removeClass("text-success");
                        $(this).removeClass("is-valid");
                        if(!$(this).hasClass("is-invalid")) {
                            $(this).addClass("is-invalid");
                        }
                        label.addClass("text-danger");
                        errormsg.addClass("text-danger");
                        errormsg.removeClass("text-success");
                        errormsg.html("Email tidak valid");
                    } else {
                        label.removeClass("text-success");
                        $(this).removeClass("is-valid");
                        if(!$(this).hasClass("is-invalid")) {
                            $(this).addClass("is-invalid");
                        }
                        label.addClass("text-danger");
                        errormsg.addClass("text-danger");
                        errormsg.removeClass("text-success");
                        errormsg.html("Field Tidak Boleh Kosong");
                    }
                    break;
                case "nohp":
                    if (value && validatenohp(value)) {
                        $(this).removeClass("is-invalid");
                        $(this).addClass("is-valid");
                        label.removeClass("text-danger");
                        label.addClass("text-success");
                        errormsg.html("");
                    } else if(value && !validatenohp(value)){
                        label.removeClass("text-success");
                        $(this).removeClass("is-valid");
                        if(!$(this).hasClass("is-invalid")) {
                            $(this).addClass("is-invalid");
                        }
                        label.addClass("text-danger");
                        errormsg.addClass("text-danger");
                        errormsg.removeClass("text-success");
                        errormsg.html("No hp tidak valid");
                    } else {
                        label.removeClass("text-success");
                        $(this).removeClass("is-valid");
                        if(!$(this).hasClass("is-invalid")) {
                            $(this).addClass("is-invalid");
                        }
                        label.addClass("text-danger");
                        errormsg.addClass("text-danger");
                        errormsg.removeClass("text-success");
                        errormsg.html("Field Tidak Boleh Kosong");
                    }
                    break;
                default:
                    if (value) {
                        $(this).removeClass("is-invalid");
                        $(this).addClass("is-valid");
                        label.removeClass("text-danger");
                        label.addClass("text-success");
                        errormsg.html("");
                    } else {
                        label.removeClass("text-success");
                        $(this).removeClass("is-valid");
                        $(this).addClass("is-invalid");
                        label.addClass("text-danger");
                        errormsg.addClass("text-danger");
                        errormsg.removeClass("text-success");
                        errormsg.html("Field Tidak Boleh Kosong");
                    }
                    break;
            }
        })
        $('#btn_print').click(function () {
            var div = "<div class='m-grid m-grid--hor m-grid--root m-page'>" +
                "<div class=\"m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body\">" +
                "<div class=\"m-grid__item m-grid__item--fluid m-wrapper\">" +
                "<div class='m-content'>" +
                "<div class='m-portlet>'>" +
                "<div class='m-portlet__body m-portlet__body--no-padding'>" +
                "<div class=\"m-invoice-1\" id=\"print\">"
            ;
            var print = $('#print').html();
            var ori = document.body.innerHTML;
            document.body.innerHTML = div + print + "</div></div></div></div></div></div></div>";
            window.print();
            document.body.innerHTML = ori;
            //printJS({ printable: 'print', type: 'html', header: 'PrintJS - Form Element Selection' })
        });
    })
</script>