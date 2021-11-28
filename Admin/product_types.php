<?php
session_start();
$title = "ProductTypes";
include("header.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>PRODUCT TYPES</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Product Type</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Product types</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" title="add" style="background-color: green;">
            <a href="addtype.php" style="color: white;font-weight: bolder;">Add type</a>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 20%">
                ID_Type
              </th>
              <th style="width: 30%">
                Name_Type
              </th>
              <th style="width: 50%" class="text-center">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $getAllProductTypes = $product_type->getAllProductTypes();
            foreach ($getAllProductTypes as $value) :
            ?>
              <tr>
                <td><?php echo $value['Type_Id'] ?>
                </td>
                <td>
                  <?php echo $value['Type_Name'] ?>
                </td>
                <td class="project-actions text-center">
                  <a class="btn btn-info btn-sm" href="#" style="height: 30px; width: 80px;">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                  </a>
                  <a class="btn btn-danger btn-sm" href="deletetype.php?id=<?php echo $value['Type_Id'] ?>" style="height: 30px; width: 80px;">
                    <i class="fas fa-trash">
                    </i>
                    Delete
                  </a>
                </td>
              </tr>
            <?php
            endforeach;
            ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include("footer.php");
if ($_SESSION['del'] == true) {
  ?>
    <script>
      alert("The type of product that you want to delete still exists products!");
    </script>
  <?php
  unset($_SESSION['del']);
  }
?>