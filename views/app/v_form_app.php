    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Pilih Barang
                    </h6>
                </div>
                <div class="card-body">
                    <div class="form-group input-group">
                        <input type="text" class="form-control" id="barcode_barang" value="" min="" name="barcode_barang" placeholder="Scan for..." required autofocus>

                        <input type="hidden" id="id_barang">
                        <input type="hidden" id="harga">
                        <input type="hidden" id="stock">


                        <input type="text" id="barcode" class="form-control" readonly>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal-barang">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                        <input type="hidden" id="bcd">
                        <input type="hidden" id="qty_cart">
                        <input type="hidden" id="stock_awal">



                    </div>
                    <!-- <div class="form-group">
                        <label>Scan Barang</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="barcode_barang" value="" min="" name="barcode_barcode_barang" placeholder="Scan" required autofocus>
                        </div>
                    </div> -->
                    <div class="form-group">

                        <label for="">Qty</label>
                        <input type="number" id="qty" name="qty" value="1" min="1" class="form-control">
                        <br />
                    </div>
                    <div class="form-group">
                        <input type="text" id="user" value="<?= $this->fungsi->user_login()->name ?>" class="form-control" readonly>
                        <!-- <input type="text" id="user" value="<?= $this->fungsi->user_login1()->nama_user ?>" class="form-control" readonly> -->

                        <br />
                    </div>
                    <div class="form-group">
                        <input type="date" id="date" value="<?= date('Y-m-d') ?>" class="form-control">
                        <br />
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="customer" name="customer" placeholder="" required>
                            <option value="" disabled selected>Pilih Customer</option>
                            <?php $no = 1;
                            foreach ($customer as $data) { ?>
                                <option value="<?= $data->id ?>">
                                    <?= $data->nama; ?></option>
                            <?php
                            } ?>
                        </select>
                    </div>
                    <div class="card-footer">
                        <button type="button" id="add_cart" class="btn active btn-primary apaya">
                            <i class="fa fa-cart-plus">Tambah</i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <?= $judul; ?>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive col-md-12">
                        <table class="table table-bordered col-lg-12">
                            <thead>
                                <tr align="center">
                                    <th>#</th>
                                    <th>Barcode</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>qty</th>
                                    <th>Discount </th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="cart_table">
                                <?php $this->load->view('app/v_cart'); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-5 offset-7">

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Total</label>
                            <div class="col-sm-8">
                                <!-- <h1><b><span style="text-align:right;">Rp. </span><span style="text-align:center;" id="total1">0</span></b></h1> -->
                                <h1><b>Rp.<span id="grand_total2" style="font-size:30pt">0</span></b></h1>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Sub Total</label>
                            <div class="col-sm-8">
                                <input type="number" id="sub_total" value="" class="form-control" readonly>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Diskon</label>
                            <div class="col-sm-8">
                                <input type="number" id="discount" value="0" min="0" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Grand Total</label>
                            <div class="col-sm-8">
                                <input type="number" id="grand_total" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Bayar</label>
                            <div class="col-sm-8">
                                <input type="number" id="cash" value="0" min="0" class="form-control" required>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Kembalian</label>
                            <div class="col-sm-8">
                                <input type="number" id="change" class="form-control" readonly>
                                <input type="hidden" id="note" rows="3" class="form-control"></input>

                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Note</label>
                            <div class="col-sm-8">
                                <textarea id="note" rows="3" class="form-control"></textarea>

                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="card-footer">
                    <button id="proses_bayar" class="btn btn-flat active btn-flat btn-primary">
                        <i class="fa fa-paper-plane-o"></i>Proses
                    </button>
                    <button id="proses_cancel" class="btn btn-flat active  btn-flat btn-warning">
                        <i class="fa fa-paper-plane-o"></i>Cancel
                    </button>
                    <button id="proses_hold" class="btn btn-flat active  btn-flat btn-secondary">
                        <i class="fa fa-paper-plane-o"></i>Hold
                    </button>
                    <a href="<?= site_url('transaksi/getTrsantunda'); ?>" class=" float-center btn btn-flat left active  btn-flat btn-info">
                        <i class="fa fa-paper-plane-o"></i>Daftar Transaksi Tunda
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div aria-label="Close" data-dismiss="modal" aria-hidden="true" class="modal" id="modal-barang" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold text-primary text-center" id="tambahUserTitle">
                        Detail stock in
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-bordered no-margin apaya">
                        <thead>
                            <th>Barcode</th>
                            <th>Nama Barang</th>
                            <th>kategori</th>
                            <th>Harga</th>
                            <th>Stock</th>
                            <th>Action</th>

                        </thead>
                        <tbody>
                            <?php foreach ($barangs as $user) { ?>
                                <tr>
                                    <td><?= $user->barcode ?></td>
                                    <td><?= $user->nama ?></td>
                                    <td><?= $user->kat ?></td>
                                    <td><?= format_rupiah($user->harga) ?></td>
                                    <td><?= $user->stock ?></td>
                                    <td>
                                        <button class="btn btn-xs btn-info" id="select" data-id="<?= $user->id_barang ?>" data-barcode="<?= $user->barcode ?>" data-harga="<?= $user->harga ?>" data-stock="<?= $user->stock ?>">
                                            <i class=" fa fa-check"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade " id="modal-barang-edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold text-primary text-center" id="tambahUserTitle">
                        Update Keranjang
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <input type="hidden" id="id_cart">
                    <div class="for-group">
                        <label for="barang">Barang</label>
                        <!-- <div class="row">
                            <div class="com-md-6">
                                <input type="text" class="form-control" id="barcode_barang" readonly>
                            </div>

                            <div class="com-md-6">
                                <input type="text" class="form-control" id="nama_barang" readonly>
                            </div>
                        </div> -->
                        <input type="text" class="form-control" id="nama_barang" readonly>
                    </div>
                    <div class="for-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" id="harga_barang" min="0">
                    </div>

                    <div class="for-group">
                        <label for="harga">Qty</label>
                        <input type="number" class="form-control" id="qty_barang" min="0">
                    </div>
                    <div class="for-group">
                        <label for="harga">Total Before Discount</label>
                        <input type="number" class="form-control" id="total_before" min="0" readonly>
                    </div>
                    <div class="for-group">
                        <label for="harga">Discount per Barang</label>
                        <input type="number" class="form-control" id="discount_barang" min="0">
                    </div>
                    <div class="for-group">
                        <label for="harga">Total</label>
                        <input type="number" class="form-control" id="total_barang" readonly>
                    </div>
                </div>

                <div class="modal-footer">
                    <button id="edit_cart" class="btn btn-flat btn-success">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>

        </div>
    </div>


    <script>
        $(function() {
            $("#customer").select2()
            $('#barcode_barang').keypress(function(event) {
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if (keycode == '13') {
                    event.preventDefault();
                    var barcode = $(this).val();
                    let jumlahBarang = $("#qty").val();
                    get_qty_keranjang(barcode, jumlahBarang)

                    // sisa stock



                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('app/get_barang') ?>",
                        dataType: "JSON",
                        data: {
                            barcode: barcode
                        },
                        cache: false,
                        success: function(data) {
                            var barcodebaru = $("#bcd").val(data.barcode);
                            var stock_awal = $("#stock_awal").val(data.stock);
                            var idbarang = data.id_barang;
                            var hargaBarang = data.harga;
                            var barcode = data.barcodebaru;
                            var nama = data.nama;
                            var stock = data.stock;



                            let jumlahBarang = $("#qty").val();
                            let qty_cart = $("#qty_cart").val();

                            let subTotal = parseInt(hargaBarang) * parseInt(jumlahBarang);

                            var sisa1 = parseInt(stock) - parseInt(qty_cart) + 1;

                            if (barcode == '') {

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Belum memasukkan barcode!',
                                });

                                $("#barcode_barang").focus()

                            } else if (jumlahBarang < 1) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Stok tidak cukup',
                                    text: 'Sisa Stock ' + stock,
                                });
                                $("#barcode_barang").val("")
                                $("#barcode_barang").focus()

                            } else if (stock == 0) {

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Stok tidak cukup',
                                    text: 'Sisa Stock ' + stock,
                                });
                                $("#barcode_barang").val("")
                                $("#barcode_barang").focus()

                            } else if (parseInt(stock) < jumlahBarang || parseInt(stock) < parseInt(qty_cart)) {

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Stok tidak cukup',
                                    text: 'Sisa Stock ' + sisa1,
                                });
                                $("#barcode_barang").val("")
                                $("#barcode_barang").focus()

                            } else {
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url('app/proses') ?>",
                                    dataType: "JSON",
                                    data: {
                                        'add_cart': true,
                                        'id_barang': idbarang,
                                        'total': subTotal,
                                        'qty': jumlahBarang,
                                        'harga': hargaBarang
                                    },
                                    success: function(result) {
                                        if (result.success == true) {
                                            $('#cart_table').load('<?= site_url('app/cart_data') ?>', function() {
                                                kalkulasi()
                                            })
                                            $('#id_barang').val('')
                                            $('#barcode_barang').val('')
                                            $('#qty').val(1)
                                            $('#barcode_barang').focus()

                                        } else {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Oops...',
                                                text: 'Gagal!',
                                            });
                                        }
                                    }
                                });
                            }


                        }
                    });


                }

            });

            $(document).on('click', '#select', function() {
                var barcode = $(this).data('barcode');
                let jumlahBarang = $("#qty").val();
                $('#id_barang').val($(this).data('id'))
                $('#barcode').val($(this).data('barcode'))
                $('#harga').val($(this).data('harga'))
                $('#stock').val($(this).data('stock'))
                $('.modal-backdrop').hide()
                $('body').removeClass('modal-open')
                $('#modal-barang').modal('hide')
                // $('#modal-barang').location.reload();

                get_qty_keranjang2(barcode)

            })

            $(document).on('click', '#add_cart', function() {


                var id_barang = $('#id_barang').val()
                var bcd = $('#barcode').val();
                var harga = $('#harga').val()
                var qty = $('#qty').val()
                var stock = $('#stock').val()
                var cartqty = $("#qty_cart").val();

                // sisa stock
                var sisa = parseInt(stock) - parseInt(cartqty);

                if (id_barang == '') {
                    Swal.fire({
                        icon: 'info',
                        title: 'Barang',
                        text: 'belum dipilih!',
                    });
                } else if (qty > stock) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Jumlah Barang Melebihi Stock',
                        text: 'Sisa Stock ' + stock,
                    });
                    $("#barcode_barang").val("")
                    $("#barcode_barang").focus()



                } else if (parseInt(stock) < qty || parseInt(stock) < (parseInt(cartqty) + parseInt(qty))) {

                    Swal.fire({
                        icon: 'error',
                        title: 'Stok tidak cukup',
                        text: 'Sisa Stock ' + sisa,
                    });
                    $("#barcode_barang").val("")
                    $("#barcode_barang").focus()



                } else {
                    $.ajax({
                        type: 'POST',
                        url: '<?= site_url('app/proses') ?>',
                        dataType: 'JSON',
                        data: {

                            'add_cart': true,
                            'id_barang': id_barang,
                            'harga': harga,
                            'qty': qty
                        },

                        success: function(result) {
                            if (result.success == true) {
                                $('#cart_table').load('<?= site_url('app/cart_data') ?>', function() {
                                    kalkulasi()
                                })
                                $('#id_barang').val('')
                                $('#barcode').val('')
                                $('#qty').val(1)
                                $('#barcode_barang').focus()
                            } else {

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Wadaoo...',
                                    text: 'Gagal!',
                                });
                            }
                        }
                    })
                }
            })

            // Function Validasi Cek Stock 
            function get_qty_keranjang(barcode, jml) {

                // Validasi berdasarkan barcode yang sama 

                $('#cart_table tr').each(function() {
                    var qty_cart = $("#cart_table td.bb:contains('" + barcode + "')").parent().find('td').eq(4).html()
                    if (qty_cart != null) {
                        $('#qty_cart').val(parseInt(qty_cart) + parseInt(jml))
                    } else {
                        $('#qty_cart').val(0)
                    }
                })
            }

            // Function Validasi Cek Stock 
            function get_qty_keranjang2(barcode) {

                // Validasi berdasarkan barcode yang sama 

                $('#cart_table tr').each(function() {
                    var qty_cart = $("#cart_table td.bb:contains('" + barcode + "')").parent().find('td').eq(4).html()
                    if (qty_cart != null) {
                        $('#qty_cart').val(parseInt(qty_cart))
                    } else {
                        $('#qty_cart').val(0)
                    }
                })
            }

            $(document).on('click', '#del_cart', function() {
                // if (confirm('apakah anda yakin ?')) {
                var id_cart = $(this).data('cartid')
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url('app/cart_del') ?>',
                    dataType: 'JSON',
                    data: {
                        'id_cart': id_cart
                    },
                    success: function(result) {
                        if (result.success == true) {
                            $('#cart_table').load('<?= site_url('app/cart_data') ?>',
                                function() {
                                    kalkulasi()
                                })

                            $('#barcode_barang').focus()
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Wadaoo...',
                                text: 'Gagal hapus!',
                            });

                        }
                    }

                })
                // }

            })

            $(document).on('click', '#update', function() {
                $('#id_barang').val($(this).data('cartid'))
                $('#barcode_barang').val($(this).data('barcode'))
                $('#nama_barang').val($(this).data('barangnama'))
                $('#harga_barang').val($(this).data('harga'))
                $('#qty_barang').val($(this).data('qty'))
                $('#total_before').val($(this).data('harga') * $(this).data('qty'))
                $('#discount_barang').val($(this).data('discount'))
                $('#total_barang').val($(this).data('total'))
            })

            function hitung_edit_modal() {
                var harga = $('#harga_barang').val()
                var qty = $('#qty_barang').val()
                var discount = $('#discount_barang').val()
                totol_before = harga * qty
                $('#total_before').val(totol_before)
                total = (harga - discount) * qty
                // total = (totol_before - discount)
                $('#total_barang').val(total)
                if (discount == '') {
                    $('#discount_barang').val(0)

                }
            }

            $(document).on('keyup mouseup', '#harga_barang, #qty_barang, #discount_barang', function() {
                hitung_edit_modal()
            })
            $(document).on('click', '#edit_cart', function() {
                var id_cart = $('#id_barang').val()
                var harga = $('#harga_barang').val()
                var qty = $('#qty_barang').val()
                var discount = $('#discount_barang').val()
                var total = $('#total_barang').val()

                if (harga == '') {
                    Swal.fire({
                        icon: 'info',
                        title: 'Harga',
                        text: 'tidak boleh kosong!',
                    });
                    $('#harga_barang').focus()
                } else if (qty == '' || qty < 1) {
                    alert('Qty menimal 1')
                    $('#qty_barang').focus()

                } else {
                    $.ajax({
                        type: 'POST',
                        url: '<?= site_url('app/proses') ?>',
                        data: {
                            'edit_cart': true,
                            'id_cart': id_cart,
                            'harga': harga,
                            'qty': qty,
                            'discount': discount,
                            'total': total,
                        },

                        dataType: 'JSON',
                        success: function(result) {
                            if (result.success == true) {
                                $('#cart_table').load('<?= site_url('app/cart_data'); ?>', function() {
                                    kalkulasi()
                                })
                                $('.modal-backdrop').hide()
                                $('body').removeClass('modal-open')
                                $('#modal-barang-edit').modal('hide')
                            } else {

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Wadaoo...',
                                    text: 'Gagal Update!',
                                });
                            }
                        }
                    })

                }
            })


            //kalkulasi
            function kalkulasi() {
                var subtotal = 0;


                $('#cart_table tr').each(function() {

                    subtotal += parseInt($(this).find('#total').text())
                })



                isNaN(subtotal) ? $('#sub_total').val(0) : $('#sub_total').val(subtotal)

                var discount = $('#discount').val()

                var gran_total = subtotal - discount

                if (isNaN(gran_total)) {
                    $('#grand_total').val(0)
                    $('#grand_total2').text(0)

                } else {
                    $('#grand_total').val(gran_total)
                    $('#grand_total2').text(gran_total)
                }
                var cash = $('#cash').val()
                cash != 0 ? $('#change').val(cash - gran_total) : $('#change').val(0)

                if (discount == '') {
                    $('#discount').val(0)
                }
            }
            $(document).on('keyup mouseup', '#discount, #cash', function() {
                kalkulasi()
            })

            $(document).ready(function() {
                kalkulasi()
            });


            $(document).on('click', '#proses_bayar', function() {
                var id_customer = $('#customer').val()
                var subtotal = $('#sub_total').val()
                var discount = $('#discount').val()
                var grandtotal = $('#grand_total').val()
                var cash = $('#cash').val()
                var change = $('#change').val()
                var note = $('#note').val()
                var date = $('#date').val()
                if (subtotal == '') {
                    Swal.fire({
                        icon: 'info',
                        title: 'barang',
                        text: 'belum dipilih!',
                    });
                    $('#barcode').focus()
                } else if (cash < 1) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Uang cash',
                        text: 'belum diinput!',
                    });
                    $('#cash').focus()

                } else {

                    Swal.fire({
                        title: ' Apakah Anda Yakin ?',
                        text: "Proses Transaksi!",
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        timer: 5000,
                        confirmButtonText: 'Yes, Proses!'
                    }).then((result) => {
                        if (result.value) {
                            Swal.fire({
                                // icon: 'sucess',
                                title: "Processing Data..",
                                text: "Data sedang berkelana",
                                text: '',
                                imageUrl: '<?= base_url() ?>' + "assets/gif/hm.gif",
                                timer: 3000,
                                showConfirmButton: false,
                                allowOutsideClick: false
                            });
                            $.ajax({
                                type: 'POST',
                                url: '<?= site_url('app/proses') ?>',
                                data: {
                                    'proses_bayar': true,
                                    'id_customer': id_customer,
                                    'subtotal': subtotal,
                                    'discount': discount,
                                    'grandtotal': grandtotal,
                                    'cash': cash,
                                    'change': change,
                                    'note': note,
                                    'date': date
                                },
                                dataType: 'JSON',
                                success: function(result) {
                                    if (result.success == true) {
                                        // window.location.replace("<?= site_url('transaksi'); ?>");
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Proses Berhasil',
                                            text: 'Berhasil!'
                                        });
                                        window.open('<?= site_url('app/cetak_nota/') ?>' + result.id_penjualan, '_blank')
                                    } else {
                                        alert('gagal trans')
                                    }
                                    location.href = '<?= site_url('app') ?>'
                                }
                            })
                        }
                    })

                }
            })

            $(document).on('click', '#proses_cancel', function() {
                Swal.fire({
                    title: ' Apakah Anda Yakin ?',
                    text: "Batal Transaksi!",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    timer: 5000,
                    confirmButtonText: 'Yes, Proses!'
                }).then((result) => {
                    if (result.value) {
                        Swal.fire({
                            title: "Processing Data..",
                            text: "Data sedang berkelana",
                            text: '',
                            imageUrl: '<?= base_url() ?>' + "assets/gif/hm.gif",
                            timer: 3000,
                            showConfirmButton: false,
                            allowOutsideClick: false
                        });
                        $.ajax({
                            type: 'POST',
                            url: '<?= site_url('app/cart_del') ?>',
                            data: {
                                'proses_cancel': true
                            },
                            dataType: 'JSON',
                            success: function(result) {
                                if (result.success == true) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil',
                                        text: 'Membatalkan!',
                                    });
                                    $('#cart_table').load('<?= site_url('app/cart_data'); ?>', function() {
                                        hitung_edit_modal()
                                        location.href = '<?= site_url('app') ?>'
                                    })
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal',
                                        text: 'Membatalkan!',
                                    });
                                }
                            }
                        })
                        $('#discount').val(0)
                        $('#cash').val(0)
                        $('#customer').val(0).change()
                        $('#barcode').val('')
                        $('#barcode').focus()
                    }
                })

            })
            $(document).on('click', '#proses_hold', function(e) {
                var keranjang = $("#cart_table tr").children().eq(0).html();
                e.preventDefault();

                Swal.fire({
                    title: ' Apakah Anda Yakin ?',
                    text: "Hold Transaksi!",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    timer: 5000,
                    confirmButtonText: 'Yes, Proses!'

                }).then((result) => {
                    if (keranjang != null) {
                        Swal.fire({
                            // icon: 'sucess',
                            title: "Processing Data..",
                            text: "Data sedang berkelana",
                            text: '',
                            imageUrl: '<?= base_url() ?>' + "assets/gif/hm.gif",
                            timer: 3000,
                            showConfirmButton: false,
                            allowOutsideClick: false
                        });
                        $.ajax({
                            type: 'POST',
                            url: '<?= site_url('app/proses') ?>',
                            data: {
                                'proses_hold': true,
                            },
                            dataType: 'JSON',
                            success: function(result) {
                                if (result.success == true) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil',
                                        text: 'Di Tunda',
                                    });
                                    window.location.replace("app");
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal',
                                        text: 'Tidak Ada Transaksi!',
                                    });
                                }
                            }
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Tidak Ada Transaksi!',
                        });
                    }
                })
            })
        });
    </script>