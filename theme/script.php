<script src="<?=$canvas_url?>js/jquery.js"></script>
<script src="<?=$canvas_url?>js/plugins.js"></script>
<script src="<?=$base_assets?>lazyload.min.js"></script>
<!-- Footer Scripts
============================================= -->
<script src="<?=$canvas_url?>js/functions.js"></script>
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

                                    /******************\
                                    |*                *|
                                    |* end of plugin  *|
                                    |*                *|
                                    \******************/

        $('#submit_contact').click(function (e) {
            var nama = $('#nama').val();
            var email = $('#email').val();
            var erroremail = $('#email').closest("div").find("span").html();
            var nohp = $('#nohp').val();
            var errornohp = $('#nohp').closest("div").find("span").html();
            var pesan = $('#pesan').val();
            if(nama && email && nohp && pesan && !erroremail && !errornohp){
                $.ajax({
                    type: "POST",
                    cache: false,
                    url: "<?=$base_url?>ajax/contact.php",
                    data:{
                        nama: nama,
                        email:email,
                        nohp:nohp,
                        pesan:pesan
                    },
                    success: function (res) {
                        if(res){
                            alert(res);
                        }else{
                            alert("Feedback anda telah masuk ke database kami, Terima kasih!");
                        }
                    }
                })
            }else if(erroremail){
                $('#email').focus();
            }else if(errornohp){
                $('#nohp').focus();
            }
            e.preventDefault();
        })
        $('#repassword').keyup(function () {
            var value = $(this).val();
            var password = $('#password').val();
            if(value !== password){
                if(!$(this).hasClass("is-invalid")) {
                    $(this).addClass("is-invalid");
                }
                $(this).closest(".col_full").find("label").removeClass("text-success");
                $(this).closest(".col_full").find("label").addClass("text-danger");
                $(this).closest(".col_full").find("span").html("Password berbeda dengan konfirmasi");
            }
        })
        $('#register-form').submit(function (e) {
            e.preventDefault();
            var data = new FormData(this);
            data.append("daftar","daftar-masuk");
            var input = $('#register-form input');
            var valid = true;
            input.each(function () {
                if(!$(this).val()){
                    $(this).closest(".col_full").find("span").html("Field tidak boleh kosong");
                    $(this).addClass("is-invalid");
                    var label = $(this).closest(".col_full").find("label");
                    if(!label.hasClass("text-danger")){
                        label.addClass("text-danger");
                    }
                }
                if(!$(this).val() ||
                    !$(this).closest(".col_full").find("span").html() === "Email Tersedia" ||
                    !$(this).closest(".col_full").find("span").html() === "Username Tersedia" ||
                    $(this).hasClass("is-invalid") ||
                    $(this).closest(".col_full").find("label").hasClass("text-danger")){
                    valid = false;
                }
            });
            if(valid) {
                $.ajax({
                    type: 'POST',
                    url: '<?=$base_url?>ajax/regislogin.php',
                    enctype: 'multipart/form-data',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    success: function (res) {
                        if(res){
                            alert(res);
                        }else{
                            alert("Anda telah terdaftar, silahkan login");
                            location.reload();
                        }
                    }
                });
            }else{
                input.each(function () {
                    if(!$(this).val()){
                        $(this).closest(".col_full").find("span").html("Field tidak boleh kosong");
                        $(this).addClass("is-invalid");
                        var label = $(this).closest(".col_full").find("label");
                        if(!label.hasClass("text-danger")){
                            label.addClass("text-danger");
                        }
                    }
                })
            }
            return false;
        })
        $('#emailregis').bind("keyup blur",function () {
            var value = $(this).val();
            var error = $(this).closest("div").find("span");
            var label = $(this).closest("div").find("label");
            if(!error.html()){
                $.ajax({
                    type: 'POST',
                    url: '<?=$base_url?>ajax/cekemail.php',
                    data: {
                        email:value
                    },
                    success: function (res) {
                        if(res && value){
                            label.removeClass("text-success");
                            label.addClass("text-danger");
                            error.addClass("text-danger");
                            error.removeClass("text-success");
                            $('#emailregis').removeClass("is-valid");
                            $('#emailregis').addClass("is-invalid");
                            error.html(res);
                        }else if(!res){
                            $(this).removeClass("is-invalid");
                            $(this).addClass("is-valid");
                            label.removeClass("text-danger");
                            label.addClass("text-success");
                            error.removeClass("text-danger");
                            error.addClass("text-success");
                            error.html("Email Tersedia");
                        }
                    }

                })
            }
        });
		$('#username').bind("keyup blur",function () {
            var value = $(this).val();
            var error = $(this).closest("div").find("span");
            var label = $(this).closest("div").find("label");
            if(!error.html()){
                $.ajax({
                    type: 'POST',
                    url: '<?=$base_url?>ajax/cekusername.php',
                    data: {
                        username:value
                    },
                    success: function (res) {
                        if(res && value){
                            label.removeClass("text-success");
                            label.addClass("text-danger");
                            error.addClass("text-danger");
                            error.removeClass("text-success");
                            $('#username').removeClass("is-valid");
                            $('#username').addClass("is-invalid");
                            error.html(res);
                        }else if(!res){
                            $(this).removeClass("is-invalid");
                            $(this).addClass("is-valid");
                            label.removeClass("text-danger");
                            label.addClass("text-success");
                            error.removeClass("text-danger");
                            error.addClass("text-success");
                            error.html("Username Tersedia");
                        }
                    }

                })
            }
        });
        $('#login-form').submit(function (e) {
            var data = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: "<?=$base_url?>ajax/regislogin.php",
                data: data + "&masuk=masuk",
                success: function (res) {
                    if(res){
                        alert(res);
                    }else{
                        alert("Berhasil Login");
                        location.href = "<?=$base_url?>";
                    }
                }
            });
            e.preventDefault();
        });
        function moveToElementPosition(elementID,targetElementID){
            var pos = $(targetElementID).position();
            var height = $(targetElementID).outerHeight();
            var width = $(targetElementID).outerWidth();

            $(elementID).css("left", pos.left);
            $(elementID).css("top", pos.top);
            $(elementID).css("height", height);
            $(elementID).css("width", width);
            $(elementID).css("transition","2s");
        }
        $('.add-to-cart').click(function () {
            var dataproduk = $(this).data("produk");
            var animation = $(this).data("animation");
            $.ajax({
                type:'POST',
                data:{
                    produk : dataproduk
                },
                url:"<?=$base_url?>ajax/keranjang.php",
                success: function (res) {
                    if(res){
                        res = res.split(",");
                        alert(res[0]);
                        $('#produk'+res[1]).addClass("bounce");
                        $('#produk'+res[1]).on("transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd", function() {
                            $(this).removeClass("bounce");
                        })
                    }else{
                        // moveToElementPosition("img#"+animation,"#logo-keranjang");
                        $('img#'+animation).addClass("connected");
                        setTimeout(function () {
                            $('img#'+animation).removeClass("connected");
                        },1500);
                        $.ajax({
                            url: "<?=$base_url?>/ajax/keranjangatas.php",
                            success: function (result) {
                                $("#top-cart-trigger").html(result);
                            }
                        });
                        $.ajax({
                            url: "<?=$base_url?>/ajax/keranjangbawah.php",
                            success: function (resultt) {
                                $(".top-cart-content").html(resultt);
                            }
                        })
                    }
                    $('#top-cart').addClass("top-cart-open");
                }
            })
        })
        $('#payment').click(function () {
            var c = confirm("Apakah anda yakin akan mengkonfirmasi pembayaran anda berdasarkan bukti pembayaran yang anda lampirkan?");
            if(c == true){
                var data = new FormData();
                data.append("foto",$('#foto')[0].files[0]);
                $.ajax({
                    type: 'POST',
                    url: '<?=$base_url?>ajax/konfirmasi.php',
                    enctype: 'multipart/form-data',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    success: function (res) {
                        if(res){
                            alert(res);
                        }else{
                            location.href="<?=$base_url?>home";
                        }
                    }
                });
            }else{
                $('#foto').focus();
            }
        });
        $("#foto").change(function () {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("foto").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("muncul_gambar").src = oFREvent.target.result;
            };
        })
    })
</script>