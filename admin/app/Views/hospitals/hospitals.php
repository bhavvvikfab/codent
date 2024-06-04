<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Hospitals
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                <h1>All Hospitals</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('/dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Hospitals</li>
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
                                <h5 class="card-title text-start">Hospitals</h5>
                            </div>
                            <div class="col-lg-4">
                                <h5 class="card-title text-end addsup">
                                    <a href="<?= base_url('add_hospital') ?>"> Add New Hospitals</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div class="card-body view-supplier-table table-responsive">
                        <!-- Table with stripped rows -->
                        <table class="table table-borderless datatable supplier-table hospital_table_body">

                            <thead>
                                <tr>
                                    <th> Sr. No. </th>
                                    <th>Profile</th>
                                    <th>Hospital Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php if (empty($hospitals)): ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Table is empty</td>
                                    </tr>
                                <?php else: ?>
                                    <?php $index = 1; ?>
                                    <?php foreach ($hospitals as $hospital): ?>
                                        <tr>
                                            <td class="text-center"><?= $index; ?></td>
                                            <td class="text-center">
                                            <img width='50px'  src="<?= base_url() ?>public/images/<?= isset($hospital['profile']) && !empty($hospital['profile']) ? $hospital['profile'] : '1717391425.jpeg' ?>" onerror="this.onerror=null; this.src='<?= base_url() ?>public/images/1717391425.jpeg';" alt="Profile Image">
                                           
                                              
                                            </td>

                                            <td ><?= $hospital['fullname']; ?></td>
                                            <td><?= $hospital['email']; ?></td>
                                            <td class="text-center">
                                                <button
                                                    class="statusToggleBtn btn btn-sm <?php echo ($hospital['status'] == 'active') ? 'btn-success' : 'btn-danger'; ?>" data-id="<?=$hospital['id']?>" >
                                                    <?php echo ($hospital['status'] == 'active') ? 'Active' : 'Inactive'; ?>
                                                </button>
                                            </td>
                                            <td class="text-center">
                                                
                                                 <a href="<?= base_url('view_hospital' . $hospital['id']) ?>" class="btn btn-secondary btn-sm" >
                                                    <i class="ri-eye-line"></i>
                                                </a>
                                                
                                                 <a href="<?= base_url('edit_hospital' . $hospital['id']) ?>" class="btn btn-warning btn-sm btn_edit_hospital">
                                                    <i class='bx bx-edit'></i>
                                                  </a>

                                    
                                                  <a href="<?= base_url('delete_hospital/' . $hospital['id']) ?>" class="btn btn_delete_hospital btn-danger btn-sm delete_btn">
                                                    <i class='ri-delete-bin-line'></i>
                                                  </a>
                                                 
                                              
                                            </td>
                                        </tr>
                                        <?php $index++ ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php if (session()->has('hospital_status') && session('hospital_status') == 'success'): ?>
        <script>
            showToast('Hospital added successfully.');  
        </script>
    <?php endif; ?>
    <?php if (session()->has('hospital_edit_status') && session('hospital_edit_status') == 'success'): ?>
        <script>
            showToast('Hospital updated successfully.');  
        </script>
    <?php endif; ?>
    <?php if (session()->has('view_error') && session('view_error') == 'error'): ?>
        <script>
            showToast('Something went wrong...!');  
        </script>
    <?php endif; ?>

    <?php if (session()->has('hospital_delete') && session('hospital_delete') == 'success'): ?>
      <script>
            showToast('Hospital Delete Successfully');  
        </script>
<?php endif; ?>

<?php if (session()->has('hospital_delete') && session('hospital_delete') == 'error'): ?>
      <script>
            showToast('Something Is Wrong ..... Please Try Again Later');  
        </script>
<?php endif; ?>
   <script>
    $(document).ready(function () {
        $('.statusToggleBtn').on('click', function () {
            var $this = $(this);
            var id = $this.data('id');
            
            if ($this.hasClass('btn-success')) {
                $this.removeClass('btn-success').addClass('btn-danger');
                $this.text('Inactive');
                $.ajax({
                    url: '<?= base_url('hospital_status')?>',
                    method: 'get',
                    data: {id: id},
                    success: function (data) {
                        showToast('Hospital Status Changed.');
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            } else {
                $this.removeClass('btn-danger').addClass('btn-success');
                $this.text('Active');
                $.ajax({
                    url: '<?= base_url('hospital_status')?>',
                    method: 'get',
                    data: {id: id},
                    success: function (data) {
                        showToast('Hospital Status Changed.');
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            }
        });

        // $('.btn_delete_hospital').on('click', function (e) {
        //     e.preventDefault();
        //     let id = $(this).data('id');
        //     // console.log(id);
        //     $.ajax({
        //         url: '<?= base_url('hospital_delete')?>',
        //         method: 'get',
        //         data: {id: id},
        //         success: function (data) {
        //             // console.log(data);
        //             if(data.success==1){
        //             $('.hospital_table_body').load('<?= base_url('hospitals')?> .hospital_table_body')
        //             showToast('Hospital Deleted.');
        //             }else if(data.success==2){
        //                showToast('Hospital not delete..!!.');  
        //             }else{
        //                 showToast('Hospital not found..!!.');  
        //             }
        //         },
        //         error: function (err) {
        //             console.log(err);
        //         }
        //     });
        // });
        
        
        
        // $('.btn_edit_hospital').on('click', function (e) {
        //     e.preventDefault();
        //     let id = $(this).data('id');
        //     $.ajax({
        //         url: '<?= base_url('edit_hospital')?>',
        //         method: 'get',
        //         data: {id: id},
        //         success: function (data) {
                        
        //         },
        //         error: function (err) {
        //             console.log(err);
        //         }
        //     });
        // });

        $('.delete_btn').on('click', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        Swal.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!"
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = url;
          }
        });
      });

        
        
        
        
        
        
    });
</script>

</main><!-- End #main -->
<?= $this->endSection() ?>