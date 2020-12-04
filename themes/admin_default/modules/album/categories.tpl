<!-- BEGIN: main -->
<!-- BEGIN: error -->
<div class="alert alert-warning" role="alert">{ERROR}</div>
<!-- END: error -->
<form  enctype="multipart/form-data" acqtion="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post" name="{MODULE_NAME}">
    <div class="form-group">
        <h1><b>Thêm Album Mới</b></h1>
        <input type="hidden" name="id" value="{POST.id}">
        <div class="form-group">
            <label for="name_album">Tên album:</label>
            <input type="text" name="name_album" class="form-control" id="category_name" value="{POST.category_name}">
        </div>
        <div class="form-group">
            <label for="active-album">Trạng thái:</label>
            <select name="active_album" id="">
                <option value="1">Hiển thị</option>
                <option value="2">Ẩn</option>
            </select>
        </div>
        <div class="form-group">
            <label for="image_album">Tải ảnh lên:</label>
            <input type="file" class="form-control" name="image_album" id="category_image" value="">
        </div>
        <div class="form-group">
            <label for="desc_album">Thông tin chi tiết:</label>
            <textarea name="desc_album" class="form-control" id="category_desc"  rows="10">{POST.category_desc}</textarea>
        </div>
        <div class="text-center"><input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" /></div>
    </div>
</form>
<!-- END: main -->  