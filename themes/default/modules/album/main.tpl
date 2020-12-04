<!-- BEGIN: main -->
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="text-center">
            <th class="text-nowrap">Tên danh mục</th>
            <th class="text-nowrap">Ảnh mô tả</th>
            <th class="text-nowrap">Mô tả</th>
            <th class="text-nowrap text-center">Chức năng</th>
        </tr>
        </thead>
        <tbody>
        <!-- BEGIN: loop --> 
        <tr class="text-center">
            <td class="">{ROW.category_name}</td>
            <td class="">
                <img src="{ROW.category_image}" width="100px" height="100px">
            </td>
            <td class="">{ROW.category_desc}</td>
            <td class="text-center text-nowrap">
                <a href="{ROW.url_view}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>Chi tiết</a>
                <a href="{ROW.url_slide}" class="btn btn-danger btn-sm delete"><i class="fa fa-edit"></i>SlideShow</a>
            </td>
        </tr>
        <!-- END: loop -->
        </tbody>
    </table>
</div>

<!-- END: main -->