 <!-- Keyword search -->
        <form>
            <div class="form-group">
                <label for="sanahaku">Sanahaku</label>
                <input type="text" class="form-control" name="sanahaku" id="sanahaku" placeholder="esim. Opettaja" form="searchForm" <?php if(isset($_POST['sanahaku'])) echo "value=" .$_POST['sanahaku'] . ""; ?>>
            </div>
        </form>
        <label for="categoryBtn">Ammattiryhmät</label>
        <button type="button" class="btn btn-info w-100 mb-3" id="categoryBtn"
                data-toggle="modal" data-target="#categoryModal">Valitse Ammattiryhmiä<span class="badge badge-light ml-2" id="checkedNum"></span></button>
        <!-- Search form -->
        <form action="search.php" method="post" class="" id="searchForm"></form>
        <div id="valitut" style="cursor: pointer;">
            <div id="title" class="w-100  mb-0 text-black">
                <span style="cursor: pointer">Valitut Ammattiryhmät <i id="arrow" class="fa fa-arrow-right"></i></span>
            </div>
        </div>
        <div id="valitutDrop" style="display: none" class="w-100 mt-0 mb-5">
            <table id="valitutTable" class="table table-striped table-sm">
                <tbody id="valitutRow">

                </tbody>
            </table>
            <span id="valitutSpan" class="font-weight-light"></span>
        </div>
    <input disabled type="submit" id="searchButton" form="searchForm" style="position: absolute;bottom:0;left:0;" class="btn btn-primary col-md-12 rounded-0" value="Hae">


<!-- Modal -->
<?php
require_once("modal.php");
require_once("jobListingModal.php");
?>
