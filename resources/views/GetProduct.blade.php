<!DOCTYPE html>
<html>

<head>
    <title>Laravel 11 Yajra Datatables - Customized</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="card mt-5 shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Product List</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover data-table">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Active</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Sale Price</th>
                            <th>Color</th>
                            <th>Image</th>
                            <th width="150px">Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript">
    $(function() {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('product.Get-Product') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'product_name',
                    name: 'product_name'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'product_description',
                    name: 'product_description'
                },
                {
                    data: 'product_active',
                    name: 'product_active'
                },
                {
                    data: 'product_stock',
                    name: 'product_stock'
                },
                {
                    data: 'product_price',
                    name: 'product_price'
                },
                {
                    data: 'product_sale_price',
                    name: 'product_sale_price'
                },
                {
                    data: 'product_color',
                    name: 'product_color'
                },
                {
                    data: 'product_image',
                    name: 'product_image',
                    orderable: false,
                    searchable: false,
                    render: function(data) {
                        let imageUrl = data ? `/uploads/products/${data}` :
                            '/images/no-image.png';
                        return `<img src="${imageUrl}" width="50" height="50" class="img-thumbnail">`;
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        return `
                            <a href="products/edit/${row.id}" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="products/view/${row.id}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <button class="btn btn-sm btn-danger delete" data-id="${row.id}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        `;
                    }
                }
            ]
        });

        // Handle delete button click
        $(document).on('click', '.delete', function() {
            let id = $(this).data('id');
            if (confirm("Are you sure you want to delete this product?")) {
                $.ajax({
                    url: "products/delete/" + id,
                    type: "DELETE",
                    success: function(response) {
                        table.ajax.reload();
                        alert(response.message);
                    }
                });
            }
        });

    });
</script>

</html>
