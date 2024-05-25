<?= $this->extend('layout/layout') ?>

<?= $this->section('title') ?>
View_Hospitals
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main id="main" class="main">
    <div class="pagetitle">
        <div class="row">
            <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                <h1>All Doctors</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('index.php') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Doctors</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div><!-- End Page Title -->

    <section class="section" id="sup001">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-8">
                                <h5 class="card-title text-start">Doctors</h5>
                            </div>
                            <div class="col-lg-4">
                                <h5 class="card-title text-end addsup">
                                    <a href="<?= base_url('add_doctor') ?>">Add New Doctor</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div class="card-body view-supplier-table table-responsive">
                        <!-- Table with stripped rows -->
                        <table id="myTable" class="table table-borderless supplier-table example">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <!-- <th>Profile Imge</th> -->

                                    <th>Name</th>
                                    <th>Qualification</th>
                                    <th>Specialist</th>
                                    <th>Hospital</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>                               
                        </thead>
                        <thead> <!-- Use tthead for the second row -->
                        <tr class="bg-white"> <!-- Apply background color style here -->
                            <th class="bg-white"></th>
                            <th class="bg-white"></th>
                            <th class="bg-white"></th>
                            <th class="bg-white"></th>

                          <th class="bg-white">
                          <select id="hospital-filter" class="form-control custom-select">
                          <option value="">Select Hospital</option>
                          </select>
                          </th>
                          <th class="bg-white"></th>
                        </tr>
                    </thead>

                            <tbody>                             
                                <?php if (!empty($doctors) && is_array($doctors)): ?>
                                    <?php foreach ($doctors as $doctor): ?>
                                        <tr>
                                            <td><?= esc($doctor['id']) ?></td>
                                            <!-- <td>    
                                            <?php if (!empty($doctor['image'])): ?>
                                                <div style="display: flex; justify-content: center;">
                                                    <img src="<?= base_url('public/images/' . $doctor['image']) ?>" alt="Doctor Image" style="width: 40%;">
                                                </div>

                                            <?php else: ?>
                                            <span>No Image</span>
                                            <?php endif; ?>
                                            </td> -->
                                          
                                            <td><?= esc($doctor['full_name']) ?></td>
                                            <td><?= esc($doctor['qualification']) ?></td>
                                            <td><?= esc($doctor['specialist_of']) ?></td>
                                            <td><?= esc($doctor['hospital_name']) ?></td>
                                            <td>
                                                <button
                                                    class="statusToggleBtn btn btn-sm <?php echo ($doctor['status'] == 'active') ? 'btn-success' : 'btn-danger'; ?>" data-id="<?=$doctor['user_id']?>" >
                                                    <?php echo ($doctor['status'] == 'active') ? 'Active' : 'Inactive'; ?>
                                                </button>
                                            </td>

                                            
                                            <td>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="editen p-1">
                                                        <a href="<?= base_url('editDoctor?id=' . $doctor['id']) ?>">
                                                            <button type="button" class="btn btn-secondary btn-sm">
                                                                <i class='bx bx-edit'></i>
                                                            </button>
                                                        </a>    
                                                    </div>
                                                    <div class="viewsenq p-1">
                                                        <a href="<?= base_url('viewDoctor?id=' . $doctor['user_id']) ?>">
                                                            <button type="button" class="btn btn-secondary btn-sm">
                                                                <i class="ri-eye-line"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                    <div class="viewsenq p-1">
                                                    <button type="button" class="btn btn-secondary btn-sm delete_btn" data-id="<?= $doctor['id'] ?>"><i class="ri-delete-bin-line"></i></button>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6">No doctors found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<!-- Include necessary scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>


