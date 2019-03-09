<?
if(isset($_SESSION['token_inventory'])){
    if(isset($_GET['hal'])){
        $aksi=@$_GET['hal'];
        switch($aksi){
            case 'tambah':
                require_once('page/order/tambah.php');
                break;
            case 'perbarui':
                require_once('page/order/ubah.php');
                break;
            default:
                // echo "<script>window.location.href='../error/error.html'</script>";
        }
    }else{
        ?>
        <div class="m-content">
            <!--Begin::Section-->
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Data Order
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="data_order">
                        <thead>
                        <tr>
                            <th> No </th>
                            <th> Invoice </th>
                            <th> Date </th>
                            <th> Customer </th>
                            <th> Total Price </th>
                            <th> Paid </th>
                            <th> Image </th>
                            <th>  </th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <div id="modalorder" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                        </div>
                    </div>
                </div>
            </div>
            <!--End::Section-->
        </div>
        <?
    }
}else{
    echo "<script>window.location.href='http://".$_SERVER['SERVER_NAME']."/uh_shop/admin/not-found'</script>";
}
?>