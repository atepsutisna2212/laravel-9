@extends('shared.layout')


@section('css')
@endsection

@section('body')
    <h3>Data Karyawan</h3>
    <div class="uk-flex uk-flex-between uk-margin-bottom">
        <div class="uk-width-1-3">
            <input class="uk-input" type="text" name="searchNip" id="searchNip" placeholder="Cari NIP">
        </div>
        <div class="uk-width-1-3">
            <input class="uk-input" type="text" name="searchNamaKaryawan" id="searchNamaKaryawan"
                placeholder="Cari Nama Karyawan">
        </div>
        <div class="uk-width-1-3">
            <input class="uk-input" type="text" name="searchJabatan" id="searchJabatan" placeholder="Cari Jabatan">
        </div>
    </div>
    <div class="uk-flex uk-flex-between uk-margin-bottom">
        <div class="uk-width-1-2">
            <button class="uk-button uk-button-primary uk-button-small" onclick="onAdd()">Tambah data</button>
        </div>
        <div class="uk-width-1-2 uk-text-right">
            <button class="uk-button uk-button-secondary uk-button-small" onclick="onSearch()">Cari</button>
            <button class="uk-button uk-button-small" onclick="onClear()">Bersihkan</button>
        </div>
    </div>
    <div class="uk-overflow-auto">
        <table class="uk-table uk-table-striped">
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama Karyawa</th>
                    <th>Jabatan</th>
                    <th>Alamat</th>
                    <th>No. Telp</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <tr>
                    <td>Table Data</td>
                    <td>Table Data</td>
                    <td>Table Data</td>
                    <td>Table Data</td>
                    <td>Table Data</td>
                    <td>Table Data</td>
                    <td>
                        <button class="uk-button uk-button-small" onclick="">Detail</button>
                        <button class="uk-button uk-button-secondary uk-button-small" onclick="">Edit</button>
                        <a id="js-modal-confirm" class="uk-button uk-button-danger uk-button-small" href="#">Hapus</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <nav aria-label="Pagination">
            <ul class="uk-pagination uk-flex-right uk-margin-medium-top" uk-margin>
                <li><a href="#" onclick="onPaging('-');return false;"><span uk-pagination-previous></span></a></li>
                <li class="uk-active"><span aria-current="page" id="noPaging">1</span></li>
                <li><a href="#" onclick="onPaging('+');return false;"><span uk-pagination-next></span></a></li>
                <li>Jumlah data : </li>
                <li id="noCountData"> 10</li>
            </ul>
        </nav>
    </div>
    {{-- modal --}}
    <div id="modal-sections" uk-modal>
        <div class="uk-modal-dialog">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header">
                <h2 class="uk-modal-title" id="modalTitle">Modal Title</h2>
            </div>
            <div class="uk-modal-body">
                <div id="notifAlertModal"></div>
                <form id="form">
                    <div class="uk-flex uk-flex-between uk-margin-bottom">
                        <div class="uk-width-1-2">
                            <label for="nip">NIP</label>
                        </div>
                        <div class="uk-width-1-2">
                            <input class="uk-input" type="text" name="nip" id="nip">
                        </div>
                    </div>
                    <div class="uk-flex uk-flex-between uk-margin-bottom">
                        <div class="uk-width-1-2">
                            <label for="nama_karyawan">Nama Karyawan</label>
                        </div>
                        <div class="uk-width-1-2">
                            <input class="uk-input" type="text" name="nama_karyawan" id="nama_karyawan">
                        </div>
                    </div>
                    <div class="uk-flex uk-flex-between uk-margin-bottom">
                        <div class="uk-width-1-2">
                            <label for="jabatan">Jabatan</label>
                        </div>
                        <div class="uk-width-1-2">
                            <input class="uk-input" type="text" name="jabatan" id="jabatan">
                        </div>
                    </div>
                    <div class="uk-flex uk-flex-between uk-margin-bottom">
                        <div class="uk-width-1-2">
                            <label for="alamat">Alamat</label>
                        </div>
                        <div class="uk-width-1-2">
                            <input class="uk-input" type="text" name="alamat" id="alamat">
                        </div>
                    </div>
                    <div class="uk-flex uk-flex-between uk-margin-bottom">
                        <div class="uk-width-1-2">
                            <label for="telp">No. Telpon</label>
                        </div>
                        <div class="uk-width-1-2">
                            <input class="uk-input" type="text" name="telp" oninput="onTelp()" id="telp">
                        </div>
                    </div>
                    <div class="uk-flex uk-flex-between uk-margin-bottom">
                        <div class="uk-width-1-2">
                            <label for="email">Email</label>
                        </div>
                        <div class="uk-width-1-2">
                            <input class="uk-input" type="text" name="email" id="email">
                        </div>
                    </div>
                    <div class="uk-flex uk-flex-between uk-margin-bottom">
                        <div class="uk-width-1-2">
                            <label for="foto">Foto</label>
                        </div>
                        <div class="uk-width-1-2">
                            <input class="uk-input" type="file" name="foto" id="foto"
                                onchange="onCekFoto()">
                        </div>
                    </div>
                </form>
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close" id="btnCancel" type="button">Cancel</button>
                <button class="uk-button uk-button-primary" type="button" id="btnSubmit">Submit</button>
            </div>
        </div>
    </div>
    {{-- modal end --}}