<script>
    $(document).ready(function() {
        var table = $('.example').DataTable({
    initComplete: function () {
        var tableApi = this.api(); // Get the DataTable API for easier access

        // Add custom search field HTML
        var searchAndEntries = $('<div class="datatable-controls d-flex justify-content-between align-items-center"><div class="datatable-entries text-start"><label for="datatable-selector">Show entries:</label><select id="datatable-selector" class="datatable-selector"><option value="5">5</option><option value="10" selected>10</option><option value="15">15</option><option value="-1">All</option></select></div><div class="datatable-search text-end"><input class="datatable-input" placeholder="Search..." type="search" title="Search within table"></div></div>');
        $('.dataTables_wrapper').prepend(searchAndEntries);

        // Ensure that the search field is functional
        $('.datatable-input').on('input', function () {
            table.search(this.value).draw();
        });

        // Handle entries selector change
        $('#datatable-selector').on('change', function () {
            table.page.len($(this).val()).draw();
        });

        // Hospital filter functionality
        var column = tableApi.column(4); // Target the 'Hospital' column (index 5)
        var select = $('#hospital-filter').on('change', function () {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());
            column.search(val ? '^' + val + '$' : '', true, false).draw();
        });

        // Populate hospital filter dropdown
        column.data().unique().sort().each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
        });

        // Add a custom message for showing entries
        var entriesInfo = $('<div class="datatable-info d-inline mt-4"></div>');
        $('.dataTables_wrapper').append(entriesInfo);

        // Create the custom pagination navigation
        var paginationNav = $('<nav class="datatable-pagination float-end mt-2"><ul class="datatable-pagination-list"></ul></nav>');
        $('.dataTables_wrapper').append(paginationNav);

        // Update the entries info initially and on pagination change
        updateEntriesInfo();

        tableApi.on('draw', function () {
            updateEntriesInfo();
        });

        function updateEntriesInfo() {
            var pageInfo = tableApi.page.info();
            var entriesMessage = 'Showing ' + (pageInfo.start + 1) + ' to ' + pageInfo.end + ' of ' + pageInfo.recordsTotal + ' entries';
            $('.datatable-info').html(entriesMessage);

            // Update pagination buttons based on total pages and current page
            var totalPages = Math.ceil(pageInfo.recordsTotal / pageInfo.length);
            var currentPage = pageInfo.page + 1;

            $('.datatable-pagination-list').empty(); // Clear existing buttons

            if (totalPages > 1) {
                // Add previous button
                var prevButton = $('<li class="datatable-pagination-list-item"><button data-page="' + (currentPage - 1) + '" class="datatable-pagination-list-item-link" aria-label="Previous Page">‹</button></li>');
                $('.datatable-pagination-list').append(prevButton);
            }

            // Add page buttons
            for (var i = 1; i <= totalPages; i++) {
                var activeClass = i === currentPage ? 'datatable-active' : '';
                var pageButton = $('<li class="datatable-pagination-list-item ' + activeClass + '"><button data-page="' + i + '" class="datatable-pagination-list-item-link" aria-label="Page ' + i + '">' + i + '</button></li>');
                $('.datatable-pagination-list').append(pageButton);
            }

            if (totalPages > 1) {
                // Add next button
                var nextButton = $('<li class="datatable-pagination-list-item"><button data-page="' + (currentPage + 1) + '" class="datatable-pagination-list-item-link" aria-label="Next Page">›</button></li>');
                $('.datatable-pagination-list').append(nextButton);

                // Bind click event to pagination buttons
                $('.datatable-pagination-list-item-link').on('click', function () {
                    var page = $(this).data('page') - 1; // DataTables uses 0-based indexing
                    tableApi.page(page).draw(false);
                });
            }
        }
    },
    "dom": '<"custom-datatable table-borderless"t>', // Use custom class and keep Bootstrap styling
    "paging": true,
    "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
    "pageLength": 10,
    "language": {
        "paginate": {
            "previous": "Previous",
            "next": "Next"
        }
    }
});



        $('.delete_btn').click(function() 
        { 
    var doctorId = $(this).data('id');
    var confirmDelete = confirm('Are you sure you want to delete this doctor?');
    if (confirmDelete) {
    $.ajax({
        url: '<?= base_url('deleteDoctor') ?>',
        type: 'POST',
        data: { id: doctorId },
        success: function(response) 
        {
            console.log(response);

            showToast(response);
                setTimeout(function() 
                {
                    // $('#myTable tbody')[0].reset();
                    location.reload();                        
                    }, 2000);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            // Handle the error if the AJAX request fails
        }
    });
}
});

$('.statusToggleBtn').on('click', function () {
            var $this = $(this);
            var id = $this.data('id');
            console.log(id);
            
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

        $('.btn_delete_hospital').on('click', function (e) {
            e.preventDefault();
            let id = $(this).data('id');
            // console.log(id);
            $.ajax({
                url: '<?= base_url('hospital_delete')?>',
                method: 'get',
                data: {id: id},
                success: function (data) {
                    // console.log(data);
                    if(data.success==1){
                    $('.hospital_table_body').load('<?= base_url('hospitals')?> .hospital_table_body')
                    showToast('Hospital Deleted.');
                    }else if(data.success==2){
                       showToast('Hospital not delete..!!.');  
                    }else{
                        showToast('Hospital not found..!!.');  
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
        });

    });
</script>


   


<?= $this->endSection() ?>
