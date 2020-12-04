<!-- BEGIN: main -->
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="text-center">
            <th class="text-nowrap text-center">Tên Ảnh</th>
            <th class="text-nowrap text-center">Danh mục</th>
            <th class="text-nowrap text-center">Ảnh</th>
            <th class="text-nowrap text-center">Thông tin chi tiết</th>
        </tr>
        </thead>
        <tbody>
        <!-- BEGIN: loop --> 
        <tr class="text-center">
            <td class="">{ROW.product_name}</td>
            <td class="">{ROW.category_id}</td>
            <td class="">
                <img src="{ROW.product_image}" width="100px" height="100px">
            </td>
            <td class="">{ROW.product_desc}</td>       
        </tr>
        <!-- END: loop -->
        </tbody>
    </table>
    <!-- BEGIN: GENERATE_PAGE -->
    {GENERATE_PAGE}
    <!-- END: GENERATE_PAGE -->
</div>

<!-- END: main -->