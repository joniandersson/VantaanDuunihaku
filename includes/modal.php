<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ammattiryhmät</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group" id="categoriesForm">
                    <div class="form-check text-black">
                        <input type="checkbox" id="terveydenhuolto" value="Terveydenhuolto" name="terveydenhuolto" class="form-check-input" form="searchForm" <?php if(isset($_POST['terveydenhuolto'])) echo "checked='checked'"; ?>>
                        <label for="terveydenhuolto" class="form-check-label">Terveydenhuolto</label>
                        <span class="badge badge-info float-right"><?php getJoblistingAmount(1) ?></span>
                    </div>
                    <div class="form-check text-black">
                        <input type="checkbox" id="sosiaalityo" value="Sosiaalityö" name="sosiaalityo" class="form-check-input" form="searchForm" <?php if(isset($_POST['sosiaalityo'])) echo "checked='checked'"; ?>>
                        <label for="sosiaalityo" class="form-check-label">Sosiaalityo</label>
                        <span class="badge badge-info float-right"><?php getJoblistingAmount(2) ?></span>
                    </div>
                    <div class="form-check text-black">
                        <input type="checkbox" value="Varhaiskasvatus ja esiopetus" id="varhaiskasvatus" name="varhaiskasvatus" class="form-check-input"  form="searchForm" <?php if(isset($_POST['varhaiskasvatus'])) echo "checked='checked'"; ?>  />
                        <label for="varhaiskasvatus" class="form-check-label">Varhaiskasvatus ja esiopetus</label>
                        <span class="badge badge-info float-right"><?php getJoblistingAmount(3) ?></span>
                    </div>
                    <div class="form-check text-black">
                        <input type="checkbox" value="Opetusala" id="opetusala" name="opetusala" class="form-check-input"  form="searchForm" <?php if(isset($_POST['opetusala'])) echo "checked='checked'"; ?>  />
                        <label for="opetusala" class="form-check-label">Opetusala</label>
                        <span class="badge badge-info float-right"><?php getJoblistingAmount(4) ?></span>
                    </div>
                    <div class="form-check text-black">
                        <input type="checkbox" id="Hallinto" value="Hallinto" name="hallinto" class="form-check-input" form="searchForm" <?php if(isset($_POST['hallinto'])) echo "checked='checked'"; ?>>
                        <label for="Hallinto" class="form-check-label">Hallinto</label>
                        <span class="badge badge-info float-right"><?php getJoblistingAmount(5) ?></span>
                    </div>
                    <div class="form-check text-black">
                        <input type="checkbox" id="nuorisotyö" value="Nuorisotyö ja liikuntapalvelut" name="nuorisotyö" class="form-check-input" form="searchForm" <?php if(isset($_POST['nuorisotyö'])) echo "checked='checked'"; ?>>
                        <label for="nuorisotyö" class="form-check-label">Nuorisotyö ja liikuntapalvelut</label>
                        <span class="badge badge-info float-right"><?php getJoblistingAmount(6) ?></span>
                    </div>
                    <div class="form-check text-black">
                        <input type="checkbox" id="tekninen" value="Tekninen ala" name="tekninen" class="form-check-input" form="searchForm" <?php if(isset($_POST['tekninen'])) echo "checked='checked'"; ?>>
                        <label for="tekninen ala" class="form-check-label">Tekninen ala</label>
                        <span class="badge badge-info float-right"><?php getJoblistingAmount(7) ?></span>
                    </div>
                    <div class="form-check text-black">
                        <input type="checkbox" id="kotihoito" value="Kotihoito" name="kotihoito" class="form-check-input" form="searchForm" <?php if(isset($_POST['kotihoito'])) echo "checked='checked'"; ?>>
                        <label for="kotihoito" class="form-check-label">Kotihoito</label>
                        <span class="badge badge-info float-right"><?php getJoblistingAmount(8) ?></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="tallennaBtn" data-dismiss="modal">Tallenna</button>
                <!-- <button type="button" class="btn btn-success">Tallenna</button> -->
            </div>
        </div>
    </div>
</div>


