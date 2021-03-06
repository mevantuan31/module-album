<!-- BEGIN: main -->
<!-- BEGIN: loop -->
    <a href="{ROW.url_add_image}" class="btn btn-success btn-md active"><i class="fa fa-edit"></i>Thêm ảnh</a>
    <div class="row">
        <div class="col-md-4">
        <table class="table table-striped table-bordered table-hover">
            <caption>Thông tin album {ROW.category_name}</caption>
            <tr>
                <td>ID</td>
                <td>{ROW.id}</td>
            </tr>
            <tr>
                <td>Tên album: </td>
                <td>{ROW.category_name}</td>
            </tr>
            <tr>
                <td>Thông tin chi tiết: </td>
                <td>{ROW.category_desc}</td>
            </tr>
            <tr>
                <td>Ảnh minh họa: </td>
                <td><img src="{ROW.category_image}" alt="" width="100"></td>
            </tr>
        </table>
        </div>
    </div>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Số thứ tự</th>
                <th scope="col">Tên ảnh</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Thông tin chi tiết</th>
            </tr>
        </thead>
        <tbody>
        <!-- BEGIN: zz --> 
        <tr>
            <th scope="row">{ROW2.stt_image}</th>
            <td>{ROW2.name_image}</td>
            <td><img src="{ROW2.image}" alt="" width="100"></td>
            <td>{ROW2.desc_image}</td>
        </tr>
        <!-- END: zz -->
        </tbody>
    </table> 


<!-- END: loop -->

<!-- END: main -->