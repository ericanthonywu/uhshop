<?
if(isset($_POST['detaildata'])){
    $id=anti_injection($_POST['kode']);

    $db='dir5_djbk';
    $tabel='binakerjasama_kerjasama';
    $crud=new Crud($db);
    $conditions=array(
        'where'=>array(
                'id'=>$id
        ),
        'return_type'=>'single'
    );
    if($data=$crud->getRows($tabel,$conditions)){
    ?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">DETAIL DATA PERUMAHAN</h4>
    </div>
    <div class="modal-body">
        <table class="table borderless">
            <tbody>
                <tr>
                    <td><b>Tipe Jenis</b></td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo $data['Tipe_Jenis'];  ?></td>
                </tr>
                 <tr>
                    <td><b>Instansi</b></td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo $data['Instansi'];  ?></td>
                </tr>
                <tr>
                    <td><b>Mitra Kerja</b></td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo $data['Mitra_Kerja'];  ?></td>
                </tr>
                <tr>
                    <td><b>Judul Dokumen</b></td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo $data['Judul_Dokumen'];  ?></td>
                </tr>
                <tr>
                    <td><b>Nomor Dokumen</b></td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo $data['Nomor_Dokumen'];  ?></td>
                </tr>
                <tr>
                    <td><b>Awal Kerjasama</b></td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo date_to_id($data['Awal_Kerja_Sama']);  ?></td>
                </tr>
                 <tr>
                    <td><b>Akhir Kerjasama</b></td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo date_to_id($data['Akhir_Kerja_Sama']);  ?></td>
                </tr>
                 <tr>
                    <td><b>Jenis Lembaga</b></td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo $data['Jenis_Lembaga'];  ?></td>
                </tr>

            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
<?
    }
}
?>