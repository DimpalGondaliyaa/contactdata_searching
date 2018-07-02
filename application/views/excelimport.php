<?php if($this->session->flashdata('message')){?>
  <div align="center" class="alert alert-success">      
    <?php echo $this->session->flashdata('message')?>
  </div>
<?php } ?>

<div class="row" style="height: 70vh;">
  <div class="top-import-box">
  <form action="<?php echo base_url(); ?>Uploadcsv/import" method="post" name="upload_excel" enctype="multipart/form-data">
  <input type="file" name="file" id="file" class="hide">

  <div class="upload-box valign-wrapper">
      <div class="inputBox">
        <input type="text" class="text-view" id="uploadFile" disabled="disabled">
      </div>
      <div class="uploadBtn-box">
        <button type="button" id="uploadBtn" class="btn btn-flat btn-upload-csv" onclick="$('#file').click();">Upload CSV <i class="material-icons">cloud_upload</i></button>
      </div>
  </div>

  <button type="submit" id="submit" name="import" class="btn btn-primary button-loading">Import</button>
  </form>
  </div>
</div><!-- 
<div class="row">
    <div style="width:80%; margin:0 auto;" align="center">
        <table id="t01">
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Date</th>
          </tr>
        <?php
        /*if(isset($data) && is_array($data) && count($data)): $i=1;
        foreach ($data as $key => $val) { */
        ?>
          <tr>
            <td><?php //echo $val['name'] ?></td>
            <td><?php //echo $val['email'] ?></td>
            <td><?php //echo $val['created_date'] ?></td>
          </tr>
          <?php //} endif; ?>
        </table>
    </div>
</div>
 -->