@endsection

@section('js')
    <script>
        $(document).ready(() => {
            getData();
        })
        const modalTitle = $('#modalTitle');
        const btnSubmit = $('#btnSubmit');
        const btnCancel = $('#btnCancel');
        const tableBody = $('#tableBody');
        const modal = UIkit.modal('#modal-sections');
        const notifAlertModal = $('#notifAlertModal');

        const searchNip = $('#searchNip');
        const searchNamaKaryawan = $('#searchNamaKaryawan');
        const searchJabatan = $('#searchJabatan');
        // const bodyAlertModal = $('#bodyAlertModal');
        const elAlert = `
                            <div class="uk-alert-warning" uk-alert>
                                <a href class="uk-alert-close" uk-close></a>
                                pesan
                            </div>
                        `;
        const noPaging = $('#noPaging');
        const noCountData = $('#noCountData');

        const nip = $('#nip');
        const nama_karyawan = $('#nama_karyawan');
        const jabatan = $('#jabatan');
        const alamat = $('#alamat');
        const telp = $('#telp');
        const email = $('#email');
        const foto = $('#foto');

        let allData;
        let maxPaging;
        let startPaging = 1;
        let countData = 0;

        function getData() {
            tableBody.html('');
            let length = 10;
            $.ajax({
                url: '/employee/getData',
                method: 'POST',
                data: {
                    start: (startPaging - 1) * length,
                    length: length,
                    search: '',
                    searchNip: searchNip.val(),
                    searchNamaKaryawan: searchNamaKaryawan.val(),
                    searchJabatan: searchJabatan.val(),
                },
                success: function(response) {
                    let isiTable = "";
                    allData = response.data;
                    response.data.forEach((item) => {
                        const items = `
                                    <tr>
                                        <td>${item.nip}</td>
                                        <td>${item.nama_karyawan}</td>
                                        <td>${item.jabatan}</td>
                                        <td>${item.alamat}</td>
                                        <td>${item.telp}</td>
                                        <td>${item.email}</td>
                                        <td>
                                            
                                            <button class="uk-button uk-button-warning uk-button-small" type="button">OPSI</button>
                                            <div class="uk-card uk-card-body uk-card-default" id="dropdownOpsi_${item.id_karyawan}" uk-drop="mode: click">
                                                <button class="uk-button uk-button-small" onclick="onDetail(${item.id_karyawan})">Detail</button>
                                                <button class="uk-button uk-button-secondary uk-button-small" onclick="onEdit(${item.id_karyawan})">Edit</button>
                                                <button onclick="confirmDelete(${item.id_karyawan})" class="uk-button uk-button-danger uk-button-small" href="#">Hapus</button>
                                            </div>
                                        </td>
                                    </tr>
                                    `;
                        isiTable += items;
                    })
                    tableBody.html(isiTable);
                    countData = response.countData;
                    noCountData.html(countData);
                    maxPaging = Math.ceil(countData / length);
                    if (!response.data.length) {
                        noPaging.html('0')
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        }

        function onPaging(symbol) {
            const noPage = noPaging.html();
            if (symbol == '+') {
                if (noPage == maxPaging) return;
                startPaging++;
                getData()
            } else {
                if (noPage == 1) return
                startPaging--
                getData()
            }
            noPaging.html(startPaging);
        }

        function reloadData() {
            startPaging = 1;
            noPaging.html(startPaging)
            getData();
        }

        function onSearch() {
            reloadData()
        }

        function onClear() {
            searchJabatan.val('')
            searchNamaKaryawan.val('')
            searchNip.val('')
            reloadData()
        }

        function confirmDelete(id) {
            // e.preventDefault();
            // e.target.blur();
            console.log(id);
            $(`#dropdownOpsi_${id}`).removeClass('uk-open');
            setTimeout(() => {
                $('.uk-modal-footer.uk-modal-close').text('Batalkan');
                $('.uk-modal-footer.uk-button-primary').text('Ya');
            }, 100);
            UIkit.modal.confirm('Apakah anda yakin menghapus data ?', {
                labels: {
                    ok: 'Ya',
                    cancel: 'Batalkan'
                }
            }).then(function() {
                console.log('Confirmed.')
                $.ajax({
                    url: '/employee/' + id,
                    type: 'DELETE',
                    success: function(response) {
                        if (response.result) {
                            onNotif(response.message)
                            startPaging = 1;
                            noPaging.html(startPaging);
                            getData();
                        }
                    },
                    error: function(xhr) {

                    },
                });
            }, function() {
                console.log('Rejected.')
            });
        }

        function onNotif(message) {
            setTimeout(() => {
                alert(message);
            }, 500);
        }

        function btnModal() {
            setTimeout(() => {
                $('.uk-modal-footer.uk-modal-close').text('Batalkan');
                $('.uk-modal-footer.uk-button-primary').text('Submit');
            }, 100);
        }

        function onAdd() {
            btnModal();
            notifAlertModal.html('');
            $('#form').find('input').val('');
            modalTitle.html("Tambah data");
            btnSubmit.attr('onclick', 'onSave()');
            modal.show();
        }

        function onSave() {
            const inValid = onValid();
            if (inValid.length) {
                let info = '';
                notifAlertModal.html('');
                inValid.forEach(item => {
                    info += `<p>${item}</p>`;
                })
                const alert = elAlert.replace('pesan', info);
                notifAlertModal.html(alert);
                return;
            }
            console.log('ini save');
            const formData = new FormData(document.getElementById('form'));
            btnSubmit.prop('disabled', true).html(`<div uk-spinner></div>`);
            $.ajax({
                url: '/employee',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.result) {
                        modal.hide();
                        onNotif(response.message);
                        reloadData()
                    }
                },
                error: function(xhr) {
                    console.error('Error submitting data:', xhr.responseText);
                    // You can add additional error handling here
                },
                complete: () => {
                    btnSubmit.prop('disabled', false).html('submit');
                }
            });
        }

        function onDetail(id) {
            console.log('lokasi ' + id);
            window.location.href = `/employee/${id}`;
        }

        function onEdit(id) {
            const fil = allData.find(item => item.id_karyawan == id);
            if (!fil) return;
            $(`#dropdownOpsi_${id}`).removeClass('uk-open');
            btnModal();
            $('#form').find('input').val('');
            notifAlertModal.html('');
            modalTitle.html("Edit data");
            btnSubmit.attr('onclick', `onUpdate(${id})`);
            nip.val(fil.nip);
            nama_karyawan.val(fil.nama_karyawan);
            telp.val(fil.telp);
            jabatan.val(fil.jabatan);
            alamat.val(fil.alamat);
            email.val(fil.email);
            modal.show();
        }

        function onUpdate(id) {
            const inValid = onValid();
            if (inValid.length) {
                let info = '';
                notifAlertModal.html('');
                inValid.forEach(item => {
                    info += `<p>${item}</p>`;
                })
                const alert = elAlert.replace('pesan', info);
                notifAlertModal.html(alert);
                return;
            }
            const formData = new FormData(document.getElementById('form'));
            btnSubmit.prop('disabled', true).html(`<div uk-spinner></div>`);
            $.ajax({
                url: '/employee/' + id,
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.result) {
                        modal.hide();
                        onNotif(response.message);
                        reloadData()
                    }
                },
                error: function(xhr) {
                    console.error('Error submitting data:', xhr.responseText);
                },
                complete: () => {
                    btnSubmit.prop('disabled', false).html('submit');
                }
            });
        }

        function onTelp() {
            const filTelp = telp.val().replace(/[^0-9]/g, '');
            telp.val(filTelp)
        }

        function onValid() {
            const inValid = [];
            if (!nip.val()) {
                inValid.push('NIP harus diisi');
            }
            if (!nama_karyawan.val()) {
                inValid.push('Nama karyawan harus diisi');
            }
            if (!alamat.val()) {
                inValid.push('Alamat harus diisi');
            }
            if (!jabatan.val()) {
                inValid.push('Jabatan harus diisi');
            }
            if (!telp.val()) {
                inValid.push('No. Telepon harus diisi');
            } else if (telp.val().length < 10 || telp.val().length > 15) {
                inValid.push('No. Telepon harus terdiri dari 10 hingga 15 angka');
            }
            const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!email.val()) {
                inValid.push('Email harus diisi');
            } else if (!regex.test(email.val())) {
                inValid.push('Email tidak valid');
            }
            console.log(inValid)
            return inValid;
        }

        function onCekFoto() {
            const valid = ['jpg', 'png', 'jpeg'];
            const fileExtension = foto.val().split('.').pop().toLowerCase();
            const errorMessage = $('#error-message');

            if (valid.includes(fileExtension)) {} else {
                foto.val('');
                alert('Exstensi foto hanya jpg, jpeg atau png')
            }
        }
    </script>
@endsection
