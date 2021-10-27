<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><?= ucwords($data['page_title']) ?></h4>
            <p class="card-description">
              <?php echo ($data['index'] == "add") ? "Thêm mới" : "Sửa" ?>
            </p>
            <form class="forms-sample" method="POST" onsubmit="return validate()">
              <div class="form-group">
                <label>Tên thương hiệu</label>
                <?php if ($data['index'] == "edit") : ?>
                  <input type="text" class="form-control" value="<?=$data['row']->name?>" id="name" name="name" >
                  <input type="hidden" name="brand_id" value="<?=$data['row']->id?>">
                <?php else: ?>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên thương hiệu">
                <?php endif; ?>
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- Javascript -->
  <script>
    function validate() {
      var name = document.getElementById("name").value;
      if (name == "") {
        alert("Hãy nhập tên!");
        return false;
      }
    }
  </script>
  <!-- //Javascript -->