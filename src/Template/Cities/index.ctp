<?php
$urlToRestApi = $this->Url->build('/api/cities', true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Cities/index', ['block' => 'scriptBottom']);
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 head">
            <h5>Cities</h5>
            <!-- Add link -->
            <div class="float-right">
                <a href="javascript:void(0);" class="btn btn-success" data-type="add" data-toggle="modal" data-target="#modalCityAddEdit"><i class="plus"></i> New city</a>
            </div>
        </div>
        <div class="statusMsg"></div>
        <!-- List the Cities -->
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="cityData">
                <?php if (!empty($cities)) {
                    foreach ($cities as $row) { ?>
                        <tr>
                            <td><?php echo '#' . $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td>
                                <a href="javascript:void(0);" class="btn btn-warning" 
                                    rowID="<?php echo $row['id']; ?>" data-type="edit" 
                                    data-toggle="modal" data-target="#modalCityAddEdit">
                                    edit
                                </a>
                                <a href="javascript:void(0);" class="btn btn-danger" 
                                    onclick="return confirm('Are you sure to delete data?') ? 
                                        cityAction('delete', '<?php echo $row['id']; ?>') : false;">
                                    delete
                                </a>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr><td colspan="5">No city found...</td></tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modalCityAddEdit" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add new city</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="statusMsg"></div>
                <form role="form">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter the name">
                    </div>
                    <input type="hidden" class="form-control" name="id" id="id"/>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="citySubmit">SUBMIT</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>