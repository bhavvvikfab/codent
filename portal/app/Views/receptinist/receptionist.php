<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
All-Receptionist
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>All Receptionist</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Users</a></li>
            <li class="breadcrumb-item active">All Receptionist</li>
          </ol>
        </nav>
      </div>
    </div>
  </div><!-- End Page Title -->

  <section class="section" id="sup001">
    <div class="row ">
      <div class="col-lg-12">

        <div class="card">

          <div class="card-header">
            <div class="row">
              <div class="col-lg-8">
                <h5 class="card-title text-start">Reception</h5>
              </div>
              <div class="col-lg-4">
                <h5 class="card-title text-end addsup">
                  <a href="<?= base_url() . '' . session('prefix') . '/' . 'add_receptionist' ?>"> Add New
                    Receptionist</a>
                </h5>
              </div>
            </div>
          </div>

          <div class="card-body view-supplier-table table-responsive">
            <!-- Table with stripped rows -->
            <table class="table table-borderless datatable supplier-table">

              <thead>
                <tr>
                  <th> Sr. No. </th>
                  <th>Profile</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Status</th>
                  <th>Action</th>
                  <!-- <th>Status</th> -->
                </tr>
              </thead>

              <tbody>
                <?php if (!empty($data)): ?>
                  <?php foreach ($data as $key => $rep): ?>
                    <tr>
                      <td><?php echo $key + 1; ?></td>
                      <td>
                        <img
                          src="<?= config('App')->baseURL2 ?>/public/images/<?= !empty($rep['profile']) ? $rep['profile'] : 'default.jpg' ?>"
                          height="50" width="50" class="rounded-circle"
                          onerror="this.onerror=null; this.src='<?= config('App')->baseURL2 ?>/public/images/default.jpg';">
                      </td>

                      <td><?php echo isset($rep['fullname']) ? $rep['fullname'] : 'N/A'; ?></td>
                      <td><?php echo isset($rep['phone']) ? $rep['phone'] : 'N/A'; ?></td>

                      <td>

                        <button
                          class="statusToggleBtn btn btn-sm <?php echo ($rep['status'] == 'active') ? 'btn-success' : 'btn-danger'; ?>"
                          data-id="<?= $rep['id'] ?>">
                          <?php echo ($rep['status'] == 'active') ? 'Active' : 'Inactive'; ?>
                        </button>

                      </td>

                      <td>
                        <div class="d-flex justify-content-center">
                          <div class="editen p-2">
                            <a href="<?= base_url() . session('prefix') . '/reception_details/' . esc($rep['id']) ?>">
                              <button type="button" class="btn btn-secondary  btn-sm"><i class="bi bi-eye"></i></button>
                            </a>
                          </div>
                          <div class="viewsenq p-2">
                            <a href="<?= base_url() . session('prefix') . '/reception_edit_view/' . esc($rep['id']) ?>">
                              <button type="button" class="btn btn-sm"><i class="bi bi-pencil-square"></i><i
                                  class="ri-pen-line"></i></button>
                            </a>
                          </div>

                          <div class="deleten p-2">
                            <a href="<?= base_url() . session('prefix') . '/reception_delete/' . esc($rep['id']) ?>"
                              class="delete_btn">
                              <button type="button" class="btn btn-sm"><i class="bi bi-trash"></i></button>
                            </a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="6" class="text-center" >No Receptionist found.</td>
                  </tr>
                <?php endif; ?>

              </tbody>

              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

  <?php if (session('added_reception')): ?>
    <script>
      showToast('Reception Registered successfully.');  
    </script>
  <?php endif; ?>
  <?php if (session('edit_receptioninst')): ?>
    <script>
      showToast('Reception Updated successfully.');  
    </script>
  <?php endif; ?>
  <?php if (session('delete_receptionist')): ?>
    <script>
      showToast('Reception Delete successfully.');  
    </script>
  <?php endif; ?>

  <script>
    $(document).ready(function () {
      $('.delete_btn').on('click', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        Swal.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "black",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!"
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = url;
          }
        });
      });
      $('.statusToggleBtn').on('click', function () {
        var $this = $(this);
        var id = $this.data('id');

        if ($this.hasClass('btn-success')) {
          $this.removeClass('btn-success').addClass('btn-danger');
          $this.text('Inactive');
          $.ajax({
            url: "<?= base_url() . '' . session('prefix') . '/' . 'receptionist_status' ?>",
            method: 'get',
            data: { id: id },
            success: function (data) {

              if (data.status == 'success') {
                showToast(data.msg);
              } else {
                console.log(data.msg);
              }

            },
            error: function (err) {
              console.log(err);
            }
          });
        } else {
          $this.removeClass('btn-danger').addClass('btn-success');
          $this.text('Active');
          $.ajax({
            url: "<?= base_url() . '' . session('prefix') . '/' . 'receptionist_status' ?>",
            method: 'get',
            data: { id: id },
            success: function (data) {
              if (data.status == 'success') {
                showToast(data.msg);
              } else {
                console.log(data.msg);
              }
            },
            error: function (err) {
              console.log(err);
            }
          });
        }
      });

    });
  </script>

</main><!-- End #main -->
<?= $this->endSection() ?>