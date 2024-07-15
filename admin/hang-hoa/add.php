<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $cost = $_POST['cost'];
    $discount = $_POST['discount'];
    $type = $_POST['type'];
    $description = $_POST['description'];

    $img = $_FILES['image'];
    $img1 = $_FILES['image1'];
    $img2 = $_FILES['image2'];
    $img3 = $_FILES['image3'];

    $img_path = uploadFile($img, $folderUploaded);
    $img_path1 = uploadFile($img1, $folderUploaded);
    $img_path2 = uploadFile($img2, $folderUploaded);
    $img_path3 = uploadFile($img3, $folderUploaded);

    hang_add($name, $img_path, $img_path1, $img_path2, $img_path3, $cost, $discount, $type, $description);

    $_SESSION['hang_add_success'] = 'success';
}

if (isset($_SESSION['hang_add_success']) && $_SESSION['hang_add_success'] == 'success') { ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: 'Success!',
            text: 'Thêm thành công',
            icon: 'success',
            confirmButtonText: 'Xác nhận',
        })
    </script>
<?php
    $_SESSION['hang_add_success'] = null;
}; ?>

<form class="row g-3 needs-validation mt-1" novalidate method="POST" enctype="multipart/form-data">
    <div class="col-md-3">
        <label for="validationCustom01" class="form-label">Tên hàng hóa</label>
        <input type="text" class="form-control p-2" id="validationCustom01" required name="name">
        <div id="emailError" class="invalid-feedback">
            Vui lòng nhập tên hàng hóa
        </div>
    </div>

    <div class="col-md-3">
        <label for="inputPassword" class="form-label">Đơn giá</label>
        <input type="number" class="form-control p-2" id="inputPassword" required name="cost">
        <div class="invalid-feedback">
            Vui lòng nhập đơn giá
        </div>
    </div>

    <div class="col-md-3">
        <label for="inputRePassword" class="form-label">Mức giảm giá (%) (optional)</label>
        <input type="number" min="0" max="100" class="form-control p-2" id="inputRePassword" name="discount">
        <div class="invalid-feedback">
            Mức giảm giá không hợp lệ
        </div>
    </div>

    <div class="col-md-3">
        <label for="validationCustom04" class="form-label">Loại hàng</label>
        <select class="form-select" name="type" id="">
            <?php
            $types = loai_selectAll();

            foreach ($types as $type) { ?>
                <option value="<?php echo $type['ma_loai_hang'] ?>"><?php echo $type['ten_loai_hang'] ?></option>
            <?php   } ?>
        </select>
    </div>

    <div class="col-md-3">
        <label for="validationCustom06" class="form-label">Ảnh sản phẩm</label>
        <input type="file" class="form-control" id="validationCustom06" name="image" onchange="fPreviewImage1(this.files[0])" required>
        <img id="image-preview-1" style="margin-top: 12px;" class="d-none" width="100" alt="">
    </div>

    <div class="col-md-3">
        <label for="validationCustom07" class="form-label">Ảnh chi tiết 1</label>
        <input type="file" class="form-control" id="validationCustom07" name="image1" onchange="fPreviewImage2(this.files[0])" required>
        <img id="image-preview-2" style="margin-top: 12px;" class="d-none" width="100" alt="">
    </div>

    <div class="col-md-3">
        <label for="validationCustom08" class="form-label">Ảnh chi tiết 2</label>
        <input type="file" class="form-control" id="validationCustom08" name="image2" onchange="fPreviewImage3(this.files[0])" required>
        <img id="image-preview-3" style="margin-top: 12px;" class="d-none" width="100" alt="">
    </div>

    <div class="col-md-3">
        <label for="validationCustom09" class="form-label">Ảnh chi tiết 3</label>
        <input type="file" class="form-control" id="validationCustom09" name="image3" onchange="fPreviewImage4(this.files[0])" required>
        <img id="image-preview-4" style="margin-top: 12px;" class="d-none" width="100" alt="">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Mô tả</label>
        <textarea class="form-control" name="description" id="" style="height: 120px;" required></textarea>
        <div class="invalid-feedback">
            Vui lòng nhập mô tả
        </div>
    </div>

    <div class="col-12">
        <button name="submit" type="submit" class="btn btn-outline-primary btn-sm">Thêm mới</button>
        <a href="?btn_list" id="list" class="btn btn-warning btn-sm">Danh sách</a>
    </div>

</form>

<script>
    const previewImage1 = document.getElementById('image-preview-1');
    const previewImage2 = document.getElementById('image-preview-2');
    const previewImage3 = document.getElementById('image-preview-3');
    const previewImage4 = document.getElementById('image-preview-4');

    function fPreviewImage1(file) {
        previewImage1.classList.remove('d-none');
        previewImage1.src = URL.createObjectURL(file);
    }

    function fPreviewImage2(file) {
        previewImage2.classList.remove('d-none');
        previewImage2.src = URL.createObjectURL(file);
    }

    function fPreviewImage3(file) {
        previewImage3.classList.remove('d-none');
        previewImage3.src = URL.createObjectURL(file);
    }

    function fPreviewImage4(file) {
        previewImage4.classList.remove('d-none');
        previewImage4.src = URL.createObjectURL(file);
    }

    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })

    })()
</script>